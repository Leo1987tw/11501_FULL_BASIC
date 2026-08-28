<?php

include_once "./db.php";

if (isset($_POST['title']) && $_POST['title'] != "") {
    $Survey->save(['title' => $_POST['title'], 'parent_id' => 0, 'vote' => 0]);
    $parent_id = $Survey->find(['title' => $_POST['title']])['id'];

    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $option) {
            if ($option != "") {
                $Survey->save(['title' => $option, 'parent_id' => $parent_id, 'vote' => 0]);
            }
        }
    }
}

to("../admin.php?do=que");
