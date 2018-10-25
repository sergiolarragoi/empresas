<?php

include ("connect_data.php");

class userModel extends userClass {

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

    public function comprobarUsuario($password) {
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        $sql = "CALL spSelectIdByUser('" . $this->getUsername() . "')"; // SQL sententzia - sentencia SQL
//        echo $sql;

        $this->list = array(); // objetuaren list atributua array bezala deklaratzen da - 
        //se declara como array el atributo list del objeto

        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd //$result devuelve la tabla

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $iduser = $this->setIdUser($row['idUser']);
            $passEncripted = $this->setPassword($row['password']);

            if (password_verify($password, $passEncripted)) {
                return $iduser;
            } else {
                return null;
            }
        }


        $this->CloseConnect();
    }

    public function selectbyIdUsuario() {

        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        $sql = "CALL spSelectUsuarioById('" . $this->getIdUser() . "')"; // SQL sententzia - sentencia SQL


        $this->list = array(); // objetuaren list atributua array bezala deklaratzen da - 
        //se declara como array el atributo list del objeto

        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd //$result devuelve la tabla

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $this->setIdUser($row['idUser']);
            $this->setUsername($row['username']);
            $this->setPassword($row['password']);
            $this->setUsertype($row['usertype']);
            $this->setName($row['name']);
            $this->setSurname($row['surname']);
            $this->setEmail($row['email']);
        }
        mysqli_free_result($result);

        $this->CloseConnect();
    }

    public function insertNewUser() {

        $this->OpenConnect();
        $sql = "CALL spInsertNewUser('" . $this->getUsername() . "','" . $this->getPassword() . "','" . $this->getUsertype() . "','" . $this->getName() . "','" . $this->getSurname() . "','" . $this->getEmail() . "')";
        
        $this->link->query($sql);


        $this->CloseConnect();
    }

}
