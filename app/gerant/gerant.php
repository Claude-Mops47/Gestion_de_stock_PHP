<?php
require_once '../db/db.php';


$stmt = $pdo->query('SELECT * FROM gerant WHERE id_admin=3');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Gerant</title>
</head>

<section id="header">
    <a href="../index.php" class="logo">
        Gestion De Stock
    </a>

    <ul id="navbar">
        <li><a href="./fournisseur.php">Fournisseurs</a></li>
    </ul>
</section>

<section id="hero">

    <div class="container">
        <h1>Gerant</h1>
        <div class="row">

            <div class="col-10 mt-3">
                <h3>Info admin</h3>
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row =  $stmt->fetch()) {
                        ?>

                            <tr>
                                <td><?php echo $row->nom_admin; ?> </td>
                                <td><?php echo $row->tel; ?> </td>
                                <td><?php echo $row->email; ?> </td>
                                <td><?php echo $row->adresse; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>


<footer class="section-p1">
    <div class="col">
        <img class="logo" src="img/logo.png" alt="logo">
        <p><strong>Address:</strong> ------------------------, Casablanca Maroc</p>
        <p><strong>Phone:</strong> +212 06 27 28 21 95</p>
        <p><strong>Hours:</strong> --------, Mon - Sat</p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="#">About us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">TRack My Order</a>
        <a href="#">Help</a>
    </div>

    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google play</p>
        <div class="row">
            <img src="img/pay/app.jpg" alt="app">
            <img src="img/pay/play.jpg" alt="play">
        </div>
        <p>Secured Payement Gateways</p>
        <img src="img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>2022, MorningStar - E-comm</p>
    </div>
</footer>


<?php require_once '../style/bS.php'; ?>

</html>