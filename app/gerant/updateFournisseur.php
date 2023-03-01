<?php

require '../db/db.php';

if (isset($_POST['update_btn'])) {
    // validation - convert id from string to integer
    $id = (int)$_GET['id'];

    // capture form data
    $nomFournisseur = $_POST['nom'];
    $prenom        = $_POST['prenom'];
    $tel           = $_POST['tel'];
    $email         = $_POST['email'];
    $adresse       = $_POST['adresse'];

    // Update query
    $sql  = "UPDATE fournisseur SET nom_fournisseur = :nom_fournisseur, prenom = :prenom, tel = :tel, email = :email, adresse = :adresse WHERE id_fournisseur = :id_fournisseur";
    $stmt = $pdo->prepare($sql);

    // Binding parameters
    $params = [
        ':id_fournisseur' => $id,
        ':nom_fournisseur' => $nomFournisseur,
        ':prenom' => $prenom,
        ':tel' => $tel,
        ':email' => $email,
        ':adresse' => $adresse
    ];

    // Execute the statement
    $stmt->execute($params);

    // handle response/result
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        echo "Mise à jour réussie.";
        echo "<script> window.location.href='fournisseur.php'</script>";
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
    <link rel="stylesheet" href="../style/style.css">

    <title>Metre a jour Fournisseur</title>
</head>

<br>
<br>

<section id="hero">
    <h1>Metre a jour le Fournisseur</h1>

    <div class="container">
        <div class="row">
            <div class="col-8">

                <?php

                // $user_id = intval($_GET['id']);
                $user_id = $_GET['id'] ?? 0; // assigns $user_id to 0 if $_GET['id'] is not set. 

                $sql = "SELECT `nom_fournisseur`, `prenom` , `tel`, `email`, `adresse` FROM `fournisseur` WHERE id_fournisseur=:id";

                $query = $pdo->prepare($sql);
                $query->bindParam(':id', $user_id, PDO::PARAM_INT);
                $query->execute();

                $result = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($result as $row) {

                ?>
                    <form action="" method="POST" class="form-group">
                        Nom :
                        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $row->nom_fournisseur; ?>">
                        Prenom :
                        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $row->prenom; ?>">
                        Telephone :
                        <input type="text" name="tel" id="tel" class="form-control" value="<?php echo $row->tel; ?>">
                        Email :
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email; ?>">
                        Address :
                        <input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo $row->adresse; ?>">

                        <input type="submit" name="update_btn" value="Metre a jour" class="btn btn-primary mt-3">
                        <a href="./fournisseur.php" type="submit" class="btn btn-primary mt-3">Annuler</a>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>

</section>

<?php require_once '../style/bS.php'; ?>

</html>