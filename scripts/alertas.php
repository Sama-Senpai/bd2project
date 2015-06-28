<?php
        
if(isset(filter_input(INPUT_GET,"errorCode",FILTER_SANITIZE_NUMBER_INT)) && isset(filter_input(INPUT_GET,"errorType",FILTER_SANITIZE_NUMBER_INT))){
    $nroError=filter_input(INPUT_GET,"errorCode",FILTER_SANITIZE_NUMBER_INT);
    $tipoError=filter_input(INPUT_GET,"errorType",FILTER_SANITIZE_NUMBER_INT);
    
    //echo "Nro error: ".$nroError ." ";
    //echo "Tipo error: ".$tipoError;
        echo "holaaa";
    
    //Agregar en el switch los errores que hagan falta
    
    
    switch ($nroError) {
        case 1:
            $error = "Error: Usuario incorrecto";
            break;
        case 2:
            $error = "Error: Password incorrecto";
            break;
        case 3:
            $error = "Error al logearse, intentelo mas tarde";
            break;
        case 4:
            $error = "Debes iniciar sesión para poder continuar";
            break; 
        case 5:
            $error = "Usuario registrado satisfactoriamente";
            break;
        case 6:
            $error = "Complete todos los campos";
            break;
        case 7:
            $error = "Atención, Usted no se puede registrar a Royal Bets, es menor de 18 años";
            break;
        case 8:
            $error = "Ya existe un usuario con esa Cédula de Identidad";
            break;
        case 9:
            $error = "Ya existe un usuario con ese Correo Electrónico";
            break;
        case 10:
            $error = "Operación exitosa";
            break;
        case 11:
            $error = "No ha creado la mesa.";
            break;
        case 12:
            $error = "Se creo el juego correctamente";
            break;
        case 13:
            $error = "Se Cambio el resultado correctamente";
            break;
        case 14:
            $error = "No se pudo cambiar el Resultado del juego";
            break;
        case 15:
            $error = "El monto Minimo no puede Ser mayor que el maximo";
            break;
        
    }
    
?>

<?php

    //NO TOCA DE AQUI PARA ABAJO!

    switch ($tipoError) {
        case 1: //Danger         
?>
            <div class="alert alert-danger alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $error; ?>  
            </div>
<?php
            break;
        case 2: //info
?>
            <div class="alert alert-info alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $error; ?>  
            </div>
<?php
            break;
        case 3: //Success
?>
            <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $error; ?>  
            </div>
<?php
            break;
        case 4: //Warning
?>
            <div class="alert alert-warning alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $error; ?>  
            </div>
<?php
            break;        
    }   
}
?>
