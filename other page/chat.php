<?php
session_start();
if (isset($_SESSION['utilisateur'])){
    $e_mail = $_SESSION['utilisateur'];
}
else{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hafatra | <?=$e_mail?></title>
    <link rel="icon" href="../logo/PicsArt_05-21-07.53.33.jpg">
    <link rel="stylesheet" href="../font awesome/all.min.css">
    <link rel="stylesheet" href="chat.css">
</head>
<body>
    <main>
        <?php
        include"connexion_bdd.php";
        ?>
        <div id="discussion">
            <div id="barre-recherche"><input type="search" id="recherche" placeholder="recherche"></div> 
           <div id="nouveau-discussion">
                <ul id="myUl">
                    <?php
                    $req = mysqli_query($conn,"SELECT * FROM utilisateur WHERE NOT email = '$e_mail'");
                    if (mysqli_num_rows($req) < 1){
                       echo "discussion  vide ";
                    }
                    while ($row = mysqli_fetch_assoc($req)) {
                        $autre_mail = $row['email'] ;?>
                        <div id="message-users">
                        <section><img src="photo/<?=$row['photo']?>" alt="photo de profil"></section>
                        <section id="hover-msg">
                            <p id="actif">Oo</p>
                            <h3><li><a href="#"><?= $autre_mail ?></a></li></h3>
                            <p class="msg-non-lus">bonjour</p><span id="date">13-11-2023 12:40</span>
                        </section>
                    </div>
                   <?php }?>
            </ul>
            </div>
            <div class="compte-deconnexion">
                <section>
                    <div><h3>Compte</h3><p><?=$e_mail?></p></div>
                    <?php
                        $req = mysqli_query($conn,"SELECT * FROM utilisateur WHERE email = '$e_mail' ORDER BY id DESC");
                        if ($row = mysqli_fetch_assoc($req)){?>
                            <div><img src="photo/<?=$row['photo']?>" alt="votre photo de profil"></div>
                        <?php } ?>
                </section>
                <form method="get">
                <section>
                    
                    <?php
                    if (isset($_GET['deconnexion'])) {
                        session_destroy();
                        header("location:../index.php"); 
                    }
                    ?>
                    <input type="submit" value="DECONNEXION" name="deconnexion" id="btn-deconnexion">
                </section>
            </form>
            </div>
        </div>
        <div id="conversation">
            <div class="head-conversation">
                <span class="img-user"><img src="../logo/img_avatar.png" alt="photo de profil"></span>
                <span class="head-conversation-user"><?=$autre_mail?></span>
                <span class="logo"><i class="fas fa-phone"></i></span>
            </div>
            <div id="message-de-discussion">
             <!--<iframe src="conversation.php?email=<?=$row['email']?>" height="390" width="100%" style="border:none" id="iframe"></iframe>--->
           <div id="message-de-discussion-users">
                    <p id="autre-user"><?=$autre_mail?></p>
                    <p id="message-autre-users">bonjour merci pour tous ce que tu as fais pour moi</p>
                    <span><i class="fas fa-trash-alt"><span class="suprr">supprimer le message</span></i><span><span id="date">13-11-2023 12:40</span>
                </div>
                <div id="message-de-discussion-vous">
                    <p id="vous">Vous</p>
                    <p id="message-vous">ça va ?</p>
                    <span><i class="fas fa-trash-alt"><span class="suprr">supprimer le message</span></i></span><span id="date">13-11-2023 12:40</span>
                </div>-
                </div>
            <div id="partie-envoie">
                <div></span><input type="text" id="input-envoie" placeholder="entrer votre message.."></div>
                <div><i class="fa fa-heart"></i></div>
                <div><i class="fas fa-paper-plane"></i></div>
            </div>
        </div>
        </main>
        <script src="chat.js"></script>
</body>
</html>