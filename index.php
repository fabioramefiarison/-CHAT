<?php
session_start();
include"other page/connexion_bdd.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hafatra | connexion</title>
    <link rel="stylesheet" href="other page/style.css">
    <link rel="stylesheet" href="font awesome/all.min.css">
    <link rel="icon" href="logo/PicsArt_05-21-07.53.33.jpg">
</head>
<body>
    <main>
    <?php
    if (isset($_POST['btn'])){
        extract($_POST);
        if ( isset($e_mail) && isset($p_assword) && $e_mail != "" && $p_assword != "") {
            $req = mysqli_query($conn,"SELECT * FROM utilisateur WHERE email = '$e_mail' AND pswd = '$p_assword' ");
            if(mysqli_num_rows($req) > 0){
                $_SESSION['utilisateur'] = $e_mail;
                    header('location:other page/chat.php');
            }
            else
                $erreur = "Votre @email ou mot de passe incorrect !";
        }
        else{
            $erreur = "Champ incomplète !";
        }}
        ?>
        <span class="user"><i class='fas fa-user-circle'></i></span>
        <h1>CONNEXION</h1>
        <p id="alerte">
            <!--affichage d'erreur--->
            <?php if (isset($erreur)) echo $erreur . " <i class='fas fa-bell'></i>";
            ?>
        </p>
        <form action="" method="post">
            <label for="email">Email :</label><br>
            <input type="email" name="e_mail" placeholder="entrer votre @mail" id="email" required><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" name="p_assword" placeholder="********" id="password" required><br>
           <button type="submit" id="btn" name="btn">CONNECTER</button> 
        </form>
        <hr class="ligne-separation">
        <p id="btn-creation-compte"><a href="other page/inscription.php">créer un compte ?</a></p>
    </main>
    <p class="nom-auteur">@Author Fabio nov-2023</p>

<!---------------------------chargement---------------->
    <div id="chargement-debut">
        <h1 class="h1">BENVENUE</h1>
        <span class="span"><img src="logo/PicsArt_05-21-07.53.33.jpg"style="--b:1;"></span>
        <span class="span"><img src="logo/PicsArt_05-21-07.53.33.jpg"style="--b:2;"></span>
        <span class="span"><img src="logo/PicsArt_05-21-07.53.33.jpg"style="--b:3;"></span>
    </div>
    <script src="other page/main.js"></script>
</body>
</html>