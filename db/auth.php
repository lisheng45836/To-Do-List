<?php
  include 'db.php';
  $db=db_open();
  session_start();
  $user = false;
  if(isset($_SESSION['user'])){
    $uid = $_SESSION['user'];
    $user = true;
    $sql = $db->prepare("SELECT name FROM users WHERE id='$uid' ");
    $sql->execute();
    $row=$sql->fetch();
  }else{
    header("location: /web/todo/login.php");
  }

?>