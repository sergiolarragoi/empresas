<?php

session_start();

require_once("../model/userClass.php");
require_once("../model/userModel.php");

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'pwd');
$usertype = filter_input(INPUT_POST, 'usertype');
$name = filter_input(INPUT_POST, 'name');
$surname = filter_input(INPUT_POST, 'apellidos');
$email = filter_input(INPUT_POST, 'email');

//Cuanto más cost (10-15),encriptación más potente.
$options = ['cost'=>12];
$passwordEncrypted = password_hash($password, PASSWORD_BCRYPT, $options);

$newUser = new userModel();
$newUser->setUsername($username);
$newUser->setPassword($passwordEncrypted);
$newUser->setUsertype($usertype);
$newUser->setName($name);
$newUser->setSurname($surname);
$newUser->setEmail($email);


$newUser->insertNewUser();



////Se comprueba en la BBDD si existe ese usuario
//$usuarioLog->comprobarUsuario($password);
//
//if ($usuarioLog->getIdUser() != null) {
//    //Si la comprobación devuelve una línea, se recogen los datos del usuario y se cargan en la sesión.
//    $usuarioLog->selectbyIdUsuario();
//
//    $_SESSION['loggedin'] = true;
//    $_SESSION['idUser'] = $usuarioLog->getIdUser();
//    $_SESSION['username'] = $usuarioLog->getUsername();
//    $_SESSION['password'] = $usuarioLog->getPassword();
//    $_SESSION['usertype'] = $usuarioLog->getUsertype();
//    $_SESSION['name'] = $usuarioLog->getName();
//    $_SESSION['surname'] = $usuarioLog->getUsername();
//    $_SESSION['email'] = $usuarioLog->getPassword();
//    $_SESSION['start'] = time();
//    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60); //La sesión expirará en este periodo de tiempo
//
//
//
//
//    header('location: ../view/userView.php');
//} else {
//    //Si no devuelve una línea, aviso de datos incorrectos
//
//    echo '<script>alert ("No encontramos ningún usuario con estos datos.\nPor favor, vuelva a intentarlo.");</script>';
//
//    header('location: ../index.php');
//}    