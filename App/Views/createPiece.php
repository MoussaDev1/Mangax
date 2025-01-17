<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <header>
        <h1>Créer une nouvelle oeuvre</h1>
        <a href="index.php?action=read" class="link">Voir toutes les oeuvres</a>
    </header>

    <main class="main-create">

        <div class="form-container">
            <form method="POST" action="index.php?action=create" enctype="multipart/form-data">

                <div class="form-type form-element" id="step1">
                    <label for="Oeuvre">Qu'elle est le type de l'oeuvre</label>
                    <select name="type" id="Oeuvre">
                        <option value="Manga">Manga</option>
                        <option value="Anime">Anime</option>
                    </select>
                    <button type="button" id="next1">Suivant</button>
                </div>

                <div class="form-nom form-element" id="step2">
                    <label for="title">Nom de l'oeuvre</label>
                    <input type="text" name="title" id="title" required>
                    <button type="button" id="next2">Suivant</button>
                </div>

                <div class="form-genre form-element" id="step3">
                    <label for="genre">Qu'elle(s) est le genre de l'oeuvre </label>
                    <input type="text" name="genre" id="genre" required>
                    <button type="button" id="next3">Suivant</button>
                </div>

                <div class="form-cover form-element" id="step4">
                    <label for="cover">Lien de l'image de couverture</label>
                    <input type="file" name="cover" id="cover" required>
                    <button type="button" id="next4">Suivant</button>
                </div>

                <div class="form-rating step5 form-element" id="step5">
                    <label for="rating">Note de l'oeuvre</label>
                    <input type="number" name="rating" id="rating">
                    <button type="button" id="next5">Suivant</button>
                </div>

                <div class="form-author form-element" id="step7">
                    <label for="author">Auteur de l'oeuvre</label>
                    <input type="text" name="author" id="author">
                    <button type="submit" id="submit">Suivant</button>
                </div>

                <div class="form-description step6 form-element" id="step6">
                    <label for="description">Donnez votre avis sur l'oeuvre</label>
                    <br>
                    <textarea name="description" id="description"></textarea>
                    <button type="button" id="next6">Suivant</button>
                </div>


                <?php if (!empty($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </form>
        </div>
    </main>
</body>

</html>
<script src="../public/js/script.js"></script>