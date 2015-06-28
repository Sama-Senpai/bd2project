<?php
    function getTablaMensajes($ci){
        // Conexion
        include(dirname(dirname(__FILE__)).'/conexion.php');
        
        $arreglo=mysql_query("SELECT Id,Ci,Mensaje,Leido FROM Alertas WHERE Ci='$ci' ORDER BY Id DESC",$conex);
        
        return $arreglo;
    } 
    
    function getNroMensajes($tablaMensajes){ 
        $nroMensajes=0;
        while($elemento=mysql_fetch_array($tablaMensajes)){
            if($elemento['Leido']==0){
                $nroMensajes++;
            }
        }
        
        return $nroMensajes;
    }
    
    function getTablaTransacciones($ci){
        include(dirname(dirname(__FILE__)).'/conexion.php');
        
        $arreglo=mysql_query("SELECT Id,Ci,Tipo_de_transaccion,Monto,Fecha,Hora,Saldo FROM Transacciones  WHERE Ci='$ci' ORDER BY Id DESC",$conex);
        
        return $arreglo;        
    }
    
    function getTablaApuestas($ci){
        include(dirname(dirname(__FILE__)).'/conexion.php');
        
        $arreglo=mysql_query("SELECT Id,Id_user,Id_mesa,Id_juego,Equipo,Monto,Fecha,Hora,Estado,Grupo FROM Apuestas  WHERE Id_user='$ci' ORDER BY Id DESC",$conex);
        
        return $arreglo;         
    }
    
    function getNombresJuego($Id_juego){
        include(dirname(dirname(__FILE__)).'/conexion.php');
        
        $arreglo=mysql_query("SELECT Id,Equipo1,Equipo2 FROM Juegos WHERE Id='$Id_juego'",$conex);
        $elemento = mysql_fetch_array($arreglo);
        
        
        return $elemento;         
    }
?>     