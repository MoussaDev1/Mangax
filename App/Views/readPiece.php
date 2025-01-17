<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/main.css">
</head>

<body>
    <main class="main-one-piece">
        <a href="index.php?action=read" class="link">Retournez au menu principale</a>
        <div class="piece-container-only">
            <div class="piece-container-left">
                <div class="cover-img" style="background-image: url(<?= htmlspecialchars($piece->getCover()) ?>);"></div>
                <div class="see-more"><a href="">En savoir plus sur l'oeuvre</a></div>
            </div>

            <div class="piece-only piece-container-right"
                data-url="">
                <div>
                    <h3><?= htmlspecialchars($piece->getTitle()) ?></h3>
                </div>
                <div>
                    <p>Type: <?= htmlspecialchars($piece->getType()) ?></p>
                </div>
                <div>
                    <p>Genre: <?= htmlspecialchars($piece->getGenre()) ?></p>
                </div>
                <div>
                    <p>Note: <?= htmlspecialchars($piece->getRating()) ?></p>
                </div>
                <div>
                    <p>Auteur: <?= htmlspecialchars($piece->getAuthor()) ?></p>
                </div>
                <div>
                    <p>Description: <?= htmlspecialchars($piece->getDescription()) ?>
                    </p>
                </div>

                <div>
                    <a href="index.php?action=updatePiece&id=<?= urlencode($piece->getId()) ?>">Modifier</a>
                    <a href="index.php?action=deletePiece&id=<?= urlencode($piece->getId()) ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>