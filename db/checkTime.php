<?php
	  include "db.php";
  		$db=db_open();

	if(isset($_GET['result'])){

		sleep(30);
		date_default_timezone_set('Australia/Brisbane');
		$dateTime = date('Y-m-d H:i:00');
		//echo $dateTime;
		//$dateTime = '2016-08-14 13:42:00';
		$sql =$db->prepare("SELECT title,reminder FROM note");
		$sql->execute();
		$x = 0;
		while($time = $sql->fetch()){
			
			if($dateTime == $time['reminder'])
			{
				//echo "match" + $time['reminder'];
				//
				echo $time['title'];


			}else{
				
				echo "";
			}
		}

		// foreach ($time as $value) {
			
		// 	if($value == "2016-08-17 18:07:00")
		// 		{
		// 			echo "yes";
		// 		};
		// }
		
	}else{

		echo "shit";
	}

	
?>