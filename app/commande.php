<?php
require_once 'db.php';

if (
    isset($_POST['add'])
    && !empty($_POST['nom_comm'])
    && !empty($_POST['qte_comm'])
    && !empty($_POST['type_comm'])
    && !empty($_POST['date_comm'])

) {
    $nom_comm = $_POST['nom_comm'];
    $qte_comm = $_POST['qte_comm'];
    $type_comm = $_POST['type_comm'];
    $date_comm = $_POST['date_comm'];

    $sql = "INSERT INTO produit(nom_comm, qte_comm, type_comm, date_comm)
         VALUES (:nom_comm, :qte_comm, :type_comm, :date_comm)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom_comm', $nom_comm);
    $stmt->bindParam(':qte_comm', $qte_comm);
    $stmt->bindParam(':type_comm', $type_comm);
    $stmt->bindParam(':date_comm', $date_comm);

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

    <title>Commande</title>
</head>

<body>
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
                <form action="" class="form-group mt-3" method="POST" enctype="multipart/form-data">

                    <label for="">Designation :</label>
                    <input type="text" class="form-control mt-3" name="nom_comm" required>
                    <label for="">Quantite :</label>
                    <input type="text" class="form-control mt-3" name="qte_comm" required>
                    <label for="">Type :</label>
                    <input type="text" class="form-control mt-3" name="type_comm" required>
                    <button type="submit" class="btn btn-primary mt-3" name="add">Enregistrer</button>
                </form>
            </div>
            <div class="col-10 mt-3">
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
</body>

</html>