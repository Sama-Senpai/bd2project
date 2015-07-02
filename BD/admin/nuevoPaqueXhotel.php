<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $hotel=filter_input(INPUT_POST, 'hotel');
        $catalogoP=filter_input(INPUT_POST, 'paquete');
        $vig=filter_input(INPUT_POST, 'estado');
        $cod="";
        
      if($vig=="dis"){
            $vigencia=1;
        }else{
            $vigencia=0;
        }
           
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `paquetes`(`numero_paquete`, `catalogo_paquete_cod_cp`, `cod_hotel`, `vigencia`)
                                            VALUES(
                                            '$cod','$catalogoP','$hotel','$vigencia')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     header("Location:../../admin/paqueteXhotel.php?errorCode=9&errorType=1");
                     
                }else{
                    echo 'Guardo Correctamente';
                     header("Location:../../admin/paqueteXhotel.php?errorCode=6&errorType=3");
                   
                }
                
           }  
              
?>

