
<?php

	//$_POST['latitude']='-3.12345678';
	//$_POST['longitude']='25.12345678';
	if(isset($_POST)){
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$pseudo=$_POST['pseudo'];
		$results["error"]=false;
	
	
		
	
$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
		
		
			$requet=$db->query("SELECT * FROM map WHERE pseudo='".$pseudo."' ");
				
				$row=$requet->fetch();
				
				if($row){
					
					       $sql=$db->exec("UPDATE map SET latitude=$latitude, longitude=$longitude, date_creation=CURRENT_TIMESTAMP	 WHERE pseudo='".$pseudo."'" );
					
	 
				        }
				else{
					$sql=$db->exec("INSERT INTO map(latitude,longitude,pseudo) VALUES ($latitude, $longitude,'".$pseudo."')" );
				}
	echo json_encode($_POST);

	}
	?>