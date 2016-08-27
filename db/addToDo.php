<?php
  
  include "db.php";
  $db=db_open();

  if(isset($_POST['pid'])&&isset($_POST['data'])&&isset($_POST['status'])&& !empty($_POST['data']))
  {


      $id = $_POST['pid']; 
      $action = $_POST['data'];
      $status = $_POST['status'];
      $sql = "INSERT INTO note(title,status,l_id) value ('".$action."','".$status."','".$id."') ";

      if($db->exec($sql))
      {

       echo "yes";

      }else{

       echo "sorry";
      }

  }else{

    echo "shit";
  }


?>


