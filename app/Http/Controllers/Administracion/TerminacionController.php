<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Terminacion;

// Start of uses

class TerminacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:terminacion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->get();
		return view('adm/terminacion.index', compact('candidatos'));
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
        //VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);
        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $terminacion = new Terminacion();
        }else{
            $terminacion = Terminacion::find($id);
        }

		//GUARDAR REGISTROS
        $terminacion->no1 = $request->no1;
        $terminacion->no2 = $request->no2;
        $terminacion->no3 = $request->no3;
        $terminacion->no4 = $request->no4;
        $terminacion->no5 = $request->no5;
        $terminacion->no6 = $request->no6;
        $terminacion->no7 = $request->no7;
        $terminacion->no8 = $request->no8;
        $terminacion->is_active = 1;
        $terminacion->candidato_id = $request->candidato_id;
        $terminacion->empresa_id = $request->empresa_id;
        $terminacion->id_user = $id_user;
        $terminacion -> save();

		return redirect()->route('terminacion.edit', $request->candidato_id)->with('info', 'La renuncia se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $candidato = Reclutamiento::where('id', '=', $id)->get()->first();
        $terminacion = Terminacion::where('candidato_id', '=', $id)->get()->first();

        if($terminacion==""){
            return view('adm/terminacion.create', compact('candidato'));
        }else{
            return view('adm/terminacion.edit', compact('candidato', 'terminacion'));
        }
        //return response($id);
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

		$terminacion = Terminacion::find($request->id);
        $terminacion->no1 = $request->no1;
        $terminacion->no2 = $request->no2;
        $terminacion->no3 = $request->no3;
        $terminacion->no4 = $request->no4;
        $terminacion->no5 = $request->no5;
        $terminacion->no6 = $request->no6;
        $terminacion->no7 = $request->no7;
        $terminacion->no8 = $request->no8;
        $terminacion->is_active = 1;
        $terminacion->candidato_id = $request->candidato_id;
        $terminacion->empresa_id = $request->empresa_id;
        $terminacion->id_user = $id_user;
        $terminacion -> save();
		
        return redirect()->route('terminacion.edit', $request->candidato_id)->with('info', 'La renuncia se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminacion = Terminacion::where('candidato_id', $id)->delete();
        return redirect()->route('terminacion.index')->with('info', 'La renuncia se eliminó correctamente');
    }




}