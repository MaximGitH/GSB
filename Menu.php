<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
<head>
    <meta http-equiv="refresh" content="120;url=Page_connexion.php" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/menu.css">
    <script src="JS/scriptI.js" defer></script>
</head>
<body>

       
     <header>
    

      <div class="slot"></div>
        
<nav class="menu">

    <div class="logo">
                <img src="images/logo2.png">
            </div>

            <div class="icone_menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="liens-menus">
                <li>
                <?php 
				 if($_SESSION['role'] !== 2){
				     ?>
				 
                    <a href = 'Accueil.php'>Acceuil</a>
                    
                    
                    <?php 
                   if($_SESSION['role'] == 0){
                       echo "<a href = 'Remplir_fiche.php'>Remplir une fiche de frais</a> ";
                       echo "<a href = 'Affiche_fiche.php' class=''><img id='logo3' class='mini-logo'>Consulter mes fiches de frais </a>";
                       echo "<a href = 'Vehicule.php' class=''><img id='logo5' class='mini-logo' >Saisir un véhicule</a>";
                   }
                   else if ($_SESSION['role'] == 1){
                       echo "<a href = 'Affiche_fiche_comptable.php' class=''><img id='logo3' class='mini-logo'>Consulter/v&#233;rifier les fiches de frais</a>";
                   }
                   ?>
                    
                    <a href = 'Page_connexion.php' class=''><img id="logo4" class="mini-logo">Déconnexion</a>
                    <?php 
                    }
                    else{
                        echo'<a href = "Accueil.php" class=""><img id="logo1" class="mini-logo" >Acceuil</a>
                            ';
                    }
                    ?>
                </li>

            </ul>
        </nav>
</header>
</html>
