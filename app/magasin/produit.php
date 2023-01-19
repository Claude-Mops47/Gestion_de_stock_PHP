<?php
require_once '../db/db.php';

$stmt = $pdo->query('SELECT * FROM produit');

if (isset($_REQUEST['del'])) {
    $sup = intval($_GET['del']);
    $sql = "DELETE FROM produit WHERE id_prod = :id_prod";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id_prod', $sup,  PDO::PARAM_INT);
    $query->execute();
    echo "<script> window.location.href='produit.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Produit</title>
</head>

<section id="header">
    <a href="./addP.php" class="logo">
        Add Produit
    </a>
</section>


<section id="product1" class="section-p1">

    <h2>Liste des Produits</h2>
    <table class="table table-striped display">
        <thead>
            <th>Designation</th>
            <th>Etat en stock</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            while ($row =  $stmt->fetch()) {
            ?>

                <tr>
                    <td><?php echo $row->nom_prod; ?> </td>
                    <td> <span class="badge bg-success">en Stock</span> </td>
                    <td>

                        <a href="updateProduit.php?id=<?php echo $row->id_prod; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                        <a href="produit.php?del=<?php echo $row->id_prod; ?>">
                            <button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>

                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollY": "500px",
                "scrollCollapse": true,
                "paging": false
            });
        });
    </script>

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