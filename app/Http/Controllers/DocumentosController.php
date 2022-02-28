<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Documentos;
use App\Models\Documentos\Documentos_capacitacion;
use App\Models\Documentos\Documentos_instructivos;
use App\Models\Documentos\Documentos_manuales;
use App\Models\Documentos\Documentos_procedimientos;
use App\Models\Documentos\Documentos_procesos;
use App\Models\Documentos\Documentos_formatos;
use App\Models\Documentos\Formato;
use App\Models\Administracion\Proyecto;
use App\Models\User;
use PDF;

class DocumentosController extends Controller
{

  public function __construct(){
      //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
      $this->middleware('can:documentos.index');//PROTEGE TODAS LAS RUTAS
      //$this->middleware('can:users.index')->only('index');//SOLO PROTEGE LO QUE ESPECIFIQUEMOS
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $documentos_manuales = Documentos_manuales::all();
    $documentos_procesos = Documentos_procesos::all();
    $documentos_capacitacion = Documentos_capacitacion::all();
    $documentos_instructivos = Documentos_instructivos::all();
    $documentos_procedimientos = Documentos_procedimientos::all();
    $documentos_formatos = Documentos_formatos::pluck('nombre_doc', 'id');
    
    return view('documentos.index', compact('documentos_manuales', 'documentos_procesos', 'documentos_capacitacion', 'documentos_instructivos', 'documentos_procedimientos', 'documentos_formatos'));

  }

  public function pdf(Request $request, $id)
  {

    $formato = Formato::where('id', $id)->get()->first();
    $datos = json_decode($formato->datos_json);
    $id = $id;
    $pdf = PDF::loadView('documentos.pdf', compact('id', 'formato', 'datos'));

    return $pdf->stream();
    // return $pdf->download('__documentos.pdf');
    // return view('documentos.pdf', compact('id', 'formato'));
  }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos.create');
    }

    public function list_formatos(Request $request)
  {
    // TODO: al momento de cargar la tabla se tendra que ver columnas se veran son diferentes para cada formato
    // TODO: validar al momento de crear un nuevo formato, si ya exite uno con el mismo proyecto
    $user_id = auth()->id();
    $formato_id = $request->formato_id;
    //TODO: forma de cargar la variable global de empresa y menu
    // $formatos = Formato::where('documento_formato_id', $formato_id, session('id_empresa'))->get();
    $formatos = Formato::where('documento_formato_id', $formato_id)->get();
    
    return datatables()->of($formatos)
    ->addColumn('fecha', function ($formatos) {
      $fecha = $formatos->datos_json;
      $fecha = json_decode($fecha, true);
      $fecha = $fecha[1];
      $fecha = $formatos->created_at;
      $html3 = $fecha;
      return $html3;
    })
    ->addColumn('codigo_uis', function ($formatos) {
      $codigouis = $formatos->proyecto_id;
      // TODO: ESto va a cambiar una vez que se cambien los nombres de los imputs
      // $codigouis = Proyecto::where('id', $codigouis)->get()->first();
      // TODO: CAmbiar para que sea la line comentdda
      // $html4 = $codigouis->no18;
      $html4 = $codigouis;
      return $html4;
    })
    ->addColumn('fecha_aprob', function ($formatos) {
      $html4 = $formatos->datos_json;
      return $html4;
    })
    ->addColumn('usuario', function ($formatos) {
      $user = $formatos->user_id;
      $user = User::where('id', $user)->get()->first();
      $html4 = $user->name;
      return $html4;
    })
    ->addColumn('download_delete', function ($formatos) {
      $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="sc/documentos/pdf/'.$formatos->id. /*'" onclick="download_formatos('.$formatos->id.')"*/ '" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span></a>
      <button type="button" title="Eliminar" name="delete" id="'.$formatos->id.'" onclick="delete_formatos('.$formatos->id.');" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
      return $html5;
    })
    ->addColumn('edit', function ($formatos) {
      $html6 = '<button type="button" title="Editar" name="edit" id="'.$formatos->id.'" onclick="edit_formatos('.$formatos->id.');" class="delete btn btn-warning btn-sm"><span class="fas fa-edit"></span></button>';
      return $html6;
    })
    ->rawColumns(['fecha', 'codigo_uis', 'fecha_aprob', 'usuario', 'download_delete', 'edit'])
    ->make(true);
  }

  public function list_proyectos(Request $request){

    //TODO: condición para saber si el request tiene datos o no
    if ($request->proyecto_id) {
      // $proyectos = Proyecto::where('id', $request->proyecto_id)->get()->toJson();
      $proyectos = Proyecto::where('proyectos.id', $request->proyecto_id)
      ->join('investigadores', 'proyectos.investigador_id', '=', 'investigadores.id')
      ->join('empresas', 'proyectos.empresa_id', '=', 'empresas.id')
      ->join('users', 'proyectos.id_user' , '=', 'users.id')
      ->select('proyectos.*', 'investigadores.*', 'empresas.*', 'users.*')
      ->get()->toJson();

      return json_encode($proyectos);
    }else{
      $proyectos = Proyecto::all()->toJson();

      return json_encode($proyectos);
    }

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
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create_formato(Request $request)
  {		

    if ($request->ajax()) {
      // //VALIDAR CAMPOS
      $request->validate([
        'documentoformato_id' => 'required',
        'proyecto_id' => 'required',
      ]);

      // //id usuario loggeado
      $id_user = auth()->id();
      // //TODO: Buscar los datos del usuario, la empresa y el area(menu) en  un provider o donde sea que se encuentren
      $documento_formato_id = $request->documentoformato_id;
      $empresa_id = $request->empresa_id;
      $proyecto_id = $request->proyecto_id;
      $menu_id = $request->menu_id;
      $formato_id = $request->formato_id;

      // Create formato
      if (!$formato_id) {
        
        // consulta para seber si ya existe el formato que se guardara
        //TODO: ver si se guardaran datos "repetidos"
        // $formato = Formato::where('documento_formato_id', $documento_formato_id)
        // ->where('empresa_id', $empresa_id)
        // ->where('menu_id', $menu_id)
        // ->where('proyecto_id', $proyecto_id)
        // ->where('user_id', $id_user)
        // ->get()->first();

        $formato = null;

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
        
        if (!$formato) {
          // GUARDAR REGISTROS
          $formatos = new Formato();
          $formatos->documento_formato_id = $request->documentoformato_id;
          $formatos->datos_json = $datos;
          //TODO: cambiar para que sea la empresa y el menu correctos
          $formatos->empresa_id = $empresa_id;
          $formatos->menu_id = $menu_id;
          $formatos->proyecto_id = $proyecto_id;
          $formatos->user_id = $id_user;
          $formatos-> save();

          if ($formatos) {
            return response('guardado');
          }else{
            return response(null);
          }
          
        }else{
          return response(null);
        }

        // Update formato
      }else{

        $datos_json = json_encode($request->all());
        $datos_array = json_decode($datos_json, true);
        $datos = null;

        //count para saber cuantos datos son, dependiendo del formulario
        $countArray = count($datos_array);
        // TODO: ver que onda con el ultimo valor no se guarda
        for ($i=1; $i < $countArray - 6; $i++) { 
          $key = $documento_formato_id . 'no' . $i;
          $datos[] = $datos_array[$key];
        }
        $datos = json_encode($datos);


        $formatos = Formato::find($formato_id);

        $formatos->documento_formato_id = $request->documentoformato_id;
        $formatos->datos_json = $datos;
        //TODO: cambiar para que sea la empresa y el menu correctos
        $formatos->empresa_id = $empresa_id;
        $formatos->menu_id = $menu_id;
        $formatos->proyecto_id = $proyecto_id;
        $formatos->user_id = $id_user;
        $formatos-> save();

        if ($formatos) {
          return response('editado');
        }else{
          return response(null);
        }

      };
  
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
      $formato = Formato::where('id', $formato_id)->delete();

      if ($formato > 0) {
        return response($formato);
      }else{
        return response(null);
      }

    }
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
      $formato = Formato::where('id', $formato_id)->get()->first()->toJson();
      
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
  public function download_formato(Request $request)
  {		
    
  }


}
