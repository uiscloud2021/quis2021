<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capacitacion\Plan;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class PlanController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:plan.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = Plan::all();
		return view('capacitacion/plan.index', compact('plan'));
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
        return view('capacitacion/plan.create', compact('candidatos', 'empleados'));
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

        $suma = ($request->no6 * 100) / $request->no4;

        $array="";
        foreach($request->candidatos as $selected){
            if($selected!=""){
                $array.=$selected."|";
            }
        }
		
		//GUARDAR REGISTROS
        $plan = new Plan();
        $plan->no1 = $request->no1;
        $plan->no2 = $request->no2;
        $plan->no3 = $request->no3;
        $plan->no4 = $request->no4;
        $plan->no5 = $request->no5;
        $plan->no6 = $request->no6;
        $plan->no7 = $array;
        $plan->no8 = $suma;
        $plan->empresa_id = $request->empresa_id;
        $plan->id_user = $id_user;
        $plan -> save();

		return redirect()->route('plan.edit', $plan->id)->with('info', 'El plan de capacitación se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
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
        $plan = Plan::where('id', '=', $id)->get()->first();
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('no94', '=', 'Si')->get();
        return view('capacitacion/plan.edit', compact('candidatos', 'plan', 'empleados'));
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

        $suma = ($request->no6 * 100) / $request->no4;

        $array="";
        foreach($request->candidatos as $selected){
            if($selected!=""){
                $array.=$selected."|";
            }
        }

		$plan = Plan::find($request->id);
	    $plan->no1 = $request->no1;
        $plan->no2 = $request->no2;
        $plan->no3 = $request->no3;
        $plan->no4 = $request->no4;
        $plan->no5 = $request->no5;
        $plan->no6 = $request->no6;
        $plan->no7 = $array;
        $plan->no8 = $suma;
        $plan->empresa_id = $request->empresa_id;
        $plan->id_user = $id_user;
        $plan -> save();
		
        return redirect()->route('plan.edit', $request->id)->with('info', 'El plan de capacitación se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::where('id', $id)->delete();
        return redirect()->route('plan.index')->with('info', 'El plan de capacitación se eliminó correctamente');
    }


}