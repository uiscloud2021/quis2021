<?php
	
// Datos de la base de datos
	global $conexionbd;
	//$username = "quis_sistemas";//usuario
	//$password = "(-m!gZe75=97~~E)";
	$username = "root";//usuario
	$password = "";
	$host = "localhost";//servidor
	$bd_name = "quis";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexionbd = mysqli_connect( $host, $username, $password ) or die ("No se ha podido conectar al Servidor");
	mysqli_set_charset($conexionbd, 'utf8');
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexionbd, $bd_name) or die ( "No se ha podido conectar a la base de datos" );

?>