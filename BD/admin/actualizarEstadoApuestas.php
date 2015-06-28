<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "redirecting...";

$tam = count($_REQUEST);
//echo $tam;
$i = 0;
$pendiente= 0;
require_once("../conexion.php");
$sql="SELECT * from `Apuestas` WHERE `Estado`='$pendiente'";
$datos = mysql_query($sql);
        if (!$datos)
            echo "no entro bien x.x";
        
while ($renglonConsulta = mysql_fetch_assoc($datos)){
    $Estado = 0;
    $id = $renglonConsulta['Id'];
    $Ci = $renglonConsulta['Id_user'];
    $sqlSaldo = "SELECT * FROM `Transacciones` WHERE `Ci`='$Ci' ORDER BY Id DESC";
    $datosSaldo = mysql_query($sqlSaldo);
    if (!$datosSaldo)
            echo "no entro bien x.x con el saldo";
    
    $Array = mysql_fetch_assoc($datosSaldo);
    //echo $Array['Saldo'];
    $seleccion =$_POST[$renglonConsulta['Id']];
    if ($seleccion == 'valida'){
        
        $Estado = 1;
    }
    else if ($seleccion == 'no valida'){
        $Tipo = "Reembolso: Apuesta Rechazada, Id: ".$renglonConsulta['Id']; $Monto = $renglonConsulta['Monto']; $Fecha = $renglonConsulta['Fecha']; $Hora = $renglonConsulta['Hora']; $nuevoSaldo = $Array['Saldo'] + $Monto;
        $sqlTransaccion = "INSERT INTO `Transacciones`(`Ci`, `Tipo_de_transaccion`, `Monto`, `Fecha`, `Hora`, `Saldo`) VALUES ('$Ci','$Tipo','$Monto','$Fecha','$Hora','$nuevoSaldo')";
        mysql_query($sqlTransaccion);
        $Mensaje = "Su apuesta: ".$renglonConsulta['Id']." Ha sido rechazada.";
        $noLeido = FALSE;
        $sqlAlerta = "INSERT INTO `Alertas`(`Ci`, `Mensaje`,`Leido`) VALUES ('$Ci','$Mensaje','$noLeido')";
        
        mysql_query($sqlAlerta);
        $Estado = -1;
    }
    
    $sql = "UPDATE `Apuestas` SET `Estado`='$Estado' WHERE `Id`=$id";
    mysql_query($sql);
}

mysql_close();

header("Location: ../../admin/validarApuestas.php");

?>

 