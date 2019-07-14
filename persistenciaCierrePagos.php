<?php

//Se guarda la sumatoria de pagos del mes seleccionado de un año determinado
function guardarMes($cierre,$mes,$anio)
{
			       
               mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagos where mes = '$mes' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagos (concepto,mes,anio,total)".
                "VALUES ".
                "('$cierre','$mes','$anio','$row[total]')";

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


//Se guarda la sumatoria de los pagos en un año determinado
function guardarAnio($cierre,$anio)
{

	       
               mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagos where anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagos (concepto,anio,total)".
                "VALUES ".
                "('$cierre','$anio','$row[total]')";

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