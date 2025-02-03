<?php

namespace App\Core;
use PDO;
use PDOException;
class Database{
    private static $instance = null;
    private $connection;

    // Using connection directly and avoid making instances
    private function __construct()
    {
        try { 
            $host = 'localhost';
            $port = '5432'; 
            $dbname = 'mvclearning_db';
            $username = 'postgres'; 
            $password = 'password'; 

            // echo "Host: $host, Port: $port, DB: $dbname, User: $username, Password: $password";

            $this->connection = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES => false]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Method to get the unique instance of the class
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the PDO connection postgre
    public function getConnection()
    {
        return $this->connection;
    }
}

