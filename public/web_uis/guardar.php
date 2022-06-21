<?php
header ('Content-type: text/html; charset=utf-8');

require("conections/conectionbd.php");
$fecha=date("Y")."-".date("m")."-".date("d");


if(isset($_GET['tablas'])){
	$tablas=$_GET['tablas'];
	
	if($tablas==1){//SOMETIMIENTOS
		$protocolo=$_POST['protocolo'];
		$comentarios=$_POST['comentarios'];
		$id_user=$_POST['user_id'];
		
		if($_FILES["3"]["name"]!=""){
				$tmp_name[3] = $_FILES["3"]["tmp_name"];
				$doc[3] = $_FILES["3"]["name"];
				$newfilename[3] = "../assets/MCE/Sometimientos/".basename($doc[3]);
				$extencion = substr($doc[3],-3);
				move_uploaded_file($tmp_name[3], $newfilename[3]);
		}else{
			$doc[3]="";
		}
		
		$cons_form = "SELECT * FROM mce_sometimientos_enviados WHERE nombre='".$protocolo."' AND usuario_webuis='".$id_user."' ";
		$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
		$num_form = mysqli_num_rows($res_form);
		if($num_form==0){
			mysqli_query($conexionbd, "INSERT INTO mce_sometimientos_enviados VALUES(NULL,'".$protocolo."','".$comentarios."','".$doc[3]."','".$id_user."','".$fecha."','15','".$id_user."')") or die ( "No es posible guardar");
			
			$email="info@quis.com.mx";
			$email_to="comite.etica@uis.com.mx";
			$email_subject = "Sometimiento capturado en la página web";   

			function died($error) {
				 echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
				 echo "Detalle de los errores.<br /><br />";
				echo $error."<br /><br />";
				 echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
				die();
			}
		 
			$error_message = "Error datos";
			$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
			 if(!preg_match($email_exp,$email)) {
				 $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
			 }
			$string_exp = "/^[A-Za-z .'-]+$/";
			$email_message = "Se realizó un registro de Sometimiento en la página web de la UIS. Para revisión entrar a la parte del QUIS Sometimientos (Accesos del icono de la derecha de su pantalla. Miembros del Comité de Ética)\n\n";
		 
			function clean_string($string) {
				 $bad = array("content-type","bcc:","to:","cc:","href");
				 return str_replace($bad,"",$string);
			 }

			 $headers = 'From: '.$email."\r\n".
			'Reply-To: '.$email."\r\n" .
			'X-Mailer: PHP/' . phpversion()."\r\n" .
			'Content-Type: text/plain; charset=ISO-8859-1';

			@mail($email_to, utf8_decode($email_subject), utf8_decode($email_message), utf8_decode($headers));
			 echo $resp="Si";
		}else{
			echo $resp="No";
		}
	}


	else if($tablas==2){//AUDITORIAS
		$protocolo=$_POST['protocolo'];
		$comentarios=$_POST['comentarios'];
		$id_user=$_POST['user_id'];
		
		if($_FILES["3"]["name"]!=""){
				$tmp_name[3] = $_FILES["3"]["tmp_name"];
				$doc[3] = $_FILES["3"]["name"];
				$newfilename[3] = "../assets/MCE/Auditorias/".basename($doc[3]);
				$extencion = substr($doc[3],-3);
				move_uploaded_file($tmp_name[3], $newfilename[3]);
				$ruta="assets/MCE/Auditorias/".$doc[3];
		}else{
			$doc[3]="";
			$ruta="";
		}
		
		$cons_form = "SELECT * FROM mce_auditorias WHERE nombre='".$protocolo."' AND usuario_webuis='".$id_user."' ";
		$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
		$num_form = mysqli_num_rows($res_form);
		if($num_form==0){
			mysqli_query($conexionbd, "INSERT INTO mce_auditorias VALUES(NULL,'".$protocolo."','".$comentarios."','".$ruta."','".$id_user."','".$fecha."','15','".$id_user."')") or die ( "No es posible guardar");
			
			$email="info@quis.com.mx";
			$email_to="comite.etica@uis.com.mx";
			$email_subject = "Auditoría capturada en la página web";   

			function died($error) {
				 echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
				 echo "Detalle de los errores.<br /><br />";
				echo $error."<br /><br />";
				 echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
				die();
			}
		 
			$error_message = "Error datos";
			$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
			 if(!preg_match($email_exp,$email)) {
				 $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
			 }
			$string_exp = "/^[A-Za-z .'-]+$/";
			$email_message = "Se realizó un registro de Auditoría en la página web de la UIS. Para revisión entrar a la parte del QUIS Auditorías (Accesos del icono de la derecha de su pantalla. Miembros del Comité de Ética)\n\n";
		 
			function clean_string($string) {
				 $bad = array("content-type","bcc:","to:","cc:","href");
				 return str_replace($bad,"",$string);
			 }

			 $headers = 'From: '.$email."\r\n".
			'Reply-To: '.$email."\r\n" .
			'X-Mailer: PHP/' . phpversion()."\r\n" .
			'Content-Type: text/plain; charset=ISO-8859-1';

			@mail($email_to, utf8_decode($email_subject), utf8_decode($email_message), utf8_decode($headers));
			 echo $resp="Si";
		}else{
			echo $resp="No";
		}
	}



	else if($tablas==3){//INFORMES
		$id_codigo=$_POST['id_codigo'];
		$id_user=$_POST['user_id'];
		$cei=$_POST['aprobacioncei'];
		$ci=$_POST['aprobacionci'];
		$cofepris=$_POST['cofepris'];
		$estado=$_POST['estado'];
		$inicio=$_POST['inicio'];
		$icf=$_POST['numicf'];
		$activos=$_POST['numact'];
		$eas=$_POST['numeas'];
		$desv=$_POST['numdesv'];
		
		$cons_form = "SELECT * FROM mce_informes WHERE proyecto_id='".$id_codigo."' AND usuario_webuis='".$id_user."' AND fecha='".$fecha."' ";
		$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
		$num_form = mysqli_num_rows($res_form);
		if($num_form==0){
			mysqli_query($conexionbd, "INSERT INTO mce_informes VALUES(NULL,'".$id_codigo."','".$cei."','".$ci."','".$cofepris."','".$estado."','".$inicio."','".$icf."','".$activos."','".$eas."','".$desv."','".$id_user."','".$fecha."','15','".$id_user."')") or die ( "No es posible guardar");
			
			//HACER PDF PARA DESCARGA
			include("plantillaInforme.php");
	        $cons_man = "SELECT * FROM proyectos WHERE id='".$id_codigo."'";
		    $res_man = mysqli_query($conexionbd, $cons_man ) or die ( "No es posible realizar la consulta");
		    $fila=mysqli_fetch_array($res_man);
		
		    $lugar="Chihuahua. Chih.,";
		    $titulo=$fila['no19'];
			$codigo=$fila['no20'];
			$patrocinador=$fila['no25'];
			$investigador_id=$fila['investigador_id'];

			if($investigador_id != NULL && $investigador_id == ""){
				$cons_inv = "SELECT * FROM investigadores WHERE id='".$investigador_id."' ";
				$res_inv = mysqli_query($conexionbd, $cons_inv ) or die ( mysqli_error($conexionbd));
				$fila_inv=mysqli_fetch_array($res_inv);
				$investigador=$fila_inv['investigador'];
			}else{
				$investigador="";
			}

			$cons_s = "SELECT * FROM ce_sometimiento WHERE proyecto_id='".$id_codigo."' ";
			$res_s = mysqli_query($conexionbd, $cons_s ) or die ( mysqli_error($conexionbd));
			$num_s = mysqli_num_rows($res_s);
			if($num_s>0){
				$fila_s=mysqli_fetch_array($res_s);
				$sitio=$fila_s['s1'];
			}else{
				$sitio="";
			}
		    $direccion="Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México";
		    
			$cons_resp = "SELECT * FROM mce_informes ORDER BY id DESC";
			$res_resp = mysqli_query($conexionbd, $cons_resp ) or die ( "No es posible realizar la consulta");
			$fila_resp=mysqli_fetch_array($res_resp);
			$id_informe=$fila_resp['id'];
		    $cei=$fila_resp['aprobacion_cei'];
			$ci=$fila_resp['aprobacion_ci'];
		    $cofepris=$fila_resp['cofepris'];
		    $estado=$fila_resp['estado'];
		    $visita_inicio=$fila_resp['fecha_inicio'];
		    $sujetos_icf=$fila_resp['sujetos_icf'];
		    $sujetos_activos=$fila_resp['sujetos_activos'];
		    $eas=$fila_resp['total_eas'];
		    $desviaciones=$fila_resp['total_desviaciones'];
		    
        	$fechin = explode("-", $fecha);
		    $anio=$fechin[0];
		    $mes=$fechin[1];
		    $dia=$fechin[2];
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
		    $fecha_inicial=$dia." de ".$mes." de ".$anio;
		
            $fechin2 = explode("-", $cei);
            $anio2=$fechin2[0];
            $mes2=$fechin2[1];
            $dia2=$fechin2[2];
            if($mes2=="01"){
            	$mes2="ene";
            }else if($mes2=="02"){
            	$mes2="feb";
            }else if($mes2=="03"){
            	$mes2="mar";
            }else if($mes2=="04"){
            	$mes2="abr";
            }else if($mes2=="05"){
            	$mes2="may";
            }else if($mes2=="06"){
            	$mes2="jun";
            }else if($mes2=="07"){
            	$mes2="jul";
            }else if($mes2=="08"){
            	$mes2="ago";
            }else if($mes2=="09"){
            	$mes2="sep";
            }else if($mes2=="10"){
            	$mes2="oct";
            }else if($mes2=="11"){
            	$mes2="nov";
            }else if($mes2=="12"){
            	$mes2="dic";
            }
            $fecha_cei=$dia2."-".$mes2."-".$anio2;
            		
            $fechin3 = explode("-", $ci);
            $anio3=$fechin3[0];
            $mes3=$fechin3[1];
            $dia3=$fechin3[2];
            if($mes3=="01"){
            	$mes3="ene";
            }else if($mes3=="02"){
            	$mes3="feb";
            }else if($mes3=="03"){
            	$mes3="mar";
            }else if($mes3=="04"){
            	$mes3="abr";
            }else if($mes3=="05"){
            	$mes3="may";
            }else if($mes3=="06"){
            	$mes3="jun";
            }else if($mes3=="07"){
            	$mes3="jul";
            }else if($mes3=="08"){
            	$mes3="ago";
            }else if($mes3=="09"){
            	$mes3="sep";
            }else if($mes3=="10"){
            	$mes3="oct";
            }else if($mes3=="11"){
            	$mes3="nov";
            }else if($mes3=="12"){
            	$mes3="dic";
            }
            $fecha_ci=$dia3."-".$mes3."-".$anio3;
		
            $fechin4 = explode("-", $visita_inicio);
            $anio4=$fechin4[0];
            $mes4=$fechin4[1];
            $dia4=$fechin4[2];
            if($mes4=="01"){
            	$mes4="Enero";
            }else if($mes4=="02"){
            	$mes4="Febrero";
            }else if($mes4=="03"){
            	$mes4="Marzo";
            }else if($mes4=="04"){
            	$mes4="Abril";
            }else if($mes4=="05"){
            	$mes4="Mayo";
            }else if($mes4=="06"){
            	$mes4="Junio";
            }else if($mes4=="07"){
            	$mes4="Julio";
            }else if($mes4=="08"){
            	$mes4="Agosto";
            }else if($mes4=="09"){
            	$mes4="Septiembre";
            }else if($mes4=="10"){
            	$mes4="Octubre";
            }else if($mes4=="11"){
            	$mes4="Noviembre";
            }else if($mes4=="12"){
            	$mes4="Diciembre";
            }
            $fecha_visitainicio=$dia4."-".$mes4."-".$anio4;
		
            $fechin5 = explode("-", $cofepris);
            $anio5=$fechin5[0];
            $mes5=$fechin5[1];
            $dia5=$fechin5[2];
            if($mes5=="01"){
            	$mes5="ene";
            }else if($mes5=="02"){
            	$mes5="feb";
            }else if($mes5=="03"){
            	$mes5="mar";
            }else if($mes5=="04"){
            	$mes5="abr";
            }else if($mes5=="05"){
            	$mes5="may";
            }else if($mes5=="06"){
            	$mes5="jun";
            }else if($mes5=="07"){
            	$mes5="jul";
            }else if($mes5=="08"){
            	$mes5="ago";
            }else if($mes5=="09"){
            	$mes5="sep";
            }else if($mes5=="10"){
            	$mes5="oct";
            }else if($mes5=="11"){
            	$mes5="nov";
            }else if($mes5=="12"){
            	$mes5="dic";
            }
            $fecha_cofepris=$dia5."-".$mes5."-".$anio5;
		    
			$pdf = new PDF('P', 'mm', 'A4');
        	#Establecemos los márgenes izquierda, arriba y derecha:
            $pdf->SetMargins(30, 25 , 30);
            #Establecemos el margen inferior:
            $pdf->SetAutoPageBreak(true,20); 
        	$pdf->AliasNbPages();
        	$pdf->AddPage();
	
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(0,6,utf8_decode($lugar.' a '.$fecha_inicial),0,1,'R');
        		
        	$y= $pdf->GetY();
        	$pdf->SetY($y+4);
        		
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(0,6,utf8_decode($investigador),0,1,'L');
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(0,6,utf8_decode('P r e s e n t e'),0,1,'L');
        		
        	$y= $pdf->GetY();
        	$pdf->SetY($y+4);
        	
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(0,6,utf8_decode('Asunto: Informe Recibido '),0,1,'R');
        					
        	$y= $pdf->GetY();
        	$pdf->SetY($y+4);
        					
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(30,6,utf8_decode('Código'),0,0,'L');
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(120,6,utf8_decode($codigo),0,1,'L');
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(30,6,utf8_decode('Título'),0,0,'L');
        	$pdf->SetFont('Arial','',9);
        	$pdf->MultiCell(120,6,utf8_decode($titulo),0,'J',0);
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(30,6,utf8_decode('Patrocinador'),0,0,'L');
        	$pdf->SetFont('Arial','',9);
        	$pdf->MultiCell(120,6,utf8_decode($patrocinador),0,'J',0);
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(30,6,utf8_decode('Sitio clínico'),0,0,'L');
        	$pdf->SetFont('Arial','',9);
        	$pdf->MultiCell(120,6,utf8_decode($sitio),0,'J',0);
        		    
        	$y= $pdf->GetY();
        	$pdf->SetY($y+3);
        		
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(60,6,utf8_decode('Fechas de aprobación'),0,0,'L');
        	$pdf->Cell(60,6,utf8_decode('Comité de Ética en Investigación'),0,0,'R');
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(30,6,utf8_decode($fecha_cei),1,1,'L');
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(60,6,utf8_decode(''),0,0,'L');
        	$pdf->Cell(60,6,utf8_decode('Comité de Investigación'),0,0,'R');
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(30,6,utf8_decode($fecha_ci),1,1,'L');
        	$pdf->SetFont('Arial','B',9);
        	$pdf->Cell(60,6,utf8_decode(''),0,0,'L');
        	$pdf->Cell(60,6,utf8_decode('COFEPRIS'),0,0,'R');
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(30,6,utf8_decode($fecha_cofepris),1,1,'L');
        					
        	$y= $pdf->GetY();
        	$pdf->SetY($y+6);
        					
        	$pdf->SetFont('Arial','',9);
        	$pdf->MultiCell(0,6,utf8_decode('Estos comités se dan por enterados del siguiente informe:'),0,'J',0);
        		
        	$y= $pdf->GetY();
        	$pdf->SetY($y+4);
        		
        	$pdf->SetFont('Arial','',9);
        	$pdf->Cell(75,6,utf8_decode('Estado del proyecto'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($estado),1,1,'C');
        	$pdf->Cell(75,6,utf8_decode('Fecha de visita de inicio'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($fecha_visitainicio),1,1,'C');
        	$pdf->Cell(75,6,utf8_decode('Sujetos que firmaron ICF'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($sujetos_icf),1,1,'C');
        	$pdf->Cell(75,6,utf8_decode('Sujetos activos o en seguimiento'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($sujetos_activos),1,1,'C');
        	$pdf->Cell(75,6,utf8_decode('Total de informes iniciales de EAS en el sitio'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($eas),1,1,'C');
        	$pdf->Cell(75,6,utf8_decode('Total de desviaciones o violaciones en el sitio'),1,0,'L');
        	$pdf->Cell(75,6,utf8_decode($desviaciones),1,1,'C');
        		
        	$y= $pdf->GetY();
        	$pdf->SetY($y+50);

        	$pdf->Image('../favicons/ce_footer2.png', 16, 250, 190 );
        	$pdf->Output("../assets/MCE/Informes/Informe".$id_informe.".pdf", "F");//GUARDAR PDF

			//ENVIAR CORREO DE AVISO
			$email="info@quis.com.mx";
			$email_to="comite.etica@uis.com.mx";
			$email_subject = "Informe trimestral capturado en la página web";   

			function died($error) {
				 echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
				 echo "Detalle de los errores.<br /><br />";
				echo $error."<br /><br />";
				 echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
				die();
			}
		 
			$error_message = "Error datos";
			$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
			 if(!preg_match($email_exp,$email)) {
				 $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
			 }
			$string_exp = "/^[A-Za-z .'-]+$/";
			$email_message = "Se realizó un registro de Informes trimestral en la página web de la UIS. Para revisión entrar a la parte del QUIS Informes (Accesos del icono de la derecha de su pantalla. Miembros del Comité de Ética)\n\n";
		 
			function clean_string($string) {
				 $bad = array("content-type","bcc:","to:","cc:","href");
				 return str_replace($bad,"",$string);
			 }

			 $headers = 'From: '.$email."\r\n".
			'Reply-To: '.$email."\r\n" .
			'X-Mailer: PHP/' . phpversion()."\r\n" .
			'Content-Type: text/plain; charset=ISO-8859-1';

			@mail($email_to, utf8_decode($email_subject), utf8_decode($email_message), utf8_decode($headers));
			 echo $resp="Si";
		}else{
			echo $resp="No";
		}
	}



	else if($tablas==4){//INFORMES CARGAR CODIGO
		$id_codigo=$_POST['id_codigo'];
		
		$cons_form = "SELECT * FROM proyectos WHERE id='".$id_codigo."' ";
		$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
		$num_form = mysqli_num_rows($res_form);
		if($num_form>0){
			$fila=mysqli_fetch_array($res_form);
			$titulo=$fila['no19'];
			$patrocinador=$fila['no25'];
			$investigador_id=$fila['investigador_id'];

			if($investigador_id != NULL && $investigador_id == ""){
				$cons_inv = "SELECT * FROM investigadores WHERE id='".$investigador_id."' ";
				$res_inv = mysqli_query($conexionbd, $cons_inv ) or die ( mysqli_error($conexionbd));
				$fila_inv=mysqli_fetch_array($res_inv);
				$investigador=$fila_inv['investigador'];
			}else{
				$investigador="";
			}

			$cons_s = "SELECT * FROM ce_sometimiento WHERE proyecto_id='".$id_codigo."' ";
			$res_s = mysqli_query($conexionbd, $cons_s ) or die ( mysqli_error($conexionbd));
			$num_s = mysqli_num_rows($res_s);
			if($num_s>0){
				$fila_s=mysqli_fetch_array($res_s);
				$sitio=$fila_s['s1'];
			}else{
				$sitio="";
			}
			
			echo $resp=$titulo."|".$patrocinador."|".$sitio."|".$investigador;
		}
	}



	else if($tablas==5){//INFORMES CARGAR PROTOCOLOS DE ACCESO
		$id_user=$_POST['id_user'];
		
		$cons_form = "SELECT * FROM usuarios_webuis WHERE id='".$id_user."' ";
		$res_form = mysqli_query($conexionbd, $cons_form ) or die ( mysqli_error($conexionbd));
		$num_form = mysqli_num_rows($res_form);
		if($num_form>0){
			$fila=mysqli_fetch_array($res_form);
			$protocolos=$fila['protocolos'];
			$dato=explode("|", $protocolos);
			$numero=count($dato);
			$numero=$numero-1;
			$resp="";
			$resp.="<option id='' selected >Seleccione...</option>";
			for($a=0; $a<=$numero; $a++){
				if($dato[$a]!=""){
					$cons = "SELECT * FROM proyectos WHERE id='".$dato[$a]."' ";
					$res = mysqli_query($conexionbd, $cons ) or die ( mysqli_error($conexionbd));
					$fila_pry=mysqli_fetch_array($res);
					$resp.="<option value='".$dato[$a]."'>".$fila_pry['no20']."</option>";
				}
			}
			echo $resp;
		}
	}
	
}//FIN


?>