<?php
include("config.php"); // Connexion à la base de données
include("header.php");

$query = "SELECT * FROM arbitres";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Arbitres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="page-title">⚖️ Liste des Arbitres</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Sexe</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Retour</a>
    </div>
</body>
</html>
<?php include("footer.php"); ?>