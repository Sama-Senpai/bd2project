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
        $posee="0";
     
        
        
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `habitacion_hotel`(`Hotel_cod`, `catalogo_habitacion_cod_ch`, `precio_dia`, `cantidad`, `NroAdicionales`, `descripcion`,`poseeHab`)                                
                                             VALUES(
                                            '$hotel','$tipo','$precio','$cant','$cam','$desp','$posee')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     
                }else{
                    echo 'Guardo Correctamente';
                   
                }
                header("Location:../../admin/habitacionXhotel.php");
           }  
              
?>


