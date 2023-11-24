<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hafatra";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {
  die("Connexion echouée: " . mysqli_connect_error());
}
?>