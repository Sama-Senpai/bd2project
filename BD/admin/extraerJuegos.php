<?php

$host	= "localhost";
	$db	= "royalbetsbd";
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

$tabla= "Juegos";

$consulta= "SELECT * FROM $tabla";

$datos= mysql_query($consulta,$conex) or die ("<p> No se ha podido ejecutar"
        . "la consulta, compurebe que la sintaxis sea correcta. <p>");




mysql_close();


         
   