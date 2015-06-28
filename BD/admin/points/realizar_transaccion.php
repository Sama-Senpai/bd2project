<?php

     //Conexion
        include '../../conexion.php';

    function getChangeSaldo($ci,$tran_type,$monto){
        
      //Busca el saldo del cliente  
        $sel0=mysql_query("SELECT Saldo FROM Transacciones WHERE Ci='$ci' ORDER BY Id DESC LIMIT 1 ");
       
    //Verifica busqueda de saldo    
      if(!$sel0){   return 0; echo 'Error al buscar cliente';   }
       else  {
                  
         $arreglo=mysql_fetch_array($sel0);
        
      //Comprueba que el monto a operar no sea mayor que el saldo en caso de un cobro o retiro    
        if ( $arreglo['Saldo'] < ($monto*(-1)) ) { 
            echo 'El Saldo del cliente no es suficiente para realizar esta operacion';
            return 1;
        } else {
          
            $saldo=$arreglo['Saldo']+$monto;
          
          //Conseguir fecha actual  
            $fecha = date("d/m/Y");
           
          //Conseguir hora actual  
            $datos_tiempo = date("g-i-A"); 
             list($hour, $minuto, $ampm)=explode('-',$datos_tiempo);
              $hora = $hour.":".$minuto." ".$ampm;        // Hora actual
           
          //inserta la nueva fila de transacciones   
            $sql = "INSERT INTO Transacciones (Ci, Tipo_de_transaccion, Monto, Saldo, Fecha, Hora)
                   VALUES ('$ci','$tran_type','$monto','$saldo','$fecha','$hora')";  
        
             $sel= mysql_query($sql);
         
           //Ultimo Comprobante para verificar que se halla realizado la transaccion correctamente  
             if(!$sel){
                 echo 'Error al procesar la Transaccion'; return 2;
             } else {
                 echo 'Transaccion procesada correctamente';
                 return 3;
               }
          }
       }  
    }        
?>    

   <?php
     //Cuando no se pudo encontrar al usario a traves de su cedula en la BD se retorna 0
     //Cuando el monto a retirar es mayor que el saldo se retorna 1
     //Cuando la Transaccion tuvo un problema se retorna 2 
     //Cuando la Transaccion es procesada correctamente se retorna 3
   ?>