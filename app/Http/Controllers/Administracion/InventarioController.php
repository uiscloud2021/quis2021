<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Inventario;

// Start of uses

class InventarioController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:inventario.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::all();
		return view('inventario.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
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
		
		//GUARDAR REGISTROS
        $inventarios = new Inventario();
        $inventarios->no1 = $request->no1;
        $inventarios->no2 = $request->no2;
        $inventarios->no3 = $request->no3;
        $inventarios->no4 = $request->no4;
        $inventarios->no5 = $request->no5;
        $inventarios->no6 = $request->no6;
        $inventarios->no7 = $request->no7;
        $inventarios->no8 = $request->no8;
        $inventarios->no9 = $request->no9;
        $inventarios->no10 = $request->no10;
        $inventarios->no11 = $request->no11;
        $inventarios->no12 = $request->no12;
        $inventarios->no13 = $request->no13;
        $inventarios->no14 = $request->no14;
        $inventarios->no15 = $request->no15;
        $inventarios->no16 = $request->no16;
        $inventarios->no17 = $request->no17;
        $inventarios->no18 = $request->no18;
        $inventarios->empresa_id = $request->empresa_id;
        $inventarios->id_user = $id_user;
        $inventarios -> save();

		return redirect()->route('inventario.edit', $inventarios)->with('info', 'El inventario se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();

		$inventario = Inventario::find($inventario->id);
	    $inventario->no1 = $request->no1;
        $inventario->no2 = $request->no2;
        $inventario->no3 = $request->no3;
        $inventario->no4 = $request->no4;
        $inventario->no5 = $request->no5;
        $inventario->no6 = $request->no6;
        $inventario->no7 = $request->no7;
        $inventario->no8 = $request->no8;
        $inventario->no9 = $request->no9;
        $inventario->no10 = $request->no10;
        $inventario->no11 = $request->no11;
        $inventario->no12 = $request->no12;
        $inventario->no13 = $request->no13;
        $inventario->no14 = $request->no14;
        $inventario->no15 = $request->no15;
        $inventario->no16 = $request->no16;
        $inventario->no17 = $request->no17;
        $inventario->no18 = $request->no18;
        $inventario->empresa_id = $request->empresa_id;
        $inventario->id_user = $id_user;
        $inventario->save();
		
        return redirect()->route('inventario.edit',$inventario)->with('info', 'El inventario se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventario.index',$inventario)->with('info', 'El inventario se eliminó correctamente');
    }


}