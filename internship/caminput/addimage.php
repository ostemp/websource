<?php

if(isset($_POST['data'])){
	if(isset($_POST['camID'])){
		echo "<h1>data recieved</h1>";

		$img = substr($_POST['data'], 22); // 22 is the magic number here?!

		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);

		$file = $_POST['camID'] . '.png';
		$success = file_put_contents($file, $data);

	}else{
		echo "<h2>Invalid Request Type</h2>";
	}
}
else{
	echo "no data sent";
}

?>