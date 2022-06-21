<?php

namespace App\Http\Controllers\MCE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MCE\RevisionesMCE;
use App\Models\MCE\PresentacionesMCE;
use App\Models\MCE\ProtocolosMCE;
use App\Models\MCE\ICFMCE;
use App\Models\MCE\AnimalesMCE;
use App\Models\MCE\RespProtocolosMCE;
use App\Models\MCE\RespICFMCE;
use App\Models\MCE\RespAnimalesMCE;
use App\Models\Administracion\Proyecto;
use Illuminate\Support\Facades\Storage;

// Start of uses

class RevisionesMCEController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:revisiones_comite.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mce_presentaciones = PresentacionesMCE::all();
        $mce_protocolos = ProtocolosMCE::all();
        $mce_icf = ICFMCE::where('tipo', '=', 'ICF')->get();
        $mce_animales = AnimalesMCE::all();
        $protocolos = Proyecto::where('no27', '=', 'Revisión')->pluck('no18', 'id');
		return view('mce/revisiones_comite.index', compact('mce_presentaciones', 'mce_protocolos', 'mce_icf', 'mce_animales', 'protocolos'));
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
    public function show(Inventario $inventario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
       
    }



    //PRESENTACIONES
    public function create_presentacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $protocolo = $request->protocolo;
            $archivo = $request->file('archivo');
            $empresa_id = 15;
            $filename = $request->file('archivo')->getClientOriginalName();
            $directorio = "Presentaciones/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo'), 'r+'), 'public');


            if($protocolo!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = PresentacionesMCE::where('protocolo', '=', $protocolo)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new PresentacionesMCE();
                    $pre -> protocolo = $protocolo;
                    $pre -> directorio = $directorio;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }


    public function delete_presentacion(Request $request)
    {
        if($request->ajax()){
            $id_presentacion = $request->id_presentacion;
            $pr = PresentacionesMCE::where('id', '=', $id_presentacion)->get()->first();
            $directorio=$pr->directorio;

            Storage::disk('mce')->delete($directorio);
            $pre = PresentacionesMCE::where('id', $id_presentacion)->delete();
            return response("eliminado");
        }
    }




    //PROTOCOLO
    public function create_protocolo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $codigo = $request->codigo_protocolo;
            $nombre = $request->nombre_protocolo;
            $archivo = $request->file('archivo_protocolo');
            $archivo2 = $request->file('archivo_protocolo2');
            $empresa_id = 15;
            $filename = $request->file('archivo_protocolo')->getClientOriginalName();
            $directorio = "Protocolos/".$filename;
            $filename2 = $request->file('archivo_protocolo2')->getClientOriginalName();
            $directorio2 = "Protocolos/".$filename2;

            Storage::disk('mce')->put($directorio, fopen($request->file('archivo_protocolo'), 'r+'), 'public');
            Storage::disk('mce')->put($directorio2, fopen($request->file('archivo_protocolo2'), 'r+'), 'public');

            $proyecto = Proyecto::where('id', '=', $codigo)->get()->first();
            $nom_cod=$proyecto->no18;

            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = ProtocolosMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new ProtocolosMCE();
                    $pre -> proyecto_id = $codigo;
                    $pre -> codigo = $nom_cod;
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $directorio;
                    $pre -> directorio2 = $directorio2;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }


    public function delete_protocolo(Request $request)
    {
        if($request->ajax()){
            $id_protocolo = $request->id_protocolo;
            $pr = ProtocolosMCE::where('id', '=', $id_protocolo)->get()->first();
            $directorio=$pr->directorio;
            $directorio2=$pr->directorio2;

            Storage::disk('mce')->delete($directorio);
            Storage::disk('mce')->delete($directorio2);
            $pre = ProtocolosMCE::where('id', $id_protocolo)->delete();
            return response("eliminado");
        }
    }


    public function cargar_protocolo(Request $request)
    {
        if($request->ajax()){
            $id_proyecto = $request->id_proyecto;
            $pr = ProtocolosMCE::where('proyecto_id', '=', $id_proyecto)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function edit_protocolo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_proyecto = $request->id_proyecto;
            $pr = RespProtocolosMCE::where('proyecto_id', '=', $id_proyecto)
            ->where('id_user', '=', $user_id)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function guardar_protocolo(Request $request)
    {
        
            $user_id = auth()->id();
            $id = $request->protocolo_id;

            $array="";
            if($request->obj != ""){
            foreach($request->obj as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }
            }

            if($id==""){
                $int = new RespProtocolosMCE();
            }else{
                $int = RespProtocolosMCE::find($id);
            }

            //GUARDAR
            $int->p1 = $request->p1;
            $int->p2 = $request->p2;
            $int->p3 = $request->p3;
            $int->p4 = $request->p4;
            $int->p5 = $request->p5;
            $int->p6 = $array;
            $int->p7 = $request->p7;
            $int->p8 = $request->p8;
            $int->p9 = $request->p9;
            $int->p10 = $request->p10;
            $int->p11 = $request->p11;
            $int->p12 = $request->p12;
            $int->p13 = $request->p13;
            $int->p14 = $request->p14;
            $int->p15 = $request->p15;
            $int->p16 = $request->p16;
            $int->p17 = $request->p17;
            $int->p18 = $request->p18;
            $int->p19 = $request->p19;
            $int->p20 = $request->p20;
            $int->p21 = $request->p21;
            $int->p22 = $request->p22;
            $int->p23 = $request->p23;
            $int->p24 = $request->p24;
            $int->p25 = $request->p25;
            $int->p26 = $request->p26;
            $int->p27 = $request->p27;
            $int->p28 = $request->p28;
            $int->p29 = $request->p29;
            $int->p30 = $request->p30;
            $int->p31 = $request->p31;
            $int->p32 = $request->p32;
            $int->p33 = $request->p33;
            $int->p34 = $request->p34;
            $int->p35 = $request->p35;
            $int->p36 = $request->p36;
            $int->p37 = $request->p37;
            $int->p38 = $request->p38;
            $int->is_active = 1;
            $int->proyecto_id = $request->proyectoid_protocolo;
            $int->id_user = $user_id;
            $int -> save();
            //SACAR EL ID
            if($id==""){
                $integracion = RespProtocolosMCE::where('proyecto_id', '=', $request->proyectoid_protocolo)
                ->where('id_user', '=', $user_id)->get()->first();
                $id = $integracion->protocolo_id;
            }
            
            return response($id);
        
    }





    //ICF
    public function create_icf(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $codigo = $request->codigo_icf;
            $nombre = $request->nombre_icf;
            $archivo = $request->file('archivo_icf');
            $empresa_id = 15;
            $filename = $request->file('archivo_icf')->getClientOriginalName();
            $directorio = "ICF/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo_icf'), 'r+'), 'public');

            $proyecto = Proyecto::where('id', '=', $codigo)->get()->first();
            $nom_cod=$proyecto->no18;

            $tipo="ICF";

            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = ICFMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new ICFMCE();
                    $pre -> proyecto_id = $codigo;
                    $pre -> codigo = $nom_cod;
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $directorio;
                    $pre -> tipo = $tipo;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }


    public function delete_icf(Request $request)
    {
        if($request->ajax()){
            $id_icf = $request->id_icf;
            $pr = ICFMCE::where('id', '=', $id_icf)->get()->first();
            $directorio=$pr->directorio;

            Storage::disk('mce')->delete($directorio);
            $pre = ICFMCE::where('id', $id_icf)->delete();
            return response("eliminado");
        }
    }


    public function cargar_icf(Request $request)
    {
        if($request->ajax()){
            $id_proyecto = $request->id_proyecto;
            $pr = ICFMCE::where('proyecto_id', '=', $id_proyecto)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function edit_icf(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_proyecto = $request->id_proyecto;
            $pr = RespICFMCE::where('proyecto_id', '=', $id_proyecto)
            ->where('id_user', '=', $user_id)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function guardar_icf(Request $request)
    {
        
            $user_id = auth()->id();
            $id = $request->icf_id;

            if($id==""){
                $int = new RespICFMCE();
            }else{
                $int = RespICFMCE::find($id);
            }

            //GUARDAR
            $int->i1 = $request->i1;
            $int->i2 = $request->i2;
            $int->i3 = $request->i3;
            $int->i4 = $request->i4;
            $int->i5 = $request->i5;
            $int->i6 = $request->i6;
            $int->i7 = $request->i7;
            $int->i8 = $request->i8;
            $int->i9 = $request->i9;
            $int->i10 = $request->i10;
            $int->i11 = $request->i11;
            $int->i12 = $request->i12;
            $int->i13 = $request->i13;
            $int->i14 = $request->i14;
            $int->i15 = $request->i15;
            $int->i16 = $request->i16;
            $int->i17 = $request->i17;
            $int->i18 = $request->i18;
            $int->i19 = $request->i19;
            $int->i20 = $request->i20;
            $int->i21 = $request->i21;
            $int->i22 = $request->i22;
            $int->i23 = $request->i23;
            $int->i24 = $request->i24;
            $int->i25 = $request->i25;
            $int->i26 = $request->i26;
            $int->i27 = $request->i27;
            $int->i28 = $request->i28;
            $int->i29 = $request->i29;
            $int->i30 = $request->i30;
            $int->i31 = $request->i31;
            $int->i32 = $request->i32;
            $int->i33 = $request->i33;
            $int->i34 = $request->i34;
            $int->i35 = $request->i35;
            $int->i36 = $request->i36;
            $int->i37 = $request->i37;
            $int->i38 = $request->i38;
            $int->i39 = $request->i39;
            $int->i40 = $request->i40;
            $int->i41 = $request->i41;
            $int->i42 = $request->i42;
            $int->i43 = $request->i43;
            $int->i44 = $request->i44;
            $int->i45 = $request->i45;
            $int->i46 = $request->i46;
            $int->i47 = $request->i47;
            $int->i48 = $request->i48;
            $int->i49 = $request->i49;
            $int->i50 = $request->i50;
            $int->i51 = $request->i51;
            $int->i52 = $request->i52;
            $int->i53 = $request->i53;
            $int->i54 = $request->i54;
            $int->i55 = $request->i55;
            $int->i56 = $request->i56;
            $int->i57 = $request->i57;
            $int->i58 = $request->i58;
            $int->i59 = $request->i59;
            $int->i60 = $request->i60;
            $int->i61 = $request->i61;
            $int->is_active = 1;
            $int->proyecto_id = $request->proyectoid_icf;
            $int->id_user = $user_id;
            $int -> save();
            //SACAR EL ID
            if($id==""){
                $integracion = RespICFMCE::where('proyecto_id', '=', $request->proyectoid_icf)
                ->where('id_user', '=', $user_id)->get()->first();
                $id = $integracion->icf_id;
            }
            
            return response($id);
    }





    //ANIMALES
    public function create_animales(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $codigo = $request->codigo_animales;
            $nombre = $request->nombre_animales;
            $archivo = $request->file('archivo_animales');
            $empresa_id = 15;
            $filename = $request->file('archivo_animales')->getClientOriginalName();
            $directorio = "Animales/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo_animales'), 'r+'), 'public');

            $proyecto = Proyecto::where('id', '=', $codigo)->get()->first();
            $nom_cod=$proyecto->no18;

            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = AnimalesMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new AnimalesMCE();
                    $pre -> proyecto_id = $codigo;
                    $pre -> codigo = $nom_cod;
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $directorio;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }


    public function delete_animales(Request $request)
    {
        if($request->ajax()){
            $id_animales = $request->id_animales;
            $pr = AnimalesMCE::where('id', '=', $id_animales)->get()->first();
            $directorio=$pr->directorio;

            Storage::disk('mce')->delete($directorio);
            $pre = AnimalesMCE::where('id', $id_animales)->delete();
            return response("eliminado");
        }
    }


    public function cargar_animales(Request $request)
    {
        if($request->ajax()){
            $id_proyecto = $request->id_proyecto;
            $pr = AnimalesMCE::where('proyecto_id', '=', $id_proyecto)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function edit_animales(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_proyecto = $request->id_proyecto;
            $pr = RespAnimalesMCE::where('proyecto_id', '=', $id_proyecto)
            ->where('id_user', '=', $user_id)->get()->toJson();
            return json_encode($pr);
        }
    }

    public function guardar_animales(Request $request)
    {
        
            $user_id = auth()->id();
            $id = $request->animal_id;

            if($id==""){
                $int = new RespAnimalesMCE();
            }else{
                $int = RespAnimalesMCE::find($id);
            }

            //GUARDAR
            $int->a1 = $request->a1;
            $int->a2 = $request->a2;
            $int->a3 = $request->a3;
            $int->a4 = $request->a4;
            $int->a5 = $request->a5;
            $int->a6 = $request->a6;
            $int->is_active = 1;
            $int->proyecto_id = $request->proyectoid_animal;
            $int->id_user = $user_id;
            $int -> save();
            //SACAR EL ID
            if($id==""){
                $integracion = RespAnimalesMCE::where('proyecto_id', '=', $request->proyectoid_animal)
                ->where('id_user', '=', $user_id)->get()->first();
                $id = $integracion->animal_id;
            }
            
            return response($id);
    }





    //POLIZA
    public function create_poliza(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $codigo = $request->codigo_poliza;
            $nombre = $request->nombre_poliza;
            $archivo = $request->file('archivo_poliza');
            $empresa_id = 15;
            $filename = $request->file('archivo_poliza')->getClientOriginalName();
            $directorio = "ICF/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo_poliza'), 'r+'), 'public');

            $tipo="Póliza";

            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = ICFMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new ICFMCE();
                    $pre -> proyecto_id = $codigo;
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $directorio;
                    $pre -> tipo = $tipo;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }





    //MATERIAL
    public function create_material(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $codigo = $request->codigo_material;
            $nombre = $request->nombre_material;
            $archivo = $request->file('archivo_material');
            $empresa_id = 15;
            $filename = $request->file('archivo_material')->getClientOriginalName();
            $directorio = "ICF/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo_material'), 'r+'), 'public');

            $tipo="Material";

            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = ICFMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new ICFMCE();
                    $pre -> proyecto_id = $codigo;
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $directorio;
                    $pre -> tipo = $tipo;
                    $pre -> is_active = 1;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }




}