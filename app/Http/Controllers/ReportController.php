<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use QrCode;
use auth;

use App\Report;
use App\Equipment;
use App\Customer;
use App\Pattern;
use App\Laboratorio;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function access(){
    //     if( auth::user()->rol != 'admin'){
    //         return redirect()->route('certificaciones.index')->with([
    //             'message'=>'Acceso restringido para administradores',
    //             'clase' => 'warning'
    //         ]);
    //     }
    // }
    public function qrcode(){

        \QrCode::format('png')
        ->size(473)
        ->margin(1)
        ->generate( route('cdc-toposervis','CT-0004') ,public_path('storage/qrcodes/CT-0004.png'));
    }
    public function index()
    {
        $reports = Report::paginate(12);
        return view('certificaciones.index', compact('reports'));
    }

    public function create()
    {
        $report = new Report();
        $customer = new Customer();
        $equipment = new Equipment();
        $report->measurements = [
            "xaj"=> ["0","0","0","0"],
            "xbj"=> ["21.784","54.055","76.502","152.248"],
            "dj1"=> ["0","0","0","0"],
            "rj1"=> ["0","0","0","0"],
            "r2j1"=> ["0","0","0","0"],
            "xaj2"=> ["0","0","0","0"],
            "xbj2"=> ["0","0","0","0"],
            "dj2"=> ["0","0","0","0",],
            "rj2"=> ["0","0","0","0"],
            "r2j2" => ["0","0","0","0"]
        ];
        return view('certificaciones.new', compact('report','customer','equipment'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'temperature' => 'required',
            'cumple' => 'required',
            'pressure' => 'required',
            'humidity' => 'required',
            'observation' => 'required',
            'customer.name' => 'required',
            'customer.address' => 'required',
            'customer.phone' => 'required',
            'customer.email' => 'required',
            'equipment.equipment' => 'required',
            'equipment.brand' => 'required',
            'equipment.model' => 'required',
            'equipment.no_serie' => 'required'
        ]);

        $last_user = Report::latest()->orderBy('id', 'DESC')->first();
        $folio = explode('-',$last_user->folio);
        $_folio = '';
        if( $last_user ){
            if( $folio[1] < 10 ){
                $_folio = 'CT-000'.( $folio[1] + 1 );
            }
            if( $folio[1] > 9 && $folio[1] < 100 ){
                $_folio = 'CT-00'.( $folio[1] + 1 );
            }
            if( $folio[1] > 99 && $folio[1] < 1000 ){
                $_folio = 'CT-0'.( $folio[1] + 1 );
            }
            if( $folio[1]> 1000){
                $_folio = 'CT-'.( $folio[1] + 1 );
            }
        }else{
            $_folio = 'CT-0001';
        }

        // Create user 
        $customer = Customer::create([
            'name' => $request->customer['name'],
            'address' => $request->customer['address'],
            'email' => $request->customer['email'],
            'phone' => $request->customer['phone']
        ]);
        // Create equipment
        $equipment = Equipment::create([
            'equipment' => $request->equipment['equipment'],
            'brand' => $request->equipment['brand'],
            'model' => $request->equipment['model'],
            'no_serie' => $request->equipment['no_serie']
        ]);
        
        $measurements = $this->assignMeasures($request);
        $user = auth()->user();
        // // Create report 
        $report = Report::create([
            'customer_id' => $customer->id,
            'equipment_id' => $equipment->id,
            'user_id' => $user->id,
            'pattern_id' => 1,
            'folio' => $_folio,
            'date' => date('Y-m-d'),
            'temperature' => $request->temperature,
            'cumple' => ( $request->cumple == 'on' ? 1 : 0 ),
            'pressure' => $request->pressure,
            'humidity' => $request->humidity,
            'hour' => $request->hour,
            'sisolev' => 1,
            'observation' => $request->observation,
            'measurements' => $measurements,
        ]);

        \QrCode::format('png')
        ->size(473)
        ->margin(1)
        ->generate( route('cdc-toposervis',$report->folio) ,public_path('storage/qrcodes/'. $report->folio.'.png'));
        return redirect()->route('certificaciones.edit',$report->id)->with(['message'=>'Registro creado con éxito']);
    }

    public function show($id)
    {
        $report = Report::find($id);
        $customer = $report->customer[0];
        $equipment = $report->equipment[0];
        $pattern = $report->pattern;
        // return View('certificaciones.show', compact('report','customer','equipment', 'pattern'));

        $view = View('certificaciones.show', compact('report','customer','equipment', 'pattern'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function edit(Report $report, $id)
    {
        if( auth::user()->rol != 'admin'){
            return redirect()->route('certificaciones.index')->with([
                'message'=>'Acceso restringido para administradores',
                'clase' => 'warning'
            ]);
        }
        $report = Report::find($id);
        $customer = $report->customer[0];
        $equipment = $report->equipment[0];
        $pattern = $report->pattern;
        return view('certificaciones.edit', compact('report','customer','equipment'));
    }
    public function search(Request $request)
    {
        $reports = Report::where ( 'folio', 'LIKE', '%' . $request->folio . '%' )->paginate(10);
        return view('certificaciones.index', compact('reports'));
    }
    private function saveCustomer($id, $_customer){
        
        $customer = Customer::find($id);    
        $customer->name = $_customer['name'];
        $customer->address = $_customer['address'] ? $_customer['address'] : "Dirección";
        $customer->email = $_customer['email'] ? $_customer['email'] : "Correo";
        $customer->phone = $_customer['phone'] ? $_customer['phone'] : "Teléfono";

        $customer->save();
    }
    private function saveEquipment($id, $_equipment){
        $equipment = Equipment::find($id);
        $equipment->equipment = $_equipment["equipment"] ? $_equipment["equipment"] : '---';
        $equipment->brand = $_equipment["brand"] ? $_equipment["brand"] : '---';
        $equipment->model = $_equipment["model"] ? $_equipment["model"] : '---';
        $equipment->no_serie = $_equipment["no_serie"] ? $_equipment["no_serie"] : '---';
        $equipment->save();
    }
    private function assignMeasures($request){
        return [
            "xaj" => $request->xaj,
            "xbj" => $request->xbj,
            "dj1" => $request->dj1,
            "rj1" => $request->rj1,
            "r2j1" => $request->r2j1,
            "xaj2" => $request->xaj2,
            "xbj2" => $request->xbj2,
            "dj2" => $request->dj2,
            "rj2" => $request->rj2,
            "r2j2" => $request->r2j2
        ];


    }

    public function update(Request $request, $id)
    {
        if( auth::user()->rol != 'admin'){
            return redirect()->route('certificaciones.index')->with([
                'message'=>'Acceso restringido para administradores',
                'clase' => 'warning'
            ]);
        }

        request()->validate([
            'temperature' => 'required',
            'cumple' => 'required',
            'pressure' => 'required',
            'humidity' => 'required',
            'observation' => 'required',
            // 'customer.name' => 'required',
            // 'customer.address' => 'required',
            // 'customer.phone' => 'required',
            // 'customer.email' => 'required',
            // 'equipment.product' => 'required',
            // 'equipment.brand' => 'required',
            // 'equipment.model' => 'required',
            // 'equipment.no_serie' => 'required'
        ]);
        
        $report = Report::find($id);
        // return $request;
        $measurements = $this->assignMeasures($request);
        
        $report->temperature = $request->temperature;
        $report->cumple = ( $request->cumple == 'on' ? 1 : 0 );
        $report->pressure = $request->pressure;
        $report->humidity = $request->humidity;
        $report->hour = $request->hour;
        // $report->sisolev = $request->sisolev;
        $report->observation = $request->observation;
        $report->measurements = $measurements;

        $this->saveCustomer( $report->customer_id, $request->customer );
        $this->saveEquipment( $report->equipment_id, $request->equipment );
        
        $report->save();
        return redirect()->route('certificaciones.edit', $report)->with(['message'=>'Registro actualizado con éxito']);
    }

    public function destroy(Report $report)
    {
        //
    }

    public function createcertificado(Request $request, $id)
    {
        $service = Laboratorio::find($id);

        $report = new Report();

        if($request->get("pattern") == 1)
        {
          $pattern = Pattern::find(1);
        }
        elseif($request->get("pattern") == 2)
        {
          $pattern = Pattern::find(2);
        }

        return view('laboratorio.new', compact('service','report','pattern'));
    }
}