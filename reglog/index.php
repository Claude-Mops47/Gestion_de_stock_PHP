<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM gerant WHERE id_admin = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>
    <?php require_once '../app/navbar.php'; ?>

    <h2>Welcome <?php echo $row["nom_admin"] ?></h2>
    <a href="logout.php">Logout</a>
</body>

</html>