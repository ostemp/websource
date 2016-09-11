<?php

// config type variables
$serverIP = "150.237.118.193";
$target_dir = "/Applications/XAMPP/htdocs/gallery/uploads/";
$maxfilesize = 5000000; // (in Kb)

// start of code
$uploadsuccessful = false;
$recordsuccessfull = false;

$target_file = $target_dir . basename($_FILES["imageinput"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

}

// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
else if ($_FILES["imageinput"]["size"] > $maxfilesize) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
else if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jpg") {
	echo "Sorry, only image files are allowed.";
	$uploadOk = 0;
} 
// Check if $uploadOk is set to 0 by an error
else if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	exit();
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["imageinput"]["tmp_name"], $target_file)) {
		$uploadsuccessful = true;
	}
}

if($uploadsuccessful){
	// get the contents of the form
	$objectname = htmlspecialchars($_POST["name"]);
	$printtime = htmlspecialchars($_POST["timetaken"]);
	$printertype = htmlspecialchars($_POST["printertype"]);
	$material = htmlspecialchars($_POST["material"]);
	$description = htmlspecialchars($_POST["description"]);

	$failed = 0;
	if(isset($_POST["fail"])){
		$failed = 1;
	}else{
		$failed = 0;
	}

	$imagedir = "uploads/" . basename($_FILES["imageinput"]["name"]);

	// connect using the prebuilt file
	include("../connection.php");

	$sql = "INSERT INTO object (name, printduration, printertype, material, description, failed, imagedirectory)
			VALUES ('$objectname', '$printtime', '$printertype', '$material', '$description', '$failed', '$imagedir')";
	// send the data to the database
	if ($conn->query($sql) === TRUE) {
		$recordsuccessfull = true;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// close the connection
	$conn->close();

	if( $uploadsuccessful && $recordsuccessfull){
		// echo the success splash screen
		include("success.php");
		exit();
	}
	else{
		if(!$recordsuccessfull){
			echo "The record creation was not successful, check the server connection to the database.";
		}
	}
}
else{
	echo "The image upload was not successful, check connection to the server.";
}

?>