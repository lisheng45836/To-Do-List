<?php
  include "db.php";
  $db=db_open();

	if(isset($_POST['id'])){

		$id = $_POST['id'];

		$sql = "DELETE FROM note WHERE id='".$id."' ";

		if($db->exec($sql))
		{
			echo "delete";
		}else{

			echo "F";
		}
	}





?>