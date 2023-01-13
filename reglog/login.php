<?php

require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $username_email = $_POST["username_email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM gerant WHERE nom_admin = '$username_email' OR email = '$username_email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id_admin"];
            header("Location: index.php");
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <?php require_once '../app/navbar.php'; ?>

    <h2>Login</h2>

    <form class="" action="" method="post" autocomplete="off">
        <label for="username_email">Username or Email</label>
        <input type="text" name="username_email" id="" required value=""> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="" required value=""> <br>

        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="register.php">Registration</a>
</body>


</html>