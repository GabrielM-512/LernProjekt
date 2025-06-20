function send_data(username, password, email) {
    filepath = "../../../src/userManagement/create_user.php";
    xhttp = new XMLHttpRequest();

    xhttp.open("POST", filepath, true);

    xhttp.setRequestHeader("username", username);
    xhttp.setRequestHeader("password_hashed", password);
    xhttp.setRequestHeader("mail", email);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { //if the task was successful
            first = xhttp.responseText[0];
            second = xhttp.responseText[1];
            third = xhttp.responseText[2];

            switch (first) {
                case "2":
                    //print a success message
            }
        }
    }

    xhttp.send()
}