<?php

namespace App\Http\Controllers\Responsabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Responsabilidad\Responsabilidad;
use App\Models\Responsabilidad\Responsabilidad_Acciones;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class ResponsabilidadController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:responsabilidad_social.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsabilidad = Responsabilidad::all();
		return view('responsabilidad/responsabilidad_social.index', compact('responsabilidad'));
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

        $resp = Responsabilidad::orderBy('id', 'desc')->first();
        if($resp!=""){
            $num= $resp->id;
        }else{
            $num=0;
        }
        $year = date("y");

        if($num!=0){
            $num++;
            if($num <= 9){
                $num_cod="00".$num;
                $codigo="RS-".$year."-".$num_cod;
            }else if($num > 9 && $num <= 99){
                $num_cod="0".$num;
                $codigo="RS-".$year."-".$num_cod;
            }else if($num > 99){
                $num_cod=$num;
                $codigo="RS-".$year."-".$num_cod;
            }
        }else{
            $num=1;
            $codigo="RS-".$year."-001";
        }

        return view('responsabilidad/responsabilidad_social.create', compact('candidatos', 'empleados', 'num_candidatos', 'codigo'));
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
            $responsabilidad = new Responsabilidad();
        }else{
            $responsabilidad = Responsabilidad::find($id);
        }

        

		//GUARDAR REGISTROS
        $responsabilidad->no1 = $request->no1;
        $responsabilidad->no2 = $request->no2;
        $responsabilidad->no3 = $request->no3;
        $responsabilidad->no4 = $request->no4;
        $responsabilidad->no5 = $request->no5;
        $responsabilidad->no6 = $request->no6;
        $responsabilidad->no7 = $request->no7;
        $responsabilidad->no8 = $request->no8;
        $responsabilidad->no9 = $request->no9;
        $responsabilidad->no10 = $request->no10;
        $responsabilidad->no11 = $request->no11;
        $responsabilidad->no12 = $request->no12;
        $responsabilidad->no13 = $request->no13;
        $responsabilidad->no14 = $request->no14;
        $responsabilidad->no23 = $request->no23;
        $responsabilidad->no24 = $request->no24;
        $responsabilidad->no25 = $request->no25;
        $responsabilidad->is_active = 1;
        $responsabilidad->empresa_id = $request->empresa_id;
        $responsabilidad->id_user = $id_user;
        $responsabilidad -> save();

		return redirect()->route('responsabilidad_social.edit', $responsabilidad->id)->with('info', 'El programa se guardó correctamente');
        
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
        $responsabilidad = Responsabilidad::where('id', '=', $id)->get()->first();
        $empleados = Reclutamiento::where('no94', '=', 'Si')->pluck('no62', 'id');
        $candidatos = Reclutamiento::where('no94', '=', 'Si')->get();
        $num_candidatos = Reclutamiento::count();
        $codigo=$responsabilidad->no5;
        return view('responsabilidad/responsabilidad_social.edit', compact('responsabilidad', 'candidatos', 'empleados', 'num_candidatos', 'codigo'));
        
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


		$responsabilidad = Responsabilidad::find($request->id);
        $responsabilidad->no1 = $request->no1;
        $responsabilidad->no2 = $request->no2;
        $responsabilidad->no3 = $request->no3;
        $responsabilidad->no4 = $request->no4;
        $responsabilidad->no5 = $request->no5;
        $responsabilidad->no6 = $request->no6;
        $responsabilidad->no7 = $request->no7;
        $responsabilidad->no8 = $request->no8;
        $responsabilidad->no9 = $request->no9;
        $responsabilidad->no10 = $request->no10;
        $responsabilidad->no11 = $request->no11;
        $responsabilidad->no12 = $request->no12;
        $responsabilidad->no13 = $request->no13;
        $responsabilidad->no14 = $request->no14;
        $responsabilidad->no23 = $request->no23;
        $responsabilidad->no24 = $request->no24;
        $responsabilidad->no25 = $request->no25;
        $responsabilidad->is_active = 1;
        $responsabilidad->empresa_id = $request->empresa_id;
        $responsabilidad->id_user = $id_user;
        $responsabilidad -> save();
		
        return redirect()->route('responsabilidad_social.edit', $request->id)->with('info', 'El programa se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acciones = Responsabilidad_Acciones::where('responsabilidad_id', $id)->delete();
        $responsabilidad = Responsabilidad::where('id', $id)->delete();
        return redirect()->route('responsabilidad_social.index')->with('info', 'El programa se eliminó correctamente');
    }




    public function guardar_responsabilidad(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;

            
            //GUARDAR
            if($id==""){
                $responsabilidad = new Responsabilidad();
                $responsabilidad->no1 = $request->no1;
                $responsabilidad->no2 = $request->no2;
                $responsabilidad->no3 = $request->no3;
                $responsabilidad->no4 = $request->no4;
                $responsabilidad->no5 = $request->no5;
                $responsabilidad->no6 = $request->no6;
                $responsabilidad->no7 = $request->no7;
                $responsabilidad->no8 = $request->no8;
                $responsabilidad->no9 = $request->no9;
                $responsabilidad->no10 = $request->no10;
                $responsabilidad->no11 = $request->no11;
                $responsabilidad->no12 = $request->no12;
                $responsabilidad->no13 = $request->no13;
                $responsabilidad->no14 = $request->no14;
                $responsabilidad->no23 = $request->no23;
                $responsabilidad->no24 = $request->no24;
                $responsabilidad->no25 = $request->no25;
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



    public function list_acciones(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $responsabilidad_id = $request->responsabilidad_id;
        $modulo = Responsabilidad_Acciones::where('responsabilidad_id', $responsabilidad_id)
        ->orderBy('no15')->get();
        
        return datatables()->of($modulo)
        ->addColumn('fecha1', function ($modulo) {
            $html3 = $modulo->no15;
            return $html3;
        })
        ->addColumn('fecha2', function ($modulo) {
            $html3 = $modulo->no16;
            return $html3;
        })
        ->addColumn('edit', function ($modulo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_acciones('.$modulo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($modulo) {
            $html6 = '<button type="button" name="delete" id="'.$modulo->id.'" onclick="delete_acciones('.$modulo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha1', 'fecha2', 'edit', 'delete'])
        ->make(true);
    }



    public function create_acciones(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_acciones = $request->id_acciones;
            $no15 = $request->no15;
            $empresa_id = $request->empresaid_acciones;
            $responsabilidad_id = $request->responsabilidadid_acciones;

            $array="";
            $array2="";
            
            foreach($request->candidatos as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                    $array2.=$request->{"part$selected"}."|";
                }
            }

            if($id_acciones==""){
                $acciones = Responsabilidad_Acciones::where('no15', '=', $no15)
                ->where('responsabilidad_id', '=', $responsabilidad_id)->get()->first();
                //GUARDAR REGISTRO
                if($acciones==""){
                    $cons = new Responsabilidad_Acciones();
                    $cons -> no15 = $request->no15;
                    $cons -> no16 = $request->no16;
                    $cons -> no17 = $request->no17;
                    $cons -> no18 = $request->no18;
                    $cons -> no19 = $request->no19;
                    $cons -> no20 = $request->no20;
                    $cons -> no21 = $array;
                    $cons -> no22 = $array2;
                    $cons -> responsabilidad_id = $responsabilidad_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Responsabilidad_Acciones::find($id_acciones);
                $cons -> no15 = $request->no15;
                $cons -> no16 = $request->no16;
                $cons -> no17 = $request->no17;
                $cons -> no18 = $request->no18;
                $cons -> no19 = $request->no19;
                $cons -> no20 = $request->no20;
                $cons -> no21 = $array;
                $cons -> no22 = $array2;
                $cons -> responsabilidad_id = $responsabilidad_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_acciones(Request $request)
    {
        if($request->ajax()){
            $id_acciones = $request->id_acciones;
            $acciones = Responsabilidad_Acciones::where('id', '=', $id_acciones)
            ->get()->toJson();
            return json_encode($acciones);
        }
    }



    public function delete_acciones(Request $request)
    {
        if($request->ajax()){
            $id_acciones = $request->id_acciones;
            $acciones = Responsabilidad_Acciones::where('id', $id_acciones)->delete();
            return response("eliminado");
        }
    }


}