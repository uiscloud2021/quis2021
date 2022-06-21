<?php

namespace App\Http\Controllers\Integridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Integridad\Integridad;
use App\Models\Integridad\Integridad_Denuncia;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class IntegridadController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:denuncia.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncia = Integridad::all();
		return view('integridad/denuncia.index', compact('denuncia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->get();
        $num_candidatos = Reclutamiento::count();

        return view('integridad/denuncia.create', compact('candidatos', 'empleados', 'num_candidatos'));
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
            'no9' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $responsabilidad = new Integridad();
        }else{
            $responsabilidad = Integridad::find($id);
        }

        

		//GUARDAR REGISTROS
        $responsabilidad->no9 = $request->no9;
        $responsabilidad->no10 = $request->no10;
        $responsabilidad->no11 = $request->no11;
        $responsabilidad->no42 = $request->no42;
        $responsabilidad->no43 = $request->no43;
        $responsabilidad->no44 = $request->no44;
        $responsabilidad->no45 = $request->no45;
        $responsabilidad->no46 = $request->no46;
        $responsabilidad->no47 = $request->no47;
        $responsabilidad->no48 = $request->no48;
        $responsabilidad->no49 = $request->no49;
        $responsabilidad->no50 = $request->no50;
        $responsabilidad->is_active = 1;
        $responsabilidad->empresa_id = $request->empresa_id;
        $responsabilidad->id_user = $id_user;
        $responsabilidad -> save();

		return redirect()->route('denuncia.edit', $responsabilidad->id)->with('info', 'La denuncia se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contenidos $contenido)
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
        $denuncia = Integridad::where('id', '=', $id)->get()->first();
        $empleados = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->get();
        $num_candidatos = Reclutamiento::count();
        
        return view('integridad/denuncia.edit', compact('denuncia', 'candidatos', 'empleados', 'num_candidatos'));
        
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
            'no9' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();


		$responsabilidad = Integridad::find($request->id);
        $responsabilidad->no9 = $request->no9;
        $responsabilidad->no10 = $request->no10;
        $responsabilidad->no11 = $request->no11;
        $responsabilidad->no42 = $request->no42;
        $responsabilidad->no43 = $request->no43;
        $responsabilidad->no44 = $request->no44;
        $responsabilidad->no45 = $request->no45;
        $responsabilidad->no46 = $request->no46;
        $responsabilidad->no47 = $request->no47;
        $responsabilidad->no48 = $request->no48;
        $responsabilidad->no49 = $request->no49;
        $responsabilidad->no50 = $request->no50;
        $responsabilidad->is_active = 1;
        $responsabilidad->empresa_id = $request->empresa_id;
        $responsabilidad->id_user = $id_user;
        $responsabilidad -> save();
		
        return redirect()->route('denuncia.edit', $request->id)->with('info', 'El programa se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indagacion = Integridad_Denuncia::where('denuncia_id', $id)->delete();
        $denuncia = Integridad::where('id', $id)->delete();
        return redirect()->route('denuncia.index')->with('info', 'La denuncia se eliminó correctamente');
    }




    public function guardar_integridad(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;

            
            //GUARDAR
            if($id==""){
                $responsabilidad = new Integridad();
                $responsabilidad->no9 = $request->no9;
                $responsabilidad->no10 = $request->no10;
                $responsabilidad->no11 = $request->no11;
                $responsabilidad->no42 = $request->no42;
                $responsabilidad->no43 = $request->no43;
                $responsabilidad->no44 = $request->no44;
                $responsabilidad->no45 = $request->no45;
                $responsabilidad->no46 = $request->no46;
                $responsabilidad->no47 = $request->no47;
                $responsabilidad->no48 = $request->no48;
                $responsabilidad->no49 = $request->no49;
                $responsabilidad->no50 = $request->no50;
                $responsabilidad->is_active = 1;
                $responsabilidad->empresa_id = $request->empresa_id;
                $responsabilidad->id_user = $user_id;
                $responsabilidad -> save();
                //SACAR EL ID
                $id = $responsabilidad->id;
            }
            
            return response($id);
        }
    }



    public function list_indagacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $denuncia_id = $request->denuncia_id;
        $modulo = Integridad_Denuncia::where('denuncia_id', $denuncia_id)
        ->orderBy('no12')->get();
        
        return datatables()->of($modulo)
        ->addColumn('fecha', function ($modulo) {
            $html3 = $modulo->no12;
            return $html3;
        })
        ->addColumn('responsable', function ($modulo) {
            $html3 = $modulo->no13;
            return $html3;
        })
        ->addColumn('edit', function ($modulo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_indagacion('.$modulo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($modulo) {
            $html6 = '<button type="button" name="delete" id="'.$modulo->id.'" onclick="delete_indagacion('.$modulo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'responsable', 'edit', 'delete'])
        ->make(true);
    }



    public function create_indagacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_indagacion = $request->id_indagacion;
            $no12 = $request->no12;
            $empresa_id = $request->empresaid_indagacion;
            $denuncia_id = $request->denunciaid_indagacion;

            $array="";
            $array2="";
            $num=0;
            
            foreach($request->candidatos as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                    $array2.=$request->{"pto$selected"}."|";
                    $num++;
                }
            }

            if($id_indagacion==""){
                $inda = Integridad_Denuncia::where('no12', '=', $no12)
                ->where('denuncia_id', '=', $denuncia_id)->get()->first();
                //GUARDAR REGISTRO
                if($inda==""){
                    $cons = new Integridad_Denuncia();
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $array;
                    $cons -> no15 = $array2;
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $num;
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $request->no21;
                    $cons -> no22 = $request->no22;
                    $cons -> no23 = $request->no23;
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no30 = $request->no30;
                    $cons -> no31 = $request->no31;
                    $cons -> no32 = $request->no32;
                    $cons -> no33 = $request->no33;
                    $cons -> no34 = $request->no34;
                    $cons -> no35 = $request->no35;
                    $cons -> no36 = $request->no36;
                    $cons -> no37 = $request->no37;
                    $cons -> no38 = $request->no38;
                    $cons -> no39 = $request->no39;
                    $cons -> no40 = $request->no40;
                    $cons -> no41 = $request->no41;
                    $cons -> denuncia_id = $denuncia_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Responsabilidad_Acciones::find($id_acciones);
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $array;
                $cons -> no15 = $array2;
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> no17 = $request->no17;
                $cons -> no18 = $num;
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> no21 = $request->no21;
                $cons -> no22 = $request->no22;
                $cons -> no23 = $request->no23;
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no30 = $request->no30;
                $cons -> no31 = $request->no31;
                $cons -> no32 = $request->no32;
                $cons -> no33 = $request->no33;
                $cons -> no34 = $request->no34;
                $cons -> no35 = $request->no35;
                $cons -> no36 = $request->no36;
                $cons -> no37 = $request->no37;
                $cons -> no38 = $request->no38;
                $cons -> no39 = $request->no39;
                $cons -> no40 = $request->no40;
                $cons -> no41 = $request->no41;
                $cons -> denuncia_id = $denuncia_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_indagacion(Request $request)
    {
        if($request->ajax()){
            $id_indagacion = $request->id_indagacion;
            $indagacion = Integridad_Denuncia::where('id', '=', $id_indagacion)
            ->get()->toJson();
            return json_encode($indagacion);
        }
    }



    public function delete_indagacion(Request $request)
    {
        if($request->ajax()){
            $id_indagacion = $request->id_indagacion;
            $indagacion = Integridad_Denuncia::where('id', $id_indagacion)->delete();
            return response("eliminado");
        }
    }


}