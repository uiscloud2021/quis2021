<?php

namespace App\Http\Controllers\MCE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MCE\InformesMCE;
use App\Models\MCE\UsuariosUISMCE;
use App\Models\Administracion\Proyecto;

// Start of uses

class TrimestralMCEController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:informe_trimestral_comite.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_uis = UsuariosUISMCE::pluck('nombre', 'id');
        $proyectos = Proyecto::where('no27', '<>', 'Cerrado')->get();
        $num_proyectos = Proyecto::count('no27', '<>', 'Cerrado');
		return view('mce/informe_trimestral_comite.index', compact('users_uis', 'proyectos', 'num_proyectos'));
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
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }


    public function list_informes(Request $request)
    {
        $user_id = auth()->id();
        $auxiliar = InformesMCE::orderBy('proyecto_id')->get();
        
        return datatables()->of($auxiliar)
        ->addColumn('protocolo', function ($auxiliar) {
            $html3 = $auxiliar->proyecto_id;
            $usr = Proyecto::where('id', '=', $html3)->get()->first();
            $codigo=$usr->no20;
            return $codigo;
        })
        ->addColumn('fecha', function ($auxiliar) {
            $html3 = $auxiliar->fecha;
            return $html3;
        })
        ->addColumn('cei', function ($auxiliar) {
            $html3 = $auxiliar->aprobacion_cei;
            return $html3;
        })
        ->addColumn('ci', function ($auxiliar) {
            $html3 = $auxiliar->aprobacion_ci;
            return $html3;
        })
        ->addColumn('cofepris', function ($auxiliar) {
            $html3 = $auxiliar->cofepris;
            return $html3;
        })
        ->addColumn('estado', function ($auxiliar) {
            $html3 = $auxiliar->estado;
            return $html3;
        })
        ->addColumn('inicio', function ($auxiliar) {
            $html3 = $auxiliar->fecha_inicio;
            return $html3;
        })
        ->addColumn('icf', function ($auxiliar) {
            $html3 = $auxiliar->sujetos_icf;
            return $html3;
        })
        ->addColumn('activos', function ($auxiliar) {
            $html3 = $auxiliar->sujetos_activos;
            return $html3;
        })
        ->addColumn('eas', function ($auxiliar) {
            $html3 = $auxiliar->total_eas;
            return $html3;
        })
        ->addColumn('desviaciones', function ($auxiliar) {
            $html3 = $auxiliar->total_desviaciones;
            return $html3;
        })
        ->rawColumns(['protocolo', 'fecha', 'cei', 'ci', 'cofepris', 'estado', 'inicio', 'icf', 'activos', 'eas', 'desviaciones'])
        ->make(true);
    }



    public function guardar_users(Request $request)
    {
            $id = $request->usuario;

            $array1="";
            foreach($request->proyectos as $selected){
                if($selected!=""){
                    $array1.=$selected."|";
                }
            }

            $cons = UsuariosUISMCE::find($id);
            $cons -> protocolos = $array1;
            $cons -> save();
            
            return response($cons);
    }



    public function cargar_users(Request $request)
    {
        if($request->ajax()){
            $id = $request->id_usuario;
            $usr = UsuariosUISMCE::where('id', '=', $id)
            ->get()->toJson();
            return json_encode($usr);
        }
    }


}