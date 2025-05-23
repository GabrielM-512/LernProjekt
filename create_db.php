<?php
//Not accessible for users, only for programming. Deactivate before going online.
require 'backend/src/includes/db_connect.php';

$sql = "DROP DATABASE IF EXISTS LernProjekt;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
} else {

    $sql = "CREATE DATABASE IF NOT EXISTS LernProjekt;
    USE LernProjekt;

	CREATE DATABASE IF NOT EXISTS LernProjekt;
    USE LernProjekt;

	CREATE TABLE IF NOT EXISTS Subjects (
	    Subject_ID INT(100) AUTO_INCREMENT NOT NULL,
		Subject_Name VARCHAR(100) NOT NULL,
        PRIMARY KEY (Subject_ID)
	);

	CREATE TABLE IF NOT EXISTS Topics (
        Subject_ID INT NOT NULL,
		Topic_ID INT NOT NULL,
		Topic_Name VARCHAR(100) NOT NULL,
       	Grade INT(20),
      	Example VARCHAR,
       	Begriff VARCHAR,
		Beweis VARCHAR,
        FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID)
   	 );
     
     CREATE TABLE IF NOT EXISTS Lectures (
     	 Lecture_ID INT NOT NULL,
         Topic_ID INT NOT NULL,
         FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
     );
    
    	CREATE TABLE IF NOT EXISTS Tasks ( 
			Topic_ID INT NOT NULL,
			Task_ID INT NOT NULL AUTO_INCREMENT,
			Task_content VARCHAR,
			Solution VARCHAR,
			Task_Explaination VARCHAR,
			Pushtest VARCHAR,
            PRIMARY KEY (Task_ID),
 			FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
		);
        
    	CREATE TABLE IF NOT EXISTS Users (
        	User_ID INT NOT NULL,
        	Username VARCHAR(20) NOT NULL,
        	Password_hashed VARCHAR(256) NOT NULL,
        	Email VARCHAR(100)
    	);
    
	CREATE TABLE IF NOT EXISTS Level (
		User_ID INT,
		Subject_ID INT,
		Level INT,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID)
	);

	CREATE TABLE IF NOT EXISTS Nutzer_progress (
        User_ID INT,
		Subject_ID INT,
		Topic_ID INT,
		lecture VARCHAR,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
	);

	CREATE TABLE IF NOT EXISTS User_Errors (
        User_ID INT,
		Subject_ID INT(100),
    	Topic_ID INT(100),
		lecture VARCHAR,
		Error_ID INT(100),
		Error_count INT,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Subject_ID) REFERENCES Subjects(Subject_ID),
        FOREIGN KEY (Topic_ID) REFERENCES Topics(Topic_ID)
	);"

    if ($conn->query($sql) !== TRUE) {
	    echo "error: " . conn->error;
    } else {
		echo "db init successful";
	}
}

$conn->close();

?>
