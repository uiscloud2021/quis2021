<?php

namespace App\Http\Controllers\Calidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Calidad\Reuniones;
use App\Models\Calidad\Reuniones_Asuntos;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class ReunionesController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:reuniones.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reuniones::all();
		return view('calidad/reuniones.index', compact('reuniones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('calidad/reuniones.create', compact('candidatos', 'empleados'));
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
            $reuniones = new Reuniones();
        }else{
            $reuniones = Reuniones::find($id);
        }

        $array="";
        foreach($request->candidatos as $selected){
            if($selected!=""){
                $array.=$selected."|";
            }
        }

		//GUARDAR REGISTROS
        $reuniones->no1 = $request->no1;
        $reuniones->no2 = $array;
        $reuniones->no8 = $request->no8;
        $reuniones->no9 = $request->no9;
        $reuniones->no11 = $request->no11;
        $reuniones->no12 = $request->no12;
        $reuniones->no13 = $request->no13;
        $reuniones->no14 = $request->no14;
        $reuniones->no15 = $request->no15;
        $reuniones->no16 = $request->no16;
        $reuniones->no17 = $request->no17;
        $reuniones->no18 = $request->no18;
        $reuniones->no19 = $request->no19;
        $reuniones->no20 = $request->no20;
        $reuniones->is_active = 1;
        $reuniones->empresa_id = $request->empresa_id;
        $reuniones->id_user = $id_user;
        $reuniones -> save();

		return redirect()->route('reuniones.edit', $reuniones->id)->with('info', 'La reunión se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reuniones $reuniones)
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
        $reuniones = Reuniones::where('id', '=', $id)->get()->first();
        $asuntos = Reuniones_Asuntos::where('reunion_id', '=', $id)->get();
        $cand = Reclutamiento::where('id', '=', $reuniones->no9)->get()->first();
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('calidad/reuniones.edit', compact('reuniones', 'candidatos', 'empleados', 'asuntos', 'cand'));
        
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

        $array="";
        foreach($request->candidatos as $selected){
            if($selected!=""){
                $array.=$selected."|";
            }
        }

		$reuniones = Reuniones::find($request->id);
        $reuniones->no1 = $request->no1;
        $reuniones->no2 = $array;
        $reuniones->no8 = $request->no8;
        $reuniones->no9 = $request->no9;
        $reuniones->no11 = $request->no11;
        $reuniones->no12 = $request->no12;
        $reuniones->no13 = $request->no13;
        $reuniones->no14 = $request->no14;
        $reuniones->no15 = $request->no15;
        $reuniones->no16 = $request->no16;
        $reuniones->no17 = $request->no17;
        $reuniones->no18 = $request->no18;
        $reuniones->no19 = $request->no19;
        $reuniones->no20 = $request->no20;
        $reuniones->is_active = 1;
        $reuniones->empresa_id = $request->empresa_id;
        $reuniones->id_user = $id_user;
        $reuniones -> save();
		
        return redirect()->route('reuniones.edit', $request->id)->with('info', 'La reunión se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $asuntos = Reuniones_Asuntos::where('reunion_id', $id)->delete();
        $reuniones = Reuniones::where('id', $id)->delete();
        return redirect()->route('reuniones.index')->with('info', 'La reunión se eliminó correctamente');
    }



    public function guardar_reunion(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){

                $array="";
                foreach($request->candidatos as $selected){
                    if($selected!=""){
                        $array.=$selected."|";
                    }
                }
                
                $reuniones = new Reuniones();
                $reuniones->no1 = $request->no1;
                $reuniones->no2 = $array;
                $reuniones->no8 = $request->no8;
                $reuniones->no9 = $request->no9;
                $reuniones->no11 = $request->no11;
                $reuniones->no12 = $request->no12;
                $reuniones->no13 = $request->no13;
                $reuniones->no14 = $request->no14;
                $reuniones->no15 = $request->no15;
                $reuniones->no16 = $request->no16;
                $reuniones->no17 = $request->no17;
                $reuniones->no18 = $request->no18;
                $reuniones->no19 = $request->no19;
                $reuniones->no20 = $request->no20;
                $reuniones->is_active = 1;
                $reuniones->empresa_id = $request->empresa_id;
                $reuniones->id_user = $user_id;
                $reuniones -> save();
                //SACAR EL ID
                $id = $reuniones->id;
            }
            
            return response($id);
        }
    }



    public function list_asunto(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $reunion_id = $request->reunion_id;
        $asunto = Reuniones_Asuntos::where('reunion_id', $reunion_id)
        ->orderBy('no3')->get();
        
        return datatables()->of($asunto)
        ->addColumn('asunto', function ($asunto) {
            $html3 = $asunto->no3;
            return $html3;
        })
        ->addColumn('acuerdo', function ($asunto) {
            $html4 = $asunto->no4;
            return $html4;
        })
        ->addColumn('edit', function ($asunto) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_asunto('.$asunto->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($asunto) {
            $html6 = '<button type="button" name="delete" id="'.$asunto->id.'" onclick="delete_asunto('.$asunto->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['asunto', 'acuerdo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_asunto(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_asunto = $request->id_asunto;
            $no3 = $request->no3;
            $empresa_id = $request->empresaid_asunto;
            $reunion_id = $request->reunionesid_asunto;

            if($id_asunto==""){
                $asunto = Reuniones_Asuntos::where('no3', '=', $no3)
                ->where('reunion_id', '=', $reunion_id)->get()->first();
                //GUARDAR REGISTRO
                if($asunto==""){
                    $cons = new Reuniones_Asuntos();
                    $cons -> no3 = $request->no3;
                    $cons -> no4 = $request->no4;
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> reunion_id = $reunion_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Reuniones_Asuntos::find($id_asunto);
                $cons -> no3 = $request->no3;
                $cons -> no4 = $request->no4;
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> reunion_id = $reunion_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_asunto(Request $request)
    {
        if($request->ajax()){
            $id_asunto = $request->id_asunto;
            $asuntos = Reuniones_Asuntos::where('id', '=', $id_asunto)
            ->get()->toJson();
            return json_encode($asuntos);
        }
    }



    public function delete_asunto(Request $request)
    {
        if($request->ajax()){
            $id_asunto = $request->id_asunto;
            $asunto = Reuniones_Asuntos::where('id', $id_asunto)->delete();
            return response("eliminado");
        }
    }



}