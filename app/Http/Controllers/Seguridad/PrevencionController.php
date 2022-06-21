<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Prevencion_Comision;
use App\Models\Seguridad\Prevencion_Reunion;
use App\Models\Seguridad\Prevencion_Plan;
use App\Models\Seguridad\Prevencion_Bitacora;
use App\Models\Seguridad\Prevencion_Revision;
use App\Models\Seguridad\Prevencion_Simulacro;
use App\Models\Seguridad\Prevencion_Visita;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class PrevencionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:prevencion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->get();
        $num_candidatos = Reclutamiento::count();
		return view('seguridad/prevencion.index', compact('empleados', 'candidatos', 'num_candidatos'));
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
    public function show(Auditoria $auditoria)
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





    public function list_comision(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Comision::orderBy('no1')->get();
        
        return datatables()->of($comision)
        ->addColumn('miembro', function ($comision) {
            $html3 = $comision->no1;
            $per = Reclutamiento::where('id', '=', $html3)->get()->first();
            $nombre=$per->no62;
            return $nombre;
        })
        ->addColumn('fecha', function ($comision) {
            $html4 = $comision->no2;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_comision('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_comision('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['miembro', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_comision(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_comision = $request->id_comision;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_comision;

            $array="";
            
            foreach($request->resp as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }

            if($id_comision==""){
                $comision = Prevencion_Comision::where('no1', '=', $no1)->get()->first();
                //GUARDAR REGISTRO
                if($comision==""){
                    $cons = new Prevencion_Comision();
                    $cons -> no1 = $request->no1;
                    $cons -> no2 = $request->no2;
                    $cons -> no3 = $array;
                    $cons -> no4 = $request->no4;
                    $cons -> no5 = $request->no5;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Comision::find($id_comision);
                $cons -> no1 = $request->no1;
                $cons -> no2 = $request->no2;
                $cons -> no3 = $array;
                $cons -> no4 = $request->no4;
                $cons -> no5 = $request->no5;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_comision(Request $request)
    {
        if($request->ajax()){
            $id_comision = $request->id_comision;
            $comision = Prevencion_Comision::where('id', '=', $id_comision)
            ->get()->toJson();
            return json_encode($comision);
        }
    }


    public function delete_comision(Request $request)
    {
        if($request->ajax()){
            $id_comision = $request->id_comision;
            $comision = Prevencion_Comision::where('id', $id_comision)->delete();
            return response("eliminado");
        }
    }





    public function list_reunion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Reunion::orderBy('no6')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha1', function ($comision) {
            $html3 = $comision->no6;
            return $html3;
        })
        ->addColumn('fecha2', function ($comision) {
            $html4 = $comision->no7;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_reunion('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_reunion('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function create_reunion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_reunion = $request->id_reunion;
            $no6 = $request->no6;
            $empresa_id = $request->empresaid_reunion;

            if($id_reunion==""){
                $reunion = Prevencion_Reunion::where('no6', '=', $no6)->get()->first();
                //GUARDAR REGISTRO
                if($reunion==""){
                    $cons = new Prevencion_Reunion();
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Reunion::find($id_reunion);
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_reunion(Request $request)
    {
        if($request->ajax()){
            $id_reunion = $request->id_reunion;
            $reunion = Prevencion_Reunion::where('id', '=', $id_reunion)
            ->get()->toJson();
            return json_encode($reunion);
        }
    }


    public function delete_reunion(Request $request)
    {
        if($request->ajax()){
            $id_reunion = $request->id_reunion;
            $reunion = Prevencion_Reunion::where('id', $id_reunion)->delete();
            return response("eliminado");
        }
    }





    public function list_plan(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Plan::orderBy('no10')->get();
        
        return datatables()->of($comision)
        ->addColumn('actividad', function ($comision) {
            $html3 = $comision->no10;
            return $html3;
        })
        ->addColumn('tipo', function ($comision) {
            $html4 = $comision->no11;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_plan('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_plan('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['actividad', 'tipo', 'edit', 'delete'])
        ->make(true);
    }


    public function create_plan(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_plan = $request->id_plan;
            $no10 = $request->no10;
            $empresa_id = $request->empresaid_plan;

            $array="";
            $array2="";
            
            foreach($request->candidatos as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                    $array2.=$request->{"rol$selected"}."|";
                }
            }

            if($id_plan==""){
                $plan = Prevencion_Plan::where('no10', '=', $no10)->get()->first();
                //GUARDAR REGISTRO
                if($plan==""){
                    $cons = new Prevencion_Plan();
                    $cons -> no10 = $request->no10;
                    $cons -> no11 = $request->no11;
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> no17 = $array;
                    $cons -> no18 = $array2;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Plan::find($id_plan);
                $cons -> no10 = $request->no10;
                $cons -> no11 = $request->no11;
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> no17 = $array;
                $cons -> no18 = $array2;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_plan(Request $request)
    {
        if($request->ajax()){
            $id_plan = $request->id_plan;
            $plan = Prevencion_Plan::where('id', '=', $id_plan)
            ->get()->toJson();
            return json_encode($plan);
        }
    }


    public function delete_plan(Request $request)
    {
        if($request->ajax()){
            $id_plan = $request->id_plan;
            $plan = Prevencion_Plan::where('id', $id_plan)->delete();
            return response("eliminado");
        }
    }





    public function list_revision(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Revision::orderBy('no19')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no19;
            return $html3;
        })
        ->addColumn('instalacion', function ($comision) {
            $html4 = $comision->no22;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_revision('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_revision('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'instalacion', 'edit', 'delete'])
        ->make(true);
    }


    public function create_revision(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_revision = $request->id_revision;
            $no19 = $request->no19;
            $empresa_id = $request->empresaid_revision;

            if($id_revision==""){
                $revision = Prevencion_Revision::where('no19', '=', $no19)->get()->first();
                //GUARDAR REGISTRO
                if($revision==""){
                    $cons = new Prevencion_Revision();
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no30 = $request->no30;
                    $cons -> no31 = $request->no31;
                    $cons -> no32 = $request->no32;
                    $cons -> no33 = $request->no33;
                    $cons -> no34 = $request->no34;
                    $cons -> no35 = $request->no35;
                    $cons -> no36 = $request->no36;
                    $cons -> no37 = $request->no37;
                    $cons -> no38 = $request->no38;
                    $cons -> no39 = $request->no39;
                    $cons -> no40 = $request->no40;
                    $cons -> no41 = $request->no41;
                    $cons -> no42 = $request->no42;
                    $cons -> no43 = $request->no43;
                    $cons -> no44 = $request->no44;
                    $cons -> no45 = $request->no45;
                    $cons -> no46 = $request->no46;
                    $cons -> no47 = $request->no47;
                    $cons -> no48 = $request->no48;
                    $cons -> no49 = $request->no49;
                    $cons -> no50 = $request->no50;
                    $cons -> no51 = $request->no51;
                    $cons -> no52 = $request->no52;
                    $cons -> no53 = $request->no53;
                    $cons -> no54 = $request->no54;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Revision::find($id_revision);
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no30 = $request->no30;
                $cons -> no31 = $request->no31;
                $cons -> no32 = $request->no32;
                $cons -> no33 = $request->no33;
                $cons -> no34 = $request->no34;
                $cons -> no35 = $request->no35;
                $cons -> no36 = $request->no36;
                $cons -> no37 = $request->no37;
                $cons -> no38 = $request->no38;
                $cons -> no39 = $request->no39;
                $cons -> no40 = $request->no40;
                $cons -> no41 = $request->no41;
                $cons -> no42 = $request->no42;
                $cons -> no43 = $request->no43;
                $cons -> no44 = $request->no44;
                $cons -> no45 = $request->no45;
                $cons -> no46 = $request->no46;
                $cons -> no47 = $request->no47;
                $cons -> no48 = $request->no48;
                $cons -> no49 = $request->no49;
                $cons -> no50 = $request->no50;
                $cons -> no51 = $request->no51;
                $cons -> no52 = $request->no52;
                $cons -> no53 = $request->no53;
                $cons -> no54 = $request->no54;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_revision(Request $request)
    {
        if($request->ajax()){
            $id_revision = $request->id_revision;
            $revision = Prevencion_Revision::where('id', '=', $id_revision)
            ->get()->toJson();
            return json_encode($revision);
        }
    }


    public function delete_revision(Request $request)
    {
        if($request->ajax()){
            $id_revision = $request->id_revision;
            $revision = Prevencion_Revision::where('id', $id_revision)->delete();
            return response("eliminado");
        }
    }





    public function list_bitacora(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Bitacora::orderBy('no55')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no55;
            return $html3;
        })
        ->addColumn('area', function ($comision) {
            $html4 = $comision->no56;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_bitacora('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_bitacora('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'area', 'edit', 'delete'])
        ->make(true);
    }


    public function create_bitacora(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_bitacora = $request->id_bitacora;
            $no55 = $request->no55;
            $empresa_id = $request->empresaid_bitacora;

            if($id_bitacora==""){
                $bitacora = Prevencion_Bitacora::where('no55', '=', $no55)->get()->first();
                //GUARDAR REGISTRO
                if($bitacora==""){
                    $cons = new Prevencion_Bitacora();
                    $cons -> no55 = $request->no55;
                    $cons -> no56 = $request->no56;
                    $cons -> no57 = $request->no57;
                    $cons -> no58 = $request->no58;
                    $cons -> no59 = $request->no59;
                    $cons -> no60 = $request->no60;
                    $cons -> no61 = $request->no61;
                    $cons -> no62 = $request->no62;
                    $cons -> no63 = $request->no63;
                    $cons -> no64 = $request->no64;
                    $cons -> no65 = $request->no65;
                    $cons -> no66 = $request->no66;
                    $cons -> no67 = $request->no67;
                    $cons -> no68 = $request->no68;
                    $cons -> no69 = $request->no69;
                    $cons -> no70 = $request->no70;
                    $cons -> no71 = $request->no71;
                    $cons -> no72 = $request->no72;
                    $cons -> no73 = $request->no73;
                    $cons -> no74 = $request->no74;
                    $cons -> no75 = $request->no75;
                    $cons -> no76 = $request->no76;
                    $cons -> no77 = $request->no77;
                    $cons -> no78 = $request->no78;
                    $cons -> no79 = $request->no79;
                    $cons -> no80 = $request->no80;
                    $cons -> no81 = $request->no81;
                    $cons -> no82 = $request->no82;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Bitacora::find($id_bitacora);
                $cons -> no55 = $request->no55;
                $cons -> no56 = $request->no56;
                $cons -> no57 = $request->no57;
                $cons -> no58 = $request->no58;
                $cons -> no59 = $request->no59;
                $cons -> no60 = $request->no60;
                $cons -> no61 = $request->no61;
                $cons -> no62 = $request->no62;
                $cons -> no63 = $request->no63;
                $cons -> no64 = $request->no64;
                $cons -> no65 = $request->no65;
                $cons -> no66 = $request->no66;
                $cons -> no67 = $request->no67;
                $cons -> no68 = $request->no68;
                $cons -> no69 = $request->no69;
                $cons -> no70 = $request->no70;
                $cons -> no71 = $request->no71;
                $cons -> no72 = $request->no72;
                $cons -> no73 = $request->no73;
                $cons -> no74 = $request->no74;
                $cons -> no75 = $request->no75;
                $cons -> no76 = $request->no76;
                $cons -> no77 = $request->no77;
                $cons -> no78 = $request->no78;
                $cons -> no79 = $request->no79;
                $cons -> no80 = $request->no80;
                $cons -> no81 = $request->no81;
                $cons -> no82 = $request->no82;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_bitacora(Request $request)
    {
        if($request->ajax()){
            $id_bitacora = $request->id_bitacora;
            $bitacora = Prevencion_Bitacora::where('id', '=', $id_bitacora)
            ->get()->toJson();
            return json_encode($bitacora);
        }
    }


    public function delete_bitacora(Request $request)
    {
        if($request->ajax()){
            $id_bitacora = $request->id_bitacora;
            $bitacora = Prevencion_Bitacora::where('id', $id_bitacora)->delete();
            return response("eliminado");
        }
    }





    public function list_simulacro(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Simulacro::orderBy('no83')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no83;
            return $html3;
        })
        ->addColumn('descripcion', function ($comision) {
            $html4 = $comision->no86;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_simulacro('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_simulacro('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'descripcion', 'edit', 'delete'])
        ->make(true);
    }


    public function create_simulacro(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_simulacro = $request->id_simulacro;
            $no83 = $request->no83;
            $empresa_id = $request->empresaid_simulacro;

            if($id_simulacro==""){
                $simulacro = Prevencion_Simulacro::where('no83', '=', $no83)->get()->first();
                //GUARDAR REGISTRO
                if($simulacro==""){
                    $cons = new Prevencion_Simulacro();
                    $cons -> no83 = $request->no83;
                    $cons -> no84 = $request->no84;
                    $cons -> no85 = $request->no85;
                    $cons -> no86 = $request->no86;
                    $cons -> no87 = $request->no87;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Simulacro::find($id_simulacro);
                $cons -> no83 = $request->no83;
                $cons -> no84 = $request->no84;
                $cons -> no85 = $request->no85;
                $cons -> no86 = $request->no86;
                $cons -> no87 = $request->no87;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_simulacro(Request $request)
    {
        if($request->ajax()){
            $id_simulacro = $request->id_simulacro;
            $simulacro = Prevencion_Simulacro::where('id', '=', $id_simulacro)
            ->get()->toJson();
            return json_encode($simulacro);
        }
    }


    public function delete_simulacro(Request $request)
    {
        if($request->ajax()){
            $id_simulacro = $request->id_simulacro;
            $simulacro = Prevencion_Simulacro::where('id', $id_simulacro)->delete();
            return response("eliminado");
        }
    }





    public function list_visita(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Prevencion_Visita::orderBy('no88')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no88;
            return $html3;
        })
        ->addColumn('objetivo', function ($comision) {
            $html4 = $comision->no89;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_visita('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_visita('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'objetivo', 'edit', 'delete'])
        ->make(true);
    }


    public function create_visita(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_visita = $request->id_visita;
            $no88 = $request->no88;
            $empresa_id = $request->empresaid_visita;

            if($id_visita==""){
                $visita = Prevencion_Visita::where('no88', '=', $no88)->get()->first();
                //GUARDAR REGISTRO
                if($visita==""){
                    $cons = new Prevencion_Visita();
                    $cons -> no88 = $request->no88;
                    $cons -> no89 = $request->no89;
                    $cons -> no90 = $request->no90;
                    $cons -> no91 = $request->no91;
                    $cons -> no92 = $request->no92;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Prevencion_Visita::find($id_visita);
                $cons -> no88 = $request->no88;
                $cons -> no89 = $request->no89;
                $cons -> no90 = $request->no90;
                $cons -> no91 = $request->no91;
                $cons -> no92 = $request->no92;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_visita(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $visita = Prevencion_Visita::where('id', '=', $id_visita)
            ->get()->toJson();
            return json_encode($visita);
        }
    }


    public function delete_visita(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $visita = Prevencion_Visita::where('id', $id_visita)->delete();
            return response("eliminado");
        }
    }



}