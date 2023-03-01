<?php
require_once '../db/db.php';

if (
    isset($_POST['add'])
    && !empty($_POST['nom_fournisseur'])
    && !empty($_POST['prenom'])
    && !empty($_POST['tel'])
    && !empty($_POST['email'])
    && !empty($_POST['adresse'])
) {

    $nom_fournisseur = $_POST['nom_fournisseur'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO fournisseur(nom_fournisseur, prenom, tel, email, adresse) VALUES (:nom_fournisseur, :prenom, :tel, :email, :adresse)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_fournisseur', $nom_fournisseur);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':adresse', $adresse);

    $stmt->execute();

    header('Location:fournisseur.php');
}

$stmt = $pdo->query('SELECT * FROM fournisseur');

if (isset($_REQUEST['del'])) {
    $sup = intval($_GET['del']);
    $sql = "DELETE FROM fournisseur WHERE id_fournisseur = :id_fournisseur";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id_fournisseur', $sup,  PDO::PARAM_INT);
    $query->execute();
    echo "<script> window.location.href='fournisseur.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Fournisseur</title>
</head>

<section id="header">
    <a href="./gerant.php" class="logo">
        Retour
    </a>


</section>

<section id="hero" class="section-p1">

    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
                <h4>Ajouter un Fournisseur</h4>
                <form action="" class="form-group mt-3" method="POST" enctype="multipart/form-data">

                    <label for="nom_fournisseur">Nom :</label>
                    <input type="text" class="form-control mt-3" name="nom_fournisseur" required>

                    <label for="prenom">Prenom :</label>
                    <input type="text" class="form-control mt-3" name="prenom" required>

                    <label for="tel">Telephone :</label>
                    <input type="text" class="form-control mt-3" name="tel" required>

                    <label for="email">Email :</label>
                    <input type="text" class="form-control mt-3" name="email" required>

                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control mt-3" name="adresse" required>


                    <button type="submit" name="add">Enregistrer</button>
                </form>
            </div>

            <div class="col-10 mt-3">
                <h3>Liste des Fournisseurs</h3>
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row =  $stmt->fetch()) {
                        ?>

                            <tr>
                                <td><?php echo $row->nom_fournisseur; ?> </td>
                                <td><?php echo $row->prenom; ?> </td>
                                <td><?php echo $row->tel; ?> </td>
                                <td><?php echo $row->email; ?> </td>
                                <td><?php echo $row->adresse; ?> </td>
                                <td>
                                    <a href="updateFournisseur.php?id=<?php echo $row->id_fournisseur; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                                    <a href="fournisseur.php?del=<?php echo $row->id_fournisseur; ?>"><button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer ?')"><i class="fas fa-trash"></i></button></a>
                                </td>
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