<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    print 'Hola, ' . $_SESSION['name'];
    print '<a href="../controller/logoutController.php"> Cerrar sesión</a>';
} else {
    header('Location: ../index.php');
}
