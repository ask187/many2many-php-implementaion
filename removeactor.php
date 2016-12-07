<!DOCTyPE hmtl>
<head><title>N to M Relationships</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$m=mysql_connect("localhost","root","");
mysql_select_db('mov');
if(!$m)
{
	echo"Couldnt connect";
}
else
{
	echo"connecetd<br>";
	foreach($_POST['acid'] as $acid1)
		{  
    		$q1="DELETE FROM actor where sno=$acid1";
    		$q2="DELETE FROM actmov where aid=$acid1";
			$result1=mysql_query($q1);
			if(!$result1)
			{
				echo"<br>error in the query";
			}
			$result2=mysql_query($q2);
			if(!$result2){
				echo"<br>error in the query 2";

			}		
			else
			{
				header("location:show.php");
			}
		}
}
?>