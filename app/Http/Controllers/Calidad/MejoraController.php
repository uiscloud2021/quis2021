<?php

namespace App\Http\Controllers\Calidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Calidad\Mejora;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class MejoraController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:mejora.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mejora = Mejora::where('empresa_id', '=', session('id_empresa'))->get();
		return view('calidad/mejora.index', compact('mejora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->get();
        $mejora = Mejora::where('empresa_id', '=', session('id_empresa'))->orderBy('id', 'desc')->first();
        if($mejora!=""){
            $num= $mejora->num_cod;
        }else{
            $num=0;
        }
        $year = date("y");

        if($num!=0){
            $num++;
            if($num <= 9){
                $num_cod="00".$num;
                $codigo="NC-".$year."-".$num_cod;
            }else if($num > 9 && $num <= 99){
                $num_cod="0".$num;
                $codigo="NC-".$year."-".$num_cod;
            }else if($num > 99){
                $num_cod=$num;
                $codigo="NC-".$year."-".$num_cod;
            }
        }else{
            $num=1;
            $codigo="NC-".$year."-001";
        }
        return view('calidad/mejora.create', compact('candidatos', 'empleados', 'codigo', 'num'));
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

        $array="";
        foreach($request->candidatos as $selected){
            if($selected!=""){
                $array.=$selected."|";
            }
        }

		//GUARDAR REGISTROS
        $mejora = new Mejora();
        $mejora->no1 = $request->no1;
        $mejora->no2 = $request->no2;
        $mejora->no3 = $request->no3;
        $mejora->no4 = $request->no4;
        $mejora->no5 = $array;
        $mejora->no6 = $request->no6;
        $mejora->no7 = $request->no7;
        $mejora->no8 = $request->no8;
        $mejora->no9 = $request->no9;
        $mejora->no10 = $request->no10;
        $mejora->no11 = $request->no11;
        $mejora->no12 = $request->no12;
        $mejora->num_cod = $request->num_cod;
        $mejora->is_active = 1;
        $mejora->empresa_id = $request->empresa_id;
        $mejora->id_user = $id_user;
        $mejora -> save();

		return redirect()->route('mejora.edit', $mejora->id)->with('info', 'La No conformidad se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mejora $mejora)
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
        $mejora = Mejora::where('id', '=', $id)->get()->first();
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');
        $empleados = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->get();
        return view('calidad/mejora.edit', compact('mejora', 'candidatos', 'empleados'));
        
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

		$mejora = Mejora::find($request->id);
        $mejora->no1 = $request->no1;
        $mejora->no2 = $request->no2;
        $mejora->no3 = $request->no3;
        $mejora->no4 = $request->no4;
        $mejora->no5 = $array;
        $mejora->no6 = $request->no6;
        $mejora->no7 = $request->no7;
        $mejora->no8 = $request->no8;
        $mejora->no9 = $request->no9;
        $mejora->no10 = $request->no10;
        $mejora->no11 = $request->no11;
        $mejora->no12 = $request->no12;
        $mejora->num_cod = $request->num_cod;
        $mejora->is_active = 1;
        $mejora->empresa_id = $request->empresa_id;
        $mejora->id_user = $id_user;
        $mejora -> save();
		
        return redirect()->route('mejora.edit', $request->id)->with('info', 'La No conformidad se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mejora = Mejora::where('id', $id)->delete();
        return redirect()->route('mejora.index')->with('info', 'La No conformidad se eliminó correctamente');
    }


}