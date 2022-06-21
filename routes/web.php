<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
//EMPRESAS
use App\Http\Controllers\EmpresaController;
//PROYECTOS
use App\Http\Controllers\Administracion\ProyectoController;
//INVENTARIO
use App\Http\Controllers\Administracion\InventarioController;
//CALENDARIO
use App\Http\Controllers\CalendarController;

//DOCUMENTOS SITIO CLINICO
use App\Http\Controllers\DocumentosController;
//DOCUMENTOS COMITE ETICA
use App\Http\Controllers\DocumentosCEController;
//DOCUMENTOS ID
use App\Http\Controllers\DocumentosIDController;
//DOCUMENTOS ADMINISTRACION
use App\Http\Controllers\DocumentosADController;
//DOCUMENTOS CALIDAD
use App\Http\Controllers\DocumentosAController;
//DOCUMENTOS CAPACITACION
use App\Http\Controllers\DocumentosBController;
//DOCUMENTOS SEGURIDAD
use App\Http\Controllers\DocumentosCController;
//DOCUMENTOS RESPONSABILIDAD
use App\Http\Controllers\DocumentosDController;
//DOCUMENTOS INTEGRIDAD
use App\Http\Controllers\DocumentosEController;


//SITIO CLINICO
use App\Http\Controllers\SitioClinico\SCController;


//COMITÉ DE ÉTICA
use App\Http\Controllers\ComiteEtica\CEController;




//ADMINISTRACION
//RECEPCION ADM
use App\Http\Controllers\Administracion\RecepcionController;
//CONTRATO ADM
use App\Http\Controllers\Administracion\ContratoController;
//PREPARACION ADM
use App\Http\Controllers\Administracion\PreparacionController;
//FACTURACION ADM
use App\Http\Controllers\Administracion\FacturacionController;
//PAGOS ADM
use App\Http\Controllers\Administracion\PagoController;
//AUXILIAR ADM
use App\Http\Controllers\Administracion\AuxiliarController;
//RECLUTAMIENTO ADM
use App\Http\Controllers\Administracion\ReclutamientoController;
//CONTRATACION ADM
use App\Http\Controllers\Administracion\ContratacionController;
//INDUCCION ADM
use App\Http\Controllers\Administracion\InduccionController;
//DESARROLLO ADM
use App\Http\Controllers\Administracion\DesarrolloController;
//EVALUACION ADM
use App\Http\Controllers\Administracion\EvaluacionController;
//TERMINACION ADM
use App\Http\Controllers\Administracion\TerminacionController;


//CALIDAD
//VERSIONES CALIDAD
use App\Http\Controllers\Calidad\VersionesController;
//REUNIONES CALIDAD
use App\Http\Controllers\Calidad\ReunionesController;
//AUDITORIA CALIDAD
use App\Http\Controllers\Calidad\AuditoriaController;
//MEJORA CALIDAD
use App\Http\Controllers\Calidad\MejoraController;


//CAPACITACIÓN
//DIAGNOSTICO CAPACITACIÓN
use App\Http\Controllers\Capacitacion\DiagnosticoController;
//PLAN CAPACITACIÓN
use App\Http\Controllers\Capacitacion\PlanController;
//CONTENIDOS CAPACITACIÓN
use App\Http\Controllers\Capacitacion\ContenidosController;
//INTERVENCION CAPACITACIÓN
use App\Http\Controllers\Capacitacion\IntervencionController;
//EVALUACION CAPACITACIÓN
use App\Http\Controllers\Capacitacion\EvaluacionCapController;


//SEGURIDAD
//PREVENCION SEGURIDAD
use App\Http\Controllers\Seguridad\PrevencionController;
//ATENCION SEGURIDAD
use App\Http\Controllers\Seguridad\AtencionController;
//RECUPERACION SEGURIDAD
use App\Http\Controllers\Seguridad\RecuperacionController;


//RESPONSABILIDAD
use App\Http\Controllers\Responsabilidad\ResponsabilidadController;


//INTEGRIDAD
use App\Http\Controllers\Integridad\IntegridadController;


//REXBIOT
//GANADO REXBIOT
use App\Http\Controllers\Rexbiot\GanadoController;
//POTREROS REXBIOT
use App\Http\Controllers\Rexbiot\PotreroController;
//PASTOREO REXBIOT
use App\Http\Controllers\Rexbiot\PastoreoController;
//INSTALACIONES REXBIOT
use App\Http\Controllers\Rexbiot\InstalacionesController;
//ESTADISTICAS REXBIOT
use App\Http\Controllers\Rexbiot\EstadisticasController;


//MIEMBROS DEL COMITE DE ETICA
//DOCUMENTOS
use App\Http\Controllers\MCE\DenunciaMCEController;
use App\Http\Controllers\MCE\AvisoPrivacidadMCEController;
use App\Http\Controllers\MCE\CodigoEticaMCEController;
use App\Http\Controllers\MCE\PIntegridadMCEController;
use App\Http\Controllers\MCE\RevisionMCEController;
use App\Http\Controllers\MCE\PublicidadMCEController;
use App\Http\Controllers\MCE\DerechosMCEController;
use App\Http\Controllers\MCE\PProteccionMCEController;
use App\Http\Controllers\MCE\PDenunciaMCEController;
use App\Http\Controllers\MCE\PMedicaMCEController;
use App\Http\Controllers\MCE\PExpedienteMCEController;
use App\Http\Controllers\MCE\PComunicacionMCEController;
use App\Http\Controllers\MCE\InstructivoMCEController;
use App\Http\Controllers\MCE\DSujetosMCEController;
use App\Http\Controllers\MCE\PSujetosMCEController;
//REVISIONES
use App\Http\Controllers\MCE\RevisionesMCEController;
//INFORMES
use App\Http\Controllers\MCE\TrimestralMCEController;
use App\Http\Controllers\MCE\AnualMCEController;
//AUDITORIAS
use App\Http\Controllers\MCE\AuditoriasMCEController;
//CAPACITACION
use App\Http\Controllers\MCE\InduccionMCEController;
use App\Http\Controllers\MCE\InvestigacionMCEController;
use App\Http\Controllers\MCE\EstudiosMCEController;
use App\Http\Controllers\MCE\CEMCEController;
use App\Http\Controllers\MCE\QUISMCEController;
//SOMETIMEINTOS
use App\Http\Controllers\MCE\SometimientosMCEController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionController::class);

Route::resource('home', InicioController::class);

Route::resource('dashboard', DashController::class);

Route::resource('profile', ProfileController::class);

Route::resource('menus', MenuController::class);

Route::resource('submenus', SubmenuController::class);

Route::resource('calendario', CalendarController::class);
Route::post('/calendario/delete', 'App\Http\Controllers\CalendarController@delete')->name('calendario.delete');
Route::get('/calendario/get_show/{tipo}', 'App\Http\Controllers\CalendarController@get_show')->name('calendario.get_show');


Route::get('/dashboard', 'App\Http\Controllers\DashController@index')->name('dashboard');
Route::post('/dashboard/store', 'App\Http\Controllers\DashController@store')->name('dashboard.store');
Route::post('/dashboard/get_empresa', 'App\Http\Controllers\DashController@get_empresa')->name('dashboard.get_empresa');

//RECURSOS EMPRESA
Route::resource('empresas', EmpresaController::class);
//MODAL SOCIOS EMPRESA
Route::post('/empresas/guardar_empresa', 'App\Http\Controllers\EmpresaController@guardar_empresa')->name('empresas.guardar_empresa');
Route::post('/empresas/list_socios', 'App\Http\Controllers\EmpresaController@list_socios')->name('empresas.list_socios');
Route::post('/empresas/create_socios', 'App\Http\Controllers\EmpresaController@create_socios')->name('empresas.create_socios');
Route::post('/empresas/edit_socios', 'App\Http\Controllers\EmpresaController@edit_socios')->name('empresas.edit_socios');
Route::post('/empresas/delete_socios', 'App\Http\Controllers\EmpresaController@delete_socios')->name('empresas.delete_socios');
//MODAL DOMICILIOS EMPRESA
Route::post('/empresas/list_domicilios', 'App\Http\Controllers\EmpresaController@list_domicilios')->name('empresas.list_domicilios');
Route::post('/empresas/create_domicilios', 'App\Http\Controllers\EmpresaController@create_domicilios')->name('empresas.create_domicilios');
Route::post('/empresas/edit_domicilios', 'App\Http\Controllers\EmpresaController@edit_domicilios')->name('empresas.edit_domicilios');
Route::post('/empresas/delete_domicilios', 'App\Http\Controllers\EmpresaController@delete_domicilios')->name('empresas.delete_domicilios');
//MODAL REPRESENTANTE LEGAL EMPRESA
Route::post('/empresas/list_legal', 'App\Http\Controllers\EmpresaController@list_legal')->name('empresas.list_legal');
Route::post('/empresas/create_legal', 'App\Http\Controllers\EmpresaController@create_legal')->name('empresas.create_legal');
Route::post('/empresas/edit_legal', 'App\Http\Controllers\EmpresaController@edit_legal')->name('empresas.edit_legal');
Route::post('/empresas/delete_legal', 'App\Http\Controllers\EmpresaController@delete_legal')->name('empresas.delete_legal');
//MODAL DOCUMENTOS REGULATORIOS EMPRESA
Route::post('/empresas/list_documentos', 'App\Http\Controllers\EmpresaController@list_documentos')->name('empresas.list_documentos');
Route::post('/empresas/create_documentos', 'App\Http\Controllers\EmpresaController@create_documentos')->name('empresas.create_documentos');
Route::post('/empresas/edit_documentos', 'App\Http\Controllers\EmpresaController@edit_documentos')->name('empresas.edit_documentos');
Route::post('/empresas/delete_documentos', 'App\Http\Controllers\EmpresaController@delete_documentos')->name('empresas.delete_documentos');
//MODAL RESPONSABILIDADES EMPRESA
Route::post('/empresas/list_responsabilidades', 'App\Http\Controllers\EmpresaController@list_responsabilidades')->name('empresas.list_responsabilidades');
Route::post('/empresas/create_responsabilidades', 'App\Http\Controllers\EmpresaController@create_responsabilidades')->name('empresas.create_responsabilidades');
Route::post('/empresas/edit_responsabilidades', 'App\Http\Controllers\EmpresaController@edit_responsabilidades')->name('empresas.edit_responsabilidades');
Route::post('/empresas/delete_responsabilidades', 'App\Http\Controllers\EmpresaController@delete_responsabilidades')->name('empresas.delete_responsabilidades');
//MODAL SANITARIO EMPRESA
Route::post('/empresas/list_sanitario', 'App\Http\Controllers\EmpresaController@list_sanitario')->name('empresas.list_sanitario');
Route::post('/empresas/create_sanitario', 'App\Http\Controllers\EmpresaController@create_sanitario')->name('empresas.create_sanitario');
Route::post('/empresas/edit_sanitario', 'App\Http\Controllers\EmpresaController@edit_sanitario')->name('empresas.edit_sanitario');
Route::post('/empresas/delete_sanitario', 'App\Http\Controllers\EmpresaController@delete_sanitario')->name('empresas.delete_sanitario');
//MODAL CUENTAS EMPRESA
Route::post('/empresas/list_cuentas', 'App\Http\Controllers\EmpresaController@list_cuentas')->name('empresas.list_cuentas');
Route::post('/empresas/create_cuentas', 'App\Http\Controllers\EmpresaController@create_cuentas')->name('empresas.create_cuentas');
Route::post('/empresas/edit_cuentas', 'App\Http\Controllers\EmpresaController@edit_cuentas')->name('empresas.edit_cuentas');
Route::post('/empresas/delete_cuentas', 'App\Http\Controllers\EmpresaController@delete_cuentas')->name('empresas.delete_cuentas');
//MODAL PROPIEDAD EMPRESA
Route::post('/empresas/list_propiedad', 'App\Http\Controllers\EmpresaController@list_propiedad')->name('empresas.list_propiedad');
Route::post('/empresas/create_propiedad', 'App\Http\Controllers\EmpresaController@create_propiedad')->name('empresas.create_propiedad');
Route::post('/empresas/edit_propiedad', 'App\Http\Controllers\EmpresaController@edit_propiedad')->name('empresas.edit_propiedad');
Route::post('/empresas/delete_propiedad', 'App\Http\Controllers\EmpresaController@delete_propiedad')->name('empresas.delete_propiedad');
//MODAL VINCULACION EMPRESA
Route::post('/empresas/list_vinculacion', 'App\Http\Controllers\EmpresaController@list_vinculacion')->name('empresas.list_vinculacion');
Route::post('/empresas/create_vinculacion', 'App\Http\Controllers\EmpresaController@create_vinculacion')->name('empresas.create_vinculacion');
Route::post('/empresas/edit_vinculacion', 'App\Http\Controllers\EmpresaController@edit_vinculacion')->name('empresas.edit_vinculacion');
Route::post('/empresas/delete_vinculacion', 'App\Http\Controllers\EmpresaController@delete_vinculacion')->name('empresas.delete_vinculacion');
//FIN DE RECURSOS EMPRESA




//RECURSOS PROYECTOS
Route::resource('proyectos', ProyectoController::class);
Route::post('/proyectos/cargar_investigador', 'App\Http\Controllers\Administracion\ProyectoController@cargar_investigador')->name('proyectos.cargar_investigador');
//RECURSOS INVENTARIO
Route::resource('inventario', InventarioController::class);




//RECURSOS DOCUMENTOS SITIO CLINICO
Route::resource('documentos_sc', DocumentosController::class);
//Documentos_formatos_Select
Route::post('/documentos_sc/list_formatos', 'App\Http\Controllers\DocumentosController@list_formatos')->name('documentos_sc.list_formatos');
Route::post('/documentos_sc/create_formato', 'App\Http\Controllers\DocumentosController@create_formato')->name('documentos_sc.create_formato');
Route::post('/documentos_sc/delete_formato', 'App\Http\Controllers\DocumentosController@delete_formato')->name('documentos_sc.delete_formato');
Route::post('/documentos_sc/edit_formato', 'App\Http\Controllers\DocumentosController@edit_formato')->name('documentos_sc.edit_formato');
Route::post('/documentos_sc/datos_protocolo', 'App\Http\Controllers\DocumentosController@datos_protocolo')->name('documentos.datos_protocolo');
Route::post('/documentos_sc/codigos_nombre', 'App\Http\Controllers\DocumentosController@codigos_nombre')->name('documentos_sc.codigos_nombre');
Route::post('/documentos_sc/has_form', 'App\Http\Controllers\DocumentosController@has_form')->name('documentos_sc.has_form');
// Geenerar pdf (word)
Route::get('/documentos_sc/word/{id}', [DocumentosController::class,'word'])->name('documentos_sc.word');
// Descargar documento
Route::get('/documentos_sc/download_formato/{ruta}', 'App\Http\Controllers\DocumentosController@download_formato')->name('documentos_sc.download_formato');
Route::get('/documentos_sc/descargar/word/{ruta}', [DocumentosController::class, 'download'])->name('documentos_sc.download');
// Documentos CV
Route::get('/documentos_sc/cv/{id}/{dato}', [DocumentosController::class, 'cv'])->name('documentos_sc.cv');
Route::post('/documentos_sc/list_cv', 'App\Http\Controllers\DocumentosController@list_cv')->name('documentos_sc.list_cv');
Route::post('/documentos_sc/store_cv', 'App\Http\Controllers\DocumentosController@store_cv')->name('documentos_sc.store_cv');
Route::post('/documentos_sc/update_cv', 'App\Http\Controllers\DocumentosController@update_cv')->name('documentos_sc.update_cv');
Route::get('/documentos_sc/edit_cv/{id}/{tipo}', 'App\Http\Controllers\DocumentosController@edit_cv')->name('documentos_sc.edit_cv');
Route::post('/documentos_sc/delete_formato_cv', 'App\Http\Controllers\DocumentosController@delete_formato_cv')->name('documentos_sc.delete_formato_cv');
Route::get('/documentos_sc/word_cv/{id}/{tipo}', [DocumentosController::class,'word_cv'])->name('documentos_sc.word_cv');
//FIN DE DOCUMENTOS SITIO CLINICO


// RECURSOS DOCUMENTOS COMITE DE ETICA
Route::resource('documentos_ce', DocumentosCEController::class);
Route::post('/documentos_ce/list_formatos', 'App\Http\Controllers\DocumentosCEController@list_formatos')->name('documentos_ce.list_formatos');
Route::post('/documentos_ce/create_formato', 'App\Http\Controllers\DocumentosCEController@create_formato')->name('documentos_ce.create_formato');
Route::post('/documentos_ce/delete_formato', 'App\Http\Controllers\DocumentosCEController@delete_formato')->name('documentos_ce.delete_formato');
Route::post('/documentos_ce/edit_formato', 'App\Http\Controllers\DocumentosCEController@edit_formato')->name('documentos_ce.edit_formato');
Route::post('/documentos_ce/datos_protocolo', 'App\Http\Controllers\DocumentosCEController@datos_protocolo')->name('documentos_ce.datos_protocolo');
Route::post('/documentos_ce/codigos_nombre', 'App\Http\Controllers\DocumentosCEController@codigos_nombre')->name('documentos_ce.codigos_nombre');
Route::post('/documentos_ce/has_form', 'App\Http\Controllers\DocumentosCEController@has_form')->name('documentos_ce.has_form');
// Geenerar word
Route::get('/documentos_ce/word/{id}', [DocumentosCEController::class,'word'])->name('documentos_ce.word');
// Descargar documento
Route::get('/documentos_ce/download_formato/{ruta}', 'App\Http\Controllers\DocumentosCEController@download_formato')->name('documentos_ce.download_formato');
Route::get('/documentos_ce/descargar/word/{ruta}', [DocumentosCEController::class, 'download'])->name('documentos_ce.download');
//FIN DE DOCUMENTOS COMITE DE ETICA

// RECURSOS DOCUMENTOS INNOVACION Y DESARROLLO
Route::resource('documentos_id', DocumentosIDController::class);
Route::post('/documentos_id/list_formatos', 'App\Http\Controllers\DocumentosIDController@list_formatos')->name('documentos_id.list_formatos');
Route::post('/documentos_id/create_formato', 'App\Http\Controllers\DocumentosIDController@create_formato')->name('documentos_id.create_formato');
Route::post('/documentos_id/delete_formato', 'App\Http\Controllers\DocumentosIDController@delete_formato')->name('documentos_id.delete_formato');
Route::post('/documentos_id/edit_formato', 'App\Http\Controllers\DocumentosIDController@edit_formato')->name('documentos_id.edit_formato');
Route::post('/documentos_id/datos_protocolo', 'App\Http\Controllers\DocumentosIDController@datos_protocolo')->name('documentos_id.datos_protocolo');
Route::post('/documentos_id/codigos_nombre', 'App\Http\Controllers\DocumentosIDController@codigos_nombre')->name('documentos_id.codigos_nombre');
Route::post('/documentos_id/has_form', 'App\Http\Controllers\DocumentosIDController@has_form')->name('documentos_id.has_form');
// Geenerar word
Route::get('/documentos_id/word/{id}', [DocumentosIDController::class,'word'])->name('documentos_id.word');
// Descargar documento
Route::get('/documentos_id/download_formato/{ruta}', 'App\Http\Controllers\DocumentosIDController@download_formato')->name('documentos_id.download_formato');
Route::get('/documentos_id/descargar/word/{ruta}', [DocumentosIDController::class, 'download'])->name('documentos_id.download');
//FIN DE DOCUMENTOS INNOVACION Y DESARROLLO


// RECURSOS DOCUMENTOS ADMINISTRACION
Route::resource('/documentos_ad', DocumentosADController::class);
Route::post('/documentos_ad/list_formatos', 'App\Http\Controllers\DocumentosADController@list_formatos')->name('documentos_ad.list_formatos');
Route::post('/documentos_ad/create_formato', 'App\Http\Controllers\DocumentosADController@create_formato')->name('documentos_ad.create_formato');
Route::post('/documentos_ad/delete_formato', 'App\Http\Controllers\DocumentosADController@delete_formato')->name('documentos_ad.delete_formato');
Route::post('/documentos_ad/edit_formato', 'App\Http\Controllers\DocumentosADController@edit_formato')->name('documentos_ad.edit_formato');
Route::post('/documentos_ad/datos_protocolo', 'App\Http\Controllers\DocumentosADController@datos_protocolo')->name('documentos_ad.datos_protocolo');
Route::post('/documentos_ad/codigos_nombre', 'App\Http\Controllers\DocumentosADController@codigos_nombre')->name('documentos_ad.codigos_nombre');
Route::post('/documentos_ad/has_form', 'App\Http\Controllers\DocumentosADController@has_form')->name('documentos_ad.has_form');
// Geenerar word
Route::get('/documentos_ad/word/{id}', [DocumentosADController::class,'word'])->name('documentos_ad.word');
// Descargar documento
Route::get('/documentos_ad/download_formato/{ruta}', 'App\Http\Controllers\DocumentosADController@download_formato')->name('documentos_ad.download_formato');
Route::get('/documentos_ad/descargar/word/{ruta}', [DocumentosADController::class, 'download'])->name('documentos_ad.download');
//FIN DE DOCUMENTOS ADMINISTRACION


//RECURSOS DOCUMENTOS CALIDAD
Route::resource('documentos_calidad', DocumentosAController::class);
//FIN DE DOCUMENTOS CALIDAD


//RECURSOS DOCUMENTOS CAPACITACION
Route::resource('documentos_capacitacion', DocumentosBController::class);
//FIN DE DOCUMENTOS CAPACITACION


//RECURSOS DOCUMENTOS SEGURIDAD
Route::resource('documentos_seguridad', DocumentosCController::class);
//FIN DE DOCUMENTOS SEGURIDAD


//RECURSOS DOCUMENTOS RESPONSABILIDAD
Route::resource('documentos_responsabilidad', DocumentosDController::class);
//FIN DE DOCUMENTOS RESPONSABILIDAD


//RECURSOS DOCUMENTOS INTEGRIDAD
Route::resource('documentos_integridad', DocumentosEController::class);
//FIN DE DOCUMENTOS INTEGRIDAD




//RECURSOS SITIO CLINICO
Route::resource('eq-sc', SCController::class);
//MODAL FACTIBILIDAD SC
Route::post('/eq-sc/guardar_factibilidad', 'App\Http\Controllers\SitioClinico\SCController@guardar_factibilidad')->name('eq-sc.guardar_factibilidad');
Route::post('/eq-sc/create_factibilidad', 'App\Http\Controllers\SitioClinico\SCController@create_factibilidad')->name('eq-sc.create_factibilidad');
Route::post('/eq-sc/list_equipamientofact', 'App\Http\Controllers\SitioClinico\SCController@list_equipamientofact')->name('eq-sc.list_equipamientofact');
Route::post('/eq-sc/create_equipamientofact', 'App\Http\Controllers\SitioClinico\SCController@create_equipamientofact')->name('eq-sc.create_equipamientofact');
Route::post('/eq-sc/edit_equipamientofact', 'App\Http\Controllers\SitioClinico\SCController@edit_equipamientofact')->name('eq-sc.edit_equipamientofact');
Route::post('/eq-sc/delete_equipamientofact', 'App\Http\Controllers\SitioClinico\SCController@delete_equipamientofact')->name('eq-sc.delete_equipamientofact');
Route::post('/eq-sc/list_seguimientofact', 'App\Http\Controllers\SitioClinico\SCController@list_seguimientofact')->name('eq-sc.list_seguimientofact');
Route::post('/eq-sc/create_seguimientofact', 'App\Http\Controllers\SitioClinico\SCController@create_seguimientofact')->name('eq-sc.create_seguimientofact');
Route::post('/eq-sc/edit_seguimientofact', 'App\Http\Controllers\SitioClinico\SCController@edit_seguimientofact')->name('eq-sc.edit_seguimientofact');
Route::post('/eq-sc/delete_seguimientofact', 'App\Http\Controllers\SitioClinico\SCController@delete_seguimientofact')->name('eq-sc.delete_seguimientofact');
//MODAL SOMETIMIENTO SC
Route::post('/eq-sc/guardar_sometimiento', 'App\Http\Controllers\SitioClinico\SCController@guardar_sometimiento')->name('eq-sc.guardar_sometimiento');
Route::post('/eq-sc/create_sometimiento', 'App\Http\Controllers\SitioClinico\SCController@create_sometimiento')->name('eq-sc.create_sometimiento');
Route::post('/eq-sc/list_equiposom', 'App\Http\Controllers\SitioClinico\SCController@list_equiposom')->name('eq-sc.list_equiposom');
Route::post('/eq-sc/create_equiposom', 'App\Http\Controllers\SitioClinico\SCController@create_equiposom')->name('eq-sc.create_equiposom');
Route::post('/eq-sc/edit_equiposom', 'App\Http\Controllers\SitioClinico\SCController@edit_equiposom')->name('eq-sc.edit_equiposom');
Route::post('/eq-sc/delete_equiposom', 'App\Http\Controllers\SitioClinico\SCController@delete_equiposom')->name('eq-sc.delete_equiposom');
Route::post('/eq-sc/list_sometimientosom', 'App\Http\Controllers\SitioClinico\SCController@list_sometimientosom')->name('eq-sc.list_sometimientosom');
Route::post('/eq-sc/create_sometimientosom', 'App\Http\Controllers\SitioClinico\SCController@create_sometimientosom')->name('eq-sc.create_sometimientosom');
Route::post('/eq-sc/edit_sometimientosom', 'App\Http\Controllers\SitioClinico\SCController@edit_sometimientosom')->name('eq-sc.edit_sometimientosom');
Route::post('/eq-sc/delete_sometimientosom', 'App\Http\Controllers\SitioClinico\SCController@delete_sometimientosom')->name('eq-sc.delete_sometimientosom');
Route::post('/eq-sc/list_respuestasom', 'App\Http\Controllers\SitioClinico\SCController@list_respuestasom')->name('eq-sc.list_respuestasom');
Route::post('/eq-sc/create_respuestasom', 'App\Http\Controllers\SitioClinico\SCController@create_respuestasom')->name('eq-sc.create_respuestasom');
Route::post('/eq-sc/edit_respuestasom', 'App\Http\Controllers\SitioClinico\SCController@edit_respuestasom')->name('eq-sc.edit_respuestasom');
Route::post('/eq-sc/delete_respuestasom', 'App\Http\Controllers\SitioClinico\SCController@delete_respuestasom')->name('eq-sc.delete_respuestasom');
//MODAL FARMACIA SC
Route::post('/eq-sc/guardar_farmacia', 'App\Http\Controllers\SitioClinico\SCController@guardar_farmacia')->name('eq-sc.guardar_farmacia');
Route::post('/eq-sc/create_farmacia', 'App\Http\Controllers\SitioClinico\SCController@create_farmacia')->name('eq-sc.create_farmacia');
Route::post('/eq-sc/list_infraestructurafar', 'App\Http\Controllers\SitioClinico\SCController@list_infraestructurafar')->name('eq-sc.list_infraestructurafar');
Route::post('/eq-sc/create_infraestructurafar', 'App\Http\Controllers\SitioClinico\SCController@create_infraestructurafar')->name('eq-sc.create_infraestructurafar');
Route::post('/eq-sc/edit_infraestructurafar', 'App\Http\Controllers\SitioClinico\SCController@edit_infraestructurafar')->name('eq-sc.edit_infraestructurafar');
Route::post('/eq-sc/delete_infraestructurafar', 'App\Http\Controllers\SitioClinico\SCController@delete_infraestructurafar')->name('eq-sc.delete_infraestructurafar');
Route::post('/eq-sc/list_materialesfar', 'App\Http\Controllers\SitioClinico\SCController@list_materialesfar')->name('eq-sc.list_materialesfar');
Route::post('/eq-sc/create_materialesfar', 'App\Http\Controllers\SitioClinico\SCController@create_materialesfar')->name('eq-sc.create_materialesfar');
Route::post('/eq-sc/edit_materialesfar', 'App\Http\Controllers\SitioClinico\SCController@edit_materialesfar')->name('eq-sc.edit_materialesfar');
Route::post('/eq-sc/delete_materialesfar', 'App\Http\Controllers\SitioClinico\SCController@delete_materialesfar')->name('eq-sc.delete_materialesfar');
Route::post('/eq-sc/list_farmacistafar', 'App\Http\Controllers\SitioClinico\SCController@list_farmacistafar')->name('eq-sc.list_farmacistafar');
Route::post('/eq-sc/create_farmacistafar', 'App\Http\Controllers\SitioClinico\SCController@create_farmacistafar')->name('eq-sc.create_farmacistafar');
Route::post('/eq-sc/edit_farmacistafar', 'App\Http\Controllers\SitioClinico\SCController@edit_farmacistafar')->name('eq-sc.edit_farmacistafar');
Route::post('/eq-sc/delete_farmacistafar', 'App\Http\Controllers\SitioClinico\SCController@delete_farmacistafar')->name('eq-sc.delete_farmacistafar');
Route::post('/eq-sc/list_controlfar', 'App\Http\Controllers\SitioClinico\SCController@list_controlfar')->name('eq-sc.list_controlfar');
Route::post('/eq-sc/create_controlfar', 'App\Http\Controllers\SitioClinico\SCController@create_controlfar')->name('eq-sc.create_controlfar');
Route::post('/eq-sc/edit_controlfar', 'App\Http\Controllers\SitioClinico\SCController@edit_controlfar')->name('eq-sc.edit_controlfar');
Route::post('/eq-sc/delete_controlfar', 'App\Http\Controllers\SitioClinico\SCController@delete_controlfar')->name('eq-sc.delete_controlfar');
Route::post('/eq-sc/list_tramitefar', 'App\Http\Controllers\SitioClinico\SCController@list_tramitefar')->name('eq-sc.list_tramitefar');
Route::post('/eq-sc/create_tramitefar', 'App\Http\Controllers\SitioClinico\SCController@create_tramitefar')->name('eq-sc.create_tramitefar');
Route::post('/eq-sc/edit_tramitefar', 'App\Http\Controllers\SitioClinico\SCController@edit_tramitefar')->name('eq-sc.edit_tramitefar');
Route::post('/eq-sc/delete_tramitefar', 'App\Http\Controllers\SitioClinico\SCController@delete_tramitefar')->name('eq-sc.delete_tramitefar');
Route::post('/eq-sc/list_visitafar', 'App\Http\Controllers\SitioClinico\SCController@list_visitafar')->name('eq-sc.list_visitafar');
Route::post('/eq-sc/create_visitafar', 'App\Http\Controllers\SitioClinico\SCController@create_visitafar')->name('eq-sc.create_visitafar');
Route::post('/eq-sc/edit_visitafar', 'App\Http\Controllers\SitioClinico\SCController@edit_visitafar')->name('eq-sc.edit_visitafar');
Route::post('/eq-sc/delete_visitafar', 'App\Http\Controllers\SitioClinico\SCController@delete_visitafar')->name('eq-sc.delete_visitafar');
Route::post('/eq-sc/list_quejafar', 'App\Http\Controllers\SitioClinico\SCController@list_quejafar')->name('eq-sc.list_quejafar');
Route::post('/eq-sc/create_quejafar', 'App\Http\Controllers\SitioClinico\SCController@create_quejafar')->name('eq-sc.create_quejafar');
Route::post('/eq-sc/edit_quejafar', 'App\Http\Controllers\SitioClinico\SCController@edit_quejafar')->name('eq-sc.edit_quejafar');
Route::post('/eq-sc/delete_quejafar', 'App\Http\Controllers\SitioClinico\SCController@delete_quejafar')->name('eq-sc.delete_quejafar');
Route::post('/eq-sc/list_seguridadfar', 'App\Http\Controllers\SitioClinico\SCController@list_seguridadfar')->name('eq-sc.list_seguridadfar');
Route::post('/eq-sc/create_seguridadfar', 'App\Http\Controllers\SitioClinico\SCController@create_seguridadfar')->name('eq-sc.create_seguridadfar');
Route::post('/eq-sc/edit_seguridadfar', 'App\Http\Controllers\SitioClinico\SCController@edit_seguridadfar')->name('eq-sc.edit_seguridadfar');
Route::post('/eq-sc/delete_seguridadfar', 'App\Http\Controllers\SitioClinico\SCController@delete_seguridadfar')->name('eq-sc.delete_seguridadfar');
Route::post('/eq-sc/list_cadenafar', 'App\Http\Controllers\SitioClinico\SCController@list_cadenafar')->name('eq-sc.list_cadenafar');
Route::post('/eq-sc/create_cadenafar', 'App\Http\Controllers\SitioClinico\SCController@create_cadenafar')->name('eq-sc.create_cadenafar');
Route::post('/eq-sc/edit_cadenafar', 'App\Http\Controllers\SitioClinico\SCController@edit_cadenafar')->name('eq-sc.edit_cadenafar');
Route::post('/eq-sc/delete_cadenafar', 'App\Http\Controllers\SitioClinico\SCController@delete_cadenafar')->name('eq-sc.delete_cadenafar');
Route::post('/eq-sc/list_recepcionfar', 'App\Http\Controllers\SitioClinico\SCController@list_recepcionfar')->name('eq-sc.list_recepcionfar');
Route::post('/eq-sc/create_recepcionfar', 'App\Http\Controllers\SitioClinico\SCController@create_recepcionfar')->name('eq-sc.create_recepcionfar');
Route::post('/eq-sc/edit_recepcionfar', 'App\Http\Controllers\SitioClinico\SCController@edit_recepcionfar')->name('eq-sc.edit_recepcionfar');
Route::post('/eq-sc/delete_recepcionfar', 'App\Http\Controllers\SitioClinico\SCController@delete_recepcionfar')->name('eq-sc.delete_recepcionfar');
Route::post('/eq-sc/list_productofar', 'App\Http\Controllers\SitioClinico\SCController@list_productofar')->name('eq-sc.list_productofar');
Route::post('/eq-sc/create_productofar', 'App\Http\Controllers\SitioClinico\SCController@create_productofar')->name('eq-sc.create_productofar');
Route::post('/eq-sc/edit_productofar', 'App\Http\Controllers\SitioClinico\SCController@edit_productofar')->name('eq-sc.edit_productofar');
Route::post('/eq-sc/delete_productofar', 'App\Http\Controllers\SitioClinico\SCController@delete_productofar')->name('eq-sc.delete_productofar');
Route::post('/eq-sc/list_materialfar', 'App\Http\Controllers\SitioClinico\SCController@list_materialfar')->name('eq-sc.list_materialfar');
Route::post('/eq-sc/create_materialfar', 'App\Http\Controllers\SitioClinico\SCController@create_materialfar')->name('eq-sc.create_materialfar');
Route::post('/eq-sc/edit_materialfar', 'App\Http\Controllers\SitioClinico\SCController@edit_materialfar')->name('eq-sc.edit_materialfar');
Route::post('/eq-sc/delete_materialfar', 'App\Http\Controllers\SitioClinico\SCController@delete_materialfar')->name('eq-sc.delete_materialfar');
Route::post('/eq-sc/list_equipofar', 'App\Http\Controllers\SitioClinico\SCController@list_equipofar')->name('eq-sc.list_equipofar');
Route::post('/eq-sc/create_equipofar', 'App\Http\Controllers\SitioClinico\SCController@create_equipofar')->name('eq-sc.create_equipofar');
Route::post('/eq-sc/edit_equipofar', 'App\Http\Controllers\SitioClinico\SCController@edit_equipofar')->name('eq-sc.edit_equipofar');
Route::post('/eq-sc/delete_equipofar', 'App\Http\Controllers\SitioClinico\SCController@delete_equipofar')->name('eq-sc.delete_equipofar');
//MODAL RECLUTAMIENTO SC
Route::post('/eq-sc/meta1_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@meta1_reclutamiento')->name('eq-sc.meta1_reclutamiento');
Route::post('/eq-sc/cargarvisita_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@cargarvisita_reclutamiento')->name('eq-sc.cargarvisita_reclutamiento');
Route::post('/eq-sc/cargarsujeto_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@cargarsujeto_reclutamiento')->name('eq-sc.cargarsujeto_reclutamiento');
Route::post('/eq-sc/cargarestado_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@cargarestado_reclutamiento')->name('eq-sc.cargarestado_reclutamiento');
Route::post('/eq-sc/guardar_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@guardar_reclutamiento')->name('eq-sc.guardar_reclutamiento');
Route::post('/eq-sc/create_reclutamiento', 'App\Http\Controllers\SitioClinico\SCController@create_reclutamiento')->name('eq-sc.create_reclutamiento');
Route::post('/eq-sc/list_cronogramarec', 'App\Http\Controllers\SitioClinico\SCController@list_cronogramarec')->name('eq-sc.list_cronogramarec');
Route::post('/eq-sc/create_cronogramarec', 'App\Http\Controllers\SitioClinico\SCController@create_cronogramarec')->name('eq-sc.create_cronogramarec');
Route::post('/eq-sc/edit_cronogramarec', 'App\Http\Controllers\SitioClinico\SCController@edit_cronogramarec')->name('eq-sc.edit_cronogramarec');
Route::post('/eq-sc/delete_cronogramarec', 'App\Http\Controllers\SitioClinico\SCController@delete_cronogramarec')->name('eq-sc.delete_cronogramarec');
Route::post('/eq-sc/list_estrategiarec', 'App\Http\Controllers\SitioClinico\SCController@list_estrategiarec')->name('eq-sc.list_estrategiarec');
Route::post('/eq-sc/create_estrategiarec', 'App\Http\Controllers\SitioClinico\SCController@create_estrategiarec')->name('eq-sc.create_estrategiarec');
Route::post('/eq-sc/edit_estrategiarec', 'App\Http\Controllers\SitioClinico\SCController@edit_estrategiarec')->name('eq-sc.edit_estrategiarec');
Route::post('/eq-sc/delete_estrategiarec', 'App\Http\Controllers\SitioClinico\SCController@delete_estrategiarec')->name('eq-sc.delete_estrategiarec');
Route::post('/eq-sc/list_contactorec', 'App\Http\Controllers\SitioClinico\SCController@list_contactorec')->name('eq-sc.list_contactorec');
Route::post('/eq-sc/create_contactorec', 'App\Http\Controllers\SitioClinico\SCController@create_contactorec')->name('eq-sc.create_contactorec');
Route::post('/eq-sc/edit_contactorec', 'App\Http\Controllers\SitioClinico\SCController@edit_contactorec')->name('eq-sc.edit_contactorec');
Route::post('/eq-sc/delete_contactorec', 'App\Http\Controllers\SitioClinico\SCController@delete_contactorec')->name('eq-sc.delete_contactorec');
Route::post('/eq-sc/list_criteriorec', 'App\Http\Controllers\SitioClinico\SCController@list_criteriorec')->name('eq-sc.list_criteriorec');
Route::post('/eq-sc/create_criteriorec', 'App\Http\Controllers\SitioClinico\SCController@create_criteriorec')->name('eq-sc.create_criteriorec');
Route::post('/eq-sc/edit_criteriorec', 'App\Http\Controllers\SitioClinico\SCController@edit_criteriorec')->name('eq-sc.edit_criteriorec');
Route::post('/eq-sc/delete_criteriorec', 'App\Http\Controllers\SitioClinico\SCController@delete_criteriorec')->name('eq-sc.delete_criteriorec');
Route::post('/eq-sc/list_preseleccionrec', 'App\Http\Controllers\SitioClinico\SCController@list_preseleccionrec')->name('eq-sc.list_preseleccionrec');
Route::post('/eq-sc/create_preseleccionrec', 'App\Http\Controllers\SitioClinico\SCController@create_preseleccionrec')->name('eq-sc.create_preseleccionrec');
Route::post('/eq-sc/edit_preseleccionrec', 'App\Http\Controllers\SitioClinico\SCController@edit_preseleccionrec')->name('eq-sc.edit_preseleccionrec');
Route::post('/eq-sc/delete_preseleccionrec', 'App\Http\Controllers\SitioClinico\SCController@delete_preseleccionrec')->name('eq-sc.delete_preseleccionrec');
Route::post('/eq-sc/list_fuentesujetorec', 'App\Http\Controllers\SitioClinico\SCController@list_fuentesujetorec')->name('eq-sc.list_fuentesujetorec');
Route::post('/eq-sc/create_fuentesujetorec', 'App\Http\Controllers\SitioClinico\SCController@create_fuentesujetorec')->name('eq-sc.create_fuentesujetorec');
Route::post('/eq-sc/edit_fuentesujetorec', 'App\Http\Controllers\SitioClinico\SCController@edit_fuentesujetorec')->name('eq-sc.edit_fuentesujetorec');
Route::post('/eq-sc/delete_fuentesujetorec', 'App\Http\Controllers\SitioClinico\SCController@delete_fuentesujetorec')->name('eq-sc.delete_fuentesujetorec');
Route::post('/eq-sc/list_fuenteestudiorec', 'App\Http\Controllers\SitioClinico\SCController@list_fuenteestudiorec')->name('eq-sc.list_fuenteestudiorec');
Route::post('/eq-sc/create_fuenteestudiorec', 'App\Http\Controllers\SitioClinico\SCController@create_fuenteestudiorec')->name('eq-sc.create_fuenteestudiorec');
Route::post('/eq-sc/edit_fuenteestudiorec', 'App\Http\Controllers\SitioClinico\SCController@edit_fuenteestudiorec')->name('eq-sc.edit_fuenteestudiorec');
Route::post('/eq-sc/delete_fuenteestudiorec', 'App\Http\Controllers\SitioClinico\SCController@delete_fuenteestudiorec')->name('eq-sc.delete_fuenteestudiorec');
Route::post('/eq-sc/list_fuentevisitarec', 'App\Http\Controllers\SitioClinico\SCController@list_fuentevisitarec')->name('eq-sc.list_fuentevisitarec');
Route::post('/eq-sc/create_fuentevisitarec', 'App\Http\Controllers\SitioClinico\SCController@create_fuentevisitarec')->name('eq-sc.create_fuentevisitarec');
Route::post('/eq-sc/edit_fuentevisitarec', 'App\Http\Controllers\SitioClinico\SCController@edit_fuentevisitarec')->name('eq-sc.edit_fuentevisitarec');
Route::post('/eq-sc/delete_fuentevisitarec', 'App\Http\Controllers\SitioClinico\SCController@delete_fuentevisitarec')->name('eq-sc.delete_fuentevisitarec');
Route::post('/eq-sc/list_reclutamientorec', 'App\Http\Controllers\SitioClinico\SCController@list_reclutamientorec')->name('eq-sc.list_reclutamientorec');
Route::post('/eq-sc/create_reclutamientorec', 'App\Http\Controllers\SitioClinico\SCController@create_reclutamientorec')->name('eq-sc.create_reclutamientorec');
Route::post('/eq-sc/edit_reclutamientorec', 'App\Http\Controllers\SitioClinico\SCController@edit_reclutamientorec')->name('eq-sc.edit_reclutamientorec');
Route::post('/eq-sc/delete_reclutamientorec', 'App\Http\Controllers\SitioClinico\SCController@delete_reclutamientorec')->name('eq-sc.delete_reclutamientorec');
Route::post('/eq-sc/list_proteccionrec', 'App\Http\Controllers\SitioClinico\SCController@list_proteccionrec')->name('eq-sc.list_proteccionrec');
Route::post('/eq-sc/create_proteccionrec', 'App\Http\Controllers\SitioClinico\SCController@create_proteccionrec')->name('eq-sc.create_proteccionrec');
Route::post('/eq-sc/edit_proteccionrec', 'App\Http\Controllers\SitioClinico\SCController@edit_proteccionrec')->name('eq-sc.edit_proteccionrec');
Route::post('/eq-sc/delete_proteccionrec', 'App\Http\Controllers\SitioClinico\SCController@delete_proteccionrec')->name('eq-sc.delete_proteccionrec');

//FIN DE SITIO CLINICO




//RECURSOS COMITE DE ETICA
Route::resource('eq-ce', CEController::class);
//MODAL INTEGRACION CE
Route::post('/eq-ce/cargarperiodo_integracion', 'App\Http\Controllers\ComiteEtica\CEController@cargarperiodo_integracion')->name('eq-ce.cargarperiodo_integracion');
Route::post('/eq-ce/cargarmiembro_integracion', 'App\Http\Controllers\ComiteEtica\CEController@cargarmiembro_integracion')->name('eq-ce.cargarmiembro_integracion');
Route::post('/eq-ce/guardar_integracion', 'App\Http\Controllers\ComiteEtica\CEController@guardar_integracion')->name('eq-ce.guardar_integracion');
Route::post('/eq-ce/create_integracion', 'App\Http\Controllers\ComiteEtica\CEController@create_integracion')->name('eq-ce.create_integracion');
Route::post('/eq-ce/list_miembroin', 'App\Http\Controllers\ComiteEtica\CEController@list_miembroin')->name('eq-ce.list_miembroin');
Route::post('/eq-ce/edit_miembroin', 'App\Http\Controllers\ComiteEtica\CEController@edit_miembroin')->name('eq-ce.edit_miembroin');
Route::post('/eq-ce/delete_miembroin', 'App\Http\Controllers\ComiteEtica\CEController@delete_miembroin')->name('eq-ce.delete_miembroin');
Route::post('/eq-ce/list_ocupacionin', 'App\Http\Controllers\ComiteEtica\CEController@list_ocupacionin')->name('eq-ce.list_ocupacionin');
Route::post('/eq-ce/create_ocupacionin', 'App\Http\Controllers\ComiteEtica\CEController@create_ocupacionin')->name('eq-ce.create_ocupacionin');
Route::post('/eq-ce/edit_ocupacionin', 'App\Http\Controllers\ComiteEtica\CEController@edit_ocupacionin')->name('eq-ce.edit_ocupacionin');
Route::post('/eq-ce/delete_ocupacionin', 'App\Http\Controllers\ComiteEtica\CEController@delete_ocupacionin')->name('eq-ce.delete_ocupacionin');
Route::post('/eq-ce/list_historiain', 'App\Http\Controllers\ComiteEtica\CEController@list_historiain')->name('eq-ce.list_historiain');
Route::post('/eq-ce/create_historiain', 'App\Http\Controllers\ComiteEtica\CEController@create_historiain')->name('eq-ce.create_historiain');
Route::post('/eq-ce/edit_historiain', 'App\Http\Controllers\ComiteEtica\CEController@edit_historiain')->name('eq-ce.edit_historiain');
Route::post('/eq-ce/delete_historiain', 'App\Http\Controllers\ComiteEtica\CEController@delete_historiain')->name('eq-ce.delete_historiain');
Route::post('/eq-ce/list_cargoin', 'App\Http\Controllers\ComiteEtica\CEController@list_cargoin')->name('eq-ce.list_cargoin');
Route::post('/eq-ce/create_cargoin', 'App\Http\Controllers\ComiteEtica\CEController@create_cargoin')->name('eq-ce.create_cargoin');
Route::post('/eq-ce/edit_cargoin', 'App\Http\Controllers\ComiteEtica\CEController@edit_cargoin')->name('eq-ce.edit_cargoin');
Route::post('/eq-ce/delete_cargoin', 'App\Http\Controllers\ComiteEtica\CEController@delete_cargoin')->name('eq-ce.delete_cargoin');
Route::post('/eq-ce/list_quisin', 'App\Http\Controllers\ComiteEtica\CEController@list_quisin')->name('eq-ce.list_quisin');
Route::post('/eq-ce/create_quisin', 'App\Http\Controllers\ComiteEtica\CEController@create_quisin')->name('eq-ce.create_quisin');
Route::post('/eq-ce/edit_quisin', 'App\Http\Controllers\ComiteEtica\CEController@edit_quisin')->name('eq-ce.edit_quisin');
Route::post('/eq-ce/delete_quisin', 'App\Http\Controllers\ComiteEtica\CEController@delete_quisin')->name('eq-ce.delete_quisin');
Route::post('/eq-ce/list_cein', 'App\Http\Controllers\ComiteEtica\CEController@list_cein')->name('eq-ce.list_cein');
Route::post('/eq-ce/create_cein', 'App\Http\Controllers\ComiteEtica\CEController@create_cein')->name('eq-ce.create_cein');
Route::post('/eq-ce/edit_cein', 'App\Http\Controllers\ComiteEtica\CEController@edit_cein')->name('eq-ce.edit_cein');
Route::post('/eq-ce/delete_cein', 'App\Http\Controllers\ComiteEtica\CEController@delete_cein')->name('eq-ce.delete_cein');
Route::post('/eq-ce/list_pccein', 'App\Http\Controllers\ComiteEtica\CEController@list_pccein')->name('eq-ce.list_pccein');
Route::post('/eq-ce/create_pccein', 'App\Http\Controllers\ComiteEtica\CEController@create_pccein')->name('eq-ce.create_pccein');
Route::post('/eq-ce/edit_pccein', 'App\Http\Controllers\ComiteEtica\CEController@edit_pccein')->name('eq-ce.edit_pccein');
Route::post('/eq-ce/delete_pccein', 'App\Http\Controllers\ComiteEtica\CEController@delete_pccein')->name('eq-ce.delete_pccein');
Route::post('/eq-ce/list_otrain', 'App\Http\Controllers\ComiteEtica\CEController@list_otrain')->name('eq-ce.list_otrain');
Route::post('/eq-ce/create_otrain', 'App\Http\Controllers\ComiteEtica\CEController@create_otrain')->name('eq-ce.create_otrain');
Route::post('/eq-ce/edit_otrain', 'App\Http\Controllers\ComiteEtica\CEController@edit_otrain')->name('eq-ce.edit_otrain');
Route::post('/eq-ce/delete_otrain', 'App\Http\Controllers\ComiteEtica\CEController@delete_otrain')->name('eq-ce.delete_otrain');
Route::post('/eq-ce/list_comitein', 'App\Http\Controllers\ComiteEtica\CEController@list_comitein')->name('eq-ce.list_comitein');
Route::post('/eq-ce/create_comitein', 'App\Http\Controllers\ComiteEtica\CEController@create_comitein')->name('eq-ce.create_comitein');
Route::post('/eq-ce/edit_comitein', 'App\Http\Controllers\ComiteEtica\CEController@edit_comitein')->name('eq-ce.edit_comitein');
Route::post('/eq-ce/delete_comitein', 'App\Http\Controllers\ComiteEtica\CEController@delete_comitein')->name('eq-ce.delete_comitein');
Route::post('/eq-ce/list_registroin', 'App\Http\Controllers\ComiteEtica\CEController@list_registroin')->name('eq-ce.list_registroin');
Route::post('/eq-ce/create_registroin', 'App\Http\Controllers\ComiteEtica\CEController@create_registroin')->name('eq-ce.create_registroin');
Route::post('/eq-ce/edit_registroin', 'App\Http\Controllers\ComiteEtica\CEController@edit_registroin')->name('eq-ce.edit_registroin');
Route::post('/eq-ce/delete_registroin', 'App\Http\Controllers\ComiteEtica\CEController@delete_registroin')->name('eq-ce.delete_registroin');
Route::post('/eq-ce/list_renovacionin', 'App\Http\Controllers\ComiteEtica\CEController@list_renovacionin')->name('eq-ce.list_renovacionin');
Route::post('/eq-ce/create_renovacionin', 'App\Http\Controllers\ComiteEtica\CEController@create_renovacionin')->name('eq-ce.create_renovacionin');
Route::post('/eq-ce/edit_renovacionin', 'App\Http\Controllers\ComiteEtica\CEController@edit_renovacionin')->name('eq-ce.edit_renovacionin');
Route::post('/eq-ce/delete_renovacionin', 'App\Http\Controllers\ComiteEtica\CEController@delete_renovacionin')->name('eq-ce.delete_renovacionin');
Route::post('/eq-ce/list_actualizacionin', 'App\Http\Controllers\ComiteEtica\CEController@list_actualizacionin')->name('eq-ce.list_actualizacionin');
Route::post('/eq-ce/create_actualizacionin', 'App\Http\Controllers\ComiteEtica\CEController@create_actualizacionin')->name('eq-ce.create_actualizacionin');
Route::post('/eq-ce/edit_actualizacionin', 'App\Http\Controllers\ComiteEtica\CEController@edit_actualizacionin')->name('eq-ce.edit_actualizacionin');
Route::post('/eq-ce/delete_actualizacionin', 'App\Http\Controllers\ComiteEtica\CEController@delete_actualizacionin')->name('eq-ce.delete_actualizacionin');
Route::post('/eq-ce/list_informein', 'App\Http\Controllers\ComiteEtica\CEController@list_informein')->name('eq-ce.list_informein');
Route::post('/eq-ce/create_informein', 'App\Http\Controllers\ComiteEtica\CEController@create_informein')->name('eq-ce.create_informein');
Route::post('/eq-ce/edit_informein', 'App\Http\Controllers\ComiteEtica\CEController@edit_informein')->name('eq-ce.edit_informein');
Route::post('/eq-ce/delete_informein', 'App\Http\Controllers\ComiteEtica\CEController@delete_informein')->name('eq-ce.delete_informein');
//MODAL SOMETIMIENTO CE
Route::post('/eq-ce/guardar_sometimiento', 'App\Http\Controllers\ComiteEtica\CEController@guardar_sometimiento')->name('eq-ce.guardar_sometimiento');
Route::post('/eq-ce/create_sometimiento', 'App\Http\Controllers\ComiteEtica\CEController@create_sometimiento')->name('eq-ce.create_sometimiento');
Route::post('/eq-ce/list_fechasom', 'App\Http\Controllers\ComiteEtica\CEController@list_fechasom')->name('eq-ce.list_fechasom');
Route::post('/eq-ce/edit_fechasom', 'App\Http\Controllers\ComiteEtica\CEController@edit_fechasom')->name('eq-ce.edit_fechasom');
Route::post('/eq-ce/delete_fechasom', 'App\Http\Controllers\ComiteEtica\CEController@delete_fechasom')->name('eq-ce.delete_fechasom');
Route::post('/eq-ce/list_protocolosom', 'App\Http\Controllers\ComiteEtica\CEController@list_protocolosom')->name('eq-ce.list_protocolosom');
Route::post('/eq-ce/create_protocolosom', 'App\Http\Controllers\ComiteEtica\CEController@create_protocolosom')->name('eq-ce.create_protocolosom');
Route::post('/eq-ce/edit_protocolosom', 'App\Http\Controllers\ComiteEtica\CEController@edit_protocolosom')->name('eq-ce.edit_protocolosom');
Route::post('/eq-ce/delete_protocolosom', 'App\Http\Controllers\ComiteEtica\CEController@delete_protocolosom')->name('eq-ce.delete_protocolosom');
Route::post('/eq-ce/list_icfsom', 'App\Http\Controllers\ComiteEtica\CEController@list_icfsom')->name('eq-ce.list_icfsom');
Route::post('/eq-ce/create_icfsom', 'App\Http\Controllers\ComiteEtica\CEController@create_icfsom')->name('eq-ce.create_icfsom');
Route::post('/eq-ce/edit_icfsom', 'App\Http\Controllers\ComiteEtica\CEController@edit_icfsom')->name('eq-ce.edit_icfsom');
Route::post('/eq-ce/delete_icfsom', 'App\Http\Controllers\ComiteEtica\CEController@delete_icfsom')->name('eq-ce.delete_icfsom');
Route::post('/eq-ce/list_manualsom', 'App\Http\Controllers\ComiteEtica\CEController@list_manualsom')->name('eq-ce.list_manualsom');
Route::post('/eq-ce/create_manualsom', 'App\Http\Controllers\ComiteEtica\CEController@create_manualsom')->name('eq-ce.create_manualsom');
Route::post('/eq-ce/edit_manualsom', 'App\Http\Controllers\ComiteEtica\CEController@edit_manualsom')->name('eq-ce.edit_manualsom');
Route::post('/eq-ce/delete_manualsom', 'App\Http\Controllers\ComiteEtica\CEController@delete_manualsom')->name('eq-ce.delete_manualsom');
Route::post('/eq-ce/list_polizasom', 'App\Http\Controllers\ComiteEtica\CEController@list_polizasom')->name('eq-ce.list_polizasom');
Route::post('/eq-ce/create_polizasom', 'App\Http\Controllers\ComiteEtica\CEController@create_polizasom')->name('eq-ce.create_polizasom');
Route::post('/eq-ce/edit_polizasom', 'App\Http\Controllers\ComiteEtica\CEController@edit_polizasom')->name('eq-ce.edit_polizasom');
Route::post('/eq-ce/delete_polizasom', 'App\Http\Controllers\ComiteEtica\CEController@delete_polizasom')->name('eq-ce.delete_polizasom');
Route::post('/eq-ce/list_desviacionsom', 'App\Http\Controllers\ComiteEtica\CEController@list_desviacionsom')->name('eq-ce.list_desviacionsom');
Route::post('/eq-ce/create_desviacionsom', 'App\Http\Controllers\ComiteEtica\CEController@create_desviacionsom')->name('eq-ce.create_desviacionsom');
Route::post('/eq-ce/edit_desviacionsom', 'App\Http\Controllers\ComiteEtica\CEController@edit_desviacionsom')->name('eq-ce.edit_desviacionsom');
Route::post('/eq-ce/delete_desviacionsom', 'App\Http\Controllers\ComiteEtica\CEController@delete_desviacionsom')->name('eq-ce.delete_desviacionsom');
Route::post('/eq-ce/list_eassom', 'App\Http\Controllers\ComiteEtica\CEController@list_eassom')->name('eq-ce.list_eassom');
Route::post('/eq-ce/create_eassom', 'App\Http\Controllers\ComiteEtica\CEController@create_eassom')->name('eq-ce.create_eassom');
Route::post('/eq-ce/edit_eassom', 'App\Http\Controllers\ComiteEtica\CEController@edit_eassom')->name('eq-ce.edit_eassom');
Route::post('/eq-ce/delete_eassom', 'App\Http\Controllers\ComiteEtica\CEController@delete_eassom')->name('eq-ce.delete_eassom');
Route::post('/eq-ce/list_susarsom', 'App\Http\Controllers\ComiteEtica\CEController@list_susarsom')->name('eq-ce.list_susarsom');
Route::post('/eq-ce/create_susarsom', 'App\Http\Controllers\ComiteEtica\CEController@create_susarsom')->name('eq-ce.create_susarsom');
Route::post('/eq-ce/edit_susarsom', 'App\Http\Controllers\ComiteEtica\CEController@edit_susarsom')->name('eq-ce.edit_susarsom');
Route::post('/eq-ce/delete_susarsom', 'App\Http\Controllers\ComiteEtica\CEController@delete_susarsom')->name('eq-ce.delete_susarsom');
Route::post('/eq-ce/list_renovacionsom', 'App\Http\Controllers\ComiteEtica\CEController@list_renovacionsom')->name('eq-ce.list_renovacionsom');
Route::post('/eq-ce/create_renovacionsom', 'App\Http\Controllers\ComiteEtica\CEController@create_renovacionsom')->name('eq-ce.create_renovacionsom');
Route::post('/eq-ce/edit_renovacionsom', 'App\Http\Controllers\ComiteEtica\CEController@edit_renovacionsom')->name('eq-ce.edit_renovacionsom');
Route::post('/eq-ce/delete_renovacionsom', 'App\Http\Controllers\ComiteEtica\CEController@delete_renovacionsom')->name('eq-ce.delete_renovacionsom');
Route::post('/eq-ce/list_erratassom', 'App\Http\Controllers\ComiteEtica\CEController@list_erratassom')->name('eq-ce.list_erratassom');
Route::post('/eq-ce/create_erratassom', 'App\Http\Controllers\ComiteEtica\CEController@create_erratassom')->name('eq-ce.create_erratassom');
Route::post('/eq-ce/edit_erratassom', 'App\Http\Controllers\ComiteEtica\CEController@edit_erratassom')->name('eq-ce.edit_erratassom');
Route::post('/eq-ce/delete_erratassom', 'App\Http\Controllers\ComiteEtica\CEController@delete_erratassom')->name('eq-ce.delete_erratassom');
Route::post('/eq-ce/list_copiassom', 'App\Http\Controllers\ComiteEtica\CEController@list_copiassom')->name('eq-ce.list_copiassom');
Route::post('/eq-ce/create_copiassom', 'App\Http\Controllers\ComiteEtica\CEController@create_copiassom')->name('eq-ce.create_copiassom');
Route::post('/eq-ce/edit_copiassom', 'App\Http\Controllers\ComiteEtica\CEController@edit_copiassom')->name('eq-ce.edit_copiassom');
Route::post('/eq-ce/delete_copiassom', 'App\Http\Controllers\ComiteEtica\CEController@delete_copiassom')->name('eq-ce.delete_copiassom');
//MODAL REUNION CE
Route::post('/eq-ce/create_reunion', 'App\Http\Controllers\ComiteEtica\CEController@create_reunion')->name('eq-ce.create_reunion');
Route::post('/eq-ce/list_reunion', 'App\Http\Controllers\ComiteEtica\CEController@list_reunion')->name('eq-ce.list_reunion');
Route::post('/eq-ce/edit_reunion', 'App\Http\Controllers\ComiteEtica\CEController@edit_reunion')->name('eq-ce.edit_reunion');
Route::post('/eq-ce/delete_reunion', 'App\Http\Controllers\ComiteEtica\CEController@delete_reunion')->name('eq-ce.delete_reunion');
//MODAL SEGUIMIENTO CE
Route::post('/eq-ce/list_enmiendaseg', 'App\Http\Controllers\ComiteEtica\CEController@list_enmiendaseg')->name('eq-ce.list_enmiendaseg');
Route::post('/eq-ce/create_enmiendaseg', 'App\Http\Controllers\ComiteEtica\CEController@create_enmiendaseg')->name('eq-ce.create_enmiendaseg');
Route::post('/eq-ce/edit_enmiendaseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_enmiendaseg')->name('eq-ce.edit_enmiendaseg');
Route::post('/eq-ce/delete_enmiendaseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_enmiendaseg')->name('eq-ce.delete_enmiendaseg');
Route::post('/eq-ce/list_desviacionseg', 'App\Http\Controllers\ComiteEtica\CEController@list_desviacionseg')->name('eq-ce.list_desviacionseg');
Route::post('/eq-ce/create_desviacionseg', 'App\Http\Controllers\ComiteEtica\CEController@create_desviacionseg')->name('eq-ce.create_desviacionseg');
Route::post('/eq-ce/edit_desviacionseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_desviacionseg')->name('eq-ce.edit_desviacionseg');
Route::post('/eq-ce/delete_desviacionseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_desviacionseg')->name('eq-ce.delete_desviacionseg');
Route::post('/eq-ce/list_easseg', 'App\Http\Controllers\ComiteEtica\CEController@list_easseg')->name('eq-ce.list_easseg');
Route::post('/eq-ce/create_easseg', 'App\Http\Controllers\ComiteEtica\CEController@create_easseg')->name('eq-ce.create_easseg');
Route::post('/eq-ce/edit_easseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_easseg')->name('eq-ce.edit_easseg');
Route::post('/eq-ce/delete_easseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_easseg')->name('eq-ce.delete_easseg');
Route::post('/eq-ce/list_otroseg', 'App\Http\Controllers\ComiteEtica\CEController@list_otroseg')->name('eq-ce.list_otroseg');
Route::post('/eq-ce/create_otroseg', 'App\Http\Controllers\ComiteEtica\CEController@create_otroseg')->name('eq-ce.create_otroseg');
Route::post('/eq-ce/edit_otroseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_otroseg')->name('eq-ce.edit_otroseg');
Route::post('/eq-ce/delete_otroseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_otroseg')->name('eq-ce.delete_otroseg');
Route::post('/eq-ce/list_renovacionseg', 'App\Http\Controllers\ComiteEtica\CEController@list_renovacionseg')->name('eq-ce.list_renovacionseg');
Route::post('/eq-ce/create_renovacionseg', 'App\Http\Controllers\ComiteEtica\CEController@create_renovacionseg')->name('eq-ce.create_renovacionseg');
Route::post('/eq-ce/edit_renovacionseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_renovacionseg')->name('eq-ce.edit_renovacionseg');
Route::post('/eq-ce/delete_renovacionseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_renovacionseg')->name('eq-ce.delete_renovacionseg');
Route::post('/eq-ce/list_erratasseg', 'App\Http\Controllers\ComiteEtica\CEController@list_erratasseg')->name('eq-ce.list_erratasseg');
Route::post('/eq-ce/create_erratasseg', 'App\Http\Controllers\ComiteEtica\CEController@create_erratasseg')->name('eq-ce.create_erratasseg');
Route::post('/eq-ce/edit_erratasseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_erratasseg')->name('eq-ce.edit_erratasseg');
Route::post('/eq-ce/delete_erratasseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_erratasseg')->name('eq-ce.delete_erratasseg');
Route::post('/eq-ce/list_informeseg', 'App\Http\Controllers\ComiteEtica\CEController@list_informeseg')->name('eq-ce.list_informeseg');
Route::post('/eq-ce/create_informeseg', 'App\Http\Controllers\ComiteEtica\CEController@create_informeseg')->name('eq-ce.create_informeseg');
Route::post('/eq-ce/edit_informeseg', 'App\Http\Controllers\ComiteEtica\CEController@edit_informeseg')->name('eq-ce.edit_informeseg');
Route::post('/eq-ce/delete_informeseg', 'App\Http\Controllers\ComiteEtica\CEController@delete_informeseg')->name('eq-ce.delete_informeseg');
//MODAL AUDITORIA CE
Route::post('/eq-ce/create_auditoria', 'App\Http\Controllers\ComiteEtica\CEController@create_auditoria')->name('eq-ce.create_auditoria');
Route::post('/eq-ce/list_auditoria', 'App\Http\Controllers\ComiteEtica\CEController@list_auditoria')->name('eq-ce.list_auditoria');
Route::post('/eq-ce/edit_auditoria', 'App\Http\Controllers\ComiteEtica\CEController@edit_auditoria')->name('eq-ce.edit_auditoria');
Route::post('/eq-ce/delete_auditoria', 'App\Http\Controllers\ComiteEtica\CEController@delete_auditoria')->name('eq-ce.delete_auditoria');
//MODAL CIERRE CE
Route::post('/eq-ce/guardar_cierre', 'App\Http\Controllers\ComiteEtica\CEController@guardar_cierre')->name('eq-ce.guardar_cierre');
Route::post('/eq-ce/create_cierre', 'App\Http\Controllers\ComiteEtica\CEController@create_cierre')->name('eq-ce.create_cierre');
Route::post('/eq-ce/list_domicilioci', 'App\Http\Controllers\ComiteEtica\CEController@list_domicilioci')->name('eq-ce.list_domicilioci');
Route::post('/eq-ce/create_domicilioci', 'App\Http\Controllers\ComiteEtica\CEController@create_domicilioci')->name('eq-ce.create_domicilioci');
Route::post('/eq-ce/edit_domicilioci', 'App\Http\Controllers\ComiteEtica\CEController@edit_domicilioci')->name('eq-ce.edit_domicilioci');
Route::post('/eq-ce/delete_domicilioci', 'App\Http\Controllers\ComiteEtica\CEController@delete_domicilioci')->name('eq-ce.delete_domicilioci');

//FIN DE COMITE DE ETICA




//RECURSOS RECEPCION ADMINISTRACION
Route::resource('recepcion', RecepcionController::class);
//MODAL MENSAJES RECEPCION 
Route::post('/recepcion/list_mensaje', 'App\Http\Controllers\Administracion\RecepcionController@list_mensaje')->name('recepcion.list_mensaje');
Route::post('/recepcion/create_mensaje', 'App\Http\Controllers\Administracion\RecepcionController@create_mensaje')->name('recepcion.create_mensaje');
Route::post('/recepcion/edit_mensaje', 'App\Http\Controllers\Administracion\RecepcionController@edit_mensaje')->name('recepcion.edit_mensaje');
Route::post('/recepcion/delete_mensaje', 'App\Http\Controllers\Administracion\RecepcionController@delete_mensaje')->name('recepcion.delete_mensaje');
//MODAL PAQUETERIA RECEPCION
Route::post('/recepcion/list_paqueteria', 'App\Http\Controllers\Administracion\RecepcionController@list_paqueteria')->name('recepcion.list_paqueteria');
Route::post('/recepcion/create_paqueteria', 'App\Http\Controllers\Administracion\RecepcionController@create_paqueteria')->name('recepcion.create_paqueteria');
Route::post('/recepcion/edit_paqueteria', 'App\Http\Controllers\Administracion\RecepcionController@edit_paqueteria')->name('recepcion.edit_paqueteria');
Route::post('/recepcion/delete_paqueteria', 'App\Http\Controllers\Administracion\RecepcionController@delete_paqueteria')->name('recepcion.delete_paqueteria');
//MODAL CAJA RECEPCION
Route::post('/recepcion/list_caja', 'App\Http\Controllers\Administracion\RecepcionController@list_caja')->name('recepcion.list_caja');
Route::post('/recepcion/create_caja', 'App\Http\Controllers\Administracion\RecepcionController@create_caja')->name('recepcion.create_caja');
Route::post('/recepcion/edit_caja', 'App\Http\Controllers\Administracion\RecepcionController@edit_caja')->name('recepcion.edit_caja');
Route::post('/recepcion/delete_caja', 'App\Http\Controllers\Administracion\RecepcionController@delete_caja')->name('recepcion.delete_caja');
//MODAL PROVEEDORES RECEPCION
Route::post('/recepcion/list_proveedor', 'App\Http\Controllers\Administracion\RecepcionController@list_proveedor')->name('recepcion.list_proveedor');
Route::post('/recepcion/create_proveedor', 'App\Http\Controllers\Administracion\RecepcionController@create_proveedor')->name('recepcion.create_proveedor');
Route::post('/recepcion/edit_proveedor', 'App\Http\Controllers\Administracion\RecepcionController@edit_proveedor')->name('recepcion.edit_proveedor');
Route::post('/recepcion/delete_proveedor', 'App\Http\Controllers\Administracion\RecepcionController@delete_proveedor')->name('recepcion.delete_proveedor');
//MODAL FACTURACION RECEPCION
Route::post('/recepcion/list_facturacion', 'App\Http\Controllers\Administracion\RecepcionController@list_facturacion')->name('recepcion.list_facturacion');
Route::post('/recepcion/create_facturacion', 'App\Http\Controllers\Administracion\RecepcionController@create_facturacion')->name('recepcion.create_facturacion');
Route::post('/recepcion/edit_facturacion', 'App\Http\Controllers\Administracion\RecepcionController@edit_facturacion')->name('recepcion.edit_facturacion');
Route::post('/recepcion/delete_facturacion', 'App\Http\Controllers\Administracion\RecepcionController@delete_facturacion')->name('recepcion.delete_facturacion');
//RECURSOS CONTRATO ADMINISTRACION
Route::resource('contrato', ContratoController::class);
//RECURSOS PREPARACION ADMINISTRACION
Route::resource('preparacion', PreparacionController::class);
//MODAL VISITA PREPARACION
Route::post('/preparacion/guardar_preparacion', 'App\Http\Controllers\Administracion\PreparacionController@guardar_preparacion')->name('preparacion.guardar_preparacion');
Route::post('/preparacion/cargar_estudios', 'App\Http\Controllers\Administracion\PreparacionController@cargar_estudios')->name('preparacion.cargar_estudios');
Route::post('/preparacion/cargar_precio', 'App\Http\Controllers\Administracion\PreparacionController@cargar_precio')->name('preparacion.cargar_precio');
Route::post('/preparacion/list_visita', 'App\Http\Controllers\Administracion\PreparacionController@list_visita')->name('preparacion.list_visita');
Route::post('/preparacion/create_visita', 'App\Http\Controllers\Administracion\PreparacionController@create_visita')->name('preparacion.create_visita');
Route::post('/preparacion/edit_visita', 'App\Http\Controllers\Administracion\PreparacionController@edit_visita')->name('preparacion.edit_visita');
Route::post('/preparacion/delete_visita', 'App\Http\Controllers\Administracion\PreparacionController@delete_visita')->name('preparacion.delete_visita');
//MODAL ESTUDIO PREPARACION
Route::post('/preparacion/list_estudio', 'App\Http\Controllers\Administracion\PreparacionController@list_estudio')->name('preparacion.list_estudio');
Route::post('/preparacion/create_estudio', 'App\Http\Controllers\Administracion\PreparacionController@create_estudio')->name('preparacion.create_estudio');
Route::post('/preparacion/edit_estudio', 'App\Http\Controllers\Administracion\PreparacionController@edit_estudio')->name('preparacion.edit_estudio');
Route::post('/preparacion/delete_estudio', 'App\Http\Controllers\Administracion\PreparacionController@delete_estudio')->name('preparacion.delete_estudio');
//MODAL PROVEEDOR PREPARACION
Route::post('/preparacion/list_proveedor', 'App\Http\Controllers\Administracion\PreparacionController@list_proveedor')->name('preparacion.list_proveedor');
Route::post('/preparacion/create_proveedor', 'App\Http\Controllers\Administracion\PreparacionController@create_proveedor')->name('preparacion.create_proveedor');
Route::post('/preparacion/edit_proveedor', 'App\Http\Controllers\Administracion\PreparacionController@edit_proveedor')->name('preparacion.edit_proveedor');
Route::post('/preparacion/delete_proveedor', 'App\Http\Controllers\Administracion\PreparacionController@delete_proveedor')->name('preparacion.delete_proveedor');
//RECURSOS FACTURACION ADMINISTRACION
Route::resource('facturacion', FacturacionController::class);
//MODAL COBROS FACTURACION
Route::post('/facturacion/list_cobro', 'App\Http\Controllers\Administracion\FacturacionController@list_cobro')->name('facturacion.list_cobro');
Route::post('/facturacion/create_cobro', 'App\Http\Controllers\Administracion\FacturacionController@create_cobro')->name('facturacion.create_cobro');
Route::post('/facturacion/edit_cobro', 'App\Http\Controllers\Administracion\FacturacionController@edit_cobro')->name('facturacion.edit_cobro');
Route::post('/facturacion/delete_cobro', 'App\Http\Controllers\Administracion\FacturacionController@delete_cobro')->name('facturacion.delete_cobro');
//RECURSOS PAGOS ADMINISTRACION
Route::resource('pago', PagoController::class);
//MODAL PAGOS_RECIBIDOS PAGOS
Route::post('/pago/list_recibido', 'App\Http\Controllers\Administracion\PagoController@list_recibido')->name('pago.list_recibido');
Route::post('/pago/cargar_precio', 'App\Http\Controllers\Administracion\PagoController@cargar_precio')->name('pago.cargar_precio');
Route::post('/pago/cargar_factura', 'App\Http\Controllers\Administracion\PagoController@cargar_factura')->name('pago.cargar_factura');
Route::post('/pago/create_recibido', 'App\Http\Controllers\Administracion\PagoController@create_recibido')->name('pago.create_recibido');
Route::post('/pago/edit_recibido', 'App\Http\Controllers\Administracion\PagoController@edit_recibido')->name('pago.edit_recibido');
Route::post('/pago/delete_recibido', 'App\Http\Controllers\Administracion\PagoController@delete_recibido')->name('pago.delete_recibido');
//MODAL PAGOS_REALIZADOS PAGOS
Route::post('/pago/list_realizado', 'App\Http\Controllers\Administracion\PagoController@list_realizado')->name('pago.list_realizado');
Route::post('/pago/create_realizado', 'App\Http\Controllers\Administracion\PagoController@create_realizado')->name('pago.create_realizado');
Route::post('/pago/edit_realizado', 'App\Http\Controllers\Administracion\PagoController@edit_realizado')->name('pago.edit_realizado');
Route::post('/pago/delete_realizado', 'App\Http\Controllers\Administracion\PagoController@delete_realizado')->name('pago.delete_realizado');
//RECURSOS AUXILIAR ADMINISTRACION
Route::resource('auxiliar', AuxiliarController::class);
//MODAL AUXILIAR
Route::post('/auxiliar/list_auxiliar', 'App\Http\Controllers\Administracion\AuxiliarController@list_auxiliar')->name('auxiliar.list_auxiliar');
Route::post('/auxiliar/create_auxiliar', 'App\Http\Controllers\Administracion\AuxiliarController@create_auxiliar')->name('auxiliar.create_auxiliar');
Route::post('/auxiliar/edit_auxiliar', 'App\Http\Controllers\Administracion\AuxiliarController@edit_auxiliar')->name('auxiliar.edit_auxiliar');
Route::post('/auxiliar/delete_auxiliar', 'App\Http\Controllers\Administracion\AuxiliarController@delete_auxiliar')->name('auxiliar.delete_auxiliar');
//RECURSOS RECLUTAMIENTO ADMINISTRACION
Route::resource('reclutamiento', ReclutamientoController::class);
//MODAL PUESTO RECLUTAMIENTO
Route::post('/reclutamiento/guardar_reclutamiento', 'App\Http\Controllers\Administracion\ReclutamientoController@guardar_reclutamiento')->name('reclutamiento.guardar_reclutamiento');
Route::post('/reclutamiento/list_puesto', 'App\Http\Controllers\Administracion\ReclutamientoController@list_puesto')->name('reclutamiento.list_puesto');
Route::post('/reclutamiento/create_puesto', 'App\Http\Controllers\Administracion\ReclutamientoController@create_puesto')->name('reclutamiento.create_puesto');
Route::post('/reclutamiento/edit_puesto', 'App\Http\Controllers\Administracion\ReclutamientoController@edit_puesto')->name('reclutamiento.edit_puesto');
Route::post('/reclutamiento/delete_puesto', 'App\Http\Controllers\Administracion\ReclutamientoController@delete_puesto')->name('reclutamiento.delete_puesto');
//RECURSOS CONTRATACION ADMINISTRACION
Route::resource('contratacion', ContratacionController::class);
//MODAL CONTRATO CONTRATACION
Route::post('/contratacion/guardar_contratacion', 'App\Http\Controllers\Administracion\ContratacionController@guardar_contratacion')->name('contratacion.guardar_contratacion');
Route::post('/contratacion/list_contrato', 'App\Http\Controllers\Administracion\ContratacionController@list_contrato')->name('contratacion.list_contrato');
Route::post('/contratacion/create_contrato', 'App\Http\Controllers\Administracion\ContratacionController@create_contrato')->name('contratacion.create_contrato');
Route::post('/contratacion/edit_contrato', 'App\Http\Controllers\Administracion\ContratacionController@edit_contrato')->name('contratacion.edit_contrato');
Route::post('/contratacion/delete_contrato', 'App\Http\Controllers\Administracion\ContratacionController@delete_contrato')->name('contratacion.delete_contrato');
//RECURSOS INDUCCION ADMINISTRACION
Route::resource('induccion', InduccionController::class);
//RECURSOS DESARROLLO ADMINISTRACION
Route::resource('desarrollo', DesarrolloController::class);
//MODAL PERMISO CON GOCE DESARROLLO
Route::post('/desarrollo/list_permisocgoce', 'App\Http\Controllers\Administracion\DesarrolloController@list_permisocgoce')->name('desarrollo.list_permisocgoce');
Route::post('/desarrollo/create_permisocgoce', 'App\Http\Controllers\Administracion\DesarrolloController@create_permisocgoce')->name('desarrollo.create_permisocgoce');
Route::post('/desarrollo/edit_permisocgoce', 'App\Http\Controllers\Administracion\DesarrolloController@edit_permisocgoce')->name('desarrollo.edit_permisocgoce');
Route::post('/desarrollo/delete_permisocgoce', 'App\Http\Controllers\Administracion\DesarrolloController@delete_permisocgoce')->name('desarrollo.delete_permisocgoce');
//MODAL PERMISO SIN GOCE DESARROLLO
Route::post('/desarrollo/list_permisosgoce', 'App\Http\Controllers\Administracion\DesarrolloController@list_permisosgoce')->name('desarrollo.list_permisosgoce');
Route::post('/desarrollo/create_permisosgoce', 'App\Http\Controllers\Administracion\DesarrolloController@create_permisosgoce')->name('desarrollo.create_permisosgoce');
Route::post('/desarrollo/edit_permisosgoce', 'App\Http\Controllers\Administracion\DesarrolloController@edit_permisosgoce')->name('desarrollo.edit_permisosgoce');
Route::post('/desarrollo/delete_permisosgoce', 'App\Http\Controllers\Administracion\DesarrolloController@delete_permisosgoce')->name('desarrollo.delete_permisosgoce');
//MODAL VACACIONES DESARROLLO
Route::post('/desarrollo/list_vacaciones', 'App\Http\Controllers\Administracion\DesarrolloController@list_vacaciones')->name('desarrollo.list_vacaciones');
Route::post('/desarrollo/create_vacaciones', 'App\Http\Controllers\Administracion\DesarrolloController@create_vacaciones')->name('desarrollo.create_vacaciones');
Route::post('/desarrollo/edit_vacaciones', 'App\Http\Controllers\Administracion\DesarrolloController@edit_vacaciones')->name('desarrollo.edit_vacaciones');
Route::post('/desarrollo/delete_vacaciones', 'App\Http\Controllers\Administracion\DesarrolloController@delete_vacaciones')->name('desarrollo.delete_vacaciones');
//RECURSOS EVALUACION ADMINISTRACION
Route::resource('empleados_evaluacion', EvaluacionController::class);
//MODAL EVALUACION VERIFICACION
Route::post('/empleados_evaluacion/guardar_evaluacion', 'App\Http\Controllers\Administracion\EvaluacionController@guardar_evaluacion')->name('empleados_evaluacion.guardar_evaluacion');
Route::post('/empleados_evaluacion/list_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@list_verificacion')->name('empleados_evaluacion.list_verificacion');
Route::post('/empleados_evaluacion/create_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@create_verificacion')->name('empleados_evaluacion.create_verificacion');
Route::post('/empleados_evaluacion/edit_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@edit_verificacion')->name('empleados_evaluacion.edit_verificacion');
Route::post('/empleados_evaluacion/delete_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@delete_verificacion')->name('empleados_evaluacion.delete_verificacion');
//MODAL EVALUACION CAPACITACION
Route::post('/empleados_evaluacion/list_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@list_capacitacion')->name('empleados_evaluacion.list_capacitacion');
Route::post('/empleados_evaluacion/create_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@create_capacitacion')->name('empleados_evaluacion.create_capacitacion');
Route::post('/empleados_evaluacion/edit_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@edit_capacitacion')->name('empleados_evaluacion.edit_capacitacion');
Route::post('/empleados_evaluacion/delete_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@delete_capacitacion')->name('empleados_evaluacion.delete_capacitacion');
//RECURSOS TERMINACION ADMINISTRACION
Route::resource('terminacion', TerminacionController::class);
//FIN DE RECURSOS ADMINISTRACIÓN




//RECURSOS VERSIONES A-CALIDAD 
Route::resource('versiones', VersionesController::class);
//RECURSOS REUNIONES A-CALIDAD
Route::resource('reuniones', ReunionesController::class);
//MODAL ASUNTOS REUNIONES A-CALIDAD
Route::post('/reuniones/guardar_reunion', 'App\Http\Controllers\Calidad\ReunionesController@guardar_reunion')->name('reuniones.guardar_reunion');
Route::post('/reuniones/list_asunto', 'App\Http\Controllers\Calidad\ReunionesController@list_asunto')->name('reuniones.list_asunto');
Route::post('/reuniones/create_asunto', 'App\Http\Controllers\Calidad\ReunionesController@create_asunto')->name('reuniones.create_asunto');
Route::post('/reuniones/edit_asunto', 'App\Http\Controllers\Calidad\ReunionesController@edit_asunto')->name('reuniones.edit_asunto');
Route::post('/reuniones/delete_asunto', 'App\Http\Controllers\Calidad\ReunionesController@delete_asunto')->name('reuniones.delete_asunto');
//RECURSOS AUDITORIA A-CALIDAD
Route::resource('auditoria', AuditoriaController::class);
//MODAL EQUIPO AUDITORIA A-CALIDAD
Route::post('/auditoria/guardar_auditoria', 'App\Http\Controllers\Calidad\AuditoriaController@guardar_auditoria')->name('auditoria.guardar_auditoria');
Route::post('/auditoria/list_equipo', 'App\Http\Controllers\Calidad\AuditoriaController@list_equipo')->name('auditoria.list_equipo');
Route::post('/auditoria/create_equipo', 'App\Http\Controllers\Calidad\AuditoriaController@create_equipo')->name('auditoria.create_equipo');
Route::post('/auditoria/edit_equipo', 'App\Http\Controllers\Calidad\AuditoriaController@edit_equipo')->name('auditoria.edit_equipo');
Route::post('/auditoria/delete_equipo', 'App\Http\Controllers\Calidad\AuditoriaController@delete_equipo')->name('auditoria.delete_equipo');
//MODAL REQUISITO AUDITORIA A-CALIDAD
Route::post('/auditoria/list_requisito', 'App\Http\Controllers\Calidad\AuditoriaController@list_requisito')->name('auditoria.list_requisito');
Route::post('/auditoria/create_requisito', 'App\Http\Controllers\Calidad\AuditoriaController@create_requisito')->name('auditoria.create_requisito');
Route::post('/auditoria/edit_requisito', 'App\Http\Controllers\Calidad\AuditoriaController@edit_requisito')->name('auditoria.edit_requisito');
Route::post('/auditoria/delete_requisito', 'App\Http\Controllers\Calidad\AuditoriaController@delete_requisito')->name('auditoria.delete_requisito');
//RECURSOS MEJORA A-CALIDAD 
Route::resource('mejora', MejoraController::class);
//FIN DE RECURSOS CALIDAD




//RECURSOS DIAGNOSTICO B-CAPACITACION 
Route::resource('diagnostico', DiagnosticoController::class);
//MODAL FECHA DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/guardar_diagnostico', 'App\Http\Controllers\Capacitacion\DiagnosticoController@guardar_diagnostico')->name('diagnostico.guardar_diagnostico');
Route::post('/diagnostico/list_fecha', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_fecha')->name('diagnostico.list_fecha');
Route::post('/diagnostico/create_fecha', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_fecha')->name('diagnostico.create_fecha');
Route::post('/diagnostico/edit_fecha', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_fecha')->name('diagnostico.edit_fecha');
Route::post('/diagnostico/delete_fecha', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_fecha')->name('diagnostico.delete_fecha');
//MODAL CONOCIMIENTO DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_conocimiento', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_conocimiento')->name('diagnostico.list_conocimiento');
Route::post('/diagnostico/create_conocimiento', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_conocimiento')->name('diagnostico.create_conocimiento');
Route::post('/diagnostico/edit_conocimiento', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_conocimiento')->name('diagnostico.edit_conocimiento');
Route::post('/diagnostico/delete_conocimiento', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_conocimiento')->name('diagnostico.delete_conocimiento');
//MODAL HABILIDAD DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_habilidad', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_habilidad')->name('diagnostico.list_habilidad');
Route::post('/diagnostico/create_habilidad', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_habilidad')->name('diagnostico.create_habilidad');
Route::post('/diagnostico/edit_habilidad', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_habilidad')->name('diagnostico.edit_habilidad');
Route::post('/diagnostico/delete_habilidad', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_habilidad')->name('diagnostico.delete_habilidad');
//MODAL APTITUD DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_aptitud', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_aptitud')->name('diagnostico.list_aptitud');
Route::post('/diagnostico/create_aptitud', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_aptitud')->name('diagnostico.create_aptitud');
Route::post('/diagnostico/edit_aptitud', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_aptitud')->name('diagnostico.edit_aptitud');
Route::post('/diagnostico/delete_aptitud', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_aptitud')->name('diagnostico.delete_aptitud');
//MODAL CAPACITACION DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_capacitacion', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_capacitacion')->name('diagnostico.list_capacitacion');
Route::post('/diagnostico/create_capacitacion', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_capacitacion')->name('diagnostico.create_capacitacion');
Route::post('/diagnostico/edit_capacitacion', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_capacitacion')->name('diagnostico.edit_capacitacion');
Route::post('/diagnostico/delete_capacitacion', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_capacitacion')->name('diagnostico.delete_capacitacion');
//MODAL AREA DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_area', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_area')->name('diagnostico.list_area');
Route::post('/diagnostico/create_area', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_area')->name('diagnostico.create_area');
Route::post('/diagnostico/edit_area', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_area')->name('diagnostico.edit_area');
Route::post('/diagnostico/delete_area', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_area')->name('diagnostico.delete_area');
//MODAL GRADO DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_grado', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_grado')->name('diagnostico.list_grado');
Route::post('/diagnostico/create_grado', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_grado')->name('diagnostico.create_grado');
Route::post('/diagnostico/edit_grado', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_grado')->name('diagnostico.edit_grado');
Route::post('/diagnostico/delete_grado', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_grado')->name('diagnostico.delete_grado');
//MODAL PROPUESTA DIAGNOSTICO B-CAPACITACION 
Route::post('/diagnostico/list_propuesta', 'App\Http\Controllers\Capacitacion\DiagnosticoController@list_propuesta')->name('diagnostico.list_propuesta');
Route::post('/diagnostico/create_propuesta', 'App\Http\Controllers\Capacitacion\DiagnosticoController@create_propuesta')->name('diagnostico.create_propuesta');
Route::post('/diagnostico/edit_propuesta', 'App\Http\Controllers\Capacitacion\DiagnosticoController@edit_propuesta')->name('diagnostico.edit_propuesta');
Route::post('/diagnostico/delete_propuesta', 'App\Http\Controllers\Capacitacion\DiagnosticoController@delete_propuesta')->name('diagnostico.delete_propuesta');
//RECURSOS PLAN B-CAPACITACION 
Route::resource('plan', PlanController::class);
//RECURSOS CONTENIDOS B-CAPACITACION 
Route::resource('contenidos', ContenidosController::class);
//MODAL MODULO CONTENIDOS B-CAPACITACION
Route::post('/contenidos/cargar_modulos', 'App\Http\Controllers\Capacitacion\ContenidosController@cargar_modulos')->name('contenidos.cargar_modulos');
Route::post('/contenidos/cargar_temas', 'App\Http\Controllers\Capacitacion\ContenidosController@cargar_temas')->name('contenidos.cargar_temas'); 
Route::post('/contenidos/total_modulos', 'App\Http\Controllers\Capacitacion\ContenidosController@total_modulos')->name('contenidos.total_modulos');
Route::post('/contenidos/total_temas', 'App\Http\Controllers\Capacitacion\ContenidosController@total_temas')->name('contenidos.total_temas'); 
Route::post('/contenidos/guardar_contenidos', 'App\Http\Controllers\Capacitacion\ContenidosController@guardar_contenidos')->name('contenidos.guardar_contenidos');
Route::post('/contenidos/list_modulo', 'App\Http\Controllers\Capacitacion\ContenidosController@list_modulo')->name('contenidos.list_modulo');
Route::post('/contenidos/create_modulo', 'App\Http\Controllers\Capacitacion\ContenidosController@create_modulo')->name('contenidos.create_modulo');
Route::post('/contenidos/edit_modulo', 'App\Http\Controllers\Capacitacion\ContenidosController@edit_modulo')->name('contenidos.edit_modulo');
Route::post('/contenidos/delete_modulo', 'App\Http\Controllers\Capacitacion\ContenidosController@delete_modulo')->name('contenidos.delete_modulo');
//MODAL TEMA CONTENIDOS B-CAPACITACION 
Route::post('/contenidos/list_tema', 'App\Http\Controllers\Capacitacion\ContenidosController@list_tema')->name('contenidos.list_tema');
Route::post('/contenidos/create_tema', 'App\Http\Controllers\Capacitacion\ContenidosController@create_tema')->name('contenidos.create_tema');
Route::post('/contenidos/edit_tema', 'App\Http\Controllers\Capacitacion\ContenidosController@edit_tema')->name('contenidos.edit_tema');
Route::post('/contenidos/delete_tema', 'App\Http\Controllers\Capacitacion\ContenidosController@delete_tema')->name('contenidos.delete_tema');
//MODAL ACTIVIDAD CONTENIDOS B-CAPACITACION 
Route::post('/contenidos/list_actividad', 'App\Http\Controllers\Capacitacion\ContenidosController@list_actividad')->name('contenidos.list_actividad');
Route::post('/contenidos/create_actividad', 'App\Http\Controllers\Capacitacion\ContenidosController@create_actividad')->name('contenidos.create_actividad');
Route::post('/contenidos/edit_actividad', 'App\Http\Controllers\Capacitacion\ContenidosController@edit_actividad')->name('contenidos.edit_actividad');
Route::post('/contenidos/delete_actividad', 'App\Http\Controllers\Capacitacion\ContenidosController@delete_actividad')->name('contenidos.delete_actividad');
//MODAL EVALUACION CONTENIDOS B-CAPACITACION 
Route::post('/contenidos/list_evaluacion', 'App\Http\Controllers\Capacitacion\ContenidosController@list_evaluacion')->name('contenidos.list_evaluacion');
Route::post('/contenidos/create_evaluacion', 'App\Http\Controllers\Capacitacion\ContenidosController@create_evaluacion')->name('contenidos.create_evaluacion');
Route::post('/contenidos/edit_evaluacion', 'App\Http\Controllers\Capacitacion\ContenidosController@edit_evaluacion')->name('contenidos.edit_evaluacion');
Route::post('/contenidos/delete_evaluacion', 'App\Http\Controllers\Capacitacion\ContenidosController@delete_evaluacion')->name('contenidos.delete_evaluacion');
//MODAL RECURSO CONTENIDOS B-CAPACITACION 
Route::post('/contenidos/list_recurso', 'App\Http\Controllers\Capacitacion\ContenidosController@list_recurso')->name('contenidos.list_recurso');
Route::post('/contenidos/create_recurso', 'App\Http\Controllers\Capacitacion\ContenidosController@create_recurso')->name('contenidos.create_recurso');
Route::post('/contenidos/edit_recurso', 'App\Http\Controllers\Capacitacion\ContenidosController@edit_recurso')->name('contenidos.edit_recurso');
Route::post('/contenidos/delete_recurso', 'App\Http\Controllers\Capacitacion\ContenidosController@delete_recurso')->name('contenidos.delete_recurso');
//RECURSOS INTERVENCION B-CAPACITACION 
Route::resource('intervencion', IntervencionController::class);
//MODAL PARTICIPANTES INTERVENCION B-CAPACITACION
Route::post('/intervencion/guardar_intervencion', 'App\Http\Controllers\Capacitacion\IntervencionController@guardar_intervencion')->name('intervencion.guardar_intervencion');
Route::post('/intervencion/participante_intervencion', 'App\Http\Controllers\Capacitacion\IntervencionController@participante_intervencion')->name('intervencion.participante_intervencion');
Route::post('/intervencion/list_participante', 'App\Http\Controllers\Capacitacion\IntervencionController@list_participante')->name('intervencion.list_participante');
Route::post('/intervencion/create_participante', 'App\Http\Controllers\Capacitacion\IntervencionController@create_participante')->name('intervencion.create_participante');
Route::post('/intervencion/edit_participante', 'App\Http\Controllers\Capacitacion\IntervencionController@edit_participante')->name('intervencion.edit_participante');
Route::post('/intervencion/delete_participante', 'App\Http\Controllers\Capacitacion\IntervencionController@delete_participante')->name('intervencion.delete_participante');
//RECURSOS EVALUACION B-CAPACITACION 
Route::resource('evaluacion_capacitacion', EvaluacionCapController::class);
//MODAL ELEMENTO EVALUACION B-CAPACITACION
Route::post('/evaluacion_capacitacion/guardar_evaluacion_cap', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@guardar_evaluacion_cap')->name('evaluacion_capacitacion.guardar_evaluacion_cap');
Route::post('/evaluacion_capacitacion/numero_constancia', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@numero_constancia')->name('evaluacion_capacitacion.numero_constancia');
Route::post('/evaluacion_capacitacion/list_elemento', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@list_elemento')->name('evaluacion_capacitacion.list_elemento');
Route::post('/evaluacion_capacitacion/create_elemento', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@create_elemento')->name('evaluacion_capacitacion.create_elemento');
Route::post('/evaluacion_capacitacion/edit_elemento', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@edit_elemento')->name('evaluacion_capacitacion.edit_elemento');
Route::post('/evaluacion_capacitacion/delete_elemento', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@delete_elemento')->name('evaluacion_capacitacion.delete_elemento');
//MODAL CONSTANCIA EVALUACION B-CAPACITACION
Route::post('/evaluacion_capacitacion/list_constancia', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@list_constancia')->name('evaluacion_capacitacion.list_constancia');
Route::post('/evaluacion_capacitacion/create_constancia', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@create_constancia')->name('evaluacion_capacitacion.create_constancia');
Route::post('/evaluacion_capacitacion/edit_constancia', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@edit_constancia')->name('evaluacion_capacitacion.edit_constancia');
Route::post('/evaluacion_capacitacion/delete_constancia', 'App\Http\Controllers\Capacitacion\EvaluacionCapController@delete_constancia')->name('evaluacion_capacitacion.delete_constancia');
//FIN DE CAPACITACION




//RECURSOS PREVENCION C-SEGURIDAD
Route::resource('prevencion', PrevencionController::class);
//MODAL COMISION PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_comision', 'App\Http\Controllers\Seguridad\PrevencionController@list_comision')->name('prevencion.list_comision');
Route::post('/prevencion/create_comision', 'App\Http\Controllers\Seguridad\PrevencionController@create_comision')->name('prevencion.create_comision');
Route::post('/prevencion/edit_comision', 'App\Http\Controllers\Seguridad\PrevencionController@edit_comision')->name('prevencion.edit_comision');
Route::post('/prevencion/delete_comision', 'App\Http\Controllers\Seguridad\PrevencionController@delete_comision')->name('prevencion.delete_comision');
//MODAL REUNIONES COMISION PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_reunion', 'App\Http\Controllers\Seguridad\PrevencionController@list_reunion')->name('prevencion.list_reunion');
Route::post('/prevencion/create_reunion', 'App\Http\Controllers\Seguridad\PrevencionController@create_reunion')->name('prevencion.create_reunion');
Route::post('/prevencion/edit_reunion', 'App\Http\Controllers\Seguridad\PrevencionController@edit_reunion')->name('prevencion.edit_reunion');
Route::post('/prevencion/delete_reunion', 'App\Http\Controllers\Seguridad\PrevencionController@delete_reunion')->name('prevencion.delete_reunion');
//MODAL PLAN PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_plan', 'App\Http\Controllers\Seguridad\PrevencionController@list_plan')->name('prevencion.list_plan');
Route::post('/prevencion/create_plan', 'App\Http\Controllers\Seguridad\PrevencionController@create_plan')->name('prevencion.create_plan');
Route::post('/prevencion/edit_plan', 'App\Http\Controllers\Seguridad\PrevencionController@edit_plan')->name('prevencion.edit_plan');
Route::post('/prevencion/delete_plan', 'App\Http\Controllers\Seguridad\PrevencionController@delete_plan')->name('prevencion.delete_plan');
//MODAL REVISION PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_revision', 'App\Http\Controllers\Seguridad\PrevencionController@list_revision')->name('prevencion.list_revision');
Route::post('/prevencion/create_revision', 'App\Http\Controllers\Seguridad\PrevencionController@create_revision')->name('prevencion.create_revision');
Route::post('/prevencion/edit_revision', 'App\Http\Controllers\Seguridad\PrevencionController@edit_revision')->name('prevencion.edit_revision');
Route::post('/prevencion/delete_revision', 'App\Http\Controllers\Seguridad\PrevencionController@delete_revision')->name('prevencion.delete_revision');
//MODAL BITACORA PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_bitacora', 'App\Http\Controllers\Seguridad\PrevencionController@list_bitacora')->name('prevencion.list_bitacora');
Route::post('/prevencion/create_bitacora', 'App\Http\Controllers\Seguridad\PrevencionController@create_bitacora')->name('prevencion.create_bitacora');
Route::post('/prevencion/edit_bitacora', 'App\Http\Controllers\Seguridad\PrevencionController@edit_bitacora')->name('prevencion.edit_bitacora');
Route::post('/prevencion/delete_bitacora', 'App\Http\Controllers\Seguridad\PrevencionController@delete_bitacora')->name('prevencion.delete_bitacora');
//MODAL BITACORA SIMULACROS PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_simulacro', 'App\Http\Controllers\Seguridad\PrevencionController@list_simulacro')->name('prevencion.list_simulacro');
Route::post('/prevencion/create_simulacro', 'App\Http\Controllers\Seguridad\PrevencionController@create_simulacro')->name('prevencion.create_simulacro');
Route::post('/prevencion/edit_simulacro', 'App\Http\Controllers\Seguridad\PrevencionController@edit_simulacro')->name('prevencion.edit_simulacro');
Route::post('/prevencion/delete_simulacro', 'App\Http\Controllers\Seguridad\PrevencionController@delete_simulacro')->name('prevencion.delete_simulacro');
//MODAL VISITAS PREVENCION C-SEGURIDAD
Route::post('/prevencion/list_visita', 'App\Http\Controllers\Seguridad\PrevencionController@list_visita')->name('prevencion.list_visita');
Route::post('/prevencion/create_visita', 'App\Http\Controllers\Seguridad\PrevencionController@create_visita')->name('prevencion.create_visita');
Route::post('/prevencion/edit_visita', 'App\Http\Controllers\Seguridad\PrevencionController@edit_visita')->name('prevencion.edit_visita');
Route::post('/prevencion/delete_visita', 'App\Http\Controllers\Seguridad\PrevencionController@delete_visita')->name('prevencion.delete_visita');
//RECURSOS ATENCION C-SEGURIDAD
Route::resource('atencion', AtencionController::class);
//MODAL MODALS ATENCION C-SEGURIDAD
Route::post('/atencion/list_atencion', 'App\Http\Controllers\Seguridad\AtencionController@list_atencion')->name('atencion.list_atencion');
Route::post('/atencion/create_atencion', 'App\Http\Controllers\Seguridad\AtencionController@create_atencion')->name('atencion.create_atencion');
Route::post('/atencion/edit_atencion', 'App\Http\Controllers\Seguridad\AtencionController@edit_atencion')->name('atencion.edit_atencion');
Route::post('/atencion/delete_atencion', 'App\Http\Controllers\Seguridad\AtencionController@delete_atencion')->name('atencion.delete_atencion');
//RECURSOS RECUPERACION C-SEGURIDAD
Route::resource('recuperacion', RecuperacionController::class);
//MODAL MODALS RECUPERACION C-SEGURIDAD
Route::post('/recuperacion/list_recuperacion', 'App\Http\Controllers\Seguridad\RecuperacionController@list_recuperacion')->name('recuperacion.list_recuperacion');
Route::post('/recuperacion/create_recuperacion', 'App\Http\Controllers\Seguridad\RecuperacionController@create_recuperacion')->name('recuperacion.create_recuperacion');
Route::post('/recuperacion/edit_recuperacion', 'App\Http\Controllers\Seguridad\RecuperacionController@edit_recuperacion')->name('recuperacion.edit_recuperacion');
Route::post('/recuperacion/delete_recuperacion', 'App\Http\Controllers\Seguridad\RecuperacionController@delete_recuperacion')->name('recuperacion.delete_recuperacion');
//FIN DE RECURSOS SEGURIDAD




//RECURSOS D-RESPONSABILIDAD
Route::resource('responsabilidad_social', ResponsabilidadController::class);
//MODAL ACCIONES D-RESPONSABILIDAD
Route::post('/responsabilidad_social/guardar_responsabilidad', 'App\Http\Controllers\Responsabilidad\ResponsabilidadController@guardar_responsabilidad')->name('responsabilidad_social.guardar_responsabilidad');
Route::post('/responsabilidad_social/list_acciones', 'App\Http\Controllers\Responsabilidad\ResponsabilidadController@list_acciones')->name('responsabilidad_social.list_acciones');
Route::post('/responsabilidad_social/create_acciones', 'App\Http\Controllers\Responsabilidad\ResponsabilidadController@create_acciones')->name('responsabilidad_social.create_acciones');
Route::post('/responsabilidad_social/edit_acciones', 'App\Http\Controllers\Responsabilidad\ResponsabilidadController@edit_acciones')->name('responsabilidad_social.edit_acciones');
Route::post('/responsabilidad_social/delete_acciones', 'App\Http\Controllers\Responsabilidad\ResponsabilidadController@delete_acciones')->name('responsabilidad_social.delete_acciones');
//FIN DE RECURSOS RESPONSABILIDAD




//RECURSOS E-INTEGRIDAD
Route::resource('denuncia', IntegridadController::class);
//MODAL INDAGACION E-INTEGRIDAD
Route::post('/denuncia/guardar_integridad', 'App\Http\Controllers\Integridad\IntegridadController@guardar_integridad')->name('denuncia.guardar_integridad');
Route::post('/denuncia/list_indagacion', 'App\Http\Controllers\Integridad\IntegridadController@list_indagacion')->name('denuncia.list_indagacion');
Route::post('/denuncia/create_indagacion', 'App\Http\Controllers\Integridad\IntegridadController@create_indagacion')->name('denuncia.create_indagacion');
Route::post('/denuncia/edit_indagacion', 'App\Http\Controllers\Integridad\IntegridadController@edit_indagacion')->name('denuncia.edit_indagacion');
Route::post('/denuncia/delete_indagacion', 'App\Http\Controllers\Integridad\IntegridadController@delete_indagacion')->name('denuncia.delete_indagacion');
//FIN DE RECURSOS INTEGRIDAD




//RECURSOS GANADO REXBIOT 
Route::resource('ganado', GanadoController::class);
//MODAL VACUNA REXBIOT
Route::post('/ganado/create_manejos', 'App\Http\Controllers\Rexbiot\GanadoController@create_manejos')->name('ganado.create_manejos');
Route::post('/ganado/guardar_ganado', 'App\Http\Controllers\Rexbiot\GanadoController@guardar_ganado')->name('ganado.guardar_ganado');
Route::post('/ganado/list_vacuna', 'App\Http\Controllers\Rexbiot\GanadoController@list_vacuna')->name('ganado.list_vacuna');
Route::post('/ganado/create_vacuna', 'App\Http\Controllers\Rexbiot\GanadoController@create_vacuna')->name('ganado.create_vacuna');
Route::post('/ganado/edit_vacuna', 'App\Http\Controllers\Rexbiot\GanadoController@edit_vacuna')->name('ganado.edit_vacuna');
Route::post('/ganado/delete_vacuna', 'App\Http\Controllers\Rexbiot\GanadoController@delete_vacuna')->name('ganado.delete_vacuna');
//MODAL MANEJO1 REXBIOT
Route::post('/ganado/list_manejo1', 'App\Http\Controllers\Rexbiot\GanadoController@list_manejo1')->name('ganado.list_manejo1');
Route::post('/ganado/create_manejo1', 'App\Http\Controllers\Rexbiot\GanadoController@create_manejo1')->name('ganado.create_manejo1');
Route::post('/ganado/edit_manejo1', 'App\Http\Controllers\Rexbiot\GanadoController@edit_manejo1')->name('ganado.edit_manejo1');
Route::post('/ganado/delete_manejo1', 'App\Http\Controllers\Rexbiot\GanadoController@delete_manejo1')->name('ganado.delete_manejo1');
//MODAL MANEJO2 REXBIOT
Route::post('/ganado/list_manejo2', 'App\Http\Controllers\Rexbiot\GanadoController@list_manejo2')->name('ganado.list_manejo2');
Route::post('/ganado/create_manejo2', 'App\Http\Controllers\Rexbiot\GanadoController@create_manejo2')->name('ganado.create_manejo2');
Route::post('/ganado/edit_manejo2', 'App\Http\Controllers\Rexbiot\GanadoController@edit_manejo2')->name('ganado.edit_manejo2');
Route::post('/ganado/delete_manejo2', 'App\Http\Controllers\Rexbiot\GanadoController@delete_manejo2')->name('ganado.delete_manejo2');
//RECURSOS POTREROS REXBIOT
Route::resource('potreros', PotreroController::class);
//MODAL PERIODO REXBIOT 
Route::post('/potreros/list_periodo', 'App\Http\Controllers\Rexbiot\PotreroController@list_periodo')->name('potreros.list_periodo');
Route::post('/potreros/create_periodo', 'App\Http\Controllers\Rexbiot\PotreroController@create_periodo')->name('potreros.create_periodo');
Route::post('/potreros/edit_periodo', 'App\Http\Controllers\Rexbiot\PotreroController@edit_periodo')->name('potreros.edit_periodo');
Route::post('/potreros/delete_periodo', 'App\Http\Controllers\Rexbiot\PotreroController@delete_periodo')->name('potreros.delete_periodo');
//MODAL POTRERO REXBIOT
Route::post('/potreros/list_potrero', 'App\Http\Controllers\Rexbiot\PotreroController@list_potrero')->name('potreros.list_potrero');
Route::post('/potreros/create_potrero', 'App\Http\Controllers\Rexbiot\PotreroController@create_potrero')->name('potreros.create_potrero');
Route::post('/potreros/edit_potrero', 'App\Http\Controllers\Rexbiot\PotreroController@edit_potrero')->name('potreros.edit_potrero');
Route::post('/potreros/delete_potrero', 'App\Http\Controllers\Rexbiot\PotreroController@delete_potrero')->name('potreros.delete_potrero');
//RECURSOS PASTOREO REXBIOT
Route::resource('pastoreo', PastoreoController::class);
//MODAL PASTOREOS REXBIOT 
Route::post('/pastoreo/list_pastoreo', 'App\Http\Controllers\Rexbiot\PastoreoController@list_pastoreo')->name('pastoreo.list_pastoreo');
Route::post('/pastoreo/create_pastoreo', 'App\Http\Controllers\Rexbiot\PastoreoController@create_pastoreo')->name('pastoreo.create_pastoreo');
Route::post('/pastoreo/edit_pastoreo', 'App\Http\Controllers\Rexbiot\PastoreoController@edit_pastoreo')->name('pastoreo.edit_pastoreo');
Route::post('/pastoreo/delete_pastoreo', 'App\Http\Controllers\Rexbiot\PastoreoController@delete_pastoreo')->name('pastoreo.delete_pastoreo');
//RECURSOS INSTALACIONES REXBIOT
Route::resource('instalaciones', InstalacionesController::class);
//MODAL INSTALACION REXBIOT 
Route::post('/instalaciones/list_instalacion', 'App\Http\Controllers\Rexbiot\InstalacionesController@list_instalacion')->name('instalaciones.list_instalacion');
Route::post('/instalaciones/create_instalacion', 'App\Http\Controllers\Rexbiot\InstalacionesController@create_instalacion')->name('instalaciones.create_instalacion');
Route::post('/instalaciones/edit_instalacion', 'App\Http\Controllers\Rexbiot\InstalacionesController@edit_instalacion')->name('instalaciones.edit_instalacion');
Route::post('/instalaciones/delete_instalacion', 'App\Http\Controllers\Rexbiot\InstalacionesController@delete_instalacion')->name('instalaciones.delete_instalacion');
//MODAL MANTENIMIENTO REXBIOT
Route::post('/instalaciones/list_mantenimiento', 'App\Http\Controllers\Rexbiot\InstalacionesController@list_mantenimiento')->name('instalaciones.list_mantenimiento');
Route::post('/instalaciones/create_mantenimiento', 'App\Http\Controllers\Rexbiot\InstalacionesController@create_mantenimiento')->name('instalaciones.create_mantenimiento');
Route::post('/instalaciones/edit_mantenimiento', 'App\Http\Controllers\Rexbiot\InstalacionesController@edit_mantenimiento')->name('instalaciones.edit_mantenimiento');
Route::post('/instalaciones/delete_mantenimiento', 'App\Http\Controllers\Rexbiot\InstalacionesController@delete_mantenimiento')->name('instalaciones.delete_mantenimiento');
//RECURSOS ESTADISTICAS REXBIOT
Route::resource('estadisticas', EstadisticasController::class);
Route::post('/estadisticas/graficas', 'App\Http\Controllers\Rexbiot\EstadisticasController@graficas')->name('estadisticas.graficas');
//FIN DE REXBIOT




//RECURSOS MIEMBROS DEL COMITE DE ETICA
Route::resource('denuncia_comite', DenunciaMCEController::class);
Route::resource('aviso_de_privacidad_comite', AvisoPrivacidadMCEController::class);
Route::resource('codigo_de_etica_comite', CodigoEticaMCEController::class);
Route::resource('politica_de_integridad_comite', PIntegridadMCEController::class);
Route::resource('revision_comite', RevisionMCEController::class);
Route::resource('publicidad_comite', PublicidadMCEController::class);
Route::resource('derechos_de_los_pacientes_comite', DerechosMCEController::class);
Route::resource('politica_de_proteccion_comite', PProteccionMCEController::class);
Route::resource('politica_atencion_a_denuncias', PDenunciaMCEController::class);
Route::resource('politica_atencion_medica_comite', PMedicaMCEController::class);
Route::resource('politica_del_expediente_comite', PExpedienteMCEController::class);
Route::resource('politica_de_comunicacion_comite', PComunicacionMCEController::class);
Route::resource('instructivo_investigador_comite', InstructivoMCEController::class);
Route::resource('derechos_de_los_sujetos_comite', DSujetosMCEController::class);
Route::resource('privacidad_para_sujetos_comite', PSujetosMCEController::class);
Route::resource('revisiones_comite', RevisionesMCEController::class);
Route::resource('informe_trimestral_comite', TrimestralMCEController::class);
Route::resource('informe_anual_uis', AnualMCEController::class);
Route::resource('auditorias_comite', AuditoriasMCEController::class);
Route::resource('induccion_a_uis_comite', InduccionMCEController::class);
Route::resource('investigacion_clinica_comite', InvestigacionMCEController::class);
Route::resource('estudios_clinicos_comite', EstudiosMCEController::class);
Route::resource('comite_de_etica_comite', CEMCEController::class);
Route::resource('quis_comite_de_etica_comite', QUISMCEController::class);
Route::resource('sometimientos_comite', SometimientosMCEController::class);
Route::post('/informe_trimestral_comite/list_informes', 'App\Http\Controllers\MCE\TrimestralMCEController@list_informes')->name('informe_trimestral_comite.list_informes');
Route::post('/informe_trimestral_comite/guardar_users', 'App\Http\Controllers\MCE\TrimestralMCEController@guardar_users')->name('informe_trimestral_comite.guardar_users');
Route::post('/informe_trimestral_comite/cargar_users', 'App\Http\Controllers\MCE\TrimestralMCEController@cargar_users')->name('informe_trimestral_comite.cargar_users');
Route::post('/revisiones_comite/create_presentacion', 'App\Http\Controllers\MCE\RevisionesMCEController@create_presentacion')->name('revisiones_comite.create_presentacion');
Route::post('/revisiones_comite/delete_presentacion', 'App\Http\Controllers\MCE\RevisionesMCEController@delete_presentacion')->name('revisiones_comite.delete_presentacion');
Route::post('/revisiones_comite/create_protocolo', 'App\Http\Controllers\MCE\RevisionesMCEController@create_protocolo')->name('revisiones_comite.create_protocolo');
Route::post('/revisiones_comite/delete_protocolo', 'App\Http\Controllers\MCE\RevisionesMCEController@delete_protocolo')->name('revisiones_comite.delete_protocolo');
Route::post('/revisiones_comite/create_icf', 'App\Http\Controllers\MCE\RevisionesMCEController@create_icf')->name('revisiones_comite.create_icf');
Route::post('/revisiones_comite/delete_icf', 'App\Http\Controllers\MCE\RevisionesMCEController@delete_icf')->name('revisiones_comite.delete_icf');
Route::post('/revisiones_comite/create_animales', 'App\Http\Controllers\MCE\RevisionesMCEController@create_animales')->name('revisiones_comite.create_animales');
Route::post('/revisiones_comite/delete_animales', 'App\Http\Controllers\MCE\RevisionesMCEController@delete_animales')->name('revisiones_comite.delete_animales');
Route::post('/revisiones_comite/create_poliza', 'App\Http\Controllers\MCE\RevisionesMCEController@create_poliza')->name('revisiones_comite.create_poliza');
Route::post('/revisiones_comite/create_material', 'App\Http\Controllers\MCE\RevisionesMCEController@create_material')->name('revisiones_comite.create_material');
Route::post('/revisiones_comite/cargar_protocolo', 'App\Http\Controllers\MCE\RevisionesMCEController@cargar_protocolo')->name('revisiones_comite.cargar_protocolo');
Route::post('/revisiones_comite/cargar_icf', 'App\Http\Controllers\MCE\RevisionesMCEController@cargar_icf')->name('revisiones_comite.cargar_icf');
Route::post('/revisiones_comite/cargar_animales', 'App\Http\Controllers\MCE\RevisionesMCEController@cargar_animales')->name('revisiones_comite.cargar_animales');
Route::post('/revisiones_comite/guardar_protocolo', 'App\Http\Controllers\MCE\RevisionesMCEController@guardar_protocolo')->name('revisiones_comite.guardar_protocolo');
Route::post('/revisiones_comite/edit_protocolo', 'App\Http\Controllers\MCE\RevisionesMCEController@edit_protocolo')->name('revisiones_comite.edit_protocolo');
Route::post('/revisiones_comite/guardar_icf', 'App\Http\Controllers\MCE\RevisionesMCEController@guardar_icf')->name('revisiones_comite.guardar_icf');
Route::post('/revisiones_comite/edit_icf', 'App\Http\Controllers\MCE\RevisionesMCEController@edit_icf')->name('revisiones_comite.edit_icf');
Route::post('/revisiones_comite/guardar_animales', 'App\Http\Controllers\MCE\RevisionesMCEController@guardar_animales')->name('revisiones_comite.guardar_animales');
Route::post('/revisiones_comite/edit_animales', 'App\Http\Controllers\MCE\RevisionesMCEController@edit_animales')->name('revisiones_comite.edit_animales');
Route::post('/sometimientos_comite/create_somenviados', 'App\Http\Controllers\MCE\SometimientosMCEController@create_somenviados')->name('sometimientos_comite.create_somenviados');
Route::post('/sometimientos_comite/delete_somenviados', 'App\Http\Controllers\MCE\SometimientosMCEController@delete_somenviados')->name('sometimientos_comite.delete_somenviados');
Route::post('/sometimientos_comite/delete_somrecibidos', 'App\Http\Controllers\MCE\SometimientosMCEController@delete_somrecibidos')->name('sometimientos_comite.delete_somrecibidos');
Route::post('/sometimientos_comite/list_enviados', 'App\Http\Controllers\MCE\SometimientosMCEController@list_enviados')->name('sometimientos_comite.list_enviados');
Route::post('/sometimientos_comite/list_recibidos', 'App\Http\Controllers\MCE\SometimientosMCEController@list_recibidos')->name('sometimientos_comite.list_recibidos');
Route::post('/auditorias_comite/delete_auditorias', 'App\Http\Controllers\MCE\AuditoriasMCEController@delete_auditorias')->name('auditorias_comite.delete_auditorias');
Route::post('/auditorias_comite/delete_dictamen', 'App\Http\Controllers\MCE\AuditoriasMCEController@delete_dictamen')->name('auditorias_comite.delete_dictamen');
Route::post('/auditorias_comite/create_dictamen', 'App\Http\Controllers\MCE\AuditoriasMCEController@create_dictamen')->name('auditorias_comite.create_dictamen');
//FIN DE RECURSOS MIEMBROS DEL COMITE DE ETICA