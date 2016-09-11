<!DOCTYPE html>
<html>
<head>
	<title>3D Printed Object Collector</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel='stylesheet' href='/corestyle.css'>
	<style type="text/css">
		img{
			width: 200px;
			margin: 0 auto;
			padding-left: 5px;
			padding-right: 5px;
		}
		button{
			float:right;
			height: ;
		}
		table{
			width: auto;
			margin: 0 auto;
		}
		tr{
			text-align: center;
			margin: 0 auto;
		}
		input.username{
			float: right;
			width: 100px;
		}

fieldset.gallery{
	padding-top: 0px;
	padding: 0 auto;
}
table{
	padding-top: 0;
	padding-bottom: 0;
}
	</style>
</head>
<body>
<section>
<header>
<h1>3D Printed Object Collector</h1>
</header>
<fieldset>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Object name (e.g. turbine blade)" required>

		<input type="number" name="timetaken" placeholder="Printing Time">

		<select name="printertype">
			<option value="Ultimaker 2+">Ultimaker 2+</option>
			<option value="Ultimaker 2+ Extended">Ultimaker 2+ Extended</option>
			<option value="Formlabs F2">Resin (Formlabs F2)</option>
			<option value="Project 660 Pro">Powder (ProJet 660 Pro)</option>
			<option value="Laser Cutter">Laser</option>
			<option value="Makerbot Replicator Z18">Makerbot Replicator Z18</option>
			<option value="Makerbot Replicator Desktop">Makerbot Replicator Desktop</option>
		</select>
		<select name="material">
			<option value="PLA/PHA Filament">PLA/PHA Filament (any color)</option>
			<option value="ABS">ABS</option>
			<option value="Woodfill">Woodfill</option>
			<option value="Corkfill">Corkfill</option>
			<option value="Brassfill">Brassfill</option>
			<option value="Bronzefill">Bronzefill</option>
			<option value="Copperfill">Copperfill</option>
			<option value="Copolyester">Co-polyester</option>
			<option value="Tough Resin">Resin (tough)</option>
			<option value="Flexible Resin">Resin (flexible)</option>
			<option value="Grey Resin">Resin (grey)</option>
			<option value="Black Resin">Resin (black)</option>
			<option value="White Resin">Resin (white)</option>
			<option value="Clear Resin">Resin (clear)</option>
			<option value="Castable Resin">Resin (castable)</option>
			<option value="Powder">Powder</option>
			<option value="Sheet Wood">Sheet Wood</option>
			<option value="Sheet Plastic">Sheet Plastic</option>
			<option value="Sheet Metal">Sheet Metal</option>
		</select></br>
		<p><input type="text" name="description" id="wide" placeholder="Brief description (e.g. printed by [name] to see if [test] would work)" required>
		<input type="checkbox" name="fail" value="fail">Failed</p>

		<input type="file" name="imageinput" accept="image/*" placeholder="Image" required>		
		<input type="submit" name="submit" value="Publish">
		<input class="username" type="password" name="username" placeholder="username" required>

	</form>
	

</fieldset>

<fieldset class='gallery'>
	<h2>Recent Prints</h2>
		<?php
		// connect to the database
		include("../connection.php");
		// run an sql query to get all the data
		$sql = "select * from object order by dateadded DESC";
		$result = $conn->query($sql);
		echo "<table><tr>";
		// go through each of the records, adding the data to the table
		if($result->num_rows > 0){
			$counter = 0;
			while($row = $result->fetch_assoc()){
				$counter ++;
				if($counter > 4) break;
				echo "<td><img width='300px' src='../gallery/".$row["imagedirectory"]."'></td>";
			}
		}
		echo "</tr></table>";
		?>	
	<button onclick="window.location='../gallery'">View Full Gallery</button>
</fieldset>
</section>
</body>
</html>