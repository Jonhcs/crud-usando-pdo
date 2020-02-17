<?php

class Conn{
    private $host;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbname, $username, $password){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() 
    {
        try {
            return new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMassage() . "Code: " . $e->getCode();
            exit;
        }
    }

}