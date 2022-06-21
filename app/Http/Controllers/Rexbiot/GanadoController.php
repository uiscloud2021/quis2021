<?php

namespace App\Http\Controllers\Rexbiot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rexbiot\Ganado;
use App\Models\Rexbiot\Ganado_Vacuna;
use App\Models\Rexbiot\Ganado_Manejo1;
use App\Models\Rexbiot\Ganado_Manejo2;

// Start of uses

class GanadoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:ganado.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ganados = Ganado::where('empresa_id', '=', session('id_empresa'))->orderBy('id', 'desc')->get();
        $medicinas = Ganado_Vacuna::where('empresa_id', '=', session('id_empresa'))->get();
		return view('rexbiot/ganado.index', compact('ganados', 'medicinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicinas = Ganado_Vacuna::where('empresa_id', '=', session('id_empresa'))->get();
        $ganado = Ganado::where('empresa_id', '=', session('id_empresa'))->orderBy('id', 'desc')->first();
        if($ganado!=""){
            $num= $ganado->no1;
        }else{
            $num=0;
        }
        if($num!=0){
            $num++;
        }else{
            $num=1;
        }
        return view('rexbiot/ganado.create', compact('medicinas', 'num'));
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
            'no2' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $ganado = new Ganado();
        }else{
            $ganado = Ganado::find($id);
        }

		//GUARDAR REGISTROS
        $ganado->no1 = $request->no1;
        $ganado->no2 = $request->no2;
        $ganado->no3 = $request->no3;
        $ganado->no4 = $request->no4;
        $ganado->no5 = $request->no5;
        $ganado->no6 = $request->no6;
        $ganado->no7 = $request->no7;
        $ganado->no8 = $request->no8;
        $ganado->no9 = $request->no9;
        $ganado->no10 = $request->no10;
        $ganado->no11 = $request->no11;
        $ganado->no12 = $request->no12;
        $ganado->no13 = $request->no13;
        $ganado->no14 = $request->no14;
        $ganado->no15 = $request->no15;
        $ganado->no16 = $request->no16;
        $ganado->no17 = $request->no17;
        $ganado->no18 = $request->no18;
        $ganado->no19 = $request->no19;
        $ganado->no20 = $request->no20;
        $ganado->no21 = $request->no21;
        $ganado->no22 = $request->no22;
        $ganado->no23 = $request->no23;
        $ganado->no48 = $request->no48;
        $ganado->no49 = $request->no49;
        $ganado->no50 = $request->no50;
        $ganado->no51 = $request->no51;
        $ganado->no52 = $request->no52;
        $ganado->no53 = $request->no53;
        $ganado->is_active = 1;
        $ganado->empresa_id = $request->empresa_id;
        $ganado->id_user = $id_user;
        $ganado -> save();

		return redirect()->route('ganado.edit', $ganado->id)->with('info', 'El ganado se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auditoria $auditoria)
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
        $ganado = Ganado::where('id', '=', $id)->get()->first();
        $medicinas = Ganado_Vacuna::where('empresa_id', '=', session('id_empresa'))->get();
        return view('rexbiot/ganado.edit', compact('ganado', 'medicinas'));
        
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
            'no2' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

		$ganado = Ganado::find($request->id);
        $ganado->no1 = $request->no1;
        $ganado->no2 = $request->no2;
        $ganado->no3 = $request->no3;
        $ganado->no4 = $request->no4;
        $ganado->no5 = $request->no5;
        $ganado->no6 = $request->no6;
        $ganado->no7 = $request->no7;
        $ganado->no8 = $request->no8;
        $ganado->no9 = $request->no9;
        $ganado->no10 = $request->no10;
        $ganado->no11 = $request->no11;
        $ganado->no12 = $request->no12;
        $ganado->no13 = $request->no13;
        $ganado->no14 = $request->no14;
        $ganado->no15 = $request->no15;
        $ganado->no16 = $request->no16;
        $ganado->no17 = $request->no17;
        $ganado->no18 = $request->no18;
        $ganado->no19 = $request->no19;
        $ganado->no20 = $request->no20;
        $ganado->no21 = $request->no21;
        $ganado->no22 = $request->no22;
        $ganado->no23 = $request->no23;
        $ganado->no48 = $request->no48;
        $ganado->no49 = $request->no49;
        $ganado->no50 = $request->no50;
        $ganado->no51 = $request->no51;
        $ganado->no52 = $request->no52;
        $ganado->no53 = $request->no53;
        $ganado->is_active = 1;
        $ganado->empresa_id = $request->empresa_id;
        $ganado->id_user = $id_user;
        $ganado -> save();
		
        return redirect()->route('ganado.edit', $request->id)->with('info', 'El ganado se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $vacuna = Ganado_Vacuna::where('ganado_id', $id)->delete();
        $manejo1 = Ganado_Manejo1::where('ganado_id', $id)->delete();
        $manejo2 = Ganado_Manejo2::where('ganado_id', $id)->delete();
        $ganado = Ganado::where('id', $id)->delete();
        return redirect()->route('ganado.index')->with('info', 'El ganado se eliminó correctamente');
    }



    public function guardar_ganado(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $ganado = new Ganado();
                $ganado->no1 = $request->no1;
                $ganado->no2 = $request->no2;
                $ganado->no3 = $request->no3;
                $ganado->no4 = $request->no4;
                $ganado->no5 = $request->no5;
                $ganado->no6 = $request->no6;
                $ganado->no7 = $request->no7;
                $ganado->no8 = $request->no8;
                $ganado->no9 = $request->no9;
                $ganado->no10 = $request->no10;
                $ganado->no11 = $request->no11;
                $ganado->no12 = $request->no12;
                $ganado->no13 = $request->no13;
                $ganado->no14 = $request->no14;
                $ganado->no15 = $request->no15;
                $ganado->no16 = $request->no16;
                $ganado->no17 = $request->no17;
                $ganado->no18 = $request->no18;
                $ganado->no19 = $request->no19;
                $ganado->no20 = $request->no20;
                $ganado->no21 = $request->no21;
                $ganado->no22 = $request->no22;
                $ganado->no23 = $request->no23;
                $ganado->no48 = $request->no48;
                $ganado->no49 = $request->no49;
                $ganado->no50 = $request->no50;
                $ganado->no51 = $request->no51;
                $ganado->no52 = $request->no52;
                $ganado->no53 = $request->no53;
                $ganado->is_active = 1;
                $ganado->empresa_id = $request->empresa_id;
                $ganado->id_user = $user_id;
                $ganado -> save();
                //SACAR EL ID
                $id = $ganado->id;
            }
            
            return response($id);
        }
    }



    public function list_vacuna(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $ganado_id = $request->ganado_id;
        $vacuna = Ganado_Vacuna::where('empresa_id', $empresa_id)->orderBy('no_vacuna')->get();
        
        return datatables()->of($vacuna)
        ->addColumn('nombre', function ($vacuna) {
            $html3 = $vacuna->no_vacuna;
            return $html3;
        })
        ->addColumn('edit', function ($vacuna) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_vacuna('.$vacuna->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($vacuna) {
            $html6 = '<button type="button" name="delete" id="'.$vacuna->id.'" onclick="delete_vacuna('.$vacuna->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'edit', 'delete'])
        ->make(true);
    }



    public function create_vacuna(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_vacuna = $request->id_vacuna;
            $no_vacuna = $request->no_vacuna;
            $empresa_id = $request->empresaid_vacuna;
            $ganado_id = $request->ganadoid_vacuna;

            if($id_vacuna==""){
                $vacuna = Ganado_Vacuna::where('no_vacuna', '=', $no_vacuna)
                ->where('empresa_id', '=', $empresa_id)
                ->where('ganado_id', '=', $ganado_id)->get()->first();
                //GUARDAR REGISTRO
                if($vacuna==""){
                    $cons = new Ganado_Vacuna();
                    $cons -> no_vacuna = $request->no_vacuna;
                    $cons -> is_active = 1;
                    $cons -> ganado_id = $ganado_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Ganado_Vacuna::find($id_vacuna);
                $cons -> no_vacuna = $request->no_vacuna;
                $cons -> ganado_id = $ganado_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_vacuna(Request $request)
    {
        if($request->ajax()){
            $id_vacuna = $request->id_vacuna;
            $vacuna = Ganado_Vacuna::where('id', '=', $id_vacuna)
            ->get()->toJson();
            return json_encode($vacuna);
        }
    }



    public function delete_vacuna(Request $request)
    {
        if($request->ajax()){
            $id_vacuna = $request->id_vacuna;
            $vacuna = Ganado_Vacuna::where('id', $id_vacuna)->delete();
            return response("eliminado");
        }
    }





    public function list_manejo1(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $ganado_id = $request->ganado_id;
        $manejo1 = Ganado_Manejo1::where('ganado_id', $ganado_id)
        ->where('empresa_id', $empresa_id)->orderBy('no24')->get();
        
        return datatables()->of($manejo1)
        ->addColumn('fecha', function ($manejo1) {
            $html3 = $manejo1->no24;
            return $html3;
        })
        ->addColumn('edad', function ($manejo1) {
            $html4 = $manejo1->no25;
            return $html4;
        })
        ->addColumn('peso', function ($manejo1) {
            $html7 = $manejo1->no26;
            return $html7;
        })
        ->addColumn('edit', function ($manejo1) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_manejo1('.$manejo1->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($manejo1) {
            $html6 = '<button type="button" name="delete" id="'.$manejo1->id.'" onclick="delete_manejo1('.$manejo1->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'edad', 'peso', 'edit', 'delete'])
        ->make(true);
    }



    public function create_manejo1(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_manejo1 = $request->id_manejo1;
            $no24 = $request->no24;
            $empresa_id = $request->empresaid_manejo1;
            $ganado_id = $request->ganadoid_manejo1;

            $array="";
            if($request->vacunas !=""){
            foreach($request->vacunas as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }
            }

            if($id_manejo1==""){
                /*$manejo1 = Ganado_Manejo1::where('no24', '=', $no24)
                ->where('empresa_id', '=', $empresa_id)
                ->where('ganado_id', '=', $ganado_id)->get()->first();
                //GUARDAR REGISTRO
                if($manejo1==""){*/
                    $cons = new Ganado_Manejo1();
                    $cons -> no24 = $request->no24;
                    $cons -> no25 = $request->no25;
                    $cons -> no26 = $request->no26;
                    $cons -> no27 = $request->no27;
                    $cons -> no28 = $request->no28;
                    $cons -> no29 = $request->no29;
                    $cons -> no_medicinas = $array;
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
                    $cons -> no42 = $request->no42;
                    $cons -> no43 = $request->no43;
                    $cons -> is_active = 1;
                    $cons -> ganado_id = $ganado_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                /*}else{
                    return response("singuardar");
                }*/
            }else{
                $cons = Ganado_Manejo1::find($id_manejo1);
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no_medicinas = $array;
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
                $cons -> no42 = $request->no42;
                $cons -> no43 = $request->no43;
                $cons -> ganado_id = $ganado_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_manejo1(Request $request)
    {
        if($request->ajax()){
            $id_manejo1 = $request->id_manejo1;
            $manejo1 = Ganado_Manejo1::where('id', '=', $id_manejo1)
            ->get()->toJson();
            return json_encode($manejo1);
        }
    }



    public function delete_manejo1(Request $request)
    {
        if($request->ajax()){
            $id_manejo1 = $request->id_manejo1;
            $manejo1 = Ganado_Manejo1::where('id', $id_manejo1)->delete();
            return response("eliminado");
        }
    }





    public function list_manejo2(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $ganado_id = $request->ganado_id;
        $manejo2 = Ganado_Manejo2::where('ganado_id', $ganado_id)
        ->where('empresa_id', $empresa_id)->orderBy('no44')->get();
        
        return datatables()->of($manejo2)
        ->addColumn('fecha', function ($manejo2) {
            $html3 = $manejo2->no44;
            return $html3;
        })
        ->addColumn('incidentes', function ($manejo2) {
            $html4 = $manejo2->no47;
            return $html4;
        })
        ->addColumn('edit', function ($manejo2) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_manejo2('.$manejo2->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($manejo2) {
            $html6 = '<button type="button" name="delete" id="'.$manejo2->id.'" onclick="delete_manejo2('.$manejo2->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'incidentes', 'edit', 'delete'])
        ->make(true);
    }



    public function create_manejo2(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_manejo2 = $request->id_manejo2;
            $no44 = $request->no44;
            $empresa_id = $request->empresaid_manejo2;
            $ganado_id = $request->ganadoid_manejo2;

            if($id_manejo2==""){
                /*$manejo2 = Ganado_Manejo2::where('no44', '=', $no44)
                ->where('empresa_id', '=', $empresa_id)
                ->where('ganado_id', '=', $ganado_id)->get()->first();
                //GUARDAR REGISTRO
                if($manejo2==""){*/
                    $cons = new Ganado_Manejo2();
                    $cons -> no44 = $request->no44;
                    $cons -> no45 = $request->no45;
                    $cons -> no46 = $request->no46;
                    $cons -> no47 = $request->no47;
                    $cons -> is_active = 1;
                    $cons -> ganado_id = $ganado_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                /*}else{
                    return response("singuardar");
                }*/
            }else{
                $cons = Ganado_Manejo2::find($id_manejo2);
                $cons -> no44 = $request->no44;
                $cons -> no45 = $request->no45;
                $cons -> no46 = $request->no46;
                $cons -> no47 = $request->no47;
                $cons -> ganado_id = $ganado_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_manejo2(Request $request)
    {
        if($request->ajax()){
            $id_manejo2 = $request->id_manejo2;
            $manejo2 = Ganado_Manejo2::where('id', '=', $id_manejo2)
            ->get()->toJson();
            return json_encode($manejo2);
        }
    }



    public function delete_manejo2(Request $request)
    {
        if($request->ajax()){
            $id_manejo2 = $request->id_manejo2;
            $manejo2 = Ganado_Manejo2::where('id', $id_manejo2)->delete();
            return response("eliminado");
        }
    }




    public function create_manejos(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $empresa_id = $request->empresa_id;

            $array="";
            if($request->vacunas != ""){
            foreach($request->vacunas as $selected){
                if($selected!=""){
                    $array.=$selected."|";
                }
            }
            }

            foreach($request->ganados as $select){
                if($select!=""){
                $cons = new Ganado_Manejo1();
                $cons -> no24 = $request->no24;
                $cons -> no25 = $request->no25;
                $cons -> no26 = $request->no26;
                $cons -> no27 = $request->no27;
                $cons -> no28 = $request->no28;
                $cons -> no29 = $request->no29;
                $cons -> no_medicinas = $array;
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
                $cons -> no42 = $request->no42;
                $cons -> no43 = $request->no43;
                $cons -> is_active = 1;
                $cons -> ganado_id = $select;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                }
            }
            return response("guardado");
        }
    }


}