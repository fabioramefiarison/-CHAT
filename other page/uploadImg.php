<?php
session_start();
if (isset($_SESSION['utilisateur'])) {
$e_mail = $_SESSION['utilisateur'];}
else 
header("location:inscription.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hafatra | importation photo de profil</title>
    <link rel="stylesheet" href="uploadImg.css">
    <link rel="icon" href="../logo/PicsArt_05-21-07.53.33.jpg">
    <link rel="stylesheet" href="../font awesome/all.min.css">
</head>
<body>
    <main>
        <?php
        include"connexion_bdd.php";
    if (isset($_POST['send'])) {
        if (!empty($_FILES['image'])){
           $img_nom = $_FILES['image']['name'];
            $tmp_nom = $_FILES['image']['tmp_name'];
            $time = time();
            $nouveau_nom_img = $time . $img_nom; 
            $deplacement_image = move_uploaded_file($tmp_nom,"photo/".$nouveau_nom_img);
            if ($deplacement_image){
                $req = mysqli_query($conn, "UPDATE utilisateur SET photo = '$nouveau_nom_img' WHERE email = '$e_mail' ");
                if ($req){
                    $_FILES['image'] = $_photo;
                    header("location:chat.php");
                }
                else{
                    $alert = "échec de l'ajout ";
                }
            }
            else{
                $alert = "image supérieure à 1 MB";
            }
    }
    else{
        $alert = "veuillez saisir une photo pour votre profil";
    }  
}
        ?>
        <p class="alerte">
                <?php if (isset($alert)) {
                    echo $alert . " <i class='fas fa-bell'></i>";
                }?>
            </p>
        <h1>Bienvenue <br><strong class='user'><?= $e_mail?></strong></h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div id="photo">
            <label for="file"><i class="fas fa-upload" ></i></label>
            <input type="file" name="image" id="file">
            <p><label for="file" ><Strong class="i">Télecharger l'image</Strong></label></p>
            <p>la taille doit inférieure à <strong>1 MB</strong></p>
        </div>
        <input type="submit" value="AJOUTER" name="send">
    </form>
    </main>
    
</body>
</html>