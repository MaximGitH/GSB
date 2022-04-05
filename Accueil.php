<?php 
include 'Menu.php';
if(!isset($_SESSION)){
    session_start();
}

if($_SESSION['id'] !== 'non'){
?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexion.css">
    <title>Acceuil</title>
</head>
<body id="SeConnecter">
<div class="">
    <div class="card">

<?php 


include 'Connexion_bdd.php';

$query = $pdo->query ("select nom , prenom , role from `utilisateur` where id = '".$_SESSION["id"]."'");

$resultat = $query->fetchAll();

foreach ($resultat as $key => $variable)
{
    $nom = $resultat[$key]["nom"];
    $prenom = $resultat[$key]["prenom"];
    $rang = $resultat[$key]["role"];
}



$query = $pdo->query ("select nom , prenom , role from `utilisateur` where id = '".$_SESSION["id"]."'");

$resultat = $query->fetchAll();

foreach ($resultat as $key => $variable)
{
    $nom = $resultat[$key]["nom"];
    $prenom = $resultat[$key]["prenom"];
    $rang = $resultat[$key]["role"];
}
if($rang == 0){
    $status = "visiteur";
}
else if($rang == 1){
    $status = "comptable";
}
else{
    $status = "admin";
}

echo "<center><p>Bienvenue sur votre espace,  ". $nom ."  ". $prenom ." ! </p></center></br>";
echo "<center><p>Vous êtes :  ". $status ."  </p></center></br>";

?>

</div>

</div>
</body>
</html>
<?php }else{
    echo "<center><h2>Erreur dans la connexion, essayez de vous reconnecter.</h2></center>";
}?>