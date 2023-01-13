<?php
require_once 'db.php';

if (isset($_POST['add']) && !empty($_POST['nom_entrepot']) && !empty($_POST['num_entrepot'])) {

    $nom_entrepot = $_POST['nom_entrepot'];
    $num_entrepot = $_POST['num_entrepot'];

    $sql = "INSERT INTO entrepot(nom_entrepot, num_entrepot) VALUES (:nom_entrepot, :num_entrepot)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_entrepot', $nom_entrepot);
    $stmt->bindParam(':num_entrepot', $num_entrepot);

    $stmt->execute();

    header('Location:entrepot.php');
}

$stmt = $pdo->query('SELECT * FROM entrepot');

if (isset($_REQUEST['del'])) {
    $sup = intval($_GET['del']);
    $sql = "DELETE FROM entrepot WHERE id_entrepot = :id_entrepot";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id_entrepot', $sup,  PDO::PARAM_INT);
    $query->execute();
    echo "<script> window.location.href='entrepot.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrepots</title>
</head>

<body>
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
                <h4>Ajouter un Entrepot</h4>
                <form action="" class="form-group mt-3" method="POST" enctype="multipart/form-data">
                    <label for="num_entrepot">Numero :</label>
                    <input type="text" class="form-control mt-3" name="num_entrepot" required>
                    <label for="nom_entrepot">Nom :</label>
                    <input type="text" class="form-control mt-3" name="nom_entrepot" required>

                    <button type="submit" class="btn btn-primary mt-3" name="add">Enregistrer</button>
                </form>
            </div>

            <div class="col-10 mt-3">
                <table class="table table-striped display mt-3" id="example">
                    <thead>

                        <th>Numero de l'entrepot</th>
                        <th>Nom de l'entrepot</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row =  $stmt->fetch()) {
                        ?>

                            <tr>
                                <td><?php echo $row->num_entrepot; ?> </td>
                                <td><?php echo $row->nom_entrepot; ?> </td>
                                <td>
                                    <a href="updateProduit.php?id=<?php echo $row->id_entrepot; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                                    <a href="entrepot.php?del=<?php echo $row->id_entrepot; ?>"><button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer ?')"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>