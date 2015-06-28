<?php
      if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                        }
                   
         
        for($i=$_POST["remover"];$i<$_SESSION['juegos'];$i++){
            $_SESSION['carrito'][$i][0]=$_SESSION['carrito'][$i+1][0];
            $_SESSION['carrito'][$i][1]=$_SESSION['carrito'][$i+1][1];
            $_SESSION['carrito'][$i][2]=$_SESSION['carrito'][$i+1][2];
            $_SESSION['carrito'][$i][3]=$_SESSION['carrito'][$i+1][3];
            $_SESSION['carrito'][$i][4]=$_SESSION['carrito'][$i+1][4];
        }
        $_SESSION['juegos']--;
?>



