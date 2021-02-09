<!doctype html>

<?php
//if(isset($_POST)){
	//echo json_encode($_POST);


		

try {
$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');

} catch(Exception $e){
die('Erreur : '.$e->getMessage());
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "google_maps";

// Create connection
//$conn = new mysqli($servername, $username,$password, $dbname);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//} 

	$results['error']=false;
	$results['message']=[];
$_POST['pseudo']="lamyae";
			$_POST['email']="lamyae@gmail.com";
			$_POST['password']="1234567";
			$_POST['password2']="1234567";


	if(isset($_POST)){
		if( !empty($_POST['pseudo']) &&   !empty($_POST['email']) && !empty($_POST['password']) &&! empty($_POST['password2'])){
			$pseudo=$_POST['pseudo'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$password2=$_POST['password2'];
			//verification du pseudo
			/*if(strlen($pseudo)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/",$pseudo)||strlen($pseudo)>60){
				$results['error']=true;
				$results['messsage']['pseudo']="pseudo invalide";	
			}else{*/
				$requet=$db->prepare("SELECT id FROM users WHERE pseudo=:pseudo");
				$requet->execute([":pseudo"=>$pseudo]);
				$row=$requet->fetch();
				
				if($row){
					$results['error']=true;
					$results['message']['pseudo']="le pseudo est deja pris";
				}
				
	
			
			//verification de l'email
			/*if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$results['error']=true;
				$results['message']['email']="email invalide";
			}else{*/
				$requete=$db->prepare("SELECT id FROM users WHERE email LIKE '.$email'");
				$requet->execute();
				$row=$requete->fetch();
				if($row){
					$results['error']=true;
					$results['message']['email']="l'email est deja existe";
				}
				
				
			
			//verification de password
			if($password!=$password2){
				$results['error']=true;
				$results['message']['password']="les mot se passe doivent etre identiques";
			}
			if($results['error']=false){
				$password=password_hash($password ,PASSWORD_BCR);
				
			      $sql=$db->prepare("INSERT INTO users2(pseudo,email,password) VALUES (':pseudo',':email', ':password')");
				$sql->execute(array([':pseudo'=>$pseudo,':email'=>$email,':password'=>$password]));

				if(sql){
					$results['error']=false;
					$results['message']=" línscription";
				}else{
					$results['error']=true;
					$results['message']="error lheure de  línscription";
					
				}
				
				
			}
		}else{
				$results['error']=true;
				$results['message']="voullez remplez tous les champs";
			
			
		}echo json_encode($results);
	}
		
	
?>		
	