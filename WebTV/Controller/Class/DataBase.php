<?php

class ConnexionBDD {

    private $con;
    private $config =  array(
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'dbname' => 'tangubdd',
        'username' => 'root',
        'password' => ''
    );

    public function __construct() {
        $this->connect();
    }

    public function  __destruct() {
        $this->con = null;
    }

    public function connect() {
        if($this->con == null) {
            $dsn = "" . $this->config['driver'] . ":host=" . $this->config['host'] . ";dbname=" . $this->config['dbname'];
            try {
                $this->con = new PDO($dsn, $this->config['username'], $this->config['password']);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } catch (PDOException $e) {
                die("Erreur connexion bdd : " . $e->getMessage());
            }
        }
    }

    public function getCon() {
        return $this->con;
    }
}


?>