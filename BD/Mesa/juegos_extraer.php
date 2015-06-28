<?php
include(dirname(dirname(__FILE__)).'/conexion.php');
      
    $idmesa = $_GET['array'];  
    $consultajuegos= "SELECT * FROM juegos WHERE id_mesa='$idmesa'";
    $datosjuegos= mysql_query($consultajuegos,$conex) or die ("<p> No se ha podido ejecutar"
        . "la consulta, compurebe que la sintaxis sea correcta. <p>");
    

mysql_close();




