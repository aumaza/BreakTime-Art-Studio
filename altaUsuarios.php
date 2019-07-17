<?php  include "users.php"; ?>

<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head><body  background="img-calm2.jpg">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Break Time Art Studio</h3>
              </div>
              <div class="panel-body">
                <p>Alta de Usuarios
                  <br>
                </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">

        <!-- pop-up -->
<hr><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  AYUDA
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importante!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Recuerde que debe repetir la contraseña, esta debe tener como máximo 10 dígitos alfanuméricos y al menos una letra en Mayúscula. Si las contraseñas no coinciden, no será generado el usuario.
        No utilice progresiones numéricas, ejemplo: 1234.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Aceptar</button>
       </div>
    </div>
  </div>
</div>


        <div class="row">
          <div class="col-md-12"><hr>
            <form action="altaUsuarios.php" method="post">
              <div class="form-group">
                <label for="nombreApellido" class="control-label">Nombre y Apellido</label>
                <input id="nombreApellido" placeholder="Enter you Name" type="text" name="nombreUsuario" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="nickname" >Usuario</label>
                <input id="nickname" placeholder="Enter user" type="text" name="nickname" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="password1" >Password</label>
                <input class="form-control" id="password1" placeholder="Password" type="password" name="password1">
              </div>
              <div class="form-group">
                <label for="password2" class="control-label">Repita Password</label>
                <input id="password2" placeholder="Password" type="password" name="password2" class="form-control">
              </div>
              <button type="submit" name="A" class="btn btn-success">Agregar</button>
              <button type="submit" name="B" class="btn btn-warning">Buscar</button>
              <button type="submit" name="C" class="btn btn-danger">Modificar Password</button>
              <hr> <a href="menuPrincipal.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
            </form>
          </div>
        </div>

         <?php
    
                  $dbhost = 'localhost:3036';
                  $dbuser = 'root';
                  $dbpass = 'slack142';     
                  $dbase = 'breakTime';
                  $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
                  mysql_select_db('breakTime');

    
                  if($conn) {

                       if (isset($_POST['A'])) {

                            createTable();
                            $nombre = mysql_real_escape_string($_POST["nombreUsuario"], $conn);
                            $user = mysql_real_escape_string($_POST["nickname"], $conn);
                            $pass1 = mysql_real_escape_string($_POST["password1"], $conn);
                            $pass2 = mysql_real_escape_string($_POST["password2"], $conn);
                            agregarUser($nombre,$user,$pass1,$pass2);

                             } else if (isset($_POST['B'])) {

                                        
                                        $nombre = mysql_real_escape_string($_POST["nombreUsuario"], $conn);
                                        buscarUser($nombre);

                                      } else if (isset($_POST['C'])) {

                                        $user = mysql_real_escape_string($_POST["nickname"], $conn);
                                        $pass1 = mysql_real_escape_string($_POST["password1"], $conn);
                                        $pass2 = mysql_real_escape_string($_POST["password2"], $conn);
                                        updatePass($user,$pass1,$pass2);

                                      }

                                    } else {

                                      mysql_error();

                                    }

  //cerramos la conexion
  
  mysql_close($conn);
    ?>


      </div>
    </div>
   </body></html>