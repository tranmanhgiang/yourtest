<?php 
    class Database {
        public $conn;
        public function __construct(){
            $this->conn = new mysqli("localhost","root","","yourtests") or die("Connection fails" .mysqli_error($this->conn));
            mysqli_set_charset($this->conn,'utf8');
        }

        public function insert($table, array $data){
            $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". $this->conn->real_escape_string($value) ."',";
                } else {
                    $values .= $this->conn->real_escape_string($value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            $result = $this->conn->query($sql) or die("Lỗi  query  insert ----" .mysqli_error($this->conn));
            return $this->conn->insert_id;
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