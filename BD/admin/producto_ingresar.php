<script src="js/main.js"></script>
<?php   
        // Conexion
        include '../conexion.php';

	// Recibe las Variables
        $id         = $_POST['id'];
        $producto	= $_POST['producto'];
	$monto	= $_POST['monto'];
	
        
       
        
        if (!id || !producto || !monto ){
            header("Location:../../admin/Consumos.php");   
            echo'entra todo';
        }else{
           

                // SQL
                $query = mysql_query("INSERT INTO Consumos
                                            (
                                            Id_User,Producto,Monto
                                            )
                                            VALUES
                                            (
                                            '$id','$producto','$monto'
                                            )
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                }else{
                    echo 'Guardo Correctamente';
                }
                
                
                // Redireccion
                header("Location:../../admin/Consumos.php?errorCode=5&errorType=3");	
              
                
            }
        
?>


