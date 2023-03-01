<?php
require_once '../db/db.php';


$stmt = $pdo->query('SELECT * FROM gerant WHERE id_admin=3');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>Gerant</title>
</head>

<section id="header">
    <a href="../index.php" class="logo">
        Gestion De Stock
    </a>

    <ul id="navbar">
        <li><a href="./fournisseur.php">Fournisseurs</a></li>
    </ul>
</section>

<section id="hero">

    <div class="container">
        <h1>Gerant</h1>
        <div class="row">

            <div class="col-10 mt-3">
                <h3>Info admin</h3>
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row =  $stmt->fetch()) {
                        ?>

                            <tr>
                                <td><?php echo $row->nom_admin; ?> </td>
                                <td><?php echo $row->tel; ?> </td>
                                <td><?php echo $row->email; ?> </td>
                                <td><?php echo $row->adresse; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>


<footer class="section-p1">
    <div class="copyright">
        <p>2022, MorningStar - E-comm</p>
    </div>
</footer>


<?php require_once '../style/bS.php'; ?>

</html>