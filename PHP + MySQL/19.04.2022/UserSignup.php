<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>User regisatration form.</h1>

    Please fill in the following to signup with our website:

    <?php

    if (isset($_POST["Username"], $_POST["PSW"], $_POST["ConfirmPSW"])) {
        //$sqlInsert->execute();
        if ($_POST["PSW"] == $_POST["ConfirmPSW"]) {
            $host = "localhost";
            $user = "root";
            $psw = "";
            $portnu = 3306;
            $database = "shop";

            $connection = new mysqli($host, $user, $psw, $database, $portnu);
            $sqlInsert = $connection->prepare("INSERT INTO Users(UserName,UserPassword) Values(?,?)");
            $sqlInsert->bind_param("ss", $_POST["Username"], $_POST["PSW"]);
            if (!$sqlInsert->execute()) {
                print("User already exists!");
            } else {
                print("Welcome");
            }
        } else {
            print("Password don`t match");
        }

    }

    ?>


    <form method="POST">
        <input type="text" name="Username" placeholder="Username">
        <input type="Password" name="PSW" placeholder="Password">
        <input type="Password" name="ConfirmPSW" placeholder="Confirm Password">
        <input type="submit" name="Go" value="Register">
    </form>


</body>

</html>