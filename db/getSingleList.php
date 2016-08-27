<?php

include "db.php";
$db = db_open();

  	if(isset($_GET['id'])){

	  	$id= $_GET['id'];

		$sql=$db->prepare("SELECT * FROM list WHERE id='".$id."'");
		$sql->execute();
		$sql = $sql->fetchAll( PDO::FETCH_ASSOC );
		echo json_encode($sql);
  		
    }else{

      	echo "shit";

    }


?>