<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../conexion.php';

//$m = $_GET['mesa'];
$id = $_GET['Id'];

$inactivo= 0;

$sql="UPDATE `Mesas` SET `Estado`='$inactivo' WHERE `Id` = '$id'";
mysql_query($sql);
echo $m;
mysql_close();
header("Location: /Royal_Bets/admin/gestionmesas.php");
?>