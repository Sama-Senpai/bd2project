<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $descripcion=filter_input(INPUT_POST, 'desp');
        $descuento=filter_input(INPUT_POST, 'desc');
        $vig=filter_input(INPUT_POST, 'estado');
        $cod="";
        if($vig=="dis"){
            $vigencia=1;
        }else{
            $vigencia=0;
        }
      
        
        
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `catalogo_paquete`(`cod_cp`, `vigencia`, `descripcion`, `descuento`)                                
                                             VALUES(
                                            '$cod','$vigencia','$descripcion','$descuento')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     
                }else{
                    echo 'Guardo Correctamente';
                   
                }
                header("Location:../../admin/agregarCatPaq.php");
           }  
              
?>


