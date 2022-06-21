<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capacitacion\Evaluacion;
use App\Models\Capacitacion\Evaluacion_Elemento;
use App\Models\Capacitacion\Evaluacion_Constancia;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class EvaluacionCapController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:evaluacion_capacitacion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluacion = Evaluacion::all();
		return view('capacitacion/evaluacion_capacitacion.index', compact('evaluacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('capacitacion/evaluacion_capacitacion.create', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $evaluacion = new Evaluacion();
        }else{
            $evaluacion = Evaluacion::find($id);
        }

        
        $cand="";
        if($request->candidatos != ""){
        foreach($request->candidatos as $candi){
            if($candi!=""){
                $cand.=$candi."|";
            }
        }
        }

        $no19= ($request->no15 + $request->no16 + $request->no17 + $request->no18) / 4;

		//GUARDAR REGISTROS
        $evaluacion->no1 = $request->no1;
        $evaluacion->no2 = $cand;
        $evaluacion->no3 = $request->no3;
        $evaluacion->no15 = $request->no15;
        $evaluacion->no16 = $request->no16;
        $evaluacion->no17 = $request->no17;
        $evaluacion->no18 = $request->no18;
        $evaluacion->no19 = $no19;
        $evaluacion->is_active = 1;
        $evaluacion->empresa_id = $request->empresa_id;
        $evaluacion->id_user = $id_user;
        $evaluacion -> save();
        
        return redirect()->route('evaluacion_capacitacion.edit', $evaluacion->id)->with('info', 'La evaluación se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
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
        $evaluacion = Evaluacion::where('id', '=', $id)->get()->first();
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('capacitacion/evaluacion_capacitacion.edit', compact('evaluacion', 'empleados'));
        
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
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

        $cand="";
        if($request->candidatos != ""){
        foreach($request->candidatos as $candi){
            if($candi!=""){
                $cand.=$candi."|";
            }
        }
        }

        $no19= ($request->no15 + $request->no16 + $request->no17 + $request->no18) / 4;

		$evaluacion = Evaluacion::find($request->id);
        $evaluacion->no1 = $request->no1;
        $evaluacion->no2 = $cand;
        $evaluacion->no3 = $request->no3;
        $evaluacion->no15 = $request->no15;
        $evaluacion->no16 = $request->no16;
        $evaluacion->no17 = $request->no17;
        $evaluacion->no18 = $request->no18;
        $evaluacion->no19 = $no19;
        $evaluacion->is_active = 1;
        $evaluacion->empresa_id = $request->empresa_id;
        $evaluacion->id_user = $id_user;
        $evaluacion -> save();
		
        return redirect()->route('evaluacion_capacitacion.edit', $request->id)->with('info', 'La evaluación se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elemento = Evaluacion_Elemento::where('evaluacion_id', $id)->delete();
        $constancia = Evaluacion_Constancia::where('evaluacion_id', $id)->delete();
        $evaluacion = Evaluacion::where('id', $id)->delete();
        return redirect()->route('evaluacion_capacitacion.index')->with('info', 'La evaluación se eliminó correctamente');
    }



    public function guardar_evaluacion_cap(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;

            $cand="";
            if($request->candidatos != ""){
            foreach($request->candidatos as $candi){
                if($candi!=""){
                    $cand.=$candi."|";
                }
            }
            }

            $no19= ($request->no15 + $request->no16 + $request->no17 + $request->no18) / 4;
            
            //GUARDAR
            if($id==""){
                $evaluacion = new Evaluacion();
                $evaluacion->no1 = $request->no1;
                $evaluacion->no2 = $cand;
                $evaluacion->no3 = $request->no3;
                $evaluacion->no15 = $request->no15;
                $evaluacion->no16 = $request->no16;
                $evaluacion->no17 = $request->no17;
                $evaluacion->no18 = $request->no18;
                $evaluacion->no19 = $no19;
                $evaluacion->is_active = 1;
                $evaluacion->empresa_id = $request->empresa_id;
                $evaluacion->id_user = $user_id;
                $evaluacion -> save();
                //SACAR EL ID
                $id = $evaluacion->id;
            }
            
            return response($id);
        }
    }


    public function numero_constancia(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $evaluacion_id = $request->id;
        $part = Evaluacion_Constancia::where('evaluacion_id', $evaluacion_id)->count();
        $part++;
        return response($part);
    }



    public function list_elemento(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $evaluacion_id = $request->evaluacion_id;
        $elemento = Evaluacion_Elemento::where('evaluacion_id', $evaluacion_id)
        ->orderBy('no4')->get();
        
        return datatables()->of($elemento)
        ->addColumn('elemento', function ($elemento) {
            $html3 = $elemento->no4;
            return $html3;
        })
        ->addColumn('cumplimiento', function ($elemento) {
            $html3 = $elemento->no5;
            return $html3;
        })
        ->addColumn('edit', function ($elemento) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_elemento('.$elemento->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($elemento) {
            $html6 = '<button type="button" name="delete" id="'.$elemento->id.'" onclick="delete_elemento('.$elemento->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['elemento', 'cumplimiento', 'edit', 'delete'])
        ->make(true);
    }



    public function create_elemento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_elemento = $request->id_elemento;
            $no4 = $request->no4;
            $empresa_id = $request->empresaid_elemento;
            $evaluacion_id = $request->evaluacionid_elemento;

            if($id_elemento==""){
                $elemento = Evaluacion_Elemento::where('no4', '=', $no4)
                ->where('evaluacion_id', '=', $evaluacion_id)->get()->first();
                //GUARDAR REGISTRO
                if($elemento==""){
                    $cons = new Evaluacion_Elemento();
                    $cons -> no4 = $request->no4;
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> evaluacion_id = $evaluacion_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Evaluacion_Elemento::find($id_elemento);
                $cons -> no7 = $request->no4;
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> evaluacion_id = $evaluacion_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_elemento(Request $request)
    {
        if($request->ajax()){
            $id_elemento = $request->id_elemento;
            $elemento = Evaluacion_Elemento::where('id', '=', $id_elemento)
            ->get()->toJson();
            return json_encode($elemento);
        }
    }



    public function delete_elemento(Request $request)
    {
        if($request->ajax()){
            $id_elemento = $request->id_elemento;
            $elemento = Evaluacion_Elemento::where('id', $id_elemento)->delete();
            return response("eliminado");
        }
    }






    public function list_constancia(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $evaluacion_id = $request->evaluacion_id;
        $constancia = Evaluacion_Constancia::where('evaluacion_id', $evaluacion_id)
        ->orderBy('no9')->get();
        
        return datatables()->of($constancia)
        ->addColumn('participante', function ($constancia) {
            $html3 = $constancia->no9;
            return $html3;
        })
        ->addColumn('titulo', function ($constancia) {
            $html3 = $constancia->no8;
            return $html3;
        })
        ->addColumn('edit', function ($constancia) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_constancia('.$constancia->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($constancia) {
            $html6 = '<button type="button" name="delete" id="'.$constancia->id.'" onclick="delete_constancia('.$constancia->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['participante', 'titulo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_constancia(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_constancia = $request->id_constancia;
            $no9 = $request->no9;
            $empresa_id = $request->empresaid_constancia;
            $evaluacion_id = $request->evaluacionid_constancia;

            if($id_constancia==""){
                $constancia = Evaluacion_Constancia::where('no9', '=', $no9)
                ->where('evaluacion_id', '=', $evaluacion_id)->get()->first();
                //GUARDAR REGISTRO
                if($constancia==""){
                    $cons = new Evaluacion_Constancia();
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> no11 = $request->no11;
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> evaluacion_id = $evaluacion_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Evaluacion_Constancia::find($id_constancia);
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> no11 = $request->no11;
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> evaluacion_id = $evaluacion_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_constancia(Request $request)
    {
        if($request->ajax()){
            $id_constancia = $request->id_constancia;
            $constancia = Evaluacion_Constancia::where('id', '=', $id_constancia)
            ->get()->toJson();
            return json_encode($constancia);
        }
    }



    public function delete_constancia(Request $request)
    {
        if($request->ajax()){
            $id_constancia = $request->id_constancia;
            $constancia = Evaluacion_Constancia::where('id', $id_constancia)->delete();
            return response("eliminado");
        }
    }



}