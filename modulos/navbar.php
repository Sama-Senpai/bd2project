<?php require_once('./BD/Usuarios/consultar_saldo.php'); ?>
<?php 

    require_once('./BD/Usuarios/cuenta.php'); 
    
?>


<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php"><img src=" img/roya100.png">RoyalBets</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
          <li><a href="reservaHospedaje1.php">Reserva/Hospedaje</a></li>
          <li><a href="">Confirmacion</a></li>
          <li><a href="">Paquetes</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Información<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">La Empresa</li>
            <li><a href="empresa.php">Quiénes somos</a></li>
            <li><a href="empresa.php">Contacto</a></li>
          </ul>
        </li>
      </ul>
        
        
        
                    <!-- <form class="navbar-form navbar-right">
                        
                        <div class="form-group">
                            <h4>Bienvenido </h4>
                        </div>
                        <div class="form-group">
                          <a href="cuenta.php" > </a>
                        </div>
                        -->  
                        
                        
                    </form>     
              
                        
            
                    <form class="navbar-form navbar-right" action="scripts/usuarios/login.php" method="POST">
                       
                        <button type="submit" class="btn btn-success" >Administracion</button>
                     
                    </form>                
      
        

        
        
    </div><!--/.navbar-collapse -->
  </div>
</div>

