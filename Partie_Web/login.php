<?php
session_start();
//$_POST['pseudo']="ilhame";
//$_POST['password']="hhhs53";
if(isset($_POST)){
		$pseudo=$_POST['pseudo'];
		
		$password=$_POST['password'];
		$results["error"]=false;
	$results["message"]=[];
	$results["role"]=[];
	
		
	
$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
	$requet=$db->query("SELECT * FROM users WHERE pseudo LIKE '$pseudo' && password LIKE '$password'");
				
				$row=$requet->fetch();
				
				if($row){
					
					$results["error"]=false;
					$results["pseudo"]=$pseudo;
					$results["role"]="maladie";

					
					
				
					 }else{$requet=$db->query("SELECT * FROM proch WHERE pseudo LIKE '$pseudo' && password LIKE '$password'");
				
				$row=$requet->fetch();
				
				if($row){
					
					$results["error"]=false;
					$results["pseudo"]=$pseudo;
					$results["role"]="proche";
					
					
				}else{
					$results["error"]=true;
						$results["message"]="pseudo ou le mot de passe incorrect";
				}
				}
	
	echo json_encode($results);
}
?>