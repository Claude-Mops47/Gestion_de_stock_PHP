<?php
// faire appel a la base de donnees

require_once '../db/db.php';

// ajouter un produit depuis le formulaire 

if (isset($_POST['add']) && !empty($_POST['nom_prod'])) {

    $nom_prod = $_POST['nom_prod'];
    $sql = "INSERT INTO produit(nom_prod) VALUES (:nom_prod)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_prod', $nom_prod);

    $stmt->execute();

    // Vérification du nombre de lignes affectées
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo "Mise à jour réussie.";
    } else {
        echo "Aucune mise à jour n'a été effectuée.";
    }

    header('Location:produit.php');
}


$stmt = $pdo->query('SELECT * FROM produit');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Add</title>
</head>


<section id="header">
    <a href="../index.php" class="logo">
        Gestion De Stock
    </a>
    <ul id="navbar">
        <li><a href="./produit.php">Liste des Produit</a></li>
    </ul>
</section>

<section id="hero">
    <h2>Ajouter un Produit</h2>
    <form action="" class="form-group mt-3" method="POST" enctype="multipart/form-data">
        <label for="">Nom du Produit :</label>
        <input type="text" class="form-control mt-3" name="nom_prod" required>

        <button type="submit" class="btn btn-primary mt-3" name="add">Enregistrer</button>
    </form>
</section>


<?php require_once '../style/bS.php'; ?>

</html>