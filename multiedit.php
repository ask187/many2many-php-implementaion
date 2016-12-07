<?php
/*Most difficult code in LYF GG
Variable name in the inputs
*/
$c=mysql_connect("localhost","root","");
mysql_select_db('mov');
if(!$c)
{

	echo"couldnt connect";
}
else
{
echo"This is the multi-edit page<br>";
$mnew=$_POST['mn'];
$mid=$_POST['mid'];
echo"$mnew<br>$mid<br>";
$q3="UPDATE movie SET name='$mnew' WHERE sno='$mid'";
$result2=mysql_query($q3);
if(!$result2)
{
	echo"query 1 has an issues";
}
else
	{

$i=$_POST['bts'];
$j=1;
echo"$i <br> $j";
while($j<$i)
	{
		$id=$_POST['aid'.$j];
		$v=$_POST['name'.$j];
		$q2="UPDATE actor SET name='$v' WHERE sno='$id'";
		$result=mysql_query($q2);
		if(!$result)
		{
			echo"Unable to update";
		}
		else
		{
			echo"Updated";
		}
		$j++;
	}
	}
}	


?>