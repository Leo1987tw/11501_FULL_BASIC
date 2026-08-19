<?php

include_once "./db.php";
if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); }

$Footer->save($_POST);

to("../admin.php?do=footer");

?>