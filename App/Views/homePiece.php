<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/main.css">
</head>

<body>
    <a href="index.php?action=readPiece&id=<?= $piece->getId() ?>">Voir la derniere Oeuvre Créer</a>
    <main>
        <section class="homeContainer">
            <div class="home-info">
                <div class="home-left-container">
                    <div class="home-title">
                        <h1>NOTEZ VOS OEUVRE PRÉFERER ET DONNEZ VOTRE AVIS</h1>
                    </div>
                    <div class="home-text">
                        <p>Bienvenue sur Mangax</p>
                    </div>
                    <div class=" home-link"><a href="index.php?action=read" class="link">Voir toute les oeuvres que vous avez notez</a>
                    </div>
                </div>
            </div>
            <div class="home-caroussel">
                <a href=index.php?action=readPiece&id=<?= $piece->getId() ?>>
                    <div class="caroussel-home-img">
                        <div class="caroussel-item">
                            <h3>Cliquez ici pour accedez à la dernière oeuvre noter
                                <br>(Les images aussi)
                            </h3>
                        </div>
                        <div class="caroussel-item"><img src="../public/uploads/bleach_thousand_year_blood_war_phone_wallpaper_4k__by_vilex45_dfxcu9x-fullview.webp" alt="" class="home-img">
                        </div>
                        <div class="caroussel-item"><img
                                src="../public/uploads/wp6268696.webp"
                                alt="" class="home-img"></div>
                        <div class="caroussel-item"><img src="../public/uploads/wp14529533.webp" alt="" class="home-img"></div>
                        <div class="caroussel-item"><img src="../public/uploads/minimalist-anime-phone-samurai-champloo-wohp9wnrlu3cgh3z.jpg"></div>
                    </div>
            </div></a>
        </section>

    </main>
</body>

</html>