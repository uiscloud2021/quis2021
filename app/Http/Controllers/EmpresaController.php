<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Menu;

// Start of uses

class EmpresaController extends Controller
{
    // Start of traits
	
    //CONSTRUCTOR PARA PROTEGER FILES SOLO PARA LOGEADOS
    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:empresas.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
		
		return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();//PARA CHECKBOX
        return view('empresas.create', compact('menus'));
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
            'razon_social' => 'required|unique:empresas',
        ]);

        //id usuario loggeado
        $id_user = auth()->id();
		
		//GUARDAR REGISTROS
        $empresas = new Empresa();
        $empresas->razon_social = $request->razon_social;
	    $empresas->pais = $request->pais;
	    $empresas->figura_legal = $request->figura_legal;
	    $empresas->constitucion = $request->constitucion;
	    $empresas->acta = $request->acta;
	    $empresas->acta_fisico = $request->acta_fisico;
	    $empresas->acta_electronico = $request->acta_electronico;
	    $empresas->rfc = $request->rfc;
	    $empresas->rfc_fisico = $request->rfc_fisico;
	    $empresas->rfc_electronico = $request->rfc_electronico;
	    $empresas->imss = $request->imss;
	    $empresas->imss_obtencioin = $request->imss_obtencioin;
	    $empresas->imss_vencimiento = $request->imss_vencimiento;
	    $empresas->expediente_fisico = $request->expediente_fisico;
	    $empresas->expediente_electronico = $request->expediente_electronico;
	    $empresas->fiel = $request->fiel;
	    $empresas->fiel_obtencion = $request->fiel_obtencion;
	    $empresas->fiel_vencimiento = $request->fiel_vencimiento;
	    $empresas->ciec = $request->ciec;
	    $empresas->fiel_electronico = $request->fiel_electronico;
	    $empresas->ciec_obtencion = $request->ciec_obtencion;
	    $empresas->ciec_vencimiento = $request->ciec_vencimiento;
	    $empresas->ciec_electronico = $request->ciec_electronico;
	    $empresas->representante_sanitario = $request->representante_sanitario;
	    $empresas->justificacion_sanitario = $request->justificacion_sanitario;
        $empresas->user_id = $id_user;
        $empresas -> save();

        if($request->menus){
            $empresas->menus()->attach($request->menus);//GUARDAR LAS RELACIONES
        }

		return redirect()->route('empresas.edit', $empresas)->with('info', 'La empresa se guardó correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $menus = Menu::all();//PARA CHECKBOX
        return view('empresas.edit', compact('empresa', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
		// Start of fields validations for update
		
        //id usuario loggeado
        $id_user = auth()->id();

		$empresa = Empresa::find($empresa->id);
	    $empresa->razon_social = $request->razon_social;
	    $empresa->pais = $request->pais;
	    $empresa->figura_legal = $request->figura_legal;
	    $empresa->constitucion = $request->constitucion;
	    $empresa->acta = $request->acta;
	    $empresa->acta_fisico = $request->acta_fisico;
	    $empresa->acta_electronico = $request->acta_electronico;
	    $empresa->rfc = $request->rfc;
	    $empresa->rfc_fisico = $request->rfc_fisico;
	    $empresa->rfc_electronico = $request->rfc_electronico;
	    $empresa->imss = $request->imss;
	    $empresa->imss_obtencioin = $request->imss_obtencioin;
	    $empresa->imss_vencimiento = $request->imss_vencimiento;
	    $empresa->expediente_fisico = $request->expediente_fisico;
	    $empresa->expediente_electronico = $request->expediente_electronico;
	    $empresa->fiel = $request->fiel;
	    $empresa->fiel_obtencion = $request->fiel_obtencion;
	    $empresa->fiel_vencimiento = $request->fiel_vencimiento;
	    $empresa->ciec = $request->ciec;
	    $empresa->fiel_electronico = $request->fiel_electronico;
	    $empresa->ciec_obtencion = $request->ciec_obtencion;
	    $empresa->ciec_vencimiento = $request->ciec_vencimiento;
	    $empresa->ciec_electronico = $request->ciec_electronico;
	    $empresa->representante_sanitario = $request->representante_sanitario;
	    $empresa->justificacion_sanitario = $request->justificacion_sanitario;
        $empresa->user_id = $id_user;
        $empresa->save();

        if($request->menus){
            $empresa->menus()->sync($request->menus);//CAMBIOS EN TABLA RELACION 
        }
		
        return redirect()->route('empresas.edit',$empresa)->with('info', 'La empresa se modificó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index',$empresa)->with('info', 'La empresa se eliminó correctamente');
    }

}