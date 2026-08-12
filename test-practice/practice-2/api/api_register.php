<?php

include_once "./db.php";

unset($_POST['password2']);

echo $User->save($_POST);

?>