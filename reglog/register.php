<?php
require 'config.php';

if (!empty($_SESSION["id_admin"])) {
    header("Location: ../app/index.php");
}

if (isset($_POST["submit"])) {

    $nom_admin = $_POST["nom_admin"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $duplicate = mysqli_query($conn, "SELECT * FROM gerant WHERE nom_admin = '$nom_admin' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        // echo "<scrip> alert('Username or Email Nas Already Taken'); </script>";
        echo "Username or Email Nas Already Taken";
    } else {
        if ($password == $confirm_password) {

            $query = "INSERT INTO gerant VALUES('','$nom_admin','$tel','$email','$adresse','$password')";

            mysqli_query($conn, $query);
            // echo "<script> alert('Registration Successful'); </script>";
            echo "Registration Successful";
        } else {
            // echo "<script> alert('Password Does Not Match'); </scrip>";
            echo "Password Does Not Match";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>

<body>
    <h2>Registration</h2>

    <form class="" action="" method="post" autocomplete="off">

        <label for="nom_admin">Name :</label>
        <input type="text" name="nom_admin" id="" required value=""> <br>
        <label for="tel">Telephone :</label>
        <input type="number" name="tel" id="" required value=""> <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="" required value=""> <br>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="" required value=""> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="" required value=""> <br>
        <label for="confirm_password">ConfirmPassword</label>
        <input type="password" name="confirm_password" id="confirm_password" required value=""> <br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
</body>

</html>