<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        /*
        if (isset($_POST["submit"])){

        $passwordHash = password_hash($password,  PASSWORD_DEFAULT);

        $errors =array();

        if (empty($name) OR empty($email) OR empty($passord) OR empty($repeat_password)){
        array_push ($errors,"All fields are required");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Email is not valid");
        }
        if(strlen($password)<8) {
            array_push($errors,"Password must be at least 8 characters long");
        }
        if($password!==$repeat_password){
            array_push($errors,"Password does not match");
        }
        if (count($errors)>0){
        foreach($errors as $error){
          echo "<div class='alert alter-danger'>$error</div>";
        }
       }else{

       }

    }
*/
        ?>
        <form action="registeration.php" method="post" id = "regist">
            <div class="form-group">
                <input type="text" class ="Form-control" name="name" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="text" class ="Form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class ="Form-control" name="password" placeholder="Passwort:">
            </div>
            <div class="form-group">
                <input type="password" class ="Form-control" name="repeat_password" placeholder="Passwort erneut eingeben:">
            </div>
            <div class="from-btn">
                <input type="submit" class ="btn btn-primary" value="Register" name ="submit">
            </div>
        </form>

        <script type="module">
        import {send_data} from "/send_data.js";
    document.getElementById("regist").addEventListener("submit", function(event) {
    event.preventDefault(); // prevent default form submission
    event.stopImmediatePropagation();

    const form = event.target;
    const formData = new FormData(form);

    console.log("logged");

    // Convert to plain object (optional)
    const data = Object.fromEntries(formData.entries());

    console.log(data); // { username: "johndoe", email: "john@example.com" }
  });
</script>


    
</body>
</html>