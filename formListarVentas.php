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
    <body background="img-calm2.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center">
    <div class="container">
    <div class="main">
    <h2>Listar Ventas</h2><hr>
    
    <?php
  
    
      $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
			echo '<form action="formListarVentas.php" method="post">';			
				
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
             

              echo  '<label class="control-label" for="formaPago">Forma de Pago *</label><br>
                	 <select name="formaPago" required="required">
                     <option value="">----Seleccionar----</option>
                     <option value="Efectivo">Efectivo</option>
                     <option value="Tarjeta Credito">Tarjeta Crédito</option>
                     <option value="Tarjeta Debido">Tarjeta Débito</option>
                     </select><hr>';

              	    echo '<button type="submit" class="btn btn-success">Buscar</button>';
              	    echo '</form>';
				

				$dia = mysql_real_escape_string($_POST["dia"], $conn);
				$mes = mysql_real_escape_string($_POST["mes"], $conn);
				$anio = mysql_real_escape_string($_POST["anio"], $conn);
				$formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
				
   
    //hacemos la consulta

   $sql = "SELECT * FROM ventas where dia = '$dia' and mes = '$mes' and anio ='$anio' and formaPago = '$formaPago' ";
   	
   
   mysql_select_db('breakTime');
	
	$retval = mysql_query($sql);

	
	$query = "SELECT sum(monto) as total FROM ventas where dia = '$dia' and mes = '$mes' and anio ='$anio' and formaPago = '$formaPago'";

	$total = mysql_query($query);
	$row = mysql_fetch_array($total);
 
	
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Concepto</th>
                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Forma Pago</th>
                    <th class='text-nowrap text-center'>Día</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th class='text-nowrap text-center'>Observaciones</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['concepto']."</td>";
			 echo "<td>".$fila['monto']."</td>";
			 echo "<td>".$fila['formaPago']."</td>";
			 echo "<td>".$fila['dia']."</td>";
			 echo "<td>".$fila['mes']."</td>";
			 echo "<td>".$fila['anio']."</td>";
			 echo "<td>".$fila['observaciones']."</td>";
		     echo "<td class='text-nowrap'>";
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
		 
		
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	    echo "Cantidad de Ventas: " .$count;
	    echo "<hr>";
	    echo "La suma Total es: $" .$row["total"];
	    echo "<br>";
	    echo '<hr> <a href="ventas.html"><input type="button" value="Volver a Ventas" class="btn btn-primary"></a>';
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