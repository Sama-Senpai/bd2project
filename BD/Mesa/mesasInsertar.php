<?php   
        // Conexion
        include '../conexion.php';

	// Recibe las Variables
	$nombreMesa	= $_POST['nombreMesa'];
	$descripcion	= $_POST['descripcion'];
        $deporte         = $_POST['deporte'];
        $capacidad	= $_POST['capacidad'];
        $estado = 1;
        
      
        if (empty($_POST['nombreMesa']) || empty($_POST['nombreMesa']) || empty($_POST['nombreMesa']) || empty($_POST['nombreMesa']) )  
            echo'ERROOOORRR';
        else{
    

                // SQL
                $query = mysql_query("INSERT INTO Mesas
                                            (
                                            Capacidad,Deporte,Descripcion,Mesa,Estado
                                            )
                                            VALUES
                                            (
                                            '$capacidad','$deporte','$descripcion','$nombreMesa','$estado'
                                            )
                                    ");

                if(!$query){
                    echo 'Error al insertar una mesa en la BD';
                }else
                    echo 'Exito';

                // Redireccion
                mysql_close();
                header("Location: ../../admin/gestionmesas.php");	
           
        }
?>
