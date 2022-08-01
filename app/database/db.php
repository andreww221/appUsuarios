<?php

namespace App\database;

use PDO;
use PDOException;

class db
{

    private $driver;
    private $host;
    private $dbname;
    private $user;
    private $password;



    public function __construct()
    {

        $this->driver = "mysql";
        $this->host = "127.0.0.1:3308";
        $this->dbname = "usuarios";
        $this->user = "root";
        $this->password = "admin";
    }



    public function connectDB(): PDO
    {

        try {
            $config = "$this->driver:host=$this->host; dbname=$this->dbname";

            $object = new PDO($config, $this->user, $this->password);

            echo "Conexion establecida con exito";

            return $object;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}

