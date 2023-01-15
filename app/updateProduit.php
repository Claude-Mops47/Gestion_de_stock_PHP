<?php

require_once 'db.php';

if (isset($_POST['update_btn'])) {
        $id = intval($_GET['id']);
        $nom_prod = $_POST['nom_prod'];

        $sql = "UPDATE produit SET nom_prod=:nom_prod WHERE id_prod=:id";
        $query = $pdo->prepare($sql);

        $query->bindParam(':id', $id);
        $query->execute();

        // Vérification du nombre de lignes affectées
        $count = $query->rowCount();
        if ($count > 0) {
                echo "Mise à jour réussie.";
                echo "<script> window.location.href='produit.php'</script>";
        } else {
                echo "Aucune mise à jour n'a été effectuée.";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Metre a jour Produit</title>
</head>

<?php require_once 'navbar.php'; ?>

<body>
        <h1>Metre a jour ce Produit </h1>

        <div class="container">
                <div class="row">
                        <div class="col-8">

                                <?php

                                $user_id = intval($_GET['id']);
                                $sql = "SELECT `nom_prod` FROM `produit` WHERE id_prod=:id";

                                $query = $pdo->prepare($sql);
                                $query->bindParam(':id', $user_id, PDO::PARAM_INT);
                                $query->execute();

                                $result = $query->fetchAll(PDO::FETCH_OBJ);

                                foreach ($result as $row) {

                                ?>
                                        <form action="" method="POST" class="form-group">
                                                Nom Produit :
                                                <input type="text" name="nom_prod" id="nom_prod" class="form-control" value="<?php echo $row->nom_prod; ?>">
                                                <input type="submit" name="update_btn" id="" value="Metre a jour" class="btn btn-primary mt-3">
                                        </form>
                                <?php } ?>

                        </div>
                </div>
        </div>

</body>

<?php require_once 'footer.php'; ?>

</html>