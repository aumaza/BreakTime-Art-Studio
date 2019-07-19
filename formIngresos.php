   <?php include "ingresos.php"; ?>

   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Ingresos</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body background="img-calm2.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center">
    <div class="container">
    <div class="main">
    <h2>Ingresos</h2><hr>
    
    <?php
  
    
      $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
      createTable();

			echo '<form action="formIngresos.php" method="post">';			
				
            echo  '<label class="control-label" for="cierre">Cierre *</label><br>
                   <select name="cierre" required="required">
                     <option value="">----Seleccionar----</option>
                     <option value="Cierre Mes">Cierre Dia</option>
                     <option value="Cierre Mes">Cierre Mes</option>
                     <option value="Cierre Año">Cierre Año</option>
                     </select><hr>';


            echo  '<label class="control-label" for="formaPago">Forma de Pago *</label><br>
                   <select name="formaPago" required="required">
                     <option value="">----Seleccionar----</option>
                     <option value="Efectivo">Efectivo</option>
                     <option value="Tarjeta Credito">Tarjeta Crédito</option>
                     <option value="Tarjeta Debido">Tarjeta Débito</option>
                     </select><hr>';



            // Sets the top option to be the current day. (IE. the option that is chosen by default).
            $currently_day = date('D'); 
            // Day to start available options at
            $earliest_day = 31; 
            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
            $latest_day = date('D'); 

            echo '<label class="control-label" for="dia">Día</label><br>';
            echo '<select name="dia" >';
            // Loops over each int[day] from current day, back to the $earliest_day [31]


           foreach ( range( $latest_day, $earliest_day ) as $i )
            {
           // Prints the option with the next day in range.
          echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
             }
              echo '</select><br><br>';
            


             echo  '<label class="control-label" for="mes">Mes *</label><br>
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
             
              echo '<div class="btn-toolbar" role="toolbar">';
              echo '<div class="btn-group">';
              echo '<button type="submit" name="A" class="btn btn-success btn-sm">Buscar Dia/Mes/Año</button>';
              echo '<button type="submit" name="B" class="btn btn-warning btn-sm">Guardar</button></div>';
              echo '<div class="btn-group">';
              echo '<button type="submit" name="C" class="btn btn-success btn-sm">Buscar Mes/Anio</button>';
              echo '<button type="submit" name="D" class="btn btn-warning btn-sm">Guardar</button></div>';
              echo '<div class="btn-group">'; 
              echo '<button type="submit" name="E" class="btn btn-success btn-sm">Buscar Anio</button>';
              echo '<button type="submit" name="F" class="btn btn-warning btn-sm">Guardar</button></div></div><hr>';
              echo '</form>';
              echo '<a href="facturacion.html"><input type="button" value="Volver a Facturación" class="btn btn-primary"></a>';
             
        
     
           switch (isset($_POST)){



              case isset($_POST['A']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $dia = mysql_real_escape_string($_POST["dia"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarDiaMesAnio($formaPago,$dia,$mes,$anio);
                    break;

              
              case isset($_POST['B']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $dia = mysql_real_escape_string($_POST["dia"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    guardarDiaMesAnio($formaPago,$cierre,$dia,$mes,$anio);
                    break;
               
               case isset($_POST['C']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarMesAnio($formaPago,$mes,$anio);
                    break;


               case isset($_POST['D']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $mes = mysql_real_escape_string($_POST["mes"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    guardarMesAnio($formaPago,$cierre,$mes,$anio);
                    break;

                case isset($_POST['E']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    buscarAnio($formaPago,$anio);
                    break;

                case isset($_POST['F']):

                    $formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
                    $cierre = mysql_real_escape_string($_POST["cierre"], $conn);
                    $anio = mysql_real_escape_string($_POST["anio"], $conn);
                    guardarAnio($formaPago,$cierre,$anio);
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