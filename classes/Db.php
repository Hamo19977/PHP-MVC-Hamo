<?php

class Db {
    private $host = "localhost";
    private $username = "root";
    private $password = "Root+123456";
    private $name = "mvc";

    public function connect(){
        $dns = "mysql:host=$this->host;dbname=$this->name";
        $pdo = new PDO($dns, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
