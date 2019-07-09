   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Listado de Clases</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Listado de Clases</h2><hr>
    
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

						$hora = mysql_real_escape_string($_POST["hora"], $conn);
					    $dia = mysql_real_escape_string($_POST["dia"], $conn);
    					$actividad = mysql_real_escape_string($_POST["actividad"], $conn);
    					$style = mysql_real_escape_string($_POST["style"], $conn);
    					$docente = mysql_real_escape_string($_POST["docente"], $conn);
    									
				$query = "update diasHorario set hora = '$hora', dia = '$dia', actividad = '$actividad', style = '$style', docente ='$docente' where id = '$fila[id]'";

				mysql_select_db('breakTime');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from diasHorario where id = '$fila[id]'";
								mysql_select_db('breakTime');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";
										echo "</div>";
									}
									
									else
										{
											echo "Imposible Borrar!";										
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "SELECT * FROM diasHorario";	
   
   mysql_select_db('breakTime');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Hora</th>
                    <th class='text-nowrap text-center'>Dia</th>
                    <th class='text-nowrap text-center'>Actividad</th>
                    <th class='text-nowrap text-center'>Style</th>
                    <th class='text-nowrap text-center'>Docente</th>
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
			 echo "<form action='formListarDiasHorarios.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='hora' class='form-control' value=\"$fila[hora]\"></td>";
			 echo "<td><input type='text' name='dia' class='form-control' value=\"$fila[dia]\"></td>";
			 echo "<td><input type='text' name='actividad' class='form-control' value=\"$fila[actividad]\"></td>";
			 echo "<td><input type='text' name='style' class='form-control' value=\"$fila[style]\"></td>";
			 echo "<td><input type='text' name='docente' class='form-control' value=\"$fila[docente]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formListarDiasHorarios.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formListarDiasHorarios.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='borrar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='hora' class='form-control' value=\"$fila[hora]\"></td>";
			 echo "<td><input type='text' name='dia' class='form-control' value=\"$fila[dia]\"></td>";
			 echo "<td><input type='text' name='actividad' class='form-control' value=\"$fila[actividad]\"></td>";
			 echo "<td><input type='text' name='style' class='form-control' value=\"$fila[style]\"></td>";
			 echo "<td><input type='text' name='docente' class='form-control' value=\"$fila[docente]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnBorrar'>Aceptar</button>
			 <a href='formListarDiasHorarios.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['hora']."</td>";
		     echo "<td>".$fila['dia']."</td>";
			 echo "<td>".$fila['actividad']."</td>";
			 echo "<td>".$fila['style']."</td>";
			 echo "<td>".$fila['docente']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formListarDiasHorarios.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formListarDiasHorarios.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
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