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
	echo"
	<div class=\"text-center container-fluid\">
	<h1> Section To Delete Movies</h1>
	<form  style=\" width:50%;height:100%;margin-left:30%; padding:10px;\" action=\"remove.php\" method=\"POST\"> ";
	$q2="SELECT * FROM movie";
	$result2=mysql_query($q2);
	if(!$result2)
	{
		echo"error in the Query!";
	}
	else
	{
		echo"<label>Delete which Movies</label>";
		?>
		<select multiple="multiple" class="form-control" name="movid[]">
		<?php
		if(mysql_num_rows($result2)>0)
		{
			while ($row = mysql_fetch_array($result2))
			{
				echo"
					<option value=\"".$row['sno']."\">".
				 	$row['name']."
					</option>";
					
			}
		}
		echo"</select>";
	}
	echo"<br>
	<br>
	<button type=\"submit\" class=\"text-center btn-danger btn-block\" >Delete</button>
	</form>
	</div>";
}



?>
</body>
