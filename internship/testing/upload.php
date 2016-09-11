<?php

if(isset($_POST['data'])){
	if($_POST['requestType'] == "770"){
		echo "<h1>data recieved: </h1>" . $_POST['data'];
	}else{
		echo "<h2>Invalid Request Type</h2>";
	}
}
else{
	echo "no data sent";
}

?>