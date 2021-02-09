
<?php
	/*$_POST['pseudo']='lanyaebb';
		$_POST['email']='lamyaebb@gmail.com';
		$_POST['password']='123456';
		$_POST['password2']='123456';*/
$_POST['Radio']="MALADIE";
	if(isset($_POST)){
		$pseudo=$_POST['pseudo'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$radiotype=$_POST['Radio'];
		$results["error"]=false;
	$results["message"]=[];
	
		
	
$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
		if($radiotype=="MALADIE"){
		//verification du pseudo
			if(strlen($pseudo)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/",$pseudo)||strlen($pseudo)>60){
				$results["error"]=true;
				$results["message"]["pseudo"]="pseudo invalide";}
		else{
			$requet=$db->query("SELECT * FROM users WHERE pseudo LIKE '$pseudo'");
				
				$row=$requet->fetch();
				
				if($row){
					$results["error"]=true;
					$results["message"]["pseudo"]="le pseudo est deja pris";
				}
		}//verification de l'e mail
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$results["error"]=true;
				$results["message"]["email"]="email invalide";}
			else{
				$requet=$db->query("SELECT * FROM users WHERE email LIKE '$email'");
				
				$row=$requet->fetch();
				
				if($row){
					$results["error"]=true;
					$results["message"]["email"]="le email est deja pris";
			}
			}
		//verification de password
			if($password!=$password2){
				$results["error"]=true;
				$results["message"]["password"]="les mot se passe doivent etre identiques";
			}
			
			if($results["error"]!=true){
	$sql=$db->query("INSERT INTO users (pseudo,email,password) VALUES('$pseudo','$email','$password')");
					//$results['error']=false;
					//$results['message']['pseudo']="vous etes inscrit";
				}
			
		}if($radiotype=="PROCHE"){
		//verification du pseudo
			if(strlen($pseudo)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/",$pseudo)||strlen($pseudo)>60){
				$results["error"]=true;
				$results["message"]["pseudo"]="pseudo invalide";}
		else{
			$requet=$db->query("SELECT * FROM proch WHERE pseudo LIKE '$pseudo'");
				
				$row=$requet->fetch();
				
				if($row){
					$results["error"]=true;
					$results["message"]["pseudo"]="le pseudo est deja pris";
				}
		}//verification de l'e mail
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$results["error"]=true;
				$results["message"]["email"]="email invalide";}
			else{
				$requet=$db->query("SELECT * FROM proch WHERE email LIKE '$email'");
				
				$row=$requet->fetch();
				
				if($row){
					$results["error"]=true;
					$results["message"]["email"]="le email est deja pris";
			}
			}
		//verification de password
			if($password!=$password2){
				$results["error"]=true;
				$results["message"]["password"]="les mot se passe doivent etre identiques";
			}
			
			if($results["error"]!=true){
	$sql=$db->query("INSERT INTO proch (pseudo,email,password) VALUES('$pseudo','$email','$password')");
					//$results['error']=false;
					//$results['message']['pseudo']="vous etes inscrit";
				}
			
		}
		echo json_encode($results);

	}
	?>