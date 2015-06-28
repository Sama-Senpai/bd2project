<?php  
      if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                        }
                   
        $_SESSION['carrito'][$_SESSION['juegos']][0]=$_POST["equipo"]; 
        $_SESSION['carrito'][$_SESSION['juegos']][1]=$_POST["costo"]; 
        $_SESSION['carrito'][$_SESSION['juegos']][2]=$_POST["idmesa"]; 
        $_SESSION['carrito'][$_SESSION['juegos']][3]=$_POST["LoV"]; 
        $_SESSION['carrito'][$_SESSION['juegos']][4]=$_POST["idjuego"];   
        $_SESSION['juegos']++;
?>