<?php

include '../conexion.php';

$id = $_GET['mesa'];

$nombreMesa	= $_POST['nombreMesa'];
$descripcion	= $_POST['descripcion'];
$deporte        = $_POST['deporte'];
$capacidad	= $_POST['capacidad'];

//$id = "SELECT Id FROM Mesas WHERE Mesa='$nombreMesa'";
/*$query = "SELECT Id FROM Mesas WHERE Mesa='$nombreMesa'";
$datos = mysql_query($query);
$renglon = mysql_fetch_assoc($datos);
$id = $renglon['Id'];*/

echo $nombreMesa;
echo $id;

//$sql="UPDATE Mesas SET Mesa='$nombreMesa', Descripcion='$descripcion', Deporte='$deporte', Capacidad='$capacidad' WHERE Id='$id'";
$sql = "UPDATE `Mesas` SET `Mesa`='$nombreMesa',`Descripcion`='$descripcion',`Deporte`='$deporte',`Capacidad`='$capacidad' WHERE `Id`='$id'";
mysql_query($sql);

mysql_close();

header("Location: /Royal_Bets/admin/gestionmesas.php");
?>

