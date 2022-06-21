<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Recuperacion;

// Start of uses

class RecuperacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:recuperacion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('seguridad/recuperacion.index');
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





    public function list_recuperacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $comision = Recuperacion::orderBy('no1')->get();
        
        return datatables()->of($comision)
        ->addColumn('fecha', function ($comision) {
            $html3 = $comision->no1;
            return $html3;
        })
        ->addColumn('area', function ($comision) {
            $html4 = $comision->no2;
            return $html4;
        })
        ->addColumn('edit', function ($comision) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_recuperacion('.$comision->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($comision) {
            $html6 = '<button type="button" name="delete" id="'.$comision->id.'" onclick="delete_recuperacion('.$comision->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'area', 'edit', 'delete'])
        ->make(true);
    }


    public function create_recuperacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_recuperacion = $request->id_recuperacion;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_recuperacion;

            if($id_recuperacion==""){
                $recuperacion = Recuperacion::where('no1', '=', $no1)->get()->first();
                //GUARDAR REGISTRO
                if($recuperacion==""){
                    $cons = new Recuperacion();
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
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $request->no18;
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no30 = $request->no30;
                    $cons -> no31 = $request->no31;
                    $cons -> no32 = $request->no32;
                    $cons -> no33 = $request->no33;
                    $cons -> no34 = $request->no34;
                    $cons -> no35 = $request->no35;
                    $cons -> no36 = $request->no36;
                    $cons -> no37 = $request->no37;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Recuperacion::find($id_recuperacion);
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
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> no17 = $request->no17;
                $cons -> no18 = $request->no18;
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no30 = $request->no30;
                $cons -> no31 = $request->no31;
                $cons -> no32 = $request->no32;
                $cons -> no33 = $request->no33;
                $cons -> no34 = $request->no34;
                $cons -> no35 = $request->no35;
                $cons -> no36 = $request->no36;
                $cons -> no37 = $request->no37;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }


    public function edit_recuperacion(Request $request)
    {
        if($request->ajax()){
            $id_recuperacion = $request->id_recuperacion;
            $recuperacion = Recuperacion::where('id', '=', $id_recuperacion)
            ->get()->toJson();
            return json_encode($recuperacion);
        }
    }


    public function delete_recuperacion(Request $request)
    {
        if($request->ajax()){
            $id_recuperacion = $request->id_recuperacion;
            $recuperacion = Recuperacion::where('id', $id_recuperacion)->delete();
            return response("eliminado");
        }
    }


}