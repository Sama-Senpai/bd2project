<script src="js/main.js"></script>
<?php   
       
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $hotel=filter_input(INPUT_POST, 'hotel');
        $tipo=filter_input(INPUT_POST, 'tipo');
        $num=filter_input(INPUT_POST, 'num');
         $od="";
       
     
              $query2= mysql_query("CALL cambiarPoseeHab('$hotel','$tipo')");
       
       
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `habitacion`(`n_hab`, `cod_hotel`, `cod_CH`, `nPuerta`)                              
                                             VALUES(
                                            '$od','$hotel','$tipo','$num')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     
                }else{
                    echo 'Guardo Correctamente';
                   
                }
                header("Location:../../admin/agregarhabitacionInd.php");
           }  
              
?>

