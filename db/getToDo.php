<?php
  
  include "db.php";
  $db=db_open();

  if(isset($_GET['id']) && isset($_GET['status'])){
  	$id = $_GET['id'];
  	$status = $_GET['status'];

  	if($status == 'unchecked'){
	  	$sql=$db->prepare("SELECT * FROM note WHERE note.l_id =$id AND note.status='".$status."'");
	    $sql->execute();
	    $sql = $sql->fetchAll( PDO::FETCH_ASSOC );
	    
	    echo json_encode($sql);
	}

	if($status == 'checked'){
		$sql=$db->prepare("SELECT * FROM note WHERE note.l_id =$id AND note.status='".$status."'");
	    $sql->execute();
	    $sql = $sql->fetchAll( PDO::FETCH_ASSOC );
	    
	    echo json_encode($sql);

	}
  }
?>