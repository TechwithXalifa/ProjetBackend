<?php
include("config.php");
include("header.php");

$query = "SELECT * FROM epreuves";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Épreuves</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">📋 Liste des Épreuves</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Distance</th>
                    <th>Style</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['distance']; ?>m</td>
                        <td><?php echo $row['style']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['heure']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include("footer.php"); ?>