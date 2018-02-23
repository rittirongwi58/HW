<?php
class ExecSQL{
    private $conn;
     public function __construct($str_conn){
        $this->conn =$str_conn;
     }    
    public function readAll($tablename){
         $stmt =$this->conn->prepare("SELECT * FROM ".$tablename);
         $stmt ->execute();
         return $stmt;
    }    
    public function rowCount($tablename){
        $stmt = $this->conn->prepare("SELECT  COUNT(*) AS total_row FROM ".$tablename);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_row'];  
     }
    public function readOne($command,$tablename,$cond){
        $stmt = $this->conn->prepare(" ".$command."  ".$tablename." ".$cond." ");
        if($command == "DELETE FROM")
        {
            return $this->EXEC($stmt);
        }
        if($command == "SELECT * FROM")
        {
            $stmt->execute();
            return $stmt; 
        } 
     }
    public function update($tablename,$filde,$cond)
     {
        $stmt = $this->conn->prepare(" UPDATE ".$tablename." SET ".$filde." ".$cond."");
        return $this->EXEC($stmt);
     }
//add ข้อมูล
    public function insert($tablename,$Field,$Value)
     {
         $stmt = $this->conn->prepare("INSERT INTO ".$tablename." (".$Field.") VALUES (".$Value.") ");
         return $this->EXEC($stmt);
         
     }
    public function EXEC($stmt)
     {
        if($stmt->execute()) return true;
        else return false;
     }
     
}
?>