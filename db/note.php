<?php
	
   include "db.php";
  $db=db_open();

  if(isset($_GET['id'])){

  		  $note =  $_GET['id'];
  		  $sql = $db->prepare("SELECT * FROM note WHERE id = $note");
		  $sql->execute();
		  $sql = $sql->fetchAll( PDO::FETCH_ASSOC );
		  echo json_encode($sql);
  }else{

  		echo "shit";
  }





?>