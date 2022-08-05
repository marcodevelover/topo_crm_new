<?php

namespace App\Http\Controllers;

use App\Pattern;
use Illuminate\Http\Request;
use auth;
class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patterns = Pattern::paginate(10);
        return view('patterns.index',compact('patterns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( auth::user()->rol != 'admin'){
            return redirect()->route('certificaciones.index')->with([
                'message'=>'Acceso restringido para administradores',
                'clase' => 'warning'
            ]);
        }
        request()->validate([
            'description' => 'required',
            'certificate' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'no_serie' => 'required',
            'calibrated' => 'required',
        ],[
            'name.required' => __('I need your name')
        ]);
        
        $pattern = new Pattern();

        $pattern->description = $request->description; 
        $pattern->certificate = $request->certificate; 
        $pattern->brand = $request->brand; 
        $pattern->model = $request->model; 
        $pattern->no_serie = $request->no_serie; 
        $pattern->calibrated = $request->calibrated;
        $pattern->comments = $request->comments;
        $pattern->save();

        return redirect()->route('patrones.edit',$pattern->id)->with(['message'=>'Registro guardadi con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        if( auth::user()->rol != 'admin'){
            return redirect()->route('certificaciones.index')->with([
                'message'=>'Acceso restringido para administradores',
                'clase' => 'warning'
            ]);
        }
        return view('patterns.edit',compact('pattern'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pattern $pattern)
    {
        if( auth::user()->rol != 'admin'){
            return redirect()->route('certificaciones.index')->with([
                'message'=>'Acceso restringido para administradores',
                'clase' => 'warning'
            ]);
        }
        request()->validate([
            'description' => 'required',
            'certificate' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'no_serie' => 'required',
            'calibrated' => 'required',
        ],[
            'name.required' => __('I need your name')
        ]);
        $pattern->description = $request->description; 
        $pattern->certificate = $request->certificate; 
        $pattern->brand = $request->brand; 
        $pattern->model = $request->model; 
        $pattern->no_serie = $request->no_serie; 
        $pattern->calibrated = $request->calibrated;
        $pattern->comments = $request->comments;
        $pattern->save();

        return redirect()->route('patrones.edit',$pattern->id)->with(['message'=>'Registro actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pattern = Pattern::find($id);
        $pattern->delete();
        return redirect()->route('patrones.index')->with(['message'=>'Registro eliminado con éxito']);
    }
}
