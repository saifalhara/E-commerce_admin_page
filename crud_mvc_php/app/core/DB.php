<?php

require_once(LIBS . 'DB/MysqliDb.php');
class DB
{
    protected $db;
    public function connect()
    {
        $database = new MysqliDb (HOST, USER, PASS, DBNM);
        if(!$database->connect()){
            $this->db = $database ; 
            return $this->db;
        }else {
            echo "failed" ; 
        }
    }
}
