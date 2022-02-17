<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas\Empresa;
use App\Models\Empresas\Socio;
use App\Models\Empresas\Domicilio;
use App\Models\Empresas\Legal;
use App\Models\Empresas\Documento;
use App\Models\Empresas\Responsabilidad;
use App\Models\Empresas\Sanitario;
use App\Models\Empresas\Cuenta;
use App\Models\Empresas\Propiedad;
use App\Models\Empresas\Vinculacion;
use App\Models\Menu;
use App\Models\User;

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
        $users = User::all();//PARA CHECK
        return view('empresas.create', compact('menus', 'users'));
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
        $id=$request->id;

        if($id==""){
            //VALIDAR CAMPOS
            $request->validate([
                'razon_social' => 'required|unique:empresas',
            ]);

            $empresas = new Empresa();
        }else{
            //VALIDAR CAMPOS
            $request->validate([
                'razon_social' => 'required',
            ]);

            $empresas = Empresa::find($id);
        }
		
		//GUARDAR REGISTROS
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
	    $empresas->fiel_electronico = $request->fiel_electronico;
        $empresas->ciec = $request->ciec;
	    $empresas->ciec_obtencion = $request->ciec_obtencion;
	    $empresas->ciec_vencimiento = $request->ciec_vencimiento;
	    $empresas->ciec_electronico = $request->ciec_electronico;
	    $empresas->representante_sanitario = $request->representante_sanitario;
	    $empresas->justificacion_sanitario = $request->justificacion_sanitario;
        $empresas->id_user = $id_user;
        $empresas -> save();

        if($id==""){
            if($request->menus){
                $empresas->menus()->attach($request->menus);//GUARDAR LAS RELACIONES
            }

            if($request->users){
                $empresas->users()->attach($request->users);//GUARDAR LAS RELACIONES
            }
        }else{
            if($request->menus){
                $empresas->menus()->sync($request->menus);//CAMBIOS EN TABLA RELACION 
            }
    
            if($request->users){
                $empresas->users()->sync($request->users);//CAMBIOS EN TABLA RELACION
            }
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
        $users = User::all();//PARA CHECK
        return view('empresas.edit', compact('empresa', 'menus', 'users'));
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
	    $empresa->fiel_electronico = $request->fiel_electronico;
        $empresa->ciec = $request->ciec;
	    $empresa->ciec_obtencion = $request->ciec_obtencion;
	    $empresa->ciec_vencimiento = $request->ciec_vencimiento;
	    $empresa->ciec_electronico = $request->ciec_electronico;
	    $empresa->representante_sanitario = $request->representante_sanitario;
	    $empresa->justificacion_sanitario = $request->justificacion_sanitario;
        $empresa->id_user = $id_user;
        $empresa->save();

        if($request->menus){
            $empresa->menus()->sync($request->menus);//CAMBIOS EN TABLA RELACION 
        }

        if($request->users){
            $empresa->users()->sync($request->users);//CAMBIOS EN TABLA RELACION
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
        $socio = Socio::where('empresa_id', $empresa->id)->delete();
        $domicilio = Domicilio::where('empresa_id', $empresa->id)->delete();
        $legal = Legal::where('empresa_id', $empresa->id)->delete();
        $documento = Documento::where('empresa_id', $empresa->id)->delete();
        $resp = Responsabilidad::where('empresa_id', $empresa->id)->delete();
        $sanitario = Sanitario::where('empresa_id', $empresa->id)->delete();
        $cuenta = Cuenta::where('empresa_id', $empresa->id)->delete();
        $prop = Propiedad::where('empresa_id', $empresa->id)->delete();
        $vinc = Vinculacion::where('empresa_id', $empresa->id)->delete();
        $empresa->delete();
        return redirect()->route('empresas.index',$empresa)->with('info', 'La empresa se eliminó correctamente');
    }


    public function guardar_empresa(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $empresa_id = $request->id;
            
            //GUARDAR EMPRESA
            if($empresa_id==""){
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
	            $empresas->fiel_electronico = $request->fiel_electronico;
                $empresas->ciec = $request->ciec;
	            $empresas->ciec_obtencion = $request->ciec_obtencion;
	            $empresas->ciec_vencimiento = $request->ciec_vencimiento;
	            $empresas->ciec_electronico = $request->ciec_electronico;
	            $empresas->representante_sanitario = $request->representante_sanitario;
	            $empresas->justificacion_sanitario = $request->justificacion_sanitario;
                $empresas->id_user = $user_id;
                $empresas -> save();
                //SACAR EL ID_EMPRESA GUARDADA
                $empresa_id = $empresas->id;
                if($request->menus){
                    $empresas->menus()->attach($request->menus);//GUARDAR LAS RELACIONES
                }
            }
            
            return response($empresa_id);
        }
    }



    public function list_socios(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $socios = Socio::where('empresa_id', $empresa_id)->orderBy('socio')->get();
        
        return datatables()->of($socios)
        ->addColumn('socio', function ($socios) {
            $html1 = $socios->socio;
            return $html1;
        })
        ->addColumn('participacion', function ($socios) {
            $html2 = $socios->participacion;
            return $html2;
        })
        ->addColumn('inicio', function ($socios) {
            $html3 = $socios->inicio;
            return $html3;
        })
        ->addColumn('fin', function ($socios) {
            $html4 = $socios->fin;
            return $html4;
        })
        ->addColumn('edit', function ($socios) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_socios('.$socios->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($socios) {
            $html6 = '<button type="button" name="delete" id="'.$socios->id.'" onclick="delete_socios('.$socios->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['socio', 'participacion', 'inicio', 'fin', 'edit', 'delete'])
        ->make(true);
    }



    public function create_socios(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_socio = $request->id_socio;
            $nombre_socio = $request->nombre_socio;
            $empresa_id = $request->empresaid_socio;

            if($id_socio==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_socio = Socio::where('socio', '=', $nombre_socio)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_socio==""){
                    $socios = new Socio();
                    $socios -> socio = $request->nombre_socio;
                    $socios -> participacion = $request->participacion_socio;
                    $socios -> tarjeta_contacto = $request->tarjeta_socio;
                    $socios -> inicio = $request->inicio_socio;
                    $socios -> fin = $request->fin_socio;
                    $socios -> empresa_id = $empresa_id;
                    $socios -> id_user = $user_id;
                    $socios -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $socios = Socio::find($id_socio);
                $socios -> socio = $request->nombre_socio;
                $socios -> participacion = $request->participacion_socio;
                $socios -> tarjeta_contacto = $request->tarjeta_socio;
                $socios -> inicio = $request->inicio_socio;
                $socios -> fin = $request->fin_socio;
                $socios -> empresa_id = $empresa_id;
                $socios -> id_user = $user_id;
                $socios -> save();
                return response("guardado");
            }
        }
    }



    public function edit_socios(Request $request)
    {
        if($request->ajax()){
            $id_socio = $request->id_socio;
            $socio = Socio::where('id', '=', $id_socio)
            ->get()->toJson();
            return json_encode($socio);
        }
    }



    public function delete_socios(Request $request)
    {
        if($request->ajax()){
            $id_socio = $request->id_socio;
            $socio = Socio::where('id', $id_socio)->delete();
            return response("eliminado");
        }
    }



    public function list_domicilios(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $domicilios = Domicilio::where('empresa_id', $empresa_id)->orderBy('domicilio')->get();
        
        return datatables()->of($domicilios)
        ->addColumn('domicilio', function ($domicilios) {
            $html1 = $domicilios->domicilio;
            return $html1;
        })
        ->addColumn('fiscal', function ($domicilios) {
            $html2 = $domicilios->fiscal;
            return $html2;
        })
        ->addColumn('edit', function ($domicilios) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_domicilios('.$domicilios->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($domicilios) {
            $html6 = '<button type="button" name="delete" id="'.$domicilios->id.'" onclick="delete_domicilios('.$domicilios->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['domicilio', 'fiscal', 'edit', 'delete'])
        ->make(true);
    }



    public function create_domicilios(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_domicilio = $request->id_domicilio;
            $domicilio = $request->direccion_domicilio;
            $empresa_id = $request->empresaid_domicilio;

            if($id_domicilio==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_domicilio = Domicilio::where('domicilio', '=', $domicilio)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_domicilio==""){
                    $domicilios = new Domicilio();
                    $domicilios -> domicilio = $request->direccion_domicilio;
                    $domicilios -> fiscal = $request->fiscal_domicilio;
                    $domicilios -> tiene_comprobante = $request->tienec_domicilio;
                    $domicilios -> comprobante = $request->comprobante_domicilio;
                    $domicilios -> empresa_id = $empresa_id;
                    $domicilios -> id_user = $user_id;
                    $domicilios -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $domicilios = Domicilio::find($id_domicilio);
                $domicilios -> domicilio = $request->direccion_domicilio;
                $domicilios -> fiscal = $request->fiscal_domicilio;
                $domicilios -> tiene_comprobante = $request->tienec_domicilio;
                $domicilios -> comprobante = $request->comprobante_domicilio;
                $domicilios -> empresa_id = $empresa_id;
                $domicilios -> id_user = $user_id;
                $domicilios -> save();
                return response("guardado");
            }
        }
    }



    public function edit_domicilios(Request $request)
    {
        if($request->ajax()){
            $id_domicilio = $request->id_domicilio;
            $domicilio = Domicilio::where('id', '=', $id_domicilio)
            ->get()->toJson();
            return json_encode($domicilio);
        }
    }



    public function delete_domicilios(Request $request)
    {
        if($request->ajax()){
            $id_domicilio = $request->id_domicilio;
            $domicilio = Domicilio::where('id', $id_domicilio)->delete();
            return response("eliminado");
        }
    }



    public function list_legal(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $legales = Legal::where('empresa_id', $empresa_id)->orderBy('representante')->get();
        
        return datatables()->of($legales)
        ->addColumn('representante', function ($legales) {
            $html1 = $legales->representante;
            return $html1;
        })
        ->addColumn('inicio', function ($legales) {
            $html2 = $legales->inicio;
            return $html2;
        })
        ->addColumn('fin', function ($legales) {
            $html3 = $legales->fin;
            return $html3;
        })
        ->addColumn('edit', function ($legales) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_legal('.$legales->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($legales) {
            $html6 = '<button type="button" name="delete" id="'.$legales->id.'" onclick="delete_legal('.$legales->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['representante', 'inicio', 'fin', 'edit', 'delete'])
        ->make(true);
    }



    public function create_legal(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_legal = $request->id_legal;
            $nombre = $request->nombre_legal;
            $empresa_id = $request->empresaid_legal;

            if($id_legal==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_legal = Legal::where('representante', '=', $nombre)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_legal==""){
                    $legales = new Legal();
                    $legales -> representante = $request->nombre_legal;
                    $legales -> inicio = $request->inicio_legal;
                    $legales -> tarjeta = $request->tarjeta_legal;
                    $legales -> fiel = $request->fiel_legal;
                    $legales -> fin = $request->fin_legal;
                    $legales -> empresa_id = $empresa_id;
                    $legales -> id_user = $user_id;
                    $legales -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $legales = Legal::find($id_legal);
                $legales -> representante = $request->nombre_legal;
                $legales -> inicio = $request->inicio_legal;
                $legales -> tarjeta = $request->tarjeta_legal;
                $legales -> fiel = $request->fiel_legal;
                $legales -> fin = $request->fin_legal;
                $legales -> empresa_id = $empresa_id;
                $legales -> id_user = $user_id;
                $legales -> save();
                return response("guardado");
            }
        }
    }



    public function edit_legal(Request $request)
    {
        if($request->ajax()){
            $id_legal = $request->id_legal;
            $legal = Legal::where('id', '=', $id_legal)
            ->get()->toJson();
            return json_encode($legal);
        }
    }



    public function delete_legal(Request $request)
    {
        if($request->ajax()){
            $id_legal = $request->id_legal;
            $legal = Legal::where('id', $id_legal)->delete();
            return response("eliminado");
        }
    }



    public function list_documentos(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $documentos = Documento::where('empresa_id', $empresa_id)->orderBy('documento')->get();
        
        return datatables()->of($documentos)
        ->addColumn('representante', function ($documentos) {
            $html1 = $documentos->documento;
            return $html1;
        })
        ->addColumn('revision', function ($documentos) {
            $html2 = $documentos->revision;
            return $html2;
        })
        ->addColumn('verificacion', function ($documentos) {
            $html3 = $documentos->verificacion;
            return $html3;
        })
        ->addColumn('edit', function ($documentos) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_documentos('.$documentos->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($documentos) {
            $html6 = '<button type="button" name="delete" id="'.$documentos->id.'" onclick="delete_documentos('.$documentos->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['documento', 'revision', 'verificacion', 'edit', 'delete'])
        ->make(true);
    }



    public function create_documentos(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_documento = $request->id_documento;
            $nombre = $request->nombre_documento;
            $empresa_id = $request->empresaid_documento;

            if($id_documento==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_documento = Documento::where('documento', '=', $nombre)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_documento==""){
                    $documentos = new Documento();
                    $documentos -> documento = $request->nombre_documento;
                    $documentos -> revision = $request->revision_documento;
                    $documentos -> vigencia = $request->vigencia_documento;
                    $documentos -> vigente = $request->vigente_documento;
                    $documentos -> baja = $request->baja_documento;
                    $documentos -> sustituye = $request->sustituye_documento;
                    $documentos -> subio = $request->subio_documento;
                    $documentos -> verificacion = $request->verifica_documento;
                    $documentos -> verifico = $request->verifico_documento;
                    $documentos -> empresa_id = $empresa_id;
                    $documentos -> id_user = $user_id;
                    $documentos -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $documentos = Documento::find($id_documento);
                $documentos -> documento = $request->nombre_documento;
                $documentos -> revision = $request->revision_documento;
                $documentos -> vigencia = $request->vigencia_documento;
                $documentos -> vigente = $request->vigente_documento;
                $documentos -> baja = $request->baja_documento;
                $documentos -> sustituye = $request->sustituye_documento;
                $documentos -> subio = $request->subio_documento;
                $documentos -> verificacion = $request->verifica_documento;
                $documentos -> verifico = $request->verifico_documento;
                $documentos -> empresa_id = $empresa_id;
                $documentos -> id_user = $user_id;
                $documentos -> save();
                return response("guardado");
            }
        }
    }



    public function edit_documentos(Request $request)
    {
        if($request->ajax()){
            $id_documento = $request->id_documento;
            $documento = Documento::where('id', '=', $id_documento)
            ->get()->toJson();
            return json_encode($documento);
        }
    }



    public function delete_documentos(Request $request)
    {
        if($request->ajax()){
            $id_documento = $request->id_documento;
            $documento = Documento::where('id', $id_documento)->delete();
            return response("eliminado");
        }
    }



    public function list_responsabilidades(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $responsabilidades = Responsabilidad::where('empresa_id', $empresa_id)->orderBy('actividad')->get();
        
        return datatables()->of($responsabilidades)
        ->addColumn('actividad', function ($responsabilidades) {
            $html1 = $responsabilidades->actividad;
            return $html1;
        })
        ->addColumn('autoridad', function ($responsabilidades) {
            $html2 = $responsabilidades->autoridad;
            return $html2;
        })
        ->addColumn('autorizacion', function ($responsabilidades) {
            $html3 = $responsabilidades->autorizacion;
            return $html3;
        })
        ->addColumn('edit', function ($responsabilidades) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_responsabilidades('.$responsabilidades->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($responsabilidades) {
            $html6 = '<button type="button" name="delete" id="'.$responsabilidades->id.'" onclick="delete_responsabilidades('.$responsabilidades->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['actividad', 'autoridad', 'autorizacion', 'edit', 'delete'])
        ->make(true);
    }



    public function create_responsabilidades(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_responsabilidad = $request->id_responsabilidad;
            $actividad = $request->actividad_responsabilidad;
            $empresa_id = $request->empresaid_responsabilidad;

            if($id_responsabilidad==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_responsabilidad = Responsabilidad::where('actividad', '=', $actividad)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_responsabilidad==""){
                    $responsabilidades = new Responsabilidad();
                    $responsabilidades -> actividad = $request->actividad_responsabilidad;
                    $responsabilidades -> autoridad = $request->autoridad_responsabilidad;
                    $responsabilidades -> evidencia = $request->evidencia_responsabilidad;
                    $responsabilidades -> autorizacion = $request->autorizacion_responsabilidad;
                    $responsabilidades -> vigencia = $request->vigencia_responsabilidad;
                    $responsabilidades -> cumplir = $request->cumplir_responsabilidad;
                    $responsabilidades -> cumplimiento = $request->cumplimiento_responsabilidad;
                    $responsabilidades -> evidencia2 = $request->evidencia2_responsabilidad;
                    $responsabilidades -> vigencia2 = $request->vigencia2_responsabilidad;
                    $responsabilidades -> empresa_id = $empresa_id;
                    $responsabilidades -> id_user = $user_id;
                    $responsabilidades -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $responsabilidades = Responsabilidad::find($id_responsabilidad);
                $responsabilidades -> actividad = $request->actividad_responsabilidad;
                $responsabilidades -> autoridad = $request->autoridad_responsabilidad;
                $responsabilidades -> evidencia = $request->evidencia_responsabilidad;
                $responsabilidades -> autorizacion = $request->autorizacion_responsabilidad;
                $responsabilidades -> vigencia = $request->vigencia_responsabilidad;
                $responsabilidades -> cumplir = $request->cumplir_responsabilidad;
                $responsabilidades -> cumplimiento = $request->cumplimiento_responsabilidad;
                $responsabilidades -> evidencia2 = $request->evidencia2_responsabilidad;
                $responsabilidades -> vigencia2 = $request->vigencia2_responsabilidad;
                $responsabilidades -> empresa_id = $empresa_id;
                $responsabilidades -> id_user = $user_id;
                $responsabilidades -> save();
                return response("guardado");
            }
        }
    }



    public function edit_responsabilidades(Request $request)
    {
        if($request->ajax()){
            $id_responsabilidad = $request->id_responsabilidad;
            $responsabilidad = Responsabilidad::where('id', '=', $id_responsabilidad)
            ->get()->toJson();
            return json_encode($responsabilidad);
        }
    }



    public function delete_responsabilidades(Request $request)
    {
        if($request->ajax()){
            $id_responsabilidad = $request->id_responsabilidad;
            $responsabilidad = Responsabilidad::where('id', $id_responsabilidad)->delete();
            return response("eliminado");
        }
    }



    public function list_sanitario(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $sanitarios = Sanitario::where('empresa_id', $empresa_id)->orderBy('nombre')->get();
        
        return datatables()->of($sanitarios)
        ->addColumn('nombre', function ($sanitarios) {
            $html1 = $sanitarios->nombre;
            return $html1;
        })
        ->addColumn('inicio', function ($sanitarios) {
            $html2 = $sanitarios->inicio;
            return $html2;
        })
        ->addColumn('fin', function ($sanitarios) {
            $html3 = $sanitarios->fin;
            return $html3;
        })
        ->addColumn('edit', function ($sanitarios) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_sanitario('.$sanitarios->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($sanitarios) {
            $html6 = '<button type="button" name="delete" id="'.$sanitarios->id.'" onclick="delete_sanitario('.$sanitarios->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'inicio', 'fin', 'edit', 'delete'])
        ->make(true);
    }



    public function create_sanitario(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_sanitario = $request->id_sanitario;
            $sanitario = $request->nombre_sanitario;
            $empresa_id = $request->empresaid_sanitario;

            if($id_sanitario==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_sanitario = Sanitario::where('nombre', '=', $sanitario)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_sanitario==""){
                    $sanitarios = new Sanitario();
                    $sanitarios -> nombre = $request->nombre_sanitario;
                    $sanitarios -> contacto = $request->contacto_sanitario;
                    $sanitarios -> fisico = $request->fisico_sanitario;
                    $sanitarios -> electronico = $request->electronico_sanitario;
                    $sanitarios -> cedula = $request->cedula_sanitario;
                    $sanitarios -> verifico_cedula = $request->verificocedula_sanitario;
                    $sanitarios -> copia_cedula = $request->copiacedula_sanitario;
                    $sanitarios -> inicio = $request->inicio_sanitario;
                    $sanitarios -> fin = $request->fin_sanitario;
                    $sanitarios -> empresa_id = $empresa_id;
                    $sanitarios -> id_user = $user_id;
                    $sanitarios -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $sanitarios = Sanitario::find($id_sanitario);
                $sanitarios -> nombre = $request->nombre_sanitario;
                $sanitarios -> contacto = $request->contacto_sanitario;
                $sanitarios -> fisico = $request->fisico_sanitario;
                $sanitarios -> electronico = $request->electronico_sanitario;
                $sanitarios -> cedula = $request->cedula_sanitario;
                $sanitarios -> verifico_cedula = $request->verificocedula_sanitario;
                $sanitarios -> copia_cedula = $request->copiacedula_sanitario;
                $sanitarios -> inicio = $request->inicio_sanitario;
                $sanitarios -> fin = $request->fin_sanitario;
                $sanitarios -> empresa_id = $empresa_id;
                $sanitarios -> id_user = $user_id;
                $sanitarios -> save();
                return response("guardado");
            }
        }
    }



    public function edit_sanitario(Request $request)
    {
        if($request->ajax()){
            $id_sanitario = $request->id_sanitario;
            $sanitario = Sanitario::where('id', '=', $id_sanitario)
            ->get()->toJson();
            return json_encode($sanitario);
        }
    }



    public function delete_sanitario(Request $request)
    {
        if($request->ajax()){
            $id_sanitario = $request->id_sanitario;
            $sanitario = Sanitario::where('id', $id_sanitario)->delete();
            return response("eliminado");
        }
    }



    public function list_cuentas(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $cuentas = Cuenta::where('empresa_id', $empresa_id)->orderBy('nombre')->get();
        
        return datatables()->of($cuentas)
        ->addColumn('nombre', function ($cuentas) {
            $html1 = $cuentas->nombre;
            return $html1;
        })
        ->addColumn('sucursal', function ($cuentas) {
            $html2 = $cuentas->sucursal;
            return $html2;
        })
        ->addColumn('clabe', function ($cuentas) {
            $html3 = $cuentas->clabe;
            return $html3;
        })
        ->addColumn('edit', function ($cuentas) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_cuentas('.$cuentas->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($cuentas) {
            $html6 = '<button type="button" name="delete" id="'.$cuentas->id.'" onclick="delete_cuentas('.$cuentas->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'sucursal', 'clabe', 'edit', 'delete'])
        ->make(true);
    }



    public function create_cuentas(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_cuenta = $request->id_cuenta;
            $cuenta = $request->nombre_cuenta;
            $empresa_id = $request->empresaid_cuenta;

            if($id_cuenta==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_cuenta = Cuenta::where('nombre', '=', $cuenta)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_cuenta==""){
                    $cuentas = new Cuenta();
                    $cuentas -> nombre = $request->nombre_cuenta;
                    $cuentas -> sucursal = $request->sucursal_cuenta;
                    $cuentas -> direccion = $request->direccion_cuenta;
                    $cuentas -> ciudad = $request->ciudad_cuenta;
                    $cuentas -> clabe = $request->clabe_cuenta;
                    $cuentas -> swift = $request->swift_cuenta;
                    $cuentas -> moneda = $request->moneda_cuenta;
                    $cuentas -> activa = $request->activa_cuenta;
                    $cuentas -> empresa_id = $empresa_id;
                    $cuentas -> id_user = $user_id;
                    $cuentas -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $cuentas = Cuenta::find($id_cuenta);
                $cuentas -> nombre = $request->nombre_cuenta;
                $cuentas -> sucursal = $request->sucursal_cuenta;
                $cuentas -> direccion = $request->direccion_cuenta;
                $cuentas -> ciudad = $request->ciudad_cuenta;
                $cuentas -> clabe = $request->clabe_cuenta;
                $cuentas -> swift = $request->swift_cuenta;
                $cuentas -> moneda = $request->moneda_cuenta;
                $cuentas -> activa = $request->activa_cuenta;
                $cuentas -> empresa_id = $empresa_id;
                $cuentas -> id_user = $user_id;
                $cuentas -> save();
                return response("guardado");
            }
        }
    }



    public function edit_cuentas(Request $request)
    {
        if($request->ajax()){
            $id_cuenta = $request->id_cuenta;
            $cuenta = Cuenta::where('id', '=', $id_cuenta)
            ->get()->toJson();
            return json_encode($cuenta);
        }
    }



    public function delete_cuentas(Request $request)
    {
        if($request->ajax()){
            $id_cuenta = $request->id_cuenta;
            $cuenta = Cuenta::where('id', $id_cuenta)->delete();
            return response("eliminado");
        }
    }



    public function list_propiedad(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $propiedad = Propiedad::where('empresa_id', $empresa_id)->orderBy('nombre')->get();
        
        return datatables()->of($propiedad)
        ->addColumn('nombre', function ($propiedad) {
            $html1 = $propiedad->nombre;
            return $html1;
        })
        ->addColumn('registro', function ($propiedad) {
            $html2 = $propiedad->registro;
            return $html2;
        })
        ->addColumn('inicio', function ($propiedad) {
            $html3 = $propiedad->inicio;
            return $html3;
        })
        ->addColumn('edit', function ($propiedad) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_propiedad('.$propiedad->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($propiedad) {
            $html6 = '<button type="button" name="delete" id="'.$propiedad->id.'" onclick="delete_propiedad('.$propiedad->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'registro', 'inicio', 'edit', 'delete'])
        ->make(true);
    }



    public function create_propiedad(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_propiedad = $request->id_propiedad;
            $propiedad = $request->nombre_propiedad;
            $empresa_id = $request->empresaid_propiedad;

            if($id_propiedad==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_propiedad = Propiedad::where('nombre', '=', $propiedad)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_propiedad==""){
                    $propiedades = new Propiedad();
                    $propiedades -> nombre = $request->nombre_propiedad;
                    $propiedades -> registro = $request->registro_propiedad;
                    $propiedades -> descripcion = $request->descripcion_propiedad;
                    $propiedades -> utilidad = $request->utilidad_propiedad;
                    $propiedades -> inicio = $request->inicio_propiedad;
                    $propiedades -> numero = $request->numero_propiedad;
                    $propiedades -> fecha_registro = $request->fechareg_propiedad;
                    $propiedades -> vencimiento = $request->vencimiento_propiedad;
                    $propiedades -> autor = $request->autor_propiedad;
                    $propiedades -> porcentaje = $request->porcentaje_propiedad;
                    $propiedades -> archivo = $request->archivo_propiedad;
                    $propiedades -> empresa_id = $empresa_id;
                    $propiedades -> id_user = $user_id;
                    $propiedades -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $propiedades = Propiedad::find($id_propiedad);
                $propiedades -> nombre = $request->nombre_propiedad;
                $propiedades -> registro = $request->registro_propiedad;
                $propiedades -> descripcion = $request->descripcion_propiedad;
                $propiedades -> utilidad = $request->utilidad_propiedad;
                $propiedades -> inicio = $request->inicio_propiedad;
                $propiedades -> numero = $request->numero_propiedad;
                $propiedades -> fecha_registro = $request->fechareg_propiedad;
                $propiedades -> vencimiento = $request->vencimiento_propiedad;
                $propiedades -> autor = $request->autor_propiedad;
                $propiedades -> porcentaje = $request->porcentaje_propiedad;
                $propiedades -> archivo = $request->archivo_propiedad;
                $propiedades -> empresa_id = $empresa_id;
                $propiedades -> id_user = $user_id;
                $propiedades -> save();
                return response("guardado");
            }
        }
    }



    public function edit_propiedad(Request $request)
    {
        if($request->ajax()){
            $id_propiedad = $request->id_propiedad;
            $propiedad = Propiedad::where('id', '=', $id_propiedad)
            ->get()->toJson();
            return json_encode($propiedad);
        }
    }



    public function delete_propiedad(Request $request)
    {
        if($request->ajax()){
            $id_propiedad = $request->id_propiedad;
            $propiedad = Propiedad::where('id', $id_propiedad)->delete();
            return response("eliminado");
        }
    }



    public function list_vinculacion(Request $request)
    {
        $user_id = auth()->id();
        $empresa_id = $request->empresa_id;
        $vinculacion = Vinculacion::where('empresa_id', $empresa_id)->orderBy('nombre')->get();
        
        return datatables()->of($vinculacion)
        ->addColumn('nombre', function ($vinculacion) {
            $html1 = $vinculacion->nombre;
            return $html1;
        })
        ->addColumn('firma', function ($vinculacion) {
            $html2 = $vinculacion->firma;
            return $html2;
        })
        ->addColumn('vigencia', function ($vinculacion) {
            $html3 = $vinculacion->vigencia;
            return $html3;
        })
        ->addColumn('edit', function ($vinculacion) {
            $html5 = '<a class="btn btn-info btn-sm" title="Editar" href="javascript:void(0)" onclick="edit_vinculacion('.$vinculacion->id.')"><span class="fas fa-edit"></span></a>';
            return $html5;
        })
        ->addColumn('delete', function ($vinculacion) {
            $html6 = '<button type="button" name="delete" id="'.$vinculacion->id.'" onclick="delete_vinculacion('.$vinculacion->id.');" title="Eliminar" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
            return $html6;
        })
        ->rawColumns(['nombre', 'firma', 'vigencia', 'edit', 'delete'])
        ->make(true);
    }



    public function create_vinculacion(Request $request)
    {
        if($request->ajax()){
            $user_id = auth()->id();
            $id_vinculacion = $request->id_vinculacion;
            $vinculacion = $request->nombre_vinculacion;
            $empresa_id = $request->empresaid_vinculacion;

            if($id_vinculacion==""){
                //CONSULTA PARA SABER SI YA ESTA CAPTURADO EL SOCIO EN LA EMPRESA
                $name_vinculacion = Vinculacion::where('nombre', '=', $vinculacion)
                ->where('empresa_id', '=', $empresa_id)->get()->first();
                //GUARDAR REGISTRO
                if($name_vinculacion==""){
                    $vinculaciones = new Vinculacion();
                    $vinculaciones -> nombre = $request->nombre_vinculacion;
                    $vinculaciones -> firma = $request->firma_vinculacion;
                    $vinculaciones -> vigencia = $request->vigencia_vinculacion;
                    $vinculaciones -> empresa_id = $empresa_id;
                    $vinculaciones -> id_user = $user_id;
                    $vinculaciones -> save();
                    return response("guardado");
                }else{
                    return response("singuardar");
                }
            }else{
                $vinculaciones = Vinculacion::find($id_vinculacion);
                $vinculaciones -> nombre = $request->nombre_vinculacion;
                $vinculaciones -> firma = $request->firma_vinculacion;
                $vinculaciones -> vigencia = $request->vigencia_vinculacion;
                $vinculaciones -> empresa_id = $empresa_id;
                $vinculaciones -> id_user = $user_id;
                $vinculaciones -> save();
                return response("guardado");
            }
        }
    }



    public function edit_vinculacion(Request $request)
    {
        if($request->ajax()){
            $id_vinculacion = $request->id_vinculacion;
            $vinculacion = Vinculacion::where('id', '=', $id_vinculacion)
            ->get()->toJson();
            return json_encode($vinculacion);
        }
    }



    public function delete_vinculacion(Request $request)
    {
        if($request->ajax()){
            $id_vinculacion = $request->id_vinculacion;
            $vinculacion = Vinculacion::where('id', $id_vinculacion)->delete();
            return response("eliminado");
        }
    }

}