<?php
include("config.php"); // Connexion à MySQL
include("header.php");

$query = "SELECT e.prenom AS entraineur_prenom, e.nom AS entraineur_nom, e.nationalite, 
                 n.prenom AS nageur_prenom, n.nom AS nageur_nom 
          FROM entraineurs e 
          JOIN nageurs n ON e.nationalite = n.nationalite";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Entraîneurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">👨‍🏫 Liste des Entraîneurs</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Entraîneur</th>
                    <th>Nationalité</th>
                    <th>Nageur Associé</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['entraineur_prenom'] . " " . $row['entraineur_nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['nageur_prenom'] . " " . $row['nageur_nom']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Retour</a>
    </div>
</body>
</html>
<?php include("footer.php"); ?>