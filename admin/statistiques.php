<?php
include("securite.php");
include("../config.php");

// Nombre total de nageurs
$query_total_nageurs = "SELECT COUNT(*) AS total FROM nageurs";
$result_total_nageurs = mysqli_fetch_assoc(mysqli_query($conn, $query_total_nageurs))['total'];

// Répartition par sexe
$query_sexe = "SELECT sexe, COUNT(*) AS total FROM nageurs GROUP BY sexe";
$result_sexe = mysqli_query($conn, $query_sexe);

// Répartition par nationalité
$query_nationalite = "SELECT nationalite, COUNT(*) AS total FROM nageurs GROUP BY nationalite ORDER BY total DESC";
$result_nationalite = mysqli_query($conn, $query_nationalite);

// Meilleurs temps par épreuve
$query_meilleur_temps = "SELECT e.type, MIN(s.`temps (secondes)`) AS meilleur_temps
                         FROM score s JOIN epreuves e ON s.idEpreuve = e.id
                         GROUP BY e.type";
$result_meilleur_temps = mysqli_query($conn, $query_meilleur_temps);

// Moyenne des temps par épreuve
$query_moyenne_temps = "SELECT e.type, AVG(s.`temps (secondes)`) AS moyenne_temps
                        FROM score s JOIN epreuves e ON s.idEpreuve = e.id
                        GROUP BY e.type";
$result_moyenne_temps = mysqli_query($conn, $query_moyenne_temps);

// Nombre de médailles par nageur
$query_medailles = "SELECT n.prenom, n.nom, COUNT(m.id) AS total_medailles
                    FROM medailles m JOIN nageurs n ON m.idNageur = n.id
                    GROUP BY n.id ORDER BY total_medailles DESC";
$result_medailles = mysqli_query($conn, $query_medailles);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistiques des Nageurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>📊 Statistiques des Nageurs et Performances</h2>

        <h4 class="mt-4">🏊 Nombre total de nageurs : <?php echo $result_total_nageurs; ?></h4>

        <h4 class="mt-4">👨‍🦰👩‍🦰 Répartition par sexe</h4>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result_sexe)) { ?>
                <li><?php echo ($row['sexe'] == 'H' ? "Hommes" : "Femmes") . " : " . $row['total']; ?></li>
            <?php } ?>
        </ul>

        <h4 class="mt-4">🌍 Répartition par nationalité (Top 5)</h4>
        <ul>
            <?php 
            $count = 0;
            while ($row = mysqli_fetch_assoc($result_nationalite)) { 
                if ($count < 5) {
                    echo "<li>" . $row['nationalite'] . " : " . $row['total'] . "</li>";
                    $count++;
                }
            } ?>
        </ul>

        <h4 class="mt-4">⏱️ Meilleurs temps par épreuve</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Épreuve</th>
                    <th>Meilleur Temps (s)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_meilleur_temps)) { ?>
                    <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['meilleur_temps']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h4 class="mt-4">📉 Moyenne des temps par épreuve</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Épreuve</th>
                    <th>Temps Moyen (s)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_moyenne_temps)) { ?>
                    <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo number_format($row['moyenne_temps'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h4 class="mt-4">🏅 Nombre de médailles par nageur (Top 5)</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nageur</th>
                    <th>Nombre de Médailles</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $count = 0;
                while ($row = mysqli_fetch_assoc($result_medailles)) { 
                    if ($count < 5) {
                        echo "<tr><td>" . $row['prenom'] . " " . $row['nom'] . "</td><td>" . $row['total_medailles'] . "</td></tr>";
                        $count++;
                    }
                } ?>
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
