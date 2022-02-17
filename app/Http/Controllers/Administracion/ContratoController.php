<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Contrato;

// Start of uses

class ContratoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:contrato.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
		return view('adm/contrato.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $proyecto = Proyecto::where('id', '=', $request->id)->get()->first();
        return view('adm/contrato.create', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        $contrato = new Contrato();
		//GUARDAR REGISTROS FACTIBILIDAD
        $contrato->no1 = $request->no1;
        $contrato->no2 = $request->no2;
        $contrato->no3 = $request->no3;
        $contrato->no4 = $request->no4;
        $contrato->no5 = $request->no5;
        $contrato->no6 = $request->no6;
        $contrato->no7 = $request->no7;
        $contrato->no8 = $request->no8;
        $contrato->no9 = $request->no9;
        $contrato->no10 = $request->no10;
        $contrato->no11 = $request->no11;
        $contrato->no12 = $request->no12;
        $contrato->no13 = $request->no13;
        $contrato->no14 = $request->no14;
        $contrato->no15 = $request->no15;
        $contrato->no16 = $request->no16;
        $contrato->no17 = $request->no17;
        $contrato->no18 = $request->no18;
        $contrato->no19 = $request->no19;
        $contrato->no20 = $request->no20;
        $contrato->no21 = $request->no21;
        $contrato->no22 = $request->no22;
        $contrato->no23 = $request->no23;
        $contrato->no24 = $request->no24;
        $contrato->no25 = $request->no25;
        $contrato->no26 = $request->no26;
        $contrato->no27 = $request->no27;
        $contrato->no28 = $request->no28;
        $contrato->no29 = $request->no29;
        $contrato->no30 = $request->no30;
        $contrato->no31 = $request->no31;
        $contrato->no32 = $request->no32;
        $contrato->no33 = $request->no33;
        $contrato->no34 = $request->no34;
        $contrato->is_active = 1;
        $contrato->proyecto_id = $request->proyecto_id;
        $contrato->empresa_id = $request->empresa_id;
        $contrato->id_user = $id_user;
        $contrato -> save();

		return redirect()->route('contrato.edit', $contrato->id)->with('info', 'El contrato se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::where('id', '=', $id)->get()->first();
        $contratos = Contrato::where('proyecto_id', '=', $id)->get();
		return view('adm/contrato.show', compact('contratos', 'proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::where('id', '=', $id)->get()->first();
        $proyecto = Proyecto::where('id', '=', $contrato->proyecto_id)->get()->first();

        return view('adm/contrato.edit', compact('proyecto', 'contrato'));
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
		
        //id usuario loggeado
        $id_user = auth()->id();

		$contrato = Contrato::find($request->id);
        $contrato->no1 = $request->no1;
        $contrato->no2 = $request->no2;
        $contrato->no3 = $request->no3;
        $contrato->no4 = $request->no4;
        $contrato->no5 = $request->no5;
        $contrato->no6 = $request->no6;
        $contrato->no7 = $request->no7;
        $contrato->no8 = $request->no8;
        $contrato->no9 = $request->no9;
        $contrato->no10 = $request->no10;
        $contrato->no11 = $request->no11;
        $contrato->no12 = $request->no12;
        $contrato->no13 = $request->no13;
        $contrato->no14 = $request->no14;
        $contrato->no15 = $request->no15;
        $contrato->no16 = $request->no16;
        $contrato->no17 = $request->no17;
        $contrato->no18 = $request->no18;
        $contrato->no19 = $request->no19;
        $contrato->no20 = $request->no20;
        $contrato->no21 = $request->no21;
        $contrato->no22 = $request->no22;
        $contrato->no23 = $request->no23;
        $contrato->no24 = $request->no24;
        $contrato->no25 = $request->no25;
        $contrato->no26 = $request->no26;
        $contrato->no27 = $request->no27;
        $contrato->no28 = $request->no28;
        $contrato->no29 = $request->no29;
        $contrato->no30 = $request->no30;
        $contrato->no31 = $request->no31;
        $contrato->no32 = $request->no32;
        $contrato->no33 = $request->no33;
        $contrato->no34 = $request->no34;
        $contrato->is_active = 1;
        $contrato->proyecto_id = $request->proyecto_id;
        $contrato->empresa_id = $request->empresa_id;
        $contrato->id_user = $id_user;
        $contrato -> save();
		
        return redirect()->route('contrato.edit', $request->id)->with('info', 'El contrato se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $contrato = Contrato::where('id', $id)->delete();
        return redirect()->route('contrato.index')->with('info', 'El contrato se eliminó correctamente');
    }



}