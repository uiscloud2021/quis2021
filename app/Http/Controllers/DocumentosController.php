<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Documentos\Documentos_capacitacion;
use App\Models\Documentos\Documentos_instructivos;
use App\Models\Documentos\Documentos_manuales;
use App\Models\Documentos\Documentos_procedimientos;
use App\Models\Documentos\Documentos_procesos;
use App\Models\Documentos\Documentos_formatos;
use App\Models\Documentos\Formato;
use App\Models\Documentos\Formatos_cv;
use App\Models\Administracion\Proyecto;
use App\Models\Administracion\Investigador;
use App\Models\User;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;

class DocumentosController extends Controller
{

  public function __construct(){
      //PROTEGRE LAS RUTAS POR EL CONTROLADOR DEPENDIENDO DE ROLES Y PERMISOS
      $this->middleware('can:documentos_sc.index');//PROTEGE TODAS LAS RUTAS
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
    $documentos_formatos = Documentos_formatos::orderBy('nombre_doc', 'asc')->where( 'empresa_id', 0 )->orWhere( 'empresa_id', session('id_empresa') )->pluck('nombre_doc', 'id');
    $last_format = Documentos_formatos::orderBy('id', 'desc')->select('id')->first();
    $last_format = $last_format->id;

    // dd($documentos_formatos);
    
    $proyectos = Proyecto::where('empresa_id', '=', session('id_empresa'))
    ->where('no27', '<>', 'Cerrado')->where('no10', '=', 'Si')->get();
    
    return view('documentos_sc.index', compact('documentos_manuales', 'documentos_procesos', 'documentos_capacitacion', 'documentos_instructivos', 'documentos_procedimientos', 'documentos_formatos', 'proyectos', 'last_format'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('documentos_sc.create');
  }
  
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function cv(Request $request, $id, $dato)
  {
    // dd($dato . ' ' . $id);
    $tipo = $id;

    return view('documentos_sc.create', compact('tipo'));
  }
  
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit_cv(Request $request, $id, $tipo)
  {

    $cv = Formatos_cv::where('id', $id)->get()->first();

    if ($tipo == 'esp') {
      if ($cv->has_esp == 1) {
        $all = json_decode($cv->datos_esp_json, true);
        $no = json_decode($cv->datos_esp_json, true);
      } else {
        $all = json_decode($cv->datos_eng_json, true);
        $no = json_decode($cv->datos_eng_json, true);
      }
    }
    if ($tipo == 'eng') {
      if ($cv->has_eng == 1) {
        $all = json_decode($cv->datos_eng_json, true);
        $no = json_decode($cv->datos_eng_json, true);
      } else {
        $all = json_decode($cv->datos_esp_json, true);
        $no = json_decode($cv->datos_esp_json, true);
      }
    }

    unset($all['afCount']); // Esto elimina el elemento del json
    unset($all['ceCount']); // Esto elimina el elemento del json
    unset($all['edCount']); // Esto elimina el elemento del json
    unset($all['enCount']); // Esto elimina el elemento del json
    unset($all['esCount']); // Esto elimina el elemento del json
    unset($all['exCount']); // Esto elimina el elemento del json
    $all = json_encode($all);
    $all = json_decode($all);


    $afiliacion = [];
    $educacion = [];
    $experiencia = [];
    $cedula = [];
    $entrenamiento = [];
    $estudio = [];

    $afCount = $no['afCount'] / 3;
    $edCount = $no['edCount'] / 4;
    $exCount = $no['exCount'] / 4;
    $ceCount = $no['ceCount'] / 4;
    $enCount = $no['enCount'] / 4;
    $esCount = $no['esCount'] / 4;

    for ($i=1; $i <= $afCount * 3; $i++) { 
      $key = 'af' . $i;
      if ($no[$key]) {
        $afiliacion['af' . $i] = $no[$key];
      };
    }
    $afiliacion = json_encode($afiliacion);
    // $afiliacion = json_decode($afiliacion);
    
    for ($i=1; $i <= $edCount * 4; $i++) { 
      $key = 'ed' . $i;
      if ($no[$key]) {
        $educacion['ed' . $i] = $no[$key];
      };
    }
    $educacion = json_encode($educacion);
    // $educacion = json_decode($educacion);
    
    for ($i=1; $i <= $exCount * 4; $i++) { 
      $key = 'ex' . $i;
      if ($no[$key]) {
        $experiencia['ex' . $i] = $no[$key];
      };
    }
    $experiencia = json_encode($experiencia);
    // $experiencia = json_decode($experiencia);
    
    for ($i=1; $i <= $ceCount * 4; $i++) { 
      $key = 'ce' . $i;
      if ($no[$key]) {
        $cedula['ce' . $i] = $no[$key];
      };
    }
    $cedula = json_encode($cedula);
    // $cedula = json_decode($cedula);
    
    for ($i=1; $i <= $enCount * 4; $i++) { 
      $key = 'en' . $i;
      if ($no[$key]) {
        $entrenamiento['en' . $i] = $no[$key];
      };
    }
    $entrenamiento = json_encode($entrenamiento);
    // $entrenamiento = json_decode($entrenamiento);
    
    for ($i=1; $i <= $esCount * 4; $i++) { 
      $key = 'es' . $i;
      if ($no[$key]) {
        $estudio['es' . $i] = $no[$key];
      };
    }
    $estudio = json_encode($estudio);
    // $estudio = json_decode($estudio);



    for ($i=1; $i < 34; $i++) { 
      $key = 'no' . $i;
      if ($no[$key]) {
        $datos['no' . $i] = $no[$key];
      };
    }
    $no = json_encode($datos);
    $no = json_decode($no);


    // dd( $exCount );
    // $tipo = $id;

    return view('documentos_sc.edit', compact('tipo', 'cv', 'all', 'afCount', 'ceCount', 'edCount', 'enCount', 'esCount', 'exCount', 'no', 'afiliacion', 'educacion', 'experiencia', 'cedula', 'entrenamiento', 'estudio'));

  }

  public function update_cv(Request $request)
  {
    if ($request->ajax()) {
      // VALIDAR CAMPOS
      $request->validate([
        'id' => 'required',
      ]);

      // id usuario loggeado
      $id_user = auth()->id();
      $empresa_id = session('id_empresa');

      $datos_array = json_encode($request->all());
      $datos_json = json_decode($datos_array, true);
      $id = $datos_json['id'];
      $tipo = $datos_json['tipo'];
      unset($datos_json['_token']); // Esto elimina el elemento del json
      unset($datos_json['id']);
      unset($datos_json['tipo']);
      $datos = json_encode($datos_json);
      // return response($datos);
      

      // $countArray = count($datos_json);

      // for ($i=1; $i < $countArray - 6; $i++) { 
      //   $key = 'no' . $i;
      //   $datos[] = $datos_json[$key];
      // }
      // $datos = json_encode($datos);
      
      // GUARDAR REGISTROS
      $formatos = Formatos_cv::find($request->id);
      $formatos->empresa_id = $empresa_id;
      $formatos->user_id = $id_user;
      if ($tipo == 'esp') {
        $formatos->datos_esp_json = $datos;
        $formatos->has_esp = 1;
      }
      if ($tipo == 'eng') {
        $formatos->datos_eng_json = $datos;
        $formatos->has_eng = 1;
      }
      $formatos->save();
      // return response($formatos);

      if ($formatos) {
        return response('guardado');
      }else{
        return response('no guardado');
      }

    }
  }

  public function word_cv(Request $request, $id, $tipo)
  {
    $formato = Formatos_cv::where('id', $id)->get()->first();
    $datos = json_decode($formato->datos_esp_json, true);

    
    if ($tipo == 'esp') {
      if ($formato->has_esp == 1) {
        $all = json_decode($formato->datos_esp_json, true);
        $no = json_decode($formato->datos_esp_json, true);
      } else {
        $all = json_decode($formato->datos_eng_json, true);
        $no = json_decode($formato->datos_eng_json, true);
      }
    }
    if ($tipo == 'eng') {
      if ($formato->has_eng == 1) {
        $all = json_decode($formato->datos_eng_json, true);
        $no = json_decode($formato->datos_eng_json, true);
      } else {
        $all = json_decode($formato->datos_esp_json, true);
        $no = json_decode($formato->datos_esp_json, true);
      }
    }
    
    unset($all['afCount']); // Esto elimina el elemento del json
    unset($all['ceCount']); // Esto elimina el elemento del json
    unset($all['edCount']); // Esto elimina el elemento del json
    unset($all['enCount']); // Esto elimina el elemento del json
    unset($all['esCount']); // Esto elimina el elemento del json
    unset($all['exCount']); // Esto elimina el elemento del json
    $all = json_encode($all);
    $all = json_decode($all);


    $afiliacion = [];
    $educacion = [];
    $experiencia = [];
    $cedula = [];
    $entrenamiento = [];
    $estudio = [];

    $afCount = $no['afCount'] / 3;
    $edCount = $no['edCount'] / 4;
    $exCount = $no['exCount'] / 4;
    $ceCount = $no['ceCount'] / 4;
    $enCount = $no['enCount'] / 4;
    $esCount = $no['esCount'] / 4;
    
    for ($i=1; $i <= $afCount * 3; $i++) { 
      $key = 'af' . $i;
      if ($no[$key]) {
        $afiliacion[] = $no[$key];
      };
    }
    // $afiliacion = json_encode($afiliacion);
    // $afiliacion = json_decode($afiliacion);
    
    for ($i=1; $i <= $edCount * 4; $i++) { 
      $key = 'ed' . $i;
      if ($no[$key]) {
        $educacion[] = $no[$key];
      };
    }
    // $educacion = json_encode($educacion);
    // $educacion = json_decode($educacion);
    
    for ($i=1; $i <= $exCount * 4; $i++) { 
      $key = 'ex' . $i;
      if ($no[$key]) {
        $experiencia[] = $no[$key];
      };
    }
    // $experiencia = json_encode($experiencia);
    // $experiencia = json_decode($experiencia);
    
    for ($i=1; $i <= $ceCount * 4; $i++) { 
      $key = 'ce' . $i;
      if ($no[$key]) {
        $cedula[] = $no[$key];
      };
    }
    // $cedula = json_encode($cedula);
    // $cedula = json_decode($cedula);
    
    for ($i=1; $i <= $enCount * 4; $i++) { 
      $key = 'en' . $i;
      if ($no[$key]) {
        $entrenamiento[] = $no[$key];
      };
    }
    // $entrenamiento = json_encode($entrenamiento);
    // $entrenamiento = json_decode($entrenamiento);
    
    for ($i=1; $i <= $esCount * 4; $i++) { 
      $key = 'es' . $i;
      if ($no[$key]) {
        $estudio[] = $no[$key];
      };
    }
    // $estudio = json_encode($estudio);
    // $estudio = json_decode($estudio);

    
    // for ($i=1; $i < 34; $i++) { 
    //   $key = 'no' . $i;
    //   if ($no[$key]) {
    //     $datosJ[] = $no[$key];
    //   };
    // }
    // $no = json_encode($datosJ);
    // $no = json_decode($no);
    

    $currentTime = Carbon::now();
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    

    if ($tipo == 'esp') {
      $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/SC/5- FC-SC/FC-SC-2101 CV Espanol.docx'));
    }
    if ($tipo == 'eng') {
      $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/SC/5- FC-SC/FC-SC-2102 CV English.docx'));
    }
    
    // dd($no);
    // dd($afCount);


    // $my_template->setValue('nombre', $datosJ[0]);
    $my_template->setValue('nombre', $no['no1']);
    // $my_template->setValue('tituloAca', $datos[1]);
    $my_template->setValue('tituloAca', $no['no2']);
    // $my_template->setValue('empresa', $datosJ[2]);
    $my_template->setValue('empresa', $no['no3']);
    // $my_template->setValue('direccion', $datosJ[3]);
    $my_template->setValue('direccion', $no['no4']);
    // $my_template->setValue('mail', $datosJ[4]);
    $my_template->setValue('mail', $no['no5']);
    // $my_template->setValue('telefono', $datosJ[5]);
    $my_template->setValue('telefono', $no['no6']);
    // $my_template->setValue('movil', $datosJ[6]);
    $my_template->setValue('movil', $no['no7']);
    // $my_template->setValue('fax', $datosJ[7]);
    $my_template->setValue('fax', $no['no8']);
    // $my_template->setValue('institucionAf', $datosJ[0]);
    // $my_template->setValue('departamentoAf', $datosJ[0]);
    // $my_template->setValue('direccionAf', $datosJ[0]);
    // $my_template->setValue('gradoEd', $datosJ[0]); 
    // $my_template->setValue('institucionEd', $datosJ[0]);
    // $my_template->setValue('especialidadEd', $datosJ[0]);
    // $my_template->setValue('anoterminacionEd', $datosJ[0]);
    // $my_template->setValue('puestoEx', $datosJ[0]);
    // $my_template->setValue('departamentoEx', $datosJ[0]);
    // $my_template->setValue('anoIniEx', $datosJ[0]);
    // $my_template->setValue('anoFinEx', $datosJ[0]);
    // $my_template->setValue('tituloCe', $datosJ[0]);
    // $my_template->setValue('institucionCe', $datosJ[0]);
    // $my_template->setValue('cedulaCe', $datosJ[0]);
    // $my_template->setValue('anoCe', $datosJ[0]);
    // $my_template->setValue('proveedorEn', $datosJ[0]);
    // $my_template->setValue('tituloEn', $datosJ[0]);
    // $my_template->setValue('versionEn', $datosJ[0]);
    // $my_template->setValue('fechaFinEn', $datosJ[0]);

    // dd($no['no28'][0]);
    if ($no['no28'][0] != 0) {
      // dd($no['no28']);

      $checkbox = count($no['no28']);

      for ($i=0; $i < $checkbox; $i++) {  
        switch ($no['no28'][$i]) {
          case 1:
            $my_template->setValue('a', '✔');
            break;
          case 2:
            $my_template->setValue('b', '✔');
            break;
          case 3:
            $my_template->setValue('c', '✔');
            break;
          case 4:
            $my_template->setValue('d', '✔');
            break;
          case 5:
            $my_template->setValue('e', '✔');
            break;
          
          default:
            if ($i == 1) {
              
            }
            break;
        }
      }
      for ($i=0; $i < $checkbox; $i++) { 
        if ($no['no28'][$i] != 1) {
          $my_template->setValue('a', '');
        }
      }
      for ($i=0; $i < $checkbox; $i++) { 
      if ($no['no28'][$i] != 2) {
        $my_template->setValue('b', '');
      }
      }
      for ($i=0; $i < $checkbox; $i++) { 
      if ($no['no28'][$i] != 3) {
        $my_template->setValue('c', '');
      }
      }
      for ($i=0; $i < $checkbox; $i++) { 
      if ($no['no28'][$i] != 4) {
        $my_template->setValue('d', '');
      }
      }
      for ($i=0; $i < $checkbox; $i++) { 
      if ($no['no28'][$i] != 5) {
        $my_template->setValue('e', '');
      }
      }
      
      $my_template->setValue('otroEs', $no['no29']);

    } else {
      // dd($no['no28'][0]);

      $my_template->setValue('a', '');
      $my_template->setValue('b', '');
      $my_template->setValue('c', '');
      $my_template->setValue('d', '');
      $my_template->setValue('e', '');

      $my_template->setValue('otroEs', '');

    }
    
    if ($no['no30'] == '') {
      $my_template->setValue('f', '✔');
    } else {
      $my_template->setValue('f', '');
    }
    // $my_template->setValue('faseEs', $datosJ[0]);
    // $my_template->setValue('areaEs', $datosJ[0]);
    // $my_template->setValue('estuTerEs', $datosJ[0]);
    // $my_template->setValue('estuDesEs', $datosJ[0]);
    // $my_template->setValue('fecha', 'a ' . date('d', strtotime($datosJ[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );

    
    // dd($no);


    $my_template->cloneRow('institucionAf', $afCount + 1);
    
    $my_template->setValue('institucionAf#1', htmlspecialchars($no['no9'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('departamentoAf#1', htmlspecialchars($no['no10'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('direccionAf#1', htmlspecialchars($no['no11'], ENT_COMPAT, 'UTF-8'));
    
    $aux = 0;
    // dd($afiliacion[1]);
    for ($i = 1; $i <= $afCount; $i++) { 
      $my_template->setValue('institucionAf#'.($i+1), htmlspecialchars($afiliacion[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('departamentoAf#'.($i+1), htmlspecialchars($afiliacion[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('direccionAf#'.($i+1), htmlspecialchars($afiliacion[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 3;
    }
    
    
    $my_template->cloneRow('gradoEd', $edCount + 1);
    
    $my_template->setValue('gradoEd#1', htmlspecialchars($no['no12'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('institucionEd#1', htmlspecialchars($no['no13'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('especialidadEd#1', htmlspecialchars($no['no14'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('anoterminacionEd#1', htmlspecialchars($no['no15'], ENT_COMPAT, 'UTF-8'));

    $aux = 0;
    // dd($afiliacion[1]);
    for ($i = 1; $i <= $edCount; $i++) { 
      $my_template->setValue('gradoEd#'.($i+1), htmlspecialchars($educacion[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('institucionEd#'.($i+1), htmlspecialchars($educacion[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('especialidadEd#'.($i+1), htmlspecialchars($educacion[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('anoterminacionEd#'.($i+1), htmlspecialchars($educacion[$aux + 3], ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 4;
    }
    
    
    $my_template->cloneRow('puestoEx', $exCount + 1);
    
    $my_template->setValue('puestoEx#1', htmlspecialchars($no['no16'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('departamentoEx#1', htmlspecialchars($no['no17'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('anoIniEx#1', htmlspecialchars($no['no18'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('anoFinEx#1', htmlspecialchars($no['no19'], ENT_COMPAT, 'UTF-8'));
    
    $aux = 0;
    // dd($afiliacion[1]);
    for ($i = 1; $i <= $exCount; $i++) { 
      $my_template->setValue('puestoEx#'.($i+1), htmlspecialchars($experiencia[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('departamentoEx#'.($i+1), htmlspecialchars($experiencia[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('anoIniEx#'.($i+1), htmlspecialchars($experiencia[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('anoFinEx#'.($i+1), htmlspecialchars($experiencia[$aux + 3], ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 4;
    }
    
    
    $my_template->cloneRow('tituloCe', $ceCount + 1);
    
    $my_template->setValue('tituloCe#1', htmlspecialchars($no['no20'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('institucionCe#1', htmlspecialchars($no['no21'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('cedulaCe#1', htmlspecialchars($no['no22'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('anoCe#1', htmlspecialchars($no['no23'], ENT_COMPAT, 'UTF-8'));

    $aux = 0;
    // dd($afiliacion[1]);
    for ($i = 1; $i <= $ceCount; $i++) { 
      $my_template->setValue('tituloCe#'.($i+1), htmlspecialchars($cedula[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('institucionCe#'.($i+1), htmlspecialchars($cedula[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('cedulaCe#'.($i+1), htmlspecialchars($cedula[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('anoCe#'.($i+1), htmlspecialchars($cedula[$aux + 3], ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 4;
    }

    

    $my_template->cloneRow('proveedorEn', $enCount + 1);
    
    $my_template->setValue('proveedorEn#1', htmlspecialchars($no['no24'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('tituloEn#1', htmlspecialchars($no['no25'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('versionEn#1', htmlspecialchars($no['no26'], ENT_COMPAT, 'UTF-8'));
    $my_template->setValue('fechaFinEn#1', htmlspecialchars(date( 'd-m-Y', strtotime($no['no27']) ), ENT_COMPAT, 'UTF-8'));
    
    $aux = 0;
    // dd($afiliacion[1]);
    for ($i = 1; $i <= $enCount; $i++) { 
      $my_template->setValue('proveedorEn#'.($i+1), htmlspecialchars($entrenamiento[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('tituloEn#'.($i+1), htmlspecialchars($entrenamiento[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('versionEn#'.($i+1), htmlspecialchars($entrenamiento[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('fechaFinEn#'.($i+1), htmlspecialchars(date( 'd-m-Y', strtotime($entrenamiento[$aux + 3]) ), ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 4;
    }
    // dd($no);
    
    $my_template->cloneRow('faseEs', $esCount + 1);
    
    if ($no['noCheck'] == '0') {
      $my_template->setValue('faseEs#1', '');
      $my_template->setValue('areaEs#1', '');
      $my_template->setValue('estuTerEs#1', '');
      $my_template->setValue('estuDesEs#1', '');
    } else {
      $my_template->setValue('faseEs#1', htmlspecialchars($no['no30'], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('areaEs#1', htmlspecialchars($no['no31'], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('estuTerEs#1', htmlspecialchars($no['no32'], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('estuDesEs#1', htmlspecialchars($no['no33'], ENT_COMPAT, 'UTF-8'));
    }
    
    $aux = 0;
    // dd($datosJ);
    for ($i = 1; $i <= $esCount; $i++) { 
      $my_template->setValue('faseEs#'.($i+1), htmlspecialchars($estudio[$aux], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('areaEs#'.($i+1), htmlspecialchars($estudio[$aux + 1], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('estuTerEs#'.($i+1), htmlspecialchars($estudio[$aux + 2], ENT_COMPAT, 'UTF-8'));
      $my_template->setValue('estuDesEs#'.($i+1), htmlspecialchars($estudio[$aux + 3], ENT_COMPAT, 'UTF-8'));
      $aux = $aux + 4;
    }
    

    try{
      if ($tipo == 'esp') {
        $my_template->saveAs(storage_path( '../public/assets/SC-documents/FC-SC-2101 CV Espanol-' . $id . '.docx' ));
      }
      if ($tipo == 'eng') {
        $my_template->saveAs(storage_path( '../public/assets/SC-documents/FC-SC-2102 CV English-' . $id . '.docx' ));
      }
    }catch (Exception $e){
      return back()->withError($e->getMessage())->withInput();
    }

    if ($tipo == 'esp') {
      return response()->download(storage_path(  '../public/assets/SC-documents/FC-SC-2101 CV Espanol-' . $id . '.docx'), 
      'FC-SC-2101 CV Espanol.docx' );
    }
    if ($tipo == 'eng') {
      return response()->download(storage_path( '../public/assets/SC-documents/FC-SC-2102 CV English-' . $id . '.docx' ), 
      'FC-SC-2102 CV English.docx' );
    }



  }

  public function list_cv(Request $request)
  {
    $user_id = auth()->id();

    $formatos = Formatos_cv::where('empresa_id', '=', session('id_empresa'))->get();
    
    return datatables()->of($formatos)
    ->addColumn('nombre', function ($formatos) {
      $html4 = '';
      if ($formatos->datos_esp_json) {
        $html4 = $formatos->datos_esp_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no1'];
      } else {
        $html4 = $formatos->datos_eng_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no1'];
      }
      return $html4;
    })
    ->addColumn('correo', function ($formatos) {
      $html4 = '';
      if ($formatos->datos_esp_json) {
        $html4 = $formatos->datos_esp_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no5'];
      } else {
        $html4 = $formatos->datos_eng_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no5'];
      }
      return $html4;
    })
    ->addColumn('telefono_casa', function ($formatos) {
      $html4 = '';
      if ($formatos->datos_esp_json) {
        $html4 = $formatos->datos_esp_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no6'];
      } else {
        $html4 = $formatos->datos_eng_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no6'];
      }
      return $html4;
    })
    ->addColumn('telefono_movil', function ($formatos) {
      // $user = $formatos->user_id;
      // $user = User::where('id', $user)->get()->first();
      // $html4 = $user->name;
      // return $html4;
      $html4 = '';
      if ($formatos->datos_esp_json) {
        $html4 = $formatos->datos_esp_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no7'];
      } else {
        $html4 = $formatos->datos_eng_json;
        $html4 = json_decode($html4, true);
        // $html4 = json_decode($html4);
        $html4 = $html4['no7'];
      }
      return $html4;
    })
    ->addColumn('edit', function ($formatos) {
      $html6 = '<a title="Editar" name="edit_esp" id="'.$formatos->id.'" href="/documentos_sc/edit_cv/'.$formatos->id. '/esp" class="delete btn btn-warning btn-sm"><span class="fas fa-edit"></span> ESP</a>' .
      '&nbsp;<a title="Editar" name="edit_eng" id="'.$formatos->id.'" href="/documentos_sc/edit_cv/'.$formatos->id. '/eng" class="delete btn btn-warning btn-sm"><span class="fas fa-edit"></span> ENG</a>';
      return $html6;
    })
    ->addColumn('pdf', function ($formatos) {
      $html6 = '<a class="btn btn-info btn-sm" title="Descargar" href="/documentos_sc/word_cv/'.$formatos->id. '/esp" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span> ESP</a>' .
      '&nbsp;<a class="btn btn-info btn-sm" title="Descargar" href="/documentos_sc/word_cv/'.$formatos->id. '/eng" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span> ENG</a>';
      return $html6;
    })
    ->addColumn('delete', function ($formatos) {
      $html5 = '<button type="button" title="Eliminar" name="delete" id="'.$formatos->id.'" onclick="delete_formatos_cv('.$formatos->id.');" class="delete btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>';
      return $html5;
    })
    ->rawColumns(['nombre', 'correo', 'telefono_casa', 'telefono_movil', 'edit', 'pdf', 'delete'])
    ->make(true);
  }



    public function list_formatos(Request $request)
  {
    $user_id = auth()->id();
    $formato_id = $request->formato_id;
    $codigo_id = $request->codigo_id;
    
    $formatos = Formato::where('documento_formato_id', $formato_id)
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
    //   $html4 = $formatos->datos_json;
    //   return $html4;
    // })
    ->addColumn('usuario', function ($formatos) {
      $user = $formatos->user_id;
      $user = User::where('id', $user)->get()->first();
      $html4 = $user->name;
      return $html4;
    })
    ->addColumn('download_delete', function ($formatos) {
      $html5 = '<a class="btn btn-info btn-sm" title="Descargar" href="/documentos_sc/word/'.$formatos->id. '" target="_blank" rel="noreferrer noopener"><span class="far fa-file-pdf"></span></a>
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

  public function codigos_nombre(Request $request){

    if ($request->proyecto_id) {
      $cd = Proyecto::where('id', $request->proyecto_id)->get()->first();
      $nombre = $cd->no18." - ".$cd->no20;
      return response($nombre);
    }

  }

  public function word(Request $request, $id)
  {

    $formato = Formato::where('id', $id)->get()->first();
    $datos = json_decode($formato->datos_json);

    // Obtener Los datos del tipo de formato 
    $nombreDocumento = Documentos_formatos::where('id', $formato['documento_formato_id'])->get()->first();

    // Obtener los datos del proyecto
    $proyecto = Proyecto::where('id', $formato->proyecto_id)->get()->first();
    $codigoUIS = $proyecto->no18;
    $investigador_id = $proyecto->investigador_id;

    // Obtener los datos del investigador
    // TODO: probar cuando ya esten los investigadores capturados o poner los datos desde el modal
    $investigador = Investigador::where('id', $investigador_id)->get()->first();

    $currentTime = Carbon::now();
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/SC/5- FC-SC/' . $nombreDocumento['directorio'] . ''));

    // Documento Presentacion
    if (1 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      $my_template->setValue('fecha', date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      // ver como esta lo del titulo
      $my_template->setValue('titulo', $datos[2]);
      $my_template->setValue('nombreCompleto', $datos[3]);
      $my_template->setValue('especialidad', $datos[4]);
      // Ver que si es mujer-hombre o con el titulo
      if ($datos[2] == 'Dr.') {
        $my_template->setValue('estimado/a', 'Estimado Doctor:');
      };
      if ($datos[2] == 'Dra.') {
        $my_template->setValue('estimado/a', 'Estimada Doctora:');
      };
      $my_template->setValue('patologia', $datos[5]);
      $my_template->setValue('tipoColaboracion', $datos[6]);
      $my_template->setValue('personaAcargo', $datos[7]);
    }

    // Documento publicidad
    if (3 == $formato['documento_formato_id']) {
      $my_template->setValue('nombrePatologia', $datos[0]);
      $my_template->setValue('telefonos', $datos[1]);

      $my_template->cloneBlock('block_requisitos', count($datos) - 2, true, true);
      for ($i=0; $i < count($datos) - 2; $i++) { 
        $my_template->setValue('requisito#'.($i+1), htmlspecialchars($datos[$i + 2], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Codigos y titulos
    if (4 == $formato['documento_formato_id']) {
      $my_template->setValue('codigo', $datos[0]);
      $my_template->setValue('codigoUis', $datos[1]);
      $my_template->setValue('numeroSitio', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('nickname1', $datos[4]);
      $my_template->setValue('nickname2', $datos[5]);
      $my_template->setValue('nickname3', $datos[6]);
      $my_template->setValue('patrocinador', $datos[7]);
      $my_template->setValue('cro', $datos[8]);
      $my_template->setValue('nombreInvestigador', $datos[9]);
      $my_template->setValue('telefonoInvestigador', $datos[10]);
      $my_template->setValue('movilInvestigador', $datos[11]);
      $my_template->setValue('mailInvestigador', $datos[12]);
      $my_template->setValue('nombreSubInv', $datos[13]);
      $my_template->setValue('telefonoSubInv', $datos[14]);
      $my_template->setValue('movilSubInv', $datos[15]);
      $my_template->setValue('mailsubInv', $datos[16]);
      $my_template->setValue('nombreCoordinador', $datos[17]);
      $my_template->setValue('nombreMonitor', $datos[18]);
      $my_template->setValue('telefonoMonitor', $datos[19]);
      $my_template->setValue('movilMonitor', $datos[20]);
      $my_template->setValue('mailMonitor', $datos[21]);
      $my_template->setValue('nombreLaboratorio', $datos[22]);
      $my_template->setValue('contactoLaboratorio', $datos[23]);
      $my_template->setValue('telefonoLaboratorio', $datos[24]);
      $my_template->setValue('faxLaboratorio', $datos[25]);
      $my_template->setValue('mailLaboratorio', $datos[26]);
      $my_template->setValue('nombreMustras', $datos[27]);
      $my_template->setValue('contactoMuestras', $datos[28]);
      $my_template->setValue('telefonoMuestras', $datos[29]);
      $my_template->setValue('movilMuestras', $datos[30]);
      $my_template->setValue('mailMuestras', $datos[31]);
      $my_template->setValue('plataformaCRF', $datos[32]);
      $my_template->setValue('ligaCRF', $datos[33]);
      $my_template->setValue('nombreCRF', $datos[34]);
      $my_template->setValue('usuarioCRF', $datos[35]);
      $my_template->setValue('passwordCRF', $datos[36]);
      $my_template->setValue('idCRF', $datos[37]);
      $my_template->setValue('plataformaIVRS', $datos[38]);
      $my_template->setValue('ligaIVRS', $datos[39]);
      $my_template->setValue('nombreIVRS', $datos[40]);
      $my_template->setValue('usuarioIVRS', $datos[41]);
      $my_template->setValue('passwordIVRS', $datos[42]);
      $my_template->setValue('plataformaOtros', $datos[43]);
      $my_template->setValue('ligaOtros', $datos[44]);
      $my_template->setValue('nombreOtros', $datos[45]);
      $my_template->setValue('usuarioOtros', $datos[46]);
      $my_template->setValue('passwordOtros', $datos[47]);
    }

    // Documento Sometimiento
    if (7 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigoUis', $datos[2]);
      $my_template->setValue('codigo', $datos[3]);
      $my_template->setValue('titulo', $datos[4]);
      $my_template->setValue('patrocinador', $datos[5]);
      $my_template->setValue('domicilio', $datos[6]);
      $my_template->setValue('nombreInvestigador', $datos[7]);

      $my_template->cloneRow('datosDocumento', count($datos) - 8);
      for ($i=0; $i < count($datos) - 8; $i++) { 
        $my_template->setValue('datosDocumento#'.($i+1), htmlspecialchars($datos[$i + 8], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Compromisos
    if (8 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('tipoInvestigador', $datos[2]);
      $my_template->setValue('codigo', $datos[3]);
      $my_template->setValue('titulo', $datos[4]);
      $my_template->setValue('patrocinador', $datos[5]);
      $my_template->setValue('direccion', $datos[6]);
      //TODO: ver como insertar ese dato, si modificar el modal o no
      $my_template->setValue('tituloPersona', $datos[8]);
      $my_template->setValue('nombrePersona', $datos[9]);
      $my_template->setValue('cedula', $datos[10]);

      if ($datos[2] == 'Investigador Principal') {
        $my_template->setValue('block_investigadorPrincipal', '');
        $my_template->setValue('block_investigadorPrincipal_espacio', '');
      } else {
        $my_template->cloneRow('block_investigadorPrincipal', 0);
        $my_template->cloneRow('block_investigadorPrincipal_espacio', 0);
      }

      if ($datos[2] == 'Investigador Principal' || $datos[2] == 'Sub Investigador') {
        $my_template->setValue('block_principalSub_espacio', '');
        $my_template->setValue('block_principalSub', '');
      } else {
        $my_template->cloneRow('block_principalSub_espacio', 0);
        $my_template->cloneRow('block_principalSub', 0);
      }
    }

    //Documento Responsabilidades
    if (9 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('direccion', $datos[5]);
      // TODO Cambiar para el titulo
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('nombreInvestigador', $datos[6]);

      $my_template->cloneRow('nombre', (count($datos) - 7) / 3);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 7) / 3; $i++) { 
        $my_template->setValue('nombre#'.($i+1), htmlspecialchars($datos[$aux + 7], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('rolEstudio#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $respon = implode(", " ,$datos[$aux + 9]);
        $my_template->setValue('responsabilidades#'.($i+1), htmlspecialchars($respon, ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 3;
      }
    }

    //Documento Autorizacion
    if (10 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('direccion', $datos[5]);
      //TODO: Cambiar lo del titulo automatico
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      $my_template->setValue('tituloInvestigador', 'Dr.');
      $my_template->setValue('nombreInvestigador', $datos[6]);
      $my_template->setValue('nombreHospital', $datos[7]);
    }

    //Documento Instalaciones
    if (11 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('direccion', $datos[4]);
      $my_template->setValue('tituloInvestigador', $datos[5]);
      $my_template->setValue('nombreInvestigador', $datos[6]);

      // TODO: cuando se de mexico preguntar si es charcot para todo mexico o se diferencia por la direccion
      // if ('Chihuahua, Chih.' == 'Chihuahua, Chih.') {
      if ($datos[0] == 'Chihuahua, Chih.') {
        $my_template->cloneBlock('block_chihuahua', 1, true, true);
        $my_template->cloneBlock('block_chihuahua2', 1, true, true);
        $my_template->cloneBlock('block_chihuahua3', 1, true, true);
      } else {
        $my_template->cloneBlock('block_chihuahua', 0, true, true);
        $my_template->cloneBlock('block_chihuahua2', 0, true, true);
        $my_template->cloneBlock('block_chihuahua3', 0, true, true);
      }
      // if ('Ciudad de México' == 'Ciudad de México') {
      if ($datos[0] == 'Ciudad de México') {
        $my_template->cloneBlock('block_charcot', 1, true, true);
      } else {
        $my_template->cloneBlock('block_charcot', 0, true, true);
      }

      if ($datos[7] == 'Si') {
        $my_template->setValue('si', 'x');
        $my_template->setValue('no', '');
      } else {
        $my_template->setValue('si', '');
        $my_template->setValue('no', 'x');
      }

      $my_template->cloneRow('servicio', (count($datos) - 8) / 2);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 8) / 2; $i++) { 
        $my_template->setValue('servicio#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('proveedor#'.($i+1), htmlspecialchars($datos[$aux + 9], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 2;
      }
    }

    //Documento Anticorrupción
    if (12 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('destinatario', $datos[2]);
    }

    //Documentos Destrucción de materiales
    if (27 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('hora', $datos[2]);
      $my_template->setValue('numeroDia', $datos[3]);
      $my_template->setValue('mes', $datos[4]);
      $my_template->setValue('direccion', $datos[5]);
      $my_template->setValue('codigo', $datos[6]);
      $my_template->setValue('titulo', $datos[7]);

      $my_template->cloneRow('tipokit', (count($datos) - 8) / 3);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 8) / 3; $i++) { 
        $my_template->setValue('tipokit#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('fechaCaducidad#'.($i+1), htmlspecialchars(date('d-m-Y', strtotime($datos[$aux + 9])), ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('cantidad#'.($i+1), htmlspecialchars($datos[$aux + 10], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 3;
      }
    }

    // Documento Destrucción de productos
    if (28 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('hora', $datos[2]);
      $my_template->setValue('numeroDia', $datos[3]);
      $my_template->setValue('mes', $datos[4]);
      $my_template->setValue('direccion', $datos[5]);
      $my_template->setValue('codigo', $datos[6]);
      $my_template->setValue('titulo', $datos[7]);

      $my_template->cloneBlock('block_productos', (count($datos) - 8) / 4, true, true);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 8) / 4; $i++) { 
        $my_template->setValue('nombreGenerico#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('estado#'.($i+1), htmlspecialchars($datos[$aux + 9], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('numerokit#'.($i+1), htmlspecialchars($datos[$aux + 10], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('cantidad#'.($i+1), htmlspecialchars($datos[$aux + 11], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 4;
      }
    }

    // Documento tarjeta de bolsillo
    if (55 == $formato['documento_formato_id']) {
      $my_template->setValue('codigo', $datos[0]);
      $my_template->setValue('patologia', $datos[1]);
      $my_template->setValue('telefono', $datos[2]);
      $my_template->setValue('movil', $datos[3]);
    }

    // Documento Carpeta documento fuente
    if (56 == $formato['documento_formato_id']) {
      $my_template->setValue('codigo', $datos[0]);
      $my_template->setValue('investigador', $datos[1]);
      // $my_template->setValue('investigador', $datos[2]);
      // $my_template->setValue('investigador', $datos[3]);
      $my_template->setValue('direccion', $datos[4]);
    }

    // Documento Hoja inicial
    if (57 == $formato['documento_formato_id']) {
      $my_template->setValue('codigo', $datos[0]);
      $my_template->setValue('investigadorPrincipal', $datos[1]);
      $my_template->setValue('subInvestigador', $datos[2]);
      $my_template->setValue('coordinador', $datos[3]);
      // $my_template->setValue('numeroSujeto', $datos[4]);
      // $my_template->setValue('inicialesSujeto', $datos[5]);
      // $my_template->setValue('sexo', $datos[6]);
      // $my_template->setValue('edad', $datos[7]);
      $my_template->setValue('direccion', $datos[8]);
    }

    // Documento Contacto
    if (58 == $formato['documento_formato_id']) {
      $my_template->setValue('numeroSujeto', $datos[0]);
      $my_template->setValue('inicialesSujeto', $datos[1]);
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('nombreContacto', $datos[3]);
      $my_template->setValue('sexo', $datos[4]);
      $my_template->setValue('fechaNacimiento', $datos[5]);
      $my_template->setValue('calleNumero', $datos[6]);
      $my_template->setValue('colonia', $datos[7]);
      $my_template->setValue('ciudadEstado', $datos[8]);
      $my_template->setValue('codigoPostal', $datos[9]);
      $my_template->setValue('telCasa', $datos[10]);
      $my_template->setValue('telMovil', $datos[11]);
      $my_template->setValue('telTrabajo', $datos[12]);
      $my_template->setValue('correo', $datos[13]);

      $my_template->setValue('nombreContacto1', $datos[14]);
      $my_template->setValue('domicilioContacto1', $datos[15]);
      $my_template->setValue('parentescoContacto1', $datos[16]);
      $my_template->setValue('telCasaContacto1', $datos[17]);
      $my_template->setValue('telMovilContacto1', $datos[18]);
      $my_template->setValue('telTrabajoContacto1', $datos[19]);

      $my_template->setValue('nombreContacto2', $datos[20]);
      $my_template->setValue('domicilioContacto2', $datos[21]);
      $my_template->setValue('parentescoContacto2', $datos[22]);
      $my_template->setValue('telCasaContacto2', $datos[23]);
      $my_template->setValue('telMovilContacto2', $datos[24]);
      $my_template->setValue('telTrabajoContacto2', $datos[25]);
    }

    // Documento Senalador de visita
    if (63 == $formato['documento_formato_id']) {
      $my_template->setValue('nombreVisita', $datos[0]);
      $my_template->setValue('fechaVisita', date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      //$my_template->setValue('fechaVisita', date('d-m-Y' ,$datos[1]) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('investigadorPrincipal', $datos[3]);
      $my_template->setValue('subInvestigador', $datos[4]);
      $my_template->setValue('coordinador', $datos[5]);
      $my_template->setValue('numeroSujeto', $datos[6]);
      $my_template->setValue('inicialesSujeto', $datos[7]);
      $my_template->setValue('direccion', $datos[8]);
    }

    // Recibo ICF
    if (72 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('nombreDocumento', $datos[5]);
      $my_template->setValue('version', $datos[6]);
      $my_template->setValue('fechaVersion', date('d-m-Y', strtotime($datos[7])));
    }

    // Documento Solicitud de resumen
    if (76 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
    }

    // Documento Privacidad para sujetos
    if (77 == $formato['documento_formato_id']) {
      $my_template->setValue('codigo', $datos[0]);
      $my_template->setValue('titulo', $datos[1]);
      $my_template->setValue('investigador', $datos[2]);
      $my_template->setValue('patrocinador', $datos[3]);
      $my_template->setValue('sitioClinico', $datos[4]);
      $my_template->setValue('direccion', $datos[5]);
    }

    // Documento Orden de compra
    if (79 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('proveedor', $datos[2]);
      $my_template->setValue('numeroDocumento', $datos[3]);
      $my_template->setValue('nombreSujeto', $datos[4]);
      $my_template->setValue('nombreSolicitante', $datos[5]);
      $my_template->setValue('puesto', $datos[6]);

      $my_template->cloneRow('nombreEstudio', count($datos) - 7);
      for ($i = 0; $i < count($datos) - 7; $i++) { 
        $my_template->setValue('nombreEstudio#'.($i+1), htmlspecialchars($datos[$i + 7], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Envio de muestras
    if (80 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      $my_template->setValue('codigo', $datos[1]);
      $my_template->setValue('titulo', $datos[2]);
      $my_template->setValue('patrocinador', $datos[3]);
      $my_template->setValue('numeroSujeto', $datos[4]);
      $my_template->setValue('numeroVisita', $datos[5]);
      $my_template->setValue('fechaRecoleccion', date('d-m-Y', strtotime($datos[6])));
      $my_template->setValue('reqAlmacen', $datos[7]);
      $my_template->setValue('desviacion', $datos[8]);
      $my_template->setValue('courier', $datos[9]);
      $my_template->setValue('numeroGuia', $datos[10]);
      $my_template->setValue('fechaEnvio', date('d-m-Y', strtotime($datos[11])));
      $my_template->setValue('hora', $datos[12]);
      $my_template->setValue('temperatura', $datos[13]);
    }

    // Documento Orden de compra hospital
    if (81 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('proveedor', $datos[2]);
      $my_template->setValue('codigo', $datos[3]);
      $my_template->setValue('titulo', $datos[4]);
      $my_template->setValue('nombreSolicitante', $datos[5]);
      $my_template->setValue('puesto', $datos[6]);

      $countSujetos = 1;
      $countServicios = 0;
      $countRestricciones = 0;

      for ($i=8; $i < count($datos); $i++) { 
        $element = $datos[$i];
        $choice = substr($element, 0, 1);
        $only_data = substr($element, 2, strlen($element));

        $datos[$i] = $only_data;
        if ($choice == 'u') {
          $countSujetos++;
        }
        if ($choice == 's') {
          $countServicios++;
        }
        if ($choice == 'r') {
          $countRestricciones++;
        }
      }

      $my_template->cloneRow('nombreSujeto', $countSujetos);
      $my_template->cloneRow('servicio', $countServicios);
      $my_template->cloneRow('restriccion', $countRestricciones);

      for ($i = 0; $i < $countSujetos; $i++) { 
        $my_template->setValue('nombreSujeto#'.($i+1), htmlspecialchars($datos[$i + 7], ENT_COMPAT, 'UTF-8'));
      }
      for ($i = 0; $i < $countServicios; $i++) { 
        $my_template->setValue('servicio#'.($i+1), htmlspecialchars($datos[$i + 7 + $countSujetos], ENT_COMPAT, 'UTF-8'));
      }
      for ($i = 0; $i < $countRestricciones; $i++) { 
        $my_template->setValue('restriccion#'.($i+1), htmlspecialchars($datos[$i + 7 + $countSujetos + $countServicios], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Aviso EAS
    if (82 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      // TODO titulo investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('nombreInvestigador', $datos[5]);

      $my_template->cloneRow('numSujeto', (count($datos) - 6) / 3);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 6) / 3; $i++) { 
        $my_template->setValue('numSujeto#'.($i+1), htmlspecialchars($datos[$aux + 6], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('fechaReporte#'.($i+1), htmlspecialchars(date('d-m-Y', strtotime($datos[$aux + 7])), ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('descripcion#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 3;
      }
    }

    // Documento Aviso SUSAR
    if (83 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[5]);

      $my_template->cloneRow('numReporte', (count($datos) - 6) / 6);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 6) / 6; $i++) { 
        $my_template->setValue('numReporte#'.($i+1), htmlspecialchars($datos[$aux + 6], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('fechaReporte#'.($i+1), htmlspecialchars(date('d--m-Y', strtotime($datos[$aux + 7])), ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('protocolo#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('pais#'.($i+1), htmlspecialchars($datos[$aux + 9], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('tipoReporte#'.($i+1), htmlspecialchars($datos[$aux + 10], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('desc#'.($i+1), htmlspecialchars($datos[$aux + 11], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 6;
      }
    }

    // Documento Somete desviacion
    if (84 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigoUis', $datos[2]);
      $my_template->setValue('codigo', $datos[3]);
      $my_template->setValue('titulo', $datos[4]);
      $my_template->setValue('patrocinador', $datos[5]);
      // TODO Titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('InvestigadorPrincipal', $datos[6]);

      $my_template->cloneBlock('block_desviaciones', (count($datos) - 7) / 5, true, true);
      $aux = 0;
      for ($i = 0; $i < (count($datos) - 7) / 5; $i++) { 
        $my_template->setValue('numSujeto#'.($i+1), htmlspecialchars($datos[$aux + 7], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('numVisita#'.($i+1), htmlspecialchars($datos[$aux + 8], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('fechaDes#'.($i+1), htmlspecialchars(date('d-m-Y', strtotime($datos[$aux + 9])), ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('desc#'.($i+1), htmlspecialchars($datos[$aux + 10], ENT_COMPAT, 'UTF-8'));
        $my_template->setValue('acciones#'.($i+1), htmlspecialchars($datos[$aux + 11], ENT_COMPAT, 'UTF-8'));
        $aux = $aux + 5;
      }
    }

    // Documento Aviso al CE
    if (85 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[5]);

      $my_template->cloneRow('asunto', count($datos) - 6);
      for ($i = 0; $i < count($datos) - 6; $i++) { 
        $my_template->setValue('asunto#'.($i+1), htmlspecialchars($datos[$i + 6], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Fe de erratas
    if (86 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('fechaDocumento', date('d-m-Y', strtotime($datos[6])));
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[5]);

      $my_template->cloneRow('desc', count($datos) - 7);
      for ($i = 0; $i < count($datos) - 7; $i++) { 
        $my_template->setValue('desc#'.($i+1), htmlspecialchars($datos[$i + 7], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Renovacion anual
    if (87 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('sitioClinico', $datos[5]);
      $my_template->setValue('campo22Eq', date( 'd-m-Y', $datos[6]) );
      $my_template->setValue('comite', date('d-m-Y' ,$datos[7]) );
      $my_template->setValue('campo46Eq', $datos[8]);
      $my_template->setValue('estadoProyecto', $datos[9]);
      $my_template->setValue('fechaInicio', date('d-m-Y', strtotime($datos[10])));
      $my_template->setValue('sujetosFirma', $datos[11]);
      $my_template->setValue('sujetosActivos', $datos[12]);
      $my_template->setValue('informesIniciales', $datos[13]);
      $my_template->setValue('desviaciones', $datos[14]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[15]);

      $comiteExterno = false;

      if ($comiteExterno) {
        $my_template->setValue('tipoComite', 'Para ello, encuentre adjunto el informe correspondiente.');
      }else{
        $my_template->setValue('tipoComite', 'Para ello, encuentre en el sistema electrónico el informe correspondiente.');
      }

    }

    // Documento Informe tecnico
    if (88 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('presidenteComite', $datos[2]);
      $my_template->setValue('periodo', $datos[3]);
      $my_template->setValue('codigo', $datos[4]);
      $my_template->setValue('titulo', $datos[5]);
      $my_template->setValue('patrocinador', $datos[6]);
      $my_template->setValue('direccion', $datos[7]);
      $my_template->setValue('campo22Eq', date( 'd-m-Y', $datos[8]) );
      $my_template->setValue('comite', date('d-m-Y',$datos[9]) );
      $my_template->setValue('campo46Eq', $datos[10]);
      $my_template->setValue('estadoProyecto', $datos[11]);
      $my_template->setValue('fechaInicio', date('d-m-Y', strtotime($datos[12])));
      $my_template->setValue('sujetosFirma', $datos[13]);
      $my_template->setValue('sujetosActivos', $datos[14]);
      $my_template->setValue('informes', $datos[15]);
      $my_template->setValue('desviaciones', $datos[16]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[17]);
    }

    // Documento Aviso de cierre
    if (89 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigo', $datos[2]);
      $my_template->setValue('titulo', $datos[3]);
      $my_template->setValue('patrocinador', $datos[4]);
      $my_template->setValue('fechaInicio', date('d-m-Y', strtotime($datos[5])));
      $my_template->setValue('fechaReclutamiento', date('d-m-Y', strtotime($datos[6])));
      $my_template->setValue('sujetosFirma', $datos[7]);
      $my_template->setValue('sujetosAleatorios', $datos[8]);
      $my_template->setValue('fallas', $datos[9]);
      $my_template->setValue('retiros', $datos[10]);
      $my_template->setValue('sujetosFinalizaron', $datos[11]);
      $my_template->setValue('sujetosActivos', $datos[12]);
      $my_template->setValue('eventos', $datos[13]);
      $my_template->setValue('desviaciones', $datos[14]);
      $my_template->setValue('fechaCierre', date('d-m-Y', strtotime($datos[15])));
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('investigadorPrincipal', $datos[16]);
    }

    // Documento Archivo muerto
    if (90 == $formato['documento_formato_id']) {
      $my_template->setValue('codigoUis', $datos[0]);
      $my_template->setValue('fecha', date('d-m-Y', strtotime($datos[1])));
      $my_template->setValue('caja', $datos[2]);
      $my_template->setValue('allc', $datos[3]);
    }

    // Documento Cambio de domicilio 
    if (91 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('destinatario', $datos[2]);
      $my_template->setValue('puestoDestinatario', $datos[3]);
      $my_template->setValue('empresa', $datos[4]);
      $my_template->setValue('codigo', $datos[5]);
      $my_template->setValue('titulo', $datos[6]);
      $my_template->setValue('patrocinador', $datos[7]);
      $my_template->setValue('tituloDestinatario', $datos[8]);
      $my_template->setValue('apellidoDestinatario', $datos[9]);
      $my_template->setValue('domicilio', $datos[10]);
      $my_template->setValue('quienNotifica', $datos[11]);
      $my_template->setValue('puesto', $datos[12]);
    }

    // Documento sometimiento-migracion
    if (105 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigoUis', $datos[2]);
      $my_template->setValue('codigo', $datos[3]);
      $my_template->setValue('titulo', $datos[4]);
      $my_template->setValue('patrocinador', $datos[5]);
      $my_template->setValue('domicilio', $datos[6]);
      $my_template->setValue('campo22Eq', date( 'd-m-Y', strtotime($datos[7])) );
      $my_template->setValue('comite', date( 'd-m-Y', strtotime($datos[8])) );
      $my_template->setValue('campo46Eq', $datos[9] );
      $my_template->setValue('estadoProyecto', $datos[10]);
      $my_template->setValue('fechaInicio', date('d-m-Y', strtotime($datos[11])) );
      $my_template->setValue('sujetosFirma', $datos[12]);
      $my_template->setValue('sujetosActivos', $datos[13]);
      $my_template->setValue('informes', $datos[14]);
      $my_template->setValue('desviaciones', $datos[15]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('nombreInvestigador', $datos[16]);


      $my_template->cloneRow('datosDocumento', count($datos) - 17);
      for ($i=0; $i < count($datos) - 17; $i++) { 
        $my_template->setValue('datosDocumento#'.($i+1), htmlspecialchars($datos[$i + 17], ENT_COMPAT, 'UTF-8'));
      }
    }

    // Documento Comunicacion al CE
    if (106 == $formato['documento_formato_id']) {
      $my_template->setValue('lugar', $datos[0]);
      // $my_template->setValue('fecha', date('d-m-y', strtotime($datos[1])));
      $my_template->setValue('fecha', 'a ' . date('d', strtotime($datos[1])) . ' de '  . $meses[ date('n', strtotime($datos[1]))-1 ] . ' del ' . date('Y', strtotime($datos[1])) );
      $my_template->setValue('codigoUis', $datos[2]);
      $my_template->setValue('asunto', $datos[3]);
      $my_template->setValue('codigo', $datos[4]);
      $my_template->setValue('titulo', $datos[5]);
      $my_template->setValue('patrocinador', $datos[6]);
      // TODO titulo de investigador
      $my_template->setValue('tituloInvestigador', $investigador->titulo);
      // $my_template->setValue('tituloInvestigador', 'Dr');
      $my_template->setValue('nombreInvestigador', $datos[7]);

      $my_template->cloneRow('datosAsunto', count($datos) - 8);
      for ($i=0; $i < count($datos) - 8; $i++) { 
        $my_template->setValue('datosAsunto#'.($i+1), htmlspecialchars($datos[$i + 8], ENT_COMPAT, 'UTF-8'));
      }
    }

    try{
      // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban - se puede utilizar el codigo del proyecto
      $my_template->saveAs(storage_path( '../public/assets/SC-documents/' . $id . '-' .$nombreDocumento['directorio'] ));
      // $my_template->saveAs(storage_path( '../public/assets/SC-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' .$nombreDocumento['format'] ));
    }catch (Exception $e){
      return back()->withError($e->getMessage())->withInput();
    }

    return response()->download(storage_path( '../public/assets/SC-documents/' . $id . '-' .$nombreDocumento['directorio']) );
    // return response()->download(storage_path( '../public/assets/SC-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '.' . $nombreDocumento['format'] ));
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
      $formato = Documentos_formatos::where('id', $request->formato_id)->get()->first();
      if ($formato) {
        return $formato;
      } else {
        return null;
      }
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

    dd($request);
      
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store_cv(Request $request)
  {		

    $id_user = auth()->id();
    $empresa_id = session('id_empresa');

    $datos_array = json_encode($request->all());
    $datos_json = json_decode($datos_array, true);
    $tipo = $datos_json['tipo'];
    unset($datos_json['_token']); // Esto elimina el elemento del json
    unset($datos_json['tipo']);
    $datos = json_encode($datos_json);
    // return response($request);
    

    // $countArray = count($datos_json);

    // for ($i=1; $i < $countArray - 6; $i++) { 
    //   $key = 'no' . $i;
    //   $datos[] = $datos_json[$key];
    // }
    // $datos = json_encode($datos);
    
    // GUARDAR REGISTROS
    $formatos = new Formatos_cv();
    $formatos->empresa_id = $empresa_id;
    $formatos->user_id = $id_user;
    if ($tipo == 'esp') {
      $formatos->datos_esp_json = $datos;
      $formatos->has_esp = 1;
    }
    if ($tipo == 'eng') {
      $formatos->datos_eng_json = $datos;
      $formatos->has_eng = 1;
    }
    $formatos->save();
    // return response($formatos);

    if ($formatos) {
      return response('guardado');
    }else{
      return response('no guardado');
    }

    // dd($request);
    // return response($datos_json);
      
  }

  public function download(Request $request, $ruta)
  {		
    return response()->file(storage_path('../public/assets/SC-documents/'  .  $ruta ));
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
      $has_form = Documentos_formatos::where('id', $request->documentoformato_id)->value('has_form');
      // condicion para crear los archivos que no se guardan
      if ($has_form == 2) {
        $nombreDocumento = Documentos_formatos::where('id', $request->documentoformato_id)->get()->first();
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

        $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('../public/assets/SC/5- FC-SC/' . $nombreDocumento['directorio'] . ''));

        // Documento Nota al archivo
        if (54 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }

        // Documento Eventos adversos
        if (59 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }

        // Documento Medicamentos contaminantes
        if (60 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Medicamento de estudio
        if (61 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }

        // Documento Historia clinica
        if (62 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Visita SD
        if (64 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Nota medica
        if (65 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Pre-seleccion
        if (66 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Seleccion
        if (67 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
          $my_template->setValue('titulo', $datosProyecto->no19);
        }
        
        // Documento Consentimiento
        if (71 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
        }
        
        // Documento Carnet de viaticos
        if (75 == $request->documentoformato_id) {
          $my_template->setValue('codigo', $datosProyecto->no20);
          // $my_template->setValue('investigadorPrincipal', $proyectos->investigador);
          if ($investigador) {
            $my_template->setValue('investigadorPrincipal', $investigador->investigador);
          }
        }

        try{
          // TODO: cambiar el nombre para que tenga el id del formato para diferenciarlos y que no se sobreescriban 
          $my_template->saveAs(storage_path( '../public/assets/SC-documents/' . $nombreDocumento['nombre_doc'] . '-' . $codigoUIS . '.' .$nombreDocumento['format'] ));
          // $my_template->saveAs(storage_path( '../public/assets/SC-documents/' . $nombreDocumento['nombre_doc'] . '.' .$nombreDocumento['format'] ));
        }catch (Exception $e){
          return response(null);
        }
    
        // return response()->download(storage_path( '../public/assets/SC-documents/'  . $nombreDocumento['nombre_doc'] . '.' . $nombreDocumento['format'] ));
        
        return response( $nombreDocumento['nombre_doc'] . '-' . $codigoUIS . '.' . $nombreDocumento['format'] );
        // return response( $nombreDocumento['nombre_doc'] . '.' . $nombreDocumento['format'] );
        
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
          
          // consulta para seber si ya existe el formato que se guardara
          //TODO: ver si se guardaran datos "repetidos"
          // $formato = Formato::where('documento_formato_id', $documento_formato_id)
          // ->where('empresa_id', $empresa_id)
          // ->where('menu_id', $menu_id)
          // ->where('proyecto_id', $proyecto_id)
          // ->get()->first();

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
          
          // if (!$formato) {
            // GUARDAR REGISTROS
            $formatos = new Formato();
            $formatos->documento_formato_id = $request->documentoformato_id;
            $formatos->datos_json = $datos;
            //TODO: cambiar para que sea la empresa y el menu correctos
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
            
          // }else{
          //   return response('dato existe');
          // }

          // Update formato
        }else{

          $datos_json = json_encode($request->all());
          $datos_array = json_decode($datos_json, true);
          $datos = null;

          //count para saber cuantos datos son, dependiendo del formulario
          $countArray = count($datos_array);
          // TODO: ver que onda con el ultimo valor no se guarda,   ----  talvez ya resuelto 
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
        return response('eliminado');
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
  public function delete_formato_cv(Request $request)
  {		
    if($request->ajax()){
      
      $formato_id = $request->formato_id;
      $formato = Formatos_cv::where('id', $formato_id)->delete();

      if ($formato > 0) {
        return response('eliminado');
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
  public function download_formato(Request $request, $ruta)
  {		
    $directorio = Documentos_formatos::where('nombre_doc', $ruta)->get()->first();
    return response()->file(storage_path('../public/assets/SC/5- FC-SC/'  .  $directorio->directorio ));
  }


}
