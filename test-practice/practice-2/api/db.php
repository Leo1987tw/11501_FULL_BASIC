<?php

session_start();

class DB{
    protected $dsn = "mysql:host=localhost; charset=utf8; dbname=db_02";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '', []);
    }

    function all(...$args){
        $sql = "SELECT * FROM `$this->table`";
        if(isset($args[0])){
            if(is_array($args[0])){
                $tmp = $this->a2s($args[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }else{
                $sql .= $args[0];
            }
        }

        if(isset($args[1])){
            $sql .= $args[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$args){
        $sql = "SELECT COUNT(*) FROM `$this->table`";
        if(isset($args[0])){
            if(is_array($args[0])){
                $tmp = $this->a2s($args[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }else{
                $sql .= $args[0];
            }
        }

        if(isset($args[1])){
            $sql .= $args[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function find(...$args){
        $sql = "SELECT * FROM `$this->table` ";
        if(isset($args[0])){
            if(is_array($args[0])){
                $tmp = $this->a2s($args[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }else{
                $sql .= " WHERE `id`='$args[0]'";
            }
        }

        if(isset($args[1])){
            $sql .= $args[1];
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){
        if(isset($arg['id'])){
            $tmp = $this->a2s($arg);
            $sql = "UPDATE $this->table SET " . join(", ", $tmp);
            $sql .= " WHERE `id`='{$arg['id']}'";
        }else{
            $keys = array_keys($arg);
            $sql = "INSERT INTO `$this->table`(`" . join("`, `", $keys) . "`) VALUES ('" . join("', '", $arg) . "');";
        }

        return $this->pdo->exec($sql);
    }

    function del($arg){
        if(is_array($arg)){
            $sql = "DELETE FROM `$this->table` WHERE " . join(" AND ", $this->a2s($arg));
        }else {
            $sql = "DELETE FROM `$this->table` WHERE `id`='$arg'";
        }

        return $this->pdo->exec($sql);
    }

    protected function a2s($array){
        $tmp = [];
        foreach($array as $key => $value){
            $tmp[] = "`$key`='$value'";
        }

        return $tmp;
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchColumn();
    }
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location: $url");
}

// $Member = new DB('member');
// $Counter = new DB('counter');
// $News = new DB('news');
// $Quiz = new DB('quiz');
// $Log = new DB('log');

$Member = new DB('members');
$Counter = new DB('visits');
$News = new DB('news');
$Quiz = new DB('quizzes');
$Log = new DB('likes');

if(!isset($_SESSION['visit'])){
    $today = $Counter->find(['date' => date("Y-m-d")]);
    if(!empty($today)){
        $today['number'] += 1;
        $Counter->save($today);
        $_SESSION['visit'] = $today['number'];
    }else {
        $Counter->save(['date' => date("Y-m-d"), 'number' => 1]);
        $_SESSION['visit'] = 1;
    }
}

?>