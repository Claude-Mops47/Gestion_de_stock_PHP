<?php

require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: ../app/index.php");
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
            header("Location: ../app/index.php");
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
    <?php require_once 'get_style.php'; ?>

    <div class="login">

        <h2>Login</h2>

        <form method="post" autocomplete="off">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="username_email" name="username_email" class="form-control" />
                <label class="form-label" for="username_email">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="register.php">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>

    </div>

</body>


</html>