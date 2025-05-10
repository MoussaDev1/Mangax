<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scss/main.css">

    <title>Document</title>
</head>

<body>
    <a href="index.php?action=read">Retournez au menu principale</a>
    <?php if (isset($piece)): ?>
        <header>
            <h1>Modifier l'oeuvre : <?= htmlspecialchars($piece->getTitle()) ?> </h1>
        </header>

        <main class="main-update">
            <form method="POST" action="" enctype="multipart/form-data">
                <div>
                    <label for="title">Titre: </label>
                    <input type="text" name="title" id="title" autocomplete="off"
                        value="<?= htmlspecialchars($piece->getTitle()) ?>">
                </div>

                <div>
                    <label for="type">Type de l'oeuvre: </label>
                    <select name="type" id="Oeuvre">
                        <option value="Manga">Manga</option>
                        <option value="Anime">Anime</option>
                    </select>
                </div>

                <div>
                    <label for="genre">Genre: </label>
                    <input type="text" name="genre" id="genre" autocomplete="off"
                        value="<?= htmlspecialchars($piece->getGenre()) ?>">
                </div>

                <div>
                    <label for="cover">Couverture :(Ne pas changer)</label>
                    <input type="file" name="cover" id="cover" autocomplete="off">

                    <div>
                        <label for="rating">Note :</label>
                        <input type="number" step="0.1" name="rating" id="rating" autocomplete="off"
                            value="<?= htmlspecialchars($piece->getRating()) ?>">
                    </div>

                    <div>
                        <label for="author">Auteur :</label>
                        <input type="text" name="author" id="author" autocomplete="off"
                            value="<?= htmlspecialchars($piece->getAuthor()) ?>">
                    </div>

                    <div>
                        <label for="description">Description :</label>
                        <textarea name="description" id="description"
                            autocomplete="off"> <?= htmlspecialchars($piece->getDescription()) ?></textarea>
                    </div>

                    <button type="submit">Mettre à jour</button>
            </form>
        </main>
    <?php else: ?>
        <p>Aucune oeuvre à modifier.</p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>