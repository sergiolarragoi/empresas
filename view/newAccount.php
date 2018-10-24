<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formulario de registro</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Registro</h2>
            <form class="form-horizontal" action="../controller/newUserController.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Nombre de usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                </div>
                <!-- Oculto para todos los usuarios nuevos registrados -->      
                <input type="hidden" id="usertype"  name="usertype" value="U">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nombre:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="apellidos" placeholder="Enter surname" name="apellidos">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">          
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </body>
</html>
