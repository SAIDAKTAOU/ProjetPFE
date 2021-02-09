<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>	
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

		<title>Administration Google Maps</title>

		<link rel="stylesheet" href="css/html.css">
		<link rel="stylesheet" href="css/style.css" />
	</head>

	<body>
	<div id="header"></div>
	<section id="content">
		<?php
		$q= intval($_GET['q']);
		
			require('../id_connexion.php');

			//$sql='SELECT * FROM map WHERE id=$q;';
			$req=$bdd->query("SELECT * FROM map WHERE id = ".$q."");
            
		    
			$filename= "../xml1/point.xml";

			if (file_exists($filename)){
				unlink($filename);
			}else{
				echo "le fichier xml n'existe pas";
			}

			$xml = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>';
			$xml .= '<markers>';
		
			while ($point = $req->fetch(PDO::FETCH_OBJ)){
				
				$xml .= "<marker id='".$point->id."' lng='".$point->longitude."' lat='".$point->latitude."' description='".nl2br("&lt;div class=\"window\"&gt;".$point->ville."&lt;br /&gt;&lt;br /&gt;".$point->pseudo."&lt;/div&gt;")."' />";
			
			} //fin de la boucle while
			$xml .= '</markers>';

			file_put_contents("$filename",$xml);
			header("location: ../indexmap1.php");
		?>
	</section>

</body>
</html>
