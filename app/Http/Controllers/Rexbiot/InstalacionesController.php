<?php

namespace App\Http\Controllers\Rexbiot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rexbiot\Instalaciones;
use App\Models\Rexbiot\Mantenimiento;

// Start of uses

class InstalacionesController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:instalaciones.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instalaciones = Instalaciones::where('empresa_id', '=', session('id_empresa'))
        ->pluck('no1', 'id');
        return view('rexbiot/instalaciones.index', compact('instalaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Potrero $potrero)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }



    public function list_instalacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $instalacion = Instalaciones::where('empresa_id', $empresa_id)
        ->orderBy('no1')->get();
        
        return datatables()->of($instalacion)
        ->addColumn('nombre', function ($instalacion) {
            $html3 = $instalacion->no1;
            return $html3;
        })
        ->addColumn('utilidad', function ($instalacion) {
            $html3 = $instalacion->no2;
            return $html3;
        })
        ->addColumn('estado', function ($instalacion) {
            $html3 = $instalacion->no4;
            return $html3;
        })
        ->addColumn('edit', function ($instalacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_instalacion('.$instalacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($instalacion) {
            $html6 = '<button type="button" name="delete" id="'.$instalacion->id.'" onclick="delete_instalacion('.$instalacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'utilidad', 'estado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_instalacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_instalacion = $request->id_instalacion;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_instalacion;

            if($id_instalacion==""){
                $instalacion = Instalaciones::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($instalacion==""){
                    $cons = new Instalaciones();
                    $cons -> no1 = $request->no1;
                    $cons -> no2 = $request->no2;
                    $cons -> no3 = $request->no3;
                    $cons -> no4 = $request->no4;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Instalaciones::find($id_instalacion);
                $cons -> no1 = $request->no1;
                $cons -> no2 = $request->no2;
                $cons -> no3 = $request->no3;
                $cons -> no4 = $request->no4;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_instalacion(Request $request)
    {
        if($request->ajax()){
            $id_instalacion = $request->id_instalacion;
            $instalacion = Instalaciones::where('id', '=', $id_instalacion)
            ->get()->toJson();
            return json_encode($instalacion);
        }
    }



    public function delete_instalacion(Request $request)
    {
        if($request->ajax()){
            $id_instalacion = $request->id_instalacion;
            $instalacion = Instalaciones::where('id', $id_instalacion)->delete();
            return response("eliminado");
        }
    }






    public function list_mantenimiento(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $mantenimiento = Mantenimiento::where('empresa_id', $empresa_id)->orderBy('no5')->get();
        
        return datatables()->of($mantenimiento)
        ->addColumn('fecha', function ($mantenimiento) {
            $html3 = $mantenimiento->no5;
            return $html3;
        })
        ->addColumn('instalacion', function ($mantenimiento) {
            $html2 = $mantenimiento->no6;
            $inst = Instalaciones::where('id', '=', $html2)
            ->first();
            $nomb=$inst->no1;
            return $nomb;
        })
        ->addColumn('obra', function ($mantenimiento) {
            $html2 = $mantenimiento->no7;
            return $html2;
        })
        ->addColumn('edit', function ($mantenimiento) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_mantenimiento('.$mantenimiento->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($mantenimiento) {
            $html6 = '<button type="button" name="delete" id="'.$mantenimiento->id.'" onclick="delete_mantenimiento('.$mantenimiento->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'instalacion', 'obra', 'edit', 'delete'])
        ->make(true);
    }



    public function create_mantenimiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_mantenimiento = $request->id_mantenimiento;
            $no5 = $request->no5;
            $empresa_id = $request->empresaid_mantenimiento;

            if($id_mantenimiento==""){
                $mantenimiento = Mantenimiento::where('no5', '=', $no5)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($mantenimiento==""){
                    $cons = new Mantenimiento();
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Mantenimiento::find($id_mantenimiento);
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_mantenimiento(Request $request)
    {
        if($request->ajax()){
            $id_mantenimiento = $request->id_mantenimiento;
            $mantenimiento = Mantenimiento::where('id', '=', $id_mantenimiento)
            ->get()->toJson();
            return json_encode($mantenimiento);
        }
    }



    public function delete_mantenimiento(Request $request)
    {
        if($request->ajax()){
            $id_mantenimiento = $request->id_mantenimiento;
            $mantenimiento = Mantenimiento::where('id', $id_mantenimiento)->delete();
            return response("eliminado");
        }
    }


}