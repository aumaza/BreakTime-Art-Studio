<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head><body background="img-calm2.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Break Time Art Studio</h3>
              </div>
              <div class="panel-body">
                <p>Pagos</p><hr>
                <p>Importante!<br>Aquellos campos que tienen asterisco (*) son obligatorios de completar!</p><hr>
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
          
            <form action="formAltaPagos.php" method="post">
            <div class="form-group">
             <label class="control-label" for="concepto">Concepto *</label><br>
                <select name="concepto" required="required">
                  <option value="">----Seleccionar----</option>
                  <option value="Electicidad">Electricidad</option>
                  <option value="Agua">Agua</option>
                  <option value="Gas">Gas</option>
                  <option value="Teléfono">Teléfono</option>
                  <option value="Internet">Internet</option>
                  <option value="Pago Proveedor">Pago Proveedor</option>
                  <option value="Otro">Otro</option>
                  </select>
                  </div>
               

              <div class="form-group">
                <label class="control-label" for="Monto">Monto *</label>
                <input id="monto" placeholder="Monto" type="text" name="monto" class="form-control" required="required">
              </div><hr>

              <?php
            // Sets the top option to be the current day. (IE. the option that is chosen by default).
            $currently_day = date('D'); 
            // Day to start available options at
            $earliest_day = 31; 
            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
            $latest_day = date('D'); 

            echo '<label class="control-label" for="dia">Día*</label><br>';
            echo '<select name="dia" required="required">';
            // Loops over each int[day] from current day, back to the $earliest_day [31]


           foreach ( range( $latest_day, $earliest_day ) as $i )
            {
           // Prints the option with the next day in range.
              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
             }
              echo '</select><br><br>';
              ?>

              <div class="form-group">
                <label class="control-label" for="mes">Mes *</label><br>
                <select name="mes" required="required">
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

                <?php
            // Sets the top option to be the current year. (IE. the option that is chosen by default).
            $currently_selected = date('Y'); 
            // Year to start available options at
            $earliest_year = 2010; 
            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
            $latest_year = date('Y'); 

            echo '<label class="control-label" for="anio">Año*</label><br>';
            echo '<select name="anio" required="required">';
            // Loops over each int[year] from current year, back to the $earliest_year [1950]

           foreach ( range( $latest_year, $earliest_year ) as $i )
            {
           // Prints the option with the next year in range.
          echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
             }
              echo '</select><br><hr>';
              ?>

              <div class="form-group">
                <label>Observación<span>*</span></label>
                <br>
                <textarea name="descripcion" rows="4" cols="50" class="estilotextarea" placeholder="En caso de seleccionar el concepto  --Otro-- por favor especifique a que se debe dicho pago."></textarea>
              </div>

                             
              <button type="submit" class="btn btn-success">Agregar</button>
              <button type="reset" class="btn btn-warning">Limpiar Campos</button>
            </form>
            <hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>
          </div>
        </div>
      </div>
    </div>
  </body></html>