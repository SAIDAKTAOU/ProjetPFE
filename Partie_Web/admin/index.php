<?php
session_start();
$m="";
if(isset($_POST["cnx"]))
   {
	
	
	if(empty($_POST['uname']) || empty($_POST['psw']))
	{  $m= ' Nom d\'utilisateur ou mot de passe incorrecte !';  }
		
		else{
			
		$usr=$_POST["uname"];
			$psw=$_POST["psw"];
			
					$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
				
					$reponse = $db->query("SELECT * FROM proche WHERE pseudo LIKE '$usr' AND password LIKE '$psw'  " );
					$row=$reponse->fetch();
				
				
				if($row)
				{
				header('Location: admin.php');
					$_SESSION["uname"]=$_POST["uname"];
				}
				else{
					$m="  Nom d'utilisateur ou mot de passe incorrecte";
				}
			
			
				
				
				
			
		}
			

   }

?>
<!DOCTYPE html> 
<html ><head>	
		<meta charset="utf-8">

		<title>Connexion</title>

	
		<link rel="stylesheet" href="../css/index.css" />
	</head>

	<body style=" background-image: url(../images/pg.jpg); background-repeat: no-repeat;background-size:100% 100%; ">
		<form method="post">
  <div class="imgcontainer">
    <img src="../images/forget.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

	  <input class="button" type="submit" name="cnx" value="connexion" style="background-color: #4CAF50">  
			<input class="button" type="reset" value="annuler" style="background-color: cadetblue; " >
			<p style="color: red;"> 
			<?php 
	           echo $m; 
	        ?></p>
		<span class="psw">Mot de passe oublier? : <a href="#">clicker ici</a></span></br>
  </div>
<hr>
  <div style="text-align: center;">
	  
 	  <h3>Vous n'avez pas un compte!</h3>
  	  <a href="inscription.php" class="button" style="width: 400px;aliceblue text-align: center; color:black;background-color: darkslategray;font-weight: bold;">Inscription</a>
		  </div>
    
  </form>
  

	</body>
</html>
