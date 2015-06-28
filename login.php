<?php require_once('./modulos/header.php'); ?>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<?php require_once('./modulos/navbar.php'); ?>         
    <br/><br/>
    <!-- Main jumbotron for a primary marketing message or call to action 
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
      </div>
    </div>-->

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8">
            
        <?php require_once('./scripts/alertas.php'); ?>       
            
          <h2>Login</h2>
            <?php
                if(isset($_GET['idMesa'])){
                    $idMesa=$_GET['idMesa'];
            ?>  
                <form class="col-lg-4" action="scripts/usuarios/login.php?idMesa=<?php echo $idMesa;?>" method="POST">
            <?php                    
                }else{
            ?>
            <form class="col-lg-4" action="scripts/usuarios/login.php" method="POST">
            <?php
                }
            ?>                    
                    
                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" class="form-control" required/>
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Contraseña" name="pass" class="form-control" required/>
                </div>
                <button type="submit" class="btn btn-warning" >Entrar</button>
            <?php
                if(isset($_GET['idMesa'])){
            ?>                 
                <a href="registro.php?idMesa=<?php echo $idMesa;?>" class="btn btn-success">Registrar</a>
            <?php
                }else{
            ?>
                <a href="registro.php" class="btn btn-success">Registrar</a>
            <?php                
                }
            ?>                     
            </form>   
          
          
        </div>

<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>


<?php require_once('./modulos/footer.php'); ?>       
      
    </div> <!-- /container -->
    
<?php require_once('./modulos/scriptjs.php'); ?>     
    
    </body>
</html>
