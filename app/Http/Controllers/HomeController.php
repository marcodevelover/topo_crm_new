<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use PDF;
use QrCode;
use App\User;

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
        $user1 = User::where('job','Jefe de laboratorio')->first();
        // $user2 = User::where('job','Ingeniero de servicio')->first();

        $customer = $report->customer;
        $equipment = $report->equipment[0];
        $pattern = $report->pattern;
        // return View('publicpdf', compact('report','customer','equipment', 'pattern','user1','user2'));
        $view = View('publicpdf',
            compact('report','customer','equipment', 'pattern','user1')
        );
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }   
}
