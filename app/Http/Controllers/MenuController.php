<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;

// Start of uses

class MenuController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:menus.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
		
		return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();//PARA CHECKBOX
        return view('menus.create', compact('users'));
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
        $menus = new Menu();
        $menus->name = $request->name;
	    $menus->description = $request->description;
        $menus->user_id = $id_user;
        $menus -> save();

        if($request->users){
            $menus->users()->attach($request->users);//GUARDAR LAS RELACIONES
        }

		return redirect()->route('menus.edit', $menus)->with('info', 'El menú se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $users = User::all();//PARA CHECKBOX
        return view('menus.edit', compact('menu', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
		//id usuario loggeado
        $id_user = auth()->id();

		$menu = Menu::find($menu->id);
	    $menu->name = $request->name;
	    $menu->description = $request->description;
        $menu->user_id = $id_user;
        $menu->save();

        if($request->users){
            $menu->users()->sync($request->users);//CAMBIOS EN TABLA RELACION 
        }
		
        return redirect()->route('menus.edit',$menu)->with('info', 'El menú se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index',$menu)->with('info', 'El menú se eliminó correctamente');
    }

}