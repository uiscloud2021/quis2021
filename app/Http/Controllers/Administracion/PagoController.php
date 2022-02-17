<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Pago;
use App\Models\Administracion\Pago_Realizado;
use App\Models\Administracion\Preparacion;
use App\Models\Administracion\Prep_Estudio;
use App\Models\Administracion\Prep_Proveedor;
use App\Models\Administracion\Facturacion;
use App\Models\Empresas\Cuenta;

// Start of uses

class PagoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:pago.index');//PROTEGE TODAS LAS RUTAS
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
		return view('adm/pago.index', compact('proyectos'));
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
        $pago = Pago::where('proyecto_id', '=', $id)->get()->first();
        $estudios = Prep_Estudio::where('proyecto_id', '=', $id)->get();
        $facturas = Facturacion::where('proyecto_id', '=', $id)->get();
        $proveedores = Prep_Proveedor::where('proyecto_id', '=', $id)->get();
        $id_empresa=$proyecto->empresa_id;
        $cuentas = Cuenta::where('empresa_id', '=', $id_empresa)->get();

        if($pago==""){
            return view('adm/pago.create', compact('proyecto', 'estudios', 'facturas', 'cuentas', 'proveedores'));
        }else{
            return view('adm/pago.edit', compact('proyecto', 'estudios', 'facturas', 'cuentas', 'proveedores', 'pago'));
        }
        
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
        $pago = Pago::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::all();
        return redirect()->route('pago.index')->with('info', 'Los pagos se eliminaron correctamente');
    }



    public function list_recibido(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $recibido = Pago::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($recibido)
        ->addColumn('factura', function ($recibido) {
            $html3 = $recibido->no1;
            return $html3;
        })
        ->addColumn('fecha', function ($recibido) {
            $html4 = $recibido->no2;
            return $html4;
        })
        ->addColumn('cantidad', function ($recibido) {
            $html4 = $recibido->no3;
            return $html4;
        })
        ->addColumn('edit', function ($recibido) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_recibido('.$recibido->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($recibido) {
            $html6 = '<button type="button" name="delete" id="'.$recibido->id.'" onclick="delete_recibido('.$recibido->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['factura', 'fecha', 'cantidad', 'edit', 'delete'])
        ->make(true);
    }



    public function create_recibido(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_recibido = $request->id_recibido;
            $no2 = $request->no2;
            $empresa_id = $request->empresaid_recibido;
            $proyecto_id = $request->proyectoid_recibido;

            if($id_recibido==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $recibido = Pago::where('no2', '=', $no2)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($recibido==""){
                    $eq = new Pago();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Pago::find($id_recibido);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_recibido(Request $request)
    {
        if($request->ajax()){
            $id_recibido = $request->id_recibido;
            $recibido = Pago::where('id', '=', $id_recibido)
            ->get()->toJson();
            return json_encode($recibido);
        }
    }



    public function delete_recibido(Request $request)
    {
        if($request->ajax()){
            $id_recibido = $request->id_recibido;
            $recibido = Pago::where('id', $id_recibido)->delete();
            return response("eliminado");
        }
    }





    public function list_realizado(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $realizado = Pago_Realizado::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no5')->get();
        
        return datatables()->of($realizado)
        ->addColumn('fecha', function ($realizado) {
            $html3 = $realizado->no10;
            return $html3;
        })
        ->addColumn('cantidad', function ($realizado) {
            $html4 = $realizado->no13;
            return $html4;
        })
        ->addColumn('diferimiento', function ($realizado) {
            $html4 = $realizado->no11;
            return $html4;
        })
        ->addColumn('edit', function ($realizado) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_realizado('.$realizado->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($realizado) {
            $html6 = '<button type="button" name="delete" id="'.$realizado->id.'" onclick="delete_realizado('.$realizado->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'cantidad', 'diferimiento', 'edit', 'delete'])
        ->make(true);
    }



    public function create_realizado(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_realizado = $request->id_realizado;
            $no6 = $request->no6;
            $no10 = $request->no10;
            $empresa_id = $request->empresaid_realizado;
            $proyecto_id = $request->proyectoid_realizado;

            if($id_realizado==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $realizado = Pago_Realizado::where('no6', '=', $no6)
                ->where('no10', '=', $no10)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($realizado==""){
                    $eq = new Pago_Realizado();
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> no7 = $request->no7;
                    $eq -> no8 = $request->no8;
                    $eq -> no9 = $request->no9;
                    $eq -> no10 = $request->no10;
                    $eq -> no11 = $request->no11;
                    $eq -> no12 = $request->no12;
                    $eq -> no13 = $request->no13;
                    $eq -> concepto1 = $request->concepto1;
                    $eq -> concepto2 = $request->concepto2;
                    $eq -> concepto3 = $request->concepto3;
                    $eq -> concepto4 = $request->concepto4;
                    $eq -> concepto5 = $request->concepto5;
                    $eq -> concepto6 = $request->concepto6;
                    $eq -> concepto7 = $request->concepto7;
                    $eq -> concepto8 = $request->concepto8;
                    $eq -> concepto9 = $request->concepto9;
                    $eq -> concepto10 = $request->concepto10;
                    $eq -> concepto11 = $request->concepto11;
                    $eq -> concepto12 = $request->concepto12;
                    $eq -> concepto13 = $request->concepto13;
                    $eq -> concepto14 = $request->concepto14;
                    $eq -> concepto15 = $request->concepto15;
                    $eq -> concepto16 = $request->concepto16;
                    $eq -> concepto17 = $request->concepto17;
                    $eq -> concepto18 = $request->concepto18;
                    $eq -> concepto19 = $request->concepto19;
                    $eq -> concepto20 = $request->concepto20;
                    $eq -> concepto21 = $request->concepto21;
                    $eq -> concepto22 = $request->concepto22;
                    $eq -> concepto23 = $request->concepto23;
                    $eq -> concepto24 = $request->concepto24;
                    $eq -> concepto25 = $request->concepto25;
                    $eq -> concepto26 = $request->concepto26;
                    $eq -> concepto27 = $request->concepto27;
                    $eq -> concepto28 = $request->concepto28;
                    $eq -> concepto29 = $request->concepto29;
                    $eq -> concepto30 = $request->concepto30;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Pago_Realizado::find($id_realizado);
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> no7 = $request->no7;
                $eq -> no8 = $request->no8;
                $eq -> no9 = $request->no9;
                $eq -> no10 = $request->no10;
                $eq -> no11 = $request->no11;
                $eq -> no12 = $request->no12;
                $eq -> no13 = $request->no13;
                $eq -> concepto1 = $request->concepto1;
                $eq -> concepto2 = $request->concepto2;
                $eq -> concepto3 = $request->concepto3;
                $eq -> concepto4 = $request->concepto4;
                $eq -> concepto5 = $request->concepto5;
                $eq -> concepto6 = $request->concepto6;
                $eq -> concepto7 = $request->concepto7;
                $eq -> concepto8 = $request->concepto8;
                $eq -> concepto9 = $request->concepto9;
                $eq -> concepto10 = $request->concepto10;
                $eq -> concepto11 = $request->concepto11;
                $eq -> concepto12 = $request->concepto12;
                $eq -> concepto13 = $request->concepto13;
                $eq -> concepto14 = $request->concepto14;
                $eq -> concepto15 = $request->concepto15;
                $eq -> concepto16 = $request->concepto16;
                $eq -> concepto17 = $request->concepto17;
                $eq -> concepto18 = $request->concepto18;
                $eq -> concepto19 = $request->concepto19;
                $eq -> concepto20 = $request->concepto20;
                $eq -> concepto21 = $request->concepto21;
                $eq -> concepto22 = $request->concepto22;
                $eq -> concepto23 = $request->concepto23;
                $eq -> concepto24 = $request->concepto24;
                $eq -> concepto25 = $request->concepto25;
                $eq -> concepto26 = $request->concepto26;
                $eq -> concepto27 = $request->concepto27;
                $eq -> concepto28 = $request->concepto28;
                $eq -> concepto29 = $request->concepto29;
                $eq -> concepto30 = $request->concepto30;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_realizado(Request $request)
    {
        if($request->ajax()){
            $id_realizado = $request->id_realizado;
            $realizado = Pago_Realizado::where('id', '=', $id_realizado)
            ->get()->toJson();
            return json_encode($realizado);
        }
    }



    public function delete_realizado(Request $request)
    {
        if($request->ajax()){
            $id_realizado = $request->id_realizado;
            $realizado = Pago_Realizado::where('id', $id_realizado)->delete();
            return response("eliminado");
        }
    }





    public function cargar_precio(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $servicio = $request->servicio;
        $id_proveedor = $request->id_proveedor;

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



    public function cargar_factura(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $id_factura = $request->id_factura;

        $cons = Facturacion::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)
        ->where('id', $id_factura)->get()->first();

        $cantidad=$cons->no9;
        
        return response($cantidad);
    }



}