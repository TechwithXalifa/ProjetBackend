<?php
$host = "localhost";
$user = "xalifa";
$password = "xalifa123";
$database = "natation";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>
