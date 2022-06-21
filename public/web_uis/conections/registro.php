<?php
header ('Content-type: text/html; charset=utf-8');
require("conectionbd.php");
	
	$usr = $_POST['correo']; 	
	$pw = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$fecha=date("Y")."-".date("m")."-".date("d");
	
	$consulta = "SELECT * FROM usuarios_webuis WHERE email='".$usr."' ";
	$result = mysqli_query($conexionbd, $consulta ) or die ( "No es posible realizar la consulta");
	
	if(mysqli_num_rows($result)==0){
		mysqli_query($conexionbd, "INSERT INTO usuarios_webuis VALUES(NULL,'".$nombre."','".$usr."','".$pw."','','Si','".$fecha."', NULL, NULL)") or die ( "No es posible guardar");
		
		//ENVIAR CORREO DE AVISO
		$email="info@quis.com.mx";
		$email_to=$usr;
		$email_subject = "Datos de Acceso a Sometimientos de Unidad de Investigación en Slaud";   

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
		$email_message = "Correo: ".$usr." \n Contraseña: ".$pw." \n Con está clave usted podrá tener acceso a Sometimientos, Informes trimestrales y Auditorías";
	 
		function clean_string($string) {
			 $bad = array("content-type","bcc:","to:","cc:","href");
			 return str_replace($bad,"",$string);
		 }

		 $headers = 'From: '.$email."\r\n".
		'Reply-To: '.$email."\r\n" .
		'X-Mailer: PHP/' . phpversion()."\r\n" .
		'Content-Type: text/plain; charset=ISO-8859-1';

		@mail($email_to, utf8_decode($email_subject), utf8_decode($email_message), utf8_decode($headers));
		 
		echo $respuesta="si";
	}else{
		echo $respuesta="error";
	}

?>