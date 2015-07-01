<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

    echo  $hotela=filter_input(INPUT_GET,"hotel");
     echo $ini=filter_input(INPUT_GET,"ini");
     echo $fin=filter_input(INPUT_GET,"fin");
    echo  $cedula=filter_input(INPUT_GET,"cedula");
    
    
    $query("CALL confirmar('$hotela', '$cedula','$ini', '$fin')");
    
    if($query){
        
       header("Location:./confirmacionReserva.php?errorCode=7&errorType=3");
      
        
    }else{
        
       header("Location:./confirmacionReserva.php?errorCode=8&errorType=4");
    }
    
   ?>