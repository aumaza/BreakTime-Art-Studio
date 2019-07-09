   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Pagos a Docentes</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body background="img-calm2.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center">
    <div class="container">
    <div class="main">
    <h2>Pagos</h2>
    
    <?php
    
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
		$sql = "CREATE TABLE pagos(".
		"id INT AUTO_INCREMENT,".
      "concepto VARCHAR(20) NOT NULL,".
      "monto FLOAT(6,2) NOT NULL,".
      "dia VARCHAR(2) NOT NULL,".
      "mes VARCHAR(15) NOT NULL,".
      "anio VARCHAR(4) NOT NULL,".
      "descripcion VARCHAR(255) NOT NULL,".
      "total FLOAT(6,2),".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		mysql_error(); 	
	}
	
	else
	 {	
		echo "Table create Succesfully";
    echo "<br>";
	 }
					
						  $concepto = mysql_real_escape_string($_POST["concepto"], $conn);
              $monto = mysql_real_escape_string($_POST["monto"], $conn);
              $dia = mysql_real_escape_string($_POST["dia"], $conn);
              $mes = mysql_real_escape_string($_POST["mes"], $conn);
              $anio = mysql_real_escape_string($_POST["anio"], $conn);
              $descripcion = mysql_real_escape_string($_POST["descripcion"], $conn);

    				    					    					    						
	
		$sqlInsert = "INSERT INTO pagos ".
		"(concepto,monto,dia,mes,anio,descripcion)".
		"VALUES ".
      "('$concepto','$monto','$dia','$mes','$anio','$descripcion')";
  			
//mysql_select_db('breakTime');
$q = mysql_query($sqlInsert,$conn);

if(!$q)
{
	echo '<div class="alert alert-succes" role="alert">';
  echo 'Could not enter data: ' . mysql_error();
  echo "</div>";
}

else
{
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Guardado Exitosamente!!";
    echo "</div>";
    echo "<br><br><br><br>";
    echo '<hr> <a href="pagos.html"><input type="button" value="Volver a Pagos" class="btn btn-primary"></a>';
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>