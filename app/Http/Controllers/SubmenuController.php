<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Menu;
use App\Models\User;
use Spatie\Permission\Models\Permission;

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
        $menus = Menu::where('tiene_submenu', '=', 'Si')->get();//PARA CHECKBOX
        return view('submenus.create', compact('menus'));
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
            'description' => 'required',
            'position' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();

        //QUITAR ACENTOS Y DEJAR EL NOMBRE EN MINUSCULAS PARA LOS PERMISOS.
        $cadena=$request->name;
        $name_acento = strtr(utf8_decode($cadena), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		$name_orig = strtolower($name_acento);
        $name = str_replace(" ", "_", $name_orig);

        $permission_index = $name.".index";
        $description_index = "Lista de ".$cadena;
        $permission_create = $name.".create";
        $description_create = "Agregar ".$cadena;
        $permission_edit = $name.".edit";
        $description_edit = "Editar ".$cadena;
        $permission_destroy = $name.".destroy";
        $description_destroy = "Eliminar ".$cadena;
		
		//GUARDAR REGISTROS
        $submenus = new Submenu();
        $submenus->name = $request->name;
	    $submenus->description = $request->description;
        $submenus->position = $request->position;
        $submenus->name_permission = $name;
        $submenus->id_user = $id_user;
        $submenus -> save();

        //GUARDAR PERMISOS
        //INDEX
        $permisos = new Permission();
        $permisos->name = $permission_index;
	    $permisos->description = $description_index;
        $permisos->guard_name = "web";
        $permisos -> save();
        //CREATE
        $permisos = new Permission();
        $permisos->name = $permission_create;
	    $permisos->description = $description_create;
        $permisos->guard_name = "web";
        $permisos -> save();
        //EDIT
        $permisos = new Permission();
        $permisos->name = $permission_edit;
	    $permisos->description = $description_edit;
        $permisos->guard_name = "web";
        $permisos -> save();
        //DESTROY
        $permisos = new Permission();
        $permisos->name = $permission_destroy;
	    $permisos->description = $description_destroy;
        $permisos->guard_name = "web";
        $permisos -> save();

        if($request->menus){
            $submenus->menus()->attach($request->menus);//GUARDAR LAS RELACIONES
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
        $menus = Menu::where('tiene_submenu', '=', 'Si')->get();//PARA CHECKBOX
        return view('submenus.edit', compact('submenu', 'menus'));
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
        //VALIDAR CAMPOS
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
        ]);

		//id usuario loggeado
        $id_user = auth()->id();

        //NORMBRE ORIGINAL DEL SUBMENU
        $name_submenu = $submenu->name;

        $name_new = $request->name;
        
        if($name_new != $name_submenu){
            //QUITAR ACENTOS, QUITAR ESPACIO EN BLANCO Y DEJAR EL NOMBRE EN MINUSCULAS PARA LOS PERMISOS
            $name_acento = strtr(utf8_decode($name_submenu), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		    $name_orig = strtolower($name_acento);
            $name = str_replace(" ", "_", $name_orig);

            $name_index = $name.".index";
            $name_create = $name.".create";
            $name_edit = $name.".edit";
            $name_destroy = $name.".destroy";

            $name_sin_acento = strtr(utf8_decode($name_new), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		    $name_min = strtolower($name_sin_acento);
            $name_esp = str_replace(" ", "_", $name_min);

            $permission_index = $name_esp.".index";
            $description_index = "Lista de ".$name_new;
            $permission_create = $name_esp.".create";
            $description_create = "Agregar ".$name_new;
            $permission_edit = $name_esp.".edit";
            $description_edit = "Editar ".$name_new;
            $permission_destroy = $name_esp.".destroy";
            $description_destroy = "Eliminar ".$name_new;

            //CONSULTA INDEX
            $permiso_index = Permission::where('name', '=', $name_index)->get()->first();
            $id_index = $permiso_index->id;
            $cons_index = Permission::find($id_index);
	        $cons_index->name = $permission_index;
            $cons_index->description = $description_index;
            $cons_index->save();

            //CONSULTA CREATE
            $permiso_create = Permission::where('name', '=', $name_create)->get()->first();
            $id_create = $permiso_create->id;
            $cons_create = Permission::find($id_create);
	        $cons_create->name = $permission_create;
            $cons_create->description = $description_create;
            $cons_create->save();

            //CONSULTA EDIT
            $permiso_edit = Permission::where('name', '=', $name_edit)->get()->first();
            $id_edit = $permiso_edit->id;
            $cons_edit = Permission::find($id_edit);
	        $cons_edit->name = $permission_edit;
            $cons_edit->description = $description_edit;
            $cons_edit->save();

            //CONSULTA DESTROY
            $permiso_destroy = Permission::where('name', '=', $name_destroy)->get()->first();
            $id_destroy = $permiso_destroy->id;
            $cons_destroy = Permission::find($id_destroy);
	        $cons_destroy->name = $permission_destroy;
            $cons_destroy->description = $description_destroy;
            $cons_destroy->save();

            $submenu = Submenu::find($submenu->id);
	        $submenu->name_permission = $name_esp;
            $submenu->save();
        }

		$submenu = Submenu::find($submenu->id);
	    $submenu->name = $request->name;
	    $submenu->description = $request->description;
        $submenu->position = $request->position;
        $submenu->id_user = $id_user;
        $submenu->save();

        if($request->menus){
            $submenu->menus()->sync($request->menus);//CAMBIOS EN TABLA RELACION 
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
        $name_submenu = $submenu->name;
        $name_acento = strtr(utf8_decode($name_submenu), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		$name_orig = strtolower($name_acento);
        $name = str_replace(" ", "_", $name_orig);

        $name_index = $name.".index";
        $name_create = $name.".create";
        $name_edit = $name.".edit";
        $name_destroy = $name.".destroy";

        //ELIMINAR PERMISOS
        $permiso_index = Permission::where('name', '=', $name_index)->delete();
        $permiso_create = Permission::where('name', '=', $name_create)->delete();
        $permiso_edit = Permission::where('name', '=', $name_edit)->delete();
        $permiso_destroy = Permission::where('name', '=', $name_destroy)->delete();

        $submenu->delete();
        return redirect()->route('submenus.index',$submenu)->with('info', 'El submenú se eliminó correctamente');
    }

}