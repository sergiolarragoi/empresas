<?php

include_once '../model/connect_data.php';
include_once '../model/sectorClass.php';
include_once '../model/sectorModel.php';

$idSector = filter_input(INPUT_GET, 'idSector');
echo ($idSector);
$cSector = new sectorModel();
$listCompanys = $cSector->setObjectCompanyListByIdSector($idSector);

$json_string = json_encode($listCompanys);
print $json_string;

