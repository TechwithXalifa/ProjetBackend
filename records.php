<?php
include("config.php"); // Connexion à la base de données
include("header.php");

// Requête SQL pour récupérer les records et les informations des nageurs
$query = "SELECT r.type, r.valeur, r.date, n.prenom, n.nom, n.nationalite 
          FROM records r 
          JOIN nageurs n ON r.idNageur = n.id 
          ORDER BY r.type ASC, r.valeur ASC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records de Natation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">🏆 Records et Meilleurs Temps</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type de Record</th>
                    <th>Temps (s)</th>
                    <th>Date</th>
                    <th>Nageur</th>
                    <th>Nationalité</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['valeur']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['prenom'] . " " . $row['nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
    </div>
</body>
</html>
<?php include("footer.php"); ?>