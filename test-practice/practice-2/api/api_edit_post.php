<?php

include_once "./db.php";

foreach($_POST['id'] as $id){
    if(isset($_POST['delete']) && in_array($id, $_POST['delete'])){
        $Post->del($id);
    }else {
        $post = $Post->find($id);
        $post['status'] = (isset($_POST['status']) && in_array($id, $_POST['status'])) ? 1 : 0;
        $Post->save($post);
    }
}

to("../admin.php?do=news");

?>