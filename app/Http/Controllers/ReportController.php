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
use App\Temp;
use App\ReportMedicion;

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

  public function qrcode()
  {
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

  public function create(Request $request, $idserv="")
  {
    $reponse = [];

      $objReport      = new Report();
      $objCustomer    = new Customer();
      $objEquipment   = new Equipment();
      $objLaboratorio = new Laboratorio();

      $objTemp = new Temp();

      $report    = $objReport;
      $customer  = $objCustomer;
      $equipment = $objEquipment;

      if(!empty($idserv))
      {
        $service_order  = $objLaboratorio->find($idserv);

        $customer = $service_order->customer;
        $producto = $service_order->product;

        $equipment = $producto;

        $equipment->equipment = $producto->name;
        $equipment->no_serie  = $service_order->serie;
        $equipment->brand     = $service_order->brand;
        $equipment->model  = $service_order->model;

      }

 /*     $report = $objReport->find(22);

      $mediciones = $report->mediciones;

      foreach($mediciones as $item)
      {
        if($item->tipo == "PRISMA")
        {
          $medicion_prisma = $item;
        }
      }*/

      $report->measurements = [
          "xaj"=> ["0","0","0","0"],
          "xbj"=> ["0","0","0","0"],
          "dj1"=> ["0","0","0","0"],
          "rj1"=> ["0","0","0","0"],
          "r2j1"=> ["0","0","0","0"],
          "xaj2"=> ["0","0","0","0"],
          "xbj2"=> ["0","0","0","0"],
          "dj2"=> ["0","0","0","0",],
          "rj2"=> ["0","0","0","0"],
          "r2j2" => ["0","0","0","0"]
      ];

       $report->angulosprisma = [
          "distancia"=> ["0","0","0","0"],
          "promedio"=> ["0","0","0","0"],
          "patron"=> ["0","0","0","0"],
          "residuo"=> ["0","0","0","0"],
          "residuocuadratico"=> ["0","0","0","0"],
      ];

      $report->angulosHorizontales = [
          "i"=> ["0","0","0"],
          "k"=> ["1","2","3","4","∑"],
          "cara1"=> ["0","0","0","0"],
          "cara2"=> ["0","0","0","0"],
          "sumacaras"=> ["0","0","0","0"],
          "promedio"=> ["0","0","0","0"],
          "sumaprom"=> ["0","0","0","0","0"],
          "promsuma"=> ["0","0","0","0","0"],
          "restaprom"=> ["0","0","0","0"],
          "promresta"=> ["0","0","0","0"],
          "r"=> ["0","0","0","0"],
          "r2"=> ["0","0","0","0"],
      ];

       $report->angulosVerticales = [
          "i"=> ["0","0","0"],
          "k"=> ["1","2","3","4","∑"],
          "Xj,k1"=> ["1","2","3","4"],
          "Xj,k2"=> ["0","0","0","0"],
          "sigma"=> ["0","0","0","0"],
          "xj,k"=> ["0","0","0","0"],
          "xk"=> ["0","0","0","0"],
          "rj,k"=> ["0","0","0","0"],
          "rj,k2"=> ["0","0","0","0"],
      ];

      $temp = $objTemp->find(1);

      $response['report']    = $report;
      $response['customer']  = $customer;
      $response['equipment'] = $equipment;

      $response['aux']       = json_decode($report->medicion_prisma, true);
      $response['angulos_h'] = json_decode($report->medicion_angulos_h, true);
      $response['angulos_v'] = json_decode($report->medicion_angulos_v, true);

      return view('certificaciones.new', $response);
  }

  public function store(Request $request)
  {
      /*request()->validate([
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
      ]);*/

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
          'name' => $request->customer['name']?:'',
          'address' => $request->customer['address'] ?:'',
          'email' => $request->customer['email']?:'',
          'phone' => $request->customer['phone']?:''
      ]);

      // Create equipment
      $equipment = Equipment::create([
        'equipment' => $request->equipment['equipment']?:'',
        'brand' => $request->equipment['brand']?:'',
        'model' => $request->equipment['model']?:'',
        'no_serie' => $request->equipment['no_serie']?:''
      ]);

      $measurements = $this->assignMeasures($request);
      $user = auth()->user();
      // // Create report

      $qs = $request->get("qs");

      parse_str($qs, $get_array);

      $cTipo = "NIVEL";

      if(!empty($qs))
      {
        $cTipo = "ESTACION";
       /* $pattern->id = 2;  */


      $report = Report::create([
          'customer_id' => $customer->id,
          'equipment_id' => $equipment->id,
          'user_id' => $user->id,
          'pattern_id' => 2,
          'folio' => $_folio,
          'date' => date('Y-m-d'),
          'temperature' => $request->temperature ?: '',
          'cumple' => ( $request->cumple == 'on' ? 1 : 0 ),
          'pressure' => $request->pressure ?:'',
          'humidity' => $request->humidity ?:'',
          'hour' => $request->hour ?:'',
          'sisolev' => 1,
          'observation' => $request->observation ?:'',
          'measurements' => $measurements,
          'tipo' => $cTipo,
      ]);
      }
      else
      {
         $report = Report::create([
          'customer_id' => $customer->id,
          'equipment_id' => $equipment->id,
          'user_id' => $user->id,
          'pattern_id' => 1,
          'folio' => $_folio,
          'date' => date('Y-m-d'),
          'temperature' => $request->temperature ?: '',
          'cumple' => ( $request->cumple == 'on' ? 1 : 0 ),
          'pressure' => $request->pressure ?:'',
          'humidity' => $request->humidity ?:'',
          'hour' => $request->hour ?:'',
          'sisolev' => 1,
          'observation' => $request->observation ?:'',
          'measurements' => $measurements,
          'tipo' => $cTipo,

          ]);
      }




      #guardado de mediciones prisma
      {
        $Dato = array();

        $Dato = $request->get('prisma');

        $cDate = !empty($Dato["date"]) ? $Dato["date"]: date("Y-m-d");
        $cTime = !empty($Dato["hour"]) ? $Dato["hour"]: date("H:i");

        $Dato["date"] = $cDate . " " . $cTime;
        $Dato["hour"] = $cTime;

        $Dato["idreport"] = $report->id;
        $Dato["cumple"]   = intval(isset($Dato["cumple"]));
        $Dato["tipo"]     = "PRISMA";

        $arrAux = array();

        $arrAux["dist1"] = $get_array["dist1"] ?? array();
        $arrAux["dist2"] = $get_array["dist2"] ?? array();
        $arrAux["dist3"] = $get_array["dist3"] ?? array();
        $arrAux["promedio_prisma"] = $get_array["promedio_prisma"] ?? array();
        $arrAux["patron"] = $get_array["patron"] ?? array();
        $arrAux["residuo"] = $get_array["residuo"] ?? array();
        $arrAux["residuocuadratico"] = $get_array["residuocuadratico"] ?? array();

        $arrAux["txtTotalMedicion"] = $get_array["txtTotalMedicion"] ?? "";
        $arrAux["txtMedidasPosibles"] = $get_array["txtMedidasPosibles"] ?? "";
        $arrAux["txtTotalPuntosPosibles"] = $get_array["txtTotalPuntosPosibles"] ?? "";
        $arrAux["txtNumeroGradoLibertad"] = $get_array["txtNumeroGradoLibertad"] ?? "";
        $arrAux["txtSumatoriaResiduoCuadratico"] = $get_array["txtSumatoriaResiduoCuadratico"] ?? "";
        $arrAux["txtDesviacion"] = $get_array["txtDesviacion"] ?? "";

        $json_medicion = json_encode($arrAux);

        $Dato["json_medicion"] = $json_medicion;

        ReportMedicion::insert($Dato);
      }

      #guardado de mediciones angulos_h
      {
        $Dato = array();

        $Dato = $request->get('angulos_h');

        $Dato["idreport"] = $report->id;
        $Dato["cumple"]   = intval(isset($Dato["cumple"]));
        $Dato["tipo"]     = "ANGULOS_H";

        $arrAux = array();

        $arrAux["cara1"] = $get_array["cara1"] ?? array();
        $arrAux["cara2"] = $get_array["cara2"] ?? array();
        $arrAux["sumacara"] = $get_array["sumacara"] ?? array();
        $arrAux["promedio"] = $get_array["promedio"] ?? array();
        $arrAux["sumapromedio"] = $get_array["sumapromedio"] ?? array();
        $arrAux["promediosuma"] = $get_array["promediosuma"] ?? array();
        $arrAux["restapromedio"] = $get_array["restapromedio"] ?? array();
        $arrAux["promedioresta"] = $get_array["promedioresta"] ?? array();
        $arrAux["r"] = $get_array["r"] ?? array();
        $arrAux["r2"] = $get_array["r2"] ?? array();
        $arrAux["apertura"] = $get_array["apertura"] ?? array();
        $arrAux["paraserie"] = $get_array["paraserie"] ?? array();


        $json_angulos_h = json_encode($arrAux);

        $Dato["json_medicion"] = $json_angulos_h;

        ReportMedicion::insert($Dato);

      }

      #guardado de mediciones angulos_v
      {
        $Dato = array();

        $Dato = $request->get('angulos_v');

        $Dato["idreport"] = $report->id;
        $Dato["cumple"]   = intval(isset($Dato["cumple"]));
        $Dato["tipo"]     = "ANGULOS_V";

        $arrAux = array();

        $arrAux["Xj1"] = $get_array["Xj1"] ?? array();
        $arrAux["Xj2"] = $get_array["Xj2"] ?? array();
        $arrAux["sigma"] = $get_array["sigma"] ?? array();
        $arrAux["xj"] = $get_array["xj"] ?? array();
        $arrAux["xk"] = $get_array["xk"] ?? array();
        $arrAux["rj1"] = $get_array["rj1"] ?? array();
        $arrAux["rj2"] = $get_array["rj2"] ?? array();
        $arrAux["sumatotalrj2"] = $get_array["sumatotalrj2"] ?? array();
        $arrAux["raizsumatoria"] = $get_array["raizsumatoria"] ?? array();

        $json_angulos_v = json_encode($arrAux);

        $Dato["json_medicion"] = $json_angulos_v;

        ReportMedicion::insert($Dato);
      }

      \QrCode::format('png')
      ->size(473)
      ->margin(1)
      ->generate( route('cdc-toposervis',$report->folio), public_path('storage/qrcodes/'. $report->folio.'.png'));

      return redirect()->route('certificaciones.edit', $report->id)->with(['message'=>'Registro creado con éxito']);
  }

  public function show($id)
  {
      $report    = Report::find($id);
      $customer  = $report->customer;
      $equipment = $report->equipment[0];
      $pattern   = $report->pattern;
      // return View('certificaciones.show', compact('report','customer','equipment', 'pattern'));

      $view = View('certificaciones.show', compact('report','customer','equipment', 'pattern'));
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view->render());
      return $pdf->stream();
  }

  public function edit($id)
  {
    $response = [];

    if( auth::user()->rol != 'admin')
    {
      return redirect()->route('certificaciones.index')->with([
        'message'=>'Acceso restringido para administradores',
        'clase' => 'warning',
      ]);
    }

    $report = Report::find($id);

    $customer = $report->customer;

    $equipment = $report->equipment[0];

    $response["report"]    = $report;
    $response["customer"]  = $customer;
    $response["equipment"] = $equipment;

    $response['aux']       = json_decode($report->medicion_prisma, true) ?: array(1);
    $response['angulos_h'] = json_decode($report->medicion_angulos_h, true) ?: array(1);
    $response['angulos_v'] = json_decode($report->medicion_angulos_v, true) ?: array(1);

    $pattern = $report->pattern;

    return view('certificaciones.edit', $response);
  }

  public function search(Request $request)
  {
    $reports = Report::where ( 'folio', 'LIKE', '%' . $request->folio . '%' )->paginate(10);
    return view('certificaciones.index', compact('reports'));
  }

  private function saveCustomer($id, $_customer)
  {
    $customer = Customer::find($id);
    $customer->name = $_customer['name'];
    $customer->address = $_customer['address'] ? $_customer['address'] : "Dirección";
    $customer->email = $_customer['email'] ? $_customer['email'] : "Correo";
    $customer->phone = $_customer['phone'] ? $_customer['phone'] : "Teléfono";

    $customer->save();
  }

  private function saveEquipment($id, $_equipment)
  {
      $equipment = Equipment::find($id);
      $equipment->equipment = $_equipment["equipment"] ? $_equipment["equipment"] : '---';
      $equipment->brand = $_equipment["brand"] ? $_equipment["brand"] : '---';
      $equipment->model = $_equipment["model"] ? $_equipment["model"] : '---';
      $equipment->no_serie = $_equipment["no_serie"] ? $_equipment["no_serie"] : '---';
      $equipment->save();
  }

  private function assignMeasures($request)
  {
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
   /*
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
      ]);*/

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

  public function save_medicion(Request $request)
  {
    $Dato = array();

    /*$objTemp = new Temp; */

    $objReportMedicion = new ReportMedicion;

    parse_str($request->get("qs"), $get_array);

    // Angulos Prisma

    $arrAux = array();

    $arrAux["dist1"] = $get_array["dist1"] ?? array();
    $arrAux["dist2"] = $get_array["dist2"] ?? array();
    $arrAux["dist3"] = $get_array["dist3"] ?? array();
    $arrAux["promedio_prisma"] = $get_array["promedio_prisma"] ?? array();
    $arrAux["patron"] = $get_array["patron"] ?? array();
    $arrAux["residuo"] = $get_array["residuo"] ?? array();
    $arrAux["residuocuadratico"] = $get_array["residuocuadratico"] ?? array();

    $arrAux["txtTotalMedicion"] = $get_array["txtTotalMedicion"] ?? "";
    $arrAux["txtMedidasPosibles"] = $get_array["txtMedidasPosibles"] ?? "";
    $arrAux["txtTotalPuntosPosibles"] = $get_array["txtTotalPuntosPosibles"] ?? "";
    $arrAux["txtNumeroGradoLibertad"] = $get_array["txtNumeroGradoLibertad"] ?? "";
    $arrAux["txtSumatoriaResiduoCuadratico"] = $get_array["txtSumatoriaResiduoCuadratico"] ?? "";
    $arrAux["txtDesviacion"] = $get_array["txtDesviacion"] ?? "";

    $json_medicion = json_encode($arrAux);


    $Dato["json_medicion"] = $json_medicion;


    // Angulos Horizontales

    $arrAux = array();

    $arrAux["cara1"] = $get_array["cara1"] ?? array();
    $arrAux["cara2"] = $get_array["cara2"] ?? array();
    $arrAux["sumacara"] = $get_array["sumacara"] ?? array();
    $arrAux["promedio"] = $get_array["promedio"] ?? array();
    $arrAux["sumapromedio"] = $get_array["sumapromedio"] ?? array();
    $arrAux["promediosuma"] = $get_array["promediosuma"] ?? array();
    $arrAux["restapromedio"] = $get_array["restapromedio"] ?? array();
    $arrAux["promedioresta"] = $get_array["promedioresta"] ?? array();
    $arrAux["r"] = $get_array["r"] ?? array();
    $arrAux["r2"] = $get_array["r2"] ?? array();
    $arrAux["apertura"] = $get_array["apertura"] ?? array();
    $arrAux["paraserie"] = $get_array["paraserie"] ?? array();


    $json_angulos_h = json_encode($arrAux);

    $Dato["json_medicion"] = $json_angulos_h;


    // Angulos Verticales

    $arrAux = array();

    $arrAux["Xj1"] = $get_array["Xj1"] ?? array();
    $arrAux["Xj2"] = $get_array["Xj2"] ?? array();
    $arrAux["sigma"] = $get_array["sigma"] ?? array();
    $arrAux["xj"] = $get_array["xj"] ?? array();
    $arrAux["xk"] = $get_array["xk"] ?? array();
    $arrAux["rj1"] = $get_array["rj1"] ?? array();
    $arrAux["rj2"] = $get_array["rj2"] ?? array();
    $arrAux["sumatotalrj2"] = $get_array["sumatotalrj2"] ?? array();
    $arrAux["raizsumatoria"] = $get_array["raizsumatoria"] ?? array();

    $json_angulos_v = json_encode($arrAux);

    $Dato["json_medicion"] = $json_angulos_v;

    ##########################################

    $Dato["updated_at"] = now();

    $temp = $objReportMedicion->where("id", 1);

    $temp->update($Dato);
  }
}