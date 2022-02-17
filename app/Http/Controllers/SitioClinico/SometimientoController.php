<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Sometimiento;
use App\Models\SitioClinico\Som_Equipo;
use App\Models\SitioClinico\Som_Sometimiento;
use App\Models\SitioClinico\Som_Respuesta;

// Start of uses

class SometimientoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:sometimiento.index');//PROTEGE TODAS LAS RUTAS
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
		return view('sc/sometimiento.index', compact('proyectos'));
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
            $sometimiento = new Sometimiento();
        }else{
            $sometimiento = Sometimiento::find($id);
        }

		//GUARDAR REGISTROS SOMETIMIENTO
        $sometimiento->no1 = $request->no1;
        $sometimiento->no2 = $request->no2;
        $sometimiento->no25 = $request->no25;
        $sometimiento->no26 = $request->no26;
        $sometimiento->no27 = $request->no27;
        $sometimiento->no28 = $request->no28;
        $sometimiento->no29 = $request->no29;
        $sometimiento->no30 = $request->no30;
        $sometimiento->no31 = $request->no31;
        $sometimiento->no32 = $request->no32;
        $sometimiento->no33 = $request->no33;
        $sometimiento->no34 = $request->no34;
        $sometimiento->no35 = $request->no35;
        $sometimiento->no36 = $request->no36;
        $sometimiento->no37 = $request->no37;
        $sometimiento->no38 = $request->no38;
        $sometimiento->no39 = $request->no39;
        $sometimiento->no40 = $request->no40;
        $sometimiento->no41 = $request->no41;
        $sometimiento->no42 = $request->no42;
        $sometimiento->no45 = $request->no45;
        $sometimiento->no46 = $request->no46;
        $sometimiento->no47 = $request->no47;
        $sometimiento->no48 = $request->no48;
        $sometimiento->no49 = $request->no49;
        $sometimiento->no50 = $request->no50;
        $sometimiento->no51 = $request->no51;
        $sometimiento->no52 = $request->no52;
        $sometimiento->no53 = $request->no53;
        $sometimiento->no54 = $request->no54;
        $sometimiento->no55 = $request->no55;
        $sometimiento->no56 = $request->no56;
        $sometimiento->no57 = $request->no57;
        $sometimiento->no58 = $request->no58;
        $sometimiento->is_active = 1;
        $sometimiento->proyecto_id = $request->proyecto_id;
        $sometimiento->empresa_id = $request->empresa_id;
        $sometimiento->id_user = $id_user;
        $sometimiento -> save();

		return redirect()->route('sometimiento.edit', $request->proyecto_id)->with('info', 'El sometimiento se guardó correctamente');
        
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
        $sometimiento = Sometimiento::where('proyecto_id', '=', $id)->get()->first();

        if($sometimiento==""){
            return view('sc/sometimiento.create', compact('proyecto'));
        }else{
            return view('sc/sometimiento.edit', compact('proyecto', 'sometimiento'));
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

		$sometimiento = Sometimiento::find($request->id);
        $sometimiento->no1 = $request->no1;
        $sometimiento->no2 = $request->no2;
        $sometimiento->no25 = $request->no25;
        $sometimiento->no26 = $request->no26;
        $sometimiento->no27 = $request->no27;
        $sometimiento->no28 = $request->no28;
        $sometimiento->no29 = $request->no29;
        $sometimiento->no30 = $request->no30;
        $sometimiento->no31 = $request->no31;
        $sometimiento->no32 = $request->no32;
        $sometimiento->no33 = $request->no33;
        $sometimiento->no34 = $request->no34;
        $sometimiento->no35 = $request->no35;
        $sometimiento->no36 = $request->no36;
        $sometimiento->no37 = $request->no37;
        $sometimiento->no38 = $request->no38;
        $sometimiento->no39 = $request->no39;
        $sometimiento->no40 = $request->no40;
        $sometimiento->no41 = $request->no41;
        $sometimiento->no42 = $request->no42;
        $sometimiento->no45 = $request->no45;
        $sometimiento->no46 = $request->no46;
        $sometimiento->no47 = $request->no47;
        $sometimiento->no48 = $request->no48;
        $sometimiento->no49 = $request->no49;
        $sometimiento->no50 = $request->no50;
        $sometimiento->no51 = $request->no51;
        $sometimiento->no52 = $request->no52;
        $sometimiento->no53 = $request->no53;
        $sometimiento->no54 = $request->no54;
        $sometimiento->no55 = $request->no55;
        $sometimiento->no56 = $request->no56;
        $sometimiento->no57 = $request->no57;
        $sometimiento->no58 = $request->no58;
        $sometimiento->is_active = 1;
        $sometimiento->proyecto_id = $request->proyecto_id;
        $sometimiento->empresa_id = $request->empresa_id;
        $sometimiento->id_user = $id_user;
        $sometimiento -> save();
		
        return redirect()->route('sometimiento.edit', $request->proyecto_id)->with('info', 'El sometimiento se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $equipo = Som_Equipo::where('proyecto_id', $id)->delete();
        $som = Som_Sometimiento::where('proyecto_id', $id)->delete();
        $respuesta = Som_Respuesta::where('proyecto_id', $id)->delete();
        $sometimiento = Sometimiento::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
        return redirect()->route('sometimiento.index')->with('info', 'El sometimiento se eliminó correctamente');
    }



    public function guardar_sometimiento(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $sometimiento = new Sometimiento();
                $sometimiento->no1 = $request->no1;
                $sometimiento->no2 = $request->no2;
                $sometimiento->no25 = $request->no25;
                $sometimiento->no26 = $request->no26;
                $sometimiento->no27 = $request->no27;
                $sometimiento->no28 = $request->no28;
                $sometimiento->no29 = $request->no29;
                $sometimiento->no30 = $request->no30;
                $sometimiento->no31 = $request->no31;
                $sometimiento->no32 = $request->no32;
                $sometimiento->no33 = $request->no33;
                $sometimiento->no34 = $request->no34;
                $sometimiento->no35 = $request->no35;
                $sometimiento->no36 = $request->no36;
                $sometimiento->no37 = $request->no37;
                $sometimiento->no38 = $request->no38;
                $sometimiento->no39 = $request->no39;
                $sometimiento->no40 = $request->no40;
                $sometimiento->no41 = $request->no41;
                $sometimiento->no42 = $request->no42;
                $sometimiento->no45 = $request->no45;
                $sometimiento->no46 = $request->no46;
                $sometimiento->no47 = $request->no47;
                $sometimiento->no48 = $request->no48;
                $sometimiento->no49 = $request->no49;
                $sometimiento->no50 = $request->no50;
                $sometimiento->no51 = $request->no51;
                $sometimiento->no52 = $request->no52;
                $sometimiento->no53 = $request->no53;
                $sometimiento->no54 = $request->no54;
                $sometimiento->no55 = $request->no55;
                $sometimiento->no56 = $request->no56;
                $sometimiento->no57 = $request->no57;
                $sometimiento->no58 = $request->no58;
                $sometimiento->is_active = 1;
                $sometimiento->proyecto_id = $request->proyecto_id;
                $sometimiento->empresa_id = $request->empresa_id;
                $sometimiento->id_user = $user_id;
                $sometimiento -> save();
                //SACAR EL ID
                $id = $sometimiento->id;
            }
            
            return response($id);
        }
    }



    public function list_equipo(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $equipo = Som_Equipo::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no3')->get();
        
        return datatables()->of($equipo)
        ->addColumn('nombre', function ($equipo) {
            $html3 = $equipo->no3;
            return $html3;
        })
        ->addColumn('rol', function ($equipo) {
            $html4 = $equipo->no4;
            return $html4;
        })
        ->addColumn('edit', function ($equipo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equipo('.$equipo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($equipo) {
            $html6 = '<button type="button" name="delete" id="'.$equipo->id.'" onclick="delete_equipo('.$equipo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'rol', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equipo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_equipo = $request->id_equipo;
            $no3 = $request->no3;
            $no4 = $request->no4;
            $empresa_id = $request->empresaid_equipo;
            $proyecto_id = $request->proyectoid_equipo;
            $sometimiento_id = $request->sometimientoid_equipo;

            if($id_equipo==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $equipo = Som_Equipo::where('no3', '=', $no3)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($equipo==""){
                    $eq = new Som_Equipo();
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> no4_1 = $request->no4_1;
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> no7 = $request->no7;
                    $eq -> no8 = $request->no8;
                    $eq -> no9 = $request->no9;
                    $eq -> no10 = $request->no10;
                    $eq -> no11 = $request->no11;
                    $eq -> no12 = $request->no12;
                    $eq -> sometimiento_id = $sometimiento_id;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Som_Equipo::find($id_equipo);
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> no4_1 = $request->no4_1;
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> no7 = $request->no7;
                $eq -> no8 = $request->no8;
                $eq -> no9 = $request->no9;
                $eq -> no10 = $request->no10;
                $eq -> no11 = $request->no11;
                $eq -> no12 = $request->no12;
                $eq -> sometimiento_id = $sometimiento_id;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equipo(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $equipo = Som_Equipo::where('id', '=', $id_equipo)
            ->get()->toJson();
            return json_encode($equipo);
        }
    }



    public function delete_equipo(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $equipo = Som_Equipo::where('id', $id_equipo)->delete();
            return response("eliminado");
        }
    }






    public function list_som(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $som = Som_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no13')->get();
        
        return datatables()->of($som)
        ->addColumn('nombre', function ($som) {
            $html3 = $som->no13;
            return $html3;
        })
        ->addColumn('rol', function ($som) {
            $html4 = $som->no21;
            return $html4;
        })
        ->addColumn('edit', function ($som) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_som('.$som->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($som) {
            $html6 = '<button type="button" name="delete" id="'.$som->id.'" onclick="delete_som('.$som->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'rol', 'edit', 'delete'])
        ->make(true);
    }



    public function create_som(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_som = $request->id_som;
            $no13 = $request->no13;
            $empresa_id = $request->empresaid_som;
            $proyecto_id = $request->proyectoid_som;
            $sometimiento_id = $request->sometimientoid_som;

            if($id_som==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $som = Som_Sometimiento::where('no13', '=', $no13)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($som==""){
                    $sm = new Som_Sometimiento();
                    $sm -> no13 = $request->no13;
                    $sm -> no14 = $request->no14;
                    $sm -> no15 = $request->no15;
                    $sm -> no16 = $request->no16;
                    $sm -> no17 = $request->no17;
                    $sm -> no18 = $request->no18;
                    $sm -> no19 = $request->no19;
                    $sm -> no20 = $request->no20;
                    $sm -> no21 = $request->no21;
                    $sm -> no22 = $request->no22;
                    $sm -> sometimiento_id = $sometimiento_id;
                    $sm -> proyecto_id = $proyecto_id;
                    $sm -> empresa_id = $empresa_id;
                    $sm -> id_user = $user_id;
                    $sm -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $sm = Som_Sometimiento::find($id_som);
                $sm -> no13 = $request->no13;
                $sm -> no14 = $request->no14;
                $sm -> no15 = $request->no15;
                $sm -> no16 = $request->no16;
                $sm -> no17 = $request->no17;
                $sm -> no18 = $request->no18;
                $sm -> no19 = $request->no19;
                $sm -> no20 = $request->no20;
                $sm -> no21 = $request->no21;
                $sm -> no22 = $request->no22;
                $sm -> sometimiento_id = $sometimiento_id;
                $sm -> proyecto_id = $proyecto_id;
                $sm -> empresa_id = $empresa_id;
                $sm -> id_user = $user_id;
                $sm -> save();
                return response("guardado");
            }
        }
    }



    public function edit_som(Request $request)
    {
        if($request->ajax()){
            $id_som = $request->id_som;
            $som = Som_Sometimiento::where('id', '=', $id_som)
            ->get()->toJson();
            return json_encode($som);
        }
    }



    public function delete_som(Request $request)
    {
        if($request->ajax()){
            $id_som = $request->id_som;
            $som = Som_Sometimiento::where('id', $id_som)->delete();
            return response("eliminado");
        }
    }






    public function list_respuesta(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $respuesta = Som_Respuesta::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no23')->get();
        
        return datatables()->of($respuesta)
        ->addColumn('fecha_ce', function ($respuesta) {
            $html3 = $respuesta->no23;
            return $html3;
        })
        ->addColumn('respuesta', function ($respuesta) {
            $html4 = $respuesta->no24;
            return $html4;
        })
        ->addColumn('edit', function ($respuesta) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_respuesta('.$respuesta->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($respuesta) {
            $html6 = '<button type="button" name="delete" id="'.$respuesta->id.'" onclick="delete_respuesta('.$respuesta->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha_ce', 'respuesta', 'edit', 'delete'])
        ->make(true);
    }



    public function create_respuesta(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_respuesta = $request->id_respuesta;
            $no23 = $request->no23;
            $empresa_id = $request->empresaid_respuesta;
            $proyecto_id = $request->proyectoid_respuesta;
            $sometimiento_id = $request->sometimientoid_respuesta;

            if($id_respuesta==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $respuesta = Som_Respuesta::where('no23', '=', $no23)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($respuesta==""){
                    $res = new Som_Respuesta();
                    $res -> no23 = $request->no23;
                    $res -> no24 = $request->no24;
                    $res -> sometimiento_id = $sometimiento_id;
                    $res -> proyecto_id = $proyecto_id;
                    $res -> empresa_id = $empresa_id;
                    $res -> id_user = $user_id;
                    $res -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $res = Som_Respuesta::find($id_respuesta);
                $res -> no23 = $request->no23;
                $res -> no24 = $request->no24;
                $res -> sometimiento_id = $sometimiento_id;
                $res -> proyecto_id = $proyecto_id;
                $res -> empresa_id = $empresa_id;
                $res -> id_user = $user_id;
                $res -> save();
                return response("guardado");
            }
        }
    }



    public function edit_respuesta(Request $request)
    {
        if($request->ajax()){
            $id_respuesta = $request->id_respuesta;
            $respuesta = Som_Respuesta::where('id', '=', $id_respuesta)
            ->get()->toJson();
            return json_encode($respuesta);
        }
    }



    public function delete_respuesta(Request $request)
    {
        if($request->ajax()){
            $id_respuesta = $request->id_respuesta;
            $respuesta = Som_Respuesta::where('id', $id_respuesta)->delete();
            return response("eliminado");
        }
    }



}