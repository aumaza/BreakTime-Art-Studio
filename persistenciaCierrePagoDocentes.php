<?php

function guardarDocMesAnio($nombreApellido,$mes,$anio,$cierre){

			mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and mes = '$mes' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (nombreApellido,mes,anio,total,concepto)".
                "VALUES ".
                "('$nombreApellido','$mes','$anio','$row[total]','$cierre')";

            $result = mysql_query($save);
        
                     if($result)
                      {
                          echo '<div class="alert alert-success" role="alert">';
                          echo "Registro Guardado Exitosamente!!";
                          echo "</div><hr>";
                       }
            
                          else 
                            {
                                echo '<div class="alert alert-success" role="alert">';
                                echo "Registro Guardado Exitosamente!!";
                                echo "</div><hr>";
                             } 
                         }


function guardarDocAnio($nombreApellido,$anio,$cierre){

			mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (nombreApellido,anio,total,concepto)".
                "VALUES ".
                "('$nombreApellido','$anio','$row[total]','$cierre')";

            $result = mysql_query($save);
        
                     if($result)
                      {
                          echo '<div class="alert alert-success" role="alert">';
                          echo "Registro Guardado Exitosamente!!";
                          echo "</div><hr>";
                       }
            
                          else 
                            {
                                echo '<div class="alert alert-success" role="alert">';
                                echo "Registro Guardado Exitosamente!!";
                                echo "</div><hr>";
                             }


}










?>