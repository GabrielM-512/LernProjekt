<?php
//Not accessible for users, only for programming. Deactivate before going online.
//As the name suggests, this sets up the DB for usage with the rest of the scripts.
require 'backend/src/includes/db_connect.php';

$sql = "DROP DATABASE IF EXISTS LernProjekt;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
	$conn->close();
	return;
}

$sql = "CREATE DATABASE IF NOT EXISTS LernProjekt;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
	$conn->close();
	return;
}

$sql = "USE LernProjekt;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
	$conn->close();
	return;
}

$sql_list = [];

$sql_list[] = "CREATE TABLE IF NOT EXISTS Subjects (
				Subject_ID INT AUTO_INCREMENT NOT NULL,
				Subject_Name VARCHAR(100) NOT NULL,
				PRIMARY KEY (Subject_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS Topics (
				Subject_ID INT NOT NULL,
				Topic_ID INT NOT NULL,
				Topic_Name VARCHAR(100) NOT NULL,
				Grade INT(20),
				Example VARCHAR(100),
				Begriff VARCHAR(100),
				FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID),
				PRIMARY KEY (Topic_ID)
			);";
			
$sql_list[]	= "CREATE TABLE IF NOT EXISTS Lectures (
				Lecture_ID INT NOT NULL,
				Topic_ID INT NOT NULL,
				FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS Tasks ( 
				Topic_ID INT NOT NULL,
				Task_ID INT NOT NULL AUTO_INCREMENT,
				Task_content VARCHAR(100),
				Solution VARCHAR(100),
				Task_Explaination VARCHAR(100),
				Pushtest VARCHAR(100),
				PRIMARY KEY (Task_ID),
				FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS Users (
				User_ID INT NOT NULL,
				Username VARCHAR(20) NOT NULL,
				Password_hashed VARCHAR(256) NOT NULL,
				Email VARCHAR(100),
				PRIMARY KEY (User_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS Level (
				User_ID INT,
				Subject_ID INT,
				Level INT,
				FOREIGN KEY (User_ID) REFERENCES Users(User_ID),
				FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS User_progress (
				User_ID INT,
				Subject_ID INT,
				Topic_ID INT,
				lecture VARCHAR(100),
				FOREIGN KEY (User_ID) REFERENCES Users(User_ID),
				FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
			);";

$sql_list[]	= "CREATE TABLE IF NOT EXISTS User_Errors (
				User_ID INT,
				Subject_ID INT(100),
				Topic_ID INT(100),
				lecture VARCHAR(100),
				Error_ID INT(100),
				Error_count INT,
				FOREIGN KEY (User_ID) REFERENCES Users(User_ID),
				FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID),
				FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
			);";

foreach ($sql_list as $query) {
	if ($conn->query($query) !== TRUE) {
		echo "error: " . conn->error;
		$conn->close()
		return;
	}
}

echo "db init successful";

$conn->close();

?>
