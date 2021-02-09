<?php
include('header.php');
?>
<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>	
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

		<title>Administration Google Maps</title>

		<link rel="stylesheet" href="css/html1.css">
		<link rel="stylesheet" href="css/style.css" />
		<link href="css/default.css" rel="stylesheet">

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script src="js/util.js"></script>
	</head>

	<body>
		
		<?php	require('id_connexion.php');	?>

		<div  id="content">
			<h1>Accueil Google Maps !</h1>
			<div >
				<div id="map-canvas"></div>

				<?php
					$sql='SELECT * FROM map;';
					$req=$bdd->query($sql);
					require('map.php');
				?>
			</div>
		</div>

	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
