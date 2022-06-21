<?php
header ('Content-type: text/html; charset=utf-8');

require("conections/conectionbd.php");


if(isset($_GET['formatos'])){
	$form=$_GET['formatos'];
	$id_formato=$_POST['formato_id'];
	$tabla=$form.'_formatos';
	
	$cons_form = "SELECT * FROM formatos_$form WHERE id='".$id_formato."' ";
	$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
	$num_form = mysqli_num_rows($res_form);
	if($num_form>0){
	    $fila_form=mysqli_fetch_array($res_form);
		$datos = json_decode($fila_form['datos_json'], true);
		$form_id = $fila_form['documento_formato_id'];
		
		$cons_doc = "SELECT * FROM documentos_$tabla WHERE id='".$form_id."' ";
	    $res_doc = mysqli_query($conexionbd, $cons_doc ) or die ( mysqli_error($conexionbd));
	    $fila_doc=mysqli_fetch_array($res_doc);
	    $directorio = $fila_doc['directorio'];

		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	        
	    $fecha = explode("-", $datos[0]);
		$anio=$fecha[0];
		$mes=$fecha[1];
		 $dia=$fecha[2];
		    if($mes=="01"){
			    $mes="Enero";
		    }else if($mes=="02"){
			    $mes="Febrero";
		    }else if($mes=="03"){
			    $mes="Marzo";
		    }else if($mes=="04"){
			    $mes="Abril";
		    }else if($mes=="05"){
			    $mes="Mayo";
		    }else if($mes=="06"){
			    $mes="Junio";
		    }else if($mes=="07"){
			    $mes="Julio";
		    }else if($mes=="08"){
			    $mes="Agosto";
		    }else if($mes=="09"){
			    $mes="Septiembre";
		    }else if($mes=="10"){
			    $mes="Octubre";
		    }else if($mes=="11"){
			    $mes="Noviembre";
		    }else if($mes=="12"){
			    $mes="Diciembre";
		    }
		$fecha_formato=$dia." de ".$mes." de ".$anio;
	    
	    if($form=="ad"){
	        include("docxtemplate.class.php");
		    $my_template=new DOCXTemplate("../assets/AD/5. FC-AD/".$directorio);
		
		    // Documento Confidencialidad de UIS
			if (9 == $id_formato) {
				$my_template->set('nombre', $datos[0]);
				$my_template->set('domicilio', $datos[1]);
				$my_template->set('telefono', $datos[2]);
			}
	
			// Documento Cotizacion corta
			if (10 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('tituloAbre', $datos[1]);
				$my_template->set('nombre', $datos[2]);
				$my_template->set('puesto', $datos[3]);
				$my_template->set('empresa', $datos[4]);
				$my_template->set('apellido', $datos[5]);
				$my_template->set('faseEstudio', $datos[6]);
				$my_template->set('servicio', $datos[7]);
				$my_template->set('descripcion', $datos[8]);
				$my_template->set('tiempo', $datos[9]);
				$my_template->set('total', $datos[10]);
				$my_template->set('moneda', $datos[11]);
				$my_template->set('pago', $datos[12]);
			}
	
			// Documento Cotizacion extensa
			if (11 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('tituloAbre', $datos[1]);
				$my_template->set('nombre', $datos[2]);
				$my_template->set('puesto', $datos[3]);
				$my_template->set('empresa', $datos[4]);
				$my_template->set('apellido', $datos[5]);
				$my_template->set('faseEstudio', $datos[6]);
				$my_template->set('totalSujeto', $datos[7]);
				$my_template->set('numMuestra', $datos[8]);
				$my_template->set('totalMuestra', $datos[9]);
				$my_template->set('servicio', $datos[10]);
				$my_template->set('descripcion', $datos[11]);
				$my_template->set('tiempo', $datos[12]);
				$my_template->set('moneda', $datos[15]);
				$my_template->set('total', $datos[16]);
				$my_template->set('tiempoTotal', $datos[17]);
				$my_template->set('formaPago', $datos[18]);
				
				$my_template->cloneRow('servicioCedula', ((count($datos) - 19) / 2) + 1);
				
				$my_template->set('servicioCedula#1', $datos[13]);
				$my_template->set('totalServicio#1', $datos[14]);
				
				$aux = 0;
				for ($i = 1; $i < ((count($datos) - 19) / 2) + 1; $i++) { 
					$my_template->set('servicioCedula#'.($i+1), htmlspecialchars($datos[$aux + 19], ENT_COMPAT, 'UTF-8'));
					$my_template->set('totalServicio#'.($i+1), htmlspecialchars($datos[$aux + 20], ENT_COMPAT, 'UTF-8'));
					$aux = $aux + 2;
				}
			}
	
			// Documento Depositos bancarios
			if (14 == $id_formato) {
				// $my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('nombreEmpresa', $datos[0]);
				$my_template->set('domicilioEmpresa', $datos[1]);
				$my_template->set('rfcEmpresa', $datos[2]);
				$my_template->set('nombreBanco', $datos[3]);
				$my_template->set('direccionBanco', $datos[4]);
				$my_template->set('ciudadCodigoBanco', $datos[5]);
				$my_template->set('sucursalCuenta', $datos[6]);
				$my_template->set('clabe', $datos[7]);
				$my_template->set('swift', $datos[8]);
				$my_template->set('moneda', $datos[9]);
			}
	
			// Documento Aceptacion de residentes
			if (31 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('departamento', $datos[1]);
				$my_template->set('institucion', $datos[2]);
				$my_template->set('residente', $datos[3]);
				$my_template->set('numControl', $datos[4]);
				$my_template->set('carrera', $datos[5]);
				$my_template->set('meses', $datos[6]);
				$my_template->set('area', $datos[7]);
				$my_template->set('horaEntrada', $datos[8]);
				$my_template->set('horaSalida', $datos[9]);
				$my_template->set('pago1', $datos[10]);
				$my_template->set('pago2', $datos[11]);
				$my_template->set('pago3', $datos[12]);
				$my_template->set('objetivo', $datos[13]);
			}
	
			// Documento Apego a documentos
			if (38 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('empleado', $datos[1]);
			}
	
			// Documento Pago bancario personal
			if (41 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('empleado', $datos[1]);
			}
	
			// Documento Pago bancario becarios
			if (42 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('institucion', $datos[1]);
				$my_template->set('becario', $datos[2]);
			}
	
			// Documento Reuniones
			if (44 == $id_formato) {
				// $my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('fechaReunion', date( 'd-m-Y', strtotime($datos[0])) );
				$my_template->set('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
				$my_template->set('motivo', $datos[2]);
				$my_template->set('proyecto', $datos[3]);
				$my_template->set('totalA', $datos[4]);
				$my_template->set('costo', $datos[5]);
				$my_template->set('cumple', $datos[6]);
				$my_template->set('cumplimiento', $datos[7]);
				$my_template->set('comentarios', $datos[8]);
	
				$my_template->cloneBlock('block_asistentes', (count($datos) - 9), true, true);
				for ($i = 0; $i < (count($datos) - 9); $i++) { 
					$my_template->set('asistente#'.($i+1), htmlspecialchars($datos[9 + $i], ENT_COMPAT, 'UTF-8'));
				}
			}
	
			// Documento Viaticos
			if (45 == $id_formato) {
				// $my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('fechaActividad', date( 'd-m-Y', strtotime($datos[0])) );
				$my_template->set('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
				$my_template->set('actividad', $datos[2]);
				$my_template->set('proyecto', $datos[3]);
				$my_template->set('totalA', $datos[4]);
				$my_template->set('costo', $datos[5]);
				$my_template->set('compro', $datos[6]);
				$my_template->set('cumple', $datos[7]);
				$my_template->set('cumplimiento', $datos[8]);
				$my_template->set('comentarios', $datos[9]);
	
				$my_template->cloneBlock('block_asistentes', (count($datos) - 10), true, true);
				for ($i = 0; $i < (count($datos) - 10); $i++) { 
					$my_template->set('asistente#'.($i+1), htmlspecialchars($datos[10 + $i], ENT_COMPAT, 'UTF-8'));
				}
			}
	
			// Documento Regalos
			if (46 == $id_formato) {
				// $my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('fechaRegalo', date( 'd-m-Y', strtotime($datos[0])) );
				$my_template->set('fechaInforme', date( 'd-m-Y', strtotime($datos[1])) );
				$my_template->set('donatario', $datos[2]);
				$my_template->set('destinatario', $datos[3]);
				$my_template->set('circunstancia', $datos[4]);
				$my_template->set('regalo', $datos[5]);
				$my_template->set('valorEst', $datos[6]);
				$my_template->set('valorPeso', $datos[7]);
				$my_template->set('destino', $datos[8]);
				$my_template->set('fechaSalida', date( 'd-m-Y', strtotime($datos[9])) );
				$my_template->set('cumple', $datos[10]);
				$my_template->set('cumplimiento', $datos[11]);
				$my_template->set('comentarios', $datos[12]);
			}
	
			// Documento Pase de salida
			if (47 == $id_formato) {
				$my_template->set('empleado', $datos[0]);
				$my_template->set('autorizo', $datos[1]);
			}
	
			// Documento Permiso
			if (48 == $id_formato) {
				$my_template->set('nombre', $datos[0]);
				$my_template->set('area', $datos[1]);
				$my_template->set('puesto', $datos[2]);
				$my_template->set('numeroDias', $datos[3]);
				$my_template->set('periodoAnual', $datos[4]);
				if ($datos[5] == 'Con goce de sueldo') {
					$my_template->set('c', 'x');
					$my_template->set('s', '');
				} else {
					$my_template->set('c', '');
					$my_template->set('s', 'x');
				}
				$my_template->set('disponibles', $datos[6]);
				$my_template->set('disfrutados', $datos[7]);
				$my_template->set('solicita', $datos[8]);
				$my_template->set('disfrutar', $datos[9]);
				$my_template->set('fechaPermiso', $datos[10]);
				$my_template->set('fechaRegreso', $datos[11]);
				$my_template->set('empleado', $datos[12]);
				$my_template->set('fechaEmp', date('d-m-Y' , strtotime($datos[13])) );
				$my_template->set('autorizo', $datos[14]);
				$my_template->set('fechaAut', date('d-m-Y' , strtotime($datos[15])) );
			}
	
			// Documento Vacasiones
			if (49 == $id_formato) {
				$my_template->set('nombre', $datos[0]);
				$my_template->set('area', $datos[1]);
				$my_template->set('puesto', $datos[2]);
				$my_template->set('numeroDias', $datos[3]);
				$my_template->set('periodoAnual', $datos[4]);
				$my_template->set('disponibles', $datos[5]);
				$my_template->set('disfrutados', $datos[6]);
				$my_template->set('solicita', $datos[7]);
				$my_template->set('disfrutar', $datos[8]);
				$my_template->set('fechaPermiso', $datos[9]);
				$my_template->set('fechaRegreso', $datos[10]);
				$my_template->set('empleado', $datos[11]);
				$my_template->set('fechaEmp', date('d-m-Y' , strtotime($datos[12])) );
				$my_template->set('autorizo', $datos[13]);
				$my_template->set('fechaAut', date('d-m-Y' , strtotime($datos[14])) );
			}
	
			// Documento Constancia de trabajo
			if (50 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('nombre', $datos[1]);
				$my_template->set('lab', $datos[2]);
				$my_template->set('ingreso', date('d-m-Y' , strtotime($datos[3])) );
				if ($datos[4] == null) {
					$my_template->set('egreso', 'la actualidad' );
				} else {
					$my_template->set('egreso', date('d-m-Y' , strtotime($datos[4])) );
				}
				$my_template->set('puesto', $datos[5]);
				$my_template->set('per', $datos[6]);
				$my_template->set('cantidad', $datos[7]);
				$my_template->set('cantidad2', $datos[8]);
			}
	
			// Documento Constancia de trabajo
			if (55 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('fecha2', date('d-m-Y' , strtotime($datos[1])) );
				$my_template->set('puesto', $datos[2]);
				$my_template->set('nombre', $datos[3]);
			}
	
			// Documento Finiquito
			if (56 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				// $my_template->set('fecha2', date('d-m-Y' , strtotime($datos[1])) );
				$my_template->set('finiquito', $datos[1]);
				$my_template->set('finiquito2', $datos[2]);
				$my_template->set('finiquito3', $datos[3]);
				$my_template->set('fechaContrato', date('d-m-Y' , strtotime($datos[4])) );
				$my_template->set('fechaBaja', date('d-m-Y' , strtotime($datos[5])) );
				$my_template->set('salario', $datos[6]);
				$my_template->set('salario2', $datos[7]);
				$my_template->set('salario3', $datos[8]);
				$my_template->set('pago', $datos[9]);
				$my_template->set('aniosLaborados', $datos[10]);
				$my_template->set('pago2', $datos[11]);
				$my_template->set('pago3', $datos[12]);
				$my_template->set('diasSemana', $datos[13]);
				$my_template->set('pago4', $datos[14]);
				$my_template->set('pago5', $datos[15]);
				$my_template->set('suma', $datos[16]);
				$my_template->set('suma2', $datos[17]);
				$my_template->set('suma3', $datos[18]);
				$my_template->set('suma4', $datos[19]);
				$my_template->set('ispt', $datos[20]);
				$my_template->set('imss', $datos[21]);
				$my_template->set('prestamo', $datos[22]);
				$my_template->set('sumaDed', $datos[23]);
				$my_template->set('sumaDed2', $datos[24]);
				$my_template->set('sumaDed3', $datos[25]);
				$my_template->set('sumaDed4', $datos[26]);
				$my_template->set('neto', $datos[27]);
				$my_template->set('neto2', $datos[28]);
				$my_template->set('neto3', $datos[29]);
				$my_template->set('empleado', $datos[30]);
			}
			
			// Documento Recomendacion
			if (57 == $id_formato) {
				$my_template->set('fecha','a ' . date('d', strtotime($datos[0])) . ' de '  . $meses[ date('n', strtotime($datos[0]))-1 ] . ' del ' . date('Y', strtotime($datos[0])) );
				$my_template->set('empleado', $datos[1]);
				$my_template->set('lab', $datos[2]);
				$my_template->set('fechaIngreso', date('d-m-Y' , strtotime($datos[3])) );
				$my_template->set('puesto', $datos[4]);
			}
	
			// try{
			// 	$my_template->saveAs(storage_path( '../public/assets/AD-documents/' . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '-' . $id . '.' . $nombreDocumento['format']) );
			// }catch (Exception $e){
			// 	return back()->withError($e->getMessage())->withInput();
			// }

			
			// return response()->download(storage_path( '../public/assets/AD-documents/'  . $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateString() . '-' . $id . '.' . $nombreDocumento['format']),
			// $nombreDocumento['nombre_doc'] . '-' . $currentTime->toDateTimeString() . '.' . $nombreDocumento['format'] );
			
			
			
		    $my_template->saveAs("../assets/AD-documents/".$id_formato.'-'.$directorio);
			$docx->downloadAs('test.docx');
		    header("Content-Type:application/msword");
		    header("Content-Disposition: attachment; filename=".$directorio);
	    }
    }
	echo $directorio;
}


?>