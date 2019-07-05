   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Inscripcion</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Inscripcion</h2>
    
    <?php
    
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
		$sql = "CREATE TABLE docentes(".
		"id INT AUTO_INCREMENT,".
      "nombreApellido VARCHAR(35) NOT NULL,".
      "dni VARCHAR(9) NOT NULL,".
      "fechaNacimiento INTEGER NOT NULL,".
      "direccion VARCHAR(40) NOT NULL,".
      "localidad VARCHAR(20) NOT NULL,".
      "telefono VARCHAR(10) NOT NULL,".
      "movil VARCHAR(10) NOT NULL,".
      "email VARCHAR(50) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
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
					
						$nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
					   $dni = mysql_real_escape_string($_POST["dni"], $conn);
    					$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
    					$direccion = mysql_real_escape_string($_POST["direccion"], $conn);
    					$localidad = mysql_real_escape_string($_POST["localidad"], $conn);
    					$telefono = mysql_real_escape_string($_POST["telefono"], $conn);
    					$movil = mysql_real_escape_string($_POST["movil"], $conn);
    					$email = mysql_real_escape_string($_POST["email"], $conn);
    						
	
		$sqlInsert = "INSERT INTO docentes ".
		"(nombreApellido,dni,fechaNacimiento,direccion,localidad,telefono,movil,email)".
		"VALUES ".
      "('$nombreApellido','$dni','$fNac','$direccion','$localidad','$telefono','$movil','$email')";
  			
//mysql_select_db('breakTime');
$q = mysql_query($sqlInsert,$conn);

if(!$q)
{
	 echo '<div class="alert alert-danger" role="alert">';
   echo 'Could not enter data: ' . mysql_error();
   echo "</div>";
}

else
  {
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Guardado Exitosamente!!";
    echo "</div>";
    echo '<hr> <a href="cargaDatos.html"><input type="button" value="Volver Carga de Datos" class="btn btn-primary"></a>';
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>