<?php 
    class Database {
        public $conn;
        public function __construct(){
            $this->conn = new mysqli("localhost","root","","yourtests") or die("Connection fails" .mysqli_error($this->conn));
            mysqli_set_charset($this->conn,'utf8');
        }

        public function fetchOne($table,$query){
            $sql = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $sql .= "LIMIT 1";
            
            $result = $this->conn->query($sql);
            return $result -> fetch_assoc();
        }
    }
?>