<?php
	
	include "db.php";
	$db=db_open();

	if(isset($_POST['dueDate']) && isset($_POST['reminder']) && isset($_POST['note']) && isset($_POST['noteId'])){

		$dueDate = $_POST['dueDate'];
		$reminder = $_POST['reminder'];
		$note = $_POST['note'];
		$noteId = $_POST['noteId'];

		$due = date("Y-m-d",strtotime($dueDate));
		$remind = date("Y-m-d H:i",strtotime($reminder));
	
		$sql = "UPDATE note SET dueDate ='".$due."',reminder = '".$remind."',note ='".$note."' WHERE id='".$noteId."' ";

		if($db->exec($sql))
		{
			echo "yes";
		}
		else{
			echo "shit";
		}
	}

?>