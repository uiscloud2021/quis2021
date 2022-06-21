<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DocumentosID\Documentos_id_capacitacion;
use App\Models\DocumentosID\Documentos_id_formatos;
use App\Models\DocumentosID\Documentos_id_instructivos;
use App\Models\DocumentosID\Documentos_id_manuales;
use App\Models\DocumentosID\Documentos_id_procedimientos;
use App\Models\DocumentosID\Documentos_id_procesos;

use App\Models\DocumentosID\Formatos_id;

use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Investigador;
use App\Models\User;
use Carbon\Carbon;

class DocumentosIDController extends Controller
{

    public function __construct(){
        //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
        $this->middleware('can:documentos_id.index');//PROTEGE TODAS LAS RUTAS
        //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos_manuales = Documentos_id_manuales::all();
        $documentos_procesos = Documentos_id_procesos::all();
        $documentos_capacitacion = Documentos_id_capacitacion::all();
        $documentos_instructivos = Documentos_id_instructivos::all();
        $documentos_procedimientos = Documentos_id_procedimientos::all();
        $documentos_formatos = Documentos_id_formatos::orderBy('nombre_doc', 'asc')->pluck('nombre_doc', 'id');
        $last_format = Documentos_id_formatos::orderBy('id', 'desc')->select('id')->first();
        $last_format = $last_format->id;
        
        $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))
        ->where('no27', '<>', 'Cerrado')->where('no9', '=', 'Si')->get();
        
        return view('documentos_id.index', compact('documentos_manuales', 'documentos_procesos', 'documentos_capacitacion', 'documentos_instructivos', 'documentos_procedimientos', 'documentos_formatos', 'proyectos', 'last_format'));
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
            $formato = Formatos_id::where('id', $formato_id)->get()->first()->toJson();
            
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
            $formato = Formatos_id::where('id', $formato_id)->delete();

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

        //condición para saber si el request tiene datos o no
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
            $formato = Documentos_id_formatos::where('id', $request->formato_id)->get()->first();
            if ($formato) {
                return $formato;
            } else {
                return null;
            }
        }
    }

    public function download(Request $request, $ruta)
    {		
        return response()->download(storage_path('../public/assets/ID-documents/'  .  $ruta ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download_formato(Request $request, $ruta)
    {		
        $directorio = Documentos_id_formatos::where('nombre_doc', $ruta)->get()->first();
        return response()->file(storage_path('../public/assets/ID/5. FC-ID/'  .  $directorio->directorio ));
    }

    public function list_formatos(Request $request)
    {
        $user_id = auth()->id();
        $formato_id = $request->formato_id;
        $codigo_id = $request->codigo_id;
        
        $formatos = Formatos_id::where('documento_formato_id', $formato_id)
        ->where('empresa_id', '=', session('id_empresa'))
        ->where('proyecto_id', '=', $codigo_id)->get();
        
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
        $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="/documentos_id/word/'.$formatos->id. '" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span></a>
        <button type="button" title="Eliminar" name="delete" id="'.$formatos->id.'" onclick="delete_formatos('.$formatos->id.');" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
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

        // obtener el has_form del formato para ver si se guardan los datos o se genera el arhivo
        // $documento_formato_id = $request->documentoformato_id;
        $has_form = Documentos_id_formatos::where('id', $request->documentoformato_id)->value('has_form');
        // condicion para crear los archivos que no se guardan
        if ($has_form == 2) {
            $nombreDocumento = Documentos_id_formatos::where('id', $request->documentoformato_id)->get()->first();
            $datosProyecto = Proyecto::where('id', $request->proyecto_id)
            ->get()->first();
            $proyectos = Proyecto::where('proyectos.id', $request->proyecto_id)
            ->join('investigadores', 'proyectos.investigador_id', '=', 'investigadores.id')
            ->select('proyectos.*', 'investigadores.*')
            ->get()->first();
            $codigoUIS = $datosProyecto->no18;

            // Obtener los datos del investigador
            // TODO: probar cuando ya esten los investigadores capturados o poner los datos desde el modal
            $investigador = Investigador::where('id', $datosProyecto->investigador_id)->get()->first();

            $currentTime = Carbon::now();

            $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/ID/5. FC-ID/' . $nombreDocumento['directorio'] . ''));


            try{
                // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban 
                $my_template->saveAs(storage_path( '../public/assets/ID-documents/' . $nombreDocumento['nombre_doc'] . '-' . $codigoUIS . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
                // $my_template->saveAs(storage_path( '../public/assets/ID-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
            }catch (Exception $e){
                return response(null);
            }
        
            // return response()->download(storage_path( '../public/assets/ID-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] ));
            
            return response( $nombreDocumento['nombre_doc'] . '-' . $codigoUIS . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] );
            // return response( $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] );
            
        } else {

            // VALIDAR CAMPOS
            $request->validate([
                'documentoformato_id' => 'required',
                'proyecto_id' => 'required',
            ]);

            // id usuario loggeado
            $id_user = auth()->id();
            //TODO: Buscar los datos del usuario, la empresa y el area(menu) en  un provider o donde sea que se encuentren
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
                    $formatos = new Formatos_id();
                    $formatos->documento_formato_id = $request->documentoformato_id;
                    $formatos->datos_json = $datos;
                    $formatos->empresa_id = $empresa_id;
                    $formatos->menu_id = $menu_id;
                    $formatos->proyecto_id = $proyecto_id;
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


                $formatos = Formatos_id::find($formato_id);

                $formatos->documento_formato_id = $request->documentoformato_id;
                $formatos->datos_json = $datos;
                //TODO: cambiar para que sea la empresa y el menu correctos
                $formatos->empresa_id = $empresa_id;
                $formatos->menu_id = $menu_id;
                $formatos->proyecto_id = $proyecto_id;
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
        
    }


    public function word(Request $request, $id)
    {

        $formato = Formatos_id::where('id', $id)->get()->first();
        $datos = json_decode($formato->datos_json);

        // Obtener Los datos del tipo de formato 
        $nombreDocumento = Documentos_id_formatos::where('id', $formato['documento_formato_id'])->get()->first();

        // Obtener los datos del proyecto
        $codigoUIS = Proyecto::where('id', $formato->proyecto_id)->get()->first();
        $codigoUIS = $codigoUIS->no18;

        // Obtener los datos del investigador
        // TODO: probar cuando ya esten los investigadores capturados o poner los datos desde el modal
        // $investigador = Investigador::where('id', $codigoUIS->investigador_id)->get()->first();

        $currentTime = Carbon::now();
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/ID/5. FC-ID/' . $nombreDocumento['directorio'] . ''));

        // Documento Invitacion
        if (1 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha', date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            // list($day,$month,$year) = explode("/",date('d/m/Y', strtotime($datos[0])));
            // $my_template->setValue('fecha', $day . ' de ' . $month . ' de ' . $year);
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('primerApellido', $datos[4]);
            // if ($datos[2] == 'Dr.') {
            //     $my_template->setValue('estimado/a', 'Estimado Doctor:');
            // };
            // if ($datos[2] == 'Dra.') {
            //     $my_template->setValue('estimado/a', 'Estimada Doctora:');
            // };
            $my_template->setValue('integracion', $datos[5]);
            $my_template->setValue('aspectos', $datos[6]);
            if ($datos[3] == 'Comité de Ética en Investigación (CEI)') {
                $my_template->setValue('abre', 'CEI');
            };
            if ($datos[3] == 'Comité de Investigación (CI)') {
                $my_template->setValue('abre', 'CI');
            };
        }

        // Documento Condidencialidad
        if (2 == $formato['documento_formato_id']) {
            $my_template->setValue('comite', $datos[0]);
            $my_template->setValue('comite2', $datos[1]);
        }

        // Documento Designacion
        if (5 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('apellido', $datos[4]);
            $my_template->setValue('comite2', $datos[5]);
            $my_template->setValue('aspectos', $datos[6]);
            $my_template->setValue('comite3', $datos[7]);
            if ($datos[8] == 'Si') {
                $my_template->setValue('si1', 'x');
                $my_template->setValue('no1', '');
            } else {
                $my_template->setValue('si1', '');
                $my_template->setValue('no1', 'x');
            }
            if ($datos[9] == 'Si') {
                $my_template->setValue('si2', 'x');
                $my_template->setValue('no2', '');
            } else {
                $my_template->setValue('si2', '');
                $my_template->setValue('no2', 'x');
            }
            if ($datos[10] == 'Si') {
                $my_template->setValue('si3', 'x');
                $my_template->setValue('no3', '');
            } else {
                $my_template->setValue('si3', '');
                $my_template->setValue('no3', 'x');
            }
        }

        // Documento Instalacion
        if (6 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('comite', $datos[1]);
            $my_template->setValue('comite2', $datos[2]);
            if ($datos[1] == 'Comité de Ética en Investigación') {
                $my_template->setValue('abre', 'CEI');
                $my_template->setValue('aspectos', 'evaluar los aspectos éticos y legales');
            };
            if ($datos[1] == 'Comité de Investigación') {
                $my_template->setValue('abre', 'CI');
                $my_template->setValue('aspectos', 'revisar los aspectos metodológicos');
            };
            $my_template->setValue('hora', $datos[3]);
            $my_template->setValue('dia', $datos[4]);
            $my_template->setValue('mes', $datos[5]);
            $my_template->setValue('anio', $datos[6]);
        }

        // Documento Constancia de miembro
        if (9 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('titulo', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('fecha2', 'el ' . date('d', strtotime($datos[4])) . ' de '  . $meses[ date('n', strtotime($datos[4]))-1 ] . ' del ' . date('Y', strtotime($datos[4])) );
            $my_template->setValue('asunto', $datos[5]);
            $my_template->setValue('comite2', $datos[3]);
            $my_template->setValue('comision', $datos[6]);
        }

        // Documento No voto
        if (15 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('comite', $datos[1]);
            $my_template->setValue('codigoUis', $datos[2]);
            $my_template->setValue('codigo', $datos[3]);
            $my_template->setValue('titulo', $datos[4]);
            $my_template->setValue('patrocinador', $datos[5]);
            $my_template->setValue('domicilio', $datos[6]);
            $my_template->setValue('fecha2', date('d-m-Y', strtotime($datos[7])) );
            $my_template->setValue('nombre', $datos[8] );
            $my_template->setValue('atentamente', $datos[9] );
            $my_template->setValue('comite2', $datos[10] );
        }

        // Documento No aprobado
        if (17 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );


            $countDocumentos = 1;
            $countArgumentos = 0;

            for ($i=10; $i < count($datos); $i++) { 
                $element = $datos[$i];
                $choice = substr($element, 0, 1);
                $only_data = substr($element, 2, strlen($element));

                $datos[$i] = $only_data;
                if ($choice == 'd') {
                $countDocumentos++;
                }
                if ($choice == 'a') {
                $countArgumentos++;
                }
            }

            $my_template->cloneRow('documento', $countDocumentos);
            $my_template->cloneRow('argumento', $countArgumentos);

            for ($i = 0; $i < $countDocumentos; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
            for ($i = 0; $i < $countArgumentos; $i++) { 
                $my_template->setValue('argumento#'.($i+1), htmlspecialchars($datos[$i + 9 + $countDocumentos], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Pendiente de aprobacion
        if (18 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('cambio', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('cambio#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Pendiente de aprobacion CEI
        if (19 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('cambio', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('cambio#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Pendiente de aprobacion CI
        if (20 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('cambio', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('cambio#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion inicial
        if (21 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('dictamen', $datos[9] );

            $my_template->cloneRow('documento', count($datos) - 10);
            for ($i=0; $i < count($datos) - 10; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 10], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion inicial CEI
        if (22 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('dictamen', $datos[9] );

            $my_template->cloneRow('documento', count($datos) - 10);
            for ($i=0; $i < count($datos) - 10; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 10], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion inicial CI
        if (23 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aceptacion de responsabilidades
        if (24 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('dictamen', $datos[9] );

            $my_template->cloneRow('documento', count($datos) - 10);
            for ($i=0; $i < count($datos) - 10; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 10], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aceptacion de responsabilidades CEI
        if (25 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('dictamen', $datos[9] );

            $my_template->cloneRow('documento', count($datos) - 10);
            for ($i=0; $i < count($datos) - 10; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 10], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aceptacion de responsabilidades CEI
        if (26 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Adherencia GCP-ICH
        if (27 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Adherencia GCP-ICH CEI
        if (28 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Adherencia GCP-ICH CI
        if (29 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Lista de miembros
        if (30 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
            $my_template->setValue('fecha2', date('d-m-Y', strtotime($datos[4])) );
        }

        // Documento Lista de miembros CEI
        if (31 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
            $my_template->setValue('fecha2', date('d-m-Y', strtotime($datos[4])) );
        }

        // Documento Lista de miembros CI
        if (32 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
            $my_template->setValue('fecha2', date('d-m-Y', strtotime($datos[4])) );
        }

        // Documento Confidencialidad y no conflicto
        if (34 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Confidencialidad y no conflicto
        if (35 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Confidencialidad y no conflicto
        if (36 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Informacion sobre auditorias
        if (37 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Informacion sobre auditorias CEI
        if (38 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Informacion sobre auditorias CI
        if (39 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('titulo', $datos[2]);
            $my_template->setValue('patrocinador', $datos[3]);
        }

        // Documento Aprobacion de enmienda
        if (43 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('enmienda', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('enmienda#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion de enmienda CEI
        if (44 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('enmienda', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('enmienda#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion de enmienda CI
        if (45 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('enmienda', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('enmienda#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Revision de desviacion
        if (46 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-M-Y', strtotime($datos[9])) );
            $my_template->setValue('evento', $datos[10] );

            $my_template->cloneBlock('block_reporte', (count($datos) - 11) / 5, true, true);
            $aux = 0;
            for ($i = 0; $i < (count($datos) - 11) / 5; $i++) { 
                $my_template->setValue('numSujeto#'.($i+1), htmlspecialchars($datos[$aux + 11], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('numVisita#'.($i+1), htmlspecialchars($datos[$aux + 12], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('fechaRep#'.($i+1), htmlspecialchars($datos[$aux + 13], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('desc#'.($i+1), htmlspecialchars($datos[$aux + 14], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('acciones#'.($i+1), htmlspecialchars($datos[$aux + 15], ENT_COMPAT, 'UTF-8'));
                $aux = $aux + 5;
            }
        }

        // Documento Revision de desviacion CEI
        if (47 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-M-Y', strtotime($datos[9])) );
            $my_template->setValue('evento', $datos[10] );
        }

        // Documento Revision de desviacion CI
        if (48 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-M-Y', strtotime($datos[9])) );
            $my_template->setValue('evento', $datos[10] );
        }

        // Documento Enterado
        if (49 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Enterado CEI
        if (50 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Enterado CI
        if (51 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Enterado EA
        if (52 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('sujeto', $datos[9] );
            $my_template->setValue('diagnostico', $datos[10] );
        }

        // Documento Enterado EA CEI
        if (53 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('sujeto', $datos[9] );
            $my_template->setValue('diagnostico', $datos[10] );
        }

        // Documento Enterado EA CI
        if (54 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('sujeto', $datos[9] );
            $my_template->setValue('diagnostico', $datos[10] );
        }

        // Documento Enterado EAS
        if (55 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date('d-M-Y' , strtotime($datos[9])) );
            $my_template->setValue('sujeto', $datos[10] );
            $my_template->setValue('evento', $datos[11] );
        }

        // Documento Enterado EAS CEI
        if (56 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date('d-M-Y' , strtotime($datos[9])) );
            $my_template->setValue('sujeto', $datos[10] );
            $my_template->setValue('evento', $datos[11] );
        }

        // Documento Enterado EAS CI
        if (57 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date('d-M-Y' , strtotime($datos[9])) );
            $my_template->setValue('sujeto', $datos[10] );
            $my_template->setValue('evento', $datos[11] );
        }

        // Documento Aprobacion subsecuente
        if (58 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion subsecuente CEI
        if (59 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aprobacion subsecuente CI
        if (60 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('documento', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Renovacion anual
        if (61 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
        }

        // Documento Renovacion anual CEI
        if (62 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
        }

        // Documento Renovacion anual CI
        if (63 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigo', $datos[3]);
            $my_template->setValue('titulo', $datos[4]);
            $my_template->setValue('patrocinador', $datos[5]);
            $my_template->setValue('domicilio',$datos[6] );
            $my_template->setValue('apellido', $datos[7] );
        }

        // Documento Fe de erratas
        if (64 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('nombreDoc', $datos[9] );
            $my_template->setValue('fecha2', date('d-M-Y', strtotime($datos[10])) );
            $my_template->setValue('datos', $datos[11] );
            $my_template->setValue('aclarar', $datos[12] );
        }

        // Documento Fe de erratas CEI
        if (65 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('nombreDoc', $datos[9] );
            $my_template->setValue('fecha2', date('d-M-Y', strtotime($datos[10])) );
            $my_template->setValue('datos', $datos[11] );
            $my_template->setValue('aclarar', $datos[12] );
        }

        // Documento Fe de erratas CI
        if (66 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigo', $datos[3]);
            $my_template->setValue('titulo', $datos[4]);
            $my_template->setValue('patrocinador', $datos[5]);
            $my_template->setValue('domicilio',$datos[6] );
            $my_template->setValue('apellido', $datos[7] );
            $my_template->setValue('nombreDoc', $datos[8] );
            $my_template->setValue('fecha2', date('d-M-Y', strtotime($datos[9])) );
            $my_template->setValue('datos', $datos[10] );
            $my_template->setValue('aclarar', $datos[11] );
        }

        // Documento Recibo de informe
        if (67 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigo', $datos[3]);
            $my_template->setValue('titulo', $datos[4]);
            $my_template->setValue('patrocinador', $datos[5]);
            $my_template->setValue('domicilio',$datos[6] );
            $my_template->setValue('apellido', $datos[7] );
            $my_template->setValue('fechaDesde', date('d-m-Y', strtotime($datos[8])) );
            $my_template->setValue('fechaHasta', date('d-m-Y', strtotime($datos[9])) );
            $my_template->setValue('estadoPro', $datos[10] );
            $my_template->setValue('numSujetosICF', $datos[11] );
            $my_template->setValue('numSujetosAct', $datos[12] );
            $my_template->setValue('infInicialesEAS', $datos[13] );
            $my_template->setValue('desviaciones', $datos[14] );
        }

        // Documento Aviso al investigador CEI
        if (68 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('descripcion', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('descripcion#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aviso al investigador CI
        if (69 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );

            $my_template->cloneRow('descripcion', count($datos) - 9);
            for ($i=0; $i < count($datos) - 9; $i++) { 
                $my_template->setValue('descripcion#'.($i+1), htmlspecialchars($datos[$i + 9], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Aviso de auditoria
        if (70 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date('d-m-Y', strtotime($datos[9])) );
        }

        // Documento Dictamen
        if (71 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-m-Y', strtotime($datos[9])) );

            if ($datos[10] == 'No se encontraron transgresiones éticas durante el desarrollo de la investigación') {
                $my_template->setValue('resultadoAudi', 'No se encontraron transgresiones éticas durante el desarrollo de la investigación. El estudio requiere verificación a profundidad sobre el estado ético' );
            }
            if ($datos[10] == 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.') {
                $my_template->setValue('resultadoAudi', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación' );
            }
            
        }

        // Documento Dictamen CEI
        if (72 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-m-Y', strtotime($datos[9])) );

            if ($datos[10] == 'No se encontraron transgresiones éticas durante el desarrollo de la investigación') {
                $my_template->setValue('resultadoAudi', 'No se encontraron transgresiones éticas durante el desarrollo de la investigación. El estudio requiere verificación a profundidad sobre el estado ético' );
            }
            if ($datos[10] == 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.') {
                $my_template->setValue('resultadoAudi', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación' );
            }
            
        }

        // Documento Dictamen CI
        if (73 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
            $my_template->setValue('fecha2', date( 'd-m-Y', strtotime($datos[9])) );

            if ($datos[10] == 'No se encontraron transgresiones éticas durante el desarrollo de la investigación') {
                $my_template->setValue('resultadoAudi', 'No se encontraron transgresiones éticas durante el desarrollo de la investigación. El estudio requiere verificación a profundidad sobre el estado ético' );
            }
            if ($datos[10] == 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.') {
                $my_template->setValue('resultadoAudi', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación' );
            }
            
        }

        // Documento Aviso de cancelacion
        if (74 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('codigoUis', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('domicilio',$datos[7] );
            $my_template->setValue('apellido', $datos[8] );
        }

        // Documento Migracion
        if (75 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('institucion', $datos[4]);
            $my_template->setValue('codigo', $datos[5]);
            $my_template->setValue('titulo', $datos[6]);
            $my_template->setValue('patrocinador', $datos[7]);
            $my_template->setValue('domicilio',$datos[8] );
            $my_template->setValue('investigador',$datos[9] );
            $my_template->setValue('apellido', $datos[10] );
            $my_template->setValue('dia', date('d', strtotime($datos[11])) );
            $my_template->setValue('mes', $meses[ date('n', strtotime($datos[11]))-1 ] );
            $my_template->setValue('anio', date('Y', strtotime($datos[11])) );
            $my_template->setValue('numRenova', $datos[12] );
            $my_template->setValue('desviaciones', $datos[13] );
            $my_template->setValue('susar', $datos[14] );
            $my_template->setValue('numInicialesEAS', $datos[15] );
            $my_template->setValue('numSegEAS', $datos[16] );

            $my_template->cloneRow('documento', count($datos) - 17);
            for ($i=0; $i < count($datos) - 17; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 17], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Migracion CEI
        if (76 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('institucion', $datos[4]);
            $my_template->setValue('codigo', $datos[5]);
            $my_template->setValue('titulo', $datos[6]);
            $my_template->setValue('patrocinador', $datos[7]);
            $my_template->setValue('domicilio',$datos[8] );
            $my_template->setValue('investigador',$datos[9] );
            $my_template->setValue('apellido', $datos[10] );
            $my_template->setValue('dia', date('d', strtotime($datos[11])) );
            $my_template->setValue('mes', $meses[ date('n', strtotime($datos[11]))-1 ] );
            $my_template->setValue('anio', date('Y', strtotime($datos[11])) );
            $my_template->setValue('numRenova', $datos[12] );
            $my_template->setValue('desviaciones', $datos[13] );
            $my_template->setValue('susar', $datos[14] );
            $my_template->setValue('numInicialesEAS', $datos[15] );
            $my_template->setValue('numSegEAS', $datos[16] );

            $my_template->cloneRow('documento', count($datos) - 17);
            for ($i=0; $i < count($datos) - 17; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 17], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Migracion CI
        if (77 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('tituloAbre', $datos[1]);
            $my_template->setValue('nombre', $datos[2]);
            $my_template->setValue('comite', $datos[3]);
            $my_template->setValue('institucion', $datos[4]);
            $my_template->setValue('codigo', $datos[5]);
            $my_template->setValue('titulo', $datos[6]);
            $my_template->setValue('patrocinador', $datos[7]);
            $my_template->setValue('domicilio',$datos[8] );
            $my_template->setValue('investigador',$datos[9] );
            $my_template->setValue('apellido', $datos[10] );
            $my_template->setValue('dia', date('d', strtotime($datos[11])) );
            $my_template->setValue('mes', $meses[ date('n', strtotime($datos[11]))-1 ] );
            $my_template->setValue('anio', date('Y', strtotime($datos[11])) );
            $my_template->setValue('numRenova', $datos[12] );
            $my_template->setValue('desviaciones', $datos[13] );
            $my_template->setValue('susar', $datos[14] );
            $my_template->setValue('numInicialesEAS', $datos[15] );
            $my_template->setValue('numSegEAS', $datos[16] );

            $my_template->cloneRow('documento', count($datos) - 17);
            for ($i=0; $i < count($datos) - 17; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 17], ENT_COMPAT, 'UTF-8'));
            }
        }

        // Documento Contenido del paquete
        if (78 == $formato['documento_formato_id']) {
            $my_template->setValue('codigo', $datos[0]);
            $my_template->setValue('titulo', $datos[1]);
            $my_template->setValue('investigador',$datos[2] );
            $my_template->setValue('nombreSitio', $datos[3] );
        }

        // Documento Archivo de concentracion
        if (79 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            $my_template->setValue('codigoUis', $datos[0]);
            $my_template->setValue('codigo', $datos[1]);
            $my_template->setValue('fecha',  date('d', strtotime($datos[2])) . ' de '  . $meses[ date('n', strtotime($datos[2]))-1 ] . ' de ' . date('Y', strtotime($datos[2])) );
        }

        // Documento Cambio de domicilio 
        if (80 == $formato['documento_formato_id']) {
            $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('destinatario', $datos[1]);
            $my_template->setValue('puesto', $datos[2]);
            $my_template->setValue('empresa', $datos[3]);
            $my_template->setValue('codigo', $datos[4]);
            $my_template->setValue('titulo', $datos[5]);
            $my_template->setValue('patrocinador', $datos[6]);
            $my_template->setValue('tituloAbre', $datos[7]);
            $my_template->setValue('apellido', $datos[8]);
            $my_template->setValue('domicilio', $datos[9]);
            $my_template->setValue('nombreNotifica', $datos[10]);
            $my_template->setValue('puestoNotifica', $datos[11]);
        }

        try{
            // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban - se puede utilizar el codigo del proyecto
            $my_template->saveAs(storage_path( '../public/assets/CE-documents/' . $id . '-' .$nombreDocumento['directorio'] ) );
            // $my_template->saveAs(storage_path( '../public/assets/CE-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
        }catch (Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }

        return response()->download(storage_path( '../public/assets/CE-documents/'  . $id . '-' .$nombreDocumento['directorio'] ) );
        // return response()->download(storage_path( '../public/assets/CE-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] ));
    }

}
