<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("alzheimer");
	
	
	
		$tota_row=mysql_query("select *from patient where Name like '".$_POST["Name"]."%' and Pssword like ".$_POST["Pssword"]."%'");
		$old=mysql_num_rows($tota_row);
		
		if($old>0){
			$chack["succes"]=true;
		}else{
			$chack["error"]=false;
		}
		echo json_encode($chack);
		mysql_close();
		
	
	?>
</body>
</html>