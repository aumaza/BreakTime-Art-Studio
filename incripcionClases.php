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
                <p>Inscripción a Clases</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container"><hr><br>
        <div class="row">
          <div class="col-md-12">
          
            <form action="formInscripcionClases.php" method="post">
            <div class="form-group">
            <label class="control-label" for="Actividad">Actividad</label><br>
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
                <label class="control-label" for="Alumno">Alumno</label><br>
                <select name="nombreApellido">                
                <option value="nombreApellido">----Seleccionar----</option>
                
                <?php

                $dbhost = 'localhost:3036';
                $dbuser = 'root';
                $dbpass = 'slack142';     
                $dbase = '/var/lib/mysql/breakTime';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
                mysql_select_db('breakTime');

                $q = "SELECT nombreApellido FROM personas";
                $retval = mysql_query($q);
                

                  while ($valores = mysql_fetch_array($retval))
                  {
                    echo '<option value="'.$valores[nombreApellido].'">'.$valores[nombreApellido].'</option>';
                  }
                

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
                <label class="control-label" for="Packs">Packs</label><br>
                <select name="pack">                
                <option value="descripcion">----Seleccionar----</option>
                
                <?php

                $dbhost = 'localhost:3036';
                $dbuser = 'root';
                $dbpass = 'slack142';     
                $dbase = '/var/lib/mysql/breakTime';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
                mysql_select_db('breakTime');

                $q = "SELECT * FROM packs";
                $retval = mysql_query($q);
                

                  while ($valores = mysql_fetch_array($retval))
                  {
                    echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                  }
                

                ?>
                </select>
                </div><hr>

                <div class="form-group">
                <label class="control-label" for="dia">Día</label><br>
                <select name="dia">
                  <option value="">----Seleccionar----</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                </div>

                <div class="form-group">
                <label class="control-label" for="mes">Mes</label><br>
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
                </select>
                </div>

                <div class="form-group">
                <label class="control-label" for="anio">Año</label><br>
                <select name="anio">
                  <option value="">----Seleccionar----</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                  <option value="2002">2002</option>
                  <option value="2003">2003</option>
                  <option value="2004">2004</option>
                  <option value="2005">2005</option>
                  <option value="2006">2006</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                </select>
                </div><hr>

               <div class="form-group">
                <label class="control-label" for="docente">Docente</label>
                <input name="docente" class="form-control" id="docente" placeholder="Docente" type="text">
              </div>

              <div class="form-group">
                <label class="control-label" for="valor">Valor</label>
                <input name="valor" class="form-control" id="valor" placeholder="valor" type="text">
              </div><hr>

              <div class="form-group">
                <label class="control-label" for="formaPago">Forma de Pago</label><br>
                <select name="formaPago">
                  <option value="">----Seleccionar----</option>
                  <option value="Efectivo">Efectivo</option>
                  <option value="Tarjeta Credito">Tarjeta Crédito</option>
                  <option value="Tarjeta Debido">Tarjeta Débito</option>
                  </select>
              </div><hr>
             
              <button type="submit" class="btn btn-success">Agregar</button>
              <button type="reset" class="btn btn-warning">Limpiar Campos</button>
            </form>
            <hr> <a href="cargaDatos.html"><input type="button" value="Volver Carga de Datos" class="btn btn-primary"></a>
          </div>
        </div>
      </div>
    </div>
  

</body></html>