<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Capacitacion\Diagnostico;
use App\Models\Capacitacion\Diagnostico_Fecha;
use App\Models\Capacitacion\Diagnostico_Conocimiento;
use App\Models\Capacitacion\Diagnostico_Habilidad;
use App\Models\Capacitacion\Diagnostico_Aptitud;
use App\Models\Capacitacion\Diagnostico_Capacitacion;
use App\Models\Capacitacion\Diagnostico_Area;
use App\Models\Capacitacion\Diagnostico_Grado;
use App\Models\Capacitacion\Diagnostico_Propuesta;

// Start of uses

class DiagnosticoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:diagnostico.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->get();
		return view('capacitacion/diagnostico.index', compact('candidatos'));
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
            $diagnostico = new Diagnostico();
        }else{
            $diagnostico = Diagnostico::find($id);
        }

		//GUARDAR REGISTROS
        $diagnostico->no4 = $request->no4;
        $diagnostico->no7 = $request->no7;
        $diagnostico->no10 = $request->no10;
        $diagnostico->no11 = $request->no11;
        $diagnostico->no12 = $request->no12;
        $diagnostico->no15 = $request->no15;
        $diagnostico->no16 = $request->no16;
        $diagnostico->no17 = $request->no17;
        $diagnostico->no20 = $request->no20;
        $diagnostico->no21 = $request->no21;
        $diagnostico->no22 = $request->no22;
        $diagnostico->no23 = $request->no23;
        $diagnostico->no24 = $request->no24;
        $diagnostico->no25 = $request->no25;
        $diagnostico->no26 = $request->no26;
        $diagnostico->no27 = $request->no27;
        $diagnostico->no28 = $request->no28;
        $diagnostico->no29 = $request->no29;
        $diagnostico->no30 = $request->no30;
        $diagnostico->no31 = $request->no31;
        $diagnostico->no32 = $request->no32;
        $diagnostico->no33 = $request->no33;
        $diagnostico->no34 = $request->no34;
        $diagnostico->no37 = $request->no37;
        $diagnostico->is_active = 1;
        $diagnostico->candidato_id = $request->candidato_id;
        $diagnostico->empresa_id = $request->empresa_id;
        $diagnostico->id_user = $id_user;
        $diagnostico -> save();

		return redirect()->route('diagnostico.edit', $request->candidato_id)->with('info', 'el diagnóstico se guardó correctamente');
        
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
        $diagnostico = Diagnostico::where('candidato_id', '=', $id)->get()->first();
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        $num_empleados = Reclutamiento::count();

        if($diagnostico==""){
            return view('capacitacion/diagnostico.create', compact('candidato', 'empleados', 'num_empleados'));
        }else{
            return view('capacitacion/diagnostico.edit', compact('candidato', 'diagnostico', 'empleados', 'num_empleados'));
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

		$diagnostico = Diagnostico::find($request->id);
        $diagnostico->no4 = $request->no4;
        $diagnostico->no7 = $request->no7;
        $diagnostico->no10 = $request->no10;
        $diagnostico->no11 = $request->no11;
        $diagnostico->no12 = $request->no12;
        $diagnostico->no15 = $request->no15;
        $diagnostico->no16 = $request->no16;
        $diagnostico->no17 = $request->no17;
        $diagnostico->no20 = $request->no20;
        $diagnostico->no21 = $request->no21;
        $diagnostico->no22 = $request->no22;
        $diagnostico->no23 = $request->no23;
        $diagnostico->no24 = $request->no24;
        $diagnostico->no25 = $request->no25;
        $diagnostico->no26 = $request->no26;
        $diagnostico->no27 = $request->no27;
        $diagnostico->no28 = $request->no28;
        $diagnostico->no29 = $request->no29;
        $diagnostico->no30 = $request->no30;
        $diagnostico->no31 = $request->no31;
        $diagnostico->no32 = $request->no32;
        $diagnostico->no33 = $request->no33;
        $diagnostico->no34 = $request->no34;
        $diagnostico->no37 = $request->no37;
        $diagnostico->is_active = 1;
        $diagnostico->candidato_id = $request->candidato_id;
        $diagnostico->empresa_id = $request->empresa_id;
        $diagnostico->id_user = $id_user;
        $diagnostico -> save();
		
        return redirect()->route('diagnostico.edit', $request->candidato_id)->with('info', 'El diagnóstico se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $fecha = Diagnostico_Fecha::where('candidato_id', $id)->delete();
        $conoc = Diagnostico_Conocimiento::where('candidato_id', $id)->delete();
        $habilidad = Diagnostico_Habilidad::where('candidato_id', $id)->delete();
        $aptitud = Diagnostico_Aptitud::where('candidato_id', $id)->delete();
        $capa = Diagnostico_Capacitacion::where('candidato_id', $id)->delete();
        $area = Diagnostico_Area::where('candidato_id', $id)->delete();
        $grado = Diagnostico_Grado::where('candidato_id', $id)->delete();
        $prop = Diagnostico_Propuesta::where('candidato_id', $id)->delete();
        $diagnostico = Diagnostico::where('candidato_id', $id)->delete();
        return redirect()->route('diagnostico.index')->with('info', 'El diagnóstico se eliminó correctamente');
    }



    public function guardar_diagnostico(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $diagnostico = new Diagnostico();
                $diagnostico->no4 = $request->no4;
                $diagnostico->no7 = $request->no7;
                $diagnostico->no10 = $request->no10;
                $diagnostico->no11 = $request->no11;
                $diagnostico->no12 = $request->no12;
                $diagnostico->no15 = $request->no15;
                $diagnostico->no16 = $request->no16;
                $diagnostico->no17 = $request->no17;
                $diagnostico->no20 = $request->no20;
                $diagnostico->no21 = $request->no21;
                $diagnostico->no22 = $request->no22;
                $diagnostico->no23 = $request->no23;
                $diagnostico->no24 = $request->no24;
                $diagnostico->no25 = $request->no25;
                $diagnostico->no26 = $request->no26;
                $diagnostico->no27 = $request->no27;
                $diagnostico->no28 = $request->no28;
                $diagnostico->no29 = $request->no29;
                $diagnostico->no30 = $request->no30;
                $diagnostico->no31 = $request->no31;
                $diagnostico->no32 = $request->no32;
                $diagnostico->no33 = $request->no33;
                $diagnostico->no34 = $request->no34;
                $diagnostico->no37 = $request->no37;
                $diagnostico->is_active = 1;
                $diagnostico->candidato_id = $request->candidato_id;
                $diagnostico->empresa_id = $request->empresa_id;
                $diagnostico->id_user = $user_id;
                $diagnostico -> save();
                //SACAR EL ID
                $id = $diagnostico->id;
            }
            return response($id);
        }
    }



    public function list_fecha(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $fecha = Diagnostico_Fecha::where('candidato_id', $candidato_id)
        ->orderBy('no1')->get();
        
        return datatables()->of($fecha)
        ->addColumn('fecha', function ($fecha) {
            $html3 = $fecha->no1;
            return $html3;
        })
        ->addColumn('edit', function ($fecha) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_fecha('.$fecha->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($fecha) {
            $html6 = '<button type="button" name="delete" id="'.$fecha->id.'" onclick="delete_fecha('.$fecha->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_fecha(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_fecha = $request->id_fecha;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_fecha;
            $candidato_id = $request->candidatoid_fecha;
            $diagnostico_id = $request->diagnosticoid_fecha;

            if($id_fecha==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $fecha = Diagnostico_Fecha::where('no1', '=', $no1)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($fecha==""){
                    $eq = new Diagnostico_Fecha();
                    $eq -> no1 = $request->no1;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Fecha::find($id_fecha);
                $eq -> no1 = $request->no1;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_fecha(Request $request)
    {
        if($request->ajax()){
            $id_fecha = $request->id_fecha;
            $fecha = Diagnostico_Fecha::where('id', '=', $id_fecha)
            ->get()->toJson();
            return json_encode($fecha);
        }
    }



    public function delete_fecha(Request $request)
    {
        if($request->ajax()){
            $id_fecha = $request->id_fecha;
            $fecha = Diagnostico_Fecha::where('id', $id_fecha)->delete();
            return response("eliminado");
        }
    }





    public function list_conocimiento(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $conocimiento = Diagnostico_Conocimiento::where('candidato_id', $candidato_id)
        ->orderBy('no2')->get();
        
        return datatables()->of($conocimiento)
        ->addColumn('conocimiento', function ($conocimiento) {
            $html3 = $conocimiento->no2;
            return $html3;
        })
        ->addColumn('cumple', function ($conocimiento) {
            $html3 = $conocimiento->no3;
            return $html3;
        })
        ->addColumn('edit', function ($conocimiento) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_conocimiento('.$conocimiento->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($conocimiento) {
            $html6 = '<button type="button" name="delete" id="'.$conocimiento->id.'" onclick="delete_conocimiento('.$conocimiento->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['conocimiento', 'cumple', 'edit', 'delete'])
        ->make(true);
    }



    public function create_conocimiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_conocimiento = $request->id_conocimiento;
            $no2 = $request->no2;
            $empresa_id = $request->empresaid_conocimiento;
            $candidato_id = $request->candidatoid_conocimiento;
            $diagnostico_id = $request->diagnosticoid_conocimiento;

            if($id_conocimiento==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $conocimiento = Diagnostico_Conocimiento::where('no2', '=', $no2)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($conocimiento==""){
                    $eq = new Diagnostico_Conocimiento();
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Conocimiento::find($id_conocimiento);
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_conocimiento(Request $request)
    {
        if($request->ajax()){
            $id_conocimiento = $request->id_conocimiento;
            $conocimiento = Diagnostico_Conocimiento::where('id', '=', $id_conocimiento)
            ->get()->toJson();
            return json_encode($conocimiento);
        }
    }



    public function delete_conocimiento(Request $request)
    {
        if($request->ajax()){
            $id_conocimiento = $request->id_conocimiento;
            $conocimiento = Diagnostico_Conocimiento::where('id', $id_conocimiento)->delete();
            return response("eliminado");
        }
    }





    public function list_habilidad(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $habilidad = Diagnostico_Habilidad::where('candidato_id', $candidato_id)
        ->orderBy('no5')->get();
        
        return datatables()->of($habilidad)
        ->addColumn('habilidad', function ($habilidad) {
            $html3 = $habilidad->no5;
            return $html3;
        })
        ->addColumn('cumple', function ($habilidad) {
            $html3 = $habilidad->no6;
            return $html3;
        })
        ->addColumn('edit', function ($habilidad) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_habilidad('.$habilidad->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($habilidad) {
            $html6 = '<button type="button" name="delete" id="'.$habilidad->id.'" onclick="delete_habilidad('.$habilidad->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['habilidad', 'cumple', 'edit', 'delete'])
        ->make(true);
    }



    public function create_habilidad(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_habilidad = $request->id_habilidad;
            $no5 = $request->no5;
            $empresa_id = $request->empresaid_habilidad;
            $candidato_id = $request->candidatoid_habilidad;
            $diagnostico_id = $request->diagnosticoid_habilidad;

            if($id_habilidad==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $habilidad = Diagnostico_Habilidad::where('no5', '=', $no5)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($habilidad==""){
                    $eq = new Diagnostico_Habilidad();
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Habilidad::find($id_habilidad);
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_habilidad(Request $request)
    {
        if($request->ajax()){
            $id_habilidad = $request->id_habilidad;
            $habilidad = Diagnostico_Habilidad::where('id', '=', $id_habilidad)
            ->get()->toJson();
            return json_encode($habilidad);
        }
    }



    public function delete_habilidad(Request $request)
    {
        if($request->ajax()){
            $id_habilidad = $request->id_habilidad;
            $habilidad = Diagnostico_Habilidad::where('id', $id_habilidad)->delete();
            return response("eliminado");
        }
    }





    public function list_aptitud(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $aptitud = Diagnostico_Aptitud::where('candidato_id', $candidato_id)
        ->orderBy('no8')->get();
        
        return datatables()->of($aptitud)
        ->addColumn('aptitud', function ($aptitud) {
            $html3 = $aptitud->no8;
            return $html3;
        })
        ->addColumn('cumple', function ($aptitud) {
            $html3 = $aptitud->no9;
            return $html3;
        })
        ->addColumn('edit', function ($aptitud) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_aptitud('.$aptitud->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($aptitud) {
            $html6 = '<button type="button" name="delete" id="'.$aptitud->id.'" onclick="delete_aptitud('.$aptitud->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['aptitud', 'cumple', 'edit', 'delete'])
        ->make(true);
    }



    public function create_aptitud(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_aptitud = $request->id_aptitud;
            $no8 = $request->no8;
            $empresa_id = $request->empresaid_aptitud;
            $candidato_id = $request->candidatoid_aptitud;
            $diagnostico_id = $request->diagnosticoid_aptitud;

            if($id_aptitud==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $aptitud = Diagnostico_Aptitud::where('no8', '=', $no8)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($aptitud==""){
                    $eq = new Diagnostico_Aptitud();
                    $eq -> no8 = $request->no8;
                    $eq -> no9 = $request->no9;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Aptitud::find($id_aptitud);
                $eq -> no8 = $request->no8;
                $eq -> no9 = $request->no9;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_aptitud(Request $request)
    {
        if($request->ajax()){
            $id_aptitud = $request->id_aptitud;
            $aptitud = Diagnostico_Aptitud::where('id', '=', $id_aptitud)
            ->get()->toJson();
            return json_encode($aptitud);
        }
    }



    public function delete_aptitud(Request $request)
    {
        if($request->ajax()){
            $id_aptitud = $request->id_aptitud;
            $aptitud = Diagnostico_Aptitud::where('id', $id_aptitud)->delete();
            return response("eliminado");
        }
    }





    public function list_capacitacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $capacitacion = Diagnostico_Capacitacion::where('candidato_id', $candidato_id)
        ->orderBy('no13')->get();
        
        return datatables()->of($capacitacion)
        ->addColumn('capacitacion', function ($capacitacion) {
            $html3 = $capacitacion->no13;
            return $html3;
        })
        ->addColumn('fecha', function ($capacitacion) {
            $html3 = $capacitacion->no14;
            return $html3;
        })
        ->addColumn('edit', function ($capacitacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_capacitacion('.$capacitacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($capacitacion) {
            $html6 = '<button type="button" name="delete" id="'.$capacitacion->id.'" onclick="delete_capacitacion('.$capacitacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['capacitacion', 'fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_capacitacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_capacitacion = $request->id_capacitacion;
            $no13 = $request->no13;
            $empresa_id = $request->empresaid_capacitacion;
            $candidato_id = $request->candidatoid_capacitacion;
            $diagnostico_id = $request->diagnosticoid_capacitacion;

            if($id_capacitacion==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $capacitacion = Diagnostico_Capacitacion::where('no13', '=', $no13)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($capacitacion==""){
                    $eq = new Diagnostico_Capacitacion();
                    $eq -> no13 = $request->no13;
                    $eq -> no14 = $request->no14;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Capacitacion::find($id_capacitacion);
                $eq -> no13 = $request->no13;
                $eq -> no14 = $request->no14;
                $eq -> diagnostico_id = $diagnostico_id;
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
            $capacitacion = Diagnostico_Capacitacion::where('id', '=', $id_capacitacion)
            ->get()->toJson();
            return json_encode($capacitacion);
        }
    }



    public function delete_capacitacion(Request $request)
    {
        if($request->ajax()){
            $id_capacitacion = $request->id_capacitacion;
            $capacitacion = Diagnostico_Capacitacion::where('id', $id_capacitacion)->delete();
            return response("eliminado");
        }
    }





    public function list_area(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $area = Diagnostico_Area::where('candidato_id', $candidato_id)
        ->orderBy('no18')->get();
        
        return datatables()->of($area)
        ->addColumn('area', function ($area) {
            $html3 = $area->no18;
            return $html3;
        })
        ->addColumn('edit', function ($area) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_area('.$area->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($area) {
            $html6 = '<button type="button" name="delete" id="'.$area->id.'" onclick="delete_area('.$area->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['area', 'edit', 'delete'])
        ->make(true);
    }



    public function create_area(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_area = $request->id_area;
            $no18 = $request->no18;
            $empresa_id = $request->empresaid_area;
            $candidato_id = $request->candidatoid_area;
            $diagnostico_id = $request->diagnosticoid_area;

            if($id_area==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $area = Diagnostico_Area::where('no18', '=', $no18)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($area==""){
                    $eq = new Diagnostico_Area();
                    $eq -> no18 = $request->no18;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Area::find($id_area);
                $eq -> no18 = $request->no18;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_area(Request $request)
    {
        if($request->ajax()){
            $id_area = $request->id_area;
            $area = Diagnostico_Area::where('id', '=', $id_area)
            ->get()->toJson();
            return json_encode($area);
        }
    }



    public function delete_area(Request $request)
    {
        if($request->ajax()){
            $id_area = $request->id_area;
            $area = Diagnostico_Area::where('id', $id_area)->delete();
            return response("eliminado");
        }
    }





    public function list_grado(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $grado = Diagnostico_Grado::where('candidato_id', $candidato_id)
        ->orderBy('no19')->get();
        
        return datatables()->of($grado)
        ->addColumn('grado', function ($grado) {
            $html3 = $grado->no19;
            return $html3;
        })
        ->addColumn('edit', function ($grado) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_grado('.$grado->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($grado) {
            $html6 = '<button type="button" name="delete" id="'.$grado->id.'" onclick="delete_grado('.$grado->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['grado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_grado(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_grado = $request->id_grado;
            $no19 = $request->no19;
            $empresa_id = $request->empresaid_grado;
            $candidato_id = $request->candidatoid_grado;
            $diagnostico_id = $request->diagnosticoid_grado;

            if($id_grado==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $grado = Diagnostico_Grado::where('no19', '=', $no19)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($grado==""){
                    $eq = new Diagnostico_Grado();
                    $eq -> no19 = $request->no19;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Grado::find($id_grado);
                $eq -> no19 = $request->no19;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_grado(Request $request)
    {
        if($request->ajax()){
            $id_grado = $request->id_grado;
            $grado = Diagnostico_Grado::where('id', '=', $id_grado)
            ->get()->toJson();
            return json_encode($grado);
        }
    }



    public function delete_grado(Request $request)
    {
        if($request->ajax()){
            $id_grado = $request->id_grado;
            $grado = Diagnostico_Grado::where('id', $id_grado)->delete();
            return response("eliminado");
        }
    }





    public function list_propuesta(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $propuesta = Diagnostico_Propuesta::where('candidato_id', $candidato_id)
        ->orderBy('no35')->get();
        
        return datatables()->of($propuesta)
        ->addColumn('propuesta', function ($propuesta) {
            $html3 = $propuesta->no35;
            return $html3;
        })
        ->addColumn('personas', function ($propuesta) {
            $pers = $propuesta->no36;
            $id = explode( '|', $pers);
            $array="";
            for ($i=0; $i<count($id)-1; $i++){
                $candidato = Reclutamiento::where('id', '=', $id[$i])->get()->first();
                $cand=$candidato->no62;
                $array.=$cand.", ";
            }
            return $array;
        })
        ->addColumn('edit', function ($propuesta) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_propuesta('.$propuesta->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($propuesta) {
            $html6 = '<button type="button" name="delete" id="'.$propuesta->id.'" onclick="delete_propuesta('.$propuesta->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['propuesta', 'personas', 'edit', 'delete'])
        ->make(true);
    }



    public function create_propuesta(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_propuesta = $request->id_propuesta;
            $no35 = $request->no35;
            $empresa_id = $request->empresaid_propuesta;
            $candidato_id = $request->candidatoid_propuesta;
            $diagnostico_id = $request->diagnosticoid_propuesta;

            $array="";
            foreach($request->candidatos as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }

            if($id_propuesta==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $propuesta = Diagnostico_Propuesta::where('no35', '=', $no35)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($propuesta==""){
                    $eq = new Diagnostico_Propuesta();
                    $eq -> no35 = $request->no35;
                    $eq -> no36 = $array;
                    $eq -> diagnostico_id = $diagnostico_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Diagnostico_Propuesta::find($id_propuesta);
                $eq -> no35 = $request->no35;
                $eq -> no36 = $array;
                $eq -> diagnostico_id = $diagnostico_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_propuesta(Request $request)
    {
        if($request->ajax()){
            $id_propuesta = $request->id_propuesta;
            $propuesta = Diagnostico_Propuesta::where('id', '=', $id_propuesta)
            ->get()->toJson();
            return json_encode($propuesta);
        }
    }



    public function delete_propuesta(Request $request)
    {
        if($request->ajax()){
            $id_propuesta = $request->id_propuesta;
            $propuesta = Diagnostico_Propuesta::where('id', $id_propuesta)->delete();
            return response("eliminado");
        }
    }


}