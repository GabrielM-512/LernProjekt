<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LernProjekt";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}

if (isset($setDB)) {
	if ($setDB) {
		$sql = "USE $dbname;";

		if ($conn->query($sql) !== TRUE) {
			echo "error: " . conn->error;
		}
	}
}

?>
