<?php   
        
        // Conexion
        include '../conexion.php';

    echo  $hotela=filter_input(INPUT_GET,"hotel");
     echo $ini=filter_input(INPUT_GET,"ini");
     echo $fin=filter_input(INPUT_GET,"fin");
    echo  $cedula=filter_input(INPUT_GET,"cedula");
    
    
    $query=mysql_query("UPDATE reserva_hospedaje
SET reserva_hospedaje.rc='1',reserva_hospedaje.pagado='1'
WHERE reserva_hospedaje.cod_hotel='$hotela' AND 
   reserva_hospedaje.Cliente_CI='$cedula' AND
   reserva_hospedaje.rc='0' AND
   reserva_hospedaje.f_inicio='$ini' AND reserva_hospedaje.f_fin='$fin'");
    
    if($query){
        echo "borralo";
       header("Location:../../confirmacionReserva.php?errorCode=7&errorType=3");
      
        
    }else{
         echo "no lo borralo";
       header("Location:../../confirmacionReserva.php?errorCode=8&errorType=4");
    }
    
   ?>