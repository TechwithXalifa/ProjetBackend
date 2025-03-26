<?php include("header.php"); ?>
<div class="wrapper"> <!-- Début du wrapper -->
    <div class="content"> <!-- Début du contenu principal -->

        <!-- Présentation -->
        <header class="bg-primary text-white text-center py-5">
            <h1>Bienvenue au Tournoi de Natation ! 🏆</h1>
            <p>Suivez les performances des meilleurs nageurs du monde</p>
        </header>

        <!-- Sections principales -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">📋 Liste des Épreuves</h5>
                            <p class="card-text">Consultez toutes les épreuves du tournoi</p>
                            <a href="epreuves.php" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">🏊 Nageurs</h5>
                            <p class="card-text">Découvrez les participants de cette année</p>
                            <a href="nageurs.php" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">🏆 Records</h5>
                            <p class="card-text">Découvrez les records du tournoi</p>
                            <a href="records.php" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
            <!-- Arbitres -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">⚖️ Arbitres</h5>
                        <p class="card-text">Consultez la liste des arbitres du tournoi</p>
                        <a href="arbitres.php" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>

            <!-- Entraîneurs -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">👨‍🏫 Entraîneurs</h5>
                        <p class="card-text">Découvrez les entraîneurs de chaque nation</p>
                        <a href="entraineurs.php" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">📊 Statistiques</h5>
                        <p class="card-text">Analysez les performances et tendances</p>
                        <a href="admin/statistiques.php" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Fin du content -->

</div> <!-- Fin du wrapper -->
<?php include("footer.php"); ?> <!-- Footer en bas -->
