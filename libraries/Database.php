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


        public function update($table, array $data, $conditions){
            $sql = "UPDATE {$table}";
            $set = " SET ";
            $where = " WHERE ";
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $set .= $field .'='.'\''. $this->conn->real_escape_string($value) .'\',';
                } else {
                    $set .= $field .'='. $this->conn->real_escape_string($value) . ',';
                }
            }
            $set = substr($set, 0, -1);
            $sql .= $set . $where . $conditions;
            $result = $this->conn->query($sql) or die( "Lỗi truy vấn Update -- " .mysqli_error($this->conn));
            return $this->conn->affected_rows;
        }


        public function delete ($table ,  $query ){
            $sql = "DELETE FROM {$table} WHERE ";
            $sql .= $query;
            mysqli_query($this->conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->conn));
            return mysqli_affected_rows($this->conn);
        }

        public function fetchOne($table,$query){
            $sql = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $sql .= " LIMIT 1";
            $result = $this->conn->query($sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->conn));;
            return $result -> fetch_assoc();
        }

        public function fetchOne1($table1,$table2,$get_col,$conditions, $query){
            $sql = "SELECT DISTINCT {$get_col} FROM {$table1} JOIN {$table2} ON ";
            $sql .= $conditions ;
            $sql .= ' WHERE ';
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi truy vấn fetchOne1" .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }


        public function fetchID($table , $get_col , $query ){
            $sql = "SELECT DISTINCT {$get_col} FROM {$table} WHERE ";
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->conn));
            return $result;
        }

        public function fetchJoin($table1, $table2 ,$conditions,$query){
            $sql = "SELECT * FROM {$table1} JOIN {$table2} ON ";
            $sql .= $conditions ;
            $sql .= ' WHERE ';
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi truy vấn fetchJoin" .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function fetchAll($table,$query){
            $sql = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi  truy vấn fetchAll " .mysqli_error($this->conn));;
        
            $data = [];
            if( $result){
                while ($num = mysqli_fetch_assoc($result)){
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function countQuestions($table,$query){
            $sql = "SELECT COUNT(*) as count FROM {$table} WHERE ";
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi  truy vấn countQuestions " .mysqli_error($this->conn));;
            return $result -> fetch_assoc();
        }

        public function countAccess($table,$query){
            $sql = "SELECT COUNT(*) as count,t_id FROM {$table} WHERE ";
            $sql .= $query;
            $result = $this->conn->query($sql) or die("Lỗi  truy vấn countQuestions " .mysqli_error($this->conn));;
            return $result -> fetch_assoc();
        }
        public  function fetchJones($table,$sql,$total = 1,$page,$row ,$pagi = true ){
            $data = [];
            if ($pagi == true ){
                $sotrang = ceil($total / $row);
                $start = ($page - 1 ) * $row ;
                $sql .= " LIMIT $start,$row ";
                $data = [ "page" => $sotrang];
                $result = mysqli_query($this->conn,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->conn));
            }
            else{
                $result = mysqli_query($this->conn,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->conn));
            }
            
            if( $result){
                while ($num = mysqli_fetch_assoc($result)){
                    $data[] = $num;
                }
            }
            return $data;
        }



    }
?>