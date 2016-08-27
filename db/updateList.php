<?php

include "db.php";
$db = db_open();

if(isset($_POST['l_id']) && isset($_POST['title'])){

	$l_id = $_POST['l_id'];
	$title = $_POST['title'];

	$sql = "UPDATE list SET title ='".$title."' WHERE id='".$l_id."' ";
	$db->exec($sql);

	header('Location: http://localhost:8888/web/todo/ ');

}


?>