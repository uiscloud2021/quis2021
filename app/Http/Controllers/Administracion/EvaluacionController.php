<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Evaluacion;
use App\Models\Administracion\Ev_Verificacion;
use App\Models\Administracion\Ev_Capacitacion;

// Start of uses

class EvaluacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:evaluacion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->get();
		return view('adm/evaluacion.index', compact('candidatos'));
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

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $evaluacion = new Evaluacion();
        }else{
            $evaluacion = Evaluacion::find($id);
        }

		//GUARDAR REGISTROS
        $evaluacion->no6 = $request->no6;
        $evaluacion->no7 = $request->no7;
        $evaluacion->no8 = $request->no8;
        $evaluacion->is_active = 1;
        $evaluacion->candidato_id = $request->candidato_id;
        $evaluacion->empresa_id = $request->empresa_id;
        $evaluacion->id_user = $id_user;
        $evaluacion -> save();

		return redirect()->route('evaluacion.edit', $request->candidato_id)->with('info', 'La evaluación se guardó correctamente');
        
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
        $candidato = Reclutamiento::where('id', '=', $id)->get()->first();
        $evaluacion = Evaluacion::where('candidato_id', '=', $id)->get()->first();

        if($evaluacion==""){
            return view('adm/evaluacion.create', compact('candidato'));
        }else{
            return view('adm/evaluacion.edit', compact('candidato', 'evaluacion'));
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
		
        //id usuario loggeado
        $id_user = auth()->id();

		$evaluacion = Evaluacion::find($request->id);
        $evaluacion->no6 = $request->no6;
        $evaluacion->no7 = $request->no7;
        $evaluacion->no8 = $request->no8;
        $evaluacion->is_active = 1;
        $evaluacion->candidato_id = $request->candidato_id;
        $evaluacion->empresa_id = $request->empresa_id;
        $evaluacion->id_user = $id_user;
        $evaluacion -> save();
		
        return redirect()->route('evaluacion.edit', $request->candidato_id)->with('info', 'La evaluación se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $verificacion = Ev_Verificacion::where('candidato_id', $id)->delete();
        $capacitacion = Ev_Capacitacion::where('candidato_id', $id)->delete();
        $evaluacion = Evaluacion::where('candidato_id', $id)->delete();
        return redirect()->route('evaluacion.index')->with('info', 'La evaluación se eliminó correctamente');
    }



    public function guardar_evaluacion(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $evaluacion = new Evaluacion();
                $evaluacion->no6 = $request->no6;
                $evaluacion->no7 = $request->no7;
                $evaluacion->no8 = $request->no8;
                $evaluacion->is_active = 1;
                $evaluacion->candidato_id = $request->candidato_id;
                $evaluacion->empresa_id = $request->empresa_id;
                $evaluacion->id_user = $user_id;
                $evaluacion -> save();
                //SACAR EL ID
                $id = $evaluacion->id;
            }
            return response($id);
        }
    }



    public function list_verificacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $verificacion = Ev_Verificacion::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($verificacion)
        ->addColumn('fecha', function ($verificacion) {
            $html3 = $verificacion->no1;
            return $html3;
        })
        ->addColumn('persona', function ($verificacion) {
            $html4 = $verificacion->no2;
            return $html4;
        })
        ->addColumn('edit', function ($verificacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_verificacion('.$verificacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($verificacion) {
            $html6 = '<button type="button" name="delete" id="'.$verificacion->id.'" onclick="delete_verificacion('.$verificacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'persona', 'edit', 'delete'])
        ->make(true);
    }



    public function create_verificacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_verificacion = $request->id_verificacion;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_verificacion;
            $candidato_id = $request->candidatoid_verificacion;
            $evaluacion_id = $request->evaluacionid_verificacion;

            if($id_verificacion==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $verificacion = Ev_Verificacion::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($verificacion==""){
                    $eq = new Ev_Verificacion();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> evaluacion_id = $evaluacion_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Ev_Verificacion::find($id_verificacion);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> evaluacion_id = $evaluacion_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_verificacion(Request $request)
    {
        if($request->ajax()){
            $id_verificacion = $request->id_verificacion;
            $verificacion = Ev_Verificacion::where('id', '=', $id_verificacion)
            ->get()->toJson();
            return json_encode($verificacion);
        }
    }



    public function delete_verificacion(Request $request)
    {
        if($request->ajax()){
            $id_verificacion = $request->id_verificacion;
            $verificacion = Ev_Verificacion::where('id', $id_verificacion)->delete();
            return response("eliminado");
        }
    }





    public function list_capacitacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $capacitacion = Ev_Capacitacion::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no3')->get();
        
        return datatables()->of($capacitacion)
        ->addColumn('capacitacion', function ($capacitacion) {
            $html3 = $capacitacion->no3;
            return $html3;
        })
        ->addColumn('fecha1', function ($capacitacion) {
            $html4 = $capacitacion->no4;
            return $html4;
        })
        ->addColumn('edit', function ($capacitacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_capacitacion('.$capacitacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($capacitacion) {
            $html6 = '<button type="button" name="delete" id="'.$capacitacion->id.'" onclick="delete_capacitacion('.$capacitacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['capacitacion', 'fecha1', 'edit', 'delete'])
        ->make(true);
    }



    public function create_capacitacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_capacitacion = $request->id_capacitacion;
            $no4 = $request->no4;
            $empresa_id = $request->empresaid_capacitacion;
            $candidato_id = $request->candidatoid_capacitacion;
            $evaluacion_id = $request->evaluacionid_capacitacion;

            if($id_capacitacion==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $capacitacion = Ev_Capacitacion::where('no4', '=', $no4)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($capacitacion==""){
                    $eq = new Ev_Capacitacion();
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> no5 = $request->no5;
                    $eq -> evaluacion_id = $evaluacion_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Ev_Capacitacion::find($id_capacitacion);
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> no5 = $request->no5;
                $eq -> evaluacion_id = $evaluacion_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_capacitacion(Request $request)
    {
        if($request->ajax()){
            $id_capacitacion = $request->id_capacitacion;
            $capacitacion = Ev_Capacitacion::where('id', '=', $id_capacitacion)
            ->get()->toJson();
            return json_encode($capacitacion);
        }
    }



    public function delete_capacitacion(Request $request)
    {
        if($request->ajax()){
            $id_capacitacion = $request->id_capacitacion;
            $capacitacion = Ev_Capacitacion::where('id', $id_capacitacion)->delete();
            return response("eliminado");
        }
    }


}