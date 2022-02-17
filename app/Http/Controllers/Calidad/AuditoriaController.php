<?php

namespace App\Http\Controllers\Calidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Calidad\Auditoria;
use App\Models\Calidad\Auditoria_Equipo;
use App\Models\Calidad\Auditoria_Requisito;
use App\Models\Administracion\Reclutamiento;

// Start of uses

class AuditoriaController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:auditoria.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditorias = Auditoria::where('empresa_id', '=', session('id_empresa'))->get();
		return view('calidad/auditoria.index', compact('auditorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');
        return view('calidad/auditoria.create', compact('candidatos'));
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
            $auditoria = new Auditoria();
        }else{
            $auditoria = Auditoria::find($id);
        }

		//GUARDAR REGISTROS
        $auditoria->no1 = $request->no1;
        $auditoria->no2 = $request->no2;
        $auditoria->no3 = $request->no3;
        $auditoria->no4 = $request->no4;
        $auditoria->no5 = $request->no5;
        $auditoria->no6 = $request->no6;
        $auditoria->no7 = $request->no7;
        $auditoria->no11 = $request->no11;
        $auditoria->no16 = $request->no16;
        $auditoria->is_active = 1;
        $auditoria->empresa_id = $request->empresa_id;
        $auditoria->id_user = $id_user;
        $auditoria -> save();

		return redirect()->route('auditoria.edit', $auditoria->id)->with('info', 'La auditoría se guardó correctamente');
        
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
        $auditoria = Auditoria::where('id', '=', $id)->get()->first();
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->pluck('no62', 'id');
        $requisitos = Auditoria_Requisito::where('auditoria_id', '=', $id)->get();
        return view('calidad/auditoria.edit', compact('auditoria', 'candidatos', 'requisitos'));
        
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

        $array="";
        foreach($request->candidatos as $selected){
            $array.=$selected."|";
        }

		$auditoria = Auditoria::find($request->id);
        $auditoria->no1 = $request->no1;
        $auditoria->no2 = $request->no2;
        $auditoria->no3 = $request->no3;
        $auditoria->no4 = $request->no4;
        $auditoria->no5 = $request->no5;
        $auditoria->no6 = $request->no6;
        $auditoria->no7 = $request->no7;
        $auditoria->no11 = $request->no11;
        $auditoria->no16 = $request->no16;
        $auditoria->is_active = 1;
        $auditoria->empresa_id = $request->empresa_id;
        $auditoria->id_user = $id_user;
        $auditoria -> save();
		
        return redirect()->route('auditoria.edit', $request->id)->with('info', 'La auditoría se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $equipo = Auditoria_Equipo::where('auditoria_id', $id)->delete();
        $equipo = Auditoria_Requisito::where('auditoria_id', $id)->delete();
        $auditoria = Auditoria::where('id', $id)->delete();
        return redirect()->route('auditoria.index')->with('info', 'La auditoría se eliminó correctamente');
    }



    public function guardar_auditoria(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $auditoria = new Auditoria();
                $auditoria->no1 = $request->no1;
                $auditoria->no2 = $request->no2;
                $auditoria->no3 = $request->no3;
                $auditoria->no4 = $request->no4;
                $auditoria->no5 = $request->no5;
                $auditoria->no6 = $request->no6;
                $auditoria->no7 = $request->no7;
                $auditoria->no11 = $request->no11;
                $auditoria->no16 = $request->no16;
                $auditoria->is_active = 1;
                $auditoria->empresa_id = $request->empresa_id;
                $auditoria->id_user = $user_id;
                $auditoria -> save();
                //SACAR EL ID
                $id = $auditoria->id;
            }
            
            return response($id);
        }
    }



    public function list_equipo(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $auditoria_id = $request->auditoria_id;
        $equipo = Auditoria_Equipo::where('auditoria_id', $auditoria_id)
        ->where('empresa_id', $empresa_id)->orderBy('no8')->get();
        
        return datatables()->of($equipo)
        ->addColumn('nombre', function ($equipo) {
            $html3 = $equipo->no8;
            return $html3;
        })
        ->addColumn('empresa', function ($equipo) {
            $html4 = $equipo->no10;
            return $html4;
        })
        ->addColumn('edit', function ($equipo) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_equipo('.$equipo->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($equipo) {
            $html6 = '<button type="button" name="delete" id="'.$equipo->id.'" onclick="delete_equipo('.$equipo->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'empresa', 'edit', 'delete'])
        ->make(true);
    }



    public function create_equipo(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_equipo = $request->id_equipo;
            $no8 = $request->no8;
            $empresa_id = $request->empresaid_equipo;
            $auditoria_id = $request->auditoriaid_equipo;

            if($id_equipo==""){
                $equipo = Auditoria_Equipo::where('no8', '=', $no8)
                ->where('empresa_id', '=', $empresa_id)
                ->where('auditoria_id', '=', $auditoria_id)->get()->first();
                //GUARDAR REGISTRO
                if($equipo==""){
                    $cons = new Auditoria_Equipo();
                    $cons -> no8 = $request->no8;
                    $cons -> no9 = $request->no9;
                    $cons -> no10 = $request->no10;
                    $cons -> auditoria_id = $auditoria_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Auditoria_Equipo::find($id_equipo);
                $cons -> no8 = $request->no8;
                $cons -> no9 = $request->no9;
                $cons -> no10 = $request->no10;
                $cons -> auditoria_id = $auditoria_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_equipo(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $equipo = Auditoria_Equipo::where('id', '=', $id_equipo)
            ->get()->toJson();
            return json_encode($equipo);
        }
    }



    public function delete_equipo(Request $request)
    {
        if($request->ajax()){
            $id_equipo = $request->id_equipo;
            $equipo = Auditoria_Equipo::where('id', $id_equipo)->delete();
            return response("eliminado");
        }
    }





    public function list_requisito(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $auditoria_id = $request->auditoria_id;
        $requisito = Auditoria_Requisito::where('auditoria_id', $auditoria_id)
        ->where('empresa_id', $empresa_id)->orderBy('no12')->get();
        
        return datatables()->of($requisito)
        ->addColumn('requisito', function ($requisito) {
            $html3 = $requisito->no12;
            return $html3;
        })
        ->addColumn('cumple', function ($requisito) {
            $html4 = $requisito->no15;
            return $html4;
        })
        ->addColumn('edit', function ($requisito) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_requisito('.$requisito->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($requisito) {
            $html6 = '<button type="button" name="delete" id="'.$requisito->id.'" onclick="delete_requisito('.$requisito->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['requisito', 'cumple', 'edit', 'delete'])
        ->make(true);
    }



    public function create_requisito(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_requisito = $request->id_requisito;
            $no12 = $request->no12;
            $empresa_id = $request->empresaid_requisito;
            $auditoria_id = $request->auditoriaid_requisito;

            if($id_requisito==""){
                $requisito = Auditoria_Requisito::where('no12', '=', $no12)
                ->where('empresa_id', '=', $empresa_id)
                ->where('auditoria_id', '=', $auditoria_id)->get()->first();
                //GUARDAR REGISTRO
                if($requisito==""){
                    $cons = new Auditoria_Requisito();
                    $cons -> no12 = $request->no12;
                    $cons -> no13 = $request->no13;
                    $cons -> no14 = $request->no14;
                    $cons -> no15 = $request->no15;
                    $cons -> auditoria_id = $auditoria_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Auditoria_Requisito::find($id_requisito);
                $cons -> no12 = $request->no12;
                $cons -> no13 = $request->no13;
                $cons -> no14 = $request->no14;
                $cons -> no15 = $request->no15;
                $cons -> auditoria_id = $auditoria_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_requisito(Request $request)
    {
        if($request->ajax()){
            $id_requisito = $request->id_requisito;
            $requisito = Auditoria_Requisito::where('id', '=', $id_requisito)
            ->get()->toJson();
            return json_encode($requisito);
        }
    }



    public function delete_requisito(Request $request)
    {
        if($request->ajax()){
            $id_requisito = $request->id_requisito;
            $requisito = Auditoria_Requisito::where('id', $id_requisito)->delete();
            return response("eliminado");
        }
    }



}