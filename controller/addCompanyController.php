<?php

include_once '../model/connect_data.php';
include_once '../model/sectorClass.php';
include_once '../model/sectorModel.php';



$cSector = new sectorModel();
$cSector->setList();
$listSectors = $cSector->getList();


include_once '../view/viewAddCompany.php';

