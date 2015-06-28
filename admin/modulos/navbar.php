<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="./index.php"><img src=" ../img/roya100.png">RoyalBets</a>
    </div>
    <div class="navbar-collapse collapse">
        
      <ul class="nav navbar-nav">
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión Hotel<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="">Editar</a></li>
            <li><a href="agregarHabitacionInd.php">Agregar Habitacion</a></li>            
            <li><a href="paquetexhotel.php">Agregar Paquetes</a></li>
            <li><a href="">Editar Habitacion</a></li>
            <li><a href="">Editar Paquetes</a></li>  
            <li><a href="">Otra</a></li>
          </ul>
        </li>
      </ul>
        
         <ul class="nav navbar-nav">
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión<b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="agregarHotel.php">Agregar Hotel</a></li>
              <li><a href="agregarCatPaq.php">Agregar Paquete</a></li>            
              <li><a href="agregarCatHab.php">Agregar Habitacion</a></li>
            <li><a href="">Editar Paquetes</a></li>
            <li><a href="">Editar Habitacion</a></li>  
            <li><a href="">Otra</a></li>
          </ul>
        </li>
      </ul>
        
        
        <?php 
           /* if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();

            }
            
            if(isset($_SESSION['username']) && $_SESSION['permisos']==255){*/
        ?> 
                    
                    <p class="navbar-text navbar-right">Bienvenido <a href="../cuenta.php" role="button"></a>
                        
                      
                        <a class="btn btn-xs btn-danger" href="" role="button">Cerrar sesión</a>
                        <a class="btn btn-xs btn-warning" href="../index.php" role="button">Salir</a>
                    </p>
                        
        <?php 
        /*
            }else{
                header("Location:./restringido.php");
            } */  
        ?>        
        

        
        
    </div><!--/.navbar-collapse -->
  </div>
</div>
