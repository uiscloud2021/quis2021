<?php
header ('Content-type: text/html; charset=utf-8');
	
	require("conections/conectionbd.php");
	
	if(isset($_GET['tablas'])){
		$tablas=$_GET['tablas'];
		
		if($tablas==1){
			$id=$_POST['id'];
			$cons = "DELETE FROM mce_sometimientos_enviados WHERE id='".$id."'";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			echo $respuesta="ok";
		}

		else if($tablas==2){
			$id=$_POST['id'];
			$cons = "DELETE FROM mce_auditorias WHERE id='".$id."'";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			echo $respuesta="ok";
		}

		else if($tablas==3){
			$id=$_POST['id'];
			$cons = "DELETE FROM mce_informes WHERE id='".$id."'";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			echo $respuesta="ok";
		}
		
	}//FIN 
	

?>