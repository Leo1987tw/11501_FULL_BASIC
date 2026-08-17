<?php

class DB{
    private $host;
    private $charset = "utf8";
    private $dbname;
    protected $dsn;
    protected $pdo;
    protected $table;

    function __construct(...$args){
        global $config;

        if(isset($args[0]) && is_string($args[0])){
            $this->dbname = $args[0];
        }elseif(isset($args[0])){
            echo "first argument need to be a string";
        }
        if(isset($args[1]) && is_string($args[1])){
            $this->host = $args[1];
        }elseif(isset($args[1])){
            echo "second argument need to be a string";
        }
        if(isset($args[2]) && is_string($args[2])){
            $this->charset = $args[2];
        }elseif(isset($args[2])){
            echo "third argument need to be a string";
        }
        try{
            $this->dsn = "mysql:host=$this->host; charset=$this->charset; dbname=$this->dbname";
            $this->pdo = new PDO($this->dsn, 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "連接失敗： " . $e->getMessage();
        }
    }

    function table($table){
        $this->table = $table;
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

    function page(...$args){
        if(!is_string($args[0])){
            echo "first argument(table name) must be a string.";
        }

        if(!isset($args[1])){
            echo "second argument(division) need to be set.";
        }

        $before = 2;
        if(isset($args[2])){
            $before = $args[2];
        }

        $after = 2;
        if(isset($args[3])){
            $after = $args[3];
        }

        $total = $this->pdo -> query("SELECT COUNT(*) FROM `$args[0]`") -> fetchColumn();
        $pages = ceil($total / $args[1]);
        $now_page = $_GET['page']??1;
        $start = ($now_page - 1) * $args[1];

        echo "<div class='page-nav'>";

        if($now_page > 1){
          $prev = $now_page - 1;
          echo "<a href='?inc=$args[0]&page=$prev'>prev</a>";
        }

        if($now_page > $before + 1){
          echo "<a href='?inc=$args[0]&page=1'>1</a>";
        }

        if($now_page > $before + 2){
          echo "<span>...</span>";
        }

        $start_page = $now_page - $before;
        $end_page = $now_page + $after;

        if($now_page < $before + 1){
          $start_page = 1;
        }

        if($now_page > $pages - $after){
          $end_page = $pages;
        }

        for($i = $start_page; $i <= $end_page; $i++){
          if($now_page == $i){
            $now_class="now_page";
          } else{
            $now_class="";
          }
          echo "<a href='?inc=$args[0]&page=$i' class='$now_class'>$i</a>";
        }

        if($now_page < $pages - $after + 1){
          echo "<span>...</span>";
        }

        if($now_page < $pages - $after){
          echo "<a href='?inc=$args[0]&page=$pages'>$pages</a>";
        }

        if($now_page + 1 <= $pages){
          $next = $now_page + 1;
          echo "<a href='?inc=$args[0]&page=$next'>next</a>";
        }

        echo "</div>";
    }
}

?>