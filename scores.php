<?php
include("config.php");
include("header.php");

$query = "SELECT nageurs.prenom, nageurs.nom, score.`temps (secondes)`, score.classement, score.idEpreuve
          FROM score 
          JOIN nageurs ON score.idNageur = nageurs.id 
          ORDER BY score.classement ASC,
          score.`temps (secondes)` ASC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Classement des Nageurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">🏅 Classement des Nageurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Temps (s)</th>
                    <th>Classement</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom'] . " " . $row['nom']; ?></td>
                        <td><?php echo $row['temps (secondes)']; ?></td>
                        <td><?php echo $row['classement']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include("footer.php"); ?>