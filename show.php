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
	echo'
	<div class="container-fluid text-align"><br>
	
	';
	echo"<button onClick=\"location.href='actor.html'\" class=\"btn-primary btn-lg\"> Add Actor</button> 
	<button onClick=\"location.href='movie.html'\" class=\"btn-primary btn-lg\"> Add Movie</button>
	<button onClick=\"location.href='mix.php'\" class=\"btn-primary btn-lg\"> Movie Connection</button>
	<button onClick=\"location.href='delete.php'\" class=\"btn-danger btn-lg\"> Delete Movie</button>
	<button onClick=\"location.href='deleteactor.php'\" class=\"btn-danger btn-lg\"> Delete Actor</button><br><br> ";
	$q1="
	SELECT movie.sno, movie.name,GROUP_CONCAT(actor.name) AS aname
	FROM movie
	JOIN
	actmov ON 
	movie.sno = actmov.mid
	JOIN actor ON 
	actor.sno = actmov.aid
	GROUP BY movie.sno
	
	";

  	$results=mysql_query($q1);
  	if(!$results)
  	{

  		echo"<br>fail query";
  	}
  	else
  	{
  		echo '<table class="table table-bordered table-hover table-responsive">
    	<tr><th>SNO</th><th>Movie Name</th><th>Actor Name</th></tr>';
		if(mysql_num_rows($results)>0)
		{	
   
			while ($row = mysql_fetch_array($results))
  			{
   				$id=$row['sno'];
   				$mname=$row['name'];
   				$aname=$row['aname'];
   				

   				echo"<tr><td>$id</td>
   				<td>$mname</td>
   				<td>$aname</td>
   				</tr>";
			}
		}
	}
	echo'</div>';
}
?>