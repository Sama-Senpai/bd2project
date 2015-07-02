<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $hotel=filter_input(INPUT_POST, 'hotel');
        $tipo=filter_input(INPUT_POST, 'tipo');
        $precio=filter_input(INPUT_POST, 'precio');
        $desp=filter_input(INPUT_POST, 'desp');
        $cant=filter_input(INPUT_POST, 'cant');
        $cam=filter_input(INPUT_POST, 'cam');
        
     
        
        
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("CALL add_habxhotel('$hotel','$tipo','$precio','$cant','$cam','$desp')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                      header("Location:../../admin/agregarHabitacionxHotel.php?errorCode=9&errorType=1");
                }else{
                    echo 'Guardo Correctamente';
                    header("Location:../../admin/agregarHabitacionxHotel.php?errorCode=6&errorType=3");
                }
               
           }  
              
?>


