<?php

	include "db.php";
	$db=db_open();
	session_start();
	if(isset($_SESSION['user']))
	{
		header("location: index.php");
	}

	if(isset($_POST['signin']))
	{

		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql=$db->prepare("SELECT * FROM users WHERE email='$email'");
		$sql->execute();
		$row=$sql->fetch();
		if(password_verify($password,$row['password']))
		{
			$_SESSION['user']=$row['id'];
			header("location: index.php");
		}else{

		echo '<div class="alert alert-danger" role="alert"> 
				something went wrong!
				</div>';
		}

	}

?>