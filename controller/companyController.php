<?php

//session_start();

require_once '../model/companyClass.php';
require_once '../model/companyModel.php';


$userCompany = new companyModel();

$idUsuario = $_SESSION['idUser'];

$userCompany->CompanyUser($idUsuario);
$listaCompany = $userCompany->getList();

unset($userCompany);


include_once '../view/empresas.php';
