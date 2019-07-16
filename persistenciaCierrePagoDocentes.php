<?php

function guardarDocDiaMesAnio($nombreApellido,$dia,$mes,$anio,$cierre){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and dia = '$dia' and mes = '$mes' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (nombreApellido,dia,mes,anio,total,concepto)".
                "VALUES ".
                "('$nombreApellido','$dia', '$mes','$anio','$row[total]','$cierre')";

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


function buscarDocDiaMesAnio($nombreApellido,$dia,$mes,$anio)
{

        $sql = "SELECT * FROM pagoDocentes where nombreApellido = '$nombreApellido' and dia = '$dia' and mes = '$mes' and anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and dia = '$dia' and mes = '$mes' and anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}




function buscarDocMesAnio($nombreApellido,$mes,$anio)
{

        $sql = "SELECT * FROM pagoDocentes where nombreApellido = '$nombreApellido' and mes = '$mes' and anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and mes = '$mes' and anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarDocAnio($nombreApellido,$anio)
{

        $sql = "SELECT * FROM pagoDocentes where nombreApellido = '$nombreApellido' and anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where nombreApellido = '$nombreApellido' and anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarDiaMesAnio($dia,$mes,$anio)
{

        $sql = "SELECT * FROM pagoDocentes where dia = '$dia' and mes = '$mes' and anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where dia = '$dia' and mes = '$mes' and anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarMesAnio($mes,$anio)
{

        $sql = "SELECT * FROM pagoDocentes where mes = '$mes' and anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where mes = '$mes' and anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarAnio($anio)
{

        $sql = "SELECT * FROM pagoDocentes where anio ='$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(monto) as total FROM pagoDocentes where anio ='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['monto']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['total']."</td>";
                          echo "<td>".$fila['concepto']."</td>";
                          echo "<td class='text-nowrap'>";
                          echo "</td>";
                          echo "</tr>";
                          $i++;
                          $count++;
                    }
      
                        echo "</table>";
                        echo "<br><br><hr>";
                        echo "Cantidad de Pagos Realizados: " .$count;
                        echo "<hr>";
                        echo "La suma Total es: $" .$row["total"];
                        echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function guardarDiaMesAnio($dia,$mes,$anio,$cierre){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where dia = '$dia' and mes = '$mes' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (dia,mes,anio,total,concepto)".
                "VALUES ".
                "('$dia', '$mes','$anio','$row[total]','$cierre')";

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

function guardarMesAnio($mes,$anio,$cierre){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where mes = '$mes' and anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (mes,anio,total,concepto)".
                "VALUES ".
                "('$mes','$anio','$row[total]','$cierre')";

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

function guardarAnio($anio,$cierre){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(monto) as total FROM pagoDocentes where anio ='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO pagoDocentes (anio,total,concepto)".
                "VALUES ".
                "('$anio','$row[total]','$cierre')";

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