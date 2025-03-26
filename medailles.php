<?php
include("config.php"); // Connexion à la BDD
include("header.php");

$query = "SELECT nageurs.prenom, nageurs.nom, nageurs.nationalite, medailles.type, medailles.epreuve 
          FROM medailles 
          INNER JOIN nageurs ON medailles.idNageur = nageurs.id";
$result = mysqli_query($conn, $query);
?>

<main>
    <div class="container mt-5">
        <h2 class="page-title text-center mb-4">🏅 Liste des Médailles</h2>

        <table class="table table-striped table-bordered bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Épreuve</th>
                    <th>Médaille</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['nationalite'] ?></td>
                        <td><?= $row['epreuve'] ?></td>
                        <td>
                            <?php
                                $medaille = strtolower($row['type']);
                                $emoji = $medaille === 'or' ? '🥇' : ($medaille === 'argent' ? '🥈' : '🥉');
                                echo $emoji . ' ' . ucfirst($medaille);
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">⬅ Retour à l'accueil</a>
        </div>
    </div>
</main>

<?php include("footer.php"); ?>
