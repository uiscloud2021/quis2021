<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DocumentosAD\Documentos_ad_capacitacion;
use App\Models\DocumentosAD\Documentos_ad_formatos;
use App\Models\DocumentosAD\Documentos_ad_instructivos;
use App\Models\DocumentosAD\Documentos_ad_manuales;
use App\Models\DocumentosAD\Documentos_ad_procedimientos;
use App\Models\DocumentosAD\Documentos_ad_procesos;

use App\Models\DocumentosAD\Formatos_ad;

use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Investigador;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Carbon\Carbon;

class DocumentosADController extends Controller
{

    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:documentos_ad.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos_manuales = Documentos_ad_manuales::all();
        $documentos_procesos = Documentos_ad_procesos::all();
        $documentos_capacitacion = Documentos_ad_capacitacion::all();
        $documentos_instructivos = Documentos_ad_instructivos::all();
        $documentos_procedimientos = Documentos_ad_procedimientos::all();
        $documentos_formatos = Documentos_ad_formatos::orderBy('nombre_doc', 'asc')->pluck('nombre_doc', 'id');
        $last_format = Documentos_ad_formatos::orderBy('id', 'desc')->select('id')->first();
        $last_format = $last_format->id;
        
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))
        ->where('no27', '<>', 'Cerrado')->where('no9', '=', 'Si')->get();
        
        return view('documentos_ad.index', compact('documentos_manuales', 'documentos_procesos', 'documentos_capacitacion', 'documentos_instructivos', 'documentos_procedimientos', 'documentos_formatos', 'proyectos', 'last_format'));
        // return view('documentos_ad.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_formato(Request $request)
    {		
        if($request->ajax()){
            $formato_id = $request->formato_id;
            $formato = Formatos_ad::where('id', $formato_id)->get()->first()->toJson();
            
            $formato = json_encode($formato);

            return $formato;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete_formato(Request $request)
    {		
        if($request->ajax()){
        
            $formato_id = $request->formato_id;
            $formato = Formatos_ad::where('id', $formato_id)->delete();

            if ($formato > 0) {
                return response('eliminado');
            }else{
                return response(null);
            }

        }
    }

    public function codigos_nombre(Request $request){

        if ($request->proyecto_id) {
          $cd = Proyecto::where('id', $request->proyecto_id)->get()->first();
          $nombre = $cd->no18." - ".$cd->no20;
          return response($nombre);
        }
    
    }

    public function datos_protocolo(Request $request){

        //condici贸n para saber si el request tiene datos o no
        if ($request->proyecto_id) {
            // $proyectos = Proyecto::where('id', $request->proyecto_id)->get()->toJson();
            $proyectos = Proyecto::where('proyectos.id', $request->proyecto_id)
            ->join('investigadores', 'proyectos.investigador_id', '=', 'investigadores.id')
            // ->join('empresas', 'proyectos.empresa_id', '=', 'empresas.id')
            // ->join('users', 'proyectos.id_user' , '=', 'users.id')
            ->select('proyectos.*', 'investigadores.*')
            ->get()->toJson();
        
            return json_encode($proyectos);
        }else{
            $json = '{"respuesta":"no se ejecuto la accion"}';
            return json_encode($json);
        }
    
    }

    public function has_form(Request $request)
    {		
        if ($request->ajax()) {
            $formato = Documentos_ad_formatos::where('id', $request->formato_id)->get()->first();
            if ($formato) {
                return $formato;
            } else {
                return null;
            }
        }
    }

    public function download(Request $request, $ruta)
    {		
        return response()->download(storage_path('../public/assets/AD-documents/'  .  $ruta ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download_formato(Request $request, $ruta)
    {		
        $directorio = Documentos_ad_formatos::where('nombre_doc', $ruta)->get()->first();
        return response()->file(storage_path('../public/assets/AD/5. FC-AD/'  .  $directorio->directorio ));
    }

    public function list_formatos(Request $request)
    {
        // $user_id = auth()->id();
        $formato_id = $request->formato_id;
        // $codigo_id = $request->codigo_id;
        
        $formatos = Formatos_ad::where('documento_formato_id', $formato_id)
        ->where('empresa_id', '=', session('id_empresa'))->get();
        // ->where('proyecto_id', '=', $codigo_id)->get();
        
        return datatables()->of($formatos)
        ->addColumn('fecha', function ($formatos) {
        $fecha = $formatos->datos_json;
        $fecha = json_decode($fecha, true);
        $fecha = $fecha[1];
        $fecha = $formatos->created_at;
        $html3 = $fecha;
        return $html3;
        })
        // ->addColumn('fecha_aprob', function ($formatos) {
        // $html4 = $formatos->datos_json;
        // return $html4;
        // })
        ->addColumn('usuario', function ($formatos) {
        $user = $formatos->user_id;
        $user = User::where('id', $user)->get()->first();
        $html4 = $user->name;
        return $html4;
        })
        ->addColumn('download_delete', function ($formatos) {
        $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="/documentos_ad/word/'.$formatos->id. '" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span></a>
        <button type="button" title="Eliminar" name="delete" id="'.$formatos->id.'" onclick="delete_formatos('.$formatos->id.');" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
        // $html5 = '<a class="btn btn-info btn-sm" title="Descargar" onclick="descargar_formadmin('.$formatos->id.');"><span class="far fa-file-pdf"></span></a>
        // <button type="button" title="Eliminar" name="delete" id="'.$formatos->id.'" onclick="delete_formatos('.$formatos->id.');" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
        return $html5;
        })
        ->addColumn('edit', function ($formatos) {
        $html6 = '<button type="button" title="Editar" name="edit" id="'.$formatos->id.'" onclick="edit_formatos('.$formatos->id.');" class="delete btn btn-warning btn-sm"><span class="fas fa-edit"></span></button>';
        return $html6;
        })
        ->rawColumns(['fecha', 'usuario', 'download_delete', 'edit'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_formato(Request $request)
    {		

        if ($request->ajax()) {

        // VALIDAR CAMPOS
        $request->validate([
            'documentoformato_id' => 'required',
        ]);

        // id usuario loggeado
        $id_user = auth()->id();
        $documento_formato_id = $request->documentoformato_id;
        $empresa_id = session('id_empresa');
        $proyecto_id = $request->proyecto_id;
        $menu_id = $request->menu_id;
        $formato_id = $request->formato_id;

        // Create formato
        if (!$formato_id) {

            // $formato = null;

            $datos_json = json_encode($request->all());
            $datos_array = json_decode($datos_json, true);
            $datos = null;
            
            //count para saber cuantos datos son, dependiendo del formulario
            $countArray = count($datos_array);

            for ($i=1; $i < $countArray - 6; $i++) { 
                $key = $documento_formato_id . 'no' . $i;
                $datos[] = $datos_array[$key];
            }
            $datos = json_encode($datos);
            
                // GUARDAR REGISTROS
                $formatos = new Formatos_ad();
                $formatos->documento_formato_id = $request->documentoformato_id;
                $formatos->datos_json = $datos;
                $formatos->empresa_id = $empresa_id;
                $formatos->menu_id = $menu_id;
                // $formatos->proyecto_id = $proyecto_id;
                $formatos->user_id = $id_user;
                $formatos->save();

                if ($formatos) {
                    return response('guardado');
                }else{
                    return response('no guardado');
                }

        // Update formato
        }else{

            $datos_json = json_encode($request->all());
            $datos_array = json_decode($datos_json, true);
            $datos = null;

            //count para saber cuantos datos son, dependiendo del formulario
            $countArray = count($datos_array);
            // TODO: ver que onda con el ultimo valor no se guarda,   ----  talvez ya resuelto 
            // TODO: ver si todavia es $countArray -6, puede que se cambie a 5
            for ($i=1; $i < $countArray - 6; $i++) { 
                $key = $documento_formato_id . 'no' . $i;
                $datos[] = $datos_array[$key];
            }
            $datos = json_encode($datos);


            $formatos = Formatos_ad::find($formato_id);

            $formatos->documento_formato_id = $request->documentoformato_id;
            $formatos->datos_json = $datos;
            //TODO: cambiar para que sea la empresa y el menu correctos
            $formatos->empresa_id = $empresa_id;
            $formatos->menu_id = $menu_id;
            // $formatos->proyecto_id = $proyecto_id;
            $formatos->user_id = $id_user;
            $formatos->save();

            if ($formatos) {
                return response('editado');
            }else{
                return response(null);
            }

        };
            
    
        }
        
    }


    public function word(Request $request, $id)
    {

        $formato = Formatos_ad::where('id', $id)->get()->first();
        $datos = json_decode($formato->datos_json);

        // Obtener Los datos del tipo de formato 
        $nombreDocumento = Documentos_ad_formatos::where('id', $formato['documento_formato_id'])->get()->first();

        $currentTime = Carbon::now();
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/AD/5. FC-AD/' . $nombreDocumento['directorio'] . ''));

        // Documento Confidencialidad de UIS
        if (9 == $formato['documento_formato_id']) {
            $my_template->setValue('nombre', $datos[0]);
            $my_template->setValue('domicilio', $datos[1]);
            $my_template->setValue('telefono', $datos[2]);
        }

        // Documento Cotizacion corta
        if (10 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('puesto', $datos[3]);
            $my_template->setValue('empresa', $datos[4]);
            $my_template->setValue('apellido', $datos[5]);
            $my_template->setValue('faseEstudio', $datos[6]);
            $my_template->setValue('servicio', $datos[7]);
            $my_template->setValue('descripcion', $datos[8]);
            $my_template->setValue('tiempo', $datos[9]);
            $my_template->setValue('total', $datos[10]);
            $my_template->setValue('moneda', $datos[11]);
            $my_template->setValue('pago', $datos[12]);
        }

        // Documento Cotizacion extensa
        if (11 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('puesto', $datos[3]);
            $my_template->setValue('empresa', $datos[4]);
            $my_template->setValue('apellido', $datos[5]);
            $my_template->setValue('faseEstudio', $datos[6]);
            $my_template->setValue('totalSujeto', $datos[7]);
            $my_template->setValue('numMuestra', $datos[8]);
            $my_template->setValue('totalMuestra', $datos[9]);
            $my_template->setValue('servicio', $datos[10]);
            $my_template->setValue('descripcion', $datos[11]);
            $my_template->setValue('tiempo', $datos[12]);
            $my_template->setValue('moneda', $datos[15]);
            $my_template->setValue('total', $datos[16]);
            $my_template->setValue('tiempoTotal', $datos[17]);
            $my_template->setValue('formaPago', $datos[18]);
            
            $my_template->cloneRow('servicioCedula', ((count($datos) - 19) / 2) + 1);
            
            $my_template->setValue('servicioCedula#1', $datos[13]);
            $my_template->setValue('totalServicio#1', $datos[14]);
            
            $aux = 0;
            for ($i = 1; $i < ((count($datos) - 19) / 2) + 1; $i++) { 
                $my_template->setValue('servicioCedula#'.($i+1), htmlspecialchars($datos[$aux + 19], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('totalServicio#'.($i+1), htmlspecialchars($datos[$aux + 20], ENT_COMPAT, 'UTF-8'));
                $aux = $aux + 2;
            }
        }

        // Documento Depositos bancarios
        if (14 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('nombreEmpresa', $datos[0]);
            $my_template->setValue('domicilioEmpresa', $datos[1]);
            $my_template->setValue('rfcEmpresa', $datos[2]);
            $my_template->setValue('nombreBanco', $datos[3]);
            $my_template->setValue('direccionBanco', $datos[4]);
            $my_template->setValue('ciudadCodigoBanco', $datos[5]);
            $my_template->setValue('sucursalCuenta', $datos[6]);
            $my_template->setValue('clabe', $datos[7]);
            $my_template->setValue('swift', $datos[8]);
            $my_template->setValue('moneda', $datos[9]);
        }

        // Documento Aceptacion de residentes
        if (31 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('departamento', $datos[1]);
            $my_template->setValue('institucion', $datos[2]);
            $my_template->setValue('residente', $datos[3]);
            $my_template->setValue('numControl', $datos[4]);
            $my_template->setValue('carrera', $datos[5]);
            $my_template->setValue('meses', $datos[6]);
            $my_template->setValue('area', $datos[7]);
            $my_template->setValue('horaEntrada', $datos[8]);
            $my_template->setValue('horaSalida', $datos[9]);
            $my_template->setValue('pago1', $datos[10]);
            $my_template->setValue('pago2', $datos[11]);
            $my_template->setValue('pago3', $datos[12]);
            $my_template->setValue('objetivo', $datos[13]);
        }

        // Documento Apego a documentos
        if (38 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('empleado', $datos[1]);
        }

        // Documento Pago bancario personal
        if (41 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('empleado', $datos[1]);
        }

        // Documento Pago bancario becarios
        if (42 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('institucion', $datos[1]);
            $my_template->setValue('becario', $datos[2]);
        }

        // Documento Reuniones
        if (44 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('fechaReunion', date( 'd-m-Y', strtotime($datos[0])) );
            $my_template->setValue('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
            $my_template->setValue('motivo', $datos[2]);
            $my_template->setValue('proyecto', $datos[3]);
            $my_template->setValue('totalA', $datos[4]);
            $my_template->setValue('costo', $datos[5]);
            $my_template->setValue('cumple', $datos[6]);
            $my_template->setValue('cumplimiento', $datos[7]);
            $my_template->setValue('comentarios', $datos[8]);

            $my_template->cloneBlock('block_asistentes', (count($datos) - 9), true, true);
            for ($i = 0; $i < (count($datos) - 9); $i++) { 
                $my_template->setValue('asistente#'.($i+1), htmlspecialchars($datos[9 + $i], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Viaticos
        if (45 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('fechaActividad', date( 'd-m-Y', strtotime($datos[0])) );
            $my_template->setValue('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
            $my_template->setValue('actividad', $datos[2]);
            $my_template->setValue('proyecto', $datos[3]);
            $my_template->setValue('totalA', $datos[4]);
            $my_template->setValue('costo', $datos[5]);
            $my_template->setValue('compro', $datos[6]);
            $my_template->setValue('cumple', $datos[7]);
            $my_template->setValue('cumplimiento', $datos[8]);
            $my_template->setValue('comentarios', $datos[9]);

            $my_template->cloneBlock('block_asistentes', (count($datos) - 10), true, true);
            for ($i = 0; $i < (count($datos) - 10); $i++) { 
                $my_template->setValue('asistente#'.($i+1), htmlspecialchars($datos[10 + $i], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Regalos
        if (46 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('fechaRegalo', date( 'd-m-Y', strtotime($datos[0])) );
            $my_template->setValue('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
            $my_template->setValue('donatario', $datos[2]);
            $my_template->setValue('destinatario', $datos[3]);
            $my_template->setValue('circunstancia', $datos[4]);
            $my_template->setValue('regalo', $datos[5]);
            $my_template->setValue('valorEst', $datos[6]);
            $my_template->setValue('valorPeso', $datos[7]);
            $my_template->setValue('destino', $datos[8]);
            $my_template->setValue('fechaSalida', date( 'd-m-Y', strtotime($datos[9])) );
            $my_template->setValue('cumple', $datos[10]);
            $my_template->setValue('cumplimiento', $datos[11]);
            $my_template->setValue('comentarios', $datos[12]);
        }

        // Documento Pase de salida
        if (47 == $formato['documento_formato_id']) {
            $my_template->setValue('empleado', $datos[0]);
            $my_template->setValue('autorizo', $datos[1]);
        }

        // Documento Permiso
        if (48 == $formato['documento_formato_id']) {
            $my_template->setValue('nombre', $datos[0]);
            $my_template->setValue('area', $datos[1]);
            $my_template->setValue('puesto', $datos[2]);
            $my_template->setValue('numeroDias', $datos[3]);
            $my_template->setValue('periodoAnual', $datos[4]);
            if ($datos[5] == 'Con goce de sueldo') {
                $my_template->setValue('c', 'x');
                $my_template->setValue('s', '');
            } else {
                $my_template->setValue('c', '');
                $my_template->setValue('s', 'x');
            }
            $my_template->setValue('disponibles', $datos[6]);
            $my_template->setValue('disfrutados', $datos[7]);
            $my_template->setValue('solicita', $datos[8]);
            $my_template->setValue('disfrutar', $datos[9]);
            $my_template->setValue('fechaPermiso', $datos[10]);
            $my_template->setValue('fechaRegreso', $datos[11]);
            $my_template->setValue('empleado', $datos[12]);
            $my_template->setValue('fechaEmp', date('d-m-Y' , strtotime($datos[13])) );
            $my_template->setValue('autorizo', $datos[14]);
            $my_template->setValue('fechaAut', date('d-m-Y' , strtotime($datos[15])) );
        }

        // Documento Vacasiones
        if (49 == $formato['documento_formato_id']) {
            $my_template->setValue('nombre', $datos[0]);
            $my_template->setValue('area', $datos[1]);
            $my_template->setValue('puesto', $datos[2]);
            $my_template->setValue('numeroDias', $datos[3]);
            $my_template->setValue('periodoAnual', $datos[4]);
            $my_template->setValue('disponibles', $datos[5]);
            $my_template->setValue('disfrutados', $datos[6]);
            $my_template->setValue('solicita', $datos[7]);
            $my_template->setValue('disfrutar', $datos[8]);
            $my_template->setValue('fechaPermiso', $datos[9]);
            $my_template->setValue('fechaRegreso', $datos[10]);
            $my_template->setValue('empleado', $datos[11]);
            $my_template->setValue('fechaEmp', date('d-m-Y' , strtotime($datos[12])) );
            $my_template->setValue('autorizo', $datos[13]);
            $my_template->setValue('fechaAut', date('d-m-Y' , strtotime($datos[14])) );
        }

        // Documento Constancia de trabajo
        if (50 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('nombre', $datos[1]);
            $my_template->setValue('lab', $datos[2]);
            $my_template->setValue('ingreso', date('d-m-Y' , strtotime($datos[3])) );
            if ($datos[4] == null) {
                $my_template->setValue('egreso', 'la actualidad' );
            } else {
                $my_template->setValue('egreso', date('d-m-Y' , strtotime($datos[4])) );
            }
            $my_template->setValue('puesto', $datos[5]);
            $my_template->setValue('per', $datos[6]);
            $my_template->setValue('cantidad', $datos[7]);
            $my_template->setValue('cantidad2', $datos[8]);
        }

        // Documento Constancia de trabajo
        if (55 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('fecha2', date('d-m-Y' , strtotime($datos[1])) );
            $my_template->setValue('puesto', $datos[2]);
            $my_template->setValue('nombre', $datos[3]);
        }

        // Documento Finiquito
        if (56 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            // $my_template->setValue('fecha2', date('d-m-Y' , strtotime($datos[1])) );
            $my_template->setValue('finiquito', $datos[1]);
            $my_template->setValue('finiquito2', $datos[2]);
            $my_template->setValue('finiquito3', $datos[3]);
            $my_template->setValue('fechaContrato', date('d-m-Y' , strtotime($datos[4])) );
            $my_template->setValue('fechaBaja', date('d-m-Y' , strtotime($datos[5])) );
            $my_template->setValue('salario', $datos[6]);
            $my_template->setValue('salario2', $datos[7]);
            $my_template->setValue('salario3', $datos[8]);
            $my_template->setValue('pago', $datos[9]);
            $my_template->setValue('aniosLaborados', $datos[10]);
            $my_template->setValue('pago2', $datos[11]);
            $my_template->setValue('pago3', $datos[12]);
            $my_template->setValue('diasSemana', $datos[13]);
            $my_template->setValue('pago4', $datos[14]);
            $my_template->setValue('pago5', $datos[15]);
            $my_template->setValue('suma', $datos[16]);
            $my_template->setValue('suma2', $datos[17]);
            $my_template->setValue('suma3', $datos[18]);
            $my_template->setValue('suma4', $datos[19]);
            $my_template->setValue('ispt', $datos[20]);
            $my_template->setValue('imss', $datos[21]);
            $my_template->setValue('prestamo', $datos[22]);
            $my_template->setValue('sumaDed', $datos[23]);
            $my_template->setValue('sumaDed2', $datos[24]);
            $my_template->setValue('sumaDed3', $datos[25]);
            $my_template->setValue('sumaDed4', $datos[26]);
            $my_template->setValue('neto', $datos[27]);
            $my_template->setValue('neto2', $datos[28]);
            $my_template->setValue('neto3', $datos[29]);
            $my_template->setValue('empleado', $datos[30]);
        }
        
        // Documento Recomendacion
        if (57 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('empleado', $datos[1]);
            $my_template->setValue('lab', $datos[2]);
            $my_template->setValue('fechaIngreso', date('d-m-Y' , strtotime($datos[3])) );
            $my_template->setValue('puesto', $datos[4]);
        }

        try{
            $my_template->saveAs(storage_path( '../public/assets/AD-documents/' . $id . '-' . $nombreDocumento['directorio'] ) );
        }catch (Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }

        return response()->download(storage_path( '../public/assets/AD-documents/'  . $id . '-' . $nombreDocumento['directorio'] ) );
    }



}
