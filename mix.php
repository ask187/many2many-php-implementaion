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
	<h1> Make the Movie Connections</h1>
	<form  style=\" width:50%;height:100%;margin-left:30%; padding:10px;\" action=\"adder.php\" method=\"POST\"> ";
	$q1="SELECT * FROM actor";
	$result1=mysql_query($q1);
	if(!$result1)
	{

		echo"error in thw Query!";
	}
	else
	{
		echo"<label>Chose Actors</label>";
		?>
		<select  multiple="multiple" class="form-control" name="acid[]">
		?>
		<?php
		if(mysql_num_rows($result1)>0)
			{
				while ($row = mysql_fetch_array($result1))
				{
					echo"
					
						<option value=\"".$row['sno']."\">".
						 $row['name']."
						</option>";
					
				}
			}
			echo"</select><br><br>";	
	
			$q2="SELECT * FROM movie";
			$result2=mysql_query($q2);
			if(!$result2)
			{

				echo"error in thw Query!";
			}
			else
			{
				echo"<label>Chose Movies</label>";
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
		<button type=\"submit\" class=\"text-center btn-success btn-block\" >ADD</button>
		</form>
		</div>";
	}

}

?>
</body>
