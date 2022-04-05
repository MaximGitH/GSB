<?php 
$dsn = 'mysql:host=localhost; dbname=gsbrole; port=3306; charset=utf8';

try {
    $pdo = new PDO($dsn, 'root' , '');
}
catch (PDOException $exception) {
    exit('Erreur de connexion à la base de données');
}

?>