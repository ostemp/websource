<?php
// connect to the database
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, "test");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}// otherwise continue

function echoMessageRedirectPage($message, $redirectURL){
	 echo "
	<!DOCTYPE html>
	<html>
	<head>
		<title>Message Page</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='/global.css'>
	</head>
	<body>
	<section>
	<h1>Message</h1>
	<fieldset>
	<p>".$message."</p>
	</fieldset>
	</section>
	<script>setTimeout(function(){window.location='".$redirectURL."';}, 2000)</script>
	</body>
	</html>
	";
}
?>