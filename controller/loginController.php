<?php

//include_once '../model/connect_data.php';
include_once '../model/userClass.php';
include_once '../model/userModel.php';

$user = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'pwd');

//$user = new userModel();
$usuarioLog = new userModel();
$usuarioLog->setUsername($user);
$usuarioLog->setPassword($password);

//$idUser=$user->loginEncripted();

//Se comprueba en la BBDD si existe ese usuario
$usuarioLog->comprobarUsuario();

//$passEncripted = $this->setPassword($row['password']);

            if (password_verify($password , $usuarioLog->getPassword())) {
//                header("Location: ../view/empresas.php");
//                var_dump($usuarioLog->getPassword());
                 header('location: ../view/empresas.php');
            } else {
                echo 'Contraseña incorrecta';
            }
//  if ($idUser > 0) {
//    session_start();
//    $_SESSION['idUser'] = $idUser;
//    $_SESSION['username'] = $username;
//
//    if ($user->AdminVerify()) {
//
//        $_SESSION['admin'] = 1;
//    }
//    header("Location: homeController.php");
//} else {
//    header("Location: ../index.php");
//}


if ($usuarioLog->getIdUser() != null) {
    //Si la comprobación devuelve una línea, se recogen los datos del usuario y se cargan en la sesión.
    
    session_start();
    
    $usuarioLog->selectbyIdUsuario();

    $_SESSION['loggedin'] = true;
    $_SESSION['idUser'] = $usuarioLog->getIdUser();
    $_SESSION['username'] = $usuarioLog->getUsername();
    $_SESSION['password'] = $usuarioLog->getPassword();
    $_SESSION['usertype'] = $usuarioLog->getUsertype();
    $_SESSION['name'] = $usuarioLog->getName();
    $_SESSION['surname'] = $usuarioLog->getSurname();
    $_SESSION['email'] = $usuarioLog->getEmail();
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60); //La sesión expirará en este periodo de tiempo




//    header('location: ../view/empresas.php');
} else {
    //Si no devuelve una línea, aviso de datos incorrectos

    echo '<script>alert ("No encontramos ningún usuario con estos datos.\nPor favor, vuelva a intentarlo.");</script>';
//
//    header('location: ../index.php');
}    