<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Sometimiento;
use App\Models\Administracion\Preparacion;
use App\Models\Administracion\Prep_Visita;
use App\Models\Administracion\Prep_Estudio;
use App\Models\Administracion\Prep_Proveedor;

// Start of uses

class PreparacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:preparacion.index');//PROTEGE TODAS LAS RUTAS
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
		return view('adm/preparacion.index', compact('proyectos'));
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
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $preparacion = new Preparacion();
        }else{
            $preparacion = Preparacion::find($id);
        }

		//GUARDAR REGISTROS preparacion
        $preparacion->no1 = $request->no1;
        $preparacion->no2 = $request->no2;
        $preparacion->no3 = $request->no3;
        $preparacion->no4 = $request->no4;
        $preparacion->no5 = $request->no5;
        $preparacion->no6 = $request->no6;
        $preparacion->no7 = $request->no7;
        $preparacion->no8 = $request->no8;
        $preparacion->no9 = $request->no9;
        $preparacion->no10 = $request->no10;
        $preparacion->no11 = $request->no11;
        $preparacion->no12 = $request->no12;
        $preparacion->no13 = $request->no13;
        $preparacion->no14 = $request->no14;
        $preparacion->no15 = $request->no15;
        $preparacion->no16 = $request->no16;
        $preparacion->no17 = $request->no17;
        $preparacion->no18 = $request->no18;
        $preparacion->no19 = $request->no19;
        $preparacion->no20 = $request->no20;
        $preparacion->no21 = $request->no21;
        $preparacion->no26 = $request->no26;
        $preparacion->no27 = $request->no27;
        $preparacion->no28 = $request->no28;
        $preparacion->no29 = $request->no29;
        $preparacion->no30 = $request->no30;
        $preparacion->no31 = $request->no31;
        $preparacion->no32 = $request->no32;
        $preparacion->is_active = 1;
        $preparacion->proyecto_id = $request->proyecto_id;
        $preparacion->empresa_id = $request->empresa_id;
        $preparacion->id_user = $id_user;
        $preparacion -> save();

		return redirect()->route('preparacion.edit', $request->proyecto_id)->with('info', 'La preparación se guardó correctamente');
        
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
        $preparacion = Preparacion::where('proyecto_id', '=', $id)->get()->first();
        $estudios = Prep_Estudio::where('proyecto_id', '=', $id)->get();

        if($preparacion==""){
            return view('adm/preparacion.create', compact('proyecto', 'estudios'));
        }else{
            return view('adm/preparacion.edit', compact('proyecto', 'preparacion', 'estudios'));
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
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

		$preparacion = Preparacion::find($request->id);
        $preparacion->no1 = $request->no1;
        $preparacion->no2 = $request->no2;
        $preparacion->no3 = $request->no3;
        $preparacion->no4 = $request->no4;
        $preparacion->no5 = $request->no5;
        $preparacion->no6 = $request->no6;
        $preparacion->no7 = $request->no7;
        $preparacion->no8 = $request->no8;
        $preparacion->no9 = $request->no9;
        $preparacion->no10 = $request->no10;
        $preparacion->no11 = $request->no11;
        $preparacion->no12 = $request->no12;
        $preparacion->no13 = $request->no13;
        $preparacion->no14 = $request->no14;
        $preparacion->no15 = $request->no15;
        $preparacion->no16 = $request->no16;
        $preparacion->no17 = $request->no17;
        $preparacion->no18 = $request->no18;
        $preparacion->no19 = $request->no19;
        $preparacion->no20 = $request->no20;
        $preparacion->no21 = $request->no21;
        $preparacion->no26 = $request->no26;
        $preparacion->no27 = $request->no27;
        $preparacion->no28 = $request->no28;
        $preparacion->no29 = $request->no29;
        $preparacion->no30 = $request->no30;
        $preparacion->no31 = $request->no31;
        $preparacion->no32 = $request->no32;
        $preparacion->is_active = 1;
        $preparacion->proyecto_id = $request->proyecto_id;
        $preparacion->empresa_id = $request->empresa_id;
        $preparacion->id_user = $id_user;
        $preparacion -> save();
		
        return redirect()->route('preparacion.edit', $request->proyecto_id)->with('info', 'La preparación se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $visita = Prep_Visita::where('proyecto_id', $id)->delete();
        $estudio = Prep_Estudio::where('proyecto_id', $id)->delete();
        $proveedor = Prep_Proveedor::where('proyecto_id', $id)->delete();
        $preparacion = Preparacion::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::all();
        return redirect()->route('preparacion.index')->with('info', 'La preparación se eliminó correctamente');
    }



    public function guardar_preparacion(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $preparacion = new Preparacion();
                $preparacion->no1 = $request->no1;
                $preparacion->no2 = $request->no2;
                $preparacion->no3 = $request->no3;
                $preparacion->no4 = $request->no4;
                $preparacion->no5 = $request->no5;
                $preparacion->no6 = $request->no6;
                $preparacion->no7 = $request->no7;
                $preparacion->no8 = $request->no8;
                $preparacion->no9 = $request->no9;
                $preparacion->no10 = $request->no10;
                $preparacion->no11 = $request->no11;
                $preparacion->no12 = $request->no12;
                $preparacion->no13 = $request->no13;
                $preparacion->no14 = $request->no14;
                $preparacion->no15 = $request->no15;
                $preparacion->no16 = $request->no16;
                $preparacion->no17 = $request->no17;
                $preparacion->no18 = $request->no18;
                $preparacion->no19 = $request->no19;
                $preparacion->no20 = $request->no20;
                $preparacion->no21 = $request->no21;
                $preparacion->no26 = $request->no26;
                $preparacion->no27 = $request->no27;
                $preparacion->no28 = $request->no28;
                $preparacion->no29 = $request->no29;
                $preparacion->no30 = $request->no30;
                $preparacion->no31 = $request->no31;
                $preparacion->no32 = $request->no32;
                $preparacion->is_active = 1;
                $preparacion->proyecto_id = $request->proyecto_id;
                $preparacion->empresa_id = $request->empresa_id;
                $preparacion->id_user = $user_id;
                $preparacion -> save();
                //SACAR EL ID
                $id = $preparacion->id;
            }
            return response($id);
        }
    }



    public function cargar_estudios(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $estudios = Prep_Estudio::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no33')->get()->toJson();
        
        return json_encode($estudios);
    }



    public function cargar_precio(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $servicio = $request->servicio;

        if($servicio=="Visita de monitoreo"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no32;

        }else if($servicio=="Aplicación de tratamiento"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no31;

        }else if($servicio=="Contacto telefónico"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no30;

        }else if($servicio=="Visita médica"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no29;

        }else if($servicio=="Historia clínica"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no28;

        }else if($servicio=="Consentimiento informado"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no27;

        }else if($servicio=="Referencia de sujetos"){
            $cons = Preparacion::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)->get()->first();

            $precio=$cons->no26;

        }else{
            $cons = Prep_Estudio::where('proyecto_id', $proyecto_id)
            ->where('empresa_id', $empresa_id)
            ->where('no33', $servicio)->get()->first();

            $precio=$cons->no34;
        }
        return response($precio);
    }



    public function list_visita(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $visita = Prep_Visita::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no22')->get();
        
        return datatables()->of($visita)
        ->addColumn('nombre', function ($visita) {
            $html3 = $visita->no22;
            return $html3;
        })
        ->addColumn('cantidad', function ($visita) {
            $html4 = $visita->no23;
            return $html4;
        })
        ->addColumn('edit', function ($visita) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_visita('.$visita->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($visita) {
            $html6 = '<button type="button" name="delete" id="'.$visita->id.'" onclick="delete_visita('.$visita->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'cantidad', 'edit', 'delete'])
        ->make(true);
    }



    public function create_visita(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_visita = $request->id_visita;
            $no22 = $request->no22;
            $empresa_id = $request->empresaid_visita;
            $proyecto_id = $request->proyectoid_visita;
            $preparacion_id = $request->preparacionid_visita;

            if($id_visita==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $visita = Prep_Visita::where('no22', '=', $no22)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($visita==""){
                    $eq = new Prep_Visita();
                    $eq -> no22 = $request->no22;
                    $eq -> no23 = $request->no23;
                    $eq -> no24 = $request->no24;
                    $eq -> no25 = $request->no25;
                    $eq -> actividad1 = $request->actividad1;
                    $eq -> actividad2 = $request->actividad2;
                    $eq -> actividad3 = $request->actividad3;
                    $eq -> actividad4 = $request->actividad4;
                    $eq -> actividad5 = $request->actividad5;
                    $eq -> actividad6 = $request->actividad6;
                    $eq -> actividad7 = $request->actividad7;
                    $eq -> actividad8 = $request->actividad8;
                    $eq -> actividad9 = $request->actividad9;
                    $eq -> actividad10 = $request->actividad10;
                    $eq -> actividad11 = $request->actividad11;
                    $eq -> actividad12 = $request->actividad12;
                    $eq -> actividad13 = $request->actividad13;
                    $eq -> actividad14 = $request->actividad14;
                    $eq -> actividad15 = $request->actividad15;
                    $eq -> actividad16 = $request->actividad16;
                    $eq -> actividad17 = $request->actividad17;
                    $eq -> actividad18 = $request->actividad18;
                    $eq -> actividad19 = $request->actividad19;
                    $eq -> actividad20 = $request->actividad20;
                    $eq -> actividad21 = $request->actividad21;
                    $eq -> actividad22 = $request->actividad22;
                    $eq -> actividad23 = $request->actividad23;
                    $eq -> actividad24 = $request->actividad24;
                    $eq -> actividad25 = $request->actividad25;
                    $eq -> actividad26 = $request->actividad26;
                    $eq -> actividad27 = $request->actividad27;
                    $eq -> actividad28 = $request->actividad28;
                    $eq -> actividad29 = $request->actividad29;
                    $eq -> actividad30 = $request->actividad30;
                    $eq -> preparacion_id = $preparacion_id;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Prep_Visita::find($id_visita);
                $eq -> no22 = $request->no22;
                $eq -> no23 = $request->no23;
                $eq -> no24 = $request->no24;
                $eq -> no25 = $request->no25;
                $eq -> actividad1 = $request->actividad1;
                $eq -> actividad2 = $request->actividad2;
                $eq -> actividad3 = $request->actividad3;
                $eq -> actividad4 = $request->actividad4;
                $eq -> actividad5 = $request->actividad5;
                $eq -> actividad6 = $request->actividad6;
                $eq -> actividad7 = $request->actividad7;
                $eq -> actividad8 = $request->actividad8;
                $eq -> actividad9 = $request->actividad9;
                $eq -> actividad10 = $request->actividad10;
                $eq -> actividad11 = $request->actividad11;
                $eq -> actividad12 = $request->actividad12;
                $eq -> actividad13 = $request->actividad13;
                $eq -> actividad14 = $request->actividad14;
                $eq -> actividad15 = $request->actividad15;
                $eq -> actividad16 = $request->actividad16;
                $eq -> actividad17 = $request->actividad17;
                $eq -> actividad18 = $request->actividad18;
                $eq -> actividad19 = $request->actividad19;
                $eq -> actividad20 = $request->actividad20;
                $eq -> actividad21 = $request->actividad21;
                $eq -> actividad22 = $request->actividad22;
                $eq -> actividad23 = $request->actividad23;
                $eq -> actividad24 = $request->actividad24;
                $eq -> actividad25 = $request->actividad25;
                $eq -> actividad26 = $request->actividad26;
                $eq -> actividad27 = $request->actividad27;
                $eq -> actividad28 = $request->actividad28;
                $eq -> actividad29 = $request->actividad29;
                $eq -> actividad30 = $request->actividad30;
                $eq -> preparacion_id = $preparacion_id;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_visita(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $visita = Prep_Visita::where('id', '=', $id_visita)
            ->get()->toJson();
            return json_encode($visita);
        }
    }



    public function delete_visita(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $visita = Prep_Visita::where('id', $id_visita)->delete();
            return response("eliminado");
        }
    }






    public function list_estudio(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $som = Prep_Estudio::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no33')->get();
        
        return datatables()->of($som)
        ->addColumn('nombre', function ($som) {
            $html3 = $som->no33;
            return $html3;
        })
        ->addColumn('pago', function ($som) {
            $html4 = $som->no34;
            return $html4;
        })
        ->addColumn('edit', function ($som) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_estudio('.$som->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($som) {
            $html6 = '<button type="button" name="delete" id="'.$som->id.'" onclick="delete_estudio('.$som->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'pago', 'edit', 'delete'])
        ->make(true);
    }



    public function create_estudio(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_estudio = $request->id_estudio;
            $no33 = $request->no33;
            $empresa_id = $request->empresaid_estudio;
            $proyecto_id = $request->proyectoid_estudio;
            $preparacion_id = $request->preparacionid_estudio;

            if($id_estudio==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $estudio = Prep_Estudio::where('no33', '=', $no33)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($estudio==""){
                    $sm = new Prep_Estudio();
                    $sm -> no33 = $request->no33;
                    $sm -> no34 = $request->no34;
                    $sm -> preparacion_id = $preparacion_id;
                    $sm -> proyecto_id = $proyecto_id;
                    $sm -> empresa_id = $empresa_id;
                    $sm -> id_user = $user_id;
                    $sm -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $sm = Prep_Estudio::find($id_estudio);
                $sm -> no33 = $request->no33;
                $sm -> no34 = $request->no34;
                $sm -> preparacion_id = $preparacion_id;
                $sm -> proyecto_id = $proyecto_id;
                $sm -> empresa_id = $empresa_id;
                $sm -> id_user = $user_id;
                $sm -> save();
                return response("guardado");
            }
        }
    }



    public function edit_estudio(Request $request)
    {
        if($request->ajax()){
            $id_estudio = $request->id_estudio;
            $estudio = Prep_Estudio::where('id', '=', $id_estudio)
            ->get()->toJson();
            return json_encode($estudio);
        }
    }



    public function delete_estudio(Request $request)
    {
        if($request->ajax()){
            $id_estudio = $request->id_estudio;
            $estudio = Prep_Estudio::where('id', $id_estudio)->delete();
            return response("eliminado");
        }
    }






    public function list_proveedor(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $respuesta = Prep_Proveedor::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no35')->get();
        
        return datatables()->of($respuesta)
        ->addColumn('nombre', function ($respuesta) {
            $html3 = $respuesta->no35;
            return $html3;
        })
        ->addColumn('inicio', function ($respuesta) {
            $html4 = $respuesta->no38;
            return $html4;
        })
        ->addColumn('fin', function ($respuesta) {
            $html4 = $respuesta->no39;
            return $html4;
        })
        ->addColumn('edit', function ($respuesta) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_proveedor('.$respuesta->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($respuesta) {
            $html6 = '<button type="button" name="delete" id="'.$respuesta->id.'" onclick="delete_proveedor('.$respuesta->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'inicio', 'fin', 'edit', 'delete'])
        ->make(true);
    }



    public function create_proveedor(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_proveedor = $request->id_proveedor;
            $no35 = $request->no35;
            $empresa_id = $request->empresaid_proveedor;
            $proyecto_id = $request->proyectoid_proveedor;
            $preparacion_id = $request->preparacionid_proveedor;

            if($id_proveedor==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $proveedor = Prep_Proveedor::where('no35', '=', $no35)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($proveedor==""){
                    $res = new Prep_Proveedor();
                    $res -> no35 = $request->no35;
                    $res -> no36 = $request->no36;
                    $res -> no37 = $request->no37;
                    $res -> no38 = $request->no38;
                    $res -> no39 = $request->no39;
                    $res -> no40 = $request->no40;
                    $res -> no41 = $request->no41;
                    $res -> no42 = $request->no42;
                    $res -> no43 = $request->no43;
                    $res -> servicio1 = $request->servicio1;
                    $res -> precio1 = $request->pago1;
                    $res -> servicio2 = $request->servicio2;
                    $res -> precio2 = $request->pago2;
                    $res -> servicio3 = $request->servicio3;
                    $res -> precio3 = $request->pago3;
                    $res -> servicio4 = $request->servicio4;
                    $res -> precio4 = $request->pago4;
                    $res -> servicio5 = $request->servicio5;
                    $res -> precio5 = $request->pago5;
                    $res -> servicio6 = $request->servicio6;
                    $res -> precio6 = $request->pago6;
                    $res -> servicio7 = $request->servicio7;
                    $res -> precio7 = $request->pago7;
                    $res -> servicio8 = $request->servicio8;
                    $res -> precio8 = $request->pago8;
                    $res -> servicio9 = $request->servicio9;
                    $res -> precio9 = $request->pago9;
                    $res -> servicio10 = $request->servicio10;
                    $res -> precio10 = $request->pago10;
                    $res -> servicio11 = $request->servicio11;
                    $res -> precio11 = $request->pago11;
                    $res -> servicio12 = $request->servicio12;
                    $res -> precio12 = $request->pago12;
                    $res -> servicio13 = $request->servicio13;
                    $res -> precio13 = $request->pago13;
                    $res -> servicio14 = $request->servicio14;
                    $res -> precio14 = $request->pago14;
                    $res -> servicio15 = $request->servicio15;
                    $res -> precio15 = $request->pago15;
                    $res -> servicio16 = $request->servicio16;
                    $res -> precio16 = $request->pago16;
                    $res -> servicio17 = $request->servicio17;
                    $res -> precio17 = $request->pago17;
                    $res -> servicio18 = $request->servicio18;
                    $res -> precio18 = $request->pago18;
                    $res -> servicio19 = $request->servicio19;
                    $res -> precio19 = $request->pago19;
                    $res -> servicio20 = $request->servicio20;
                    $res -> precio20 = $request->pago20;
                    $res -> servicio21 = $request->servicio21;
                    $res -> precio21 = $request->pago21;
                    $res -> servicio22 = $request->servicio22;
                    $res -> precio22 = $request->pago22;
                    $res -> servicio23 = $request->servicio23;
                    $res -> precio23 = $request->pago23;
                    $res -> servicio24 = $request->servicio24;
                    $res -> precio24 = $request->pago24;
                    $res -> servicio25 = $request->servicio25;
                    $res -> precio25 = $request->pago25;
                    $res -> servicio26 = $request->servicio26;
                    $res -> precio26 = $request->pago26;
                    $res -> servicio27 = $request->servicio27;
                    $res -> precio27 = $request->pago27;
                    $res -> servicio28 = $request->servicio28;
                    $res -> precio28 = $request->pago28;
                    $res -> servicio29 = $request->servicio29;
                    $res -> precio29 = $request->pago29;
                    $res -> servicio30 = $request->servicio30;
                    $res -> precio30 = $request->pago30;
                    $res -> preparacion_id = $preparacion_id;
                    $res -> proyecto_id = $proyecto_id;
                    $res -> empresa_id = $empresa_id;
                    $res -> id_user = $user_id;
                    $res -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $res = Prep_Proveedor::find($id_proveedor);
                $res -> no35 = $request->no35;
                $res -> no36 = $request->no36;
                $res -> no37 = $request->no37;
                $res -> no38 = $request->no38;
                $res -> no39 = $request->no39;
                $res -> no40 = $request->no40;
                $res -> no41 = $request->no41;
                $res -> no42 = $request->no42;
                $res -> no43 = $request->no43;
                $res -> servicio1 = $request->servicio1;
                $res -> precio1 = $request->pago1;
                $res -> servicio2 = $request->servicio2;
                $res -> precio2 = $request->pago2;
                $res -> servicio3 = $request->servicio3;
                $res -> precio3 = $request->pago3;
                $res -> servicio4 = $request->servicio4;
                $res -> precio4 = $request->pago4;
                $res -> servicio5 = $request->servicio5;
                $res -> precio5 = $request->pago5;
                $res -> servicio6 = $request->servicio6;
                $res -> precio6 = $request->pago6;
                $res -> servicio7 = $request->servicio7;
                $res -> precio7 = $request->pago7;
                $res -> servicio8 = $request->servicio8;
                $res -> precio8 = $request->pago8;
                $res -> servicio9 = $request->servicio9;
                $res -> precio9 = $request->pago9;
                $res -> servicio10 = $request->servicio10;
                $res -> precio10 = $request->pago10;
                $res -> servicio11 = $request->servicio11;
                $res -> precio11 = $request->pago11;
                $res -> servicio12 = $request->servicio12;
                $res -> precio12 = $request->pago12;
                $res -> servicio13 = $request->servicio13;
                $res -> precio13 = $request->pago13;
                $res -> servicio14 = $request->servicio14;
                $res -> precio14 = $request->pago14;
                $res -> servicio15 = $request->servicio15;
                $res -> precio15 = $request->pago15;
                $res -> servicio16 = $request->servicio16;
                $res -> precio16 = $request->pago16;
                $res -> servicio17 = $request->servicio17;
                $res -> precio17 = $request->pago17;
                $res -> servicio18 = $request->servicio18;
                $res -> precio18 = $request->pago18;
                $res -> servicio19 = $request->servicio19;
                $res -> precio19 = $request->pago19;
                $res -> servicio20 = $request->servicio20;
                $res -> precio20 = $request->pago20;
                $res -> servicio21 = $request->servicio21;
                $res -> precio21 = $request->pago21;
                $res -> servicio22 = $request->servicio22;
                $res -> precio22 = $request->pago22;
                $res -> servicio23 = $request->servicio23;
                $res -> precio23 = $request->pago23;
                $res -> servicio24 = $request->servicio24;
                $res -> precio24 = $request->pago24;
                $res -> servicio25 = $request->servicio25;
                $res -> precio25 = $request->pago25;
                $res -> servicio26 = $request->servicio26;
                $res -> precio26 = $request->pago26;
                $res -> servicio27 = $request->servicio27;
                $res -> precio27 = $request->pago27;
                $res -> servicio28 = $request->servicio28;
                $res -> precio28 = $request->pago28;
                $res -> servicio29 = $request->servicio29;
                $res -> precio29 = $request->pago29;
                $res -> servicio30 = $request->servicio30;
                $res -> precio30 = $request->pago30;
                $res -> preparacion_id = $preparacion_id;
                $res -> proyecto_id = $proyecto_id;
                $res -> empresa_id = $empresa_id;
                $res -> id_user = $user_id;
                $res -> save();
                return response("guardado");
            }
        }
    }



    public function edit_proveedor(Request $request)
    {
        if($request->ajax()){
            $id_proveedor = $request->id_proveedor;
            $proveedor = Prep_Proveedor::where('id', '=', $id_proveedor)
            ->get()->toJson();
            return json_encode($proveedor);
        }
    }



    public function delete_proveedor(Request $request)
    {
        if($request->ajax()){
            $id_proveedor = $request->id_proveedor;
            $proveedor = Prep_Proveedor::where('id', $id_proveedor)->delete();
            return response("eliminado");
        }
    }



}