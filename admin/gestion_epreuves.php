<?php
include("securite.php");
include("../config.php");

// Ajouter une épreuve
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $type = $_POST['type'];
    $phase = $_POST['phase'];

    $query = "INSERT INTO epreuves (date, heure, type, phase) 
              VALUES ('$date', '$heure', '$type', '$phase')";
    mysqli_query($conn, $query);
    header("Location: gestion_epreuves.php");
}

// Récupérer la liste des épreuves
$query = "SELECT * FROM epreuves";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Épreuves</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>🏆 Gérer les Épreuves</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Type</label>
                <input type="text" name="type" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phase</label>
                <select name="phase" class="form-control">
                    <option value="Eliminatoire">Éliminatoire</option>
                    <option value="Finale">Finale</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <h3 class="mt-5">Liste des Épreuves</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Type</th>
                    <th>Phase</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['heure']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['phase']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
