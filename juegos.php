    <body>

                   <?php  if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                        }
                    ?>
         <script type='text/javascript'>
            <?php
                $js_array = json_encode($_SESSION['carrito']);
                $js_juegos = json_encode($_SESSION['juegos']);
                        echo "var javascript_array = ". $js_array . ";";
                        echo "var juegos = ". $js_juegos . ";";
                $js_array1 = json_encode($_SESSION['arrayjugados']);
                $js_juegos1 = json_encode($_SESSION['jugados']);
                        echo "var javascript_array1 = ". $js_array1 . ";";
                        echo "var jugados = ". $js_juegos1 . ";";
            ?>
                
                var lineaTexto="";
                var lineaTexto1="";
                var array;
                var array1;
                lineaTexto = javascript_array.toString();
                lineaTexto1 = javascript_array1.toString();
                array = lineaTexto.split(",");
                array1 = lineaTexto1.split(",");
                
            </script>     
        <script>
            var arreglobd=[2];
            for(i=0;i<5;i++){
                arreglobd[i]=[];
            }
            var arreglojugados=[];
            for(i=0;i<jugados;i++){
                arreglojugados[i] = array1[i];
            }
            for(i=0,cont=0;i<juegos;i++){
                for(j=0;j<5;j++,cont++){
                    arreglobd[j][i] = array[cont];                    
                }               
            }
            
            function actualizar(cantidad){
                entra = 0;
                for(i=0;i<juegos || entra === 0;i++){      
                    for(cont=1; cont <= cantidad ;cont++){
                    var id_L="L"+cont;
                    var id_V="V"+cont;
                    var id_C="C"+cont; 
                    var id_I="I"+cont;
                    id = document.getElementById(id_I).value;
                    for(j=0,jugado=0;j<jugados;j++){
                        if(arreglojugados[j]===id){
                            jugado=1;
                        }                        
                    }
                        if(document.getElementById(id_L).value===arreglobd[0][i] || document.getElementById(id_V).value===arreglobd[0][i] || jugado === 1  ){
                            if(document.getElementById(id_L).value===arreglobd[0][i] || jugado === 1){
                                document.getElementById(id_L).disabled=true; 
                                document.getElementById(id_V).disabled=true;
                                document.getElementById(id_C).disabled=true;
                            }else{
                                document.getElementById(id_L).disabled=true; 
                                document.getElementById(id_V).disabled=true;
                                document.getElementById(id_C).disabled=true;
                            }
                        }
                    }
                    if(i===juegos){
                        entra = 1;
                    }
                } 
                calcularTotal();
            }
            
        function Borrar(){            
            for(i=0,remover=-1,removidos=0;i<juegos;i++){
                if(document.getElementById(i).checked){
                    remover = i;
                    for(j=i-removidos;j<juegos;j++){
                        for(k=0;k<5;k++){
                            arreglobd[k][j]=arreglobd[k][j+1];
                        }
                    }                    
                    $.ajax ({
                        type: "POST",
                        url: "./BD/Mesa/removercarrito.php" ,
                        data: { remover: remover-removidos }
                    }).done(function(msg){     });
                    
                    
                    removidos++;
                }                   
            }
            setTimeout("location.reload(true);",1);
            juegos = juegos - removidos;
            if(remover===-1){
                window.alert("No ha escogido ningun equipo a remover");
            }                      
        }
        
        function delayer(){
            window.location = "BD/Mesa/cargarApuesta.php";
        }
        function validarCarrito(){
            if (confirm("¿Está seguro que las apuestas almacenadas en el carrito son correctas?. Si selecciona 'Aceptar' dichas apuestas se cargaran a su cuenta.")){
                setTimeout('delayer()', 1);
                
            }
        }
        
        function calcularTotal(){
            var total=0;
            for (i=0; i<juegos; i++){               
                total += parseInt(arreglobd[1][i]);               
            } 
            document.getElementById('mTotal').innerHTML = total.toString() + " Bs.";
            
        }

        function seleccion(cantidad){
                var minimo = 0;
                var maximo = 0;
                var costo = 0;
                for(cont=1; cont <= cantidad ;cont++){
                    var id_L="L"+cont;
                    var id_V="V"+cont; 
                    var id_C="C"+cont;
                    var id_I="I"+cont;
                    var id_min="M"+cont;
                    var id_max="T"+cont;
                    minimo = parseInt(document.getElementById(id_min).value);
                    maximo = parseInt(document.getElementById(id_max).value);
                    costo = parseInt(document.getElementById(id_C).value); 
//                    window.alert(minimo);
//                    window.alert(maximo);
//                    window.alert(costo);
                    if (((document.getElementById(id_L).checked) || (document.getElementById(id_V).checked)) && ((costo>minimo) && (costo<=maximo))){
                            if (document.getElementById(id_L).checked) {
//                                window.alert("local");
                                arreglobd[0][juegos]=document.getElementById(id_L).value; 
                                arreglobd[1][juegos]= costo;
                                arreglobd[2][juegos] = <?php echo $idmesa; ?>;
                                arreglobd[3][juegos]=0;
                                arreglobd[4][juegos]=document.getElementById(id_I).value;
                                    $.ajax ({
                                        type: "POST",
                                        url: "./BD/Mesa/actualizarcarrito.php" ,
                                        data: { equipo: arreglobd[0][juegos], costo: arreglobd[1][juegos], idmesa:arreglobd[2][juegos], LoV:arreglobd[3][juegos], idjuego:arreglobd[4][juegos]}

                                    }).done(function(msg){      });
                                    juegos++;                               
                            }else{ 
//                                window.alert("visitante");
                                arreglobd[0][juegos]=document.getElementById(id_V).value; 
                                arreglobd[1][juegos]=costo;
                                arreglobd[2][juegos] =  <?php echo $idmesa; ?>;
                                arreglobd[3][juegos]=1;
                                arreglobd[4][juegos]=document.getElementById(id_I).value;
                                    $.ajax ({
                                        type: "POST",
                                        url: "./BD/Mesa/actualizarcarrito.php" ,
                                        data: { equipo: arreglobd[0][juegos], costo: arreglobd[1][juegos], idmesa:arreglobd[2][juegos], LoV:arreglobd[3][juegos], idjuego:arreglobd[4][juegos]}

                                    }).done(function(msg){      });
                                    juegos++;                                
                            }         
                     }else{
                         if(document.getElementById(id_C).value !== ""){
                            window.alert("Ingreso un monto inválido");
                            document.getElementById(id_C).value = "";    
                         }
                    }
                 }
                 if ((juegos>=1) && (juegos<=12)){
                    setTimeout("location.reload(true);",1); 
                 }else{
                    window.alert("Recuerde: Para apostar debe seleccionar un equipo con su monto respectivo. En apuestas de tipo 'Directa' debe elegir sólo un equipo. Para 'Parlay' puede seleccionar de 2 a 12 equipos.");
                 }            
            }

        </script>

<?php 
    require_once('./modulos/navbar.php');
?>         

        
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Apuesta</h1> <?php //echo $_SESSION['juegos']; ?> 
        <p>En esta sección encontrarás los juegos disponibles de la mesa especifificada.</p>
      </div>
    </div> 
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8"> 
         <div class="table-responsive"> 
             <!--<form>-->
             <table id="tablajuegos" class="table table-bordered" > 
                 <thead>
                        <tr>
                                <th></th>
                                <th>Local</th>
                                <th>vs.</th>
                                <th>Visitante</th>
                                <th></th>
                                <th>Monto de apuesta</th>
                        </tr>  
                </thead>
              <?php
                     date_default_timezone_set ("America/Caracas");
                    $fecha = date("y-m-d"); //Fecha Actual
                    $hraActual = date("G:i"); //Hora Actual
                    $cont=0;
                    while ($registro1= mysql_fetch_row($datosjuegos)){
                              $contador1 = 0;
                              $juegoquitado = 1;
                              foreach ($registro1 as $clave1){
                                $array1[$contador1]= $clave1;  
                                $contador1++;
                              }
                              
                 ?>

                <tbody align="center"> 
                    <?php   
                         if (strtotime($array1[9] ) >= strtotime($fecha) && strtotime($array1[8] ) <= strtotime($fecha) ){
                             $juegoquitado = 0;
                             if(strtotime($array1[9]) == strtotime($fecha)){
                                 if(strtotime($array1[11] ) <= strtotime($hraActual)){
                                     $juegoquitado = 1;
                                 }
                             }
                             if(strtotime($array1[8]) == strtotime($fecha)){
                                 if(strtotime($array1[10] ) >= strtotime($hraActual)){
                                     $juegoquitado = 1;
                                 }
                             }
                         }
                         
                         if($juegoquitado==0){
                             $cont++;                                                
                    ?>  
                
                        <tr>
                            <input type='hidden' id="I<?php echo $cont; ?>" value="<?php echo $array1[0]; ?>" style=" border: transparent;">
                            <input type='hidden' id="M<?php echo $cont; ?>" value="<?php echo $array1[13]; ?>" style=" border: transparent;">
                            <input type='hidden' id="T<?php echo $cont; ?>" value="<?php echo $array1[12]; ?>" style=" border: transparent;">
                                <td>
                                    <input type="radio" name="<?php echo $cont; ?>" id="L<?php echo $cont; ?>" value="<?php echo $array1[2]; ?>" required>
                                </td>
                                <td data-title="Local" ><?php echo $array1[2]; ?></td>
                                <td><strong>vs.</strong></td>
                                <td data-title="Visitante" ><?php echo $array1[3]; ?></td>
                                <td>
                                    <input type="radio" name="<?php echo $cont; ?>" id="V<?php echo $cont; ?>" value="<?php echo $array1[3]; ?>" required>
                                </td>
                                <td>
                                    <input title="Máx. 999999999" type="numeric" id="C<?php echo $cont; ?>" placeholder="Bs." required>
                                </td>                                  
                        </tr> 
                         
                    <?php
                          
                         }     
                    }if($cont!=0){ ?>      
                </tbody>         
            </table>  
             <div id="pageNavTransacciones" style="padding-top: 20px" align="center">
             </div>
                                
            <script type="text/javascript">
                var pager = new Pager('tablajuegos', 3);
                pager.init();
                pager.showPageNav('pager', 'pageNavTransacciones');
                pager.showPage(1);
            </script>
             
            <div align="right">
                <button type="submit" class="btn btn-warning"  onclick="seleccion(<?php echo $cont; ?>)">  Agregar al Carrito </button>                              
            </div>
            <!--</form>-->
     
                         <?php }else{  ?>
                 <div align='center'> <?php echo "NO HAY JUEGOS DISPONIBLES";?> </div> </table> <?php }?>  
            </div>
            <br>
         <?php if($_SESSION['juegos']!=0){ ?>
        <div class="table-responsive"> 
             <!--<form>-->
             <table class="table table-bordered" style="width: 400px;"> 
                 <strong style='padding-left: 110px ;'>Equipos</strong>
                 <strong style='padding-left: 125px ;'>Monto</strong> 
              <?php
                    $conta=0;
                    for ($i=0; $i<$_SESSION['juegos']; $i++){                 
                 ?>       
                 <tbody>
                     <tr>
                        <td align="center" style="width: 50px; ">
                            <input id="<?php echo $i; ?>" type="radio" required/>   
                            </td>
                            <td align="center" style="width: 80px; "> <?php echo $_SESSION['carrito'][$i][0]; ?></td>
                            <td align="right" style="width: 50px; "><?php echo $_SESSION['carrito'][$i][1]." Bs."; ?></td>                                 
                        </tr> 
  
                    <?php } ?>   
                 </tbody>       
            </table>            
          </div>
          <strong>Total</strong>
            <div id='mTotal' align='left' style='border: 1px solid #dddddd; width: 150px; height: 25px;'>
                
            </div>
          <br>
          
            <div align="left">               
                <button id="botonApostar"  class="btn btn-warning" onclick="validarCarrito()"> Apostar </button>                                
                <button id="remover"  class="btn btn-warning" onclick="Borrar()"> Remover del Carrito </button>                       
            </div>
          
         <?php }?>   
         </div>
          
          <script> actualizar(<?php echo $cont ?>);  </script>

<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>

<?php require_once('./modulos/footer.php'); ?> 
      
      
    </div> <!-- /container -->
<?php require_once('./modulos/scriptjs.php'); ?> 
    
    </body>
</html>
