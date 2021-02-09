<?php
$m="";
if(isset($_POST["ins"]))
   {
	
	
	if(empty($_POST['uname']) || empty($_POST['email']) || empty($_POST['psw']) || empty($_POST['psw-repeat']))
	{  $m= '<h3 style="color= red;"> Informations incomplète !</h3>';  }
		
		else{
			
		
			
					$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
				
					$reponse = $db->exec('INSERT INTO proche(pseudo, email, password) VALUES ("'.$_POST['uname'].'", "'.$_POST['email'].'","'.$_POST['psw'].'") ');
				
				
				
			
		}
			

   }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/index.css" />
</head>

<body style=" background-image: url(../images/pg.jpg); background-repeat: no-repeat;background-size:100% 100%; ">
<form method="post" action="inscription.php" style="border:1px solid #ccc; width: 500px;">
 <div class="imgcontainer"><img src="../images/forget.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <h1> Inscription</h1>
    <?php 
	   echo $m; 
	  ?>
    <p>Merci de remplir ce formulaire pour créer un compte.</p>
    <hr>
    <label for="uname"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Répéter le mot de passe</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>



    <div class="clearfix">
		<button type="submit" name="ins" class="signupbtn" style="color: black;font-weight: bold;">S'inscrire</button>
      <button type="reset" value="annuler" style="background-color: cadetblue;color: black;font-weight: bold;">Annuler</button></br>
    </div>
    <hr>
  <div style="text-align: center;">
	  
 	  <h3>Vous avez déja un compte!</h3>
  	  <a href="index.php" class="button" style="width: 400px;aliceblue text-align: center; color:black;background-color:darkslategray;font-weight: bold;">Connexion</a>
		  </div>
  </div>
  
  
</form>
</body>
</html>