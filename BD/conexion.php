<?php 
// Datos de la Conexion a la Base de Datos
	$host	= "localhost";
	$db	= "proyecto_bd2_hotel";
	$user	= "root";
	$password = "";
	// Abrir la Conexión
	$conex=@mysql_connect("$host","$user","$password");

	if(!$conex)
	{
		echo "Error al Intentar Conectarse con la Base de Datos";
		exit();
	}

	// Elegir una Base de Datos
	if(!@mysql_select_db("$db",$conex))
	{
		echo "No se pudo conectar correctamente con la Base de datos";
		exit();
	}
?>

