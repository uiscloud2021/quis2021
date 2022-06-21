<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Factibilidad;
use App\Models\SitioClinico\Equipamiento_Factibilidad;
use App\Models\SitioClinico\Seguimiento_Factibilidad;
use App\Models\SitioClinico\Sometimiento;
use App\Models\SitioClinico\Equipo_Sometimiento;
use App\Models\SitioClinico\Som_Sometimiento;
use App\Models\SitioClinico\Respuesta_Sometimiento;
use App\Models\SitioClinico\Farmacia;
use App\Models\SitioClinico\Infraestructura_Farmacia;
use App\Models\SitioClinico\Materiales_Farmacia;
use App\Models\SitioClinico\Farmacista_Farmacia;
use App\Models\SitioClinico\Control_Farmacia;
use App\Models\SitioClinico\Tramite_Farmacia;
use App\Models\SitioClinico\Visita_Farmacia;
use App\Models\SitioClinico\Queja_Farmacia;
use App\Models\SitioClinico\Seguridad_Farmacia;
use App\Models\SitioClinico\Cadena_Farmacia;
use App\Models\SitioClinico\Recepcion_Farmacia;
use App\Models\SitioClinico\Producto_Farmacia;
use App\Models\SitioClinico\Material_Farmacia;
use App\Models\SitioClinico\Equipo_Farmacia;
use App\Models\SitioClinico\ReclutamientoSC;
use App\Models\SitioClinico\Cronograma_Reclutamiento;
use App\Models\SitioClinico\Estrategia_Reclutamiento;
use App\Models\SitioClinico\Contacto_Reclutamiento;
use App\Models\SitioClinico\Criterio_Reclutamiento;
use App\Models\SitioClinico\Preseleccion_Reclutamiento;
use App\Models\SitioClinico\FuenteSujeto_Reclutamiento;
use App\Models\SitioClinico\FuenteEstudio_Reclutamiento;
use App\Models\SitioClinico\FuenteVisita_Reclutamiento;
use App\Models\SitioClinico\Rec_Reclutamiento;
use App\Models\SitioClinico\Proteccion_Reclutamiento;

use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Investigador;
use App\Models\Administracion\Prep_Visita;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// Start of uses

class SCController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:eq-sc.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))
        ->where('no10', '=', 'Si')->get();
		return view('eq-sc.index', compact('proyectos'));
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
    public function show($id)
    {
        $proyecto = Proyecto::where('id', '=', $id)->get()->first();
        $factibilidad = Factibilidad::where('proyecto_id', '=', $id)->get()->first();
        $sometimiento = Sometimiento::where('proyecto_id', '=', $id)->get()->first();
        $farmacia = Farmacia::where('empresa_id', '=', session('id_empresa'))->get()->first();
        $reclutamiento = ReclutamientoSC::where('proyecto_id', '=', $id)->get()->first();

        $investigadores = Investigador::pluck('investigador', 'id');
        $empleados = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');
        $visitas = Prep_Visita::where('empresa_id', '=', session('id_empresa'))
        ->where('proyecto_id', '=', $id)->pluck('no22', 'id');
        $sujetos = Contacto_Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('proyecto_id', '=', $id)->pluck('r81', 'id');

        //if($factibilidad==""){
          //  return view('eq-sc.show', compact('proyecto', 'investigadores'));
        //}else{
            return view('eq-sc.show', compact('proyecto', 'factibilidad', 'sometimiento', 'farmacia', 'reclutamiento', 'investigadores', 'empleados', 'visitas', 'sujetos'));
        //}
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




    //FACTIBILIDAD
    public function create_factibilidad(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            'f1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->factibilidad_id;

        $fecha1=$request->f32;
        $fecha2=$request->f33;
        $dateDifference = abs(strtotime($fecha2) - strtotime($fecha1));
        $dias  = floor($dateDifference / (60 * 60 * 24));
        $objetivo="";
        if($dias <= 3){
            $objetivo="Si";
        }else{
            $objetivo="No";
        }

        if($id==""){
            $fact = new Factibilidad();
        }else{
            $fact = Factibilidad::find($id);
        }

		//GUARDAR REGISTROS FACTIBILIDAD
        $fact->f1 = $request->f1;
        $fact->f2 = $request->f2;
        $fact->f3 = $request->f3;
        $fact->f4 = $request->f4;
        $fact->f5 = $request->f5;
        $fact->f6 = $request->f6;
        $fact->f7 = $request->f7;
        $fact->f8 = $request->f8;
        $fact->f9 = $request->f9;
        $fact->f10 = $request->f10;
        $fact->f11 = $request->f11;
        $fact->f12 = $request->f12;
        $fact->f13 = $request->f13;
        $fact->f14 = $request->f14;
        $fact->f15 = $request->f15;
        $fact->f16 = $request->f16;
        $fact->f17 = $request->f17;
        $fact->f18 = $request->f18;
        $fact->f19 = $request->f19;
        $fact->f20 = $request->f20;
        $fact->f21 = $request->f21;
        $fact->f22 = $request->f22;
        $fact->f23 = $request->f23;
        $fact->f24 = $request->f24;
        $fact->f25 = $request->f25;
        $fact->f26 = $request->f26;
        $fact->f29 = $request->f29;
        $fact->f30 = $request->f30;
        $fact->f31 = $request->f31;
        $fact->f32 = $request->f32;
        $fact->f33 = $request->f33;
        $fact->f34 = $request->f34;
        $fact->f35 = $request->f35;
        $fact->f36 = $request->f36;
        $fact->f37 = $request->f37;
        $fact->f38 = $request->f38;
        $fact->f39 = $request->f39;
        $fact->f40 = $request->f40;
        $fact->f41 = $request->f41;
        $fact->f42 = $request->f42;
        $fact->f45 = $request->f45;
        $fact->f46 = $request->f46;
        $fact->f47 = $request->f47;
        $fact->f48 = $request->f48;
        $fact->f49 = $request->f49;
        $fact->f50 = $request->f50;
        $fact->f51 = $request->f51;
        $fact->f52 = $request->f52;
        $fact->f53 = $request->f53;
        $fact->f54 = $request->f54;
        $fact->f55 = $request->f55;
        $fact->f56 = $request->f56;
        $fact->f57 = $request->f57;
        $fact->f58 = $request->f58;
        $fact->f59 = $request->f59;
        $fact->f60 = $dias;
        $fact->f61 = $objetivo;
        $fact->is_active = 1;
        $fact->proyecto_id = $request->proyecto_id;
        $fact->empresa_id = $request->empresa_id;
        $fact->id_user = $id_user;
        $fact -> save();

        //SACAR EL ID
        if($id==""){
            $factibilidad = Factibilidad::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $factibilidad->factibilidad_id;
        }
        //return redirect()->route('eq-sc.show', $request->proyecto_id)->with('info', 'La factibilidad se guardó correctamente');
        return response($id);
    }



    public function guardar_factibilidad(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->factibilidad_id;

            $fecha1=$request->f32;
            $fecha2=$request->f33;
            $dateDifference = abs(strtotime($fecha2) - strtotime($fecha1));
            $dias  = floor($dateDifference / (60 * 60 * 24));
            $objetivo="";
            if($dias <= 3){
                $objetivo="Si";
            }else{
                $objetivo="No";
            }
            
            //GUARDAR
            if($id==""){
                $fact = new Factibilidad();
                $fact->f1 = $request->f1;
                $fact->f2 = $request->f2;
                $fact->f3 = $request->f3;
                $fact->f4 = $request->f4;
                $fact->f5 = $request->f5;
                $fact->f6 = $request->f6;
                $fact->f7 = $request->f7;
                $fact->f8 = $request->f8;
                $fact->f9 = $request->f9;
                $fact->f10 = $request->f10;
                $fact->f11 = $request->f11;
                $fact->f12 = $request->f12;
                $fact->f13 = $request->f13;
                $fact->f14 = $request->f14;
                $fact->f15 = $request->f15;
                $fact->f16 = $request->f16;
                $fact->f17 = $request->f17;
                $fact->f18 = $request->f18;
                $fact->f19 = $request->f19;
                $fact->f20 = $request->f20;
                $fact->f21 = $request->f21;
                $fact->f22 = $request->f22;
                $fact->f23 = $request->f23;
                $fact->f24 = $request->f24;
                $fact->f25 = $request->f25;
                $fact->f26 = $request->f26;
                $fact->f29 = $request->f29;
                $fact->f30 = $request->f30;
                $fact->f31 = $request->f31;
                $fact->f32 = $request->f32;
                $fact->f33 = $request->f33;
                $fact->f34 = $request->f34;
                $fact->f35 = $request->f35;
                $fact->f36 = $request->f36;
                $fact->f37 = $request->f37;
                $fact->f38 = $request->f38;
                $fact->f39 = $request->f39;
                $fact->f40 = $request->f40;
                $fact->f41 = $request->f41;
                $fact->f42 = $request->f42;
                $fact->f45 = $request->f45;
                $fact->f46 = $request->f46;
                $fact->f47 = $request->f47;
                $fact->f48 = $request->f48;
                $fact->f49 = $request->f49;
                $fact->f50 = $request->f50;
                $fact->f51 = $request->f51;
                $fact->f52 = $request->f52;
                $fact->f53 = $request->f53;
                $fact->f54 = $request->f54;
                $fact->f55 = $request->f55;
                $fact->f56 = $request->f56;
                $fact->f57 = $request->f57;
                $fact->f58 = $request->f58;
                $fact->f59 = $request->f59;
                $fact->f60 = $dias;
                $fact->f61 = $objetivo;
                $fact->is_active = 1;
                $fact->proyecto_id = $request->proyecto_id;
                $fact->empresa_id = $request->empresa_id;
                $fact->id_user = $user_id;
                $fact -> save();
                //SACAR EL ID
                $factibilidad = Factibilidad::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                $id = $factibilidad->factibilidad_id;
            }
            
            return response($id);
        }
    }



    public function list_equipamientofact(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Equipamiento_Factibilidad::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('f27')->get();
        
        return datatables()->of($eq)
        ->addColumn('problema', function ($eq) {
            $html3 = $eq->f27;
            return $html3;
        })
        ->addColumn('solucion', function ($eq) {
            $html4 = $eq->f28;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equipamientofact('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_equipamientofact('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['problema', 'solucion', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equipamientofact(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_equipamientofact;
            $f27 = $request->f27;
            $f28 = $request->f28;
            $empresa_id = $request->empresaid_equipamientofact;
            $proyecto_id = $request->proyectoid_equipamientofact;
            $factibilidad_id = $request->factibilidadid_equipamientofact;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Equipamiento_Factibilidad::where('f27', '=', $f27)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Equipamiento_Factibilidad();
                    $equi -> f27 = $request->f27;
                    $equi -> f28 = $request->f28;
                    $equi -> factibilidad_id = $factibilidad_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Equipamiento_Factibilidad::find($id_eq);
                $equi -> f27 = $request->f27;
                $equi -> f28 = $request->f28;
                $equi -> factibilidad_id = $factibilidad_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equipamientofact(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_equipamiento;
            $eq = Equipamiento_Factibilidad::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_equipamientofact(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_equipamiento;
            $eq = Equipamiento_Factibilidad::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }





    public function list_seguimientofact(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Seguimiento_Factibilidad::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('f43')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->f43;
            return $html3;
        })
        ->addColumn('resultado', function ($eq) {
            $html4 = $eq->f44;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_seguimientofact('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_seguimientofact('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'resultado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_seguimientofact(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_seguimientofact;
            $f43 = $request->f43;
            $f44 = $request->f44;
            $empresa_id = $request->empresaid_seguimientofact;
            $proyecto_id = $request->proyectoid_seguimientofact;
            $factibilidad_id = $request->factibilidadid_seguimientofact;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Seguimiento_Factibilidad::where('f43', '=', $f43)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Seguimiento_Factibilidad();
                    $equi -> f43 = $request->f43;
                    $equi -> f44 = $request->f44;
                    $equi -> factibilidad_id = $factibilidad_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Seguimiento_Factibilidad::find($id_eq);
                $equi -> f43 = $request->f43;
                $equi -> f44 = $request->f44;
                $equi -> factibilidad_id = $factibilidad_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_seguimientofact(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_seguimiento;
            $eq = Seguimiento_Factibilidad::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_seguimientofact(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_seguimiento;
            $eq = Seguimiento_Factibilidad::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }






    //SOMETIMIENTO
    public function create_sometimiento(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            's1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->sometimiento_id;

        $fecha1=$request->s25;
        $fecha2=$request->s50;
        $dateDifference = abs(strtotime($fecha2) - strtotime($fecha1));
        $dias  = floor($dateDifference / (60 * 60 * 24));
        $objetivo="";
        if($dias <= 7){
            $objetivo="Si";
        }else{
            $objetivo="No";
        }

        if($id==""){
            $fact = new Sometimiento();
        }else{
            $fact = Sometimiento::find($id);
        }

		//GUARDAR REGISTROS SOMETIMIENTO
        $fact->s1 = $request->s1;
        $fact->s2 = $request->s2;
        $fact->s25 = $request->s25;
        $fact->s26 = $request->s26;
        $fact->s27 = $request->s27;
        $fact->s28 = $request->s28;
        $fact->s29 = $request->s29;
        $fact->s30 = $request->s30;
        $fact->s31 = $request->s31;
        $fact->s32 = $request->s32;
        $fact->s33 = $request->s33;
        $fact->s34 = $request->s34;
        $fact->s35 = $request->s35;
        $fact->s36 = $request->s36;
        $fact->s37 = $request->s37;
        $fact->s38 = $request->s38;
        $fact->s39 = $request->s39;
        $fact->s40 = $request->s40;
        $fact->s41 = $request->s41;
        $fact->s42 = $request->s42;
        $fact->s43 = $request->s43;
        $fact->s44 = $request->s44;
        $fact->s45 = $request->s45;
        $fact->s46 = $request->s46;
        $fact->s47 = $request->s47;
        $fact->s48 = $request->s48;
        $fact->s49 = $request->s49;
        $fact->s50 = $request->s50;
        $fact->s51 = $request->s51;
        $fact->s52 = $request->s52;
        $fact->s53 = $request->s53;
        $fact->s54 = $dias;
        $fact->s55 = $objetivo;
        $fact->is_active = 1;
        $fact->proyecto_id = $request->proyecto_id;
        $fact->empresa_id = $request->empresa_id;
        $fact->id_user = $id_user;
        $fact -> save();

        //SACAR EL ID
        if($id==""){
            $sometimiento = Sometimiento::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $sometimiento->sometimiento_id;
        }
        //return redirect()->route('eq-sc.show', $request->proyecto_id)->with('info', 'La factibilidad se guardó correctamente');
        return response($id);
    }



    public function guardar_sometimiento(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->sometimiento_id;

            $fecha1=$request->s25;
            $fecha2=$request->s50;
            $dateDifference = abs(strtotime($fecha2) - strtotime($fecha1));
            $dias  = floor($dateDifference / (60 * 60 * 24));
            $objetivo="";
            if($dias <= 7){
                $objetivo="Si";
            }else{
                $objetivo="No";
            }
            
            //GUARDAR
            if($id==""){
                $fact = new Sometimiento();
                $fact->s1 = $request->s1;
                $fact->s2 = $request->s2;
                $fact->s25 = $request->s25;
                $fact->s26 = $request->s26;
                $fact->s27 = $request->s27;
                $fact->s28 = $request->s28;
                $fact->s29 = $request->s29;
                $fact->s30 = $request->s30;
                $fact->s31 = $request->s31;
                $fact->s32 = $request->s32;
                $fact->s33 = $request->s33;
                $fact->s34 = $request->s34;
                $fact->s35 = $request->s35;
                $fact->s36 = $request->s36;
                $fact->s37 = $request->s37;
                $fact->s38 = $request->s38;
                $fact->s39 = $request->s39;
                $fact->s40 = $request->s40;
                $fact->s41 = $request->s41;
                $fact->s42 = $request->s42;
                $fact->s43 = $request->s43;
                $fact->s44 = $request->s44;
                $fact->s45 = $request->s45;
                $fact->s46 = $request->s46;
                $fact->s47 = $request->s47;
                $fact->s48 = $request->s48;
                $fact->s49 = $request->s49;
                $fact->s50 = $request->s50;
                $fact->s51 = $request->s51;
                $fact->s52 = $request->s52;
                $fact->s53 = $request->s53;
                $fact->s54 = $dias;
                $fact->s55 = $objetivo;
                $fact->is_active = 1;
                $fact->proyecto_id = $request->proyecto_id;
                $fact->empresa_id = $request->empresa_id;
                $fact->id_user = $user_id;
                $fact -> save();
                //SACAR EL ID
                $sometimiento = Sometimiento::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                $id = $sometimiento->sometimiento_id;
            }
            
            return response($id);
        }
    }



    public function list_equiposom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Equipo_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s3')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->s3;
            return $html3;
        })
        ->addColumn('rol', function ($eq) {
            $html4 = $eq->s4;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equiposom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_equiposom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'rol', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equiposom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_equiposom;
            $s3 = $request->s3;
            $empresa_id = $request->empresaid_equiposom;
            $proyecto_id = $request->proyectoid_equiposom;
            $sometimiento_id = $request->sometimientoid_equiposom;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Equipo_Sometimiento::where('s3', '=', $s3)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Equipo_Sometimiento();
                    $equi -> s3 = $request->s3;
                    $equi -> s4 = $request->s4;
                    $equi -> s5 = $request->s5;
                    $equi -> s6 = $request->s6;
                    $equi -> s7 = $request->s7;
                    $equi -> s8 = $request->s8;
                    $equi -> s9 = $request->s9;
                    $equi -> s10 = $request->s10;
                    $equi -> s11 = $request->s11;
                    $equi -> s12 = $request->s12;
                    $equi -> sometimiento_id = $sometimiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Equipo_Sometimiento::find($id_eq);
                $equi -> s3 = $request->s3;
                $equi -> s4 = $request->s4;
                $equi -> s5 = $request->s5;
                $equi -> s6 = $request->s6;
                $equi -> s7 = $request->s7;
                $equi -> s8 = $request->s8;
                $equi -> s9 = $request->s9;
                $equi -> s10 = $request->s10;
                $equi -> s11 = $request->s11;
                $equi -> s12 = $request->s12;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equiposom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_equipo;
            $eq = Equipo_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_equiposom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_equipo;
            $eq = Equipo_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_sometimientosom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Som_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s13')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html3 = $eq->s13;
            return $html3;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->s21;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_sometimientosom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_sometimientosom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }



    public function create_sometimientosom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_sometimientosom;
            $s13 = $request->s13;
            $empresa_id = $request->empresaid_sometimientosom;
            $proyecto_id = $request->proyectoid_sometimientosom;
            $sometimiento_id = $request->sometimientoid_sometimientosom;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Som_Sometimiento::where('s13', '=', $s13)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Som_Sometimiento();
                    $equi -> s13 = $request->s13;
                    $equi -> s14 = $request->s14;
                    $equi -> s15 = $request->s15;
                    $equi -> s16 = $request->s16;
                    $equi -> s17 = $request->s17;
                    $equi -> s18 = $request->s18;
                    $equi -> s19 = $request->s19;
                    $equi -> s20 = $request->s20;
                    $equi -> s21 = $request->s21;
                    $equi -> s22 = $request->s22;
                    $equi -> sometimiento_id = $sometimiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Som_Sometimiento::find($id_eq);
                $equi -> s13 = $request->s13;
                $equi -> s14 = $request->s14;
                $equi -> s15 = $request->s15;
                $equi -> s16 = $request->s16;
                $equi -> s17 = $request->s17;
                $equi -> s18 = $request->s18;
                $equi -> s19 = $request->s19;
                $equi -> s20 = $request->s20;
                $equi -> s21 = $request->s21;
                $equi -> s22 = $request->s22;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_sometimientosom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_sometimiento;
            $eq = Som_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_sometimientosom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_sometimiento;
            $eq = Som_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_respuestasom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Respuesta_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s23')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->s23;
            return $html3;
        })
        ->addColumn('respuesta', function ($eq) {
            $html4 = $eq->s24;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_respuestasom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_respuestasom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'respuesta', 'edit', 'delete'])
        ->make(true);
    }



    public function create_respuestasom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_respuestasom;
            $s23 = $request->s23;
            $empresa_id = $request->empresaid_respuestasom;
            $proyecto_id = $request->proyectoid_respuestasom;
            $sometimiento_id = $request->sometimientoid_respuestasom;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Respuesta_Sometimiento::where('s23', '=', $s23)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Respuesta_Sometimiento();
                    $equi -> s23 = $request->s23;
                    $equi -> s24 = $request->s24;
                    $equi -> sometimiento_id = $sometimiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Respuesta_Sometimiento::find($id_eq);
                $equi -> s23 = $request->s23;
                $equi -> s24 = $request->s24;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_respuestasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_respuesta;
            $eq = Respuesta_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_respuestasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_respuesta;
            $eq = Respuesta_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }






    //FARMACIA
    public function create_farmacia(Request $request)
    {		
        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->farmacia_id;

        if($id==""){
            $fact = new Farmacia();
        }else{
            $fact = Farmacia::find($id);
        }

		//GUARDAR REGISTROS FARMACIA
        $fact->far22 = $request->far22;
        $fact->far23 = $request->far23;
        $fact->far24 = $request->far24;
        $fact->far25 = $request->far25;
        $fact->far26 = $request->far26;
        $fact->far27 = $request->far27;
        $fact->far28 = $request->far28;
        $fact->far29 = $request->far29;
        $fact->far30 = $request->far30;
        $fact->far31 = $request->far31;
        $fact->far32 = $request->far32;
        $fact->far33 = $request->far33;
        $fact->far34 = $request->far34;
        $fact->far35 = $request->far35;
        $fact->far36 = $request->far36;
        $fact->far37 = $request->far37;
        $fact->is_active = 1;
        $fact->proyecto_id = $request->proyecto_id;
        $fact->empresa_id = $request->empresa_id;
        $fact->id_user = $id_user;
        $fact -> save();

        //SACAR EL ID
        if($id==""){
            $farmacia = Farmacia::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $farmacia->farmacia_id;
        }
        //return redirect()->route('eq-sc.show', $request->proyecto_id)->with('info', 'La factibilidad se guardó correctamente');
        return response($id);
    }



    public function guardar_farmacia(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->farmacia_id;
            
            //GUARDAR
            if($id==""){
                $fact = new Farmacia();
                $fact->far22 = $request->far22;
                $fact->far23 = $request->far23;
                $fact->far24 = $request->far24;
                $fact->far25 = $request->far25;
                $fact->far26 = $request->far26;
                $fact->far27 = $request->far27;
                $fact->far28 = $request->far28;
                $fact->far29 = $request->far29;
                $fact->far30 = $request->far30;
                $fact->far31 = $request->far31;
                $fact->far32 = $request->far32;
                $fact->far33 = $request->far33;
                $fact->far34 = $request->far34;
                $fact->far35 = $request->far35;
                $fact->far36 = $request->far36;
                $fact->far37 = $request->far37;
                $fact->is_active = 1;
                $fact->proyecto_id = $request->proyecto_id;
                $fact->empresa_id = $request->empresa_id;
                $fact->id_user = $user_id;
                $fact -> save();
                //SACAR EL ID
                $farmacia = Farmacia::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                $id = $farmacia->farmacia_id;
            }
            
            return response($id);
        }
    }


    //INFRAESTRUCTURA FARMACIA
    public function list_infraestructurafar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Infraestructura_Farmacia::where('empresa_id', $empresa_id)->orderBy('far1')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far1;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_infraestructurafar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_infraestructurafar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_infraestructurafar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_infra = $request->id_infraestructurafar;
            $far1 = $request->far1;
            $empresa_id = $request->empresaid_infraestructurafar;
            $proyecto_id = $request->proyectoid_infraestructurafar;
            $farmacia_id = $request->farmaciaid_infraestructurafar;

            if($id_infra==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Infraestructura_Farmacia::where('far1', '=', $far1)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Infraestructura_Farmacia();
                    $equi -> far1 = $request->far1;
                    $equi -> far2 = $request->far2;
                    $equi -> far3 = $request->far3;
                    $equi -> far4 = $request->far4;
                    $equi -> far5 = $request->far5;
                    $equi -> far6 = $request->far6;
                    $equi -> far7 = $request->far7;
                    $equi -> far8 = $request->far8;
                    $equi -> far9 = $request->far9;
                    $equi -> far10 = $request->far10;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Infraestructura_Farmacia::find($id_infra);
                $equi -> far1 = $request->far1;
                $equi -> far2 = $request->far2;
                $equi -> far3 = $request->far3;
                $equi -> far4 = $request->far4;
                $equi -> far5 = $request->far5;
                $equi -> far6 = $request->far6;
                $equi -> far7 = $request->far7;
                $equi -> far8 = $request->far8;
                $equi -> far9 = $request->far9;
                $equi -> far10 = $request->far10;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_infraestructurafar(Request $request)
    {
        if($request->ajax()){
            $id_infra = $request->id_infraestructura;
            $eq = Infraestructura_Farmacia::where('id', '=', $id_infra)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_infraestructurafar(Request $request)
    {
        if($request->ajax()){
            $id_infra = $request->id_infraestructura;
            $eq = Infraestructura_Farmacia::where('id', $id_infra)->delete();
            return response("eliminado");
        }
    }




    //MATERIALES FARMACIA
    public function list_materialesfar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Materiales_Farmacia::where('empresa_id', $empresa_id)->orderBy('far11')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far11;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_materialesfar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_materialesfar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_materialesfar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_materiales = $request->id_materialesfar;
            $far11 = $request->far11;
            $empresa_id = $request->empresaid_materialesfar;
            $proyecto_id = $request->proyectoid_materialesfar;
            $farmacia_id = $request->farmaciaid_materialesfar;

            if($id_materiales==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Materiales_Farmacia::where('far11', '=', $far11)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Materiales_Farmacia();
                    $equi -> far11 = $request->far11;
                    $equi -> far12 = $request->far12;
                    $equi -> far13 = $request->far13;
                    $equi -> far14 = $request->far14;
                    $equi -> far15 = $request->far15;
                    $equi -> far16 = $request->far16;
                    $equi -> far17 = $request->far17;
                    $equi -> far18 = $request->far18;
                    $equi -> far19 = $request->far19;
                    $equi -> far20 = $request->far20;
                    $equi -> far21 = $request->far21;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Materiales_Farmacia::find($id_materiales);
                $equi -> far11 = $request->far11;
                $equi -> far12 = $request->far12;
                $equi -> far13 = $request->far13;
                $equi -> far14 = $request->far14;
                $equi -> far15 = $request->far15;
                $equi -> far16 = $request->far16;
                $equi -> far17 = $request->far17;
                $equi -> far18 = $request->far18;
                $equi -> far19 = $request->far19;
                $equi -> far20 = $request->far20;
                $equi -> far21 = $request->far21;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_materialesfar(Request $request)
    {
        if($request->ajax()){
            $id_materiales = $request->id_materiales;
            $eq = Materiales_Farmacia::where('id', '=', $id_materiales)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_materialesfar(Request $request)
    {
        if($request->ajax()){
            $id_materiales = $request->id_materiales;
            $eq = Materiales_Farmacia::where('id', $id_materiales)->delete();
            return response("eliminado");
        }
    }




    //FARMACISTA FARMACIA
    public function list_farmacistafar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Farmacista_Farmacia::where('empresa_id', $empresa_id)->orderBy('far38')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->far38;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far39;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_farmacistafar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_farmacistafar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_farmacistafar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_farmacista = $request->id_farmacistafar;
            $far38 = $request->far38;
            $empresa_id = $request->empresaid_farmacistafar;
            $proyecto_id = $request->proyectoid_farmacistafar;
            $farmacia_id = $request->farmaciaid_farmacistafar;

            if($id_farmacista==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Farmacista_Farmacia::where('far38', '=', $far38)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Farmacista_Farmacia();
                    $equi -> far38 = $request->far38;
                    $equi -> far39 = $request->far39;
                    $equi -> far40 = $request->far40;
                    $equi -> far41 = $request->far41;
                    $equi -> far42 = $request->far42;
                    $equi -> far43 = $request->far43;
                    $equi -> far44 = $request->far44;
                    $equi -> far45 = $request->far45;
                    $equi -> far46 = $request->far46;
                    $equi -> far47 = $request->far47;
                    $equi -> far48 = $request->far48;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Farmacista_Farmacia::find($id_farmacista);
                $equi -> far38 = $request->far38;
                $equi -> far39 = $request->far39;
                $equi -> far40 = $request->far40;
                $equi -> far41 = $request->far41;
                $equi -> far42 = $request->far42;
                $equi -> far43 = $request->far43;
                $equi -> far44 = $request->far44;
                $equi -> far45 = $request->far45;
                $equi -> far46 = $request->far46;
                $equi -> far47 = $request->far47;
                $equi -> far48 = $request->far48;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_farmacistafar(Request $request)
    {
        if($request->ajax()){
            $id_farmacista = $request->id_farmacista;
            $eq = Farmacista_Farmacia::where('id', '=', $id_farmacista)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_farmacistafar(Request $request)
    {
        if($request->ajax()){
            $id_farmacista = $request->id_farmacista;
            $eq = Farmacista_Farmacia::where('id', $id_farmacista)->delete();
            return response("eliminado");
        }
    }




    //CONTROL FARMACIA
    public function list_controlfar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Control_Farmacia::where('empresa_id', $empresa_id)->orderBy('far49')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far49;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_controlfar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_controlfar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_controlfar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_control = $request->id_controlfar;
            $far49 = $request->far49;
            $empresa_id = $request->empresaid_controlfar;
            $proyecto_id = $request->proyectoid_controlfar;
            $farmacia_id = $request->farmaciaid_controlfar;

            if($id_control==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Control_Farmacia::where('far49', '=', $far49)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Control_Farmacia();
                    $equi -> far49 = $request->far49;
                    $equi -> far50 = $request->far50;
                    $equi -> far51 = $request->far51;
                    $equi -> far52 = $request->far52;
                    $equi -> far53 = $request->far53;
                    $equi -> far54 = $request->far54;
                    $equi -> far55 = $request->far55;
                    $equi -> far56 = $request->far56;
                    $equi -> far57 = $request->far57;
                    $equi -> far58 = $request->far58;
                    $equi -> far59 = $request->far59;
                    $equi -> far60 = $request->far60;
                    $equi -> far61 = $request->far61;
                    $equi -> far62 = $request->far62;
                    $equi -> far63 = $request->far63;
                    $equi -> far64 = $request->far64;
                    $equi -> far65 = $request->far65;
                    $equi -> far66 = $request->far66;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Control_Farmacia::find($id_control);
                $equi -> far49 = $request->far49;
                $equi -> far50 = $request->far50;
                $equi -> far51 = $request->far51;
                $equi -> far52 = $request->far52;
                $equi -> far53 = $request->far53;
                $equi -> far54 = $request->far54;
                $equi -> far55 = $request->far55;
                $equi -> far56 = $request->far56;
                $equi -> far57 = $request->far57;
                $equi -> far58 = $request->far58;
                $equi -> far59 = $request->far59;
                $equi -> far60 = $request->far60;
                $equi -> far61 = $request->far61;
                $equi -> far62 = $request->far62;
                $equi -> far63 = $request->far63;
                $equi -> far64 = $request->far64;
                $equi -> far65 = $request->far65;
                $equi -> far66 = $request->far66;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_controlfar(Request $request)
    {
        if($request->ajax()){
            $id_control = $request->id_control;
            $eq = Control_Farmacia::where('id', '=', $id_control)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_controlfar(Request $request)
    {
        if($request->ajax()){
            $id_control = $request->id_control;
            $eq = Control_Farmacia::where('id', $id_control)->delete();
            return response("eliminado");
        }
    }




    //TRAMITE FARMACIA
    public function list_tramitefar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Tramite_Farmacia::where('empresa_id', $empresa_id)->orderBy('far67')->get();
        
        return datatables()->of($eq)
        ->addColumn('tramite', function ($eq) {
            $html3 = $eq->far67;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far68;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_tramitefar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_tramitefar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['tramite', 'fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_tramitefar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_tramite = $request->id_tramitefar;
            $far67 = $request->far67;
            $empresa_id = $request->empresaid_tramitefar;
            $proyecto_id = $request->proyectoid_tramitefar;
            $farmacia_id = $request->farmaciaid_tramitefar;

            if($id_tramite==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Tramite_Farmacia::where('far67', '=', $far67)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Tramite_Farmacia();
                    $equi -> far67 = $request->far67;
                    $equi -> far68 = $request->far68;
                    $equi -> far69 = $request->far69;
                    $equi -> far70 = $request->far70;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Tramite_Farmacia::find($id_tramite);
                $equi -> far67 = $request->far67;
                $equi -> far68 = $request->far68;
                $equi -> far69 = $request->far69;
                $equi -> far70 = $request->far70;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_tramitefar(Request $request)
    {
        if($request->ajax()){
            $id_tramite = $request->id_tramite;
            $eq = Tramite_Farmacia::where('id', '=', $id_tramite)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_tramitefar(Request $request)
    {
        if($request->ajax()){
            $id_tramite = $request->id_tramite;
            $eq = Tramite_Farmacia::where('id', $id_tramite)->delete();
            return response("eliminado");
        }
    }




    //VISITA FARMACIA
    public function list_visitafar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Visita_Farmacia::where('empresa_id', $empresa_id)->orderBy('far71')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far71;
            return $html3;
        })
        ->addColumn('observaciones', function ($eq) {
            $html3 = $eq->far72;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_visitafar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_visitafar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'observaciones', 'edit', 'delete'])
        ->make(true);
    }



    public function create_visitafar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_visita = $request->id_visitafar;
            $far71 = $request->far71;
            $empresa_id = $request->empresaid_visitafar;
            $proyecto_id = $request->proyectoid_visitafar;
            $farmacia_id = $request->farmaciaid_visitafar;

            if($id_visita==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Visita_Farmacia::where('far71', '=', $far71)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Visita_Farmacia();
                    $equi -> far71 = $request->far71;
                    $equi -> far72 = $request->far72;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Visita_Farmacia::find($id_visita);
                $equi -> far71 = $request->far71;
                $equi -> far72 = $request->far72;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_visitafar(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $eq = Visita_Farmacia::where('id', '=', $id_visita)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_visitafar(Request $request)
    {
        if($request->ajax()){
            $id_visita = $request->id_visita;
            $eq = Visita_Farmacia::where('id', $id_visita)->delete();
            return response("eliminado");
        }
    }




    //QUEJA FARMACIA
    public function list_quejafar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Queja_Farmacia::where('empresa_id', $empresa_id)->orderBy('far73')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far73;
            return $html3;
        })
        ->addColumn('motivo', function ($eq) {
            $html3 = $eq->far74;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_quejafar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_quejafar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'motivo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_quejafar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_queja = $request->id_quejafar;
            $far73 = $request->far73;
            $empresa_id = $request->empresaid_quejafar;
            $proyecto_id = $request->proyectoid_quejafar;
            $farmacia_id = $request->farmaciaid_quejafar;

            if($id_queja==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Queja_Farmacia::where('far73', '=', $far73)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Queja_Farmacia();
                    $equi -> far73 = $request->far73;
                    $equi -> far74 = $request->far74;
                    $equi -> far75 = $request->far75;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Queja_Farmacia::find($id_queja);
                $equi -> far73 = $request->far73;
                $equi -> far74 = $request->far74;
                $equi -> far75 = $request->far75;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_quejafar(Request $request)
    {
        if($request->ajax()){
            $id_queja = $request->id_queja;
            $eq = Queja_Farmacia::where('id', '=', $id_queja)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_quejafar(Request $request)
    {
        if($request->ajax()){
            $id_queja = $request->id_queja;
            $eq = Queja_Farmacia::where('id', $id_queja)->delete();
            return response("eliminado");
        }
    }




    //SEGURIDAD FARMACIA
    public function list_seguridadfar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Seguridad_Farmacia::where('empresa_id', $empresa_id)->orderBy('far76')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far76;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_seguridadfar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_seguridadfar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_seguridadfar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_seguridad = $request->id_seguridadfar;
            $far76 = $request->far76;
            $empresa_id = $request->empresaid_seguridadfar;
            $proyecto_id = $request->proyectoid_seguridadfar;
            $farmacia_id = $request->farmaciaid_seguridadfar;

            if($id_seguridad==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Seguridad_Farmacia::where('far76', '=', $far76)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Seguridad_Farmacia();
                    $equi -> far76 = $request->far76;
                    $equi -> far77 = $request->far77;
                    $equi -> far78 = $request->far78;
                    $equi -> far79 = $request->far79;
                    $equi -> far80 = $request->far80;
                    $equi -> far81 = $request->far81;
                    $equi -> far82 = $request->far82;
                    $equi -> far83 = $request->far83;
                    $equi -> far84 = $request->far84;
                    $equi -> far85 = $request->far85;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Seguridad_Farmacia::find($id_seguridad);
                $equi -> far76 = $request->far76;
                $equi -> far77 = $request->far77;
                $equi -> far78 = $request->far78;
                $equi -> far79 = $request->far79;
                $equi -> far80 = $request->far80;
                $equi -> far81 = $request->far81;
                $equi -> far82 = $request->far82;
                $equi -> far83 = $request->far83;
                $equi -> far84 = $request->far84;
                $equi -> far85 = $request->far85;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_seguridadfar(Request $request)
    {
        if($request->ajax()){
            $id_seguridad = $request->id_seguridad;
            $eq = Seguridad_Farmacia::where('id', '=', $id_seguridad)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_seguridadfar(Request $request)
    {
        if($request->ajax()){
            $id_seguridad = $request->id_seguridad;
            $eq = Seguridad_Farmacia::where('id', $id_seguridad)->delete();
            return response("eliminado");
        }
    }




    //CADENA FARMACIA
    public function list_cadenafar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Cadena_Farmacia::where('empresa_id', $empresa_id)->orderBy('far86')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far86;
            return $html3;
        })
        ->addColumn('responsable', function ($eq) {
            $html3 = $eq->far88;
            $rec = Reclutamiento::where('id', $html3)->get()->first();
            $nombre=$rec->no62;
            return $nombre;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cadenafar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_cadenafar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'responsable', 'edit', 'delete'])
        ->make(true);
    }



    public function create_cadenafar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_cadena = $request->id_cadenafar;
            $far86 = $request->far86;
            $empresa_id = $request->empresaid_cadenafar;
            $proyecto_id = $request->proyectoid_cadenafar;
            $farmacia_id = $request->farmaciaid_cadenafar;

            if($id_cadena==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Cadena_Farmacia::where('far86', '=', $far86)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Cadena_Farmacia();
                    $equi -> far86 = $request->far86;
                    $equi -> far87 = $request->far87;
                    $equi -> far88 = $request->far88;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Cadena_Farmacia::find($id_cadena);
                $equi -> far86 = $request->far86;
                $equi -> far87 = $request->far87;
                $equi -> far88 = $request->far88;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_cadenafar(Request $request)
    {
        if($request->ajax()){
            $id_cadena = $request->id_cadena;
            $eq = Cadena_Farmacia::where('id', '=', $id_cadena)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_cadenafar(Request $request)
    {
        if($request->ajax()){
            $id_cadena = $request->id_cadena;
            $eq = Cadena_Farmacia::where('id', $id_cadena)->delete();
            return response("eliminado");
        }
    }




    //RECEPCION FARMACIA
    public function list_recepcionfar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Recepcion_Farmacia::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('far89')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far89;
            return $html3;
        })
        ->addColumn('tipo', function ($eq) {
            $html3 = $eq->far94;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_recepcionfar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_recepcionfar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'tipo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_recepcionfar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_recepcion = $request->id_recepcionfar;
            $far89 = $request->far89;
            $empresa_id = $request->empresaid_recepcionfar;
            $proyecto_id = $request->proyectoid_recepcionfar;
            $farmacia_id = $request->farmaciaid_recepcionfar;

            if($id_recepcion==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Recepcion_Farmacia::where('far89', '=', $far89)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Recepcion_Farmacia();
                    $equi -> far89 = $request->far89;
                    $equi -> far90 = $request->far90;
                    $equi -> far91 = $request->far91;
                    $equi -> far92 = $request->far92;
                    $equi -> far93 = $request->far93;
                    $equi -> far94 = $request->far94;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();

                    $id = $equi->id;
                    if($request->far94 == "Medicamento o producto de investigación"){
                        $pr = new Producto_Farmacia();
                        $pr -> far95 = $request->far89;
                        $pr -> far96 = $request->far96;
                        $pr -> far97 = $request->far97;
                        $pr -> far98 = $request->far98;
                        $pr -> far99 = $request->far99;
                        $pr -> far100 = $request->far100;
                        $pr -> far101 = $request->far101;
                        $pr -> far102 = $request->far102;
                        $pr -> far103 = $request->far103;
                        $pr -> far104 = $request->far104;
                        $pr -> far105 = $request->far105;
                        $pr -> far106 = $request->far106;
                        $pr -> far107 = $request->far107;
                        $pr -> far108 = $request->far108;
                        $pr -> far109 = $request->far109;
                        $pr -> far110 = $request->far110;
                        $pr -> far111 = $request->far111;
                        $pr -> recepcion_id = $id;
                        $pr -> farmacia_id = $farmacia_id;
                        $pr -> proyecto_id = $proyecto_id;
                        $pr -> empresa_id = $empresa_id;
                        $pr -> save();
                    }else if($request->far94 == "Materiales"){
                        $mat = new Material_Farmacia();
                        $mat -> far112 = $request->far89;
                        $mat -> far113 = $request->far113;
                        $mat -> far114 = $request->far114;
                        $mat -> recepcion_id = $id;
                        $mat -> farmacia_id = $farmacia_id;
                        $mat -> proyecto_id = $proyecto_id;
                        $mat -> empresa_id = $empresa_id;
                        $mat -> id_user = $user_id;
                        $mat -> save();
                    }else if($request->far94 == "Equipos"){
                        $eq = new Equipo_Farmacia();
                        $eq -> far115 = $request->far89;
                        $eq -> far116 = $request->far116;
                        $eq -> far117 = $request->far117;
                        $eq -> far118 = $request->far118;
                        $eq -> far119 = $request->far119;
                        $eq -> far120 = $request->far120;
                        $eq -> recepcion_id = $id;
                        $eq -> farmacia_id = $farmacia_id;
                        $eq -> proyecto_id = $proyecto_id;
                        $eq -> empresa_id = $empresa_id;
                        $eq -> id_user = $user_id;
                        $eq -> save();
                    }

                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Recepcion_Farmacia::find($id_recepcion);
                $equi -> far89 = $request->far89;
                $equi -> far90 = $request->far90;
                $equi -> far91 = $request->far91;
                $equi -> far92 = $request->far92;
                $equi -> far93 = $request->far93;
                $equi -> far94 = $request->far94;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_recepcionfar(Request $request)
    {
        if($request->ajax()){
            $id_recepcion = $request->id_recepcion;
            $eq = Recepcion_Farmacia::where('id', '=', $id_recepcion)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_recepcionfar(Request $request)
    {
        if($request->ajax()){
            $id_recepcion = $request->id_recepcion;
            $eq = Recepcion_Farmacia::where('id', $id_recepcion)->delete();
            
            $pr = Producto_Farmacia::where('recepcion_id', $id_recepcion)->delete();
            $mat = Material_Farmacia::where('recepcion_id', $id_recepcion)->delete();
            $equ = Equipo_Farmacia::where('recepcion_id', $id_recepcion)->delete();
            return response("eliminado");
        }
    }




    //PRODUCTO FARMACIA
    public function list_productofar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Producto_Farmacia::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('far95')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far95;
            return $html3;
        })
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->far96;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_productofar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_productofar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'nombre', 'edit', 'delete'])
        ->make(true);
    }



    public function create_productofar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_producto = $request->id_productofar;
            $far95 = $request->far95;
            $empresa_id = $request->empresaid_productofar;
            $proyecto_id = $request->proyectoid_productofar;
            $farmacia_id = $request->farmaciaid_productofar;

            if($id_producto==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Producto_Farmacia::where('far95', '=', $far95)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Producto_Farmacia();
                    $equi -> far95 = $request->far95;
                    $equi -> far96 = $request->far96;
                    $equi -> far97 = $request->far97;
                    $equi -> far98 = $request->far98;
                    $equi -> far99 = $request->far99;
                    $equi -> far100 = $request->far100;
                    $equi -> far101 = $request->far101;
                    $equi -> far102 = $request->far102;
                    $equi -> far103 = $request->far103;
                    $equi -> far104 = $request->far104;
                    $equi -> far105 = $request->far105;
                    $equi -> far106 = $request->far106;
                    $equi -> far107 = $request->far107;
                    $equi -> far108 = $request->far108;
                    $equi -> far109 = $request->far109;
                    $equi -> far110 = $request->far110;
                    $equi -> far111 = $request->far111;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Producto_Farmacia::find($id_producto);
                $equi -> far95 = $request->far95;
                $equi -> far96 = $request->far96;
                $equi -> far97 = $request->far97;
                $equi -> far98 = $request->far98;
                $equi -> far99 = $request->far99;
                $equi -> far100 = $request->far100;
                $equi -> far101 = $request->far101;
                $equi -> far102 = $request->far102;
                $equi -> far103 = $request->far103;
                $equi -> far104 = $request->far104;
                $equi -> far105 = $request->far105;
                $equi -> far106 = $request->far106;
                $equi -> far107 = $request->far107;
                $equi -> far108 = $request->far108;
                $equi -> far109 = $request->far109;
                $equi -> far110 = $request->far110;
                $equi -> far111 = $request->far111;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_productofar(Request $request)
    {
        if($request->ajax()){
            $id_producto = $request->id_producto;
            $eq = Producto_Farmacia::where('id', '=', $id_producto)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_productofar(Request $request)
    {
        if($request->ajax()){
            $id_producto = $request->id_producto;
            $eq = Producto_Farmacia::where('id', $id_producto)->delete();
            return response("eliminado");
        }
    }




    //MATERIAL FARMACIA
    public function list_materialfar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Material_Farmacia::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('far112')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far112;
            return $html3;
        })
        ->addColumn('gabinete', function ($eq) {
            $html3 = $eq->far113;
            return $html3;
        })
        ->addColumn('anaquel', function ($eq) {
            $html3 = $eq->far114;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_materialfar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_materialfar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'gabinete', 'anaquel', 'edit', 'delete'])
        ->make(true);
    }



    public function create_materialfar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_material = $request->id_materialfar;
            $far112 = $request->far112;
            $empresa_id = $request->empresaid_materialfar;
            $proyecto_id = $request->proyectoid_materialfar;
            $farmacia_id = $request->farmaciaid_materialfar;

            if($id_material==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Material_Farmacia::where('far112', '=', $far112)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Material_Farmacia();
                    $equi -> far112 = $request->far112;
                    $equi -> far113 = $request->far113;
                    $equi -> far114 = $request->far114;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Material_Farmacia::find($id_material);
                $equi -> far112 = $request->far112;
                $equi -> far113 = $request->far113;
                $equi -> far114 = $request->far114;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_materialfar(Request $request)
    {
        if($request->ajax()){
            $id_material = $request->id_material;
            $eq = Material_Farmacia::where('id', '=', $id_material)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_materialfar(Request $request)
    {
        if($request->ajax()){
            $id_material = $request->id_material;
            $eq = Material_Farmacia::where('id', $id_material)->delete();
            return response("eliminado");
        }
    }




    //EQUIPO FARMACIA
    public function list_equipofar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Equipo_Farmacia::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('far115')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->far115;
            return $html3;
        })
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->far116;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equipofar('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_equipofar('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'nombre', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equipofar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_equipo = $request->id_equipofar;
            $far115 = $request->far115;
            $empresa_id = $request->empresaid_equipofar;
            $proyecto_id = $request->proyectoid_equipofar;
            $farmacia_id = $request->farmaciaid_equipofar;

            if($id_equipo==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Equipo_Farmacia::where('far115', '=', $far115)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Equipo_Farmacia();
                    $equi -> far115 = $request->far115;
                    $equi -> far116 = $request->far116;
                    $equi -> far117 = $request->far117;
                    $equi -> far118 = $request->far118;
                    $equi -> far119 = $request->far119;
                    $equi -> far120 = $request->far120;
                    $equi -> farmacia_id = $farmacia_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Equipo_Farmacia::find($id_equipo);
                $equi -> far115 = $request->far115;
                $equi -> far116 = $request->far116;
                $equi -> far117 = $request->far117;
                $equi -> far118 = $request->far118;
                $equi -> far119 = $request->far119;
                $equi -> far120 = $request->far120;
                $equi -> farmacia_id = $farmacia_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equipofar(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $eq = Equipo_Farmacia::where('id', '=', $id_equipo)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_equipofar(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $eq = Equipo_Farmacia::where('id', $id_equipo)->delete();
            return response("eliminado");
        }
    }





    //RECLUTAMIENTO
    public function meta1_reclutamiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_empresa = $request->empresa_id;
            $id_proyecto = $request->proyecto_id;

            $meta = Factibilidad::where('proyecto_id', '=', $id_proyecto)->get()->first();
            if($meta == null){
                $num=0;
            }else{
                $num = $meta->f46;
            }
            
            return response($num);
        }
    }

    public function cargarvisita_reclutamiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_empresa = $request->empresa_id;
            $id_proyecto = $request->proyecto_id;
            $id_visita = $request->id_visita;

            $actividad = Prep_Visita::where('proyecto_id', '=', $id_proyecto)
            ->where('id', '=', $id_visita)->get()->first();
            if($actividad != null){
            $act1 = $actividad->no25;
            $act2 = $actividad->actividad1;
            $act3 = $actividad->actividad2;
            $act4 = $actividad->actividad3;
            $act5 = $actividad->actividad4;
            $act6 = $actividad->actividad5;
            $act7 = $actividad->actividad6;
            $act8 = $actividad->actividad7;
            $act9 = $actividad->actividad8;
            $act10 = $actividad->actividad9;
            $act11 = $actividad->actividad10;
            $act12 = $actividad->actividad11;
            $act13 = $actividad->actividad12;
            $act14 = $actividad->actividad13;
            $act15 = $actividad->actividad14;
            $act16 = $actividad->actividad15;
            $act17 = $actividad->actividad16;
            $act18 = $actividad->actividad17;
            $act19 = $actividad->actividad18;
            $act20 = $actividad->actividad19;
            $act21 = $actividad->actividad20;
            $act22 = $actividad->actividad21;
            $act23 = $actividad->actividad22;
            $act24 = $actividad->actividad23;
            $act25 = $actividad->actividad24;
            $act26 = $actividad->actividad25;
            $act27 = $actividad->actividad26;
            $act28 = $actividad->actividad27;
            $act29 = $actividad->actividad28;
            $act30 = $actividad->actividad29;
            $act31 = $actividad->actividad30;

            $act = $act1."\n".$act2."\n".$act3."\n".$act4."\n".$act5."\n".$act6."\n".$act7."\n".$act8."\n".$act9."\n".$act10."\n".$act11."\n".$act12."\n".$act13."\n".$act14."\n".$act15."\n".$act16."\n".$act17."\n".$act18."\n".$act19."\n".$act20."\n".$act21."\n".$act22."\n".$act23."\n".$act24."\n".$act25."\n".$act26."\n".$act27."\n".$act28."\n".$act29."\n".$act30."\n".$act31;
            }else{
                $act = "";
            }
            return response($act);
        }
    }

    public function cargarsujeto_reclutamiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_empresa = $request->empresa_id;
            $id_proyecto = $request->proyecto_id;

            $sujetos = Contacto_Reclutamiento::where('empresa_id', '=', $id_empresa)
            ->where('proyecto_id', '=', $id_proyecto)->get()->toJson();

            return json_encode($sujetos);
        }
    }

    public function cargarestado_reclutamiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_empresa = $request->empresa_id;
            $id_proyecto = $request->proyecto_id;
            $id_sujeto = $request->id_sujeto;

            $estado = Contacto_Reclutamiento::where('proyecto_id', '=', $id_proyecto)
            ->where('id', '=', $id_sujeto)->get()->first();
            $est = $estado->r105;
            return response($est);
        }
    }

    public function create_reclutamiento(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            'r1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->reclutamiento_id;
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;

        $sujetosbd = Contacto_Reclutamiento::where('r105', '=', 'En base de datos')
        ->where('empresa_id', '=', $empresa_id)
        ->where('proyecto_id', '=', $proyecto_id)->get()->count();

        $sujetospre = Contacto_Reclutamiento::where('r105', '=', 'En pre-selección')
        ->where('empresa_id', '=', $empresa_id)
        ->where('proyecto_id', '=', $proyecto_id)->count();

        $sujetosicf = Contacto_Reclutamiento::where('r105', '=', 'Activo')
        ->where('empresa_id', '=', $empresa_id)
        ->where('proyecto_id', '=', $proyecto_id)->count();

        $sujetosfalla = Contacto_Reclutamiento::where('r105', '=', 'Falla de selección')
        ->where('empresa_id', '=', $empresa_id)
        ->where('proyecto_id', '=', $proyecto_id)->count();

        if($id==""){
            $fact = new ReclutamientoSC();
        }else{
            $fact = ReclutamientoSC::find($id);
        }

		//GUARDAR REGISTROS
        $fact->r1 = $request->r1;
        $fact->r2 = $request->r2;
        $fact->r3 = $request->r3;
        $fact->r4 = $request->r4;
        $fact->r5 = $request->r5;
        $fact->r6 = $request->r6;
        $fact->r7 = $request->r7;
        $fact->r8 = $request->r8;
        $fact->r9 = $request->r9;
        $fact->r10 = $request->r10;
        $fact->r11 = $request->r11;
        $fact->r12 = $request->r12;
        $fact->r13 = $request->r13;
        $fact->r24 = $request->r24;
        $fact->r25 = $request->r25;
        $fact->r26 = $request->r26;
        $fact->r166 = $sujetosbd;
        $fact->r167 = $sujetospre;
        $fact->r168 = $sujetosicf;
        $fact->r169 = $sujetosfalla;
        $fact->r170 = $request->r170;
        $fact->is_active = 1;
        $fact->proyecto_id = $request->proyecto_id;
        $fact->empresa_id = $request->empresa_id;
        $fact->id_user = $id_user;
        $fact -> save();

        //SACAR EL ID
        if($id==""){
            $reclutamiento = ReclutamientoSC::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $reclutamiento->reclutamiento_id;
        }
        return response($id);
    }



    public function guardar_reclutamiento(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->reclutamiento_id;
            $empresa_id = $request->empresa_id;
            $proyecto_id = $request->proyecto_id;

            $sujetosbd = Contacto_Reclutamiento::where('r105', '=', 'En base de datos')
            ->where('empresa_id', '=', $empresa_id)
            ->where('proyecto_id', '=', $proyecto_id)->count();

            $sujetospre = Contacto_Reclutamiento::where('r105', '=', 'En pre-selección')
            ->where('empresa_id', '=', $empresa_id)
            ->where('proyecto_id', '=', $proyecto_id)->count();

            $sujetosicf = Contacto_Reclutamiento::where('r105', '=', 'Activo')
            ->where('empresa_id', '=', $empresa_id)
            ->where('proyecto_id', '=', $proyecto_id)->count();

            $sujetosfalla = Contacto_Reclutamiento::where('r105', '=', 'Falla de selección')
            ->where('empresa_id', '=', $empresa_id)
            ->where('proyecto_id', '=', $proyecto_id)->count();
            
            //GUARDAR
            if($id==""){
                $fact = new ReclutamientoSC();
                $fact->r1 = $request->r1;
                $fact->r2 = $request->r2;
                $fact->r3 = $request->r3;
                $fact->r4 = $request->r4;
                $fact->r5 = $request->r5;
                $fact->r6 = $request->r6;
                $fact->r7 = $request->r7;
                $fact->r8 = $request->r8;
                $fact->r9 = $request->r9;
                $fact->r10 = $request->r10;
                $fact->r11 = $request->r11;
                $fact->r12 = $request->r12;
                $fact->r13 = $request->r13;
                $fact->r24 = $request->r24;
                $fact->r25 = $request->r25;
                $fact->r26 = $request->r26;
                $fact->r166 = $sujetosbd;
                $fact->r167 = $sujetospre;
                $fact->r168 = $sujetosicf;
                $fact->r169 = $sujetosfalla;
                $fact->r170 = $request->r170;
                $fact->is_active = 1;
                $fact->proyecto_id = $request->proyecto_id;
                $fact->empresa_id = $request->empresa_id;
                $fact->id_user = $user_id;
                $fact -> save();
                //SACAR EL ID
                $reclutamiento = ReclutamientoSC::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                $id = $reclutamiento->reclutamiento_id;
            }
            
            return response($id);
        }
    }



    public function list_cronogramarec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Cronograma_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r14')->get();
        
        return datatables()->of($eq)
        ->addColumn('visita', function ($eq) {
            $html3 = $eq->r14;
            $vis = Prep_Visita::where('id', '=', $html3)->get()->first();
            return $vis->no22;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->r15;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cronogramarec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_cronogramarec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['visita', 'fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_cronogramarec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_cronogramarec;
            $r14 = $request->r14;
            $empresa_id = $request->empresaid_cronogramarec;
            $proyecto_id = $request->proyectoid_cronogramarec;
            $reclutamiento_id = $request->reclutamientoid_cronogramarec;

            if($id_eq==""){
                $eq = Cronograma_Reclutamiento::where('r14', '=', $r14)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Cronograma_Reclutamiento();
                    $equi -> r14 = $request->r14;
                    $equi -> r15 = $request->r15;
                    $equi -> r16 = $request->r16;
                    $equi -> r17 = $request->r17;
                    $equi -> r18 = $request->r18;
                    $equi -> r19 = $request->r19;
                    $equi -> r20 = $request->r20;
                    $equi -> r21 = $request->r21;
                    $equi -> r22 = $request->r22;
                    $equi -> r23 = $request->r23;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Cronograma_Reclutamiento::find($id_eq);
                $equi -> r14 = $request->r14;
                $equi -> r15 = $request->r15;
                $equi -> r16 = $request->r16;
                $equi -> r17 = $request->r17;
                $equi -> r18 = $request->r18;
                $equi -> r19 = $request->r19;
                $equi -> r20 = $request->r20;
                $equi -> r21 = $request->r21;
                $equi -> r22 = $request->r22;
                $equi -> r23 = $request->r23;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_cronogramarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_cronograma;
            $eq = Cronograma_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_cronogramarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_cronograma;
            $eq = Cronograma_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_estrategiarec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Estrategia_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r27')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r27;
            return $html3;
        })
        ->addColumn('costo', function ($eq) {
            $html4 = $eq->r29;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_estrategiarec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_estrategiarec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'costo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_estrategiarec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_estrategiarec;
            $r27 = $request->r27;
            $empresa_id = $request->empresaid_estrategiarec;
            $proyecto_id = $request->proyectoid_estrategiarec;
            $reclutamiento_id = $request->reclutamientoid_estrategiarec;

            if($id_eq==""){
                $eq = Estrategia_Reclutamiento::where('r27', '=', $r27)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Estrategia_Reclutamiento();
                    $equi -> r27 = $request->r27;
                    $equi -> r28 = $request->r28;
                    $equi -> r29 = $request->r29;
                    $equi -> r30 = $request->r30;
                    $equi -> r31 = $request->r31;
                    $equi -> r32 = $request->r32;
                    $equi -> r33 = $request->r33;
                    $equi -> r34 = $request->r34;
                    $equi -> r35 = $request->r35;
                    $equi -> r36 = $request->r36;
                    $equi -> r37 = $request->r37;
                    $equi -> r38 = $request->r38;
                    $equi -> r39 = $request->r39;
                    $equi -> r40 = $request->r40;
                    $equi -> r41 = $request->r41;
                    $equi -> r42 = $request->r42;
                    $equi -> r43 = $request->r43;
                    $equi -> r44 = $request->r44;
                    $equi -> r45 = $request->r45;
                    $equi -> r46 = $request->r46;
                    $equi -> r47 = $request->r47;
                    $equi -> r48 = $request->r48;
                    $equi -> r49 = $request->r49;
                    $equi -> r50 = $request->r50;
                    $equi -> r51 = $request->r51;
                    $equi -> r52 = $request->r52;
                    $equi -> r53 = $request->r53;
                    $equi -> r54 = $request->r54;
                    $equi -> r55 = $request->r55;
                    $equi -> r56 = $request->r56;
                    $equi -> r57 = $request->r57;
                    $equi -> r58 = $request->r58;
                    $equi -> r59 = $request->r59;
                    $equi -> r60 = $request->r60;
                    $equi -> r61 = $request->r61;
                    $equi -> r62 = $request->r62;
                    $equi -> r63 = $request->r63;
                    $equi -> r64 = $request->r64;
                    $equi -> r65 = $request->r65;
                    $equi -> r66 = $request->r66;
                    $equi -> r67 = $request->r67;
                    $equi -> r68 = $request->r68;
                    $equi -> r69 = $request->r69;
                    $equi -> r70 = $request->r70;
                    $equi -> r71 = $request->r71;
                    $equi -> r72 = $request->r72;
                    $equi -> r73 = $request->r73;
                    $equi -> r74 = $request->r74;
                    $equi -> r75 = $request->r75;
                    $equi -> r76 = $request->r76;
                    $equi -> r77 = $request->r77;
                    $equi -> r78 = $request->r78;
                    $equi -> r79 = $request->r79;
                    $equi -> r80 = $request->r80;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Estrategia_Reclutamiento::find($id_eq);
                $equi -> r27 = $request->r27;
                $equi -> r28 = $request->r28;
                $equi -> r29 = $request->r29;
                $equi -> r30 = $request->r30;
                $equi -> r31 = $request->r31;
                $equi -> r32 = $request->r32;
                $equi -> r33 = $request->r33;
                $equi -> r34 = $request->r34;
                $equi -> r35 = $request->r35;
                $equi -> r36 = $request->r36;
                $equi -> r37 = $request->r37;
                $equi -> r38 = $request->r38;
                $equi -> r39 = $request->r39;
                $equi -> r40 = $request->r40;
                $equi -> r41 = $request->r41;
                $equi -> r42 = $request->r42;
                $equi -> r43 = $request->r43;
                $equi -> r44 = $request->r44;
                $equi -> r45 = $request->r45;
                $equi -> r46 = $request->r46;
                $equi -> r47 = $request->r47;
                $equi -> r48 = $request->r48;
                $equi -> r49 = $request->r49;
                $equi -> r50 = $request->r50;
                $equi -> r51 = $request->r51;
                $equi -> r52 = $request->r52;
                $equi -> r53 = $request->r53;
                $equi -> r54 = $request->r54;
                $equi -> r55 = $request->r55;
                $equi -> r56 = $request->r56;
                $equi -> r57 = $request->r57;
                $equi -> r58 = $request->r58;
                $equi -> r59 = $request->r59;
                $equi -> r60 = $request->r60;
                $equi -> r61 = $request->r61;
                $equi -> r62 = $request->r62;
                $equi -> r63 = $request->r63;
                $equi -> r64 = $request->r64;
                $equi -> r65 = $request->r65;
                $equi -> r66 = $request->r66;
                $equi -> r67 = $request->r67;
                $equi -> r68 = $request->r68;
                $equi -> r69 = $request->r69;
                $equi -> r70 = $request->r70;
                $equi -> r71 = $request->r71;
                $equi -> r72 = $request->r72;
                $equi -> r73 = $request->r73;
                $equi -> r74 = $request->r74;
                $equi -> r75 = $request->r75;
                $equi -> r76 = $request->r76;
                $equi -> r77 = $request->r77;
                $equi -> r78 = $request->r78;
                $equi -> r79 = $request->r79;
                $equi -> r80 = $request->r80;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_estrategiarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_estrategia;
            $eq = Estrategia_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_estrategiarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_estrategia;
            $eq = Estrategia_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_contactorec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Contacto_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r81')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r81;
            return $html3;
        })
        ->addColumn('estado', function ($eq) {
            $html4 = $eq->r105;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_contactorec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_contactorec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'estado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_contactorec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_contactorec;
            $r81 = $request->r81;
            $empresa_id = $request->empresaid_contactorec;
            $proyecto_id = $request->proyectoid_contactorec;
            $reclutamiento_id = $request->reclutamientoid_contactorec;

            if($id_eq==""){
                $eq = Contacto_Reclutamiento::where('r81', '=', $r81)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Contacto_Reclutamiento();
                    $equi -> r81 = $request->r81;
                    $equi -> r82 = $request->r82;
                    $equi -> r83 = $request->r83;
                    $equi -> r84 = $request->r84;
                    $equi -> r85 = $request->r85;
                    $equi -> r86 = $request->r86;
                    $equi -> r87 = $request->r87;
                    $equi -> r88 = $request->r88;
                    $equi -> r89 = $request->r89;
                    $equi -> r90 = $request->r90;
                    $equi -> r91 = $request->r91;
                    $equi -> r92 = $request->r92;
                    $equi -> r93 = $request->r93;
                    $equi -> r94 = $request->r94;
                    $equi -> r95 = $request->r95;
                    $equi -> r96 = $request->r96;
                    $equi -> r97 = $request->r97;
                    $equi -> r98 = $request->r98;
                    $equi -> r99 = $request->r99;
                    $equi -> r100 = $request->r100;
                    $equi -> r101 = $request->r101;
                    $equi -> r102 = $request->r102;
                    $equi -> r103 = $request->r103;
                    $equi -> r104 = $request->r104;
                    $equi -> r105 = $request->r105;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Contacto_Reclutamiento::find($id_eq);
                $equi -> r81 = $request->r81;
                $equi -> r82 = $request->r82;
                $equi -> r83 = $request->r83;
                $equi -> r84 = $request->r84;
                $equi -> r85 = $request->r85;
                $equi -> r86 = $request->r86;
                $equi -> r87 = $request->r87;
                $equi -> r88 = $request->r88;
                $equi -> r89 = $request->r89;
                $equi -> r90 = $request->r90;
                $equi -> r91 = $request->r91;
                $equi -> r92 = $request->r92;
                $equi -> r93 = $request->r93;
                $equi -> r94 = $request->r94;
                $equi -> r95 = $request->r95;
                $equi -> r96 = $request->r96;
                $equi -> r97 = $request->r97;
                $equi -> r98 = $request->r98;
                $equi -> r99 = $request->r99;
                $equi -> r100 = $request->r100;
                $equi -> r101 = $request->r101;
                $equi -> r102 = $request->r102;
                $equi -> r103 = $request->r103;
                $equi -> r104 = $request->r104;
                $equi -> r105 = $request->r105;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_contactorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_contacto;
            $eq = Contacto_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_contactorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_contacto;
            $eq = Contacto_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_criteriorec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Criterio_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r106')->get();
        
        return datatables()->of($eq)
        ->addColumn('criterio', function ($eq) {
            $html3 = $eq->r106;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_criteriorec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_criteriorec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['criterio', 'edit', 'delete'])
        ->make(true);
    }



    public function create_criteriorec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_criteriorec;
            $r106 = $request->r106;
            $empresa_id = $request->empresaid_criteriorec;
            $proyecto_id = $request->proyectoid_criteriorec;
            $reclutamiento_id = $request->reclutamientoid_criteriorec;

            if($id_eq==""){
                $eq = Criterio_Reclutamiento::where('r106', '=', $r106)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Criterio_Reclutamiento();
                    $equi -> r106 = $request->r106;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Criterio_Reclutamiento::find($id_eq);
                $equi -> r106 = $request->r106;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_criteriorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_criterio;
            $eq = Criterio_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_criteriorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_criterio;
            $eq = Criterio_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_preseleccionrec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Preseleccion_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r107')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r107;
            $suj = Contacto_Reclutamiento::where('id', '=', $html3)->get()->first();
            return $suj->r81;
        })
        ->addColumn('estado', function ($eq) {
            $html3 = $eq->r110;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_preseleccionrec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_preseleccionrec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'estado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_preseleccionrec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_preseleccionrec;
            $r107 = $request->r107;
            $empresa_id = $request->empresaid_preseleccionrec;
            $proyecto_id = $request->proyectoid_preseleccionrec;
            $reclutamiento_id = $request->reclutamientoid_preseleccionrec;

            if($id_eq==""){
                $eq = Preseleccion_Reclutamiento::where('r107', '=', $r107)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Preseleccion_Reclutamiento();
                    $equi -> r107 = $request->r107;
                    $equi -> r108 = $request->r108;
                    $equi -> r109 = $request->r109;
                    $equi -> r111 = $request->r111;
                    $equi -> r112 = $request->r112;
                    $equi -> r113 = $request->r113;
                    $equi -> r114 = $request->r114;
                    $equi -> r115 = $request->r115;
                    $equi -> r116 = $request->r116;
                    $equi -> r117 = $request->r117;
                    $equi -> r118 = $request->r118;
                    $equi -> r119 = $request->r119;
                    $equi -> r120 = $request->r120;
                    $equi -> r121 = $request->r121;
                    $equi -> r122 = $request->r122;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();

                    $suj = Contacto_Reclutamiento::find($r107);
                    $suj -> r105 = $request->r110;
                    $suj -> save();

                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Preseleccion_Reclutamiento::find($id_eq);
                $equi -> r107 = $request->r107;
                $equi -> r108 = $request->r108;
                $equi -> r109 = $request->r109;
                $equi -> r111 = $request->r111;
                $equi -> r112 = $request->r112;
                $equi -> r113 = $request->r113;
                $equi -> r114 = $request->r114;
                $equi -> r115 = $request->r115;
                $equi -> r116 = $request->r116;
                $equi -> r117 = $request->r117;
                $equi -> r118 = $request->r118;
                $equi -> r119 = $request->r119;
                $equi -> r120 = $request->r120;
                $equi -> r121 = $request->r121;
                $equi -> r122 = $request->r122;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();

                $suj = Contacto_Reclutamiento::find($r107);
                $suj -> r105 = $request->r110;
                $suj -> save();

                return response("guardado");
            }
        }
    }



    public function edit_preseleccionrec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_preseleccion;
            $eq = Preseleccion_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_preseleccionrec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_preseleccion;
            $eq = Preseleccion_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_fuentesujetorec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = FuenteSujeto_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r123')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r123;
            $suj = Contacto_Reclutamiento::where('id', '=', $html3)->get()->first();
            return $suj->r81;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_fuentesujetorec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_fuentesujetorec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'edit', 'delete'])
        ->make(true);
    }



    public function create_fuentesujetorec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_fuentesujetorec;
            $r123 = $request->r123;
            $empresa_id = $request->empresaid_fuentesujetorec;
            $proyecto_id = $request->proyectoid_fuentesujetorec;
            $reclutamiento_id = $request->reclutamientoid_fuentesujetorec;

            if($id_eq==""){
                $eq = FuenteSujeto_Reclutamiento::where('r123', '=', $r123)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new FuenteSujeto_Reclutamiento();
                    $equi -> r123 = $request->r123;
                    $equi -> r124 = $request->r124;
                    $equi -> r125 = $request->r125;
                    $equi -> r126 = $request->r126;
                    $equi -> r127 = $request->r127;
                    $equi -> r128 = $request->r128;
                    $equi -> r129 = $request->r129;
                    $equi -> r130 = $request->r130;
                    $equi -> r131 = $request->r131;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = FuenteSujeto_Reclutamiento::find($id_eq);
                $equi -> r123 = $request->r123;
                $equi -> r124 = $request->r124;
                $equi -> r125 = $request->r125;
                $equi -> r126 = $request->r126;
                $equi -> r127 = $request->r127;
                $equi -> r128 = $request->r128;
                $equi -> r129 = $request->r129;
                $equi -> r130 = $request->r130;
                $equi -> r131 = $request->r131;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_fuentesujetorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuentesujeto;
            $eq = FuenteSujeto_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_fuentesujetorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuentesujeto;
            $eq = FuenteSujeto_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_fuenteestudiorec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = FuenteEstudio_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r132')->get();
        
        return datatables()->of($eq)
        ->addColumn('visita', function ($eq) {
            $html3 = $eq->r132;
            $vis = Prep_Visita::where('id', '=', $html3)->get()->first();
            return $vis->no22;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_fuenteestudiorec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_fuenteestudiorec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['visita', 'edit', 'delete'])
        ->make(true);
    }



    public function create_fuenteestudiorec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_fuenteestudiorec;
            $r132 = $request->r132;
            $empresa_id = $request->empresaid_fuenteestudiorec;
            $proyecto_id = $request->proyectoid_fuenteestudiorec;
            $reclutamiento_id = $request->reclutamientoid_fuenteestudiorec;

            if($id_eq==""){
                $eq = FuenteEstudio_Reclutamiento::where('r132', '=', $r132)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new FuenteEstudio_Reclutamiento();
                    $equi -> r132 = $request->r132;
                    $equi -> r133 = $request->r133;
                    $equi -> r134 = $request->r134;
                    $equi -> r135 = $request->r135;
                    $equi -> r136 = $request->r136;
                    $equi -> r137 = $request->r137;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = FuenteEstudio_Reclutamiento::find($id_eq);
                $equi -> r132 = $request->r132;
                $equi -> r133 = $request->r133;
                $equi -> r134 = $request->r134;
                $equi -> r135 = $request->r135;
                $equi -> r136 = $request->r136;
                $equi -> r137 = $request->r137;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_fuenteestudiorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuenteestudio;
            $eq = FuenteEstudio_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_fuenteestudiorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuenteestudio;
            $eq = FuenteEstudio_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_fuentevisitarec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = FuenteVisita_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r138')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r138;
            $suj = Contacto_Reclutamiento::where('id', '=', $html3)->get()->first();
            return $suj->r81;
        })
        ->addColumn('visita', function ($eq) {
            $html3 = $eq->r139;
            $vis = Prep_Visita::where('id', '=', $html3)->get()->first();
            return $vis->no22;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_fuentevisitarec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_fuentevisitarec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'visita', 'edit', 'delete'])
        ->make(true);
    }



    public function create_fuentevisitarec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_fuentevisitarec;
            $r138 = $request->r138;
            $r139 = $request->r139;
            $empresa_id = $request->empresaid_fuentevisitarec;
            $proyecto_id = $request->proyectoid_fuentevisitarec;
            $reclutamiento_id = $request->reclutamientoid_fuentevisitarec;

            if($id_eq==""){
                $eq = FuenteVisita_Reclutamiento::where('r138', '=', $r138)
                ->where('r139', '=', $r139)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new FuenteVisita_Reclutamiento();
                    $equi -> r138 = $request->r138;
                    $equi -> r139 = $request->r139;
                    $equi -> r140 = $request->r140;
                    $equi -> r141 = $request->r141;
                    $equi -> r142 = $request->r142;
                    $equi -> r143 = $request->r143;
                    $equi -> r144 = $request->r144;
                    $equi -> r145 = $request->r145;
                    $equi -> r146 = $request->r146;
                    $equi -> r147 = $request->r147;
                    $equi -> r148 = $request->r148;
                    $equi -> r149 = $request->r149;
                    $equi -> r150 = $request->r150;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = FuenteVisita_Reclutamiento::find($id_eq);
                $equi -> r138 = $request->r138;
                $equi -> r139 = $request->r139;
                $equi -> r140 = $request->r140;
                $equi -> r141 = $request->r141;
                $equi -> r142 = $request->r142;
                $equi -> r143 = $request->r143;
                $equi -> r144 = $request->r144;
                $equi -> r145 = $request->r145;
                $equi -> r146 = $request->r146;
                $equi -> r147 = $request->r147;
                $equi -> r148 = $request->r148;
                $equi -> r149 = $request->r149;
                $equi -> r150 = $request->r150;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_fuentevisitarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuentevisita;
            $eq = FuenteVisita_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_fuentevisitarec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fuentevisita;
            $eq = FuenteVisita_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_reclutamientorec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Rec_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r151')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r151;
            $suj = Contacto_Reclutamiento::where('id', '=', $html3)->get()->first();
            return $suj->r81;
        })
        ->addColumn('firma', function ($eq) {
            $html3 = $eq->r157;
            return $html3;
        })
        ->addColumn('numero', function ($eq) {
            $html3 = $eq->r158;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_reclutamientorec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_reclutamientorec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'firma', 'numero', 'edit', 'delete'])
        ->make(true);
    }



    public function create_reclutamientorec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_reclutamientorec;
            $r151 = $request->r151;
            $empresa_id = $request->empresaid_reclutamientorec;
            $proyecto_id = $request->proyectoid_reclutamientorec;
            $reclutamiento_id = $request->reclutamientoid_reclutamientorec;

            if($id_eq==""){
                $eq = Rec_Reclutamiento::where('r151', '=', $r151)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Rec_Reclutamiento();
                    $equi -> r151 = $request->r151;
                    $equi -> r152 = $request->r152;
                    $equi -> r153 = $request->r153;
                    $equi -> r154 = $request->r154;
                    $equi -> r155 = $request->r155;
                    $equi -> r156 = $request->r156;
                    $equi -> r157 = $request->r157;
                    $equi -> r158 = $request->r158;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();

                    $suj = Contacto_Reclutamiento::find($r151);
                    $suj -> r105 = $request->r159;
                    $suj -> save();

                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Rec_Reclutamiento::find($id_eq);
                $equi -> r151 = $request->r151;
                $equi -> r152 = $request->r152;
                $equi -> r153 = $request->r153;
                $equi -> r154 = $request->r154;
                $equi -> r155 = $request->r155;
                $equi -> r156 = $request->r156;
                $equi -> r157 = $request->r157;
                $equi -> r158 = $request->r158;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();

                $suj = Contacto_Reclutamiento::find($r151);
                $suj -> r105 = $request->r159;
                $suj -> save();

                return response("guardado");
            }
        }
    }



    public function edit_reclutamientorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_reclutamiento;
            $eq = Rec_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_reclutamientorec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_reclutamiento;
            $eq = Rec_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    public function list_proteccionrec(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Proteccion_Reclutamiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('r160')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->r160;
            $suj = Contacto_Reclutamiento::where('id', '=', $html3)->get()->first();
            return $suj->r81;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_proteccionrec('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_proteccionrec('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'edit', 'delete'])
        ->make(true);
    }



    public function create_proteccionrec(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_proteccionrec;
            $r160 = $request->r160;
            $empresa_id = $request->empresaid_proteccionrec;
            $proyecto_id = $request->proyectoid_proteccionrec;
            $reclutamiento_id = $request->reclutamientoid_proteccionrec;

            if($id_eq==""){
                $eq = Proteccion_Reclutamiento::where('r160', '=', $r160)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Proteccion_Reclutamiento();
                    $equi -> r160 = $request->r160;
                    $equi -> r161 = $request->r161;
                    $equi -> r162 = $request->r162;
                    $equi -> r163 = $request->r163;
                    $equi -> r164 = $request->r164;
                    $equi -> r165 = $request->r165;
                    $equi -> reclutamiento_id = $reclutamiento_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Proteccion_Reclutamiento::find($id_eq);
                $equi -> r160 = $request->r160;
                $equi -> r161 = $request->r161;
                $equi -> r162 = $request->r162;
                $equi -> r163 = $request->r163;
                $equi -> r164 = $request->r164;
                $equi -> r165 = $request->r165;
                $equi -> reclutamiento_id = $reclutamiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }



    public function edit_proteccionrec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_proteccion;
            $eq = Proteccion_Reclutamiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    public function delete_proteccionrec(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_proteccion;
            $eq = Proteccion_Reclutamiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    





}