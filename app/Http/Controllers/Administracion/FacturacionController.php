<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Sometimiento;
use App\Models\Administracion\Facturacion;

// Start of uses

class FacturacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:facturacion.index');//PROTEGE TODAS LAS RUTAS
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
		return view('adm/facturacion.index', compact('proyectos'));
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
        $facturacion = Facturacion::where('proyecto_id', '=', $id)->get()->first();

        if($facturacion==""){
            return view('adm/facturacion.create', compact('proyecto'));
        }else{
            return view('adm/facturacion.edit', compact('proyecto', 'facturacion'));
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
        $facturacion = Facturacion::where('proyecto_id', $id)->delete();
        //$proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
        return redirect()->route('facturacion.index')->with('info', 'La facturación se eliminó correctamente');
    }



    public function list_cobro(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $cobro = Facturacion::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($cobro)
        ->addColumn('monitoreo', function ($cobro) {
            $html3 = $cobro->no1;
            return $html3;
        })
        ->addColumn('total', function ($cobro) {
            $html4 = $cobro->no9;
            return $html4;
        })
        ->addColumn('fecha', function ($cobro) {
            $html4 = $cobro->no11;
            return $html4;
        })
        ->addColumn('calidad', function ($cobro) {
            $html4 = (strtotime($cobro->no11)-strtotime($cobro->no1))/86400;
            return $html4;
        })
        ->addColumn('edit', function ($cobro) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cobro('.$cobro->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($cobro) {
            $html6 = '<button type="button" name="delete" id="'.$cobro->id.'" onclick="delete_cobro('.$cobro->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['monitoreo', 'total', 'fecha', 'calidad', 'edit', 'delete'])
        ->make(true);
    }



    public function create_cobro(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_cobro = $request->id_cobro;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_cobro;
            $proyecto_id = $request->proyectoid_cobro;

            if($id_cobro==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $cobro = Facturacion::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($cobro==""){
                    $eq = new Facturacion();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> no7 = $request->no7;
                    $eq -> no8 = $request->no8;
                    $eq -> no9 = $request->no9;
                    $eq -> no10 = $request->no10;
                    $eq -> no11 = $request->no11;
                    $eq -> no12 = $request->no12;
                    $eq -> no13 = $request->no13;
                    $eq -> no14 = $request->no14;
                    $eq -> no15 = $request->no15;
                    $eq -> no16 = $request->no16;
                    $eq -> proyecto_id = $proyecto_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Facturacion::find($id_cobro);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> no7 = $request->no7;
                $eq -> no8 = $request->no8;
                $eq -> no9 = $request->no9;
                $eq -> no10 = $request->no10;
                $eq -> no11 = $request->no11;
                $eq -> no12 = $request->no12;
                $eq -> no13 = $request->no13;
                $eq -> no14 = $request->no14;
                $eq -> no15 = $request->no15;
                $eq -> no16 = $request->no16;
                $eq -> proyecto_id = $proyecto_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_cobro(Request $request)
    {
        if($request->ajax()){
            $id_cobro = $request->id_cobro;
            $cobro = Facturacion::where('id', '=', $id_cobro)
            ->get()->toJson();
            return json_encode($cobro);
        }
    }



    public function delete_cobro(Request $request)
    {
        if($request->ajax()){
            $id_cobro = $request->id_cobro;
            $cobro = Facturacion::where('id', $id_cobro)->delete();
            return response("eliminado");
        }
    }



}