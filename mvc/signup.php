<?php

// check that the necessary variables are set
if(isset($_POST['newuser']) && isset($_POST['username']) && isset($_POST['password'])){
	
	if($_POST['newuser'] = true){
		// include the connection to the database
		include('../functions.php');
		$username = htmlentities($_POST['username']);
		$passwordPOST = htmlentities($_POST['password']);
		$password = password_hash($passwordPOST, PASSWORD_DEFAULT, ['cost' => 10]);
		// prepare an SQL statement for adding a new user
		$sql = $conn->prepare("INSERT INTO gardenusers (username, password) VALUES(?, ?)");
		if($sql){
			// bind the values to the statement and execute it
			$sql->bind_param("ss", $username, $password);
			$success = $sql->execute();

			if($success){
				// record added to the database, begin the simulation
				echo "user added";
				header('Location: index.php');
				exit();

			}else{
				// record not added to the database
				echo "something went wrong: 63";
			}

		}else{
			// adding to the database failed
				echo "something went wrong: 58";
		}
		// close the connection to the database
		$conn = null;
	}
}
else
{ // they are not set and the user creation process must end
	echo "something went wrong: 44";
}

?>
