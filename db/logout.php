<?php

	session_start(); 
	
	if(isset($_GET['logout']))
	{

		session_destroy();
		unset($_SESSION['user']);
		header("location: /web/todo/login.php");
	}

?>