<?php
	function db_open()
	{

		try{
			$db= new PDO('mysql:host=localhost;dbname=toDo','lisheng','lisheng12345');
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}CATCH(PODException $e){
			die("ERROR: ".$e->getMessage());
		}
		return $db;
		
	}
?>