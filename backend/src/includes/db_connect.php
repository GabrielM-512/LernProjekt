<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lernprojekt";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
} else echo "conn success!<br>";

$sql = "USE $dbname;";

if ($conn->query($sql) === TRUE) {
	echo "USE schule;<br>";
} else echo "error: " . conn->error;
?>
