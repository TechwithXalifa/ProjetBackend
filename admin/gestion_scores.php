<?php
include("securite.php");
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNageur = $_POST['idNageur'];
    $idEpreuve = $_POST['idEpreuve'];
    $temps = $_POST['temps'];
    $classement = $_POST['classement'];
    $qualification = $_POST['qualification'];

    $query = "INSERT INTO score (temps, classement, idNageur, idEpreuve, qualification) 
              VALUES ('$temps', '$classement', '$idNageur', '$idEpreuve', '$qualification')";
    mysqli_query($conn, $query);
    header("Location: gestion_scores.php");
}

$query = "SELECT score.*, nageurs.prenom, nageurs.nom 
          FROM score 
          JOIN nageurs ON score.idNageur = nageurs.id 
          ORDER BY score.classement ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Scores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>📊 Gérer les Scores</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ID Nageur</label>
                <input type="number" name="idNageur" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ID Épreuve</label>
                <input type="number" name="idEpreuve" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Temps (secondes)</label>
                <input type="text" name="temps" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Classement</label>
                <input type="number" name="classement" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Qualification</label>
                <select name="qualification" class="form-control">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                    <option value="Finale">Finale</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Score</button>
        </form>

        <h3 class="mt-5">Liste des Scores</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nageur</th>
                    <th>Temps</th>
                    <th>Classement</th>
                    <th>Qualification</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom'] . " " . $row['nom']; ?></td>
                        <td><?php echo $row['temps']; ?></td>
                        <td><?php echo $row['classement']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
