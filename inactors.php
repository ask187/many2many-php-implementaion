<?php
$q1=mysql_connect("localhost","root","");
mysql_select_db('mov');
echo"Reached Check Point 1<br>";
if(!$q1)
{

	echo"Could not connect";

}
else
{
	echo"conected";
	$name= $_POST['nam'];
	$q2="INSERT INTO actor(name) VALUES('$name')";
	$q3=mysql_query($q2);
	if(!$q3)
	{

		echo"<br>Couldnt run Query !";
	}
	else
		{	
			header("location:show.php");
		}
}



?>
