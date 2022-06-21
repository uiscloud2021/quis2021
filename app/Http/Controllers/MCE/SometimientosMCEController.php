<?php

namespace App\Http\Controllers\MCE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MCE\SomEnviadosMCE;
use App\Models\MCE\SomRecibidosMCE;
use App\Models\MCE\UsuariosUISMCE;
use App\Models\Administracion\Proyecto;
use Illuminate\Support\Facades\Storage;

// Start of uses

class SometimientosMCEController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:sometimientos_comite.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mce_recibidos = SomEnviadosMCE::all();
        $mce_enviados = SomRecibidosMCE::all();
        $users_uis = UsuariosUISMCE::pluck('nombre', 'id');
		return view('mce/sometimientos_comite.index', compact('mce_enviados', 'mce_recibidos', 'users_uis'));
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
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
       
    }


    public function list_enviados(Request $request)
    {
        $user_id = auth()->id();
        $auxiliar = SomRecibidosMCE::orderBy('created_at')->get();
        
        return datatables()->of($auxiliar)
        ->addColumn('nombre', function ($auxiliar) {
            $html3 = $auxiliar->nombre;
            return $html3;
        })
        ->addColumn('comentarios', function ($auxiliar) {
            $html3 = $auxiliar->comentarios;
            return $html3;
        })
        ->addColumn('usuario', function ($auxiliar) {
            $html4 = $auxiliar->usuario_webuis;
            $usr = UsuariosUISMCE::where('id', '=', $html4)->get()->first();
            $user=$usr->nombre;
            return $user;
        })
        ->addColumn('edit', function ($auxiliar) {
            $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="/assets/MCE/'.$auxiliar->directorio.'" target="_blank"><span class="fas fa-download"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($auxiliar) {
            $html6 = '<button type="button" name="delete" id="'.$auxiliar->id.'" onclick="delete_enviado('.$auxiliar->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'comentarios', 'usuario', 'edit', 'delete'])
        ->make(true);
    }


    public function list_recibidos(Request $request)
    {
        $user_id = auth()->id();
        $auxiliar = SomEnviadosMCE::orderBy('fecha')->get();
        
        return datatables()->of($auxiliar)
        ->addColumn('nombre', function ($auxiliar) {
            $html3 = $auxiliar->nombre;
            return $html3;
        })
        ->addColumn('comentarios', function ($auxiliar) {
            $html3 = $auxiliar->comentarios;
            return $html3;
        })
        ->addColumn('fecha', function ($auxiliar) {
            $html4 = $auxiliar->fecha;
            return $html4;
        })
        ->addColumn('usuario', function ($auxiliar) {
            $html4 = $auxiliar->usuario_webuis;
            $usr = UsuariosUISMCE::where('id', '=', $html4)->get()->first();
            $user=$usr->nombre;
            return $user;
        })
        ->addColumn('edit', function ($auxiliar) {
            $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="/assets/MCE/Sometimientos/'.$auxiliar->directorio.'" target="_blank"><span class="fas fa-download"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($auxiliar) {
            $html6 = '<button type="button" name="delete" id="'.$auxiliar->id.'" onclick="delete_recibido('.$auxiliar->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'comentarios', 'fecha', 'usuario', 'edit', 'delete'])
        ->make(true);
    }



    //ENVIADOS3
    public function create_somenviados(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $nombre = $request->nombre;
            $comentarios = $request->comentarios;
            $para = $request->usuario;
            $archivo = $request->file('archivo');
            $empresa_id = 15;
            $filename = $request->file('archivo')->getClientOriginalName();
            $directorio = "Sometimientos/".$filename;
            Storage::disk('mce')->put($directorio, fopen($request->file('archivo'), 'r+'), 'public');


            if($nombre!=""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $pr = SomRecibidosMCE::where('nombre', '=', $nombre)->get()->first();
                //GUARDAR REGISTRO
                if($pr==""){
                    $pre = new SomRecibidosMCE();
                    $pre -> nombre = $nombre;
                    $pre -> comentarios = $comentarios;
                    $pre -> directorio = $directorio;
                    $pre -> usuario_webuis = $para;
                    $pre -> is_active = 1;
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


    public function delete_somenviados(Request $request)
    {
        if($request->ajax()){
            $id = $request->id_enviado;
            $pr = SomRecibidosMCE::where('id', '=', $id)->get()->first();
            $directorio=$pr->directorio;

            Storage::disk('mce')->delete($directorio);
            $pre = SomRecibidosMCE::where('id', $id)->delete();
            return response("eliminado");
        }
    }


    public function delete_somrecibidos(Request $request)
    {
        if($request->ajax()){
            $id = $request->id_recibido;
            $pr = SomEnviadosMCE::where('id', '=', $id)->get()->first();
            $directorio=$pr->directorio;

            Storage::disk('mce')->delete($directorio);
            $pre = SomEnviadosMCE::where('id', $id)->delete();
            return response("eliminado");
        }
    }



}