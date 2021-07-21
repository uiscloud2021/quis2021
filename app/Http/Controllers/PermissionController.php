<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:permissions.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();//Trae todos los registros de la tabla
        return view('permission.index', compact('permissions'));//le pasamos la variable articulos a nuestro index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
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
            'description' => 'required'
        ]);

        //GUARDAR REGISTROS
        $permissions = Permission::create($request->all());

        return redirect()->route('permissions.edit', $permissions)->with('info', 'El permiso se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //VALIDAR CAMPOS
        $request->validate([
            'name' => "required|unique:permissions,name,$permission->id",
            'description' => 'required'
        ]);

        //GUARDAR CAMBIOS
        $permission -> update($request->all());//GUARDAR TODOS LOS CAMBIOS

        //redirecciona a pagina edit
        return redirect()->route('permissions.edit',$permission)->with('info', 'El permiso se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $id=$permission->id;
        $delete = Permission::where('id', $id)->delete();
        return redirect()->route('permissions.index',$permission)->with('info', 'El permiso se eliminó correctamente');
    }
}
