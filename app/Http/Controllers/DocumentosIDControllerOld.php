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
            
        }else {

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
            
                 
                $formatoWord = Formatos_id::where('id', $request->documentoformato_id)->get()->first();
                $array_depurado =  json_decode($datos, true);;
        
                // Obtener Los datos del tipo de formato 
                $nombreDocumento = Documentos_id_formatos::where('id', $formatoWord['documento_formato_id'])->get()->first();

                // Obtener los datos del proyecto
                $codigoUIS = Proyecto::where('id', $formatoWord->proyecto_id)->get()->first();
                $codigoUIS = $codigoUIS->no18;
                
                // Obtener los datos del investigador
                // TODO: probar cuando ya esten los investigadores capturados o poner los datos desde el modal
                // $investigador = Investigador::where('id', $codigoUIS->investigador_id)->get()->first();

                $currentTime = Carbon::now();
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                
                $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/ID/5. FC-ID/' . $nombreDocumento['directorio'] . ''));
                \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
               
                if (3 == $formatoWord['documento_formato_id']) {
                 
                    $my_template->setValue('codigo',$array_depurado['codigo']);
                    $my_template->setValue('titulo',$array_depurado['titulo']);
                    $my_template->setValue('disenio',$array_depurado['disenio']);
                    $my_template->setValue('tamanio',$array_depurado['tamanio']);


                    $my_template->cloneRow('criterio', count($array_depurado) - 4);
                    for ($i=0; $i < count($array_depurado) - 4; $i++) { 
                    $my_template->setValue('criterio#'.($i+1),$array_depurado['75no18']);
                    }
            
                }
             
                //GUARDADO EN WORD
                try{
                    // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban - se puede utilizar el codigo del proyecto
                    $my_template->saveAs(storage_path( '../public/assets/ID-documents/' . $request->documentoformato_id . '-' .$nombreDocumento['directorio'] ) );
                    // $my_template->saveAs(storage_path( '../public/assets/CE-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
                }catch (Exception $e){
                    return back()->withError($e->getMessage())->withInput();
                }
       /*
                response()->download(storage_path( '../public/assets/ID-documents/'  . $request->documentoformato_id . '-' .$nombreDocumento['directorio'] ) );
             */
                
                
               if ($formatos) {
                    return response('guardado');
                }else{
                    return response('no guardado');
                } 
                

            

        }else{

            $datos_json = json_encode($request->all());
            $datos_array = json_decode($datos_json, true);
            $datos = null;

            //count para saber cuantos datos son, dependiendo del formulario
            $countArray = count($datos_array);
            // TODO: ver que onda con el ultimo valor no se guarda,   ----  talvez ya resuelto 
            // TODO: ver si todavia es $countArray -6, puede que se cambie a 5
            
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

/*

    function word(request $request, $id)
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


        

        

        // Documento Propuesta Inicial
        if (3 == $formato['documento_formato_id']) {
            // $my_template->setValue('fecha', $datos[0]);
            //$my_template->setValue('fecha', date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
            $my_template->setValue('codigo', $datos['0']);
            $my_template->setValue('titulo', $datos['1']);
            $my_template->setValue('disenio', $datos['2']);

           $my_template->cloneRow('documento', count($datos) - 4);
             /*for ($i=0; $i < count($datos) - 4; $i++) { 
                $my_template->setValue('documento#'.($i+1), htmlspecialchars($datos[$i + 4], ENT_COMPAT, 'UTF-8'));
            }
            $my_template->setValue('tamanio', $datos[4]);
            
            
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
    */

}
