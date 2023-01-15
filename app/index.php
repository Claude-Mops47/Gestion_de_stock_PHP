<?php
// faire appel a la base de donnees

require_once 'db.php';

// ajouter un produit depuis le formulaire 

if (isset($_POST['add']) && !empty($_POST['nom_prod'])) {

    $nom_prod = $_POST['nom_prod'];
    $sql = "INSERT INTO produit(nom_prod) VALUES (:nom_prod)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_prod', $nom_prod);

    $stmt->execute();

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

    <title>Gestion de Stock</title>
</head>

<?php require_once 'navbar.php'; ?>

<body>

    <div>
        <h2>Welcome <?php echo $row["nom_admin"] ?></h2>
        <a href="../reglog/logout.php">Logout</a>
    </div>


    <div class="container">
        <h2>Ajouter un Produit</h2>
        <form action="index.php" class="form-group mt-3" method="POST" enctype="multipart/form-data">
            <label for="">Designation du Produit :</label>
            <input type="text" class="form-control mt-3" name="nom_prod" required>

            <button type="submit" class="btn btn-primary mt-3" name="add">Enregistrer</button>
        </form>

    </div>

</body>
<?php require_once 'footer.php'; ?>

</html>