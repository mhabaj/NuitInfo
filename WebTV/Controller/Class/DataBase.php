<?php

/** class DB extends SQLite3 {


    private $con;
    private $config = 'test.db';


    function __construct(){
        $this->con =  $this->open('test.db');
    }

    public function  __destruct() {
        $this->con = null;
    }

    public function connect() {

        if($this->con == null) {

            $this->con = new DB();
            if(!$this->con) {
                echo $this->con->lastErrorMsg();
            }
            else {
                echo " <p> Opened database successfully </p>";
            }
        }
    }

    public function getCon() {
        return $this->con;
    }
} */


class DB extends SQLite3 {
    function __construct() {
        $this->open('test.db');
    }
}


?>