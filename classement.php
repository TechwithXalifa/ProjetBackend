<?php
include("config.php"); // Connexion à la base de données

// Requête SQL pour récupérer les nageurs avec leurs performances et classements
$query = "SELECT n.prenom, n.nom, e.type AS epreuve, s.`temps (secondes)`, s.classement 
          FROM score s
          JOIN nageurs n ON s.idNageur = n.id
          JOIN epreuves e ON s.idEpreuve = e.id
          ORDER BY s.classement ASC, s.`temps (secondes)` ASC"; 

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des Nageurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php include("header.php"); ?>

<div class="container mt-5">
    <h1 class="page-title">🏆 Classement des Nageurs</h1>
    <p>Le classement est basé sur les meilleurs temps des nageurs dans chaque épreuve.</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Classement</th>
                <th>Nageur</th>
                <th>Épreuve</th>
                <th>Temps (s)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['classement']; ?></td>
                    <td><?php echo $row['prenom'] . " " . $row['nom']; ?></td>
                    <td><?php echo $row['epreuve']; ?></td>
                    <td><?php echo $row['temps (secondes)']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <a href="index.php" class="btn btn-secondary">Retour</a>
</div>

<?php include("footer.php"); ?>
</body>
</html>
