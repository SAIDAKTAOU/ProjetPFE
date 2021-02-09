<?php
include('header.php');
?>
<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>
		<meta charset="utf-8">
		<title>Administration</title>

		<link rel="stylesheet" href="../css/admincss.css">
		

		
	</head> 

	<body style=" background-image: url(../images/pg.jpg);
	 background-repeat: no-repeat;
	 background-size:100% 100%;
	 " >
	

		
<div style="padding-top: 5%; padding-bottom: 100%;">
	
	<div style="margin: 5px; padding: 5px; text-align: center;"><h1 style="color: blue;">Table des patients :</h1></div>
	
	
		<div>	
		<table style="border-radius: 12px;">
  <tr>
   <th >ID</th>
    <th>Pseudo</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Derière modification</th>
    <th style="text-align: center;"><button style="background-color:#15B2E2;
															border: none;
															width: 300px;
															transition-duration: 0.4s;
														padding: 15px 32px;
														text-decoration: none;
														display: inline-block;
														border-radius: 12px;
														font-size: 15px;
														margin: 4px 2px;
	cursor: pointer;"><a href="SQLtoXML.php" style="font-weight: bold; text-decoration: none;">Afficher tous les positions </a> </button></th>
  </tr>
  
  <?php
			$db = new PDO('mysql:host=localhost;dbname=google_maps','root','');
			$reponse = $db->query(" SELECT * FROM map ");
			
			
			while($row=$reponse->fetch())
			{
				echo '
				
			
				<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['pseudo'].'</td>
							<td>'.$row['latitude'].'</td>
							<td>'.$row['longitude'].'</td>
							<td>'.$row['date_creation'].'</td>
							<td style="text-align: center;"><button style="background-color: #59CCEF;
								border: none;
								width: 250px;
								padding: 15px 32px;
									text-decoration: none;
									display: inline-block;
										font-size: 16px;
								border-radius: 12px;
								margin: 4px 2px;
								cursor: pointer;"><a href="SQLtoXML1.php?q='.$row['id'].'" style="font-weight: bold; text-decoration: none;">Afficher dans la carte</a> </button>
							
							</td>
  				</tr> ';
			}
			?>
 
</table>
</div>


</div>

</body>
</html>
