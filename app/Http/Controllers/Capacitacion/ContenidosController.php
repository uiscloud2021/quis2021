<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capacitacion\Contenidos;
use App\Models\Capacitacion\Contenidos_Modulo;
use App\Models\Capacitacion\Contenidos_Tema;
use App\Models\Capacitacion\Contenidos_Actividad;
use App\Models\Capacitacion\Contenidos_Evaluacion;
use App\Models\Capacitacion\Contenidos_Recurso;

// Start of uses

class ContenidosController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:contenidos.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenidos = Contenidos::all();
		return view('capacitacion/contenidos.index', compact('contenidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temas = Contenidos_Tema::pluck('no18', 'id');
        $modulos = Contenidos_Modulo::pluck('no15', 'id');
        return view('capacitacion/contenidos.create', compact('modulos', 'temas'));
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
            'no1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $contenidos = new Contenidos();
        }else{
            $contenidos = Contenidos::find($id);
        }

        $area="";
        foreach($request->area as $ar){
            if($ar!=""){
                $area.=$ar."|";
            }
        }

        $via="";
        foreach($request->via as $vi){
            if($vi!=""){
                $via.=$vi."|";
            }
        }

        $tipo="";
        foreach($request->tipo as $tip){
            if($tip!=""){
                $tipo.=$tip."|";
            }
        }

		//GUARDAR REGISTROS
        $contenidos->no1 = $request->no1;
        $contenidos->no2 = $request->no2;
        $contenidos->no3 = $request->no3;
        $contenidos->no4 = $request->no4;
        $contenidos->no5 = $request->no5;
        $contenidos->no6 = $area;
        $contenidos->no7 = $request->no7;
        $contenidos->no8 = $via;
        $contenidos->no9 = $request->no9;
        $contenidos->no10 = $tipo;
        $contenidos->no11 = $request->no11;
        $contenidos->no12 = $request->no12;
        $contenidos->no13 = $request->no13;
        $contenidos->no14 = $request->no14;
        $contenidos->no16 = $request->no16;
        $contenidos->no19 = $request->no19;
        $contenidos->is_active = 1;
        $contenidos->empresa_id = $request->empresa_id;
        $contenidos->id_user = $id_user;
        $contenidos -> save();

		return redirect()->route('contenidos.edit', $contenidos->id)->with('info', 'El curso se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contenidos $contenido)
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
        $contenidos = Contenidos::where('id', '=', $id)->get()->first();
        $temas = Contenidos_Tema::where('contenido_id', '=', $id)->pluck('no18', 'id');
        $modulos = Contenidos_Modulo::where('contenido_id', '=', $id)->pluck('no15', 'id');
        return view('capacitacion/contenidos.edit', compact('contenidos', 'modulos', 'temas'));
        
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
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

        $area="";
        foreach($request->area as $ar){
            if($ar!=""){
                $area.=$ar."|";
            }
        }

        $via="";
        foreach($request->via as $vi){
            if($vi!=""){
                $via.=$vi."|";
            }
        }

        $tipo="";
        foreach($request->tipo as $tip){
            if($tip!=""){
                $tipo.=$tip."|";
            }
        }

		$contenidos = Contenidos::find($request->id);
        $contenidos->no1 = $request->no1;
        $contenidos->no2 = $request->no2;
        $contenidos->no3 = $request->no3;
        $contenidos->no4 = $request->no4;
        $contenidos->no5 = $request->no5;
        $contenidos->no6 = $area;
        $contenidos->no7 = $request->no7;
        $contenidos->no8 = $via;
        $contenidos->no9 = $request->no9;
        $contenidos->no10 = $tipo;
        $contenidos->no11 = $request->no11;
        $contenidos->no12 = $request->no12;
        $contenidos->no13 = $request->no13;
        $contenidos->no14 = $request->no14;
        $contenidos->no16 = $request->no16;
        $contenidos->no19 = $request->no19;
        $contenidos->is_active = 1;
        $contenidos->empresa_id = $request->empresa_id;
        $contenidos->id_user = $id_user;
        $contenidos -> save();
		
        return redirect()->route('contenidos.edit', $request->id)->with('info', 'El curso se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $modulo = Contenidos_Modulo::where('contenido_id', $id)->delete();
        $tema = Contenidos_Tema::where('contenido_id', $id)->delete();
        $actividad = Contenidos_Actividad::where('contenido_id', $id)->delete();
        $evaluacion = Contenidos_Evaluacion::where('contenido_id', $id)->delete();
        $recurso = Contenidos_Recurso::where('contenido_id', $id)->delete();
        $contenidos = Contenidos::where('id', $id)->delete();
        return redirect()->route('contenidos.index')->with('info', 'El curso se eliminó correctamente');
    }



    public function cargar_modulos(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $modulos = Contenidos_Modulo::where('contenido_id', $contenido_id)
        ->orderBy('no15')->get()->toJson();
        
        return json_encode($modulos);
    }



    public function total_modulos(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $modulos = Contenidos_Modulo::where('contenido_id', $contenido_id)
        ->where('empresa_id', $empresa_id)->count();
        
        return response($modulos);
    }



    public function cargar_temas(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $temas = Contenidos_Tema::where('contenido_id', $contenido_id)
        ->orderBy('no18')->get()->toJson();
        
        return json_encode($temas);
    }



    public function total_temas(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $temas = Contenidos_Tema::where('contenido_id', $contenido_id)
        ->where('empresa_id', $empresa_id)->count();
        
        return response($temas);
    }



    public function guardar_contenidos(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;

            $area="";
        foreach($request->area as $ar){
            if($ar!=""){
                $area.=$ar."|";
            }
        }

        $via="";
        foreach($request->via as $vi){
            if($vi!=""){
                $via.=$vi."|";
            }
        }

        $tipo="";
        foreach($request->tipo as $tip){
            if($tip!=""){
                $tipo.=$tip."|";
            }
        }
            
            //GUARDAR
            if($id==""){
                $contenidos = new Contenidos();
                $contenidos->no1 = $request->no1;
                $contenidos->no2 = $request->no2;
                $contenidos->no3 = $request->no3;
                $contenidos->no4 = $request->no4;
                $contenidos->no5 = $request->no5;
                $contenidos->no6 = $area;
                $contenidos->no7 = $request->no7;
                $contenidos->no8 = $via;
                $contenidos->no9 = $request->no9;
                $contenidos->no10 = $tipo;
                $contenidos->no11 = $request->no11;
                $contenidos->no12 = $request->no12;
                $contenidos->no13 = $request->no13;
                $contenidos->no14 = $request->no14;
                $contenidos->no16 = $request->no16;
                $contenidos->no19 = $request->no19;
                $contenidos->is_active = 1;
                $contenidos->empresa_id = $request->empresa_id;
                $contenidos->id_user = $user_id;
                $contenidos -> save();
                //SACAR EL ID
                $id = $contenidos->id;
            }
            
            return response($id);
        }
    }



    public function list_modulo(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $modulo = Contenidos_Modulo::where('contenido_id', $contenido_id)
        ->orderBy('no15')->get();
        
        return datatables()->of($modulo)
        ->addColumn('modulo', function ($modulo) {
            $html3 = $modulo->no15;
            return $html3;
        })
        ->addColumn('edit', function ($modulo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_modulo('.$modulo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($modulo) {
            $html6 = '<button type="button" name="delete" id="'.$modulo->id.'" onclick="delete_modulo('.$modulo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['modulo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_modulo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_modulo = $request->id_modulo;
            $no15 = $request->no15;
            $empresa_id = $request->empresaid_modulo;
            $contenido_id = $request->contenidoid_modulo;

            if($id_modulo==""){
                $modulo = Contenidos_Modulo::where('no15', '=', $no15)
                ->where('contenido_id', '=', $contenido_id)->get()->first();
                //GUARDAR REGISTRO
                if($modulo==""){
                    $cons = new Contenidos_Modulo();
                    $cons -> no15 = $request->no15;
                    $cons -> contenido_id = $contenido_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Contenidos_Modulo::find($id_modulo);
                $cons -> no15 = $request->no15;
                $cons -> contenido_id = $contenido_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_modulo(Request $request)
    {
        if($request->ajax()){
            $id_modulo = $request->id_modulo;
            $modulo = Contenidos_Modulo::where('id', '=', $id_modulo)
            ->get()->toJson();
            return json_encode($modulo);
        }
    }



    public function delete_modulo(Request $request)
    {
        if($request->ajax()){
            $id_modulo = $request->id_modulo;
            $modulo = Contenidos_Modulo::where('id', $id_modulo)->delete();
            return response("eliminado");
        }
    }





    public function list_tema(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $tema = Contenidos_Tema::where('contenido_id', $contenido_id)
        ->orderBy('no18')->get();
        
        return datatables()->of($tema)
        ->addColumn('modulo', function ($tema) {
            $html3 = $tema->no17;
            $mod = Contenidos_Modulo::where('id', $html3)->first();
            return $mod->no15;
        })
        ->addColumn('tema', function ($tema) {
            $html3 = $tema->no18;
            return $html3;
        })
        ->addColumn('edit', function ($tema) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_tema('.$tema->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($tema) {
            $html6 = '<button type="button" name="delete" id="'.$tema->id.'" onclick="delete_tema('.$tema->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['modulo', 'tema', 'edit', 'delete'])
        ->make(true);
    }



    public function create_tema(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_tema = $request->id_tema;
            $no18 = $request->no18;
            $empresa_id = $request->empresaid_tema;
            $contenido_id = $request->contenidoid_tema;

            if($id_tema==""){
                $tema = Contenidos_Tema::where('no18', '=', $no18)
                ->where('contenido_id', '=', $contenido_id)->get()->first();
                //GUARDAR REGISTRO
                if($tema==""){
                    $cons = new Contenidos_Tema();
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $request->no18;
                    $cons -> contenido_id = $contenido_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Contenidos_Tema::find($id_tema);
                $cons -> no17 = $request->no17;
                $cons -> no18 = $request->no18;
                $cons -> contenido_id = $contenido_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_tema(Request $request)
    {
        if($request->ajax()){
            $id_tema = $request->id_tema;
            $tema = Contenidos_Tema::where('id', '=', $id_tema)
            ->get()->toJson();
            return json_encode($tema);
        }
    }



    public function delete_tema(Request $request)
    {
        if($request->ajax()){
            $id_tema = $request->id_tema;
            $tema = Contenidos_Tema::where('id', $id_tema)->delete();
            return response("eliminado");
        }
    }






    public function list_actividad(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $actividad = Contenidos_Actividad::where('contenido_id', $contenido_id)
        ->orderBy('no21')->get();
        
        return datatables()->of($actividad)
        ->addColumn('tema', function ($actividad) {
            $html3 = $actividad->no20;
            $tem = Contenidos_Tema::where('id', $html3)->first();
            return $tem->no18;
            return $html3;
        })
        ->addColumn('actividad', function ($actividad) {
            $html3 = $actividad->no21;
            return $html3;
        })
        ->addColumn('edit', function ($actividad) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_actividad('.$actividad->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($actividad) {
            $html6 = '<button type="button" name="delete" id="'.$actividad->id.'" onclick="delete_actividad('.$actividad->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['tema', 'actividad', 'edit', 'delete'])
        ->make(true);
    }



    public function create_actividad(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_actividad = $request->id_actividad;
            $no21 = $request->no21;
            $empresa_id = $request->empresaid_actividad;
            $contenido_id = $request->contenidoid_actividad;

            if($id_actividad==""){
                $actividad = Contenidos_Actividad::where('no21', '=', $no21)
                ->where('contenido_id', '=', $contenido_id)->get()->first();
                //GUARDAR REGISTRO
                if($actividad==""){
                    $cons = new Contenidos_Actividad();
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> contenido_id = $contenido_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Contenidos_Actividad::find($id_actividad);
                $cons -> no20 = $request->no20;
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> contenido_id = $contenido_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_actividad(Request $request)
    {
        if($request->ajax()){
            $id_actividad = $request->id_actividad;
            $actividad = Contenidos_Actividad::where('id', '=', $id_actividad)
            ->get()->toJson();
            return json_encode($actividad);
        }
    }



    public function delete_actividad(Request $request)
    {
        if($request->ajax()){
            $id_actividad = $request->id_actividad;
            $actividad = Contenidos_Actividad::where('id', $id_actividad)->delete();
            return response("eliminado");
        }
    }





    public function list_evaluacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $evaluacion = Contenidos_Evaluacion::where('contenido_id', $contenido_id)
        ->orderBy('no24')->get();
        
        return datatables()->of($evaluacion)
        ->addColumn('competencia', function ($evaluacion) {
            $html3 = $evaluacion->no24;
            return $html3;
        })
        ->addColumn('evaluacion', function ($evaluacion) {
            $html3 = $evaluacion->no25;
            return $html3;
        })
        ->addColumn('edit', function ($evaluacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_evaluacion('.$evaluacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($evaluacion) {
            $html6 = '<button type="button" name="delete" id="'.$evaluacion->id.'" onclick="delete_evaluacion('.$evaluacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['competencia', 'evaluacion', 'edit', 'delete'])
        ->make(true);
    }



    public function create_evaluacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_evaluacion = $request->id_evaluacion;
            $no24 = $request->no24;
            $empresa_id = $request->empresaid_evaluacion;
            $contenido_id = $request->contenidoid_evaluacion;

            if($id_evaluacion==""){
                $evaluacion = Contenidos_Evaluacion::where('no24', '=', $no24)
                ->where('contenido_id', '=', $contenido_id)->get()->first();
                //GUARDAR REGISTRO
                if($evaluacion==""){
                    $cons = new Contenidos_Evaluacion();
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> contenido_id = $contenido_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Contenidos_Evaluacion::find($id_evaluacion);
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> contenido_id = $contenido_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_evaluacion(Request $request)
    {
        if($request->ajax()){
            $id_evaluacion = $request->id_evaluacion;
            $evaluacion = Contenidos_Evaluacion::where('id', '=', $id_evaluacion)
            ->get()->toJson();
            return json_encode($evaluacion);
        }
    }



    public function delete_evaluacion(Request $request)
    {
        if($request->ajax()){
            $id_evaluacion = $request->id_evaluacion;
            $evaluacion = Contenidos_Evaluacion::where('id', $id_evaluacion)->delete();
            return response("eliminado");
        }
    }





    public function list_recurso(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $contenido_id = $request->contenido_id;
        $recurso = Contenidos_Recurso::where('contenido_id', $contenido_id)
        ->orderBy('no26')->get();
        
        return datatables()->of($recurso)
        ->addColumn('recurso', function ($recurso) {
            $html3 = $recurso->no26;
            return $html3;
        })
        ->addColumn('descripcion', function ($recurso) {
            $html3 = $recurso->no27;
            return $html3;
        })
        ->addColumn('edit', function ($recurso) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_recurso('.$recurso->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($recurso) {
            $html6 = '<button type="button" name="delete" id="'.$recurso->id.'" onclick="delete_recurso('.$recurso->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['recurso', 'descripcion', 'edit', 'delete'])
        ->make(true);
    }



    public function create_recurso(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_recurso = $request->id_recurso;
            $no26 = $request->no26;
            $empresa_id = $request->empresaid_recurso;
            $contenido_id = $request->contenidoid_recurso;

            if($id_recurso==""){
                $recurso = Contenidos_Recurso::where('no26', '=', $no26)
                ->where('contenido_id', '=', $contenido_id)->get()->first();
                //GUARDAR REGISTRO
                if($recurso==""){
                    $cons = new Contenidos_Recurso();
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> contenido_id = $contenido_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Contenidos_Recurso::find($id_recurso);
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> contenido_id = $contenido_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_recurso(Request $request)
    {
        if($request->ajax()){
            $id_recurso = $request->id_recurso;
            $recurso = Contenidos_Recurso::where('id', '=', $id_recurso)
            ->get()->toJson();
            return json_encode($recurso);
        }
    }



    public function delete_recurso(Request $request)
    {
        if($request->ajax()){
            $id_recurso = $request->id_recurso;
            $recurso = Contenidos_Recurso::where('id', $id_recurso)->delete();
            return response("eliminado");
        }
    }



}