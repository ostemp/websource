<?php 
session_start();

if (!isset($_SESSION['user'])) {
    // check the post variables for values
    if(isset($_POST['username']) && isset($_POST['password'])){
    	// if username and password match the database set session 'user' to post username
        session_regenerate_id();
    	include_once($_SERVER['DOCUMENT_ROOT']. '/internship/connection.php');
    	$username = htmlentities($_POST['username']);
    	$password = htmlentities($_POST['password']);
    	// WARNING!! UNPREPARED SQL STATEMENT - POST REQUEST VULNERABILITY
        $sql = "select * from users where username = '$username' and password = '$password'";
        $result = $conn->query($sql);
        // check that the user exists with the above credentials
        $numresults = $result->num_rows;
        if($numresults == 1){
        	// log in successful
    		//echo "logged in as: " . $username;
    		$_SESSION['user'] = $username;
        }else{
        	// do nothing
        }

    }
    // else do nothing because nobody is logged in
    else{
    	//echo "nothing happened";
	}
}

if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
