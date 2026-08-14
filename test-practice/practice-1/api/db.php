<?php

$config = include __DIR__ . "/../../../../db_config/back-end-learning/test-practice/practice-1/db_config.php";

session_start();

class DB{
    protected $dsn = "mysql:host=localhost; charset=utf8; dbname=db_01";
    protected $pdo;
    protected $table;

    function __construct($table){
        global $config;

        $this->dsn = "{$config['driver']}:host={$config['host']}; dbname={$config['db_name']}";

        if($config['driver'] == 'mysql'){
            $this->dsn .= "; charset=utf8";
        }

        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $config['username'], $config['password'], []);
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
            if($key == 'sort' && $value == NULL){
                $tmp[] = "`sort` = NULL";
                continue;
            }

            if($key == 'deleted_at' && $value == NULL){
                $tmp[] = "`deleted_at` = NULL";
                continue;
            }

            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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

// $Admin = new DB('admin');
// $Ad = new DB('ad');
// $Banner = new DB('banner');
// $Footer = new DB('footer');
// $Image = new DB('image');
// $Menu = new DB('menu');
// $Post = new DB('post');
// $Counter = new DB('counter');
// $Title = new DB('title');

$Admin = new DB('admins');
$Ad = new DB('ads');
$Banner = new DB('banners');
$Footer = new DB('footer_settings');
$Image = new DB('images');
$Menu = new DB('menus');
$Post = new DB('posts');
$Counter = new DB('counters');
$Title = new DB('titles');

if(!isset($_SESSION['visit'])){
    $_SESSION['visit'] = 1;
    $visit = $Counter->find(1);
    $visit['total'] += 1;
    $Counter->save($visit);
}

?>