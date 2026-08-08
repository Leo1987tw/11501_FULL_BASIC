<?php

include_once "./db.php";

foreach($_POST['id'] as $id){
    if(isset($_POST['delete']) && in_array($id, $_POST['delete'])){
        $News->del($id);
    }else {
        $news = $News->find($id);
        $news['sh'] = (isset($_POST['show']) && in_array($id, $_POST['show'])) ? 1 : 0;
        $News->save($news);
    }
}

to("../admin.php?do=news");

?>