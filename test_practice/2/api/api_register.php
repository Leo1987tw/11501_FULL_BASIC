<?php

include_once "./db.php";

unset($_POST['password2']);

echo $Members->save($_POST);

?>