<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Induccion;

// Start of uses

class InduccionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:induccion.index');//PROTEGE TODAS LAS RUTAS
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
		return view('adm/induccion.index', compact('candidatos'));
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
            $induccion = new Induccion();
        }else{
            $induccion = Induccion::find($id);
        }
		//GUARDAR REGISTROS
        $induccion->no1 = $request->no1;
        $induccion->no2 = $request->no2;
        $induccion->no3 = $request->no3;
        $induccion->no4 = $request->no4;
        $induccion->no5 = $request->no5;
        $induccion->no6 = $request->no6;
        $induccion->no7 = $request->no7;
        $induccion->is_active = 1;
        $induccion->candidato_id = $request->candidato_id;
        $induccion->empresa_id = $request->empresa_id;
        $induccion->id_user = $id_user;
        $induccion -> save();

		return redirect()->route('induccion.edit', $request->candidato_id)->with('info', 'La inducción se guardó correctamente');
        
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
        $induccion = Induccion::where('candidato_id', '=', $id)->get()->first();

        if($induccion==""){
            return view('adm/induccion.create', compact('candidato'));
        }else{
            return view('adm/induccion.edit', compact('candidato', 'induccion'));
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

		$induccion = Induccion::find($request->id);
        $induccion->no1 = $request->no1;
        $induccion->no2 = $request->no2;
        $induccion->no3 = $request->no3;
        $induccion->no4 = $request->no4;
        $induccion->no5 = $request->no5;
        $induccion->no6 = $request->no6;
        $induccion->no7 = $request->no7;
        $induccion->is_active = 1;
        $induccion->candidato_id = $request->candidato_id;
        $induccion->empresa_id = $request->empresa_id;
        $induccion->id_user = $id_user;
        $induccion -> save();
		
        return redirect()->route('induccion.edit', $request->candidato_id)->with('info', 'La inducción se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $induccion = Induccion::where('candidato_id', $id)->delete();
        return redirect()->route('induccion.index')->with('info', 'La inducción se eliminó correctamente');
    }



}