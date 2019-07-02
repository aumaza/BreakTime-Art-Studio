   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Listado Inscriptos</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Listado Inscriptos</h2>
    
    <?php
  
    
	  
    
      $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
			//echo 'Connection Succesfully...';
				
   
    //hacemos la consulta

   $sql = "SELECT * FROM personas";	
   
   mysql_select_db('breakTime');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
	$i=0;
            echo "<table align='center' cellspacing='2' cellpadding='2' border='1'>";
              echo "<thead>
              
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>DNI</th>
                    <th>Fecha Nac</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Teléfono</th>
                    <th>Móvil</th>
                    <th>Email</th>
                    <th>Observaciones</th>
                    <th>Pariente</th>
                    <th>Parentezco</th>
                    <th>Tel Contacto</th>
                    
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		 echo "<p>";
		 echo "<tr>";		
		 echo "<td>".$fila['id']."</td>";
		 echo "<td>".$fila['nombreApellido']."</td>";
	    echo "<td>".$fila['dni']."</td>";
		 echo "<td>".$fila['fechaNacimiento']."</td>";
		 echo "<td>".$fila['direccion']."</td>";
		 echo "<td>".$fila['localidad']."</td>";
		 echo "<td>".$fila['telefono']."</td>";
		 echo "<td>".$fila['movil']."</td>";
		 echo "<td>".$fila['email']."</td>";
		 echo "<td>".$fila['observaciones']."</td>";
		 echo "<td>".$fila['nombrePariente']."</td>";
		 echo "<td>".$fila['parentezco']."</td>";
		 echo "<td>".$fila['telContacto']."</td>";
		 echo "</tr>";		 
		 echo "</p>";
		 $i++;
	 }
	 echo "</table>";
	 echo "<br><br>";
	 echo '<hr> <a href="listados.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';
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