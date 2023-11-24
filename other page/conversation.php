<?php
session_start();
include"connexion_bdd.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conversation.css">
    <link rel="stylesheet" href="../font awesome/all.min.css">
    <title></title>
</head>
<body>
        <div id="message-de-discussion-users">
                    <p id="autre-user"></p>
                    <p id="message-autre-users">bonjour merci pour tous ce que tu as fais pour moi</p>
                    <span><i class="fas fa-trash-alt"><span class="suprr">supprimer le message</span></i><span><span id="date">13-11-2023 12:40</span>
                </div>
                <div id="message-de-discussion-vous">
                    <p id="vous">Vous</p>
                    <p id="message-vous">ça va ?</p>
                    <span><i class="fas fa-trash-alt"><span class="suprr">supprimer le message</span></i></span><span id="date">13-11-2023 12:40</span>
        </div>
</body>
</html>