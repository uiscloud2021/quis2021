<?php

namespace App\Http\Controllers\SitioClinico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Proyecto;
use App\Models\SitioClinico\Factibilidad;
use App\Models\SitioClinico\Fact_Seguimiento;
use App\Providers\ListaMenu;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Menu;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// Start of uses

class FactibilidadController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:factibilidad.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
		return view('sc/factibilidad.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('sc/factibilidad.create');
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
            $factibilidad = new Factibilidad();
        }else{
            $factibilidad = Factibilidad::find($id);
        }

		//GUARDAR REGISTROS FACTIBILIDAD
        $factibilidad->no1 = $request->no1;
        $factibilidad->no2 = $request->no2;
        $factibilidad->no3 = $request->no3;
        $factibilidad->no4 = $request->no4;
        $factibilidad->no5 = $request->no5;
        $factibilidad->no6 = $request->no6;
        $factibilidad->no7 = $request->no7;
        $factibilidad->no8 = $request->no8;
        $factibilidad->no9 = $request->no9;
        $factibilidad->no10 = $request->no10;
        $factibilidad->no11 = $request->no11;
        $factibilidad->no12 = $request->no12;
        $factibilidad->no13 = $request->no13;
        $factibilidad->no14 = $request->no14;
        $factibilidad->no15 = $request->no15;
        $factibilidad->no16 = $request->no16;
        $factibilidad->no17 = $request->no17;
        $factibilidad->no18 = $request->no18;
        $factibilidad->no19 = $request->no19;
        $factibilidad->no20 = $request->no20;
        $factibilidad->no21 = $request->no21;
        $factibilidad->no22 = $request->no22;
        $factibilidad->no23 = $request->no23;
        $factibilidad->no24 = $request->no24;
        $factibilidad->no25 = $request->no25;
        $factibilidad->no26 = $request->no26;
        $factibilidad->no27 = $request->no27;
        $factibilidad->no28 = $request->no28;
        $factibilidad->no29 = $request->no29;
        $factibilidad->no30 = $request->no30;
        $factibilidad->no31 = $request->no31;
        $factibilidad->no32 = $request->no32;
        $factibilidad->no33 = $request->no33;
        $factibilidad->no34 = $request->no34;
        $factibilidad->no35 = $request->no35;
        $factibilidad->no36 = $request->no36;
        $factibilidad->no37 = $request->no37;
        $factibilidad->no38 = $request->no38;
        $factibilidad->no39 = $request->no39;
        $factibilidad->no40 = $request->no40;
        $factibilidad->no41 = $request->no41;
        $factibilidad->no42 = $request->no42;
        $factibilidad->no45 = $request->no45;
        $factibilidad->no46 = $request->no46;
        $factibilidad->no47 = $request->no47;
        $factibilidad->no48 = $request->no48;
        $factibilidad->no49 = $request->no49;
        $factibilidad->no50 = $request->no50;
        $factibilidad->no51 = $request->no51;
        $factibilidad->no52 = $request->no52;
        $factibilidad->no53 = $request->no53;
        $factibilidad->no54 = $request->no54;
        $factibilidad->no55 = $request->no55;
        $factibilidad->no56 = $request->no56;
        $factibilidad->no57 = $request->no57;
        $factibilidad->no58 = $request->no58;
        $factibilidad->no59 = $request->no59;
        $factibilidad->no60 = $request->no60;
        $factibilidad->no61 = $request->no61;
        $factibilidad->no62 = $request->no62;
        $factibilidad->is_active = 1;
        $factibilidad->proyecto_id = $request->proyecto_id;
        $factibilidad->empresa_id = $request->empresa_id;
        $factibilidad->id_user = $id_user;
        $factibilidad -> save();

		return redirect()->route('factibilidad.edit', $request->proyecto_id)->with('info', 'La factibilidad se guardó correctamente');
        
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
        $proyecto = Proyecto::where('id', '=', $id)->get()->first();
        $factibilidad = Factibilidad::where('proyecto_id', '=', $id)->get()->first();

        if($factibilidad==""){
            return view('sc/factibilidad.create', compact('proyecto'));
        }else{
            return view('sc/factibilidad.edit', compact('proyecto', 'factibilidad'));
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
            'no1' => 'required',
        ]);
		
        //id usuario loggeado
        $id_user = auth()->id();

		$factibilidad = Factibilidad::find($request->id);
        $factibilidad->no1 = $request->no1;
        $factibilidad->no2 = $request->no2;
        $factibilidad->no3 = $request->no3;
        $factibilidad->no4 = $request->no4;
        $factibilidad->no5 = $request->no5;
        $factibilidad->no6 = $request->no6;
        $factibilidad->no7 = $request->no7;
        $factibilidad->no8 = $request->no8;
        $factibilidad->no9 = $request->no9;
        $factibilidad->no10 = $request->no10;
        $factibilidad->no11 = $request->no11;
        $factibilidad->no12 = $request->no12;
        $factibilidad->no13 = $request->no13;
        $factibilidad->no14 = $request->no14;
        $factibilidad->no15 = $request->no15;
        $factibilidad->no16 = $request->no16;
        $factibilidad->no17 = $request->no17;
        $factibilidad->no18 = $request->no18;
        $factibilidad->no19 = $request->no19;
        $factibilidad->no20 = $request->no20;
        $factibilidad->no21 = $request->no21;
        $factibilidad->no22 = $request->no22;
        $factibilidad->no23 = $request->no23;
        $factibilidad->no24 = $request->no24;
        $factibilidad->no25 = $request->no25;
        $factibilidad->no26 = $request->no26;
        $factibilidad->no27 = $request->no27;
        $factibilidad->no28 = $request->no28;
        $factibilidad->no29 = $request->no29;
        $factibilidad->no30 = $request->no30;
        $factibilidad->no31 = $request->no31;
        $factibilidad->no32 = $request->no32;
        $factibilidad->no33 = $request->no33;
        $factibilidad->no34 = $request->no34;
        $factibilidad->no35 = $request->no35;
        $factibilidad->no36 = $request->no36;
        $factibilidad->no37 = $request->no37;
        $factibilidad->no38 = $request->no38;
        $factibilidad->no39 = $request->no39;
        $factibilidad->no40 = $request->no40;
        $factibilidad->no41 = $request->no41;
        $factibilidad->no42 = $request->no42;
        $factibilidad->no45 = $request->no45;
        $factibilidad->no46 = $request->no46;
        $factibilidad->no47 = $request->no47;
        $factibilidad->no48 = $request->no48;
        $factibilidad->no49 = $request->no49;
        $factibilidad->no50 = $request->no50;
        $factibilidad->no51 = $request->no51;
        $factibilidad->no52 = $request->no52;
        $factibilidad->no53 = $request->no53;
        $factibilidad->no54 = $request->no54;
        $factibilidad->no55 = $request->no55;
        $factibilidad->no56 = $request->no56;
        $factibilidad->no57 = $request->no57;
        $factibilidad->no58 = $request->no58;
        $factibilidad->no59 = $request->no59;
        $factibilidad->no60 = $request->no60;
        $factibilidad->no61 = $request->no61;
        $factibilidad->no62 = $request->no62;
        $factibilidad->is_active = 1;
        $factibilidad->proyecto_id = $request->proyecto_id;
        $factibilidad->empresa_id = $request->empresa_id;
        $factibilidad->id_user = $id_user;
        $factibilidad -> save();
		
        return redirect()->route('factibilidad.edit', $request->proyecto_id)->with('info', 'La factibilidad se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $seguimiento = Fact_Seguimiento::where('proyecto_id', $id)->delete();
        $factibilidad = Factibilidad::where('proyecto_id', $id)->delete();
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))->get();
        return redirect()->route('factibilidad.index')->with('info', 'La factibilidad se eliminó correctamente');
    }



    public function guardar_factibilidad(Request $request)
    {

        if($request->ajax()){
            $user_id = auth()->id();
            $id = $request->id;
            
            //GUARDAR
            if($id==""){
                $factibilidad = new Factibilidad();
                $factibilidad->no1 = $request->no1;
                $factibilidad->no2 = $request->no2;
                $factibilidad->no3 = $request->no3;
                $factibilidad->no4 = $request->no4;
                $factibilidad->no5 = $request->no5;
                $factibilidad->no6 = $request->no6;
                $factibilidad->no7 = $request->no7;
                $factibilidad->no8 = $request->no8;
                $factibilidad->no9 = $request->no9;
                $factibilidad->no10 = $request->no10;
                $factibilidad->no11 = $request->no11;
                $factibilidad->no12 = $request->no12;
                $factibilidad->no13 = $request->no13;
                $factibilidad->no14 = $request->no14;
                $factibilidad->no15 = $request->no15;
                $factibilidad->no16 = $request->no16;
                $factibilidad->no17 = $request->no17;
                $factibilidad->no18 = $request->no18;
                $factibilidad->no19 = $request->no19;
                $factibilidad->no20 = $request->no20;
                $factibilidad->no21 = $request->no21;
                $factibilidad->no22 = $request->no22;
                $factibilidad->no23 = $request->no23;
                $factibilidad->no24 = $request->no24;
                $factibilidad->no25 = $request->no25;
                $factibilidad->no26 = $request->no26;
                $factibilidad->no27 = $request->no27;
                $factibilidad->no28 = $request->no28;
                $factibilidad->no29 = $request->no29;
                $factibilidad->no30 = $request->no30;
                $factibilidad->no31 = $request->no31;
                $factibilidad->no32 = $request->no32;
                $factibilidad->no33 = $request->no33;
                $factibilidad->no34 = $request->no34;
                $factibilidad->no35 = $request->no35;
                $factibilidad->no36 = $request->no36;
                $factibilidad->no37 = $request->no37;
                $factibilidad->no38 = $request->no38;
                $factibilidad->no39 = $request->no39;
                $factibilidad->no40 = $request->no40;
                $factibilidad->no41 = $request->no41;
                $factibilidad->no42 = $request->no42;
                $factibilidad->no45 = $request->no45;
                $factibilidad->no46 = $request->no46;
                $factibilidad->no47 = $request->no47;
                $factibilidad->no48 = $request->no48;
                $factibilidad->no49 = $request->no49;
                $factibilidad->no50 = $request->no50;
                $factibilidad->no51 = $request->no51;
                $factibilidad->no52 = $request->no52;
                $factibilidad->no53 = $request->no53;
                $factibilidad->no54 = $request->no54;
                $factibilidad->no55 = $request->no55;
                $factibilidad->no56 = $request->no56;
                $factibilidad->no57 = $request->no57;
                $factibilidad->no58 = $request->no58;
                $factibilidad->no59 = $request->no59;
                $factibilidad->no60 = $request->no60;
                $factibilidad->no61 = $request->no61;
                $factibilidad->no62 = $request->no62;
                $factibilidad->is_active = 1;
                $factibilidad->proyecto_id = $request->proyecto_id;
                $factibilidad->empresa_id = $request->empresa_id;
                $factibilidad->id_user = $user_id;
                $factibilidad -> save();
                //SACAR EL ID
                $id = $factibilidad->id;
            }
            
            return response($id);
        }
    }



    public function list_seguimiento(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $proyecto_id = $request->proyecto_id;
        $seguimiento = Fact_Seguimiento::where('proyecto_id', $proyecto_id)
        ->where('empresa_id', $empresa_id)->orderBy('no43')->get();
        
        return datatables()->of($seguimiento)
        ->addColumn('fecha', function ($seguimiento) {
            $html3 = $seguimiento->no43;
            return $html3;
        })
        ->addColumn('resultado', function ($seguimiento) {
            $html4 = $seguimiento->no44;
            return $html4;
        })
        ->addColumn('edit', function ($seguimiento) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_seguimiento('.$seguimiento->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($seguimiento) {
            $html6 = '<button type="button" name="delete" id="'.$seguimiento->id.'" onclick="delete_seguimiento('.$seguimiento->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['fecha', 'resultado', 'edit', 'delete'])
        ->make(true);
    }



    public function create_seguimiento(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_seguimiento = $request->id_seguimiento;
            $no43 = $request->no43;
            $no44 = $request->no44;
            $empresa_id = $request->empresaid_seguimiento;
            $proyecto_id = $request->proyectoid_seguimiento;
            $factibilidad_id = $request->factibilidadid_seguimiento;

            if($id_seguimiento==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $seguimiento = Fact_Seguimiento::where('no43', '=', $no43)
                ->where('empresa_id', '=', $empresa_id)
                ->where('proyecto_id', '=', $proyecto_id)->get()->first();
                //GUARDAR REGISTRO
                if($seguimiento==""){
                    $seg = new Fact_Seguimiento();
                    $seg -> no43 = $request->no43;
                    $seg -> no44 = $request->no44;
                    $seg -> factibilidad_id = $factibilidad_id;
                    $seg -> proyecto_id = $proyecto_id;
                    $seg -> empresa_id = $empresa_id;
                    $seg -> id_user = $user_id;
                    $seg -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $seg = Fact_Seguimiento::find($id_seguimiento);
                $seg -> no43 = $request->no43;
                $seg -> no44 = $request->no44;
                $seg -> factibilidad_id = $factibilidad_id;
                $seg -> proyecto_id = $proyecto_id;
                $seg -> empresa_id = $empresa_id;
                $seg -> id_user = $user_id;
                $seg -> save();
                return response("guardado");
            }
        }
    }



    public function edit_seguimiento(Request $request)
    {
        if($request->ajax()){
            $id_seguimiento = $request->id_seg;
            $seguimiento = Fact_Seguimiento::where('id', '=', $id_seguimiento)
            ->get()->toJson();
            return json_encode($seguimiento);
        }
    }



    public function delete_seguimiento(Request $request)
    {
        if($request->ajax()){
            $id_seg = $request->id_seg;
            $seguimiento = Fact_Seguimiento::where('id', $id_seg)->delete();
            return response("eliminado");
        }
    }



}