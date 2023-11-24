<?php
session_start();
include"connexion_bdd.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hafatra | inscription</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../font awesome/all.min.css">
    <link rel="icon" href="../logo/PicsArt_05-21-07.53.33.jpg">
</head>
<body>
    <main>
        <?php
        if (isset($_POST['btn'])){
            extract($_POST);
          if (isset($e_mail) && isset($p_assword) && isset($confirmPassword) && $e_mail != "" && $p_assword != "" && $confirmPassword !=""){
            if ($p_assword != $confirmPassword ){
                $erreur = "Erreur sur votre confirmation !";
            }
            else{
                $req = mysqli_query($conn , "SELECT * FROM utilisateur WHERE email = '$e_mail' ");
                if(mysqli_num_rows($req) == 0){
                    $req = mysqli_query($conn , "INSERT INTO utilisateur (id,email,pswd,photo) VALUES (NULL , '$e_mail' , '$p_assword','')");
                    $_SESSION['utilisateur'] = $e_mail;
                    header("location:uploadImg.php");
                }
                else{
                    $erreur = "Cet email déja exister !";
                }
            }
          }
          else{
            $erreur = "Veuillez remplir ce champ !";
          }
        }
        ?>
        <span class="user"><i class='fas fa-user-circle'></i></span>
        <h1>CONNEXION</h1>
        <p id="alerte">
            <?php if (isset($erreur)) echo $erreur . " <i class='fas fa-bell'></i>";?>
            
        </p>
        <form action="" method="post">
        <div id="email-container">
            <label for="email" >Email :</label><br>
            <input type="email" name="e_mail" placeholder="entrer votre @mail" id="email" required><br>
            <p id="alerte-email">>Mail erreur</p>
        </div>
        <div id="password-container"></div>
            <label for="password">Mot de passe :</label><br>
            <input type="password" name="p_assword" placeholder="********" id="password"required><br>
            <hr id="bar-mdp">
            <p id="alerte-mdp"></p>
        </div>
        <div id="confirmPassword-container"></div>
            <label for="confirmPassword">Confirmation :</label><br>
            <input type="password" name="confirmPassword" placeholder="********" id="confirmPassword"required><br>
        </div>
           <button type="submit" name="btn" id="btn">INSCRIRE</button> 
        </form>
    </main>
    <p class="nom-auteur">@Author Fabio nov-2023</p>
    <script src="main.js"></script>
</body>
</html>