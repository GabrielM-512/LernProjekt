<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            // required_once ""; (datenbank name)
            //$sql = "SELECT * FROM (users) WHERE email = '$email'";
            //$result = mysqli_query($conn, $sql);
            //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //if ($user) {
            //    if (password_verify(password, $user["password"]))
            //        header ("Location : index.php");
            //         die();
            //}else{
            // echo "<div class= 'alert alert-danger'>Password does not match</div>"
            //}else{
            //
            // echo "<div class= 'alert alert-danger'>Email does not match</div>"
            //}
        }
        ?>
        <from action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Passwort eingeben:" name="passwort" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>

        </from>
    </div>
    
</body>
</html>