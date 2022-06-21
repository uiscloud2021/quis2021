<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProfileController extends Controller
{
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        $this->middleware('can:dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = auth()->id();
        
        $user = User::where('id', '=', $current_user)->get()->first();

        return view('profile.show', compact('user'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //CONDICION PARA GUARDAR CAMBIO DE PASSWORD
        $pw_prev = $request->get('password');
        $pw_new = $request->get('new_password');
        if($pw_new==""){
            $pw=$pw_prev;
        }else{
            $pw_new = bcrypt($request->get('new_password'));
            $pw=$pw_new;
        }

        $img = $request->file('img');
        if($img!=""){
            $filename = $request->file('img')->getClientOriginalName();
            Storage::disk('profiles')->put($filename, fopen($request->file('img'), 'r+'), 'public');
        }else{
            $filename="avatar.png";
        }

        //GUARDAR Cambios
        $users = User::find($request->get('id'));
        $users -> name = $request->get('name');
        $users -> password = $pw;
        $users -> phone = $request->get('phone');
        $users -> profile_photo_path = $filename;
        //guarda
        $users -> save();

        //redirecciona a pagina
        Auth::logout();
        return redirect('/');
    }

}
