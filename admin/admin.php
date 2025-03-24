<?php
session_start();
include("securite.php");
include("../header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Tableau de bord</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">🏆 Tableau de bord Admin</h1>
        <p>Bienvenue, <?php echo $_SESSION['admin']; ?> !</p>
        <a href="gestion_nageurs.php" class="btn btn-primary">Gérer les Nageurs</a>
        <a href="gestion_epreuves.php" class="btn btn-info">Gérer les Épreuves</a>
        <a href="gestion_scores.php" class="btn btn-success">Gérer les Scores</a>
        <a href="gestion_arbitres.php" class="btn btn-warning">Gérer les Arbitres</a>
        <a href="gestion_entraineurs.php" class="btn btn-secondary">Gérer les Entraîneurs</a>
        <a href="statistiques.php" class="btn btn-dark">Voir les Statistiques</a>
        <a href="logout.php" class="btn btn-danger">Se Déconnecter</a>
    </div>
</body>
</html>
