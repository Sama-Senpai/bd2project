<?php
    include '../conexion.php';
    
        $id_usr = $_POST['id_usr'];
        $producto = $_POST['producto'];
        $monto = $_POST['monto'];

         if (!$id_usr || !$producto || !$monto){
            header("Location:../../consumo.php");   
            echo'Error';
         }
         else{
             $queryCI = mysql_num_rows(mysql_query("SELECT * FROM Usuarios WHERE Ci='$id_usr'"));
   
             if($queryCI > 0){    // Si la Ci existe          
                    //Consumo realizado
                     // SQL
                        $query = mysql_query("INSERT INTO Consumos
                                                    (
                                                    Id_User,Producto,Monto
                                                    )
                                                    VALUES
                                                    (
                                                    '$id_usr','$producto','$monto'
                                                    )
                                            ");

                        if(!$query){
                            echo 'Error al insertar un producto';
                            
                        }else{
                            echo 'Guardo Correctamente';
                            header("Location:../../admin/Consumos.php?errorCode=10&errorType=3");
                        }


                        // Redireccion
                  // header("Location:../../consumos.php?errorCode=6&errorType=1");  
              }
              else{
              header("Location:../../admin/Consumos.php?errorCode=1&errorType=1");  
              }
          }
         
    
 ?>
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

