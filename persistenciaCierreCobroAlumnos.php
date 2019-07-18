<?php

//Guardar Alumnos
function guardarAlum($nombreApellido){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum1 FROM actividades where nombreApellido='$nombreApellido'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (alumno,acum1)".
                   "VALUES".
                   "('$nombreApellido','$row[acum1]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

                         }



function guardarAlumDiaMesAnio($nombreApellido,$dia,$mes,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum2 FROM actividades where nombreApellido='$nombreApellido' and dia='$dia' and mes='$mes' and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (alumno,dia,mes,anio,acum2)".
                   "VALUES".
                   "('$nombreApellido', '$dia', '$mes','$anio','$row[acum2]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }




function guardarAlumMesAnio($nombreApellido,$mes,$anio){

			mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum3 FROM actividades where nombreApellido='$nombreApellido' mes='$mes' and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (alumno,mes,anio,acum3)".
                   "VALUES".
                   "('$nombreApellido', '$mes','$anio','$row[acum3]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         
                         }



//Busqueda Alumnos

function buscarAlumno($nombreApellido){

     $sql = "SELECT * FROM actividades where nombreApellido = '$nombreApellido'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where nombreApellido = '$nombreApellido'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarAlumDiaMesAnio($nombreApellido,$dia,$mes,$anio)
{

        $sql = "SELECT * FROM actividades where nombreApellido = '$nombreApellido' and dia = '$dia' and mes = '$mes' and anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where nombreApellido = '$nombreApellido' and dia = '$dia' and mes = '$mes' and anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                      }




function buscarAlumMesAnio($nombreApellido,$mes,$anio)
{

        $sql = "SELECT * FROM actividades where nombreApellido = '$nombreApellido' and mes = '$mes' and anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where nombreApellido = '$nombreApellido' and mes = '$mes' and anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarAlumAnio($nombreApellido,$anio)
{

        $sql = "SELECT * FROM actividades where nombreApellido = '$nombreApellido' and anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where nombreApellido = '$nombreApellido' and anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


//Busqueda por periodo

function buscarDiaMesAnio($dia,$mes,$anio)
{

        $sql = "SELECT * FROM actividades where dia = '$dia' and mes = '$mes' and anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where dia = '$dia' and mes = '$mes' and anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarMesAnio($mes,$anio)
{

        $sql = "SELECT * FROM actividades where  mes = '$mes' and anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where mes = '$mes' and anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarAnio($anio)
{

        $sql = "SELECT * FROM actividades where anio = '$anio'";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "SELECT sum(valor) as total FROM actividades where anio = '$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Docente</th>
                    <th class='text-nowrap text-center'>Monto Pagado</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['actividad']."</td>";
                          echo "<td>".$fila['nombreApellido']."</td>";
                          echo "<td>".$fila['style']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['docente']."</td>";
                          echo "<td>".$fila['valor']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
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
                        echo '<hr> <a href="facturacion.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function guardarDiaMesAnio($dia,$mes,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum4 FROM actividades where dia='$dia' and mes='$mes' and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (dia,mes,anio,acum4)".
                   "VALUES".
                   "('$dia', '$mes','$anio','$row[acum4]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }


function guardarMesAnio($mes,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum5 FROM actividades where mes='$mes' and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (mes,anio,acum5)".
                   "VALUES".
                   "('$mes','$anio','$row[acum5]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }


function guardarAnio($anio){

      mysql_select_db('breakTime'); 
        
            $query = "SELECT sum(valor) as acum6 FROM actividades where anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO totalCobroAlumnos (anio,acum6)".
                   "VALUES".
                   "('$anio','$row[acum6]')";

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

                        echo '<hr> <a href="cierreCobroAlumnos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>"; 
                         }

function createTable(){

      
    $sql = "CREATE TABLE totalCobroAlumnos(".
               "id INT AUTO_INCREMENT,".
               "alumno VARCHAR(30) NOT NULL,".
               "dia VARCHAR(2),".
               "mes VARCHAR(15),".
               "anio VARCHAR(4),".
               "acum1 FLOAT(10,2),".
               "acum2 FLOAT(10,2),".
               "acum3 FLOAT(10,2),".
               "acum4 FLOAT(10,2),".
               "acum5 FLOAT(10,2),".
               "acum6 FLOAT(10,2),".
               "PRIMARY KEY (id)); ";

  mysql_select_db('breakTime');
  $retval = mysql_query($sql);
  
  if(!$retval)
  {
    mysql_error();
    echo "<br>";  
  }
  
  else
   {  
    echo 'Table create Succesfully';
    echo "<br>";
   }

   //mysql_close($conn);

}


?>