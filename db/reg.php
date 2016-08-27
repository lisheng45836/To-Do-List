<?php
	include "db.php";
	$db=db_open();

 if(isset($_POST['submit']))
 {
	$userName=$_POST['userName'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$hash=password_hash($password,PASSWORD_DEFAULT);
	if($userName!=null || $email!=null || $password!=null)
	{
		$sql="INSERT INTO users(name,email,password)value('$userName','$email','$hash')";
		if($db->exec($sql))
		{
			
			header("location: /web/todo/login.php");


		}else{

			echo '<div > There is some problem in inserting record.</div>';
		}
	}
 }
 ?>