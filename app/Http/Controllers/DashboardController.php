<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {

        $user1 = User::where('job','Jefe de laboratorio')->first();
        $user2 = auth::user();
        $certificaciones = Report::all();
        $mes = Report::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get();
        $mes = $mes->count();
        $certificaciones = $certificaciones->count();
        $reports = Report::skip(0)->take(3)->get();
        return view('panel', compact('reports','user1','user2','certificaciones','mes'));
    }
    public function create() {
        return view('certificaciones.new');
    }
    public function labs() {
        return view('laboratorio.index');
    }
}
