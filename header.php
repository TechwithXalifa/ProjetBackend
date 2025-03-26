<?php
// Détection du niveau du dossier
$base_path = (basename(dirname($_SERVER['PHP_SELF'])) == 'admin') ? '../' : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournoi de Natation</title>
    <link rel="stylesheet" href="<?php echo $base_path; ?>styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $base_path; ?>index.php">🏊 Tournoi de Natation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>nageurs.php">Nageurs</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>epreuves.php">Épreuves</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>records.php">Records</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>scores.php">Scores</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>arbitres.php">Arbitres</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>entraineurs.php">Entraîneurs</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>classement.php">Classement</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>medailles.php">Médailles</a></li>
                
                <?php if (isset($_SESSION['admin'])) { ?>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-3" href="<?php echo $base_path; ?>admin/logout.php">Déconnexion</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-3" href="<?php echo $base_path; ?>admin/login.php">Connexion</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
