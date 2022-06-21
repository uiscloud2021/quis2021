<?php

namespace App\Http\Controllers\Rexbiot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rexbiot\Potrero;
use App\Models\Rexbiot\Periodo;

// Start of uses

class PotreroController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:potreros.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rexbiot/potreros.index');
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
    public function show(Potrero $potrero)
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



    public function list_periodo(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $periodo = Periodo::where('empresa_id', $empresa_id)
        ->orderBy('no1')->get();
        
        return datatables()->of($periodo)
        ->addColumn('fecha', function ($periodo) {
            $html3 = $periodo->no1;
            return $html3;
        })
        ->addColumn('edit', function ($periodo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_periodo('.$periodo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($periodo) {
            $html6 = '<button type="button" name="delete" id="'.$periodo->id.'" onclick="delete_periodo('.$periodo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_periodo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_periodo = $request->id_periodo;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_periodo;

            if($id_periodo==""){
                $periodo = Periodo::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($periodo==""){
                    $cons = new Periodo();
                    $cons -> no1 = $request->no1;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Periodo::find($id_periodo);
                $cons -> no1 = $request->no1;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_periodo(Request $request)
    {
        if($request->ajax()){
            $id_periodo = $request->id_periodo;
            $periodo = Periodo::where('id', '=', $id_periodo)
            ->get()->toJson();
            return json_encode($periodo);
        }
    }



    public function delete_periodo(Request $request)
    {
        if($request->ajax()){
            $id_periodo = $request->id_periodo;
            $periodo = Periodo::where('id', $id_periodo)->delete();
            return response("eliminado");
        }
    }






    public function list_potrero(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $potrero = Potrero::where('empresa_id', $empresa_id)->orderBy('no2')->get();
        
        return datatables()->of($potrero)
        ->addColumn('nombre', function ($potrero) {
            $html3 = $potrero->no2;
            return $html3;
        })
        ->addColumn('extension', function ($potrero) {
            $html2 = $potrero->no3;
            return $html2;
        })
        ->addColumn('edit', function ($potrero) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_potrero('.$potrero->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($potrero) {
            $html6 = '<button type="button" name="delete" id="'.$potrero->id.'" onclick="delete_potrero('.$potrero->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'extension', 'edit', 'delete'])
        ->make(true);
    }



    public function create_potrero(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_potrero = $request->id_potrero;
            $no2 = $request->no2;
            $empresa_id = $request->empresaid_potrero;

            if($id_potrero==""){
                $potrero = Potrero::where('no2', '=', $no2)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($potrero==""){
                    $cons = new Potrero();
                    $cons -> no2 = $request->no2;
                    $cons -> no3 = $request->no3;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Potrero::find($id_potrero);
                $cons -> no2 = $request->no2;
                $cons -> no3 = $request->no3;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_potrero(Request $request)
    {
        if($request->ajax()){
            $id_potrero = $request->id_potrero;
            $potrero = Potrero::where('id', '=', $id_potrero)
            ->get()->toJson();
            return json_encode($potrero);
        }
    }



    public function delete_potrero(Request $request)
    {
        if($request->ajax()){
            $id_potrero = $request->id_potrero;
            $potrero = Potrero::where('id', $id_potrero)->delete();
            return response("eliminado");
        }
    }


}