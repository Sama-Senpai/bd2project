<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../conexion.php';
ECHO "ECHOOOOOO";
$Ci = $_GET['Ci'];
$Tipo = $_GET['Tipo'];
//echo $Ci ."y ".$Tipo
$admin=255;
$normal=0;
if ($Tipo){
    $queryEditarPermisos= "UPDATE `Usuarios` SET `Permisos`='$admin' WHERE `Ci`='$Ci'";
    //mysql_query($queryEditarPermisos);
    
}
 else {
   $queryEditarPermisos= "UPDATE `Usuarios` SET `Permisos`='$normal' WHERE `Ci`='$Ci'";
    //mysql_query($queryEditarPermisos); 
}
mysql_query($queryEditarPermisos); 
header("Location:../../admin/permisosUsuarios.php");
?>