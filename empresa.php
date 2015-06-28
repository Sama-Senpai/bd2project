<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
    <style>
    #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
        var map;
        function initialize() {
          var mapOptions = {
            zoom: 17,
            center: new google.maps.LatLng(8.297143, -62.712194)
          };
          map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
<?php require_once('./modulos/navbar.php'); ?> 

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Royal Bets</h1>
        <p>Es una empresa fundada 2013 por un grupo de jóvenes desarrolladores en el área de informática.<br> 
            Nuestra misión es ofrecerle confianza, seguridad y transparencia al cliente al momento de realizar sus transacciones.
        </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8">    
            <div class="col-lg-8">
                <h2>¿Quiénes somos?</h2>
              <p>
                  Estudiantes de Ingeniería Informática.<br> 
                  Universidad Católica Andrés Bello Extensión Guayana.
              </p>   
            </div>
            <div class="col-lg-8">
                <h2>Contacto</h2>
                <p>Email: royalbetsca@gmail.com<br>Teléfono: 0286-9235588<br><br> 
                  <br>
                  <div id="map-canvas" style="width: 100%; height: 400px;"></div>
              </p>

            </div>
        </div>       

<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>

<?php require_once('./modulos/footer.php'); ?> 
      
      
    </div> <!-- /container -->        
    

<?php require_once('./modulos/scriptjs.php'); ?>     
    
    </body>
</html>