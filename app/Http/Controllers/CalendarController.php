<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\Empresas\Empresa;

class CalendarController extends Controller
{
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        $this->middleware('can:calendario.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        $empresas = Empresa::whereHas('users', function($query) use($user_id){
            $query->where('user_id', '=', $user_id);
        })->orderBy('id')->get();

        $emp = [];
        foreach ($empresas as $row){
            $id = $row->id;
            if($id==1){
                $razon_social="Sitio Clínico Chihuahua";
                $emp[$id] = $razon_social;
            }else if($id==2){
                $razon_social="Sitio Clínico México";
                $emp[$id] = $razon_social;
            }else if($id==5){
                $razon_social="TIM";
                $emp[$id] = $razon_social;
            }else if($id==6){
                $razon_social="Taller 23";
                $emp[$id] = $razon_social;
            }else if($id==10){
                $razon_social="Harmonía Chihuahua";
                $emp[$id] = $razon_social;
            }else if($id==11){
                $razon_social="Harmonía Juárez";
                $emp[$id] = $razon_social;
            }else if($id==12){
                $razon_social="Dirección";
                $emp[$id] = $razon_social;
            }
        }
        return view('calendario.index', compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        if($request->ajax()){
            $user_id = auth()->id();
            $id_empresa = $request->empresa_id;
            $id_evento=$request->id_evento;
            $inicio=$request->no3." ".$request->no4;
            $fin=$request->no5." ".$request->no6;
            $cliente = $request->no8;
            $cabina = $request->no12;
            //$color="#800080";
            $textColor="#FFFFFF";

            if($id_empresa==1 || $id_empresa==2 || $id_empresa==5 || $id_empresa==6){
                $title=$request->no1;
                if($user_id == 8){
                    $color="#AF7AC5";
                }else if($user_id == 9){
                    $color="#F78DD5";
                }else if($user_id == 10){
                    $color="#FA8072";
                }else if($user_id == 11){
                    $color="#CD5C5C";
                }else if($user_id == 12){
                    $color="#F4D03F";
                }else if($user_id == 13){
                    $color="#76448A";
                }else if($user_id == 14){
                    $color="#F1948A";
                }else if($user_id == 15){
                    $color="#5499C7";
                }else if($user_id == 16){
                    $color="#F384F5";
                }else if($user_id == 17){
                    $color="#E67E22";
                }else{
                    $color="#5D6D7E";
                }
            }else if($id_empresa==10 || $id_empresa==11){
                $title=$cliente;
                if($cabina == "Libre"){
                    $color="#D5D8DC";
                }else if($cabina == "Cabina 1"){
                    $color="#7DCEA0";
                }else if($cabina == "Cabina 2"){
                    $color="#EB984E";
                }else if($cabina == "Cabina 3"){
                    $color="#85C1E9";
                }else if($cabina == "Doctora Santellanes"){
                    $color="#BB8FCE";
                }else if($cabina == "Doctora Espinoza"){
                    $color="#EF6DC6";
                }else{
                    $color="#F08080";
                }
            }else if($id_empresa==12){
                $title=$request->no1;
                $color="#5D6D7E";
            }
            
            if($id_evento == ""){
                $eve = Calendar::where('title', '=', $title)
                ->where('empresa_id', '=', $id_empresa)
                ->where('start', '=', $inicio)->get()->first();
                if($eve==""){
                    //GUARDAR
                    $evento = new Calendar();
                    $evento->title = $title;
                    $evento->description = $request->no2;
                    $evento->lugar = $request->no7;
                    $evento->cliente = $request->no8;
                    $evento->telefono = $request->no9;
                    $evento->servicio = $request->no10;
                    $evento->tecnico = $request->no11;
                    $evento->cabina = $request->no12;
                    $evento->datos = $request->no13;
                    $evento->sexo = $request->no14;
                    $evento->visita = $request->no15;
                    $evento->diagnostico = $request->no16;
                    $evento->start = $inicio;
                    $evento->end = $fin;
                    $evento->color = $color;
                    $evento->textColor = $textColor;
                    $evento->is_active = 1;
                    $evento->empresa_id = $id_empresa;
                    $evento->id_user = $user_id;
                    $evento -> save();
               
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                //GUARDAR
                $evento = Calendar::find($id_evento);
                $evento->title = $title;
                $evento->description = $request->no2;
                $evento->lugar = $request->no7;
                $evento->cliente = $request->no8;
                $evento->telefono = $request->no9;
                $evento->servicio = $request->no10;
                $evento->tecnico = $request->no11;
                $evento->cabina = $request->no12;
                $evento->datos = $request->no13;
                $evento->sexo = $request->no14;
                $evento->visita = $request->no15;
                $evento->diagnostico = $request->no16;
                $evento->start = $inicio;
                $evento->end = $fin;
                $evento->color = $color;
                $evento->textColor = $textColor;
                $evento->is_active = 1;
                $evento->empresa_id = $id_empresa;
                $evento->id_user = $user_id;
                $evento -> save();
                
                return response("guardado");
                
            }
            //return response($id_empresa);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete(Request $request)
    {
        if($request->ajax()){
            $id_evento = $request->id_evento;
            $eve = Calendar::where('id', $id_evento)->delete();
            return response("eliminado");
        }
    }

    public function get_show(Request $request, $tipo)
    {
        $data['eventos'] = Calendar::where('empresa_id', $tipo)->get();
        return response()->json($data['eventos']);
    }
    

}
