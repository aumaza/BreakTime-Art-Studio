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
    <h2>Alta Styles</h2>
    
    <?php
    
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
		$sql = "CREATE TABLE styles(".
		  "id INT AUTO_INCREMENT,".
      "descripcion VARCHAR(35) NOT NULL,".
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
					
						$descripcion = mysql_real_escape_string($_POST["descripcion"], $conn);
					   
    						
	
		$sqlInsert = "INSERT INTO styles ".
		"(descripcion)".
		"VALUES ".
      "('$descripcion')";
  			
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