<?php

namespace App\Http\Controllers;

use App\User;
use File;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; 

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create',compact('user'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ],[
            'name.required' => __('I need your name')
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->rol = $request->rol;
        $user->signed = 'default.png';
        $user->password =  Hash::make($request->password);
        $user->save();

        if( $request->hasFile('signed') ){
            $user->signed = $request->file('signed')->storeAs('/public', $_FILES["signed"]["name"]);
            $user->save();
        }
        return redirect()->route('usuarios.edit', $user->id)->with(['message'=>'Usuario registrado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = User::all(); //find($id);
        $view = View('users.show', compact('users'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        request()->validate([
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => __('I need your name')
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol = $request->rol;
        $user->job = $request->job ? $request->job : $user->job;
        if( $user->password != "" ){
            $user->password =  Hash::make($request->password);
        }
       
        if( $request->hasFile('signed') ){
            Storage::delete($user->signed);
            $user->signed = $request->file('signed')->storeAs('/public', $_FILES["signed"]["name"]);
        }
        $user->save();
        return redirect()->route('usuarios.edit', $user)->with(["message"=>"Registro actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete($user->signed);
        $user->delete();
        return redirect()->route('usuarios.index')->with(['message'=>'Registro eliminado con éxito']);
    }
}
