<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Contratacion;
use App\Models\Administracion\Cont_Contrato;

// Start of uses

class ContratacionController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:contratacion.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))
        ->where('no94', '=', 'Si')->get();
		return view('adm/contratacion.index', compact('candidatos'));
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
		//VALIDAR CAMPOS
        $request->validate([
            'no5' => 'required',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
        $id=$request->id;

        if($id==""){
            $contratacion = new Contratacion();
        }else{
            $contratacion = Contratacion::find($id);
        }

		//GUARDAR REGISTROS
        $contratacion->no5 = $request->no5;
        $contratacion->no6 = $request->no6;
        $contratacion->no7 = $request->no7;
        $contratacion->no8 = $request->no8;
        $contratacion->no9 = $request->no9;
        $contratacion->no10 = $request->no10;
        $contratacion->no11 = $request->no11;
        $contratacion->no12 = $request->no12;
        $contratacion->no13 = $request->no13;
        $contratacion->no14 = $request->no14;
        $contratacion->no15 = $request->no15;
        $contratacion->no16 = $request->no16;
        $contratacion->no17 = $request->no17;
        $contratacion->no18 = $request->no18;
        $contratacion->no19 = $request->no19;
        $contratacion->no20 = $request->no20;
        $contratacion->no21 = $request->no21;
        $contratacion->no22 = $request->no22;
        $contratacion->is_active = 1;
        $contratacion->candidato_id = $request->candidato_id;
        $contratacion->empresa_id = $request->empresa_id;
        $contratacion->id_user = $id_user;
        $contratacion -> save();

		return redirect()->route('contratacion.edit', $request->candidato_id)->with('info', 'La contratación se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $candidato = Reclutamiento::where('id', '=', $id)->get()->first();
        $contratacion = Contratacion::where('candidato_id', '=', $id)->get()->first();

        if($contratacion==""){
            return view('adm/contratacion.create', compact('candidato'));
        }else{
            return view('adm/contratacion.edit', compact('candidato', 'contratacion'));
        }
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
            'no5' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

		$contratacion = Contratacion::find($request->id);
        $contratacion->no5 = $request->no5;
        $contratacion->no6 = $request->no6;
        $contratacion->no7 = $request->no7;
        $contratacion->no8 = $request->no8;
        $contratacion->no9 = $request->no9;
        $contratacion->no10 = $request->no10;
        $contratacion->no11 = $request->no11;
        $contratacion->no12 = $request->no12;
        $contratacion->no13 = $request->no13;
        $contratacion->no14 = $request->no14;
        $contratacion->no15 = $request->no15;
        $contratacion->no16 = $request->no16;
        $contratacion->no17 = $request->no17;
        $contratacion->no18 = $request->no18;
        $contratacion->no19 = $request->no19;
        $contratacion->no20 = $request->no20;
        $contratacion->no21 = $request->no21;
        $contratacion->no22 = $request->no22;
        $contratacion->is_active = 1;
        $contratacion->candidato_id = $request->candidato_id;
        $contratacion->empresa_id = $request->empresa_id;
        $contratacion->id_user = $id_user;
        $contratacion -> save();
		
        return redirect()->route('contratacion.edit', $request->candidato_id)->with('info', 'La contratación se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $contrato = Cont_Contrato::where('candidato_id', $id)->delete();
        $contratacion = Contratacion::where('candidato_id', $id)->delete();
        return redirect()->route('contratacion.index')->with('info', 'La contratación se eliminó correctamente');
    }



    public function guardar_contratacion(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $contratacion = new Contratacion();
                $contratacion->no5 = $request->no5;
                $contratacion->no6 = $request->no6;
                $contratacion->no7 = $request->no7;
                $contratacion->no8 = $request->no8;
                $contratacion->no9 = $request->no9;
                $contratacion->no10 = $request->no10;
                $contratacion->no11 = $request->no11;
                $contratacion->no12 = $request->no12;
                $contratacion->no13 = $request->no13;
                $contratacion->no14 = $request->no14;
                $contratacion->no15 = $request->no15;
                $contratacion->no16 = $request->no16;
                $contratacion->no17 = $request->no17;
                $contratacion->no18 = $request->no18;
                $contratacion->no19 = $request->no19;
                $contratacion->no20 = $request->no20;
                $contratacion->no21 = $request->no21;
                $contratacion->no22 = $request->no22;
                $contratacion->is_active = 1;
                $contratacion->candidato_id = $request->candidato_id;
                $contratacion->empresa_id = $request->empresa_id;
                $contratacion->id_user = $user_id;
                $contratacion -> save();
                //SACAR EL ID
                $id = $contratacion->id;
            }
            return response($id);
        }
    }



    public function list_contrato(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $contrato = Cont_Contrato::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($contrato)
        ->addColumn('fecha', function ($contrato) {
            $html3 = $contrato->no1;
            return $html3;
        })
        ->addColumn('tipo', function ($contrato) {
            $html4 = $contrato->no2;
            return $html4;
        })
        ->addColumn('firma', function ($contrato) {
            $html4 = $contrato->no4;
            return $html4;
        })
        ->addColumn('edit', function ($contrato) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_contrato('.$contrato->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($contrato) {
            $html6 = '<button type="button" name="delete" id="'.$contrato->id.'" onclick="delete_contrato('.$contrato->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'tipo', 'firma', 'edit', 'delete'])
        ->make(true);
    }



    public function create_contrato(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_contrato = $request->id_contrato;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_contrato;
            $candidato_id = $request->candidatoid_contrato;
            $contratacion_id = $request->contratacionid_contrato;

            if($id_contrato==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $contrato = Cont_Contrato::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($contrato==""){
                    $eq = new Cont_Contrato();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> contratacion_id = $contratacion_id;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Cont_Contrato::find($id_contrato);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> contratacion_id = $contratacion_id;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_contrato(Request $request)
    {
        if($request->ajax()){
            $id_contrato = $request->id_contrato;
            $contrato = Cont_Contrato::where('id', '=', $id_contrato)
            ->get()->toJson();
            return json_encode($contrato);
        }
    }



    public function delete_contrato(Request $request)
    {
        if($request->ajax()){
            $id_contrato = $request->id_contrato;
            $contrato = Cont_Contrato::where('id', $id_contrato)->delete();
            return response("eliminado");
        }
    }


}