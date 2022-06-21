<?php

namespace App\Http\Controllers\MCE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MCE\AuditoriasMCE;
use App\Models\MCE\DictamenMCE;
use Illuminate\Support\Facades\Storage;

// Start of uses

class AuditoriasMCEController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:auditorias_comite.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mce_auditorias = AuditoriasMCE::all();
        $mce_dictamen = DictamenMCE::all();
        return view('mce/auditorias_comite.index', compact('mce_auditorias', 'mce_dictamen'));
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
    public function destroy($id)
    {
        
    }
    
    
    
    
    public function delete_auditorias(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $auditoria = AuditoriasMCE::where('id', $id)->delete();
            return response("eliminado");
        }
    }
    
    public function delete_dictamen(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $auditoria = DictamenMCE::where('id', $id)->delete();
            return response("eliminado");
        }
    }
    
    
    public function create_dictamen(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $nombre = $request->nombre;
            $archivo = $request->file('archivo');
            $empresa_id = 15;
            $filename = $request->file('archivo')->getClientOriginalName();
            $directorio = "Auditorias/Dictamen/".$filename;
            $dir="assets/MCE/Auditorias/Dictamen/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo'), 'r+'), 'public');


            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = DictamenMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new DictamenMCE();
                    $pre -> nombre = $nombre;
                    $pre -> directorio = $dir;
                    $pre -> empresa_id = $empresa_id;
                    $pre -> id_user = $user_id;
                    $pre -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }
        }
    }


}