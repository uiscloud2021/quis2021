<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Reclutamiento;
use App\Models\Administracion\PermisoCGoce;
use App\Models\Administracion\PermisoSGoce;
use App\Models\Administracion\Vacaciones;
use App\Models\Administracion\Cont_Contrato;

// Start of uses

class DesarrolloController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:desarrollo.index');//PROTEGE TODAS LAS RUTAS
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
		return view('adm/desarrollo.index', compact('candidatos'));
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
        $vacaciones = Vacaciones::where('candidato_id', '=', $id)->get()->first();

        if($vacaciones == ""){
            return view('adm/desarrollo.create', compact('candidato'));
        }else{
            return view('adm/desarrollo.edit', compact('candidato'));
        }
        //return response($vacaciones);
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
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $permisocgoce = PermisoCGoce::where('candidato_id', $id)->delete();
        $permisosgoce = PermisoSGoce::where('candidato_id', $id)->delete();
        $vacaciones = Vacaciones::where('candidato_id', $id)->delete();
        return redirect()->route('desarrollo.index')->with('info', 'El desarrollo se eliminó correctamente');
    }





    public function list_permisocgoce(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $permiso = PermisoCGoce::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no1')->get();
        
        return datatables()->of($permiso)
        ->addColumn('dias_disponibles', function ($permiso) {
            $id_candidato = $permiso->candidato_id;
            $contrato = Cont_Contrato::where('candidato_id', $id_candidato)
            ->where('no2', 'Contrato tiempo indeterminado')->get()->first();
            
            if($contrato==""){
                $fecha_firma="";
                $dias=0;
            }else{
                $fecha_firma=$contrato->no1;
                $fecha_actual=date('d-m-Y');
                $dateDifference = abs(strtotime($fecha_actual) - strtotime($fecha_firma));
                $meses  = floor($dateDifference / (30 * 60 * 60 * 24));
                if($meses <=5){
                    $dias=0;
                }else if($meses > 5 && $meses < 12){
                    $dias=6;
                }else if($meses > 11 && $meses < 18){
                    $dias=12;
                }else if($meses > 17 && $meses < 24){
                    $dias=18;
                }else if($meses > 23 && $meses < 30){
                    $dias=24;
                }else if($meses > 29 && $meses < 36){
                    $dias=30;
                }else if($meses > 35 && $meses < 42){
                    $dias=36;
                }else if($meses > 41 && $meses < 48){
                    $dias=42;
                }else if($meses > 47 && $meses < 54){
                    $dias=48;
                }else if($meses > 53 && $meses < 60){
                    $dias=54;
                }else if($meses > 59 && $meses < 66){
                    $dias=60;
                }else if($meses > 65 && $meses < 72){
                    $dias=66;
                }else if($meses > 71 && $meses < 78){
                    $dias=72;
                }else if($meses > 77 && $meses < 84){
                    $dias=78;
                }else if($meses > 83 && $meses < 90){
                    $dias=84;
                }else if($meses > 89 && $meses < 96){
                    $dias=90;
                }else if($meses > 95 && $meses < 102){
                    $dias=96;
                }else if($meses > 101 && $meses < 108){
                    $dias=102;
                }else if($meses > 107 && $meses < 114){
                    $dias=108;
                }else if($meses > 113 && $meses < 120){
                    $dias=114;
                }else if($meses > 119 && $meses < 126){
                    $dias=120;
                }
            }
            return $dias;
        })
        ->addColumn('dias_disfrutados', function ($permiso) {
            $html4 = $permiso->no2;
            return $html4;
        })
        ->addColumn('edit', function ($permiso) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_permisocgoce('.$permiso->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($permiso) {
            $html6 = '<button type="button" name="delete" id="'.$permiso->id.'" onclick="delete_permisocgoce('.$permiso->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['dias_disponibles', 'dias_disfrutados', 'edit', 'delete'])
        ->make(true);
    }



    public function create_permisocgoce(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_permisocgoce = $request->id_permisocgoce;
            $no1 = $request->no1;
            $empresa_id = $request->empresaid_permisocgoce;
            $candidato_id = $request->candidatoid_permisocgoce;

            if($id_permisocgoce==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $permiso = PermisoCGoce::where('no1', '=', $no1)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($permiso==""){
                    $eq = new PermisoCGoce();
                    $eq -> no1 = $request->no1;
                    $eq -> no2 = $request->no2;
                    $eq -> no3 = $request->no3;
                    $eq -> no4 = $request->no4;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = PermisoCGoce::find($id_permisocgoce);
                $eq -> no1 = $request->no1;
                $eq -> no2 = $request->no2;
                $eq -> no3 = $request->no3;
                $eq -> no4 = $request->no4;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_permisocgoce(Request $request)
    {
        if($request->ajax()){
            $id_permisocgoce = $request->id_permisocgoce;
            $permiso = PermisoCGoce::where('id', '=', $id_permisocgoce)
            ->get()->toJson();
            return json_encode($permiso);
        }
    }



    public function delete_permisocgoce(Request $request)
    {
        if($request->ajax()){
            $id_permisocgoce = $request->id_permisocgoce;
            $permiso = PermisoCGoce::where('id', $id_permisocgoce)->delete();
            return response("eliminado");
        }
    }





    public function list_permisosgoce(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $permiso = PermisoSGoce::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no5')->get();
        
        return datatables()->of($permiso)
        ->addColumn('dias_disponibles', function ($permiso) {
            $html3 = 0;
            return $html3;
        })
        ->addColumn('dias_disfrutados', function ($permiso) {
            $html4 = $permiso->no6;
            return $html4;
        })
        ->addColumn('edit', function ($permiso) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_permisosgoce('.$permiso->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($permiso) {
            $html6 = '<button type="button" name="delete" id="'.$permiso->id.'" onclick="delete_permisosgoce('.$permiso->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['dias_disponibles', 'dias_disfrutados', 'edit', 'delete'])
        ->make(true);
    }



    public function create_permisosgoce(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_permisosgoce = $request->id_permisosgoce;
            $no5 = $request->no5;
            $empresa_id = $request->empresaid_permisosgoce;
            $candidato_id = $request->candidatoid_permisosgoce;

            if($id_permisosgoce==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $permiso = PermisoSGoce::where('no5', '=', $no5)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($permiso==""){
                    $eq = new PermisoSGoce();
                    $eq -> no5 = $request->no5;
                    $eq -> no6 = $request->no6;
                    $eq -> no7 = $request->no7;
                    $eq -> no8 = $request->no8;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = PermisoSGoce::find($id_permisosgoce);
                $eq -> no5 = $request->no5;
                $eq -> no6 = $request->no6;
                $eq -> no7 = $request->no7;
                $eq -> no8 = $request->no8;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_permisosgoce(Request $request)
    {
        if($request->ajax()){
            $id_permisosgoce = $request->id_permisosgoce;
            $permiso = PermisoSGoce::where('id', '=', $id_permisosgoce)
            ->get()->toJson();
            return json_encode($permiso);
        }
    }



    public function delete_permisosgoce(Request $request)
    {
        if($request->ajax()){
            $id_permisosgoce = $request->id_permisosgoce;
            $permiso = PermisoSGoce::where('id', $id_permisosgoce)->delete();
            return response("eliminado");
        }
    }






    public function list_vacaciones(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $candidato_id = $request->candidato_id;
        $permiso = Vacaciones::where('candidato_id', $candidato_id)
        ->where('empresa_id', $empresa_id)->orderBy('no9')->get();
        
        return datatables()->of($permiso)
        ->addColumn('dias_disponibles', function ($permiso) {
            $id_candidato = $permiso->candidato_id;
            $contrato = Cont_Contrato::where('candidato_id', $id_candidato)
            ->where('no2', '=', 'Contrato tiempo indeterminado')->get()->first();
            if($contrato==""){
                $fecha_firma="";
                $dias=0;
            }else{
                $fecha_firma=$contrato->no1;
                $fecha_actual=date('d-m-Y');
                $dateDifference = abs(strtotime( $fecha_actual) - strtotime($fecha_firma));
                $anios  = floor($dateDifference / (365 * 60 * 60 * 24));
                if($anios == 0){
                    $dias=0;
                }else if($anios == 1){
                    $dias=6;
                }else if($anios == 2){
                    $dias=8;
                }else if($anios == 3){
                    $dias=10;
                }else if($anios > 3 && $anios <=8){
                    $dias=12;
                }else if($anios > 8 && $anios <=13){
                    $dias=14;
                }else if($anios > 13 && $anios <=18){
                    $dias=16;
                }else if($anios > 18 && $anios <=23){
                    $dias=18;
                }else if($anios == 24){
                    $dias=20;
                }
            }
            return $dias;
        })
        ->addColumn('dias_disfrutados', function ($permiso) {
            $html4 = $permiso->no10;
            return $html4;
        })
        ->addColumn('edit', function ($permiso) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_vacaciones('.$permiso->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($permiso) {
            $html6 = '<button type="button" name="delete" id="'.$permiso->id.'" onclick="delete_vacaciones('.$permiso->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['dias_disponibles', 'dias_disfrutados', 'edit', 'delete'])
        ->make(true);
    }



    public function create_vacaciones(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_vacaciones = $request->id_vacaciones;
            $no9 = $request->no9;
            $empresa_id = $request->empresaid_vacaciones;
            $candidato_id = $request->candidatoid_vacaciones;

            if($id_vacaciones==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $permiso = Vacaciones::where('no9', '=', $no9)
                ->where('empresa_id', '=', $empresa_id)
                ->where('candidato_id', '=', $candidato_id)->get()->first();
                //GUARDAR REGISTRO
                if($permiso==""){
                    $eq = new Vacaciones();
                    $eq -> no9 = $request->no9;
                    $eq -> no10 = $request->no10;
                    $eq -> no11 = $request->no11;
                    $eq -> no12 = $request->no12;
                    $eq -> candidato_id = $candidato_id;
                    $eq -> empresa_id = $empresa_id;
                    $eq -> id_user = $user_id;
                    $eq -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $eq = Vacaciones::find($id_vacaciones);
                $eq -> no9 = $request->no9;
                $eq -> no10 = $request->no10;
                $eq -> no11 = $request->no11;
                $eq -> no12 = $request->no12;
                $eq -> candidato_id = $candidato_id;
                $eq -> empresa_id = $empresa_id;
                $eq -> id_user = $user_id;
                $eq -> save();
                return response("guardado");
            }
        }
    }



    public function edit_vacaciones(Request $request)
    {
        if($request->ajax()){
            $id_vacaciones = $request->id_vacaciones;
            $permiso = Vacaciones::where('id', '=', $id_vacaciones)
            ->get()->toJson();
            return json_encode($permiso);
        }
    }



    public function delete_vacaciones(Request $request)
    {
        if($request->ajax()){
            $id_vacaciones = $request->id_vacaciones;
            $permiso = Vacaciones::where('id', $id_vacaciones)->delete();
            return response("eliminado");
        }
    }


}