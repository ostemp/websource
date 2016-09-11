<?php
// connect to the database
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, "testcenter");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}// otherwise continue

?>