<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Oeuvres</title>
    <link rel="stylesheet" href="../public/scss/main.css">
</head>

<body>
    <header>
        <h1>Liste des Oeuvres</h1>
        <a class="link" href="index.php?action=create">Ajouter une nouvelle oeuvre</a>
    </header>
    <main>
        <section class="section-main">
            <div class="main-container">
                <?php
                // Nombre maximum d'éléments par ligne
                $elementsParLigne = 5;
                for ($i = 0; $i < count($pieces); $i += $elementsParLigne): ?>
                    <!-- Conteneur de chaque rangée -->
                    <div class="row-piece-container">
                        <div class="piece-container">
                            <?php
                            // Affichage des pièces dans la ligne actuelle
                            for ($j = $i; $j < $i + $elementsParLigne && $j < count($pieces); $j++):
                                $piece = $pieces[$j]; ?>
                                <a href="index.php?action=readPiece&id=<?= urlencode($piece->getId()) ?>">
                                    <div class="piece">
                                        <?php if (empty($piece->getCover())): ?>
                                            <div class="piece-img">
                                                <p>Image à définir</p>
                                            </div>
                                        <?php else: ?>
                                            <div class="piece-img" style="background-image: url('<?= htmlspecialchars($piece->getCover()) ?>');">
                                            </div>
                                        <?php endif; ?>
                                        <div class="piece-info">
                                            <div>
                                                <h2><?= htmlspecialchars($piece->getTitle()) ?></h2>
                                            </div>
                                            <div>
                                                <h2>Note: <?= htmlspecialchars($piece->getRating()) ?>/10</h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>
    </main>
</body>

</html>