<?php
//Not accessible for users, only for programming. Deactivate before going online.
require 'backend/src/includes/db_connect.php';

$sql = "DROP DATABASE IF EXISTS LernProjekt;";

if ($conn->query($sql) !== TRUE) {
	echo "error: " . conn->error;
} else {

    $sql = "CREATE DATABASE IF NOT EXISTS LernProjekt;
    USE LernProjekt;

	CREATE TABLE IF NOT EXISTS Faecher (
	    Fach_ID INT(100) AUTO_INCREMENT NOT NULL,
		Fach_Name VARCHAR(100) NOT NULL,
        PRIMARY KEY (Fach_ID)
	);

	CREATE TABLE IF NOT EXISTS Themen (
        Fach_ID INT NOT NULL,
        Thema_ID INT NOT NULL,
		Thema_Name VARCHAR(100) NOT NULL,
       	Stufe INT(20),
      	Beispiel VARCHAR,
       	Begriff VARCHAR,
		Beweis VARCHAR,
        FOREIGN KEY (Fach_ID) REFERENCES Faecher(Fach_ID)
   	 );
     
     CREATE TABLE IF NOT EXISTS Lectures (
     	 Lecture_ID INT NOT NULL,
         Thema_ID INT NOT NULL,
         FOREIGN KEY (Thema_ID) REFERENCES Themen(Thema_ID)
     );
    
    	CREATE TABLE IF NOT EXISTS Uebungen ( 
			Thema_ID INT NOT NULL,
			Uebung_ID INT NOT NULL AUTO_INCREMENT,
			Aufgabe VARCHAR,
			Lösung VARCHAR,
			Erklärung VARCHAR,
			Pushtest VARCHAR,
            PRIMARY KEY (Uebung_ID),
 			FOREIGN KEY (Thema_ID) REFERENCES Themen1(Thema_ID)
		);
        
    	CREATE TABLE IF NOT EXISTS Users (
        	User_ID INT NOT NULL,
        	Username VARCHAR(20) NOT NULL,
        	Password_hashed VARCHAR(256) NOT NULL,
        	Email VARCHAR(100)
    	);
    
	CREATE TABLE IF NOT EXISTS Level (
		User_ID INT,
		Fach_ID INT,
		Level INT,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Fach_ID) REFERENCES Faecher(Fach_ID)
	);

	CREATE TABLE IF NOT EXISTS Nutzer_progress (
        User_ID INT,
		Fach_ID INT,
		Thema_ID INT,
		lecture VARCHAR,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Thema_ID) REFERENCES Themen1(Thema_ID)
	);

	CREATE TABLE IF NOT EXISTS User_Errors (
        User_ID INT,
		Fach_ID INT(100),
    	Thema_ID INT(100),
		lecture VARCHAR,
		Error_ID INT(100),
		Error_count INT,
        FOREIGN KEY (User_ID) REFERENCES Nutzer(User_ID),
        FOREIGN KEY (Fach_ID) REFERENCES Faecher(Fach_ID),
        FOREIGN KEY (Thema_ID) REFERENCES Themen1(Thema_ID)
	);"

    if ($conn->query($sql) !== TRUE) {
	    echo "error: " . conn->error;
    } else {
		echo "db init successful";
	}
}

$conn->close();

?>
