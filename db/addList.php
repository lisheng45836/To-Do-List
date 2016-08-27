<?php

  include "db.php";
  $db=db_open();

  	if(isset($_POST['uid']) &&isset($_POST['list']) && !empty($_POST['list'])){

  		  $action = $_POST['list'];
        $uid = $_POST['uid'];
        $sql = "INSERT INTO list(title,u_id) value ('".$action."','$uid') ";

        if($db->exec($sql))
        {
          echo "yes";
        }else{

          echo "sorry";
        }  
  
  	}
?>