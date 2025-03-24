<?php
include("securite.php");
include("../config.php");

// Ajouter un nageur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    $dateNaissance = $_POST['dateNaissance'];
    $sexe = $_POST['sexe'];

    $query = "INSERT INTO nageurs (prenom, nom, nationalite, dateNaissance, sexe) 
              VALUES ('$prenom', '$nom', '$nationalite', '$dateNaissance', '$sexe')";
    mysqli_query($conn, $query);
    header("Location: gestion_nageurs.php");
}

// Supprimer un nageur avec confirmation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM nageurs WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: gestion_nageurs.php");
}

// Récupérer les nageurs
$query = "SELECT * FROM nageurs ORDER BY nom ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Nageurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function confirmerSuppression(id) {
            if (confirm("Voulez-vous vraiment supprimer ce nageur ?")) {
                window.location.href = "gestion_nageurs.php?delete=" + id;
            }
        }
        
        function rechercherNageur() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let nom = row.cells[1].textContent.toLowerCase();
                let prenom = row.cells[0].textContent.toLowerCase();
                
                if (nom.includes(input) || prenom.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>🏊‍♂️ Gérer les Nageurs</h2>

        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Date de Naissance</label>
                    <input type="date" name="dateNaissance" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Sexe</label>
                    <select name="sexe" class="form-control">
                        <option value="H">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>

        <h3 class="mt-5">Liste des Nageurs</h3>

        <input type="text" id="search" class="form-control mb-3" onkeyup="rechercherNageur()" placeholder="Rechercher un nageur...">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Date de Naissance</th>
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
                        <td><?php echo $row['dateNaissance']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                        <td>
                            <button onclick="confirmerSuppression(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
