<?php

namespace App\Http\Controllers\Rexbiot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rexbiot\Ganado;
use App\Models\Rexbiot\Ganado_Manejo1;

// Start of uses

class EstadisticasController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:estadisticas.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ganado = Ganado::where('no5', '<>', NULL)
        ->join('rexbiot_ganado_manejo1', 'rexbiot_ganado.id', '=', 'rexbiot_ganado_manejo1.ganado_id')
        ->selectRaw('rexbiot_ganado_manejo1.no24 as fecha, count(rexbiot_ganado_manejo1.id) as total_fechas, sum(rexbiot_ganado_manejo1.no26) as total_peso, avg(rexbiot_ganado_manejo1.no26) as media')
        ->groupBy('fecha')->get();
        
        return view('rexbiot/estadisticas.index')->with('ganado', $ganado);
        //return response($ganado);
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


    public function graficas(Request $request)
    {
        $raza = $request->raza;
        //$fecha1 = $request->fecha1;
        //$fecha2 = $request->fecha2;

        $media = Ganado::where('no5', '<>', NULL)
        ->join('rexbiot_ganado_manejo1', 'rexbiot_ganado.id', '=', 'rexbiot_ganado_manejo1.ganado_id')
        ->selectRaw('rexbiot_ganado_manejo1.no24 as fecha, count(rexbiot_ganado_manejo1.id) as total_fechas, sum(rexbiot_ganado_manejo1.no26) as total_peso, avg(rexbiot_ganado_manejo1.no26) as media')
        ->groupBy('fecha')->get()->toJson();

        $otra = Ganado::where('no5', '<>', NULL)
        ->where('no7', '=', $raza)
        ->join('rexbiot_ganado_manejo1', 'rexbiot_ganado.id', '=', 'rexbiot_ganado_manejo1.ganado_id')
        ->selectRaw('rexbiot_ganado_manejo1.no24 as fecha, count(rexbiot_ganado_manejo1.id) as total_fechas, sum(rexbiot_ganado_manejo1.no26) as total_peso, avg(rexbiot_ganado_manejo1.no26) as media')
        ->groupBy('fecha')->get()->toJson();

        $return['media'] = $media;
        $return['otra'] = $otra;
        
        return json_encode($return);
    }


}