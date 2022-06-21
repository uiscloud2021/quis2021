<?php

namespace App\Http\Controllers\ComiteEtica;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\ComiteEtica\Integracion;
use App\Models\ComiteEtica\Ocupacion_Integracion;
use App\Models\ComiteEtica\Historia_Integracion;
use App\Models\ComiteEtica\Cargo_Integracion;
use App\Models\ComiteEtica\QUIS_Integracion;
use App\Models\ComiteEtica\CE_Integracion;
use App\Models\ComiteEtica\PCCE_Integracion;
use App\Models\ComiteEtica\Otra_Integracion;
use App\Models\ComiteEtica\Comite_Integracion;
use App\Models\ComiteEtica\Registro_Integracion;
use App\Models\ComiteEtica\Renovacion_Integracion;
use App\Models\ComiteEtica\Actualizacion_Integracion;
use App\Models\ComiteEtica\Informe_Integracion;

use App\Models\ComiteEtica\SometimientoCE;
use App\Models\ComiteEtica\Fecha_Sometimiento;
use App\Models\ComiteEtica\Protocolo_Sometimiento;
use App\Models\ComiteEtica\ICF_Sometimiento;
use App\Models\ComiteEtica\Manual_Sometimiento;
use App\Models\ComiteEtica\Poliza_Sometimiento;
use App\Models\ComiteEtica\Desviacion_Sometimiento;
use App\Models\ComiteEtica\EAS_Sometimiento;
use App\Models\ComiteEtica\SUSAR_Sometimiento;
use App\Models\ComiteEtica\Renovacion_Sometimiento;
use App\Models\ComiteEtica\Erratas_Sometimiento;
use App\Models\ComiteEtica\Copias_Sometimiento;

use App\Models\ComiteEtica\ReunionCE;

use App\Models\ComiteEtica\Enmienda_Seguimiento;
use App\Models\ComiteEtica\Otro_Seguimiento;
use App\Models\ComiteEtica\Informe_Seguimiento;

use App\Models\ComiteEtica\AuditoriaCE;

use App\Models\ComiteEtica\CierreCE;
use App\Models\ComiteEtica\Domicilio_Cierre;

use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Investigador;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// Start of uses

class CEController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:eq-ce.index');//PROTEGE TODAS LAS RUTAS
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
        ->where('no9', '=', 'Si')->get();
		return view('eq-ce.index', compact('proyectos'));
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

        $periodos = Comite_Integracion::where('empresa_id', '=', session('id_empresa'))->pluck('i43', 'id');
        $miembros = Integracion::where('empresa_id', '=', session('id_empresa'))->get();
        $sometimiento = SometimientoCE::where('proyecto_id', '=', $id)->get()->first();
        $num_miembros = Integracion::count('empresa_id', '=', session('id_empresa'));
        $cierre = CierreCE::where('proyecto_id', '=', $id)->get()->first();
        $empleados = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');

        return view('eq-ce.show', compact('proyecto', 'periodos', 'miembros', 'sometimiento', 'num_miembros', 'cierre', 'empleados'));
        //return response($miembros);
        
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




    //INTEGRACION
    public function create_integracion(Request $request)
    {		
		
        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->integracion_id;

        if($id==""){
            $int = new Integracion();
        }else{
            $int = Integracion::find($id);
        }

		//GUARDAR REGISTROS 
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
        $int->i22 = $request->i22;
        $int->i23 = $request->i23;
        $int->i24 = $request->i24;
        $int->i25 = $request->i25;
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
        $int->is_active = 1;
        $int->proyecto_id = $request->proyecto_id;
        $int->empresa_id = $request->empresa_id;
        $int->id_user = $id_user;
        $int -> save();

        //SACAR EL ID
        if($id==""){
            $integracion = Integracion::where('empresa_id', '=', $request->empresa_id)->get()->first();
            $id = $integracion->integracion_id;
        }
        
        return response($id);
    }



    public function guardar_integracion(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->integracion_id;

            //GUARDAR
            if($id==""){
                $int = new Integracion();
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
                $int->i22 = $request->i22;
                $int->i23 = $request->i23;
                $int->i24 = $request->i24;
                $int->i25 = $request->i25;
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
                $int->is_active = 1;
                $int->proyecto_id = $request->proyecto_id;
                $int->empresa_id = $request->empresa_id;
                $int->id_user = $user_id;
                $int -> save();
                //SACAR EL ID
                if($id==""){
                    $integracion = Integracion::where('empresa_id', '=', $request->empresa_id)->get()->first();
                    $id = $integracion->integracion_id;
                }
            }
            
            return response($id);
        }
    }


    public function list_miembroin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $eq = Integracion::where('empresa_id', $empresa_id)->orderBy('i1')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->i1;
            return $html3;
        })
        ->addColumn('pertenece', function ($eq) {
            $ce = $eq->i29;
            $ci = $eq->i30;
            if($ce == "Si" && $ci == "Si"){
                $html4="Miembro CE y CI";
            }else if($ce == "Si" && $ci == "No"){
                $html4="Miembro CE";
            }else if($ce == "No" && $ci == "Si"){
                $html4="Miembro CI";
            }else if($ce == "No" && $ci == "No"){
                $html4="No pertenece a ningun Comité";
            }else{
                $html4="No pertenece a ningun Comité";
            }
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_miembroin('.$eq->integracion_id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->integracion_id.'" onclick="delete_miembroin('.$eq->integracion_id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'pertenece', 'edit', 'delete'])
        ->make(true);
    }


    public function edit_miembroin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_miembro;
            $eq = Integracion::where('integracion_id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_miembroin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_miembro;
            $eq = Integracion::where('integracion_id', $id_eq)->delete();
            return response("eliminado");
        }
    }


    public function cargarperiodo_integracion(Request $request)
    {
        if($request->ajax()){
            $id_em = $request->empresa_id;
            $eq = Comite_Integracion::where('empresa_id', '=', $id_em)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function cargarmiembro_integracion(Request $request)
    {
        if($request->ajax()){
            $id_em = $request->empresa_id;
            $eq = Integracion::where('empresa_id', '=', $id_em)
            ->get()->toJson();
            return json_encode($eq);
        }
    }



    //MODAL OCUPACION
    public function list_ocupacionin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = Ocupacion_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i11')->get();
        
        return datatables()->of($eq)
        ->addColumn('puesto', function ($eq) {
            $html3 = $eq->i11;
            return $html3;
        })
        ->addColumn('institucion', function ($eq) {
            $html4 = $eq->i12;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_ocupacionin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_ocupacionin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['puesto', 'institucion', 'edit', 'delete'])
        ->make(true);
    }


    public function create_ocupacionin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_ocupacionin;
            $i11 = $request->i11;
            $i12 = $request->i12;
            $i13 = $request->i13;
            $i14 = $request->i14;
            $empresa_id = $request->empresaid_ocupacionin;
            $proyecto_id = $request->proyectoid_ocupacionin;
            $integracion_id = $request->integracionid_ocupacionin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Ocupacion_Integracion::where('i11', '=', $i11)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Ocupacion_Integracion();
                    $equi -> i11 = $request->i11;
                    $equi -> i12 = $request->i12;
                    $equi -> i13 = $request->i13;
                    $equi -> i14 = $request->i14;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Ocupacion_Integracion::find($id_eq);
                $equi -> i11 = $request->i11;
                $equi -> i12 = $request->i12;
                $equi -> i13 = $request->i13;
                $equi -> i14 = $request->i14;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_ocupacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_ocupacion;
            $eq = Ocupacion_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_ocupacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_ocupacion;
            $eq = Ocupacion_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL HISTORIA
    public function list_historiain(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = Historia_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i15')->get();
        
        return datatables()->of($eq)
        ->addColumn('institucion', function ($eq) {
            $html3 = $eq->i15;
            return $html3;
        })
        ->addColumn('grado', function ($eq) {
            $html4 = $eq->i16;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_historiain('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_historiain('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['institucion', 'grado', 'edit', 'delete'])
        ->make(true);
    }


    public function create_historiain(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_historiain;
            $i15 = $request->i15;
            $empresa_id = $request->empresaid_historiain;
            $proyecto_id = $request->proyectoid_historiain;
            $integracion_id = $request->integracionid_historiain;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Historia_Integracion::where('i15', '=', $i15)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Historia_Integracion();
                    $equi -> i15 = $request->i15;
                    $equi -> i16 = $request->i16;
                    $equi -> i17 = $request->i17;
                    $equi -> i18 = $request->i18;
                    $equi -> i19 = $request->i19;
                    $equi -> i20 = $request->i20;
                    $equi -> i21 = $request->i21;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Historia_Integracion::find($id_eq);
                $equi -> i15 = $request->i15;
                $equi -> i16 = $request->i16;
                $equi -> i17 = $request->i17;
                $equi -> i18 = $request->i18;
                $equi -> i19 = $request->i19;
                $equi -> i20 = $request->i20;
                $equi -> i21 = $request->i21;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_historiain(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_historia;
            $eq = Historia_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_historiain(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_historia;
            $eq = Historia_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL CARGO
    public function list_cargoin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = Cargo_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i26')->get();
        
        return datatables()->of($eq)
        ->addColumn('cargo', function ($eq) {
            $html3 = $eq->i26;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cargoin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_cargoin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['cargo', 'edit', 'delete'])
        ->make(true);
    }


    public function create_cargoin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_cargoin;
            $i26 = $request->i26;
            $empresa_id = $request->empresaid_cargoin;
            $proyecto_id = $request->proyectoid_cargoin;
            $integracion_id = $request->integracionid_cargoin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Cargo_Integracion::where('i26', '=', $i26)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Cargo_Integracion();
                    $equi -> i26 = $request->i26;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Cargo_Integracion::find($id_eq);
                $equi -> i26 = $request->i26;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_cargoin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_cargo;
            $eq = Cargo_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_cargoin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_cargo;
            $eq = Cargo_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL QUIS
    public function list_quisin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = QUIS_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i37')->get();
        
        return datatables()->of($eq)
        ->addColumn('quis', function ($eq) {
            $html3 = $eq->i37;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_quisin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_quisin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['quis', 'edit', 'delete'])
        ->make(true);
    }


    public function create_quisin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_quisin;
            $i37 = $request->i37;
            $empresa_id = $request->empresaid_quisin;
            $proyecto_id = $request->proyectoid_quisin;
            $integracion_id = $request->integracionid_quisin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = QUIS_Integracion::where('i37', '=', $i37)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new QUIS_Integracion();
                    $equi -> i37 = $request->i37;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = QUIS_Integracion::find($id_eq);
                $equi -> i37 = $request->i37;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_quisin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_quis;
            $eq = QUIS_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_quisin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_quis;
            $eq = QUIS_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL CE
    public function list_cein(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = CE_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i38')->get();
        
        return datatables()->of($eq)
        ->addColumn('ce', function ($eq) {
            $html3 = $eq->i38;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cein('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_cein('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['ce', 'edit', 'delete'])
        ->make(true);
    }


    public function create_cein(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_cein;
            $i38 = $request->i38;
            $empresa_id = $request->empresaid_cein;
            $proyecto_id = $request->proyectoid_cein;
            $integracion_id = $request->integracionid_cein;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = CE_Integracion::where('i38', '=', $i38)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new CE_Integracion();
                    $equi -> i38 = $request->i38;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = CE_Integracion::find($id_eq);
                $equi -> i38 = $request->i38;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_cein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_ce;
            $eq = CE_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_cein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_ce;
            $eq = CE_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL PCCE
    public function list_pccein(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = PCCE_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i39')->get();
        
        return datatables()->of($eq)
        ->addColumn('pcce', function ($eq) {
            $html3 = $eq->i39;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_pccein('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_pccein('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['pcce', 'edit', 'delete'])
        ->make(true);
    }


    public function create_pccein(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_pccein;
            $i39 = $request->i39;
            $empresa_id = $request->empresaid_pccein;
            $proyecto_id = $request->proyectoid_pccein;
            $integracion_id = $request->integracionid_pccein;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = PCCE_Integracion::where('i39', '=', $i39)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new PCCE_Integracion();
                    $equi -> i39 = $request->i39;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = PCCE_Integracion::find($id_eq);
                $equi -> i39 = $request->i39;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_pccein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_pcce;
            $eq = PCCE_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_pccein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_pcce;
            $eq = PCCE_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL OTRA
    public function list_otrain(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $integracion_id = $request->integracion_id;
        $eq = Otra_Integracion::where('empresa_id', $empresa_id)
        ->where('integracion_id', '=', $integracion_id)->orderBy('i40')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->i40;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->i41;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_otrain('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_otrain('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_otrain(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_otrain;
            $i40 = $request->i40;
            $empresa_id = $request->empresaid_otrain;
            $proyecto_id = $request->proyectoid_otrain;
            $integracion_id = $request->integracionid_otrain;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Otra_Integracion::where('i40', '=', $i40)
                ->where('empresa_id', '=', $empresa_id)
                ->where('integracion_id', '=', $integracion_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Otra_Integracion();
                    $equi -> i40 = $request->i40;
                    $equi -> i41 = $request->i41;
                    $equi -> integracion_id = $integracion_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Otra_Integracion::find($id_eq);
                $equi -> i40 = $request->i40;
                $equi -> i41 = $request->i41;
                $equi -> integracion_id = $integracion_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_otrain(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_otra;
            $eq = Otra_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_otrain(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_otra;
            $eq = Otra_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL COMITE
    public function list_comitein(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Comite_Integracion::where('empresa_id', $empresa_id)->orderBy('i43')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->i42;
            return $html3;
        })
        ->addColumn('periodo', function ($eq) {
            $html4 = $eq->i43;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_comitein('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_comitein('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'periodo', 'edit', 'delete'])
        ->make(true);
    }


    public function create_comitein(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_comitein;
            $i42 = $request->i42;
            $i43 = $request->i43;
            $empresa_id = $request->empresaid_comitein;
            $proyecto_id = $request->proyectoid_comitein;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Comite_Integracion::where('i42', '=', $i42)
                ->where('i43', '=', $i43)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Comite_Integracion();
                    $equi -> i42 = $request->i42;
                    $equi -> i43 = $request->i43;
                    $equi -> i44 = $request->i44;
                    $equi -> i45 = $request->i45;
                    $equi -> i46 = $request->i46;
                    $equi -> i47 = $request->i47;
                    $equi -> i48 = $request->i48;
                    $equi -> i49 = $request->i49;
                    $equi -> i50 = $request->i50;
                    $equi -> i51 = $request->i51;
                    $equi -> i52 = $request->i52;
                    $equi -> i53 = $request->i53;
                    $equi -> i54 = $request->i54;
                    $equi -> i55 = $request->i55;
                    $equi -> i56 = $request->i56;
                    $equi -> i57 = $request->i57;
                    $equi -> i58 = $request->i58;
                    $equi -> i59 = $request->i59;
                    $equi -> i60 = $request->i60;
                    $equi -> i61 = $request->i61;
                    $equi -> i62 = $request->i62;
                    $equi -> i63 = $request->i63;
                    $equi -> i64 = $request->i64;
                    $equi -> i65 = $request->i65;
                    $equi -> i66 = $request->i66;
                    $equi -> i67 = $request->i67;
                    $equi -> i68 = $request->i68;
                    $equi -> i69 = $request->i69;
                    $equi -> i70 = $request->i70;
                    $equi -> i71 = $request->i71;
                    $equi -> i72 = $request->i72;
                    $equi -> i73 = $request->i73;
                    $equi -> i74 = $request->i74;
                    $equi -> i75 = $request->i75;
                    $equi -> i76 = $request->i76;
                    $equi -> i77 = $request->i77;
                    $equi -> i78 = $request->i78;
                    $equi -> i79 = $request->i79;
                    $equi -> i80 = $request->i80;
                    $equi -> i81 = $request->i81;
                    $equi -> i82 = $request->i82;
                    $equi -> i83 = $request->i83;
                    $equi -> i84 = $request->i84;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Comite_Integracion::find($id_eq);
                $equi -> i42 = $request->i42;
                $equi -> i43 = $request->i43;
                $equi -> i44 = $request->i44;
                $equi -> i45 = $request->i45;
                $equi -> i46 = $request->i46;
                $equi -> i47 = $request->i47;
                $equi -> i48 = $request->i48;
                $equi -> i49 = $request->i49;
                $equi -> i50 = $request->i50;
                $equi -> i51 = $request->i51;
                $equi -> i52 = $request->i52;
                $equi -> i53 = $request->i53;
                $equi -> i54 = $request->i54;
                $equi -> i55 = $request->i55;
                $equi -> i56 = $request->i56;
                $equi -> i57 = $request->i57;
                $equi -> i58 = $request->i58;
                $equi -> i59 = $request->i59;
                $equi -> i60 = $request->i60;
                $equi -> i61 = $request->i61;
                $equi -> i62 = $request->i62;
                $equi -> i63 = $request->i63;
                $equi -> i64 = $request->i64;
                $equi -> i65 = $request->i65;
                $equi -> i66 = $request->i66;
                $equi -> i67 = $request->i67;
                $equi -> i68 = $request->i68;
                $equi -> i69 = $request->i69;
                $equi -> i70 = $request->i70;
                $equi -> i71 = $request->i71;
                $equi -> i72 = $request->i72;
                $equi -> i73 = $request->i73;
                $equi -> i74 = $request->i74;
                $equi -> i75 = $request->i75;
                $equi -> i76 = $request->i76;
                $equi -> i77 = $request->i77;
                $equi -> i78 = $request->i78;
                $equi -> i79 = $request->i79;
                $equi -> i80 = $request->i80;
                $equi -> i81 = $request->i81;
                $equi -> i82 = $request->i82;
                $equi -> i83 = $request->i83;
                $equi -> i84 = $request->i84;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_comitein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_comite;
            $eq = Comite_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_comitein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_comite;
            $eq = Comite_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL REGISTROS
    public function list_registroin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Registro_Integracion::where('empresa_id', $empresa_id)->orderBy('i86')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->i85;
            return $html3;
        })
        ->addColumn('periodo', function ($eq) {
            $html4 = $eq->i86;
            $per = Comite_Integracion::where('id', '=', $html4)->get()->first();
            return $per->i43;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_registroin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_registroin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'periodo', 'edit', 'delete'])
        ->make(true);
    }


    public function create_registroin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_registroin;
            $i85 = $request->i85;
            $i86 = $request->i86;
            $empresa_id = $request->empresaid_registroin;
            $proyecto_id = $request->proyectoid_registroin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Registro_Integracion::where('i85', '=', $i85)
                ->where('i86', '=', $i86)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Registro_Integracion();
                    $equi -> i85 = $request->i85;
                    $equi -> i86 = $request->i86;
                    $equi -> i87 = $request->i87;
                    $equi -> i88 = $request->i88;
                    $equi -> i89 = $request->i89;
                    $equi -> i90 = $request->i90;
                    $equi -> i91 = $request->i91;
                    $equi -> i92 = $request->i92;
                    $equi -> i93 = $request->i93;
                    $equi -> i94 = $request->i94;
                    $equi -> i95 = $request->i95;
                    $equi -> i96 = $request->i96;
                    $equi -> i97 = $request->i97;
                    $equi -> i98 = $request->i98;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Registro_Integracion::find($id_eq);
                $equi -> i85 = $request->i85;
                $equi -> i86 = $request->i86;
                $equi -> i87 = $request->i87;
                $equi -> i88 = $request->i88;
                $equi -> i89 = $request->i89;
                $equi -> i90 = $request->i90;
                $equi -> i91 = $request->i91;
                $equi -> i92 = $request->i92;
                $equi -> i93 = $request->i93;
                $equi -> i94 = $request->i94;
                $equi -> i95 = $request->i95;
                $equi -> i96 = $request->i96;
                $equi -> i97 = $request->i97;
                $equi -> i98 = $request->i98;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_registroin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_registro;
            $eq = Registro_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_registroin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_registro;
            $eq = Registro_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL RENOVACIONES
    public function list_renovacionin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Renovacion_Integracion::where('empresa_id', $empresa_id)->orderBy('i100')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->i99;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->i100;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_renovacionin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_renovacionin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_renovacionin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_renovacionin;
            $i99 = $request->i99;
            $i100 = $request->i100;
            $empresa_id = $request->empresaid_renovacionin;
            $proyecto_id = $request->proyectoid_renovacionin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Renovacion_Integracion::where('i99', '=', $i99)
                ->where('i100', '=', $i100)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Renovacion_Integracion();
                    $equi -> i99 = $request->i99;
                    $equi -> i100 = $request->i100;
                    $equi -> i101 = $request->i101;
                    $equi -> i102 = $request->i102;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Renovacion_Integracion::find($id_eq);
                $equi -> i99 = $request->i99;
                $equi -> i100 = $request->i100;
                $equi -> i101 = $request->i101;
                $equi -> i102 = $request->i102;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_renovacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_renovacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL ACTUALIZACION
    public function list_actualizacionin(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Actualizacion_Integracion::where('empresa_id', $empresa_id)->orderBy('i103')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->i103;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_actualizacionin('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_actualizacionin('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_actualizacionin(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_actualizacionin;
            $i103 = $request->i103;
            $empresa_id = $request->empresaid_actualizacionin;
            $proyecto_id = $request->proyectoid_actualizacionin;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Actualizacion_Integracion::where('i103', '=', $i103)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Actualizacion_Integracion();
                    $equi -> i103 = $request->i103;
                    $equi -> i104 = $request->i104;
                    $equi -> i105 = $request->i105;
                    $equi -> i106 = $request->i106;
                    $equi -> i107 = $request->i107;
                    $equi -> i108 = $request->i108;
                    $equi -> i109 = $request->i109;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Actualizacion_Integracion::find($id_eq);
                $equi -> i103 = $request->i103;
                $equi -> i104 = $request->i104;
                $equi -> i105 = $request->i105;
                $equi -> i106 = $request->i106;
                $equi -> i107 = $request->i107;
                $equi -> i108 = $request->i108;
                $equi -> i109 = $request->i109;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_actualizacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_actualizacion;
            $eq = Actualizacion_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_actualizacionin(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_actualizacion;
            $eq = Actualizacion_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL INFORME
    public function list_informein(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Informe_Integracion::where('empresa_id', $empresa_id)->orderBy('i110')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->i110;
            return $html3;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_informein('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_informein('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_informein(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_informein;
            $i110 = $request->i110;
            $empresa_id = $request->empresaid_informein;
            $proyecto_id = $request->proyectoid_informein;

            if($id_eq==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $eq = Informe_Integracion::where('i110', '=', $i110)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Informe_Integracion();
                    $equi -> i110 = $request->i110;
                    $equi -> i111 = $request->i111;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Informe_Integracion::find($id_eq);
                $equi -> i110 = $request->i110;
                $equi -> i111 = $request->i111;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_informein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_informe;
            $eq = Informe_Integracion::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_informein(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_informe;
            $eq = Informe_Integracion::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }
    //FIN DE INTEGRACION





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

        $array1="";
        $num1=0;
        foreach($request->areasom as $selected){
            if($selected!=""){
                $array1.=$selected."|";
                $num1++;
            }
        }

        if($id==""){
            $int = new SometimientoCE();
        }else{
            $int = SometimientoCE::find($id);
        }

		//GUARDAR REGISTROS 
        $int->s1 = $request->s1;
        $int->s2 = $request->s2;
        $int->s3 = $request->s3;
        $int->s4 = $request->s4;
        $int->s5 = $request->s5;
        $int->s6 = $request->s6;
        $int->s52 = $array1;
        $int->s53 = $num1;
        $int->s54 = $request->s54;
        $int->s55 = $request->s55;
        $int->s56 = $request->s56;
        $int->s57 = $request->s57;
        $int->s58 = $request->s58;
        $int->s59 = $request->s59;
        $int->s60 = $request->s60;
        $int->s61 = $request->s61;
        $int->s62 = $request->s62;
        $int->s63 = $request->s63;
        $int->s64 = $request->s64;
        $int->s65 = $request->s65;
        $int->is_active = 1;
        $int->proyecto_id = $request->proyecto_id;
        $int->empresa_id = $request->empresa_id;
        $int->id_user = $id_user;
        $int -> save();

        //SACAR EL ID
        if($id==""){
            $som = SometimientoCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $som->sometimiento_id;
        }
        
        return response($id);
    }



    public function guardar_sometimiento(Request $request)
    {
        //VALIDAR CAMPOS
        $request->validate([
            's1' => 'required',
        ]);

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->sometimiento_id;

            $array1="";
            $num1=0;

            foreach($request->areasom as $selected){
                if($selected!=""){
                    $array1.=$selected."|";
                    $num1++;
                }
            }

            //GUARDAR
            if($id==""){
                $int = new SometimientoCE();
                $int->s1 = $request->s1;
                $int->s2 = $request->s2;
                $int->s3 = $request->s3;
                $int->s4 = $request->s4;
                $int->s5 = $request->s5;
                $int->s6 = $request->s6;
                $int->s52 = $array1;
                $int->s53 = $num1;
                $int->s54 = $request->s54;
                $int->s55 = $request->s55;
                $int->s56 = $request->s56;
                $int->s57 = $request->s57;
                $int->s58 = $request->s58;
                $int->s59 = $request->s59;
                $int->s60 = $request->s60;
                $int->s61 = $request->s61;
                $int->s62 = $request->s62;
                $int->s63 = $request->s63;
                $int->s64 = $request->s64;
                $int->s65 = $request->s65;
                $int->is_active = 1;
                $int->proyecto_id = $request->proyecto_id;
                $int->empresa_id = $request->empresa_id;
                $int->id_user = $user_id;
                $int -> save();
                //SACAR EL ID
                if($id==""){
                    $som = SometimientoCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                    $id = $som->sometimiento_id;
                }
            }else{

                $array="";
                $num=0;
                
                foreach($request->docsom as $selected){
                    if($selected!=""){
                        $array.=$selected."|";
                        $num++;
                    }
                }

                $int = new Fecha_Sometimiento();
                $int->s7 = $request->s7;
                $int->s8 = $request->s8;
                $int->s9 = $request->s9;
                $int->s10 = $request->s10;
                $int->s11 = $request->s11;
                $int->s12 = $request->s12;
                $int->s13 = $request->s13;
                $int->s14 = $request->s14;
                $int->s15 = $request->s15;
                $int->s16 = $request->s16;
                $int->s17 = $array;
                $int->s18 = $num;
                $int->is_active = 1;
                $int->sometimiento_id = $id;
                $int->proyecto_id = $request->proyecto_id;
                $int->empresa_id = $request->empresa_id;
                $int->id_user = $user_id;
                $int -> save();
                //SACAR EL ID
                $id = $int->id;
            }
            
            return response($id);
        }
    }


    public function list_fechasom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;

        $eq = Fecha_Sometimiento::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('s7')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->s7;
            return $html3;
        })
        ->addColumn('documento', function ($eq) {
            $doc = $eq->s17;
            $num = explode( '|', $doc);
            $array="";
            for ($i=0; $i<count($num)-1; $i++){
                $array.=$num[$i].", ";
            }
            return $array;
            /*$html4 = $eq->s17;
            return $html4;*/
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_fechasom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_fechasom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'documento', 'edit', 'delete'])
        ->make(true);
    }


    public function edit_fechasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fecha;
            $eq = Fecha_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_fechasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_fecha;
            $eq = Fecha_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL PROTOCOLO
    public function list_protocolosom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Protocolo_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s19')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->s19;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->s22;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_protocolosom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_protocolosom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_protocolosom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_protocolosom;
            $s19 = $request->s19;
            $empresa_id = $request->empresaid_protocolosom;
            $proyecto_id = $request->proyectoid_protocolosom;
            $sometimiento_id = $request->sometimientoid_protocolosom;
            $fecha_id = $request->fechaid_protocolosom;

            if($id_eq==""){
                $eq = Protocolo_Sometimiento::where('s19', '=', $s19)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Protocolo_Sometimiento();
                    $equi -> s19 = $request->s19;
                    $equi -> s20 = $request->s20;
                    $equi -> s21 = $request->s21;
                    $equi -> s22 = $request->s22;
                    $equi -> s23 = $request->s23;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Protocolo_Sometimiento::find($id_eq);
                $equi -> s19 = $request->s19;
                $equi -> s20 = $request->s20;
                $equi -> s21 = $request->s21;
                $equi -> s22 = $request->s22;
                $equi -> s23 = $request->s23;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_protocolosom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_protocolo;
            $eq = Protocolo_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_protocolosom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_protocolo;
            $eq = Protocolo_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL ICF
    public function list_icfsom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = ICF_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s24')->get();
        
        return datatables()->of($eq)
        ->addColumn('nombre', function ($eq) {
            $html3 = $eq->s24;
            return $html3;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->s27;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_icfsom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_icfsom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_icfsom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_icfsom;
            $s24 = $request->s24;
            $empresa_id = $request->empresaid_icfsom;
            $proyecto_id = $request->proyectoid_icfsom;
            $sometimiento_id = $request->sometimientoid_icfsom;
            $fecha_id = $request->fechaid_icfsom;

            if($id_eq==""){
                $eq = ICF_Sometimiento::where('s24', '=', $s24)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new ICF_Sometimiento();
                    $equi -> s24 = $request->s24;
                    $equi -> s25 = $request->s25;
                    $equi -> s26 = $request->s26;
                    $equi -> s27 = $request->s27;
                    $equi -> s28 = $request->s28;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = ICF_Sometimiento::find($id_eq);
                $equi -> s24 = $request->s24;
                $equi -> s25 = $request->s25;
                $equi -> s26 = $request->s26;
                $equi -> s27 = $request->s27;
                $equi -> s28 = $request->s28;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_icfsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_icf;
            $eq = ICF_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_icfsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_icf;
            $eq = ICF_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL MANUAL
    public function list_manualsom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Manual_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s30')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->s31;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_manualsom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_manualsom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_manualsom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_manualsom;
            $s30 = $request->s30;
            $empresa_id = $request->empresaid_manualsom;
            $proyecto_id = $request->proyectoid_manualsom;
            $sometimiento_id = $request->sometimientoid_manualsom;
            $fecha_id = $request->fechaid_manualsom;

            if($id_eq==""){
                $eq = Manual_Sometimiento::where('s30', '=', $s30)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Manual_Sometimiento();
                    $equi -> s29 = $request->s29;
                    $equi -> s30 = $request->s30;
                    $equi -> s31 = $request->s31;
                    $equi -> s32 = $request->s32;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Manual_Sometimiento::find($id_eq);
                $equi -> s29 = $request->s29;
                $equi -> s30 = $request->s30;
                $equi -> s31 = $request->s31;
                $equi -> s32 = $request->s32;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_manualsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_manual;
            $eq = Manual_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_manualsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_manual;
            $eq = Manual_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL POLIZA
    public function list_polizasom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Poliza_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s33')->get();
        
        return datatables()->of($eq)
        ->addColumn('vigencia', function ($eq) {
            $html4 = $eq->s33;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_polizasom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_polizasom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['vigencia', 'edit', 'delete'])
        ->make(true);
    }


    public function create_polizasom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_polizasom;
            $s33 = $request->s33;
            $empresa_id = $request->empresaid_polizasom;
            $proyecto_id = $request->proyectoid_polizasom;
            $sometimiento_id = $request->sometimientoid_polizasom;
            $fecha_id = $request->fechaid_polizasom;

            if($id_eq==""){
                $eq = Poliza_Sometimiento::where('s33', '=', $s33)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Poliza_Sometimiento();
                    $equi -> s33 = $request->s33;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Poliza_Sometimiento::find($id_eq);
                $equi -> s33 = $request->s33;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_polizasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_poliza;
            $eq = Poliza_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_polizasom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_poliza;
            $eq = Poliza_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL DESVIACION
    public function list_desviacionsom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Desviacion_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s34')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->s34;
            return $html4;
        })
        ->addColumn('descripcion', function ($eq) {
            $html4 = $eq->s35;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_desviacionsom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_desviacionsom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'descripcion', 'edit', 'delete'])
        ->make(true);
    }


    public function create_desviacionsom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_desviacionsom;
            $s34 = $request->s34;
            $empresa_id = $request->empresaid_desviacionsom;
            $proyecto_id = $request->proyectoid_desviacionsom;
            $sometimiento_id = $request->sometimientoid_desviacionsom;
            $fecha_id = $request->fechaid_desviacionsom;

            $fe = Fecha_Sometimiento::where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
            $s7 = $fe->s7;

            $dateDifference = abs(strtotime($s34) - strtotime($s7));
            $dias  = floor($dateDifference / (60 * 60 * 24));
            $objetivo="";
            if($dias <= 30){
                $objetivo="Si";
            }else{
                $objetivo="No";
            }

            $n6=NULL;
            $n7=NULL;
            $n8=NULL;
            $n9=NULL;
            $n10=NULL;

            if($id_eq==""){
                $eq = Desviacion_Sometimiento::where('s34', '=', $s34)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Desviacion_Sometimiento();
                    $equi -> s34 = $request->s34;
                    $equi -> s35 = $request->s35;
                    $equi -> s36 = $objetivo;
                    $equi -> seg6 = $n6;
                    $equi -> seg7 = $n7;
                    $equi -> seg8 = $n8;
                    $equi -> seg9 = $n9;
                    $equi -> seg10 = $n10;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Desviacion_Sometimiento::find($id_eq);
                $equi -> s34 = $request->s34;
                $equi -> s35 = $request->s35;
                $equi -> s36 = $objetivo;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_desviacionsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_desviacion;
            $eq = Desviacion_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_desviacionsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_desviacion;
            $eq = Desviacion_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL EAS
    public function list_eassom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = EAS_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s38')->get();
        
        return datatables()->of($eq)
        ->addColumn('patologia', function ($eq) {
            $html4 = $eq->s38;
            return $html4;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->s39;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_eassom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_eassom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['patologia', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_eassom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_eassom;
            $s39 = $request->s39;
            $empresa_id = $request->empresaid_eassom;
            $proyecto_id = $request->proyectoid_eassom;
            $sometimiento_id = $request->sometimientoid_eassom;
            $fecha_id = $request->fechaid_eassom;

            $fe = Fecha_Sometimiento::where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
            $s7 = $fe->s7;

            $dateDifference = abs(strtotime($s39) - strtotime($s7));
            $dias  = floor($dateDifference / (60 * 60 * 24));
            $objetivo="";
            if($dias <= 30){
                $objetivo="Si";
            }else{
                $objetivo="No";
            }

            $n11=NULL;
            $n12=NULL;
            $n13=NULL;
            $n14=NULL;
            $n15=NULL;
            $n16=NULL;

            if($id_eq==""){
                $eq = EAS_Sometimiento::where('s39', '=', $s39)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new EAS_Sometimiento();
                    $equi -> s37 = $request->s37;
                    $equi -> s38 = $request->s38;
                    $equi -> s39 = $request->s39;
                    $equi -> s40 = $objetivo;
                    $equi -> seg11 = $n11;
                    $equi -> seg12 = $n12;
                    $equi -> seg13 = $n13;
                    $equi -> seg14 = $n14;
                    $equi -> seg15 = $n15;
                    $equi -> seg16 = $n16;
                    $equi -> fecha_id = $fecha_id;
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
                $equi =EAS_Sometimiento::find($id_eq);
                $equi -> s37 = $request->s37;
                $equi -> s38 = $request->s38;
                $equi -> s39 = $request->s39;
                $equi -> s40 = $objetivo;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_eassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_eas;
            $eq = EAS_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_eassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_eas;
            $eq =EAS_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL SUSAR
    public function list_susarsom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = SUSAR_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s42')->get();
        
        return datatables()->of($eq)
        ->addColumn('patologia', function ($eq) {
            $html4 = $eq->s42;
            return $html4;
        })
        ->addColumn('numero', function ($eq) {
            $html4 = $eq->s43;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_susarsom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_susarsom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['patologia', 'numero', 'edit', 'delete'])
        ->make(true);
    }


    public function create_susarsom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_susarsom;
            $s42 = $request->s42;
            $empresa_id = $request->empresaid_susarsom;
            $proyecto_id = $request->proyectoid_susarsom;
            $sometimiento_id = $request->sometimientoid_susarsom;
            $fecha_id = $request->fechaid_susarsom;

            if($id_eq==""){
                $eq = SUSAR_Sometimiento::where('s42', '=', $s42)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new SUSAR_Sometimiento();
                    $equi -> s41 = $request->s41;
                    $equi -> s42 = $request->s42;
                    $equi -> s43 = $request->s43;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = SUSAR_Sometimiento::find($id_eq);
                $equi -> s41 = $request->s41;
                $equi -> s42 = $request->s42;
                $equi -> s43 = $request->s43;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_susarsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_susar;
            $eq = SUSAR_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_susarsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_susar;
            $eq = SUSAR_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL RENOVACION
    public function list_renovacionsom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Renovacion_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s44')->get();
        
        return datatables()->of($eq)
        ->addColumn('somete', function ($eq) {
            $html4 = $eq->s44;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_renovacionsom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_renovacionsom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['somete', 'edit', 'delete'])
        ->make(true);
    }


    public function create_renovacionsom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_renovacionsom;
            $s44 = $request->s44;
            $empresa_id = $request->empresaid_renovacionsom;
            $proyecto_id = $request->proyectoid_renovacionsom;
            $sometimiento_id = $request->sometimientoid_renovacionsom;
            $fecha_id = $request->fechaid_renovacionsom;

            $n22=NULL;
            $n23=NULL;
            $n24=NULL;
            $n25=NULL;

            if($id_eq==""){
                $eq = Renovacion_Sometimiento::where('s44', '=', $s44)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Renovacion_Sometimiento();
                    $equi -> s44 = $request->s44;
                    $equi -> seg22 = $n22;
                    $equi -> seg23 = $n23;
                    $equi -> seg24 = $n24;
                    $equi -> seg25 = $n25;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Renovacion_Sometimiento::find($id_eq);
                $equi -> s44 = $request->s44;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_renovacionsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_renovacionsom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL ERRATAS
    public function list_erratassom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $fecha_id = $request->fecha_id;
        $eq = Erratas_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('fecha_id', $fecha_id)->orderBy('s45')->get();
        
        return datatables()->of($eq)
        ->addColumn('documento', function ($eq) {
            $html4 = $eq->s45;
            return $html4;
        })
        ->addColumn('informacion', function ($eq) {
            $html4 = $eq->s46;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_erratassom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_erratassom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['documento', 'edit', 'delete'])
        ->make(true);
    }


    public function create_erratassom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_erratassom;
            $s45 = $request->s45;
            $empresa_id = $request->empresaid_erratassom;
            $proyecto_id = $request->proyectoid_erratassom;
            $sometimiento_id = $request->sometimientoid_erratassom;
            $fecha_id = $request->fechaid_erratassom;

            $n26=NULL;
            $n27=NULL;

            if($id_eq==""){
                $eq = Erratas_Sometimiento::where('s45', '=', $s45)
                ->where('empresa_id', '=', $empresa_id)
                ->where('fecha_id', '=', $fecha_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Erratas_Sometimiento();
                    $equi -> s45 = $request->s45;
                    $equi -> s46 = $request->s46;
                    $equi -> seg26 = $n26;
                    $equi -> seg27 = $n27;
                    $equi -> fecha_id = $fecha_id;
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
                $equi = Erratas_Sometimiento::find($id_eq);
                $equi -> s45 = $request->s45;
                $equi -> s46 = $request->s46;
                $equi -> fecha_id = $fecha_id;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_erratassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_erratas;
            $eq = Erratas_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_erratassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_erratas;
            $eq = Erratas_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL COPIAS
    public function list_copiassom(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Copias_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s47')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->s47;
            return $html3;
        })
        ->addColumn('documento', function ($eq) {
            $html4 = $eq->s49;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_copiassom('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_copiassom('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'documento', 'edit', 'delete'])
        ->make(true);
    }


    public function create_copiassom(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_copiassom;
            $s47 = $request->s47;
            $empresa_id = $request->empresaid_copiassom;
            $proyecto_id = $request->proyectoid_copiassom;
            $sometimiento_id = $request->sometimientoid_copiassom;

            $array="";
            
            foreach($request->miembros as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }

            if($id_eq==""){
                $eq = Copias_Sometimiento::where('s47', '=', $s47)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Copias_Sometimiento();
                    $equi -> s47 = $request->s47;
                    $equi -> s48 = $array;
                    $equi -> s49 = $request->s49;
                    $equi -> s50 = $request->s50;
                    $equi -> s51 = $request->s51;
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
                $equi = Copias_Sometimiento::find($id_eq);
                $equi -> s47 = $request->s47;
                $equi -> s48 = $array;
                $equi -> s49 = $request->s49;
                $equi -> s50 = $request->s50;
                $equi -> s51 = $request->s51;
                $equi -> sometimiento_id = $sometimiento_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_copiassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_copias;
            $eq = Copias_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_copiassom(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_copias;
            $eq = Copias_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }

    //FIN DE SOMETIMIENTO






    //REUNION
    public function create_reunion(Request $request)
    {	

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->reunion_id;
        $num_miembros = $request->num_miembros;

        $array="";
        $array2="";
        $array3="";
        $array4="";
        $array5="";
        foreach($request->miembrosre as $selected){
            if($selected!=""){
                $array.=$selected."|";
                $array2.=$request->{"relacionre$selected"}."|";
                $array3.=$request->{"nore$selected"}."|";
                $array4.=$request->{"opinionre$selected"}."|";
                $array5.=$request->{"votre$selected"}."|";
            }
        }
        

        if($id==""){
            $int = new ReunionCE();
        }else{
            $int = ReunionCE::find($id);
        }

		//GUARDAR REGISTROS 
        $int->r1 = $request->r1;
        $int->r2 = $array;
        $int->r3 = $array2;
        $int->r4 = $array3;
        $int->r5 = $array4;
        $int->r6 = $array5;
        $int->r7 = $request->r7;
        $int->r8 = $request->r8;
        $int->r9 = $request->r9;
        $int->r10 = $request->r10;
        $int->r11 = $request->r11;
        $int->r12 = $request->r12;
        $int->r13 = $request->r13;
        $int->r14 = $request->r14;
        $int->r15 = $request->r15;
        $int->r16 = $request->r16;
        $int->r17 = $request->r17;
        $int->r18 = $request->r18;
        $int->r19 = $request->r19;
        $int->r20 = $request->r20;
        $int->r21 = $request->r21;
        $int->r22 = $request->r22;
        $int->r23 = $request->r23;
        $int->is_active = 1;
        $int->proyecto_id = $request->proyecto_id;
        $int->empresa_id = $request->empresa_id;
        $int->id_user = $id_user;
        $int -> save();

        //SACAR EL ID
        if($id==""){
            $reu = ReunionCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $reu->reunion_id;
        }

    }



    public function list_reunion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = ReunionCE::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('r1')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->r1;
            return $html3;
        })
        ->addColumn('dictamen', function ($eq) {
            $html4 = $eq->r14;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_reunion('.$eq->reunion_id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->reunion_id.'" onclick="delete_reunion('.$eq->reunion_id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'dictamen', 'edit', 'delete'])
        ->make(true);
    }


    public function edit_reunion(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_reunion;
            $eq = ReunionCE::where('reunion_id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_reunion(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_reunion;
            $eq = ReunionCE::where('reunion_id', $id_eq)->delete();
            return response("eliminado");
        }
    }

    //FIN DE REUNION






    //SEGUIMIENTO
    //MODAL ENMIENDA
    public function list_enmiendaseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Enmienda_Seguimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('seg2')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html3 = $eq->seg2;
            return $html3;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->seg5;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_enmiendaseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_enmiendaseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function create_enmiendaseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_enmiendaseg;
            $seg2 = $request->seg2;
            $empresa_id = $request->empresaid_enmiendaseg;
            $proyecto_id = $request->proyectoid_enmiendaseg;

            if($id_eq==""){
                $eq = Enmienda_Seguimiento::where('seg2', '=', $seg2)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Enmienda_Seguimiento();
                    $equi -> seg1 = $request->seg1;
                    $equi -> seg2 = $request->seg2;
                    $equi -> seg3 = $request->seg3;
                    $equi -> seg4 = $request->seg4;
                    $equi -> seg5 = $request->seg5;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Enmienda_Seguimiento::find($id_eq);
                $equi -> seg1 = $request->seg1;
                $equi -> seg2 = $request->seg2;
                $equi -> seg3 = $request->seg3;
                $equi -> seg4 = $request->seg4;
                $equi -> seg5 = $request->seg5;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_enmiendaseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_enmienda;
            $eq = Enmienda_Seguimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_enmiendaseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_enmienda;
            $eq = Enmienda_Seguimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL DESVIACION
    public function list_desviacionseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Desviacion_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s34')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html4 = $eq->s34;
            return $html4;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->seg8;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_desviacionseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_desviacionseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function create_desviacionseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_desviacionseg;
            $empresa_id = $request->empresaid_desviacionseg;
            $proyecto_id = $request->proyectoid_desviacionseg;
            $fecha_id = $request->fechaid_desviacionseg;

            $equi = Desviacion_Sometimiento::find($id_eq);
            $equi -> seg6 = $request->seg6;
            $equi -> seg7 = $request->seg7;
            $equi -> seg8 = $request->seg8;
            $equi -> seg9 = $request->seg9;
            $equi -> seg10 = $request->seg10;
            $equi -> id_user = $user_id;
            $equi -> save();
            return response("guardado");
        }
    }


    public function edit_desviacionseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_desviacion;
            $eq = Desviacion_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_desviacionseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_desviacion;
            $eq = Desviacion_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL EAS
    public function list_easseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = EAS_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s38')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html4 = $eq->s39;
            return $html4;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->seg14;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_easseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_easseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function create_easseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_easseg;
            $empresa_id = $request->empresaid_easseg;
            $proyecto_id = $request->proyectoid_easseg;
            $fecha_id = $request->fechaid_easseg;

            $equi =EAS_Sometimiento::find($id_eq);
            $equi -> seg11 = $request->seg11;
            $equi -> seg12 = $request->seg12;
            $equi -> seg13 = $request->seg13;
            $equi -> seg14 = $request->seg14;
            $equi -> seg15 = $request->seg15;
            $equi -> seg16 = $request->seg16;
            $equi -> id_user = $user_id;
            $equi -> save();
            return response("guardado");
        }
    }


    public function edit_easseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_eas;
            $eq = EAS_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_easseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_eas;
            $eq =EAS_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL OTROS
    public function list_otroseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Otro_Seguimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('seg19')->get();
        
        return datatables()->of($eq)
        ->addColumn('tipo', function ($eq) {
            $html4 = $eq->seg17;
            return $html4;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->seg19;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_otroseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_otroseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['tipo', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_otroseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_otroseg;
            $seg19 = $request->seg19;
            $empresa_id = $request->empresaid_otroseg;
            $proyecto_id = $request->proyectoid_otroseg;

            if($id_eq==""){
                $eq = Otro_Seguimiento::where('seg19', '=', $seg19)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Otro_Seguimiento();
                    $equi -> seg17 = $request->seg17;
                    $equi -> seg18 = $request->seg18;
                    $equi -> seg19 = $request->seg19;
                    $equi -> seg20 = $request->seg20;
                    $equi -> seg21 = $request->seg21;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Otro_Seguimiento::find($id_eq);
                $equi -> seg17 = $request->seg17;
                $equi -> seg18 = $request->seg18;
                $equi -> seg19 = $request->seg19;
                $equi -> seg20 = $request->seg20;
                $equi -> seg21 = $request->seg21;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_otroseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_otro;
            $eq = Otro_Seguimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_otroseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_otro;
            $eq = Otro_Seguimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL RENOVACION
    public function list_renovacionseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Renovacion_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s44')->get();
        
        return datatables()->of($eq)
        ->addColumn('somete', function ($eq) {
            $html4 = $eq->s44;
            return $html4;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->seg25;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_renovacionseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_renovacionseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['somete', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_renovacionseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_renovacionseg;
            $empresa_id = $request->empresaid_renovacionseg;
            $proyecto_id = $request->proyectoid_renovacionseg;
            $fecha_id = $request->fechaid_renovacionseg;

            $equi = Renovacion_Sometimiento::find($id_eq);
            $equi -> seg22 = $request->seg22;
            $equi -> seg23 = $request->seg23;
            $equi -> seg24 = $request->seg24;
            $equi -> seg25 = $request->seg25;
            $equi -> id_user = $user_id;
            $equi -> save();
            return response("guardado");
        }
    }


    public function edit_renovacionseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_renovacionseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_renovacion;
            $eq = Renovacion_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL ERRATAS
    public function list_erratasseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Erratas_Sometimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('s45')->get();
        
        return datatables()->of($eq)
        ->addColumn('documento', function ($eq) {
            $html4 = $eq->s45;
            return $html4;
        })
        ->addColumn('fecha', function ($eq) {
            $html4 = $eq->seg26;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_erratasseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_erratasseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['documento', 'fecha', 'edit', 'delete'])
        ->make(true);
    }


    public function create_erratasseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_erratasseg;
            $empresa_id = $request->empresaid_erratasseg;
            $proyecto_id = $request->proyectoid_erratasseg;
            $fecha_id = $request->fechaid_erratasseg;

            $equi = Erratas_Sometimiento::find($id_eq);
            $equi -> seg26 = $request->seg26;
            $equi -> seg27 = $request->seg27;
            $equi -> id_user = $user_id;
            $equi -> save();
            return response("guardado");
        }
    }


    public function edit_erratasseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_erratas;
            $eq = Erratas_Sometimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_erratasseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_erratas;
            $eq = Erratas_Sometimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }



    //MODAL INFORME
    public function list_informeseg(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Informe_Seguimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('seg28')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha', function ($eq) {
            $html3 = $eq->seg28;
            return $html3;
        })
        ->addColumn('estado', function ($eq) {
            $html4 = $eq->seg30;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_informeseg('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_informeseg('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'estado', 'edit', 'delete'])
        ->make(true);
    }


    public function create_informeseg(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_informeseg;
            $seg28 = $request->seg28;
            $empresa_id = $request->empresaid_informeseg;
            $proyecto_id = $request->proyectoid_informeseg;

            if($id_eq==""){
                $eq = Informe_Seguimiento::where('seg28', '=', $seg28)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Informe_Seguimiento();
                    $equi -> seg28 = $request->seg28;
                    $equi -> seg29 = $request->seg29;
                    $equi -> seg30 = $request->seg30;
                    $equi -> seg31 = $request->seg31;
                    $equi -> seg32 = $request->seg32;
                    $equi -> seg33 = $request->seg33;
                    $equi -> seg34 = $request->seg34;
                    $equi -> seg35 = $request->seg35;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Informe_Seguimiento::find($id_eq);
                $equi -> seg28 = $request->seg28;
                $equi -> seg29 = $request->seg29;
                $equi -> seg30 = $request->seg30;
                $equi -> seg31 = $request->seg31;
                $equi -> seg32 = $request->seg32;
                $equi -> seg33 = $request->seg33;
                $equi -> seg34 = $request->seg34;
                $equi -> seg35 = $request->seg35;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_informeseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_informe;
            $eq = Informe_Seguimiento::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_informeseg(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_informe;
            $eq = Informe_Seguimiento::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }

    //FIN DE SEGUIMIENTO






    //AUDITORIA
    public function create_auditoria(Request $request)
    {	

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->auditoria_id;

        if($id==""){
            $int = new AuditoriaCE();
        }else{
            $int = AuditoriaCE::find($id);
        }

		//GUARDAR REGISTROS 
        $int->a1 = $request->a1;
        $int->a2 = $request->a2;
        $int->a3 = $request->a3;
        $int->a4 = $request->a4;
        $int->a5 = $request->a5;
        $int->a6 = $request->a6;
        $int->a7 = $request->a7;
        $int->a8 = $request->a8;
        $int->a9 = $request->a9;
        $int->a10 = $request->a10;
        $int->a11 = $request->a11;
        $int->a12 = $request->a12;
        $int->a13 = $request->a13;
        $int->a14 = $request->a14;
        $int->a15 = $request->a15;
        $int->a16 = $request->a16;
        $int->a17 = $request->a17;
        $int->a18 = $request->a18;
        $int->a19 = $request->a19;
        $int->a20 = $request->a20;
        $int->a21 = $request->a21;
        $int->a22 = $request->a22;
        $int->a23 = $request->a23;
        $int->a24 = $request->a24;
        $int->a25 = $request->a25;
        $int->a26 = $request->a26;
        $int->a27 = $request->a27;
        $int->a28 = $request->a28;
        $int->a29 = $request->a29;
        $int->a30 = $request->a30;
        $int->a31 = $request->a31;
        $int->is_active = 1;
        $int->proyecto_id = $request->proyecto_id;
        $int->empresa_id = $request->empresa_id;
        $int->id_user = $id_user;
        $int -> save();

        //SACAR EL ID
        if($id==""){
            $reu = AuditoriaCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $reu->auditoria_id;
        }

    }



    public function list_auditoria(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = AuditoriaCE::where('empresa_id', $empresa_id)
        ->where('proyecto_id', $proyecto_id)->orderBy('a1')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html3 = $eq->a1;
            return $html3;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->a5;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_auditoria('.$eq->auditoria_id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->auditoria_id.'" onclick="delete_auditoria('.$eq->auditoria_id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function edit_auditoria(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_auditoria;
            $eq = AuditoriaCE::where('auditoria_id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_auditoria(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_auditoria;
            $eq = AuditoriaCE::where('auditoria_id', $id_eq)->delete();
            return response("eliminado");
        }
    }

    //FIN DE AUDITORIA






    //CIERRE
    public function create_cierre(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            'c1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id = $request->cierre_id;

        if($id==""){
            $int = new CierreCE();
        }else{
            $int = CierreCE::find($id);
        }

		//GUARDAR REGISTROS 
        $int->c1 = $request->c1;
        $int->c2 = $request->c2;
        $int->c3 = $request->c3;
        $int->c4 = $request->c4;
        $int->c5 = $request->c5;
        $int->c6 = $request->c6;
        $int->c7 = $request->c7;
        $int->c11 = $request->c11;
        $int->c12 = $request->c12;
        $int->c13 = $request->c13;
        $int->is_active = 1;
        $int->proyecto_id = $request->proyecto_id;
        $int->empresa_id = $request->empresa_id;
        $int->id_user = $id_user;
        $int -> save();

        //SACAR EL ID
        if($id==""){
            $ci = CierreCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
            $id = $ci->cierre_id;
        }
        
        return response($id);
    }



    public function guardar_cierre(Request $request)
    {
        //VALIDAR CAMPOS
        $request->validate([
            'c1' => 'required',
        ]);

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->cierre_id;

            //GUARDAR
            if($id==""){
                $int = new CierreCE();
                $int->c1 = $request->c1;
                $int->c2 = $request->c2;
                $int->c3 = $request->c3;
                $int->c4 = $request->c4;
                $int->c5 = $request->c5;
                $int->c6 = $request->c6;
                $int->c7 = $request->c7;
                $int->c11 = $request->c11;
                $int->c12 = $request->c12;
                $int->c13 = $request->c13;
                $int->is_active = 1;
                $int->proyecto_id = $request->proyecto_id;
                $int->empresa_id = $request->empresa_id;
                $int->id_user = $user_id;
                $int -> save();
                //SACAR EL ID
                if($id==""){
                    $ci = CierreCE::where('proyecto_id', '=', $request->proyecto_id)->get()->first();
                    $id = $ci->cierre_id;
                }
            }
            
            return response($id);
        }
    }



    //MODAL DOMICILIO
    public function list_domicilioci(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $eq = Domicilio_Cierre::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('c8')->get();
        
        return datatables()->of($eq)
        ->addColumn('fecha1', function ($eq) {
            $html3 = $eq->c8;
            return $html3;
        })
        ->addColumn('fecha2', function ($eq) {
            $html4 = $eq->c9;
            return $html4;
        })
        ->addColumn('edit', function ($eq) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_domicilioci('.$eq->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($eq) {
            $html6 = '<button type="button" name="delete" id="'.$eq->id.'" onclick="delete_domicilioci('.$eq->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }


    public function create_domicilioci(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_eq = $request->id_domicilioci;
            $c8 = $request->c8;
            $empresa_id = $request->empresaid_domicilioci;
            $proyecto_id = $request->proyectoid_domicilioci;
            $cierre_id = $request->cierreid_domicilioci;

            if($id_eq==""){
                $eq = Domicilio_Cierre::where('c8', '=', $c8)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($eq==""){
                    $equi = new Domicilio_Cierre();
                    $equi -> c8 = $request->c8;
                    $equi -> c9 = $request->c9;
                    $equi -> c10 = $request->c10;
                    $equi -> cierre_id = $cierre_id;
                    $equi -> proyecto_id = $proyecto_id;
                    $equi -> empresa_id = $empresa_id;
                    $equi -> id_user = $user_id;
                    $equi -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $equi = Domicilio_Cierre::find($id_eq);
                $equi -> c8 = $request->c8;
                $equi -> c9 = $request->c9;
                $equi -> c10 = $request->c10;
                $equi -> cierre_id = $cierre_id;
                $equi -> proyecto_id = $proyecto_id;
                $equi -> empresa_id = $empresa_id;
                $equi -> id_user = $user_id;
                $equi -> save();
                return response("guardado");
            }
        }
    }


    public function edit_domicilioci(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_domicilio;
            $eq = Domicilio_Cierre::where('id', '=', $id_eq)
            ->get()->toJson();
            return json_encode($eq);
        }
    }


    public function delete_domicilioci(Request $request)
    {
        if($request->ajax()){
            $id_eq = $request->id_domicilio;
            $eq = Domicilio_Cierre::where('id', $id_eq)->delete();
            return response("eliminado");
        }
    }

    //FIN DE CIERRE

}