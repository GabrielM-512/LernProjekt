<?php
include "prepend.php";

require_once BACKEND_INCLUDES . "\db_connect.php";

$email = "a";
if (isset($_POST['mail']) && isset($_POST['username']) && isset($_POST['password_hashed'])) {
    $email = $_POST['mail'];
    $username = $_POST['username'];
    $password_received = $_POST['password_hashed'];
} else {
    echo "incomplete data";
    $conn->close();
    return;
}

//ensure email is valid
if (!is_valid_email($email)) {
    echo "invalid email address";
    $conn->close();
    return;
}

//ensure email isn't already in use
$sql = "SELECT * FROM Users WHERE Email = '$email'";
$result = $conn->query($sql);

if (count($result) > 0) {
    echo "email address already in use";
    $conn->close();
    return;
}

// hash the PW
$password_hashed = hash("sha256", $password_received);

// insert the user into the DB
$sql = "INSERT INTO Users (Username, Password_hashed, Email) Values ($username, $password_hashed, $email);"

if ($conn->query($sql) !== TRUE) {
	echo "error: " . $conn->error;
}


$conn->close();

/*
Function for determining whether or not an email address is valid. Returns True for now because this is not something I'm willing to do right now.
*/
function is_valid_email(string $address) {
    return True;
}
?>
