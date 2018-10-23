<?php

class userClass {

    protected $idUser;
    protected $username;
    protected $password;
    protected $usertype;
    protected $name;
    protected $surname;
    protected $email;

    function getIdUser() {
        return $this->idUser;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getUsertype() {
        return $this->usertype;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setUsertype($usertype) {
        $this->usertype = $usertype;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
