<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Instalacion;

// Start of uses

class InstalacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:instalacion.index');//PROTEGE TODAS LAS RUTAS
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
		return view('sc/instalacion.index', compact('proyectos'));
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
        $instalacion = Instalacion::where('proyecto_id', '=', $id)->get()->first();

        if($instalacion==""){
            return view('sc/instalacion.create', compact('proyecto'));
        }else{
            return view('sc/instalacion.edit', compact('proyecto', 'instalacion'));
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
        $instalacion = Instalacion::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
        return redirect()->route('instalacion.index')->with('info', 'La instalación se eliminó correctamente');
    }




    public function list_instalacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $ins = Instalacion::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($ins)
        ->addColumn('fecha_revision', function ($ins) {
            $html3 = $ins->no1;
            return $html3;
        })
        ->addColumn('edit', function ($ins) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_instalacion('.$ins->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($ins) {
            $html6 = '<button type="button" name="delete" id="'.$ins->id.'" onclick="delete_instalacion('.$ins->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha_revision', 'edit', 'delete'])
        ->make(true);
    }



    public function create_instalacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_ins = $request->id_instalacion;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_instalacion;
            $proyecto_id = $request->proyectoid_instalacion;

            if($id_ins==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $ins = Instalacion::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($ins==""){
                    $in= new Instalacion();
                    $in -> no1 = $request->no1;
                    $in -> no2 = $request->no2;
                    $in -> no3 = $request->no3;
                    $in -> no4 = $request->no4;
                    $in -> no5 = $request->no5;
                    $in -> no6 = $request->no6;
                    $in -> no7 = $request->no7;
                    $in -> no8 = $request->no8;
                    $in -> no9 = $request->no9;
                    $in -> no10 = $request->no10;
                    $in -> proyecto_id = $proyecto_id;
                    $in -> empresa_id = $empresa_id;
                    $in -> id_user = $user_id;
                    $in -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $in = Instalacion::find($id_ins);
                $in -> no1 = $request->no1;
                $in -> no2 = $request->no2;
                $in -> no3 = $request->no3;
                $in -> no4 = $request->no4;
                $in -> no5 = $request->no5;
                $in -> no6 = $request->no6;
                $in -> no7 = $request->no7;
                $in -> no8 = $request->no8;
                $in -> no9 = $request->no9;
                $in -> no10 = $request->no10;
                $in -> proyecto_id = $proyecto_id;
                $in -> empresa_id = $empresa_id;
                $in -> id_user = $user_id;
                $in -> save();
                return response("guardado");
            }
        }
    }



    public function edit_instalacion(Request $request)
    {
        if($request->ajax()){
            $id_ins = $request->id_instalacion;
            $ins = Instalacion::where('id', '=', $id_ins)
            ->get()->toJson();
            return json_encode($ins);
        }
    }



    public function delete_instalacion(Request $request)
    {
        if($request->ajax()){
            $id_ins = $request->id_instalacion;
            $ins = Instalacion::where('id', $id_ins)->delete();
            return response("eliminado");
        }
    }



}