<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Investigador;

// Start of uses

class ProyectoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:proyectos.index');//PROTEGE TODAS LAS RUTAS
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
		return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$investigadores = Investigador::where('empresa_id', '=', session('id_empresa'))->pluck('investigador', 'id');
        $investigadores = Investigador::pluck('investigador', 'id');
        return view('proyectos.create', compact('investigadores'));
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
            'no18' => 'required|unique:proyectos',
            'no20' => 'required|unique:proyectos',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        
        if($request->investigador_id == ""){
            if($request->investigador != ""){
            //GUARDAR REGISTROS INVESTIGADOR
            $investigadores = new Investigador();
            $investigadores->investigador = $request->investigador;
            $investigadores->apellido = $request->apellido;
            $investigadores->titulo = $request->titulo;
            $investigadores->cedula = $request->cedula;
            $investigadores->verifico_cedula = $request->verifico_cedula;
            $investigadores->fecha_verificacion = $request->fecha_verificacion;
            $investigadores->electronico = $request->electronico;
            $investigadores->telefono = $request->telefono;
            $investigadores->verifico_telefono = $request->verifico_telefono;
            $investigadores->fecha_telefono = $request->fecha_telefono;
            $investigadores->resultado = $request->resultado;
            $investigadores->empresa_id = $request->empresa_id;
            $investigadores->id_user = $id_user;
            $investigadores -> save();
            $id_inv=$investigadores->id;
            }else{
                $id_inv=NULL;
            }
        }else{
            //GUARDAR REGISTROS INVESTIGADOR
            $investigadores = Investigador::find($request->investigador_id);
            $investigadores->investigador = $request->investigador;
            $investigadores->apellido = $request->apellido;
            $investigadores->titulo = $request->titulo;
            $investigadores->cedula = $request->cedula;
            $investigadores->verifico_cedula = $request->verifico_cedula;
            $investigadores->fecha_verificacion = $request->fecha_verificacion;
            $investigadores->electronico = $request->electronico;
            $investigadores->telefono = $request->telefono;
            $investigadores->verifico_telefono = $request->verifico_telefono;
            $investigadores->fecha_telefono = $request->fecha_telefono;
            $investigadores->resultado = $request->resultado;
            $investigadores->empresa_id = $request->empresa_id;
            $investigadores->id_user = $id_user;
            $investigadores -> save();

            $id_inv=$investigadores->id;
        }
        
		//GUARDAR REGISTROS PROYECTOS
        $proyectos = new Proyecto();
        $proyectos->no1 = $request->no1;
        $proyectos->no2 = $request->no2;
        $proyectos->no3 = $request->no3;
        $proyectos->no4 = $request->no4;
        $proyectos->no5 = $request->no5;
        $proyectos->no6 = $request->no6;
        $proyectos->no7 = $request->no7;
        $proyectos->no8 = $request->no8;
        $proyectos->no9 = $request->no9;
        $proyectos->no10 = $request->no10;
        $proyectos->no11 = $request->no11;
        $proyectos->no12 = $request->no12;
        $proyectos->no13 = $request->no13;
        $proyectos->no14 = $request->no14;
        $proyectos->no15 = $request->no15;
        $proyectos->no16 = $request->no16;
        $proyectos->no17 = $request->no17;
        $proyectos->no18 = $request->no18;
        $proyectos->no19 = $request->no19;
        $proyectos->no20 = $request->no20;
        $proyectos->no21 = $request->no21;
        $proyectos->no22 = $request->no22;
        $proyectos->no23 = $request->no23;
        $proyectos->no24 = $request->no24;
        $proyectos->no25 = $request->no25;
        $proyectos->no26 = $request->no26;
        $proyectos->no27 = $request->no27;
        $proyectos->no28 = $request->no28;
        $proyectos->investigador_id = $id_inv;
        $proyectos->empresa_id = $request->empresa_id;
        $proyectos->id_user = $id_user;
        $proyectos -> save();

		return redirect()->route('proyectos.edit', $proyectos)->with('info', 'El proyecto se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $investigadores = Investigador::pluck('investigador', 'id');
        $proyectos = Proyecto::where('id', '=', $proyecto->id)->get()->first();
        $investigador = Investigador::where('id', '=', $proyectos->investigador_id)->get()->first();
        return view('proyectos.edit', compact('proyecto', 'investigadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
		//VALIDAR CAMPOS
        $request->validate([
            'no18' => 'required',
            'no20' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

        //GUARDAR REGISTROS INVESTIGADOR
        if($request->investigador_id == ""){
            if($request->investigador != ""){
            //GUARDAR REGISTROS INVESTIGADOR
            $investigador = new Investigador();
            $investigador->investigador = $request->investigador;
            $investigador->apellido = $request->apellido;
            $investigador->titulo = $request->titulo;
            $investigador->cedula = $request->cedula;
            $investigador->verifico_cedula = $request->verifico_cedula;
            $investigador->fecha_verificacion = $request->fecha_verificacion;
            $investigador->electronico = $request->electronico;
            $investigador->telefono = $request->telefono;
            $investigador->verifico_telefono = $request->verifico_telefono;
            $investigador->fecha_telefono = $request->fecha_telefono;
            $investigador->resultado = $request->resultado;
            $investigador->empresa_id = $request->empresa_id;
            $investigador->id_user = $id_user;
            $investigador -> save();
            $id_inv=$investigador->id;
            }else{
                $id_inv=NULL;
            }
        }else{
            //GUARDAR REGISTROS INVESTIGADOR
            $investigador = Investigador::find($request->investigador_id);
            $investigador->investigador = $request->investigador;
            $investigador->apellido = $request->apellido;
            $investigador->titulo = $request->titulo;
            $investigador->cedula = $request->cedula;
            $investigador->verifico_cedula = $request->verifico_cedula;
            $investigador->fecha_verificacion = $request->fecha_verificacion;
            $investigador->electronico = $request->electronico;
            $investigador->telefono = $request->telefono;
            $investigador->verifico_telefono = $request->verifico_telefono;
            $investigador->fecha_telefono = $request->fecha_telefono;
            $investigador->resultado = $request->resultado;
            $investigador->empresa_id = $request->empresa_id;
            $investigador->id_user = $id_user;
            $investigador -> save();
            
            $id_inv=$request->investigador_id;
        }

		$proyecto = Proyecto::find($proyecto->id);
	    $proyecto->no1 = $request->no1;
        $proyecto->no2 = $request->no2;
        $proyecto->no3 = $request->no3;
        $proyecto->no4 = $request->no4;
        $proyecto->no5 = $request->no5;
        $proyecto->no6 = $request->no6;
        $proyecto->no7 = $request->no7;
        $proyecto->no8 = $request->no8;
        $proyecto->no9 = $request->no9;
        $proyecto->no10 = $request->no10;
        $proyecto->no11 = $request->no11;
        $proyecto->no12 = $request->no12;
        $proyecto->no13 = $request->no13;
        $proyecto->no14 = $request->no14;
        $proyecto->no15 = $request->no15;
        $proyecto->no16 = $request->no16;
        $proyecto->no17 = $request->no17;
        $proyecto->no18 = $request->no18;
        $proyecto->no19 = $request->no19;
        $proyecto->no20 = $request->no20;
        $proyecto->no21 = $request->no21;
        $proyecto->no22 = $request->no22;
        $proyecto->no23 = $request->no23;
        $proyecto->no24 = $request->no24;
        $proyecto->no25 = $request->no25;
        $proyecto->no26 = $request->no26;
        $proyecto->no27 = $request->no27;
        $proyecto->no28 = $request->no28;
        $proyecto->investigador_id = $id_inv;
        $proyecto->empresa_id = $request->empresa_id;
        $proyecto->id_user = $id_user;
        $proyecto -> save();
		
        return redirect()->route('proyectos.edit',$proyecto)->with('info', 'El proyecto se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index',$proyecto)->with('info', 'El proyecto se eliminó correctamente');
    }



    public function cargar_investigador(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_investigador = $request->id_investigador;

            $investigador = Investigador::where('id', '=', $id_investigador)->get()->toJson();
            return json_encode($investigador);
        }
    }


}