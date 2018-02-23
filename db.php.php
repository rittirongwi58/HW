<?php
class Database{
    private $host ="localhost";
    private $dbname ="courses";
    private $username ="root";
    public $conn;
    public function Connectiondb(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username);
            
            $this->conn->exec("set names utf8");
}catch(PDOException $e){
    echo "Connection error:".$e->getMessage();
}
    return $this->conn;
    }
}
?> 