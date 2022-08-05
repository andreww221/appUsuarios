<?php

namespace App\database;

use PDO;
use PDOException;

/**
 * Me permite conectarme a la base de datos
 */

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


    /**
     * Me retorna un objedo PDO para realizar consultas sql
     */
    public function connectDB(): PDO
    {

        try {
            $config = "$this->driver:host=$this->host; dbname=$this->dbname";

            $object = new PDO($config, $this->user, $this->password);



            return $object;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}
