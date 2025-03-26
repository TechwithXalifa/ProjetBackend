<?php
include("securite.php");
include("../config.php");
// Ajouter un arbitre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    $sexe = $_POST['sexe'];

    $query = "INSERT INTO arbitres (prenom, nom, nationalite, sexe) 
              VALUES ('$prenom', '$nom', '$nationalite', '$sexe')";
    mysqli_query($conn, $query);
    header("Location: gestion_arbitres.php");
}

// Supprimer un arbitre
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM arbitres WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: gestion_arbitres.php");
}

// Récupérer la liste des arbitres
$query = "SELECT * FROM arbitres";  
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Arbitres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>⚖️ Gérer les Arbitres</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nationalité</label>
                <input type="text" name="nationalite" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Sexe</label>
                <select name="sexe" class="form-control">
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <h3 class="mt-5">Liste des Arbitres</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Sexe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                        <td>
                            <a href="gestion_arbitres.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
