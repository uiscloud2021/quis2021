<?php

namespace App\Http\Controllers\Calidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Calidad\Versiones;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class VersionesController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:versiones.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $versiones = Versiones::all();
		return view('calidad/versiones.index', compact('versiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        return view('calidad/versiones.create', compact('candidatos'));
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

        $suma = $request->no6 + $request->no7 + $request->no8 + $request->no9 + $request->no10 + $request->no11 + $request->no12;
		
		//GUARDAR REGISTROS
        $versiones = new Versiones();
        $versiones->no1 = $request->no1;
        $versiones->no2 = $request->no2;
        $versiones->no3 = $request->no3;
        $versiones->no4 = $request->no4;
        $versiones->no5 = $request->no5;
        $versiones->no6 = $request->no6;
        $versiones->no7 = $request->no7;
        $versiones->no8 = $request->no8;
        $versiones->no9 = $request->no9;
        $versiones->no10 = $request->no10;
        $versiones->no11 = $request->no11;
        $versiones->no12 = $request->no12;
        $versiones->no13 = $suma;
        $versiones->no14 = $request->no14;
        $versiones->no15 = $request->no15;
        $versiones->no16 = $request->no16;
        $versiones->no17 = $request->no17;
        $versiones->empresa_id = $request->empresa_id;
        $versiones->id_user = $id_user;
        $versiones -> save();

		return redirect()->route('versiones.edit', $versiones->id)->with('info', 'La versión del documento se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Versiones $version)
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
        $versiones = Versiones::where('id', '=', $id)->get()->first();
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        return view('calidad/versiones.edit', compact('candidatos','versiones'));
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

        $suma = $request->no6 + $request->no7 + $request->no8 + $request->no9 + $request->no10 + $request->no11 + $request->no12;

		$version = Versiones::find($request->id);
	    $version->no1 = $request->no1;
        $version->no2 = $request->no2;
        $version->no3 = $request->no3;
        $version->no4 = $request->no4;
        $version->no5 = $request->no5;
        $version->no6 = $request->no6;
        $version->no7 = $request->no7;
        $version->no8 = $request->no8;
        $version->no9 = $request->no9;
        $version->no10 = $request->no10;
        $version->no11 = $request->no11;
        $version->no12 = $request->no12;
        $version->no13 = $suma;
        $version->no14 = $request->no14;
        $version->no15 = $request->no15;
        $version->no16 = $request->no16;
        $version->no17 = $request->no17;
        $version->empresa_id = $request->empresa_id;
        $version->id_user = $id_user;
        $version -> save();
		
        return redirect()->route('versiones.edit', $request->id)->with('info', 'La versión del documento se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $versiones = Versiones::where('id', $id)->delete();
        return redirect()->route('versiones.index')->with('info', 'La versión del documento se eliminó correctamente');
    }


}