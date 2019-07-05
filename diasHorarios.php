<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head><body background="img-calm2.jpg">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Break Time Art Studio</h3>
              </div>
              <div class="panel-body">
                <p>Días y Horarios</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container"><hr>
        <div class="row">
          <div class="col-md-12">
          
            <form action="formAltaDiasHorarios.php" method="post">

            <div class="form-group">
                <label class="control-label" for="horario">Horario</label><br>
                <select name="hora">
                  <option value="">----Seleccionar----</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="16:00">16:00</option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option>
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>
                </select>
                </div><hr>

                <div class="form-group">
                <label class="control-label" for="dias">Días</label><br>
                <select name="dia">
                  <option value="">----Seleccionar----</option>
                  <option value="Lunes">Lunes</option>
                  <option value="Martes">Martes</option>
                  <option value="Miercoles">Miércoles</option>
                  <option value="Jueves">Jueves</option>
                  <option value="Viernes">Viernes</option>
                  <option value="Sabado">Sábado</option>
                </select>
                </div><hr>

            <div class="form-group">
            <label class="control-label" for="actividad">Actividad</label><br>
            <select name="actividad">
              <option value="descripcion">----Seleccionar----</option>
              
             <?php

             
              $dbhost = 'localhost:3036';
              $dbuser = 'root';
              $dbpass = 'slack142';     
              $dbase = '/var/lib/mysql/breakTime';
              $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
             

              $query = "SELECT * FROM tipoActividad";
              mysql_select_db('breakTime');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                    }
                }

                mysql_close($conn);

                ?>
                </select>
                </div><hr>

               
                <div class="form-group">
                <label class="control-label" for="Style">Style</label><br>
                <select name="style">                
                <option value="descripcion">----Seleccionar----</option>
                
                <?php

                $dbhost = 'localhost:3036';
                $dbuser = 'root';
                $dbpass = 'slack142';     
                $dbase = '/var/lib/mysql/breakTime';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
                mysql_select_db('breakTime');

                $q = "SELECT * FROM styles";
                $retval = mysql_query($q);
                

                  while ($valores = mysql_fetch_array($retval))
                  {
                    echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                  }
                

                ?>
                </select>
                </div><hr>

                <div class="form-group">
                <label class="control-label" for="Docente">Docente</label><br>
                <select name="docente">                
                <option value="nombreApellido">----Seleccionar----</option>
                
                <?php

                $dbhost = 'localhost:3036';
                $dbuser = 'root';
                $dbpass = 'slack142';     
                $dbase = '/var/lib/mysql/breakTime';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
                mysql_select_db('breakTime');

                $q = "SELECT nombreApellido FROM docentes";
                $retval = mysql_query($q);
                

                  while ($valores = mysql_fetch_array($retval))
                  {
                    echo '<option value="'.$valores[nombreApellido].'">'.$valores[nombreApellido].'</option>';
                  }
                

                ?>
                </select>
                </div><hr>

                
             
              <button type="submit" class="btn btn-success btn-sm">Agregar</button>
              <button type="reset" class="btn btn-warning btn-sm">Limpiar Campos</button>
            </form>
            <hr> <a href="cargaDatos.html"><input type="button" value="Volver Carga de Datos" class="btn btn-primary"></a>
          </div>
        </div>
      </div>
    </div>
  

</body></html>