<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\Recl_Puestos;
use App\Models\Administracion\Recl_Puestos_Puesto;

// Start of uses

class ReclutamientoController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:reclutamiento.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Reclutamiento::where('empresa_id', '=', session('id_empresa'))->get();
        $puestos = Recl_Puestos::where('empresa_id', '=', session('id_empresa'))->get();
		return view('adm/reclutamiento.index', compact('puestos', 'candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $recl=$request->recl;
        return view('adm/reclutamiento.create', compact('recl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
        //id usuario loggeado
        $id_user = auth()->id();

        if($request->tipo == "puestos"){
        //VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);

        $puestos = new Recl_Puestos();
		//GUARDAR REGISTROS
        $puestos->no1 = $request->no1;
        $puestos->no2 = $request->no2;
        $puestos->no3 = $request->no3;
        $puestos->no4 = $request->no4;
        $puestos->no5 = $request->no5;
        $puestos->no6 = $request->no6;
        $puestos->no7 = $request->no7;
        $puestos->no8 = $request->no8;
        $puestos->no9 = $request->no9;
        $puestos->no10 = $request->no10;
        $puestos->no11 = $request->no11;
        $puestos->no12 = $request->no12;
        $puestos->no13 = $request->no13;
        $puestos->no14 = $request->no14;
        $puestos->no15 = $request->no15;
        $puestos->no16 = $request->no16;
        $puestos->no17 = $request->no17;
        $puestos->no18 = $request->no18;
        $puestos->no19 = $request->no19;
        $puestos->no20 = $request->no20;
        $puestos->no21 = $request->no21;
        $puestos->no22 = $request->no22;
        $puestos->no23 = $request->no23;
        $puestos->no24 = $request->no24;
        $puestos->no25 = $request->no25;
        $puestos->no26 = $request->no26;
        $puestos->no27 = $request->no27;
        $puestos->no28 = $request->no28;
        $puestos->no29 = $request->no29;
        $puestos->no30 = $request->no30;
        $puestos->no31 = $request->no31;
        $puestos->no32 = $request->no32;
        $puestos->no33 = $request->no33;
        $puestos->no34 = $request->no34;
        $puestos->no35 = $request->no35;
        $puestos->no36 = $request->no36;
        $puestos->no37 = $request->no37;
        $puestos->no38 = $request->no38;
        $puestos->no39 = $request->no39;
        $puestos->no40 = $request->no40;
        $puestos->no41 = $request->no41;
        $puestos->no42 = $request->no42;
        $puestos->no43 = $request->no43;
        $puestos->no44 = $request->no44;
        $puestos->no45 = $request->no45;
        $puestos->no46 = $request->no46;
        $puestos->no47 = $request->no47;
        $puestos->no48 = $request->no48;
        $puestos->no49 = $request->no49;
        $puestos->no50 = $request->no50;
        $puestos->no51 = $request->no51;
        $puestos->no52 = $request->no52;
        $puestos->no53 = $request->no53;
        $puestos->no54 = $request->no54;
        $puestos->no55 = $request->no55;
        $puestos->no56 = $request->no56;
        $puestos->no57 = $request->no57;
        $puestos->no58 = $request->no58;
        $puestos->no59 = $request->no59;
        $puestos->no60 = $request->no60;
        $puestos->no61 = $request->no61;
        $puestos->is_active = 1;
        $puestos->empresa_id = $request->empresa_id;
        $puestos->id_user = $id_user;
        $puestos -> save();

        return redirect()->route('reclutamiento.index')->with('info', 'El puesto se guardo correctamente');
        
        }

        else{
        //VALIDAR CAMPOS
        $request->validate([
            'no62' => 'required',
        ]);

        $candidato = new Reclutamiento();
		//GUARDAR REGISTROS
        $candidato->no62 = $request->no62;
        $candidato->no63 = $request->no63;
        $candidato->no64 = $request->no64;
        $candidato->no65 = $request->no65;
        $candidato->no66 = $request->no66;
        $candidato->no67 = $request->no67;
        $candidato->no68 = $request->no68;
        $candidato->no69 = $request->no69;
        $candidato->no70 = $request->no70;
        $candidato->no71 = $request->no71;
        $candidato->no72 = $request->no72;
        $candidato->no73 = $request->no73;
        $candidato->no74 = $request->no74;
        $candidato->no75 = $request->no75;
        $candidato->no76 = $request->no76;
        $candidato->no77 = $request->no77;
        $candidato->no78 = $request->no78;
        $candidato->no79 = $request->no79;
        $candidato->no80 = $request->no80;
        $candidato->no81 = $request->no81;
        $candidato->no82 = $request->no82;
        $candidato->no83 = $request->no83;
        $candidato->no84 = $request->no84;
        $candidato->no85 = $request->no85;
        $candidato->no86 = $request->no86;
        $candidato->no87 = $request->no87;
        $candidato->no88 = $request->no88;
        $candidato->no89 = $request->no89;
        $candidato->no90 = $request->no90;
        $candidato->no91 = $request->no91;
        $candidato->no92 = $request->no92;
        $candidato->no93 = $request->no93;
        $candidato->no94 = $request->no94;
        $candidato->no95 = $request->no95;
        $candidato->no96 = $request->no96;
        $candidato->no97 = $request->no97;
        $candidato->no98 = $request->no98;
        $candidato->no99 = $request->no99;
        $candidato->no100 = $request->no100;
        $candidato->no101 = $request->no101;
        $candidato->no102 = $request->no102;
        $candidato->no103 = $request->no103;
        $candidato->no104 = $request->no104;
        $candidato->no105 = $request->no105;
        $candidato->no106 = $request->no106;
        $candidato->no107 = $request->no107;
        $candidato->no108 = $request->no108;
        $candidato->no109 = $request->no109;
        $candidato->no110 = $request->no110;
        $candidato->no111 = $request->no111;
        $candidato->no112 = $request->no112;
        $candidato->no113 = $request->no113;
        $candidato->no114 = $request->no114;
        $candidato->no115 = $request->no115;
        $candidato->no116 = $request->no116;
        $candidato->no117 = $request->no117;
        $candidato->no118 = $request->no118;
        $candidato->is_active = 1;
        $candidato->empresa_id = $request->empresa_id;
        $candidato->id_user = $id_user;
        $candidato -> save();

        return redirect()->route('reclutamiento.index')->with('info', 'El candidato se guardo correctamente');

        }
        
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
    public function edit(Request $request, $id)
    {
        $recl = $request->recl;
        if($recl == "puestos"){
            $puesto = Recl_Puestos::where('id', '=', $id)->get()->first();
            return view('adm/reclutamiento.edit', compact('recl', 'puesto'));
        }else{
            $candidato = Reclutamiento::where('id', '=', $id)->get()->first();
            return view('adm/reclutamiento.edit', compact('recl', 'candidato'));
        }
        
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
        //id usuario loggeado
        $id_user = auth()->id();

        if($request->tipo == "puestos"){
		//VALIDAR CAMPOS
        $request->validate([
            'no1' => 'required',
        ]);
        
		$puesto = Recl_Puestos::find($request->id);
        $puesto->no1 = $request->no1;
        $puesto->no2 = $request->no2;
        $puesto->no3 = $request->no3;
        $puesto->no4 = $request->no4;
        $puesto->no5 = $request->no5;
        $puesto->no6 = $request->no6;
        $puesto->no7 = $request->no7;
        $puesto->no8 = $request->no8;
        $puesto->no9 = $request->no9;
        $puesto->no10 = $request->no10;
        $puesto->no11 = $request->no11;
        $puesto->no12 = $request->no12;
        $puesto->no13 = $request->no13;
        $puesto->no14 = $request->no14;
        $puesto->no15 = $request->no15;
        $puesto->no16 = $request->no16;
        $puesto->no17 = $request->no17;
        $puesto->no18 = $request->no18;
        $puesto->no19 = $request->no19;
        $puesto->no20 = $request->no20;
        $puesto->no21 = $request->no21;
        $puesto->no22 = $request->no22;
        $puesto->no23 = $request->no23;
        $puesto->no24 = $request->no24;
        $puesto->no25 = $request->no25;
        $puesto->no26 = $request->no26;
        $puesto->no27 = $request->no27;
        $puesto->no28 = $request->no28;
        $puesto->no29 = $request->no29;
        $puesto->no30 = $request->no30;
        $puesto->no31 = $request->no31;
        $puesto->no32 = $request->no32;
        $puesto->no33 = $request->no33;
        $puesto->no34 = $request->no34;
        $puesto->no35 = $request->no35;
        $puesto->no36 = $request->no36;
        $puesto->no37 = $request->no37;
        $puesto->no38 = $request->no38;
        $puesto->no39 = $request->no39;
        $puesto->no40 = $request->no40;
        $puesto->no41 = $request->no41;
        $puesto->no42 = $request->no42;
        $puesto->no43 = $request->no43;
        $puesto->no44 = $request->no44;
        $puesto->no45 = $request->no45;
        $puesto->no46 = $request->no46;
        $puesto->no47 = $request->no47;
        $puesto->no48 = $request->no48;
        $puesto->no49 = $request->no49;
        $puesto->no50 = $request->no50;
        $puesto->no51 = $request->no51;
        $puesto->no52 = $request->no52;
        $puesto->no53 = $request->no53;
        $puesto->no54 = $request->no54;
        $puesto->no55 = $request->no55;
        $puesto->no56 = $request->no56;
        $puesto->no57 = $request->no57;
        $puesto->no58 = $request->no58;
        $puesto->no59 = $request->no59;
        $puesto->no60 = $request->no60;
        $puesto->no61 = $request->no61;
        $puesto->is_active = 1;
        $puesto->empresa_id = $request->empresa_id;
        $puesto->id_user = $id_user;
        $puesto -> save();
		
        return redirect()->route('reclutamiento.edit', $request->id)->with('info', 'El puesto se modificó correctamente');

        }else{
            //VALIDAR CAMPOS
        $request->validate([
            'no62' => 'required',
        ]);

		$candidato = Reclutamiento::find($request->id);
        //GUARDAR REGISTROS
        $candidato->no62 = $request->no62;
        $candidato->no63 = $request->no63;
        $candidato->no64 = $request->no64;
        $candidato->no65 = $request->no65;
        $candidato->no66 = $request->no66;
        $candidato->no67 = $request->no67;
        $candidato->no68 = $request->no68;
        $candidato->no69 = $request->no69;
        $candidato->no70 = $request->no70;
        $candidato->no71 = $request->no71;
        $candidato->no72 = $request->no72;
        $candidato->no73 = $request->no73;
        $candidato->no74 = $request->no74;
        $candidato->no75 = $request->no75;
        $candidato->no76 = $request->no76;
        $candidato->no77 = $request->no77;
        $candidato->no78 = $request->no78;
        $candidato->no79 = $request->no79;
        $candidato->no80 = $request->no80;
        $candidato->no81 = $request->no81;
        $candidato->no82 = $request->no82;
        $candidato->no83 = $request->no83;
        $candidato->no84 = $request->no84;
        $candidato->no85 = $request->no85;
        $candidato->no86 = $request->no86;
        $candidato->no87 = $request->no87;
        $candidato->no88 = $request->no88;
        $candidato->no89 = $request->no89;
        $candidato->no90 = $request->no90;
        $candidato->no91 = $request->no91;
        $candidato->no92 = $request->no92;
        $candidato->no93 = $request->no93;
        $candidato->no94 = $request->no94;
        $candidato->no95 = $request->no95;
        $candidato->no96 = $request->no96;
        $candidato->no97 = $request->no97;
        $candidato->no98 = $request->no98;
        $candidato->no99 = $request->no99;
        $candidato->no100 = $request->no100;
        $candidato->no101 = $request->no101;
        $candidato->no102 = $request->no102;
        $candidato->no103 = $request->no103;
        $candidato->no104 = $request->no104;
        $candidato->no105 = $request->no105;
        $candidato->no106 = $request->no106;
        $candidato->no107 = $request->no107;
        $candidato->no108 = $request->no108;
        $candidato->no109 = $request->no109;
        $candidato->no110 = $request->no110;
        $candidato->no111 = $request->no111;
        $candidato->no112 = $request->no112;
        $candidato->no113 = $request->no113;
        $candidato->no114 = $request->no114;
        $candidato->no115 = $request->no115;
        $candidato->no116 = $request->no116;
        $candidato->no117 = $request->no117;
        $candidato->no118 = $request->no118;
        $candidato->is_active = 1;
        $candidato->empresa_id = $request->empresa_id;
        $candidato->id_user = $id_user;
        $candidato -> save();
		
        return redirect()->route('reclutamiento.edit', $request->id)->with('info', 'El candidato se modificó correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->recl == "puestos"){
            $puesto = Recl_Puestos::where('id', $id)->delete();
            return redirect()->route('reclutamiento.index')->with('info', 'El puesto se eliminó correctamente');
        }else{
            $candidato = Reclutamiento::where('id', $id)->delete();
            return redirect()->route('reclutamiento.index')->with('info', 'El candidato se eliminó correctamente');
        }
        
    }





    public function guardar_reclutamiento(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $puestos = new Recl_Puestos();
		        //GUARDAR REGISTROS
                $puestos->no1 = $request->no1;
                $puestos->no2 = $request->no2;
                $puestos->no3 = $request->no3;
                $puestos->no4 = $request->no4;
                $puestos->no5 = $request->no5;
                $puestos->no6 = $request->no6;
                $puestos->no7 = $request->no7;
                $puestos->no8 = $request->no8;
                $puestos->no9 = $request->no9;
                $puestos->no10 = $request->no10;
                $puestos->no11 = $request->no11;
                $puestos->no12 = $request->no12;
                $puestos->no13 = $request->no13;
                $puestos->no14 = $request->no14;
                $puestos->no15 = $request->no15;
                $puestos->no16 = $request->no16;
                $puestos->no17 = $request->no17;
                $puestos->no20 = $request->no20;
                $puestos->no21 = $request->no21;
                $puestos->no22 = $request->no22;
                $puestos->no23 = $request->no23;
                $puestos->no24 = $request->no24;
                $puestos->no25 = $request->no25;
                $puestos->no26 = $request->no26;
                $puestos->no27 = $request->no27;
                $puestos->no28 = $request->no28;
                $puestos->no29 = $request->no29;
                $puestos->no30 = $request->no30;
                $puestos->no31 = $request->no31;
                $puestos->no32 = $request->no32;
                $puestos->no33 = $request->no33;
                $puestos->no34 = $request->no34;
                $puestos->no35 = $request->no35;
                $puestos->no36 = $request->no36;
                $puestos->no37 = $request->no37;
                $puestos->no38 = $request->no38;
                $puestos->no39 = $request->no39;
                $puestos->no40 = $request->no40;
                $puestos->no41 = $request->no41;
                $puestos->no42 = $request->no42;
                $puestos->no43 = $request->no43;
                $puestos->no44 = $request->no44;
                $puestos->no45 = $request->no45;
                $puestos->no46 = $request->no46;
                $puestos->no47 = $request->no47;
                $puestos->no48 = $request->no48;
                $puestos->no49 = $request->no49;
                $puestos->no50 = $request->no50;
                $puestos->no51 = $request->no51;
                $puestos->no52 = $request->no52;
                $puestos->no53 = $request->no53;
                $puestos->no54 = $request->no54;
                $puestos->no55 = $request->no55;
                $puestos->no56 = $request->no56;
                $puestos->no57 = $request->no57;
                $puestos->no58 = $request->no58;
                $puestos->no59 = $request->no59;
                $puestos->no60 = $request->no60;
                $puestos->no61 = $request->no61;
                $puestos->is_active = 1;
                $puestos->empresa_id = $request->empresa_id;
                $puestos->id_user = $id_user;
                $puestos -> save();
                //SACAR EL ID
                $id = $puestos->id;
            }
            
            return response($id);
        }
    }



    public function list_puesto(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $puesto_id = $request->puesto_id;
        $pto = Recl_Puestos_Puesto::where('puesto_id', $puesto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no18')->get();
        
        return datatables()->of($pto)
        ->addColumn('nombre', function ($pto) {
            $html3 = $pto->no18;
            return $html3;
        })
        ->addColumn('puestos', function ($pto) {
            $html4 = $pto->no19;
            return $html4;
        })
        ->addColumn('edit', function ($pto) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_puesto('.$pto->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($pto) {
            $html6 = '<button type="button" name="delete" id="'.$pto->id.'" onclick="delete_puesto('.$pto->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'puestos', 'edit', 'delete'])
        ->make(true);
    }



    public function create_puesto(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_puesto = $request->id_puesto;
            $no18 = $request->no18;
            $empresa_id = $request->empresaid_puesto;
            $puesto_id = $request->puestoid_puesto;

            if($id_puesto==""){
                $puesto = Recl_Puestos_Puesto::where('no18', '=', $no18)
                ->where('empresa_id', '=', $empresa_id)
                ->where('puesto_id', '=', $puesto_id)->get()->first();
                //GUARDAR REGISTRO
                if($puesto==""){
                    $cons = new Recl_Puestos_Puesto();
                    $cons -> no18 = $request->no18;
                    $cons -> no19 = $request->no19;
                    $cons -> puesto_id = $puesto_id;
                    $cons -> empresa_id = $empresa_id;
                    $cons -> id_user = $user_id;
                    $cons -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cons = Recl_Puestos_Puesto::find($id_puesto);
                $cons -> no18 = $request->no18;
                $cons -> no19 = $request->no19;
                $cons -> puesto_id = $puesto_id;
                $cons -> empresa_id = $empresa_id;
                $cons -> id_user = $user_id;
                $cons -> save();
                return response("guardado");
            }
        }
    }



    public function edit_puesto(Request $request)
    {
        if($request->ajax()){
            $id_puesto = $request->id_puesto;
            $puesto = Recl_Puestos_Puesto::where('id', '=', $id_puesto)
            ->get()->toJson();
            return json_encode($puesto);
        }
    }



    public function delete_puesto(Request $request)
    {
        if($request->ajax()){
            $id_puesto = $request->id_puesto;
            $puesto = Recl_Puestos_Puesto::where('id', $id_puesto)->delete();
            return response("eliminado");
        }
    }




}