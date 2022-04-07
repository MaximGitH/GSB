<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/connexion.css" rel="stylesheet">
    <title> Page de connexion </title>
    <!-- == css == -->
  
    <!-- == javascript == -->
    <script src="JS/scriptLogin.js" defer></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" defer></script>
    
</head>

<body id="SeConnecter">

<?php 
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['id']="non";
    
    $_SESSION['l&mI'] = "";
    $_SESSION['CI'] = "";
    
?>
<center>

    <div class="l-form">
        
        <form action="Connexion.php" class="form" method="post">
        </br><h1 class="titre_page_connexion">Bienvenue sur la page de connexion du Laboratoire !</h1></br>
        <p class="p">Visiteur : dandre oppg5</p>
        <p class="p">Comptable : max max</p>
        <br>
        <div class="trait"></div> 
        
             <img id="logo" class="img-co" src="images/gsb100px.png">
 
           
               
            <div class="form__div">
                <input name="pseudo" value="" id="pseudo" type="text" class="form__input" placeholder="Nom d'utilisateur">
                <label for="" class="form__label"></label>
            </div>

            <div class="form__div">
                
                <input name="mdp" value="" id="mdp" type="password" class="form__input" placeholder="Mot de passe">
                <label  for="" class="form__label"></label>
                <?php 
                    if($_SESSION['l&mI'] == 'oui'){
                            echo '<h2>Mot de passe ou nom d utilisateur pas bon</h2>';
                        }
                        ?>
                </div>

            <!-- ===captcha -->
            <img class="captcha" src="Captcha.php" onclick="this.src='Captcha.php?' + Math.random();" alt=""
                style="cursor:pointer;"><br /> 
            <!-- ===fin captcha -->
          
            <div class="form__div">
                <input id="captcha" type="password" class="form__input" name ="captcha" placeholder="Captcha">
                <label for="" class="form__label"></label>
                <?php 
    
                    if ($_SESSION['CI'] == 'oui'){
                        echo '<h2>Verifier le captcha</h2>';
                    }
                    
                ?>

            </div>

            <input type="submit" class="form__button" name="connexion" value="Connexion">

        </form>
    </div>

    </center>
</body>


<footer>
    <div class="footer">
        <div class="copyright">
        || &nbsp; Tous droits réservés &nbsp; - &nbsp; Laboratoire GSB (Galaxy Swiss Bourdin) &nbsp; - &nbsp; Copyright © 2022 &nbsp; || 
        </div>
    </div>
</footer>

</html>