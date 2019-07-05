   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Listado Docentes</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Listado Docentes</h2><hr>
    
    <?php
  
    
      $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
						
			if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombreApellido"]);
				$dni = mysql_real_escape_string($_POST["dni"]);
				$fNac = mysql_real_escape_string($_POST["fNac"]);
				$direccion = mysql_real_escape_string($_POST["direccion"]);
				$localidad = mysql_real_escape_string($_POST["localidad"]);
				$telefono = mysql_real_escape_string($_POST["telefono"]);
				$movil = mysql_real_escape_string($_POST["movil"]);
				$email = mysql_real_escape_string($_POST["email"]);
								
				
				$query = "update docentes set nombreApellido = '$nombre', dni = '$dni', fechaNacimiento = '$fNac', direccion = '$direccion', localidad ='$localidad', telefono = '$telefono', movil = '$movil', email = '$email' where id = '$fila[id]'";
				mysql_select_db('breakTime');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo "Actualización Satisfactoria";
					}
						
						else 
						{
							echo "No se pudo Actualizar";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from docentes where id = '$fila[id]'";
								mysql_select_db('breakTime');
								$res = mysql_query($q);
								
								if($res)
									{
										echo "Registro Eliminado";									
									}
									
									else
										{
											echo "Imposible Borrar!";										
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "SELECT * FROM docentes";	
   
   mysql_select_db('breakTime');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>DNI</th>
                    <th class='text-nowrap text-center'>Fecha Nac</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th class='text-nowrap text-center'>Teléfono</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 
		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formListadoDocentes.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombreApellido' class='form-control' value=\"$fila[nombreApellido]\"></td>";
			 echo "<td><input type='text' name='dni' class='form-control' value=\"$fila[dni]\"></td>";
			 echo "<td><input type='text' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='direccion' class='form-control' value=\"$fila[direccion]\"></td>";
			 echo "<td><input type='text' name='localidad' class='form-control' value=\"$fila[localidad]\"></td>";
			 echo "<td><input type='text' name='telefono' class='form-control' value=\"$fila[telefono]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formListadoDocentes.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formListadoDocentes.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='borrar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombreApellido' class='form-control' value=\"$fila[nombreApellido]\"></td>";
			 echo "<td><input type='text' name='dni' class='form-control' value=\"$fila[dni]\"></td>";
			 echo "<td><input type='text' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='direccion' class='form-control' value=\"$fila[direccion]\"></td>";
			 echo "<td><input type='text' name='localidad' class='form-control' value=\"$fila[localidad]\"></td>";
			 echo "<td><input type='text' name='telefono' class='form-control' value=\"$fila[telefono]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnBorrar'>Aceptar</button>
			 <a href='formListadoDocentes.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
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
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formListadoDocentes.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formListadoDocentes.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
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