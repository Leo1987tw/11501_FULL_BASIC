<?php

// include_once "db_connect.php";
include_once "db.php";

$school = new DB("school");

$school->table("students");
$school->insert(["school_num" => $_POST['school_num'], "name" => $_POST['name'], "birthday" => $_POST['birthday'], "uni_id" => $_POST['uni_id'], "addr" => $_POST['addr'], "parents" => $_POST['parents'], "tel" => $_POST['tel'], "dept" => $_POST['dept'], "graduate_at" => $_POST['graduate_at'], "status_code" => $_POST['status_code']]);

$school->table("class_student");
$school->insert(["school_num" => $_POST['school_num'], "class_code" => $_POST['class_code'], "seat_num" => $_POST['seat_num'], "year" => 2000]);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// $sql_student = "INSERT INTO `students`(`school_num`, `name`,`birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`, `graduate_at`, `status_code`) VALUE ('{$_POST['school_num']}', '{$_POST['name']}', '{$_POST['birthday']}', '{$_POST['uni_id']}', '{$_POST['addr']}', '{$_POST['parents']}', '{$_POST['tel']}', '{$_POST['dept']}', '{$_POST['graduate_at']}', '{$_POST['status_code']}')";
// $sql_class = "INSERT INTO `class_student`(`school_num`, `class_code`, `seat_num`, `year`) VALUE ('{$_POST['school_num']}', '{$_POST['class_code']}', '{$_POST['seat_num']}', '2000')";

// $pdo -> exec($sql_student);
// $pdo -> exec($sql_class);

header("location:../admin.php?inc=class_students&code={$_POST['class_code']}");

?>