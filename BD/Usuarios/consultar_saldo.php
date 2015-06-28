<?php
    function getSaldo(){
        // Conexion
        include(dirname(dirname(__FILE__)).'/conexion.php');
        
        $ci=$_SESSION['ci'];
        
        $sel=mysql_query("SELECT Saldo FROM Transacciones WHERE Ci='$ci' ORDER BY Id DESC LIMIT 1 ",$conex);
        //SELECT Saldo from Transacciones where Ci='V-24964467' order by Id desc limit 1
        
        $arreglo=mysql_fetch_array($sel);
        
        $saldo=$arreglo['Saldo'];
        
        return $saldo;
    }        
?>        