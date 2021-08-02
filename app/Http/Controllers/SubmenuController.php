<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Menu;
use App\Models\User;

// Start of uses

class SubmenuController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:submenus.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenus = Submenu::all();
		
		return view('submenus.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();//PARA CHECKBOX
        $users = User::all();//PARA CHECKBOX
        return view('submenus.create', compact('menus', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            'name' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
		
		//GUARDAR REGISTROS
        $submenus = new Submenu();
        $submenus->name = $request->name;
	    $submenus->description = $request->description;
        $submenus->user_id = $id_user;
        $submenus -> save();

        if($request->menus){
            $submenus->menus()->attach($request->menus);//GUARDAR LAS RELACIONES
        }

        if($request->users){
            $submenus->users()->attach($request->users);//GUARDAR LAS RELACIONES
        }

		return redirect()->route('submenus.edit', $submenus)->with('info', 'El submenú se guardó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        $menus = Menu::all();//PARA CHECKBOX
        $users = User::all();//PARA CHECKBOX
        return view('submenus.edit', compact('submenu', 'menus', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
		//id usuario loggeado
        $id_user = auth()->id();

		$submenu = Submenu::find($submenu->id);
	    $submenu->name = $request->name;
	    $submenu->description = $request->description;
        $submenu->user_id = $id_user;
        $submenu->save();

        if($request->menus){
            $submenu->menus()->sync($request->menus);//CAMBIOS EN TABLA RELACION 
        }

        if($request->users){
            $submenu->users()->sync($request->users);//CAMBIOS EN TABLA RELACION 
        }
		
        return redirect()->route('submenus.edit',$submenu)->with('info', 'El submenú se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return redirect()->route('submenus.index',$submenu)->with('info', 'El submenú se eliminó correctamente');
    }

}