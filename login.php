<?php

include "db.php";
session_start();

if (isset($_POST["name"]) && isset($_POST["phone"])) {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    header("location: index.php");


    $q = "SELECT * FROM `user` WHERE  uname='$name' && phone='$phone'";
    if ($rq = mysqli_query($db, $q)) {

        if (mysqli_num_rows($rq) == 1) {
            $_SESSION["userName"] = $name;
            $_SESSION["phone"] = $phone;
        } else {
            $q = "SELECT * FROM `user` WHERE phone='$phone'";
            if ($rq = mysqli_query($db, $q)) {
                if (mysqli_num_rows($rq) == 1) {
                    echo "<script>alert($phone+' This number is already registered')</script>";
                } else {

                    $q = "INSERT INTO `user`(`uname`, `phone`) VALUES ('$name', '$phone')";

                    if ($rq = mysqli_query($db, $q)) {
                        $q = "SELECT * FROM `user` WHERE  uname='$name' && phone='$phone'";

                        if ($rq = mysqli_query($db, $q)) {

                            if (mysqli_num_rows($rq) == 1) {

                                $_SESSION["userName"] = $name;
                                $_SESSION["phone"] = $phone;
                                header("location: index.php");
                            }
                        }
                    }
                }
            }
        }
    }
}

?>

<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loign.css">
    <title>Chatroom</title>
</head>

<body>
    <h1>Chatroom</h1>
    <h2>Login</h2>
    <p>This chatroom is powered by Codewavez for more info <a href="www.google.com">contact us </a>.</p>

    <form action="" method="post">
        <h3>UserName</h3>
        <input type="text" placeholder="short Name" name="name">

        <h3>Mobile No:</h3>
        <input type="number" placeholder="With Country Code" min="111111111" max="999999999" name="phone">

        <button>Login / Register</button>
    </form>
</body>

</html>