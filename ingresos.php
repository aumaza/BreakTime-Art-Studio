<?php


//Busqueda por periodo

function buscarDiaMesAnio($formaPago,$dia,$mes,$anio)
{

        $sql = "SELECT * FROM ingresos";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "select sum (valor) as totalDiario from (select dia, mes, anio, valor, formaPago from actividades union select dia, mes, anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and dia='$dia' and mes='$mes'and anio='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th class='text-nowrap text-center'>Cierre</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total Diario</th>
                    <th class='text-nowrap text-center'>Total Mensual</th>
                    <th class='text-nowrap text-center'>Total Anual</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
                          echo "<td>".$fila['cierre']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['totalDiario']."</td>";
                          echo "<td>".$fila['totalMensual']."</td>";
                          echo "<td>".$fila['totalAnual']."</td>";
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
                        echo "La suma Total es: $" .$row["totalDiario"];
                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function buscarMesAnio($formaPago,$mes,$anio)
{

        $sql = "SELECT * FROM ingresos";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "select sum (valor) as totalMensual from (select mes, anio, valor, formaPago from actividades union select mes, anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and mes='$mes'and anio='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th class='text-nowrap text-center'>Cierre</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total Diario</th>
                    <th class='text-nowrap text-center'>Total Mensual</th>
                    <th class='text-nowrap text-center'>Total Anual</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
                          echo "<td>".$fila['cierre']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['totalDiario']."</td>";
                          echo "<td>".$fila['totalMensual']."</td>";
                          echo "<td>".$fila['totalAnual']."</td>";
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
                        echo "La suma Total es: $" .$row["totalMensual"];
                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
}


function buscarAnio($formaPago,$anio)
{

        $sql = "SELECT * FROM ingresos";
         mysql_select_db('breakTime');
            $retval = mysql_query($sql);
              $query = "select sum (valor) as totalAnual from (select anio, valor, formaPago from actividades union select anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and anio='$anio'";
                  $total = mysql_query($query);
                    $row = mysql_fetch_array($total);

                    $i = 0;
                    $count = 0;


                    echo "<table class='table table-responsive-sm table-striped'>";
                    echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th class='text-nowrap text-center'>Cierre</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Total Diario</th>
                    <th class='text-nowrap text-center'>Total Mensual</th>
                    <th class='text-nowrap text-center'>Total Anual</th>
                    <th>&nbsp;</th>
                    </thead>";

                    while($fila = mysql_fetch_array($retval))
                    {

                          // Listado normal
                          echo "<tr>";   
                          echo "<td>".$fila['id']."</td>";
                          echo "<td>".$fila['formaPago']."</td>";
                          echo "<td>".$fila['cierre']."</td>";
                          echo "<td>".$fila['dia']."</td>";
                          echo "<td>".$fila['mes']."</td>";
                          echo "<td>".$fila['anio']."</td>";
                          echo "<td>".$fila['totalDiario']."</td>";
                          echo "<td>".$fila['totalMensual']."</td>";
                          echo "<td>".$fila['totalAnual']."</td>";
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
                        echo "La suma Total es: $" .$row["totalAnual"];
                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";

}


function guardarDiaMesAnio($formaPago,$cierre,$dia,$mes,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "select sum (valor) as totalDiario from (select dia, mes, anio, valor, formaPago from actividades union select dia, mes, anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and dia='$dia' and mes='$mes'and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO ingresos (formaPago,cierre,dia,mes,anio,totalDiario)".
                   "VALUES".
                   "('$formaPago','$cierre','$dia', '$mes','$anio','$row[totalDiario]')";

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

                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }


function guardarMesAnio($formaPago,$cierre,$mes,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "select sum (valor) as totalMensual from (select mes, anio, valor, formaPago from actividades union select mes, anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and mes='$mes'and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO ingresos (formaPago,cierre,mes,anio,totalMensual)".
                   "VALUES".
                   "('$formaPago','$cierre','$mes','$anio','$row[totalMensual]')";

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

                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }


function guardarAnio($formaPago,$cierre,$anio){

      mysql_select_db('breakTime'); 
        
            $query = "select sum (valor) as totalMensual from (select anio, valor, formaPago from actividades union select anio, monto valor, formaPago from ventas) where formaPago='$formaPago' and anio='$anio'";
            $total = mysql_query($query);
            $row = mysql_fetch_array($total);

            
            $save = "INSERT INTO ingresos (formaPago,cierre,anio,totalAnual)".
                   "VALUES".
                   "('$formaPago','$cierre','$anio','$row[totalAnual]')";

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

                        echo '<hr> <a href="formIngresos.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
                        echo "<br><br>";
                         }

function createTable(){

      
    $sql = "CREATE TABLE ingresos(".
               "id INT AUTO_INCREMENT,".
               "formaPago VARCHAR(30) NOT NULL,".
               "cierre VARCHAR(30) NOT NULL,".
               "dia VARCHAR(2),".
               "mes VARCHAR(15),".
               "anio VARCHAR(4),".
               "totalDiario FLOAT(10,2),".
               "totalMensual FLOAT(10,2),".
               "totalAnual FLOAT(10,2),".
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