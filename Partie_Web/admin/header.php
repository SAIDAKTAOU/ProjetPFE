<?php
session_start();
$username = $_SESSION['uname'];
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Document sans titre</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<style>
			body{
				font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana," sans-serif";
				
			}
			ul {
   				 list-style-type: none;
   				 margin: auto;
   				 padding: auto;
    		     overflow: hidden;
    			 background-color: #3b5998;
				 height: 70px;
				 display: block;
				position: fixed;
				width: 100%;
			}

			li {
    			float: right;
				height: 70px;
				margin: auto;
   				 padding: auto;
			}

      		li a {
    				display: block;
    				color: white;
    				text-align: center;
   					 padding: 14px 16px;
    				text-decoration: none;
				    height: 70px;
				}

			/* Change the link color to #111 (black) on hover */
			li a:hover {
   				 background-color: #1CAECF;
				margin: auto;
			}
			h1{
				color: white;
				font-size: 35px;
				font-style: italic;
				margin: 12px auto auto auto;
				padding: inherit;
				height: auto;
				width: auto;
			}
			
		</style>
	</head>

	<body>
		<nav style="position: fixed; width: 100%;">
	 	 <ul>
  			<li><a  href="deconnection.php"> <i class="fa fa-power-off" style="font-size:20px;color:red"></i>  Déconnexion</a></li>
  			<li><a href="admin.php"> <i class="fa fa-user-o" style="font-size:20px;color:limegreen"></i>  <?php echo $username; ?></a></li>
  			<li id="tt" style="float: left; width: 500px; text-align: center;"><h1>Al Zheimer</h1></li>
		 </ul> 
		</nav>
	</body>
</html>