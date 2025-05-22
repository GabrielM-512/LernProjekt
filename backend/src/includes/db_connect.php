<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LernProjekt";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}

$sql = "USE $dbname;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
}
?>
