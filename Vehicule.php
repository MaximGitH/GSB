<?php
include 'Menu.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['id'] !== 'non'){
    

?>
<html>
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/pages.css">
</head>
<body id="SeConnecter">
 <div class="card">

<?php 



include 'Connexion_bdd.php';

$query2 = $pdo->query ("select marque , cv  from `vehicule` where iduser = '".$_SESSION["id"]."'");
$query3 = $pdo->query ("select typedevehicule  from `typevehicule` inner join `vehicule` on vehicule.typevehiculeV = typevehicule.id_vehicule where iduser = '".$_SESSION["id"]."'");

$resultat2 = $query2->fetchAll();
$resultat3 = $query3->fetchAll();
$marque = null;
$cv = null;
$type = null;
foreach ($resultat2 as $key2 => $variable2)
{
    $marque = $resultat2[$key2]["marque"];
    $cv = $resultat2[$key2]["cv"];
}

foreach ($resultat3 as $key3 => $variable)
{
    $type = $resultat3[$key3]["typedevehicule"];
}


if(isset($_POST['validation'])){
    
    
    if(strlen($marque) == 0 and strlen($cv) == 0){
        $sql = ("insert into vehicule (cv,marque,iduser,typevehiculeV) VALUES ('".$_POST["cv"]."','".$_POST["marque"]."','".$_SESSION["id"]."'".$_POST['type'].")");
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
    }
    else{
        
        $sql5 = ("UPDATE vehicule SET cv = '".$_POST["cv"]."',typevehiculeV = '".$_POST['type']."' , marque = '".$_POST["marque"]."' where iduser = '".$_SESSION["id"]."'");
        $stmt5= $pdo->prepare($sql5);
        $stmt5->execute();
    }
    
    
    
}

$query2 = $pdo->query ("select marque , cv , typevehiculeV  from `vehicule` where iduser = '".$_SESSION["id"]."'");

$resultat2 = $query2->fetchAll();
$marque = null;
$cv = null;
$vehicule = null;
foreach ($resultat2 as $key2 => $variable2)
{
    $marque = $resultat2[$key2]["marque"];
    $cv = $resultat2[$key2]["cv"];
    $vehicule = $resultat2[$key2]["typevehiculeV"];
}

$query2 = $pdo->query ("select marque , cv  from `vehicule` where iduser = '".$_SESSION["id"]."'");
$query3 = $pdo->query ("select typedevehicule  from `typevehicule` inner join `vehicule` on vehicule.typevehiculeV = typevehicule.id_vehicule where iduser = '".$_SESSION["id"]."'");

$resultat2 = $query2->fetchAll();
$resultat3 = $query3->fetchAll();
$marque = null;
$cv = null;
$type = null;
foreach ($resultat2 as $key2 => $variable2)
{
    $marque = $resultat2[$key2]["marque"];
    $cv = $resultat2[$key2]["cv"];
}

foreach ($resultat3 as $key3 => $variable)
{
    $type = $resultat3[$key3]["typedevehicule"];
}


if(strlen($marque) != 0 and strlen($cv) != 0 and strlen($vehicule) != 0){
 echo'<center><span class="tag is-primary">
  Vous avez enregistr&#233; une '.$type.' dont la marque est : '.$marque.'  et les cvs eleve ont : '.$cv.' 
</span></center></br>';
}
    else{
        echo'<center><span class="tag is-danger">
  Vous avez pas encore enregistré de voiture.
</span></center></br>';
    }


?>
<form action="Vehicule.php" method="post">
    <center>
        <div class="container">
            <div class="notification is-primary">
                    <input name ="marque" type="text" placeholder="Remplisez la marque"><br></br>
                    <input name ="cv" type="text" placeholder="Donnez le nombre de chevaux"><br></br>
                    <select name="type">
                        <option value="1">Voiture</option>
                        <option value="2">Moto</option>
                        </select></br></br>
                    <button name ="validation" value = "validation" type="submit"  >Enregistrer</button>
                    <button name ="validation" value = "validation" type="submit"  >Modifier</button>

                </div>
            </div>
            </center>
            </form>
        </div>
        </div>
    </body>
</html>
<?php }else{
    echo "<center><h2>erreur de connexion veuillez vous reconnecter</h2></center>";
}
?>