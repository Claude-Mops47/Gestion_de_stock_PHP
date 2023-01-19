<?php
// on va creer une connexion a la base de donnees

$host = 'localhost:3306';
$user = "root";
$pass = "Secret Key";
$dbname = "gestion_de_stock";

try {
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        //echo "La connexion a été établie avec success";
} catch (PDOException $e) {
        echo "Pas de connexion a la base de donnees" . $e->getMessage();
}
