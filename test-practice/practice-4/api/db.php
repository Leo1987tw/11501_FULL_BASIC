<?php

$config = include __DIR__ . "/../../../../db_config/back-end-learning/test-practice/practice-4/db_config.php";

session_start();

date_default_timezone_set("Asia/Taipei");

class DB{
    protected $dsn = "mysql:host=localhost; charset=utf8; dbname=db_01";
    protected $pdo;
    protected $table;

    function __construct($table){
        global $config;

        $this->dsn = "{$config['driver']}:host={$config['host']}; dbname={$config['database']}";

        if($config['driver'] == 'mysql'){
            $this->dsn .= "; charset=utf8";
        }

        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $config['username'], $config['password'], []);
    }

    protected function a2s($array){
        $tmp = [];
        foreach($array as $key => $value){
            $tmp[] = "`$key`='$value'";
        }

        return $tmp;
    }

    function all(...$args){
        $sql = "SELECT * FROM `$this->table`";
        if(isset($args[0])){
            if(is_array($args[0])){
                $sql .= " WHERE " . join(" AND ", $this->a2s($args[0]));
            }else {
                $sql .= " " . $args[0];
            }
        }

        if(isset($args[1])){
            $sql .= " " . $args[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$args){
        $sql = "SELECT COUNT(*) FROM `$this->table`";
        if(isset($args[0])){
            if(is_array($args[0])){
                $sql .= " WHERE " . join(" AND ", $this->a2s($args[0]));
            }else {
                $sql .= " " . $args[0];
            }
        }

        if(isset($args[1])){
            $sql .= " " . $args[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function find(...$args){
        $sql = "SELECT * FROM `$this->table`";
        if(isset($args[0])){
            if(is_array($args[0])){
                $sql .= " WHERE " . join(" AND ", $this->a2s($args[0]));
            }else {
                $sql .= " WHERE `id`='" . $args[0] . "'";
            }
        }

        if(isset($args[1])){
            $sql .= " " . $args[1];
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){
        if(isset($arg["id"])){
            $tmp = $arg["id"];
            unset($arg["id"]);
            $sql = "UPDATE `$this->table` SET " . join(", ", $this->a2s($arg)) . " WHERE `id`='$tmp'";
        }else {
            $sql = "INSERT INTO `$this->table`(`" . join("`, `", array_keys($arg)) . "`) VALUES ('" . join("', '", $arg) . "')";
        }

        return $this->pdo->exec($sql);
    }

    function del($arg){
        $sql = "DELETE FROM `$this->table`";
        if(is_array($arg)){
            $sql .= " WHERE " . join(", ", $this->a2s($arg));
        }else {
            $sql .= " WHERE `id`='$arg'";
        }
        
        return $this->pdo->exec($sql);
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

function to($url){
    header("location: $url");
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

// $Admin = new DB("admin");
// $Category = new DB("category");
// $Footer = new DB("footer");
// $Member = new DB("member");
// $Order = new DB("sales_order");
// $Product = new DB("product");

$Admin = new DB("admins");
$Category = new DB("categories");
$Footer = new DB("footer_settings");
$Member = new DB("members");
$Order = new DB("orders");
$Product = new DB("products");

?>