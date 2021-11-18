<?php

define("HOST","localhost");
define("DB_USER","root");
define("PASSWORD","");
define("DB_NAME","phonebook");
define("CHARSET","utf8");

class Connect{
    protected $db;

    public function __construct(){
        $this->db = new mysqli(HOST,DB_USER,PASSWORD,DB_NAME);
        if($this->db->connect_errno){
            echo 'No se pudo conectar a la base de datos '.$this->db->connect_errno;
        }
        $this->db->set_charset = CHARSET;
    }
}

?>