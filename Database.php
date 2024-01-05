<?php

require_once "Config.php";

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }

    public function connect()
    {
        try
        {
            $dbConnection = new PDO
            (
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"  => "prefer"]
            );

            // Configure PDO Error Mode
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Return Connection Handler
            return $dbConnection;
        }
        catch (PDOException $e)
        {
            die("Connection Failed: " . $e->getMessage());
        }
    }
}

?>