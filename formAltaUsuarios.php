   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Usuarios</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Usuarios</h2>
    
    <?php
    
    $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
				
		$sql = "CREATE TABLE usuarios(".
		"id INT AUTO_INCREMENT,".
      "nombreApellido VARCHAR(35) NOT NULL,".
      "nickName VARCHAR(15) NOT NULL,".
      "password VARCHAR(10) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		echo 'Could not create Table: ' . mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table create Succesfully';
		echo "<br>";
	 }
					
						$nombre = mysql_real_escape_string($_POST["nombreUsuario"], $conn);
						$user = mysql_real_escape_string($_POST["nickname"], $conn);
						$pass1 = mysql_real_escape_string($_POST["password1"], $conn);
						$pass2 = mysql_real_escape_string($_POST["password2"], $conn);
					   	
	$sqlInsert = "INSERT INTO usuarios ".
		"(nombreApellido,nickName,password)".
		"VALUES ".
      "('$nombre','$user','$pass1')";
		


if($conn && strcmp($pass2, $pass1) == 0) 
{
	mysql_query($sqlInsert);	
	echo "<br>";
	echo '<div class="alert alert-success" role="alert">';
	echo 'Usuario Creado Satisfactoriamente';
	echo "</div>";
	
	echo "<br><br><br><br>";
   echo '<a href="menuPrincipal.html"><br><br><button type="submit" class="btn btn-default">Volver al Menú Principal</button></a><br>';
		
}

else
{
	echo "<br>";
	echo '<div class="alert alert-warning" role="alert">';
	echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
	echo "</div>";
	echo '<hr> <a href="altaUsuarios.html"><input value="Reintentar" type="button" ></a>';	
	
}	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
    </div>
    </div>
    
    
    
</body>
</html>