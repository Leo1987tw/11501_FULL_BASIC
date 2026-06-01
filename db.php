<?php

class DB{
    protected $dsn = "mysql:host=localhost; charset=utf8; dbname=school";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table = $table;
        try{
            $this->pdo = new PDO($this -> dsn, 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "連接失敗： " . $e->getMessage();
        }
    }

    function all(...$args){
        $sql = "SELECT * FROM $this->table ";
        if(isset($args[0]) && is_array($args[0])){
            $temporary = [];
            foreach($args[0] as $key => $arg){
                $temporary[] = "`$key` = '$arg'";
            }
            $sql = $sql . " WHERE " . implode(" AND ", $temporary);
        }elseif(isset($args[0])){
            $sql = $sql . " " . $args[0];
        }
        if(isset($args[1])){
            $sql = $sql . " " . $args[1];
        }
        echo $sql;
        echo "<br>";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($args=null){
        $sql = "SELECT * FROM $this->table ";
        if(isset($args) && is_array($args)){
            $temporary = [];
            foreach($args[0] as $key => $arg){
                $temporary[] = "`$key` = '$arg'";
            }
            $sql = $sql . " WHERE " . implode(" AND ", $temporary);
        }elseif(isset($args)){
            $sql = $sql . " WHERE id = " . $args;
        }else {
            $sql = $sql . " LIMIT 1";
        }
        echo $sql;
        echo "<br>";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function insert($arg){
        $key = array_keys($arg);
        $sql = "INSERT INTO $this->table (`" . implode("`, `", $key) . "`) VALUES ('" . implode("', '",$arg) . "')";
        echo $sql;
        echo "<br>";
        return $this->pdo->exec($sql);
    }

    function update($arg){
        $sql = "UPDATE $this->table SET ";
        $temporary = [];
        foreach($arg as $key => $val){
            $temporary[] = "`$key` = '$val'";
        }
        $sql = $sql . implode(", ", $temporary);
        $sql = $sql . " WHERE `id` = {$arg['id']}";
        echo $sql;
        echo "<br>";
        return $this->pdo->exec($sql);
    }

    function save($arg){
        if(isset($arg['id'])){
            $this->update($arg);
        }else {
            $this->insert($arg);
        }
    }

    function delete($arg){
        $sql = "DELETE FROM `$this->table`";
        if(is_array($arg)){
            $temporary = [];
            foreach($arg as $key => $val){
                $temporary[] = "`$key` = '$val'";
            }
            $sql = $sql . " WHERE " . implode(" AND ", $temporary);
        }else {
            $sql = $sql . " WHERE `id` = '$arg'";
        }
        echo $sql;
        echo "<br>";
        return $this->pdo->exec($sql);
    }
}

$status = new DB('status');
$scores = new DB('student_scores');
$students = new DB('students');

// echo "<pre>";
// print_r($status->all());
// echo "</pre>";

// echo "<pre>";
// print_r($scores->all());
// echo "</pre>";

// echo "<pre>";
// print_r($scores->all(['score' => 64]));
// echo "</pre>";

// echo "<pre>";
// // print_r($scores->all("LIMIT 3, 5"));
// // echo "</pre>";

// // echo "<pre>";
// // print_r($scores->all(['score' => 64], "LIMIT 3, 5"));
// // echo "</pre>";

// echo "<pre>";
// print_r($students->find(3));
// echo "</pre>";

// echo "<pre>";
// print_r($students->find());
// echo "</pre>";

// $status->insert(['code' => '301', 'status' => '退學', 'note' => "重大違紀事件"]);

// // $status->update(['id' => '5', 'status' => '停學', 'note' => "因故中止學業"]);

// $status->save(['code' => '301', 'status' => '退學', 'note' => "重大違紀事件"]);

// // $status->save(['id' => '5', 'status' => '停學', 'note' => "因故中止學業"]);

// $status->delete(5);

// $status->delete(['id' => '5']);

?>