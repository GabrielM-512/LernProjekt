<?php
/*
This file serves as the global include for connecting to the server. It should only ever be used as include_once or require_once.
It provides the option to not instantly connect to the database itself and instead just connect to the server by creating the variable $setDB and setting it to False prior to including this file.
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

// check if $setDB has been created and set to False. If so, exit the script.
if (isset($setDB)) {
	if (!$setDB) {
		return;
	}
}

// connect to the DB
$sql = "USE $dbname;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
}


?>
