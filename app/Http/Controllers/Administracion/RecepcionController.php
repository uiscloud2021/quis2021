<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Rec_Mensajes;
use App\Models\Administracion\Rec_Paqueteria;
use App\Models\Administracion\Rec_Caja;
use App\Models\Administracion\Rec_Proveedores;
use App\Models\Administracion\Rec_Facturacion;

// Start of uses

class RecepcionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:recepcion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm/recepcion.index');
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
    public function show(Carpeta $carpeta)
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



    public function list_mensaje(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $mensaje = Rec_Mensajes::where('empresa_id', $empresa_id)
        ->orderBy('no1')->get();
        
        return datatables()->of($mensaje)
        ->addColumn('fecha', function ($mensaje) {
            $html3 = $mensaje->no1;
            return $html3;
        })
        ->addColumn('destinatario', function ($mensaje) {
            $html4 = $mensaje->no2;
            return $html4;
        })
        ->addColumn('remitente', function ($mensaje) {
            $html4 = $mensaje->no3;
            return $html4;
        })
        ->addColumn('edit', function ($mensaje) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_mensaje('.$mensaje->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($mensaje) {
            $html6 = '<button type="button" name="delete" id="'.$mensaje->id.'" onclick="delete_mensaje('.$mensaje->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'destinatario', 'remitente', 'edit', 'delete'])
        ->make(true);
    }



    public function create_mensaje(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_mensaje = $request->id_mensaje;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_mensaje;

            if($id_mensaje==""){
                $mensaje = Rec_Mensajes::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($mensaje==""){
                    $cons = new Rec_Mensajes();
                    $cons -> no1 = $request->no1;
                    $cons -> no2 = $request->no2;
                    $cons -> no3 = $request->no3;
                    $cons -> no4 = $request->no4;
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Rec_Mensajes::find($id_mensaje);
                $cons -> no1 = $request->no1;
                $cons -> no2 = $request->no2;
                $cons -> no3 = $request->no3;
                $cons -> no4 = $request->no4;
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_mensaje(Request $request)
    {
        if($request->ajax()){
            $id_mensaje = $request->id_mensaje;
            $mensaje = Rec_Mensajes::where('id', '=', $id_mensaje)
            ->get()->toJson();
            return json_encode($mensaje);
        }
    }



    public function delete_mensaje(Request $request)
    {
        if($request->ajax()){
            $id_mensaje = $request->id_mensaje;
            $mensaje = Rec_Mensajes::where('id', $id_mensaje)->delete();
            return response("eliminado");
        }
    }






    public function list_paqueteria(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $paqueteria = Rec_Paqueteria::where('empresa_id', $empresa_id)->orderBy('no8')->get();
        
        return datatables()->of($paqueteria)
        ->addColumn('salida', function ($paqueteria) {
            $html3 = $paqueteria->no8;
            return $html3;
        })
        ->addColumn('nombre', function ($paqueteria) {
            $html2 = $paqueteria->no9;
            return $html2;
        })
        ->addColumn('entrega', function ($paqueteria) {
            $html1 = $paqueteria->no14;
            return $html1;
        })
        ->addColumn('edit', function ($paqueteria) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_paqueteria('.$paqueteria->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($paqueteria) {
            $html6 = '<button type="button" name="delete" id="'.$paqueteria->id.'" onclick="delete_paqueteria('.$paqueteria->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha_revision', 'edit', 'delete'])
        ->make(true);
    }



    public function create_paqueteria(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_paqueteria = $request->id_paqueteria;
            $no8 = $request->no8;
            $empresa_id = $request->empresaid_paqueteria;

            if($id_paqueteria==""){
                $paqueteria = Rec_Paqueteria::where('no8', '=', $no8)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($paqueteria==""){
                    $cons = new Rec_Paqueteria();
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> no11 = $request->no11;
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Rec_Paqueteria::find($id_paqueteria);
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> no11 = $request->no11;
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_paqueteria(Request $request)
    {
        if($request->ajax()){
            $id_paqueteria = $request->id_paqueteria;
            $paqueteria = Rec_Paqueteria::where('id', '=', $id_paqueteria)
            ->get()->toJson();
            return json_encode($paqueteria);
        }
    }



    public function delete_paqueteria(Request $request)
    {
        if($request->ajax()){
            $id_paqueteria = $request->id_paqueteria;
            $paqueteria = Rec_Paqueteria::where('id', $id_paqueteria)->delete();
            return response("eliminado");
        }
    }






    public function list_caja(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $caja = Rec_Caja::where('empresa_id', $empresa_id)->orderBy('no15')->get();
        
        return datatables()->of($caja)
        ->addColumn('fecha', function ($caja) {
            $html3 = $caja->no15;
            return $html3;
        })
        ->addColumn('tipo', function ($caja) {
            $html3 = $caja->no16;
            return $html3;
        })
        ->addColumn('concepto', function ($caja) {
            $html3 = $caja->no17;
            return $html3;
        })
        ->addColumn('edit', function ($caja) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_caja('.$caja->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($caja) {
            $html6 = '<button type="button" name="delete" id="'.$caja->id.'" onclick="delete_caja('.$caja->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'tipo', 'concepto', 'edit', 'delete'])
        ->make(true);
    }



    public function create_caja(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_caja = $request->id_caja;
            $no15 = $request->no15;
            $empresa_id = $request->empresaid_caja;

            if($id_caja==""){
                $caja = Rec_Caja::where('no15', '=', $no15)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($caja==""){
                    $cons = new Rec_Caja();
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $request->no18;
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Rec_Caja::find($id_caja);
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> no17 = $request->no17;
                $cons -> no18 = $request->no18;
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_caja(Request $request)
    {
        if($request->ajax()){
            $id_caja = $request->id_caja;
            $caja = Rec_Caja::where('id', '=', $id_caja)
            ->get()->toJson();
            return json_encode($caja);
        }
    }



    public function delete_caja(Request $request)
    {
        if($request->ajax()){
            $id_caja = $request->id_caja;
            $caja = Rec_Caja::where('id', $id_caja)->delete();
            return response("eliminado");
        }
    }






    public function list_proveedor(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proveedor = Rec_Proveedores::where('empresa_id', $empresa_id)->orderBy('no21')->get();
        
        return datatables()->of($proveedor)
        ->addColumn('nombre', function ($proveedor) {
            $html3 = $proveedor->no21;
            return $html3;
        })
        ->addColumn('telefono', function ($proveedor) {
            $html3 = $proveedor->no22;
            return $html3;
        })
        ->addColumn('edit', function ($proveedor) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_proveedor('.$proveedor->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($proveedor) {
            $html6 = '<button type="button" name="delete" id="'.$proveedor->id.'" onclick="delete_proveedor('.$proveedor->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'telefono', 'edit', 'delete'])
        ->make(true);
    }



    public function create_proveedor(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_proveedor = $request->id_proveedor;
            $no21 = $request->no21;
            $empresa_id = $request->empresaid_proveedor;

            if($id_proveedor==""){
                $proveedor = Rec_Proveedores::where('no21', '=', $no21)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($proveedor==""){
                    $cons = new Rec_Proveedores();
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Rec_Proveedores::find($id_proveedor);
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_proveedor(Request $request)
    {
        if($request->ajax()){
            $id_proveedor = $request->id_proveedor;
            $proveedor = Rec_Proveedores::where('id', '=', $id_proveedor)
            ->get()->toJson();
            return json_encode($proveedor);
        }
    }



    public function delete_proveedor(Request $request)
    {
        if($request->ajax()){
            $id_proveedor = $request->id_proveedor;
            $proveedor = Rec_Proveedores::where('id', $id_proveedor)->delete();
            return response("eliminado");
        }
    }






    public function list_facturacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $facturacion = Rec_Facturacion::where('empresa_id', $empresa_id)->orderBy('no27')->get();
        
        return datatables()->of($facturacion)
        ->addColumn('nombre', function ($facturacion) {
            $html3 = $facturacion->no27;
            return $html3;
        })
        ->addColumn('rfc', function ($facturacion) {
            $html3 = $facturacion->no28;
            return $html3;
        })
        ->addColumn('edit', function ($facturacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_facturacion('.$facturacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($facturacion) {
            $html6 = '<button type="button" name="delete" id="'.$facturacion->id.'" onclick="delete_facturacion('.$facturacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'rfc', 'edit', 'delete'])
        ->make(true);
    }



    public function create_facturacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_facturacion = $request->id_facturacion;
            $no27 = $request->no27;
            $empresa_id = $request->empresaid_facturacion;

            if($id_facturacion==""){
                $facturacion = Rec_Facturacion::where('no27', '=', $no27)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($facturacion==""){
                    $cons = new Rec_Facturacion();
                    $cons -> no27 = $request->no27;
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no30 = $request->no30;
                    $cons -> no31 = $request->no31;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Rec_Facturacion::find($id_facturacion);
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no30 = $request->no30;
                $cons -> no31 = $request->no31;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_facturacion(Request $request)
    {
        if($request->ajax()){
            $id_facturacion = $request->id_facturacion;
            $facturacion = Rec_Facturacion::where('id', '=', $id_facturacion)
            ->get()->toJson();
            return json_encode($facturacion);
        }
    }



    public function delete_facturacion(Request $request)
    {
        if($request->ajax()){
            $id_facturacion = $request->id_facturacion;
            $facturacion = Rec_Facturacion::where('id', $id_facturacion)->delete();
            return response("eliminado");
        }
    }


}