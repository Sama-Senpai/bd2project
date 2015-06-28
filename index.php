<?php require_once('./modulos/header.php'); ?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
<?php require_once('./modulos/navbar.php'); ?> 

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
<!--    
    <div class="jumbotron">
      <div class="container">
        <h1>Royal Bets</h1>
        <p>Alguna info...</p>
        <p><a class="btn btn-primary btn-lg">Apostar, Ahora! &raquo;</a></p>
      </div>
    </div>
-->
    <!-- Carousel
    ================================================== -->
    <!--<div class="col-lg-12"> -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
            <img src="img/vanp3.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Bienvenido!</h1>
              <p>apostar ahora es más rápido, confiable y sencillo...</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/money.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Juega Ahora!</h1>
              <p>vive, disfruta y gana...</p>
              <p><a class="btn btn-lg btn-warning" href='mesas.php' role="button">Apostar</a></p>
            </div>
          </div>
        </div>
        <div class="item">
            <img src="img/f1.jpg" alt="Third slide">-->
          <div class="container">
            <div class="carousel-caption">
              <h1>Conoce tus resultados</h1>
              <p>Sé el primero...</p>
              <p><a class="btn btn-lg btn-warning" href='resultados.php' role="button">Resultados</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <!--</div>--> 
    <?php //require_once('./modulos/sidebar.php'); ?> 
    
    <!-- /.carousel -->
 
    <!--<div class="container">-->
      <!-- Example row of columns --
      <div class="row">
          <div class="col-lg-8">
            <div class="col-sm-4">
              <h2>Fútbol</h2>
              <img src=" img/futbol3.jpg">
              <p><br><?php// echo "<a class='btn btn-default' href='mesas.php?filter=Futbol'> Apostar &raquo; </a>"; ?></p>
            </div>
            <div class="col-sm-4">
              <h2>Beísbol</h2>
              <img src=" img/beisbol.jpg">
              <p><br><?php //echo "<a class='btn btn-default' href='mesas.php?filter=Beisbol'> Apostar &raquo; </a>"; ?></p>
           </div>
            <div class="col-sm-4">
              <h2>Baloncesto</h2>
              <img src=" img/nba.jpg">
              <p><br><?php //echo "<a class='btn btn-default' href='mesas.php?filter=Baloncesto'> Apostar &raquo; </a>"; ?></p>
            </div>
            <div class="col-sm-4">
              <h2>NHL</h2>
              <img src=" img/nfl.jpg">
              <p><br><?php //echo "<a class='btn btn-default' href='mesas.php?filter=NHL'> Apostar &raquo; </a>"; ?></p>
            </div>
            <div class="col-sm-4">
              <h2>Tenis</h2>
              <img src=" img/tenis.jpg">
              <p><br><?php// echo "<a class='btn btn-default' href='mesas.php?filter=Tenis'> Apostar &raquo; </a>"; ?></p>
           </div>
            <div class="col-sm-4">
              <h2>Voleibol</h2>
              <img src=" img/voleibol.png">
              <p><br><?php //echo "<a class='btn btn-default' href ='mesas.php?filter=Voleibol'> Apostar &raquo; </a>"; ?></p>
           </div>             


        
          </div>

          
        
<?php //require_once('./modulos/sidebar.php'); ?> 
          
          -->
      <!--</div>-->
    <div class="col-lg-4"></div>
    <div class="col-lg-1"></div>
    <div class="col-lg-3">
        <?php require_once('./modulos/footer.php'); ?> 
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4"></div>
    <!--</div>  /container -->        
    
<?php require_once('./modulos/scriptjs.php') ;?> 
    
    </body>
</html>
