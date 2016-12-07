<!DOCTyPE hmtl>
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
	$id=$_POST['btn'];
		  
    		$q1="DELETE FROM movie where sno=$id";
    		$q2="DELETE FROM actmov where mid=$id";
			$result1=mysql_query($q1);
			if(!$result1)
			{
				echo"<br>error in the query";
			}
			$result2=mysql_query($q2);
			if(!$result2)
			{
				echo"<br>error in the query 2";

			}	
			else
			{
				header("location:show.php");
			}
}

?>