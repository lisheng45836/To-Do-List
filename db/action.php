<?php

	include "db.php";
	$db = db_open();



if(isset($_POST['action'])&&isset($_POST['nid']))
{
	$action = $_POST['action'];


	if($action == "done"){

		$id = $_POST['nid'];
		$sql = " UPDATE note SET status='checked' WHERE id='".$id."' ";

		if($db->exec($sql))
		{
			echo "Done";
		}else{

			echo "f";
		}
		
	}
	if($action == "undo"){

		$id = $_POST['nid'];
		$sql = " UPDATE note SET status='unchecked' WHERE id='".$id."' ";

		if($db->exec($sql))
		{
			echo "undo";
		}else{

			echo "f";
		}
	}

}

?>