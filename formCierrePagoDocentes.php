<?php include "persistenciaCierrePagoDocentes.php"; ?>

   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Listado Styles</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body background="img-calm2.jpg" class="img-fluid" alt="Responsive image" >
    <div class="container">
    <div class="main">
    <h2>Cierre Pagos a Docentes</h2><hr>

    <!-- pop-up -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  AYUDA
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importante!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Si desea saber lo pagado en un mes determinado, seleccione el Mes y el Año a calcular y presione "Buscar", si desea guardar ese registro repita los pasos y seleccione "Cierre Mes" luego presione "Guardar Mes". Para Año solo debe seleccionar "Cierre Año", el año correspondiente y presionar "Guardar Año".
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Aceptar</button>
       </div>
    </div>
  </div>
</div><br><hr>
      
           

    
    <?php
  
    
      $dbhost = 'localhost:3036';
      $dbuser = 'root';
      $dbpass = 'slack142';     
      $dbase = '/var/lib/mysql/breakTime';
      $dbase = 'breakTime';
      $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
    
    if($conn)
    {
          
          echo '<form action="formCierrePagoDocentes.php" method="post">
            <div class="form-group">
            <label class="control-label" for="docentes">Docente</label><br>
            <select name="nombreApellido" required="required">
              <option value="nombreApellido">----Seleccionar----</option>';


          $query = "SELECT * FROM docentes";
              mysql_select_db('breakTime');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[nombreApellido].'">'.$valores[nombreApellido].'</option>';
                    }
                }

//                mysql_close($conn);

           
                echo '</select>
                       </div><hr>';

          

             echo  '<label class="control-label" for="cierre">Cierre *</label><br>
                   <select name="cierre" required="required">
                     <option value="">----Seleccionar----</option>
                     <option value="Cierre Dia">Cierre Día</option>
                     <option value="Cierre Mes">Cierre Mes</option>
                     <option value="Cierre Año">Cierre Año</option>
                     </select><hr>';

                     // Sets the top option to be the current day. (IE. the option that is chosen by default).
            $currently_day = date('1'); 
            // Day to start available options at
            $earliest_day = 31; 
            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
            $latest_day = date('D'); 

            echo '<label class="control-label" for="dia">Día</label><br>';
            echo '<select name="dia" required="required">';
            // Loops over each int[day] from current day, back to the $earliest_day [31]


           foreach ( range( $latest_day, $earliest_day ) as $i )
            {
           // Prints the option with the next day in range.
              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
             }
              echo '</select><br><br>';

                    
             echo  '<label class="control-label" for="mes">Mes *</label><br>
                    <select name="mes">
                      <option value="">----Seleccionar----</option>
                      <option value="Enero">Enero</option>
                      <option value="Febrero">Febrero</option>
                      <option value="Marzo">Marzo</option>
                      <option value="Abril">Abril</option>
                      <option value="Mayo">Mayo</option>
                      <option value="Junio">Junio</option>
                      <option value="Julio">Julio</option>
                      <option value="Agosto">Agosto</option>
                      <option value="Septiembre">Septiembre</option>
                      <option value="Octubre">Octubre</option>
                      <option value="Noviembre">Noviembre</option>
                      <option value="Diciembre">Diciembre</option>
                    </select><br><br>';

                  // Sets the top option to be the current year. (IE. the option that is chosen by default).
            $currently_selected = date('Y'); 
            // Year to start available options at
            $earliest_year = 2010; 
            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
            $latest_year = date('Y'); 

            
            echo '<label class="control-label" for="anio">Año</label><br>';
            echo '<select name="anio" >';
            // Loops over each int[year] from current year, back to the $earliest_year [1950]

           foreach ( range( $latest_year, $earliest_year ) as $i )
            {
           // Prints the option with the next year in range.
          echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
             }
              echo '</select><br><hr>';

              echo '<button type="submit" name="A" class="btn btn-success btn-sm">Buscar Docente Dia/Mes/Anio</button>';
              echo '<button type="submit" name="B" class="btn btn-warning btn-sm">Guardar</button><br><hr>';
              echo '<button type="submit" name="C" class="btn btn-success btn-sm">Buscar Docente Mes/Anio</button>';
              echo '<button type="submit" name="D" class="btn btn-warning btn-sm">Guardar</button><br><hr>';
              echo '<button type="submit" name="E" class="btn btn-success btn-sm">Buscar Docente Anio</button>';
              echo '<button type="submit" name="F" class="btn btn-warning btn-sm">Guardar </button><br><hr>';
              echo '</form>';
             
        
     
           switch (isset($_POST))
            {
               
               case isset($_POST['A']):

                    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                    $dia = mysql_real_escape_string($_POST["dia"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarDocDiaMesAnio($nombreApellido,$dia,$mes,$anio);
                    break;

               case isset($_POST['B']):

                    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $dia = mysql_real_escape_string($_POST["dia"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    guardarDocDiaMesAnio($nombreApellido,$dia,$mes,$anio,$cierre);
                    break;

                case isset($_POST['C']):

                    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarDocMesAnio($nombreApellido,$mes,$anio);
                    break;

                case isset($_POST['D']):

                    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    guardarDocMesAnio($nombreApellido,$mes,$anio,$cierre);
                    break;


                case isset($_POST['E']):

                    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarDocAnio($nombreApellido,$anio);
                    break;

                case isset($_POST['F']):

                   $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
                   $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                   $anio = mysql_real_escape_string($_POST["anio"], $conn);
                   guardarDocAnio($nombreApellido,$anio,$cierre);
                   break;
            }
       


  }
   
  
   
   else
    {
      echo 'Connection Failure...';   
    }
    
    mysql_close($conn);
    
    ?>
    </div>
    </div>
    </body>
    </html>