<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Equipamiento;

// Start of uses

class EquipamientoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:equipamiento.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
		return view('sc/equipamiento.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('sc/factibilidad.create');
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
    public function show($id)
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
        $proyecto = Proyecto::where('id', '=', $id)->get()->first();
        $equipamiento = Equipamiento::where('proyecto_id', '=', $id)->get()->first();

        if($equipamiento==""){
            return view('sc/equipamiento.create', compact('proyecto'));
        }else{
            return view('sc/equipamiento.edit', compact('proyecto', 'equipamiento'));
        }
        //return response($id);
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
        $equipamiento = Equipamiento::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
        return redirect()->route('equipamiento.index')->with('info', 'El equipamiento se eliminó correctamente');
    }




    public function list_equipamiento(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $equip = Equipamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($equip)
        ->addColumn('fecha_revision', function ($equip) {
            $html3 = $equip->no1;
            return $html3;
        })
        ->addColumn('edit', function ($equip) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equipamiento('.$equip->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($equip) {
            $html6 = '<button type="button" name="delete" id="'.$equip->id.'" onclick="delete_equipamiento('.$equip->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha_revision', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equipamiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_equip = $request->id_equipamiento;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_equipamiento;
            $proyecto_id = $request->proyectoid_equipamiento;

            if($id_equip==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $equip = Equipamiento::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($equip==""){
                    $eq= new Equipamiento();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> no7 = $request->no7;
                    $eq -> no8 = $request->no8;
                    $eq -> no9 = $request->no9;
                    $eq -> no10 = $request->no10;
                    $eq -> no11 = $request->no11;
                    $eq -> no12 = $request->no12;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Equipamiento::find($id_equip);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> no7 = $request->no7;
                $eq -> no8 = $request->no8;
                $eq -> no9 = $request->no9;
                $eq -> no10 = $request->no10;
                $eq -> no11 = $request->no11;
                $eq -> no12 = $request->no12;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equipamiento(Request $request)
    {
        if($request->ajax()){
            $id_equipamiento = $request->id_equipamiento;
            $equipamiento = Equipamiento::where('id', '=', $id_equipamiento)
            ->get()->toJson();
            return json_encode($equipamiento);
        }
    }



    public function delete_equipamiento(Request $request)
    {
        if($request->ajax()){
            $id_equipamiento = $request->id_equipamiento;
            $equipamiento = Equipamiento::where('id', $id_equipamiento)->delete();
            return response("eliminado");
        }
    }



}