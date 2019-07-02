   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Bienvenido</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Bienvenido</h2>
    
    <?php
    
    $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
							
						$user = mysql_real_escape_string($_POST["usuario"], $conn);
						$pass1 = mysql_real_escape_string($_POST["password"], $conn);
						
	mysql_select_db('breakTime');			   	
	$sql = "SELECT * FROM usuarios where nickName='$user' and password='$pass1'";
	$q = mysql_query($sql,$conn);	
	
	
		if(!$q) 
		{	
			//mysql_error();
			exit;			
			
			/*echo 'Bienvenido'. "<br><br>". $user;	
			echo '<a href="menuPrincipal.html"><br><br><input value="Ingresar" type="button" ></a><br>';*/	
		}

			if($user = mysql_fetch_assoc($q))
			{
				echo $_POST["usuario"];				
				echo '<a href="menuPrincipal.html"><br><br><button type="submit" class="btn btn-default">Aceptar</button></a><br>';		
			}

			else
			{
				echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
				echo '<a href="login.html"><br><br><button type="submit" class="btn btn-default">Aceptar</button></a>';	
	
			}
	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
    </div>
    </div>
    
    
    
</body>
</html>