<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Atencion;

// Start of uses

class AtencionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:atencion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('seguridad/atencion.index');
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





    public function list_atencion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Atencion::orderBy('no1')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no1;
            return $html3;
        })
        ->addColumn('evento', function ($comision) {
            $html4 = $comision->no2;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_atencion('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_atencion('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'evento', 'edit', 'delete'])
        ->make(true);
    }


    public function create_atencion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_atencion = $request->id_atencion;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_atencion;

            if($id_atencion==""){
                $atencion = Atencion::where('no1', '=', $no1)->get()->first();
                //GUARDAR REGISTRO
                if($atencion==""){
                    $cons = new Atencion();
                    $cons -> no1 = $request->no1;
                    $cons -> no2 = $request->no2;
                    $cons -> no3 = $request->no3;
                    $cons -> no4 = $request->no4;
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> no11 = $request->no11;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Atencion::find($id_atencion);
                $cons -> no1 = $request->no1;
                $cons -> no2 = $request->no2;
                $cons -> no3 = $request->no3;
                $cons -> no4 = $request->no4;
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> no11 = $request->no11;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_atencion(Request $request)
    {
        if($request->ajax()){
            $id_atencion = $request->id_atencion;
            $atencion = Atencion::where('id', '=', $id_atencion)
            ->get()->toJson();
            return json_encode($atencion);
        }
    }


    public function delete_atencion(Request $request)
    {
        if($request->ajax()){
            $id_atencion = $request->id_atencion;
            $atencion = Atencion::where('id', $id_atencion)->delete();
            return response("eliminado");
        }
    }


}