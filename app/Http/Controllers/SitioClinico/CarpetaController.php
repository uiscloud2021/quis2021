<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Carpeta;
use App\Models\SitioClinico\Carp_Farmacista;
use App\Models\SitioClinico\Carp_Control;
use App\Models\SitioClinico\Carp_Tramite;
use App\Models\SitioClinico\Carp_Verificacion;

// Start of uses

class CarpetaController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:carpeta.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carpetas = Carpeta::where('empresa_id', '=', session('id_empresa'))->get();
		return view('sc/carpeta.index', compact('carpetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sc/carpeta.create');
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
            $carpetas = new Carpeta();
        }else{
            $carpetas = Carpeta::find($id);
        }

		//GUARDAR REGISTROS CARPETA
        $carpetas->no1 = $request->no1;
        $carpetas->no2 = $request->no2;
        $carpetas->no3 = $request->no3;
        $carpetas->no4 = $request->no4;
        $carpetas->is_active = 1;
        $carpetas->empresa_id = $request->empresa_id;
        $carpetas->id_user = $id_user;
        $carpetas -> save();

		return redirect()->route('carpeta.edit', $carpetas->id)->with('info', 'La carpeta de farmacia se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carpeta $carpeta)
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
        $carpeta = Carpeta::where('id', '=', $id)->get()->first();

        return view('sc/carpeta.edit', compact('carpeta'));
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

		$carpeta = Carpeta::find($request->id);
        $carpeta->no1 = $request->no1;
        $carpeta->no2 = $request->no2;
        $carpeta->no3 = $request->no3;
        $carpeta->no4 = $request->no4;
        $carpeta->is_active = 1;
        $carpeta->empresa_id = $request->empresa_id;
        $carpeta->id_user = $id_user;
        $carpeta -> save();
		
        return redirect()->route('carpeta.edit', $request->id)->with('info', 'La carpeta de farmacia se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $farm = Carp_Farmacista::where('carpeta_id', $id)->delete();
        $cont = Carp_Control::where('carpeta_id', $id)->delete();
        $tramite = Carp_Tramite::where('carpeta_id', $id)->delete();
        $ver = Carp_Verificacion::where('carpeta_id', $id)->delete();
        $carpeta = Carpeta::where('id', $id)->delete();
        return redirect()->route('carpeta.index')->with('info', 'La carpeta de farmacia se eliminó correctamente');
    }



    public function guardar_carpeta(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $carpeta = new Carpeta();
                $carpeta->no1 = $request->no1;
                $carpeta->no2 = $request->no2;
                $carpeta->no3 = $request->no3;
                $carpeta->no4 = $request->no4;
                $carpeta->is_active = 1;
                $carpeta->empresa_id = $request->empresa_id;
                $carpeta->id_user = $user_id;
                $carpeta -> save();
                //SACAR EL ID
                $id = $carpeta->id;
            }
            
            return response($id);
        }
    }



    public function list_farmacista(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $carpeta_id = $request->carpeta_id;
        $farmacista = Carp_Farmacista::where('carpeta_id', $carpeta_id)
        ->where('empresa_id', $empresa_id)->orderBy('no5')->get();
        
        return datatables()->of($farmacista)
        ->addColumn('nombre', function ($farmacista) {
            $html3 = $farmacista->no5;
            return $html3;
        })
        ->addColumn('inicio', function ($farmacista) {
            $html4 = $farmacista->no6;
            return $html4;
        })
        ->addColumn('fin', function ($farmacista) {
            $html4 = $farmacista->no16;
            return $html4;
        })
        ->addColumn('edit', function ($farmacista) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_farmacista('.$farmacista->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($farmacista) {
            $html6 = '<button type="button" name="delete" id="'.$farmacista->id.'" onclick="delete_farmacista('.$farmacista->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'inicio', 'fin', 'edit', 'delete'])
        ->make(true);
    }



    public function create_farmacista(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_farmacista = $request->id_farmacista;
            $no5 = $request->no5;
            $empresa_id = $request->empresaid_farmacista;
            $carpeta_id = $request->carpetaid_farmacista;

            if($id_farmacista==""){
                $farmacista = Carp_Farmacista::where('no5', '=', $no5)
                ->where('empresa_id', '=', $empresa_id)
                ->where('carpeta_id', '=', $carpeta_id)->get()->first();
                //GUARDAR REGISTRO
                if($farmacista==""){
                    $cons = new Carp_Farmacista();
                    $cons -> no5 = $request->no5;
                    $cons -> no6 = $request->no6;
                    $cons -> no7 = $request->no7;
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> no11 = $request->no11;
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> carpeta_id = $carpeta_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Carp_Farmacista::find($id_farmacista);
                $cons -> no5 = $request->no5;
                $cons -> no6 = $request->no6;
                $cons -> no7 = $request->no7;
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> no11 = $request->no11;
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> carpeta_id = $carpeta_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_farmacista(Request $request)
    {
        if($request->ajax()){
            $id_farmacista = $request->id_farmacista;
            $farmacista = Carp_Farmacista::where('id', '=', $id_farmacista)
            ->get()->toJson();
            return json_encode($farmacista);
        }
    }



    public function delete_farmacista(Request $request)
    {
        if($request->ajax()){
            $id_farmacista = $request->id_farmacista;
            $farmacista = Carp_Farmacista::where('id', $id_farmacista)->delete();
            return response("eliminado");
        }
    }






    public function list_control(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $carpeta_id = $request->carpeta_id;
        $control = Carp_Control::where('carpeta_id', $carpeta_id)
        ->where('empresa_id', $empresa_id)->orderBy('no17')->get();
        
        return datatables()->of($control)
        ->addColumn('fecha_revision', function ($control) {
            $html3 = $control->no17;
            return $html3;
        })
        ->addColumn('edit', function ($control) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_control('.$control->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($control) {
            $html6 = '<button type="button" name="delete" id="'.$control->id.'" onclick="delete_control('.$control->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha_revision', 'edit', 'delete'])
        ->make(true);
    }



    public function create_control(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_control = $request->id_control;
            $no17 = $request->no17;
            $empresa_id = $request->empresaid_control;
            $carpeta_id = $request->carpetaid_control;

            if($id_control==""){
                $control = Carp_Control::where('no17', '=', $no17)
                ->where('empresa_id', '=', $empresa_id)
                ->where('carpeta_id', '=', $carpeta_id)->get()->first();
                //GUARDAR REGISTRO
                if($control==""){
                    $cons = new Carp_Control();
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $request->no18;
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> carpeta_id = $carpeta_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Carp_Control::find($id_control);
                $cons -> no17 = $request->no17;
                $cons -> no18 = $request->no18;
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> carpeta_id = $carpeta_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_control(Request $request)
    {
        if($request->ajax()){
            $id_control = $request->id_control;
            $control = Carp_Control::where('id', '=', $id_control)
            ->get()->toJson();
            return json_encode($control);
        }
    }



    public function delete_control(Request $request)
    {
        if($request->ajax()){
            $id_control = $request->id_control;
            $control = Carp_Control::where('id', $id_control)->delete();
            return response("eliminado");
        }
    }






    public function list_tramite(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $carpeta_id = $request->carpeta_id;
        $tramite = Carp_Tramite::where('carpeta_id', $carpeta_id)
        ->where('empresa_id', $empresa_id)->orderBy('no24')->get();
        
        return datatables()->of($tramite)
        ->addColumn('nombre', function ($tramite) {
            $html3 = $tramite->no24;
            return $html3;
        })
        ->addColumn('entrada', function ($tramite) {
            $html3 = $tramite->no25;
            return $html3;
        })
        ->addColumn('respuesta', function ($tramite) {
            $html3 = $tramite->no27;
            return $html3;
        })
        ->addColumn('edit', function ($tramite) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_tramite('.$tramite->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($tramite) {
            $html6 = '<button type="button" name="delete" id="'.$tramite->id.'" onclick="delete_tramite('.$tramite->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'entrada', 'respuesta', 'edit', 'delete'])
        ->make(true);
    }



    public function create_tramite(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_tramite = $request->id_tramite;
            $no24 = $request->no24;
            $empresa_id = $request->empresaid_tramite;
            $carpeta_id = $request->carpetaid_tramite;

            if($id_tramite==""){
                $tramite = Carp_Tramite::where('no24', '=', $no24)
                ->where('empresa_id', '=', $empresa_id)
                ->where('carpeta_id', '=', $carpeta_id)->get()->first();
                //GUARDAR REGISTRO
                if($tramite==""){
                    $cons = new Carp_Tramite();
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> carpeta_id = $carpeta_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Carp_Tramite::find($id_tramite);
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> carpeta_id = $carpeta_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_tramite(Request $request)
    {
        if($request->ajax()){
            $id_tramite = $request->id_tramite;
            $tramite = Carp_Tramite::where('id', '=', $id_tramite)
            ->get()->toJson();
            return json_encode($tramite);
        }
    }



    public function delete_tramite(Request $request)
    {
        if($request->ajax()){
            $id_tramite = $request->id_tramite;
            $tramite = Carp_Tramite::where('id', $id_tramite)->delete();
            return response("eliminado");
        }
    }






    public function list_verificacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $carpeta_id = $request->carpeta_id;
        $verificacion = Carp_Verificacion::where('carpeta_id', $carpeta_id)
        ->where('empresa_id', $empresa_id)->orderBy('no28')->get();
        
        return datatables()->of($verificacion)
        ->addColumn('fecha', function ($verificacion) {
            $html3 = $verificacion->no28;
            return $html3;
        })
        ->addColumn('edit', function ($verificacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_verificacion('.$verificacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($verificacion) {
            $html6 = '<button type="button" name="delete" id="'.$verificacion->id.'" onclick="delete_verificacion('.$verificacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edit', 'delete'])
        ->make(true);
    }



    public function create_verificacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_verificacion = $request->id_verificacion;
            $no28 = $request->no28;
            $empresa_id = $request->empresaid_verificacion;
            $carpeta_id = $request->carpetaid_verificacion;

            if($id_verificacion==""){
                $verificacion = Carp_Verificacion::where('no28', '=', $no28)
                ->where('empresa_id', '=', $empresa_id)
                ->where('carpeta_id', '=', $carpeta_id)->get()->first();
                //GUARDAR REGISTRO
                if($verificacion==""){
                    $cons = new Carp_Verificacion();
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no30 = $request->no30;
                    $cons -> carpeta_id = $carpeta_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Carp_Verificacion::find($id_verificacion);
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no30 = $request->no30;
                $cons -> carpeta_id = $carpeta_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_verificacion(Request $request)
    {
        if($request->ajax()){
            $id_verificacion = $request->id_verificacion;
            $verificacion = Carp_Verificacion::where('id', '=', $id_verificacion)
            ->get()->toJson();
            return json_encode($verificacion);
        }
    }



    public function delete_verificacion(Request $request)
    {
        if($request->ajax()){
            $id_verificacion = $request->id_verificacion;
            $verificacion = Carp_Verificacion::where('id', $id_verificacion)->delete();
            return response("eliminado");
        }
    }


}