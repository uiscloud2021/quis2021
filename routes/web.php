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
//DOCUMENTOS
use App\Http\Controllers\DocumentosController;


//SITIO CLINICO
//FACTIBILIDAD SC
use App\Http\Controllers\SitioClinico\FactibilidadController;
//SOMETIMIENTO SC
use App\Http\Controllers\SitioClinico\SometimientoController;
//INSTALACION SC
use App\Http\Controllers\SitioClinico\InstalacionController;
//EQUIPAMIENTO SC
use App\Http\Controllers\SitioClinico\EquipamientoController;
//CARPETA FARMACIA SC
use App\Http\Controllers\SitioClinico\CarpetaController;


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

Route::post('/dashboard/store', 'App\Http\Controllers\dashcontroller@store')->name('dashboard.store');
Route::post('/dashboard/get_empresa', 'App\Http\Controllers\DashController@get_empresa')->name('dashboard.get_empresa');

Route::get('/dashboard', 'App\Http\Controllers\DashController@index')->name('dashboard');

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

//RECURSOS PROYECTOS
Route::resource('proyectos', ProyectoController::class);
Route::post('/proyectos/cargar_investigador', 'App\Http\Controllers\Administracion\ProyectoController@cargar_investigador')->name('proyectos.cargar_investigador');
//RECURSOS INVENTARIO
Route::resource('inventario', InventarioController::class);
//RECURSOS DOCUMENTOS
Route::resource('documentos', DocumentosController::class);
//Documentos_formatos_Select
Route::post('/documentos/list_formatos', 'App\Http\Controllers\DocumentosController@list_formatos')->name('documentos.list_formatos');
Route::post('/documentos/create_formato', 'App\Http\Controllers\DocumentosController@create_formato')->name('documentos.create_formato');
Route::post('/documentos/delete_formato', 'App\Http\Controllers\DocumentosController@delete_formato')->name('documentos.delete_formato');
Route::post('/documentos/edit_formato', 'App\Http\Controllers\DocumentosController@edit_formato')->name('documentos.edit_formato');
Route::post('/documentos/download_formato', 'App\Http\Controllers\DocumentosController@download_formato')->name('documentos.download_formato');
Route::post('/documentos/list_proyectos', 'App\Http\Controllers\DocumentosController@list_proyectos')->name('documentos.list_proyectos');
// Prueba generar pdf
Route::get('sc/documentos/pdf/{id}', [DocumentosController::class,'pdf'])->name('documentos.pdf');
// Route::get('sc/documentos/pdf/{idFormato}/{idProyecto}', [DocumentosController::class, 'pdf'])->name('documentos.pdf');
// Descargar documento
Route::get('sc/documentos/descargar/pdf/{ruta}', [DocumentosController::class, 'download'])->name('documentos.download');

//RECURSOS FACTIBILIDAD SC
Route::resource('factibilidad', FactibilidadController::class);
//MODAL SEGUIMIENTO FACTIBILIDAD
Route::post('/factibilidad/guardar_factibilidad', 'App\Http\Controllers\SitioClinico\FactibilidadController@guardar_factibilidad')->name('factibilidad.guardar_factibilidad');
Route::post('/factibilidad/list_seguimiento', 'App\Http\Controllers\SitioClinico\FactibilidadController@list_seguimiento')->name('factibilidad.list_seguimiento');
Route::post('/factibilidad/create_seguimiento', 'App\Http\Controllers\SitioClinico\FactibilidadController@create_seguimiento')->name('factibilidad.create_seguimiento');
Route::post('/factibilidad/edit_seguimiento', 'App\Http\Controllers\SitioClinico\FactibilidadController@edit_seguimiento')->name('factibilidad.edit_seguimiento');
Route::post('/factibilidad/delete_seguimiento', 'App\Http\Controllers\SitioClinico\FactibilidadController@delete_seguimiento')->name('factibilidad.delete_seguimiento');

//RECURSOS SOMETIMIENTO SC
Route::resource('sometimiento', SometimientoController::class);
//MODAL EQUIPO SOMETIMIENTO
Route::post('/sometimiento/guardar_sometimiento', 'App\Http\Controllers\SitioClinico\SometimientoController@guardar_sometimiento')->name('sometimiento.guardar_sometimiento');
Route::post('/sometimiento/list_equipo', 'App\Http\Controllers\SitioClinico\SometimientoController@list_equipo')->name('sometimiento.list_equipo');
Route::post('/sometimiento/create_equipo', 'App\Http\Controllers\SitioClinico\SometimientoController@create_equipo')->name('sometimiento.create_equipo');
Route::post('/sometimiento/edit_equipo', 'App\Http\Controllers\SitioClinico\SometimientoController@edit_equipo')->name('sometimiento.edit_equipo');
Route::post('/sometimiento/delete_equipo', 'App\Http\Controllers\SitioClinico\SometimientoController@delete_equipo')->name('sometimiento.delete_equipo');
//MODAL SOMETIMIENTO SOMETIMIENTO
Route::post('/sometimiento/list_som', 'App\Http\Controllers\SitioClinico\SometimientoController@list_som')->name('sometimiento.list_som');
Route::post('/sometimiento/create_som', 'App\Http\Controllers\SitioClinico\SometimientoController@create_som')->name('sometimiento.create_som');
Route::post('/sometimiento/edit_som', 'App\Http\Controllers\SitioClinico\SometimientoController@edit_som')->name('sometimiento.edit_som');
Route::post('/sometimiento/delete_som', 'App\Http\Controllers\SitioClinico\SometimientoController@delete_som')->name('sometimiento.delete_som');
//MODAL RESPUESTA SOMETIMIENTO
Route::post('/sometimiento/list_respuesta', 'App\Http\Controllers\SitioClinico\SometimientoController@list_respuesta')->name('sometimiento.list_respuesta');
Route::post('/sometimiento/create_respuesta', 'App\Http\Controllers\SitioClinico\SometimientoController@create_respuesta')->name('sometimiento.create_respuesta');
Route::post('/sometimiento/edit_respuesta', 'App\Http\Controllers\SitioClinico\SometimientoController@edit_respuesta')->name('sometimiento.edit_respuesta');
Route::post('/sometimiento/delete_respuesta', 'App\Http\Controllers\SitioClinico\SometimientoController@delete_respuesta')->name('sometimiento.delete_respuesta');

//RECURSOS INSTALACION SC
Route::resource('instalacion', InstalacionController::class);
//MODAL INSTALACION
Route::post('/instalacion/list_instalacion', 'App\Http\Controllers\SitioClinico\InstalacionController@list_instalacion')->name('instalacion.list_instalacion');
Route::post('/instalacion/create_instalacion', 'App\Http\Controllers\SitioClinico\InstalacionController@create_instalacion')->name('instalacion.create_instalacion');
Route::post('/instalacion/edit_instalacion', 'App\Http\Controllers\SitioClinico\InstalacionController@edit_instalacion')->name('instalacion.edit_instalacion');
Route::post('/instalacion/delete_instalacion', 'App\Http\Controllers\SitioClinico\InstalacionController@delete_instalacion')->name('instalacion.delete_instalacion');

//RECURSOS EQUIPAMIENTO SC
Route::resource('equipamiento', EquipamientoController::class);
//MODAL EQUIPAMIENTO
Route::post('/equipamiento/list_equipamiento', 'App\Http\Controllers\SitioClinico\EquipamientoController@list_equipamiento')->name('equipamiento.list_equipamiento');
Route::post('/equipamiento/create_equipamiento', 'App\Http\Controllers\SitioClinico\EquipamientoController@create_equipamiento')->name('equipamiento.create_equipamiento');
Route::post('/equipamiento/edit_equipamiento', 'App\Http\Controllers\SitioClinico\EquipamientoController@edit_equipamiento')->name('equipamiento.edit_equipamiento');
Route::post('/equipamiento/delete_equipamiento', 'App\Http\Controllers\SitioClinico\EquipamientoController@delete_equipamiento')->name('equipamiento.delete_equipamiento');

//RECURSOS CARPETA FARMACIA SC
Route::resource('carpeta', CarpetaController::class);
//MODAL FARMACISTA CARPETA FARMACIA
Route::post('/carpeta/guardar_carpeta', 'App\Http\Controllers\SitioClinico\CarpetaController@guardar_carpeta')->name('carpeta.guardar_carpeta');
Route::post('/carpeta/list_farmacista', 'App\Http\Controllers\SitioClinico\CarpetaController@list_farmacista')->name('carpeta.list_farmacista');
Route::post('/carpeta/create_farmacista', 'App\Http\Controllers\SitioClinico\CarpetaController@create_farmacista')->name('carpeta.create_farmacista');
Route::post('/carpeta/edit_farmacista', 'App\Http\Controllers\SitioClinico\CarpetaController@edit_farmacista')->name('carpeta.edit_farmacista');
Route::post('/carpeta/delete_farmacista', 'App\Http\Controllers\SitioClinico\CarpetaController@delete_farmacista')->name('carpeta.delete_farmacista');
//MODAL CONTROL CARPETA FARMACIA
Route::post('/carpeta/list_control', 'App\Http\Controllers\SitioClinico\CarpetaController@list_control')->name('carpeta.list_control');
Route::post('/carpeta/create_control', 'App\Http\Controllers\SitioClinico\CarpetaController@create_control')->name('carpeta.create_control');
Route::post('/carpeta/edit_control', 'App\Http\Controllers\SitioClinico\CarpetaController@edit_control')->name('carpeta.edit_control');
Route::post('/carpeta/delete_control', 'App\Http\Controllers\SitioClinico\CarpetaController@delete_control')->name('carpeta.delete_control');
//MODAL TRAMITE CARPETA FARMACIA
Route::post('/carpeta/list_tramite', 'App\Http\Controllers\SitioClinico\CarpetaController@list_tramite')->name('carpeta.list_tramite');
Route::post('/carpeta/create_tramite', 'App\Http\Controllers\SitioClinico\CarpetaController@create_tramite')->name('carpeta.create_tramite');
Route::post('/carpeta/edit_tramite', 'App\Http\Controllers\SitioClinico\CarpetaController@edit_tramite')->name('carpeta.edit_tramite');
Route::post('/carpeta/delete_tramite', 'App\Http\Controllers\SitioClinico\CarpetaController@delete_tramite')->name('carpeta.delete_tramite');
//MODAL VERIFICACION CARPETA FARMACIA
Route::post('/carpeta/list_verificacion', 'App\Http\Controllers\SitioClinico\CarpetaController@list_verificacion')->name('carpeta.list_verificacion');
Route::post('/carpeta/create_verificacion', 'App\Http\Controllers\SitioClinico\CarpetaController@create_verificacion')->name('carpeta.create_verificacion');
Route::post('/carpeta/edit_verificacion', 'App\Http\Controllers\SitioClinico\CarpetaController@edit_verificacion')->name('carpeta.edit_verificacion');
Route::post('/carpeta/delete_verificacion', 'App\Http\Controllers\SitioClinico\CarpetaController@delete_verificacion')->name('carpeta.delete_verificacion');




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
Route::resource('evaluacion', EvaluacionController::class);
//MODAL EVALUACION VERIFICACION
Route::post('/evaluacion/guardar_evaluacion', 'App\Http\Controllers\Administracion\EvaluacionController@guardar_evaluacion')->name('evaluacion.guardar_evaluacion');
Route::post('/evaluacion/list_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@list_verificacion')->name('evaluacion.list_verificacion');
Route::post('/evaluacion/create_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@create_verificacion')->name('evaluacion.create_verificacion');
Route::post('/evaluacion/edit_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@edit_verificacion')->name('evaluacion.edit_verificacion');
Route::post('/evaluacion/delete_verificacion', 'App\Http\Controllers\Administracion\EvaluacionController@delete_verificacion')->name('evaluacion.delete_verificacion');
//MODAL EVALUACION CAPACITACION
Route::post('/evaluacion/list_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@list_capacitacion')->name('evaluacion.list_capacitacion');
Route::post('/evaluacion/create_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@create_capacitacion')->name('evaluacion.create_capacitacion');
Route::post('/evaluacion/edit_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@edit_capacitacion')->name('evaluacion.edit_capacitacion');
Route::post('/evaluacion/delete_capacitacion', 'App\Http\Controllers\Administracion\EvaluacionController@delete_capacitacion')->name('evaluacion.delete_capacitacion');

//RECURSOS TERMINACION ADMINISTRACION
Route::resource('terminacion', TerminacionController::class);




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
