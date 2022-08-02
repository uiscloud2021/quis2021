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
        return response()->file(storage_path('../public/assets/ID/5. FC-ID/'  .  $ruta ));
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
                // $my_template->saveAs(storage_path( '../public/assets/CE-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
            }catch (Exception $e){
                return response(null);
            }
        
            // return response()->download(storage_path( '../public/assets/CE-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] ));
            
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

            $datos_json = json_encode($request->all());
            $datos_array = json_decode($datos_json, true);
            $datos = null;

            //count para saber cuantos datos son, dependiendo del formulario
            $countArray = count($datos_array);

            
            
            unset($datos_array['_token']);
            unset($datos_array['formato_id']);
            unset($datos_array['documentoformato_id']);
            unset($datos_array['proyecto_id']);
            unset($datos_array['empresa_id']);
            unset($datos_array['menu_id']);
            unset($datos_array['user_id']);
            
           
            $datos = json_encode($datos_array);
            
            
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
                

            

        }else{

            $datos_json = json_encode($request->all());
            $datos_array = json_decode($datos_json, true);
            $datos = null;

               
            unset($datos_array['_token']);
            unset($datos_array['formato_id']);
            unset($datos_array['documentoformato_id']);
            unset($datos_array['proyecto_id']);
            unset($datos_array['empresa_id']);
            unset($datos_array['menu_id']);
            unset($datos_array['user_id']);

            $datos = json_encode($datos_array);

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
        $array_depurado = json_decode($formato->datos_json, true);

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

           
        if (3 ==  $formato['documento_formato_id']) {
                 
            $my_template->setValue('codigo',$array_depurado['codigo3']);
            $my_template->setValue('titulo',$array_depurado['titulo3']);
            $my_template->setValue('disenio',$array_depurado['disenio3']);
            $my_template->setValue('tamanio',$array_depurado['tamanio3']);

            $my_template->cloneBlock('bloque',(count($array_depurado) - 5), true, true);
            for ($i=0; $i < count($array_depurado) - 5; $i++) { 
            $my_template->setValue('criterio#'.($i+1),htmlspecialchars($array_depurado['75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
            }
    
        } 
       
        if (4 ==  $formato['documento_formato_id']) {
         
            $my_template->setValue('codigo',$array_depurado['codigo4']);
            $my_template->setValue('titulo',$array_depurado['titulo4']);
            $my_template->setValue('titulocorto',$array_depurado['titulocorto4']);
            $my_template->setValue('departamento',$array_depurado['departamento4']);
            $my_template->setValue('patrocinador',$array_depurado['patrocinadores4']);
            $my_template->setValue('versiones',$array_depurado['versiones4']);
            $my_template->setValue('enmiendas',$array_depurado['enmiendas4']);
            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha4'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha4']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha4'])) );
            
        
    
        }
        
        if(5 ==  $formato['documento_formato_id']){
            $my_template->setValue('sitio',$array_depurado['sitio5']);
            $my_template->setValue('numerosujeto',$array_depurado['numerosujeto5']);
            $my_template->setValue('grupo',$array_depurado['grupo5']);
            $my_template->setValue('version',$array_depurado['version5']);
            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha5'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha5']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha5'])) );
            
        }

        if(6 ==  $formato['documento_formato_id']){
           $my_template->setValue('sitio',$array_depurado['sitio6']);
            $my_template->setValue('numerosujeto',$array_depurado['numerosujeto6']);
            $my_template->setValue('codigo',$array_depurado['codigo6']);
            $my_template->setValue('version',$array_depurado['version6']);
            $my_template->setValue('iniciales',$array_depurado['iniciales6']);
            $my_template->setValue('edad',$array_depurado['edad6']);
            $my_template->setValue('sexo',$array_depurado['sexo6']);
            $my_template->setValue('ocupacion',$array_depurado['ocupacion6']);
            $my_template->setValue('escolaridad',$array_depurado['escolaridad6']);

            $valoresagregados = ((count($array_depurado) - 11)/2);

            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha6'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha6']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha6'])) );
            $my_template->cloneRow('variable',$valoresagregados);
            

            for ($i=0; $i < $valoresagregados; $i++) { 
                $my_template->setValue('valor#'.($i+1),htmlspecialchars($array_depurado['6-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('variable#'.($i+1),htmlspecialchars($array_depurado['6v-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                }

        }

        if(7 ==  $formato['documento_formato_id']){
            $my_template->setValue('codigo',$array_depurado['codigo7']);
            $my_template->setValue('nombreproducto',$array_depurado['nombreproducto7']);
            $my_template->setValue('patrocinador',$array_depurado['patrocinadores7']);
            $my_template->setValue('versiones',$array_depurado['versiones7']);
            $my_template->setValue('enmiendas',$array_depurado['enmiendas7']);

            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha7'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha7']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha7'])) );
            
        }

        if(8 ==  $formato['documento_formato_id']){
            $my_template->setValue('ciudad',$array_depurado['ciudad8']);
            $my_template->setValue('estado',$array_depurado['estado8']);
            $my_template->setValue('codigouis',$array_depurado['codigoUis8']);
            $my_template->setValue('codigo',$array_depurado['codigo8']);
            $my_template->setValue('titulo',$array_depurado['titulo8']);
            $my_template->setValue('patrocinador',$array_depurado['patrocinadores8']);
            $my_template->setValue('investigadorprincipal',$array_depurado['investigadorprincipal8']);

            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha8'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha8']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha8'])) );

            $my_template->cloneBlock('bloque',(count($array_depurado) - 9), true, true);
            for ($i=0; $i < (count($array_depurado) - 9); $i++) { 
            $my_template->setValue('nombrevfdoc#'.($i+1),htmlspecialchars($array_depurado['8-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
            }
        }
        
        if(9 ==  $formato['documento_formato_id']){
            $my_template->setValue('ciudad',$array_depurado['ciudad9']); 
            $my_template->setValue('estado',$array_depurado['estado9']);
            $my_template->setValue('codigo',$array_depurado['codigo9']);
            $my_template->setValue('titulo',$array_depurado['titulo9']); 
            $my_template->setValue('patrocinador',$array_depurado['patrocinadores9']);
            $my_template->setValue('direccion',$array_depurado['direccion']);
            $my_template->setValue('tipoinvestigador',$array_depurado['tipoinvestigador9']);
            $my_template->setValue('tituloabreviado',$array_depurado['tituloabreviado9']);
            $my_template->setValue('nombre',$array_depurado['nombre9']);
            $my_template->setValue('cedula',$array_depurado['cedula9']);
            
            $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha9'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha9']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha9'])) );
            
            
                if($array_depurado['tipoinvestigador'] == 'Investigador Principal'){
                    $my_template->cloneBlock('bloque',1, true, true);
                    $my_template->setValue('elemento#1',htmlspecialchars('Integrar un equipo de trabajo con los recursos humanos necesarios y apropiados para la conducción del estudio. Asegurar su capacitación y supervisarlo al implementar la investigación. Removerlo en caso necesario, e informar a la COFEPRIS de cualquier cambio al respecto.', ENT_COMPAT, 'UTF-8'));
            
                }else{
                    $my_template->cloneBlock('bloque',0, true, true);
                }
                
                if($array_depurado['tipoinvestigador'] != 'Coordinador de Estudios'){
                    $my_template->cloneBlock('bloque2',1, true, true);
                    $my_template->setValue('elemento2#1',htmlspecialchars('Durante el reclutamiento, no participar como investigador en otro protocolo que requiera el uso de un medicamento para la misma indicación, o que los criterios de inclusión y exclusión sean similares al protocolo descrito.', ENT_COMPAT, 'UTF-8'));
            
                }else{
                    $my_template->cloneBlock('bloque2',0, true, true);
                }
            }

            if(10 ==  $formato['documento_formato_id']){
                $my_template->setValue('ciudad',$array_depurado['ciudad10']); 
                $my_template->setValue('estado',$array_depurado['estado10']);
                $my_template->setValue('codigo',$array_depurado['codigo10']);
                $my_template->setValue('titulo',$array_depurado['titulo10']); 
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores10']);
                $my_template->setValue('direccion',$array_depurado['direccion10']);
                $my_template->setValue('tituloabreviado',$array_depurado['tituloabreviado10']);
                $my_template->setValue('nombre',$array_depurado['nombre10']);

                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha10'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha10']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha10'])) );
            

            }

            if(11 ==  $formato['documento_formato_id']){
                $my_template->setValue('ciudad',$array_depurado['ciudad11']); 
                $my_template->setValue('estado',$array_depurado['estado11']);
                $my_template->setValue('codigo',$array_depurado['codigo11']);
                $my_template->setValue('titulo',$array_depurado['titulo11']); 
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores11']);
                $my_template->setValue('direccion',$array_depurado['direccion11']);
                $my_template->setValue('hospital',$array_depurado['hospital11']);
                $my_template->setValue('nombre',$array_depurado['nombre11']);

                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha11'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha11']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha11'])) );
            

            }

            if(12 ==  $formato['documento_formato_id']){
                $my_template->setValue('lugar',$array_depurado['lugar12']); 
                $my_template->setValue('codigo',$array_depurado['codigo12']);
                $my_template->setValue('titulo',$array_depurado['titulo12']); 
                $my_template->setValue('direccion',$array_depurado['direccion12']);
                $my_template->setValue('tituloabreviado',$array_depurado['tituloabreviado12']);
                $my_template->setValue('nombre',$array_depurado['nombre12']);

                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha12'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha12']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha12'])) );
            
                if($array_depurado['cpe'] == 'Si'){
                    $my_template->setValue('si','X');
                    $my_template->setValue('no',' ');
                }elseif($array_depurado['cpe'] == 'No'){
                    $my_template->setValue('no','X');
                    $my_template->setValue('si',' ');
                }

                if($array_depurado['lugar12'] == 'Chihuahua, Chih.'){
                    $my_template->cloneBlock('bloque',1, true, true);
                    $my_template->cloneBlock('bloque3',1, true, true);
                    $my_template->setValue('elemento#1',htmlspecialchars('Electrocardiógrafo de 12 derivaciones.', ENT_COMPAT, 'UTF-8'));
                    $my_template->setValue('elemento3#1',htmlspecialchars('Recursos humanos de 12 personas dedicadas a actividades de investigación clínica.', ENT_COMPAT, 'UTF-8'));
                }else{
                    $my_template->cloneBlock('bloque',0, true, true);
                    $my_template->cloneBlock('bloque3',0, true, true);
                }
                
                if($array_depurado['lugar12'] == 'Ciudad de Mexico'){
                    $my_template->cloneBlock('bloque2',1, true, true);
                    $my_template->setValue('elemento2#1',htmlspecialchars('Farmacia equipada con refrigerador y congelador de -20°C, calibrados, y con respaldo de energía eléctrica.', ENT_COMPAT, 'UTF-8'));
            
                }else{
                    $my_template->cloneBlock('bloque2',0, true, true);
                }
            }

            if(13 ==  $formato['documento_formato_id']){
                $my_template->setValue('lugar',$array_depurado['lugar13']); 
                $my_template->setValue('destinatario',$array_depurado['destinatario13']);
                

                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha13'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha13']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha13'])) );
            

            }

            if(14 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo14']); 
                $my_template->setValue('numerositio',$array_depurado['numerositio14']);
                $my_template->setValue('fechavisita',$array_depurado['fechavisita14']);
                $my_template->setValue('fechaaviso',$array_depurado['fechaaviso14']);
                $my_template->setValue('tipovisita',$array_depurado['tipovisita14']);
                $my_template->setValue('horainicio',$array_depurado['horainicio']);
                $my_template->setValue('nombre',$array_depurado['nombre14']);
                $my_template->setValue('sitio',$array_depurado['sitio14']);
                $my_template->setValue('direccion',$array_depurado['direccion14']);
                $my_template->setValue('ciudad',$array_depurado['ciudad14']);
                $my_template->setValue('estado',$array_depurado['estado14']);
                $my_template->setValue('cp',$array_depurado['cp14']);
                $my_template->setValue('pais',$array_depurado['pais14']);

               

            }

            if(15 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo15']); 
                $my_template->setValue('numerositio',$array_depurado['numerositio15']);
                $my_template->setValue('domiciliositio',$array_depurado['direccionsitio15']);
                $my_template->setValue('investigador',$array_depurado['nombre15']);
                $my_template->setValue('titulo',$array_depurado['titulo15']);

            }

            if(16 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo16']); 
                $my_template->setValue('numerositio',$array_depurado['numerositio16']);
                $my_template->setValue('investigador',$array_depurado['nombre16']);

            }

            if(17 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo17']); 
                $my_template->setValue('descunidades',$array_depurado['descunidades17']);
                $my_template->setValue('investigador',$array_depurado['nombre17']);
                $my_template->setValue('sitio',$array_depurado['sitio17']);
                $my_template->setValue('almacen',$array_depurado['almacen17']);

            }

            if(18 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo18']); 
                $my_template->setValue('descunidades',$array_depurado['descunidades18']);
                $my_template->setValue('investigador',$array_depurado['nombre18']);
                $my_template->setValue('numsitio',$array_depurado['numsitio18']);
                $my_template->setValue('numsujeto',$array_depurado['numsujeto18']);

            }

            if(19 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo19']); 
                $my_template->setValue('titulo',$array_depurado['titulo19']);
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores19']);
                $my_template->setValue('numsitio',$array_depurado['numsitio19']);
                $my_template->setValue('numsitioc',$array_depurado['numsitioc19']);
                $my_template->setValue('numsitior',$array_depurado['numsitior19']);
                $my_template->setValue('sitio',$array_depurado['sitio19']);
                $my_template->setValue('telefono',$array_depurado['telefono19']);

            }

            if(20 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo20']); 
                $my_template->setValue('numsitio',$array_depurado['numsitio20']);
                $my_template->setValue('nombreentrega',$array_depurado['nombre20']);
                $my_template->setValue('direccion',$array_depurado['direccion20']);
                $my_template->setValue('ciudad',$array_depurado['ciudad20']);
                $my_template->setValue('estado',$array_depurado['estado20']);
                $my_template->setValue('pais',$array_depurado['pais20']);
                $my_template->setValue('cp',$array_depurado['cp20']);
                $my_template->setValue('telefono',$array_depurado['telefono20']);
                $my_template->setValue('correo',$array_depurado['correo20']);
                
                $my_template->setValue('nombreenvio',$array_depurado['nombree20']);
                $my_template->setValue('telefonoenvio',$array_depurado['telefonoe20']);
                $my_template->setValue('correoenvio',$array_depurado['correoe20']);

            }

            if(23 ==  $formato['documento_formato_id']){
               $my_template->setValue('codigo',$array_depurado['codigo23']);
                $my_template->setValue('titulo',$array_depurado['titulo23']);
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores23']);
                $my_template->setValue('nombresitio',$array_depurado['sitio23']);
                $my_template->setValue('direccionsitio',$array_depurado['direccionsitio23']);
                $my_template->setValue('investigador',$array_depurado['investigador23']);
                $my_template->setValue('nombre',$array_depurado['nombre23']);
                $my_template->setValue('puesto',$array_depurado['puesto23']);
                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha23'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha23']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha23'])) );

                $my_template->cloneBlock('bloque',(count($array_depurado) - 10), true, true);
                 for ($i=0; $i < (count($array_depurado) - 10); $i++) { 
                $my_template->setValue('material#'.($i+1),htmlspecialchars($array_depurado['23-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                }
            }

            if(24 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo24']); 
                $my_template->setValue('numsitio',$array_depurado['numerositio24']);
                $my_template->setValue('investigador',$array_depurado['nombre24']);

            }

            if(28 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo28']); 
                $my_template->setValue('numsitio',$array_depurado['numerositio28']);
                $my_template->setValue('investigador',$array_depurado['nombre28']);

            }
            if(29 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo29']); 
                $my_template->setValue('numsitio',$array_depurado['numerositio29']);
                $my_template->setValue('investigador',$array_depurado['nombre29']);

            }
            if(30 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo30']); 
                $my_template->setValue('numsitio',$array_depurado['numerositio30']);
                $my_template->setValue('investigador',$array_depurado['nombre30']);

            }

            if(31 ==  $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo31']); 
                $my_template->setValue('titulo',$array_depurado['titulo31']);
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores31']);
                $my_template->setValue('direccionsitio',$array_depurado['direccionsitio31']); 
                $my_template->setValue('investigador',$array_depurado['investigador31']);
                $my_template->setValue('apellidoinvestigador',$array_depurado['apellido31']);
                $my_template->setValue('pais',$array_depurado['pais31']); 
                $my_template->setValue('numsitio',$array_depurado['numsitio31']);
                $my_template->setValue('numsujeto',$array_depurado['numsujeto31']);
                $my_template->setValue('genero',$array_depurado['genero31']);

                $my_template->setValue('fecha', date('d', strtotime($array_depurado['fecha31'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fecha31']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fecha31'])) );
                $my_template->setValue('fechanacimiento', date('d', strtotime($array_depurado['fechanacimiento31'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechanacimiento31']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechanacimiento31'])) );
                $my_template->setValue('fechafalla', date('d', strtotime($array_depurado['fechafalla31'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechafalla31']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechafalla31'])) );
                

            }


            if(32 ==  $formato['documento_formato_id']){
                //principal
                $my_template->setValue('codigo',$array_depurado['codigo32']); 
                $my_template->setValue('numerositio',$array_depurado['numerositio32']);
                $my_template->setValue('tipovisita',$array_depurado['tipovisita32']);
                $my_template->setValue('investigador',$array_depurado['nombre32']);
                $my_template->setValue('direccion',$array_depurado['direccion32']); 
                $my_template->setValue('sitio',$array_depurado['sitio32']);
                $my_template->setValue('estado',$array_depurado['estado32']);
                $my_template->setValue('ciudad',$array_depurado['ciudad32']); 
                $my_template->setValue('cp',$array_depurado['cp32']);
                $my_template->setValue('pais',$array_depurado['pais32']);
                
                $my_template->setValue('fechavisita', date('d', strtotime($array_depurado['fechavisita32'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechavisita32']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechavisita32'])) );
                $my_template->setValue('fechaseguimiento', date('d', strtotime($array_depurado['fechaseguimiento32'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechaseguimiento32']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechaseguimiento32'])) );
               
                
                //elementos de acciones
                $my_template->cloneBlock('bloque',$array_depurado['clon'], true, true);
                for ($i=0; $i < $array_depurado['clon']; $i++) { 
                $my_template->setValue('ti#'.($i+1),htmlspecialchars($array_depurado['ti-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('edo#'.($i+1),htmlspecialchars($array_depurado['edo-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('ac#'.($i+1),htmlspecialchars($array_depurado['ac-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('no#'.($i+1),htmlspecialchars($array_depurado['no-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
                $my_template->setValue('fi#'.($i+1), date('d', strtotime($array_depurado['fi-75no'. ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fi-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fi-75no'. ($i + 18)])) );
                $my_template->setValue('ff#'.($i+1), date('d', strtotime($array_depurado['ff-75no' . ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['ff-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['ff-75no'. ($i + 18)])) );

               } 

               $my_template->cloneBlock('bloque2',$array_depurado['clonb'], true, true);
               for ($i=0; $i < $array_depurado['clonb']; $i++) { 
               $my_template->setValue('su#'.($i+1),htmlspecialchars($array_depurado['su-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('edod#'.($i+1),htmlspecialchars($array_depurado['edod-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('vi#'.($i+1),htmlspecialchars($array_depurado['vi-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('se#'.($i+1),htmlspecialchars($array_depurado['se-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('c1#'.($i+1),htmlspecialchars($array_depurado['c1-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('c2#'.($i+1),htmlspecialchars($array_depurado['c2-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('de#'.($i+1),htmlspecialchars($array_depurado['vi-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
               $my_template->setValue('acc#'.($i+1),htmlspecialchars($array_depurado['se-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));


               if($array_depurado['av-75no'. ($i + 18)] == "Si"){
                $my_template->setValue('si#'.($i+1),' ̶s̶i̶ ̶');
                $my_template->setValue('no#'.($i+1),'no');

               }else{
                $my_template->setValue('si#'.($i+1),'si');
                $my_template->setValue('no#'.($i+1),' ̶n̶o̶ ̶');
               }

               $my_template->setValue('fe#'.($i+1), date('d', strtotime($array_depurado['fe-75no'. ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fe-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fe-75no'. ($i + 18)])) );
               $my_template->setValue('fr#'.($i+1), date('d', strtotime($array_depurado['fr-75no' . ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fr-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fr-75no'. ($i + 18)])) );
               $my_template->setValue('fav#'.($i+1), date('d', strtotime($array_depurado['fav-75no'. ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fav-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fav-75no'. ($i + 18)])) );
               $my_template->setValue('ffi#'.($i+1), date('d', strtotime($array_depurado['ffi-75no' . ($i + 18)])) . ' de '  . $meses[ date('n', strtotime($array_depurado['ffi-75no'. ($i + 18)]))-1 ] . ' del ' . date('Y', strtotime($array_depurado['ffi-75no'. ($i + 18)])) );

              } 

            }

            
            if(40 == $formato['documento_formato_id']){
                $my_template->setValue('codigo',$array_depurado['codigo40']); 
                $my_template->setValue('patrocinador',$array_depurado['patrocinadores40']);
                $my_template->setValue('md',$array_depurado['md40']);
                $my_template->setValue('nombremd',$array_depurado['nombremd40']); 
                $my_template->setValue('patologia',$array_depurado['patologia40']); 
                $my_template->setValue('participacion',$array_depurado['participacion40']); 
              
                
                $my_template->setValue('fechainicio', date('d', strtotime($array_depurado['fechainicio40'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechainicio40']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechainicio40'])) );
                $my_template->setValue('fechater', date('d', strtotime($array_depurado['fechater40'])) . ' de '  . $meses[ date('n', strtotime($array_depurado['fechater40']))-1 ] . ' del ' . date('Y', strtotime($array_depurado['fechater40'])) );
               
 
                $my_template->cloneBlock('bloque',$array_depurado['clon'], true, true);
                for ($i=0; $i < $array_depurado['clon']; $i++) { 
                $my_template->setValue('institucion#'.($i+1),htmlspecialchars($array_depurado['40-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
              
               } 

               $my_template->cloneBlock('bloque2',$array_depurado['clonb'], true, true);
                for ($i=0; $i < $array_depurado['clonb']; $i++) { 
                $my_template->setValue('personal#'.($i+1),htmlspecialchars($array_depurado['40b-75no'. ($i + 18)], ENT_COMPAT, 'UTF-8'));
            
               } 
            }

        try{
            // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban - se puede utilizar el codigo del proyecto
            $my_template->saveAs(storage_path( '../public/assets/ID-documents/' . $id . '-' .$nombreDocumento['directorio'] ) );
            // $my_template->saveAs(storage_path( '../public/assets/CE-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
        }catch (Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }

        return response()->download(storage_path( '../public/assets/ID-documents/'  . $id . '-' .$nombreDocumento['directorio'] ) );
        // return response()->download(storage_path( '../public/assets/CE-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] ));
    }

   

}
