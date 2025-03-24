<?php
include("config.php"); // Connexion à la base de données
include("header.php");

$query = "SELECT * FROM nageurs ORDER By prenom ASC, nom ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Nageurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">🏊 Liste des Nageurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Date de Naissance</th>
                    <th>Sexe</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['dateNaissance']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include("footer.php"); ?>