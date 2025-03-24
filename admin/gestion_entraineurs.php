<?php
include("securite.php");
include("../config.php");

// Ajouter un entraîneur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    $idNageur = $_POST['idNageur'];

    $query = "INSERT INTO entraineurs (prenom, nom, nationalite, idNageur) 
              VALUES ('$prenom', '$nom', '$nationalite', '$idNageur')";
    mysqli_query($conn, $query);
    header("Location: gestion_entraineurs.php");
}

// Supprimer un entraîneur
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM entraineurs WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: gestion_entraineurs.php");
}

// Récupérer la liste des entraîneurs
$query = "SELECT e.*, n.prenom AS nageur_prenom, n.nom AS nageur_nom 
          FROM entraineurs e 
          JOIN nageurs n ON e.idNageur = n.id";
$result = mysqli_query($conn, $query);

// Récupérer la liste des nageurs pour l'assignation
$nageurs = mysqli_query($conn, "SELECT * FROM nageurs");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Entraîneurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>🏋️‍♂️ Gérer les Entraîneurs</h2>
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
                <label>Nageur Associé</label>
                <select name="idNageur" class="form-control">
                    <?php while ($nageur = mysqli_fetch_assoc($nageurs)) { ?>
                        <option value="<?php echo $nageur['id']; ?>">
                            <?php echo $nageur['prenom'] . " " . $nageur['nom']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <h3 class="mt-5">Liste des Entraîneurs</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Nageur Associé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['nageur_prenom'] . " " . $row['nageur_nom']; ?></td>
                        <td>
                            <a href="gestion_entraineurs.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
