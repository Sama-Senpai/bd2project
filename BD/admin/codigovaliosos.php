     <div class="form-group">
                  <label for="Deporte" class="col-md-2">
                    Deporte:
                  </label>
                  <div class="col-md-10">
                      <select name="deporte">
                          <option value="Futbol">Futbol</option> 
                          <option value="Tenis">Tenis</option>
                          <option value="Beísbol">Beísbol</option>
                          <option value="NHL">NHL</option>
                          <option value="Baloncesto">Baloncesto</option>
                          <option value="Voleibol">Voleibol</option>
                      </select>
                  </div>
                </div>  


     while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        
                        $i=1;
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                                 $contador ++;                        
                                }                     
             $i++; } 
