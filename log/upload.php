<?php
// require the connection to the database and othr functions
require('../functions.php');

// get the title, text and date
$logpassword = 'fidelis';

if(!isset($_POST['password']) || !isset($_POST['title']) || !isset($_POST['text'])){
		header("Location:index.php");
}
else{
	// check the password in the request
	if($_POST['password'] != $logpassword){
		header("Location:index.php");
	}
	else{
		// get information from the request
		$title = htmlspecialchars($_POST['title']);
		$text = htmlspecialchars($_POST['text']);
		// and add it to the database
		$sql = $conn->prepare("INSERT INTO logs (title, text) VALUES(?, ?)");
		if($sql){
			$sql->bind_param("ss", $title, $text);
			// finally execute the prepared statement
			$sql->execute();

			echoMessageRedirectPage("Entry successfully added!", "index.php");
		}
		else{
			var_dump($conn->error);
			echoMessageRedirectPage("Something went wrong with the prepare.", "index.php");
		}
	}
	
}

$conn = null;
?>