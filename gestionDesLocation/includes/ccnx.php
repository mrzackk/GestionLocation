<?php

class cnx
{
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "";
    private $username = "root";
    private $password = "";
    public $cnx;

    /**
     * get the database connection
     * @return null|PDO
     */
    public function getConnection()
    {
        $this->cnx = null;

        try {
            $this->cnx = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8;", 
                                    $this->username, $this->password);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "Connection error: " . $ex->getMessage();
        }
        return $this->cnx;
    }
}