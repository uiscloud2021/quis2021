<?php
header ('Content-type: text/html; charset=utf-8');
require("conectionbd.php");
	
if(isset($_POST['email']) && isset($_POST['password'])){
	$usr = htmlentities($_POST['email']); 	
	$pw = htmlentities($_POST['password']);	
	
	$consulta = "SELECT * FROM usuarios_webuis WHERE email='$usr' AND password='$pw'";
	$result = mysqli_query($conexionbd, $consulta ) or die ( "No es posible realizar la consulta");
	
	if($res=mysqli_fetch_array($result)){
		$id_user= $res['id'];
		echo $respuesta=$id_user;
	}else{
		echo $respuesta="error";
	}

}
?>