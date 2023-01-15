<?php

require_once 'db.php';

if (isset($_POST['updatebtn'])) {
        $userid = intval($_GET['id']);
        $nom_prod = $_POST['nom_prod'];

        $sql = " UPDATE `produit` SET `nom_prod`=:nomart WHERE id=:nouvelleid ";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nomart', $nom_prod, PDO::PARAM_STR);

        $query->execute();

        echo "<script>alert('Vous avez modifier un produit');</script>";
        echo "<script> window.location.href='produit.php'</script>";
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
                                $userid = intval($_GET['id']);
                                $sql = "SELECT `nom_prod` FROM `produit` WHERE id=:id_prod";

                                $query = $pdo->prepare($sql);
                                $query->bindParam(':id_prod', $userid, PDO::PARAM_INT);
                                $query->execute();

                                $resultat = $query->fetchAll(PDO::FETCH_OBJ);

                                foreach ($resultat as $row) {
                                ?>
                                        <form action="" method="POST" class="form-group">
                                                Nom Produit :
                                                <input type="text" name="nom_prod" id="" class="form-control" value="<?php echo $row->nom_prod; ?>">

                                                <input type="submit" name="updatebtn" id="" value="Metre a jours" class="btn btn-primary mt-3">
                                        <?php } ?>
                                        </form>
                        </div>
                </div>
        </div>

</body>
<?php require_once 'footer.php'; ?>


</html>