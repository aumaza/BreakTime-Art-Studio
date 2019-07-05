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
		
		
		$sql = "CREATE TABLE actividades(".
		  "id INT AUTO_INCREMENT,".
      "actividad VARCHAR(50) NOT NULL,".
      "nombreApellido VARCHAR(50) NOT NULL,".
      "style VARCHAR(50) NOT NULL,".
      "pack VARCHAR(50) NOT NULL,".
      "dia VARCHAR(2) NOT NULL,".
      "mes VARCHAR(15) NOT NULL,".
      "anio VARCHAR(4) NOT NULL,".
      "docente VARCHAR(50) NOT NULL,".
      "valor FLOAT(6,2) NOT NULL,".
      "formaPago VARCHAR(15) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		echo 'Could not create Table: ' . mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
					
						  $actividad = mysql_real_escape_string($_POST["actividad"], $conn);
					    $nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
    					$style = mysql_real_escape_string($_POST["style"], $conn);
    					$pack = mysql_real_escape_string($_POST["pack"], $conn);
    					$dia = mysql_real_escape_string($_POST["dia"], $conn);
    					$mes = mysql_real_escape_string($_POST["mes"], $conn);
    					$anio = mysql_real_escape_string($_POST["anio"], $conn);
    					$docente = mysql_real_escape_string($_POST["docente"], $conn);
    					$valor = mysql_real_escape_string($_POST["valor"], $conn);
    					$formaPago = mysql_real_escape_string($_POST["formaPago"], $conn);
    						
	
		$sqlInsert = "INSERT INTO actividades ".
		"(actividad, nombreApellido, style, pack, dia, mes, anio, docente, valor, formaPago)".
		"VALUES ".
      "('$actividad', '$nombreApellido', '$style', '$pack', '$dia', '$mes', '$anio', '$docente', '$valor', '$formaPago')";
  			
//mysql_select_db('breakTime');
$q = mysql_query($sqlInsert,$conn);

if(!$q)
{
	echo 'Could not enter data: ' . mysql_error();
}

else
{
echo "Registry Succesfully\n";
echo "<br><br><br><br>";
echo '<hr> <a href="cargaDatos.html"><input type="button" value="Volver Carga de Datos" class="btn btn-primary"></a>';
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>