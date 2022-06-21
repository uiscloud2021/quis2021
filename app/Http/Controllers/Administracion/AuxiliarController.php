<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Auxiliar;
use App\Models\Empresas\Cuenta;

// Start of uses

class AuxiliarController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:auxiliar.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auxiliars = Auxiliar::where('empresa_id', '=', session('id_empresa'))->get();
        $cuentas = Cuenta::where('empresa_id', '=', session('id_empresa'))->get();
        return view('adm/auxiliar.index', compact('auxiliars', 'cuentas'));
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
    public function show(Auxiliar $auxiliar)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Auxiliar $auxiliar)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auxiliar $auxiliar)
    {
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auxiliar $auxiliar)
    {
       
    }



    public function list_auxiliar(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $id_cuenta = $request->id_cuenta;
        $auxiliar = Auxiliar::where('empresa_id', $empresa_id)
        ->where('cuenta_id', $id_cuenta)->orderBy('no1')->get();
        
        return datatables()->of($auxiliar)
        ->addColumn('fecha', function ($auxiliar) {
            $html3 = $auxiliar->no1;
            return $html3;
        })
        ->addColumn('tipo', function ($auxiliar) {
            $html4 = $auxiliar->no2;
            return $html4;
        })
        ->addColumn('nombre', function ($auxiliar) {
            $html4 = $auxiliar->no3;
            return $html4;
        })
        ->addColumn('descripcion', function ($auxiliar) {
            $html4 = $auxiliar->no4;
            return $html4;
        })
        ->addColumn('cantidad', function ($auxiliar) {
            $html4 = $auxiliar->no6;
            return $html4;
        })
        ->addColumn('saldo', function ($auxiliar) {
            $saldo=0;
            $tipo=$auxiliar->no2;
            if($tipo == "Saldo inicial"){
                $saldo = $auxiliar->no6;
            }else if($tipo == "Déposito"){
                $saldo = $saldo + $auxiliar->no6;
            }else{
                $saldo = $saldo - $auxiliar->no6;
            }
            return $saldo;
        })
        ->addColumn('edit', function ($auxiliar) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_auxiliar('.$auxiliar->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($auxiliar) {
            $html6 = '<button type="button" name="delete" id="'.$auxiliar->id.'" onclick="delete_auxiliar('.$auxiliar->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'tipo', 'nombre', 'descripcion', 'cantidad', 'saldo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_auxiliar(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_auxiliar = $request->id_auxiliar;
            $no1 = $request->no1;
            $no4 = $request->no4;
            $empresa_id = $request->empresa_id;

            if($id_auxiliar==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $auxiliar = Auxiliar::where('no1', '=', $no1)
                ->where('no4', '=', $no4)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($auxiliar==""){
                    $eq = new Auxiliar();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> cuenta_id = $request->id_cuenta;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Auxiliar::find($id_auxiliar);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> cuenta_id = $request->id_cuenta;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_auxiliar(Request $request)
    {
        if($request->ajax()){
            $id_auxiliar = $request->id_auxiliar;
            $auxiliar = Auxiliar::where('id', '=', $id_auxiliar)
            ->get()->toJson();
            return json_encode($auxiliar);
        }
    }



    public function delete_auxiliar(Request $request)
    {
        if($request->ajax()){
            $id_auxiliar = $request->id_auxiliar;
            $auxiliar = Auxiliar::where('id', $id_auxiliar)->delete();
            return response("eliminado");
        }
    }


}