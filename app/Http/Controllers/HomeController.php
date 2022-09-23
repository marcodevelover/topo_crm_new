<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use PDF;
use QrCode;
use App\User;
use App\ReportMedicion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function pdf($folio)
    {
      $report = Report::whereFolio($folio)->first();

      if($report->tipo == "NIVEL")
      {
        $user1 = User::where('job','Jefe de laboratorio')->first();
        // $user2 = User::where('job','Ingeniero de servicio')->first();

        $customer  = $report->customer;
        $equipment = $report->equipment[0];
        $pattern   = $report->pattern;

        $response = [];

        $response["report"]    = $report;
        $response["customer"]  = $customer;
        $response["equipment"] = $equipment;
        $response["pattern"]   = $pattern;
        $response["user1"]     = $user1;

        $view = View('publicpdf', $response);

        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view->render());

        return $pdf->stream();
      }
      elseif($report->tipo == "ESTACION")
      {
        $user1 = User::where('job','Jefe de laboratorio')->first();
        // $user2 = User::where('job','Ingeniero de servicio')->first();

        $customer  = $report->customer;
        $equipment = $report->equipment[0];
        $pattern   = $report->pattern;

        $response = [];

        $response["report"]    = $report;
        $response["customer"]  = $customer;
        $response["equipment"] = $equipment;
        $response["pattern"]   = $pattern;
        $response["user1"]     = $user1;


        $mediciones = $report->mediciones;

        foreach($mediciones as $medicion)
        {
          if($medicion->tipo == "PRISMA")
          {
            $medicion->arrMedicion = json_decode($medicion->json_medicion, true);
            $response["prisma"]  = $medicion;
/*            exit(var_dump($medicion->arrMedicion));*/
          }

          if($medicion->tipo == "ANGULOS_H")
          {
            $medicion->arrMedicion = json_decode($medicion->json_medicion, true);
            $response["angulos_h"] = $medicion;
          }

          if($medicion->tipo == "ANGULOS_V")
          {
            $medicion->arrMedicion = json_decode($medicion->json_medicion, true);
            $response["angulos_v"] = $medicion;
          }
        }

        $view = View('publicpdf_estacion', $response);

        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view->render());

        return $pdf->stream();
      }
      else
      {
        exit("El tipo de certificado no existe, consulte con soporte.");
      }
    }
}
