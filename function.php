<head>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
<?php

if($_POST['btn']=='edit')
{
 
$mid=$_POST['mid'];
$mname=$_POST['mname'];

echo'<br>

<div class="text-center">
<h1>The Change Row Form</h1>
<form action="multiedit.php" method="POST">

<label>Name of the Movie </label><br>
<input type="hidden" value="'.$mid.'" name="mid"></input>
<input type="text" value="'.$mname.'" name="mn"></input>';
$q1=mysql_connect("localhost","root","");
mysql_select_db('mov');
if(!$q1)
{
	echo"Unable to Connect!";
}
$q2="SELECT actmov.aid,actor.name FROM actmov JOIN actor on actmov.aid=actor.sno WHERE mid=$mid";
$results=mysql_query($q2);
$i=1;
if(!$q2)
{
	echo"errrors inthe query";	
}
else{
	if(mysql_num_rows($results)>0)
		{	
   
			while ($row = mysql_fetch_array($results))
  			{
   				$id=$row['aid'];
   				$aname=$row['name'];
   				echo"<br>
			<label>Actor names</label><br>
			<input type=\"hidden\" value='$id' name='aid$i'></input>
			<input type=\"text\" value='$aname' name='name$i'></input><br>";
			$i++;
   			}
   				

		}
		echo"<br><br><button type=\"submit\" value='$i' name='bts'class=\"btn-primary btn-lg\">
		Submit</button>
		</form>";		

	}
}

else
if($_POST['btn']=='delete')
{
		echo"<br>Reached Delete section<br>";
		$m=mysql_connect("localhost","root","");
mysql_select_db('mov');
if(!$m)
{
	echo"Cosuldnt connect";
}
else
{
	echo"<br>connected<br>";
	$mid=$_POST['mid'];
	echo"$mid";
		{  
			echo"<br>The movie id is $mid<br>";
			echo"reached the unreachable";
    		$q1="DELETE FROM movie where sno=$mid";
    		$q2="DELETE FROM actmov where mid=$mid";
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
	
}
}
else{

	echo"Null Void Zone";
}

?>