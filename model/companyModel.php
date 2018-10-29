<?php

include ("connect_data.php");

class companyModel extends companyClass {

    private $link;  // datu basera lotura - enlace a la bbdd.
    private $list;  // datu basetik ekarritako datuak gordeko diren array-a.

    function getList() {
        return $this->list;
    }

    public function OpenConnect() {
        $konDat = new connect_data();
        try {
            $this->link = new mysqli($konDat->host, $konDat->userbbdd, $konDat->passbbdd, $konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin.
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko.
    }

    public function CloseConnect() {
        mysqli_close($this->link);
    }

    public function CompanyUser($idUser) {

        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        $sql = "CALL spCompanyUser('" . $idUser . "')"; // SQL sententzia - sentencia SQL
//        echo $sql;
        $this->list = array(); // objetuaren list atributua array bezala deklaratzen da - 
        //se declara como array el atributo list del objeto

        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd //$result devuelve la tabla

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $new = new companyClass();
            $new->setIdCompany($row['idCompany']);
            $new->setName($row['name']);
            $new->setTel($row['tel']);
            $new->setWeb($row['web']);
            $new->setAddress($row['address']);
            $new->setIdSector($row['idSector']);
            $new->setLogo($row['logo']);
            array_push($this->list, $new);
        }
//        var_dump($this->list);
        mysqli_free_result($result);

        $this->CloseConnect();
    }

}
