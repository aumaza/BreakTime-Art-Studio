<?php

function createTable(){

			
		$sql = "CREATE TABLE usuarios(".
			   "id INT AUTO_INCREMENT,".
      		   "nombreApellido VARCHAR(35) NOT NULL,".
               "nickName VARCHAR(15) NOT NULL,".
               "password VARCHAR(10) NOT NULL,".
               "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
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

	 //mysql_close($conn);

}


function agregarUser($nombre,$user,$pass1,$pass2){

		

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombreApellido,nickName,password)".
		"VALUES ".
      "('$nombre','$user','$pass1')";
		


	if(strcmp($pass2, $pass1) == 0) 
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

		

}


function buscarUser($nombre){

		$sql = "SELECT * FROM usuarios where nombreApellido = '$nombre'";
		mysql_select_db('breakTime');
    	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		
	}
	
	else
	 {	
		while($fila = mysql_fetch_array($retval))
		{
			$res = $fila['nickName'];
		}
	 }

	echo $res;
}



function updatePass($user,$pass1,$pass2){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE nickName = '$user'";
    	mysql_select_db('breakTime');
    	
    	
    	if(strcmp($pass2, $pass1) == 0)
    	{
    		mysql_query($sql);
    		echo "<br>";
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente';
			echo "</div>";
	   	}

    	else
    	{
    		echo "<br>";
			echo '<div class="alert alert-warning" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
			echo "</div>";
			echo '<hr> <a href="altaUsuarios.php"><input value="Reintentar" type="button" class="btn btn-primary"></a>';

    	}

    	
}


function popUp(){

	echo '<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Sign up</button>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Launch
    Modal Register Form</a>
</div>';


}




?>