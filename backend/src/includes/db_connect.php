<?php
/*
This file serves as the global include for connecting to the server. It also provides the option to instantly connect to the DB by creating the variable $setDB and setting it to True prior to including this file.
*/

// configure server and DB data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LernProjekt";

// establish connection and check if it worked
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}

// check if $setDB has been created and set to true. If so, connect to the DB.
if (isset($setDB)) {
	if ($setDB) {
		$sql = "USE $dbname;";

		if ($conn->query($sql) !== TRUE) {
			echo "error: " . conn->error;
		}
	}
}

?>
