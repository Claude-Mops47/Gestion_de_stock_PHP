<?php
require_once '../db/db.php';

if (
    isset($_POST['add'])
    && !empty($_POST['nom_comm'])
    && !empty($_POST['qte_comm'])
    && !empty($_POST['type_comm'])
) {
    $nom_comm = $_POST['nom_comm'];
    $qte_comm = $_POST['qte_comm'];
    $type_comm = $_POST['type_comm'];

    $sql = "INSERT INTO commande(nom_comm, qte_comm, type_comm) VALUES (:nom_comm, :qte_comm, :type_comm)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_comm', $nom_comm);
    $stmt->bindParam(':qte_comm', $qte_comm);
    $stmt->bindParam(':type_comm', $type_comm);

    $stmt->execute();


    header('Location:commande.php');
}
$stmt = $pdo->query('SELECT * FROM commande');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Commande</title>
</head>

<section id="header">
    <a href="./responsable.php" class="logo">
        Retour
    </a>
</section>


<section id="hero" class="section-p1">
    <h1>Commandes</h1>
    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
                <h4>Add commande</h4>
                <form action="" class="form-group mt-3" method="POST" enctype="multipart/form-data">
                    <label for="nom_comm">Designation :</label>
                    <input type="text" class="form-control mt-3" name="nom_comm" required>
                    <label for="qte_comm">Quantité :</label>
                    <input type="text" class="form-control mt-3" name="qte_comm" required>
                    <label for="type_comm">Type :</label>
                    <input type="text" class="form-control mt-3" name="type_comm" required>

                    <button type="submit" class="btn btn-primary mt-3" name="add">Enregistrer</button>
                </form>
            </div>
            <div class="col-10 mt-3">
                <h3>Liste des Commandes</h3>
                <table class="table table-striped display" id="example">
                    <thead>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Type</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row =  $stmt->fetch()) {
                        ?>

                            <tr>
                                <td><?php echo $row->nom_comm; ?> </td>
                                <td><?php echo $row->qte_comm; ?> </td>
                                <td><?php echo $row->type_comm; ?> </td>
                                <td><?php echo $row->date_comm; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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