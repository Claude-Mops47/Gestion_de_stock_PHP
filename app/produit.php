<?php
require_once 'db.php';

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
    <title>Produit</title>
</head>

<body>
    <?php require_once 'navbar.php'; ?>
    <div class="container">
        <h2>Liste des Produits</h2>
        <table class="table table-striped display mt-3" id="example">
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