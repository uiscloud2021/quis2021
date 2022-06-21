<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capacitacion\Intervencion;
use App\Models\Capacitacion\Intervencion_Participante;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class IntervencionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:intervencion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intervencion = Intervencion::all();
		return view('capacitacion/intervencion.index', compact('intervencion'));
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
        return view('capacitacion/intervencion.create', compact('candidatos', 'empleados'));
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
            $intervencion = new Intervencion();
        }else{
            $intervencion = Intervencion::find($id);
        }

        
        $cand="";
        if($request->candidatos != ""){
        foreach($request->candidatos as $candi){
            if($candi!=""){
                $cand.=$candi."|";
            }
        }
        }

        $emp="";
        if($request->empleados != ""){
        foreach($request->empleados as $em){
            if($em!=""){
                $emp.=$em."|";
            }
        }
        }

		//GUARDAR REGISTROS
        $intervencion->no1 = $request->no1;
        $intervencion->no2 = $request->no2;
        $intervencion->no3 = $request->no3;
        $intervencion->no4 = $request->no4;
        $intervencion->no5 = $request->no5;
        $intervencion->no6 = $cand;
        $intervencion->no11 = $request->no11;
        $intervencion->no12 = $emp;
        $intervencion->no13 = $request->no13;
        $intervencion->no14 = $request->no14;
        $intervencion->no15 = $request->no15;
        $intervencion->no16 = $request->no16;
        $intervencion->no17 = $request->no17;
        $intervencion->no18 = $request->no18;
        $intervencion->no19 = $request->no19;
        $intervencion->no20 = $request->no20;
        $intervencion->no21 = $request->no21;
        $intervencion->no22 = $request->no22;
        $intervencion->is_active = 1;
        $intervencion->empresa_id = $request->empresa_id;
        $intervencion->id_user = $id_user;
        $intervencion -> save();
        
        return redirect()->route('intervencion.edit', $intervencion->id)->with('info', 'La asistencia se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Intervencion $intervencion)
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
        $intervencion = Intervencion::where('id', '=', $id)->get()->first();
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('capacitacion/intervencion.edit', compact('intervencion', 'candidatos', 'empleados'));
        
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

        $emp="";
        if($request->empleados != ""){
        foreach($request->empleados as $em){
            if($em!=""){
                $emp.=$em."|";
            }
        }
        }

		$intervencion = Intervencion::find($request->id);
        $intervencion->no1 = $request->no1;
        $intervencion->no2 = $request->no2;
        $intervencion->no3 = $request->no3;
        $intervencion->no4 = $request->no4;
        $intervencion->no5 = $request->no5;
        $intervencion->no6 = $cand;
        $intervencion->no11 = $request->no11;
        $intervencion->no12 = $emp;
        $intervencion->no13 = $request->no13;
        $intervencion->no14 = $request->no14;
        $intervencion->no15 = $request->no15;
        $intervencion->no16 = $request->no16;
        $intervencion->no17 = $request->no17;
        $intervencion->no18 = $request->no18;
        $intervencion->no19 = $request->no19;
        $intervencion->no20 = $request->no20;
        $intervencion->no21 = $request->no21;
        $intervencion->no22 = $request->no22;
        $intervencion->is_active = 1;
        $intervencion->empresa_id = $request->empresa_id;
        $intervencion->id_user = $id_user;
        $intervencion -> save();
		
        return redirect()->route('intervencion.edit', $request->id)->with('info', 'La asistencia se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participante = Intervencion_Participante::where('intervencion_id', $id)->delete();
        $intervencion = Intervencion::where('id', $id)->delete();
        return redirect()->route('intervencion.index')->with('info', 'La asistencia se eliminó correctamente');
    }



    public function guardar_intervencion(Request $request)
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

            $emp="";
            if($request->empleados != ""){
            foreach($request->empleados as $em){
                if($em!=""){
                    $emp.=$em."|";
                }
            }
            }
            
            //GUARDAR
            if($id==""){
                $intervencion = new Intervencion();
                $intervencion->no1 = $request->no1;
                $intervencion->no2 = $request->no2;
                $intervencion->no3 = $request->no3;
                $intervencion->no4 = $request->no4;
                $intervencion->no5 = $request->no5;
                $intervencion->no6 = $cand;
                $intervencion->no11 = $request->no11;
                $intervencion->no12 = $emp;
                $intervencion->no13 = $request->no13;
                $intervencion->no14 = $request->no14;
                $intervencion->no15 = $request->no15;
                $intervencion->no16 = $request->no16;
                $intervencion->no17 = $request->no17;
                $intervencion->no18 = $request->no18;
                $intervencion->no19 = $request->no19;
                $intervencion->no20 = $request->no20;
                $intervencion->no21 = $request->no21;
                $intervencion->no22 = $request->no22;
                $intervencion->is_active = 1;
                $intervencion->empresa_id = $request->empresa_id;
                $intervencion->id_user = $user_id;
                $intervencion -> save();
                //SACAR EL ID
                $id = $intervencion->id;
            }
            
            return response($id);
        }
    }



    public function participante_intervencion(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $intervencion_id = $request->id;
        $part = Intervencion_Participante::where('intervencion_id', $intervencion_id)->count();
        $part++;
        return response($part);
    }



    public function list_participante(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $intervencion_id = $request->intervencion_id;
        $participante = Intervencion_Participante::where('intervencion_id', $intervencion_id)
        ->orderBy('no7')->get();
        
        return datatables()->of($participante)
        ->addColumn('participante', function ($participante) {
            $html3 = $participante->no7;
            if($html3==""){
                $html3 = $participante->otro;
            }
            return $html3;
        })
        ->addColumn('titulo', function ($participante) {
            $html3 = $participante->no8;
            return $html3;
        })
        ->addColumn('edit', function ($participante) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_participante('.$participante->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($participante) {
            $html6 = '<button type="button" name="delete" id="'.$participante->id.'" onclick="delete_participante('.$participante->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['participante', 'titulo', 'edit', 'delete'])
        ->make(true);
    }



    public function create_participante(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_participante = $request->id_participante;
            $no7 = $request->no7;
            $empresa_id = $request->empresaid_participante;
            $intervencion_id = $request->intervencionid_participante;

            if($id_participante==""){
                $participante = Intervencion_Participante::where('no7', '=', $no7)
                ->where('intervencion_id', '=', $intervencion_id)->get()->first();
                //GUARDAR REGISTRO
                if($participante==""){
                    $cons = new Intervencion_Participante();
                    $cons -> no7 = $request->no7;
                    $cons -> otro = $request->otro;
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> intervencion_id = $intervencion_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Intervencion_Participante::find($id_participante);
                $cons -> no7 = $request->no7;
                $cons -> otro = $request->otro;
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> intervencion_id = $intervencion_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_participante(Request $request)
    {
        if($request->ajax()){
            $id_participante = $request->id_participante;
            $participante = Intervencion_Participante::where('id', '=', $id_participante)
            ->get()->toJson();
            return json_encode($participante);
        }
    }



    public function delete_participante(Request $request)
    {
        if($request->ajax()){
            $id_participante = $request->id_participante;
            $participante = Intervencion_Participante::where('id', $id_participante)->delete();
            return response("eliminado");
        }
    }



}