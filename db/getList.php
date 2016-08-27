<?php

  include "db.php";
  $db=db_open();
    
  	if(isset($_GET['user'])){
      $uid = $_GET['user'];
  		$sql=$db->prepare("SELECT * FROM list WHERE u_id='$uid' ");
      
      $sql->execute();
      
      $sql = $sql->fetchAll( PDO::FETCH_ASSOC );

      echo json_encode($sql);
  		
    }else{
      echo "shit";
    }

?>