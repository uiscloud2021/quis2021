<?php

namespace App\Http\Controllers\Rexbiot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rexbiot\Potrero;
use App\Models\Rexbiot\Pastoreo;

// Start of uses

class PastoreoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:pastoreo.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potreros = Potrero::where('empresa_id', '=', session('id_empresa'))
        ->pluck('no2', 'id');
        return view('rexbiot/pastoreo.index', compact('potreros'));
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



    public function list_pastoreo(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $pastoreo = Pastoreo::where('empresa_id', $empresa_id)
        ->orderBy('no1')->get();
        
        return datatables()->of($pastoreo)
        ->addColumn('potrero', function ($pastoreo) {
            $html3 = $pastoreo->no1;
            $potrero = Potrero::where('id', '=', $html3)
            ->first();
            $nomb=$potrero->no2;
            return $nomb;
        })
        ->addColumn('entrada', function ($pastoreo) {
            $html7 = $pastoreo->no2;
            return $html7;
        })
        ->addColumn('UA', function ($pastoreo) {
            $html8 = $pastoreo->no4;
            return $html8;
        })
        ->addColumn('inicial', function ($pastoreo) {
            $html9 = $pastoreo->no3;
            return $html9;
        })
        ->addColumn('final', function ($pastoreo) {
            $html4 = $pastoreo->no7;
            return $html4;
        })
        ->addColumn('edit', function ($pastoreo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_pastoreo('.$pastoreo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($pastoreo) {
            $html6 = '<button type="button" name="delete" id="'.$pastoreo->id.'" onclick="delete_pastoreo('.$pastoreo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['potrero', 'entrada', 'UA', 'inicial', 'final', 'edit', 'delete'])
        ->make(true);
    }



    public function create_pastoreo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_pastoreo = $request->id_pastoreo;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_pastoreo;

            if($id_pastoreo==""){
                $pastoreo = Pastoreo::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->get()->first();
                //GUARDAR REGISTRO
                if($pastoreo==""){
                    $cons = new Pastoreo();
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
                $cons = Pastoreo::find($id_pastoreo);
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



    public function edit_pastoreo(Request $request)
    {
        if($request->ajax()){
            $id_pastoreo = $request->id_pastoreo;
            $pastoreo = Pastoreo::where('id', '=', $id_pastoreo)
            ->get()->toJson();
            return json_encode($pastoreo);
        }
    }



    public function delete_pastoreo(Request $request)
    {
        if($request->ajax()){
            $id_pastoreo = $request->id_pastoreo;
            $pastoreo = Pastoreo::where('id', $id_pastoreo)->delete();
            return response("eliminado");
        }
    }


}