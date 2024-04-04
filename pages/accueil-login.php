<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name="description" content="Page d'accueil après connexion.">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>


<body>
    <header>
        <section id="header-gauche">
            <a href="../index.html" id="image-accueil"><img src="../assets/images/Logo.webp" alt="logo" id="logo" /></a>
            <p id="header-p">Stage Catalyst</p>
        </section>

        <section id="header-milieu">
            <input type="text" name="recherche" id="recherche" placeholder="Rechercher">
            <i class="fa fa-search" id="loupe" aria-hidden="true"></i>
        </section>

        <section id="header-droite">
            <!-- Menu Burger -->
            <div id="menu-burger-header">
                <div class="barre-haut"></div>
                <div class="barre-milieu"></div>
                <div class="barre-bas"></div>
            </div>

            <!-- Contenu du header-droite -->
            <a class="fa fa-heart liens-header" id="wishlist" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect"
                href="test.html"></a>
            <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="entreprise.html"></a>
        </section>
    </header>


    <main>
        <div id="menu-burger-flou">
            <div id="menu-burger-main">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem sit doloribus, exercitationem
                    architecto iure esse labore maiores officiis. Deserunt sint sapiente recusandae sequi soluta,
                    sit
                    aperiam totam explicabo! Rem, tenetur.</p>
                <div>zdq</div>
                <div>zdqz</div>
            </div>
        </div>

        <h2>Bienvenue sur votre espace membre !</h2>
        <h3>Voici une offre qui pourrait vous interésser.</h3>

        <section id="fieldset-main">
            <fieldset>
                <legend>Offre</legend>
                <section id="section-main">


                    <section id="offre">
                        <section class="headerOffre">
                            <h3>Stage Recherche Réseau</h3>
                            <section class="stats">
                                <section id="likes" class="item">
                                    <i class="fa-regular fa-heart fa-2x"></i>
                                    <p>3</p>
                                </section>
                                <section id="demandes" class="item">
                                    <i class="fa-regular fa-envelope fa-2x"></i>
                                    <p>1</p>
                                </section>
                            </section>
                        </section>
                        <section class="infos">
                            <section id="competences" class="item">
                                <i class="fa-solid fa-certificate fa-2x"></i>
                                <p>IP, NAT, CCNAv7</p>
                            </section>
                            <section id="localisation" class="item">
                                <i class="fa-solid fa-map-location-dot fa-2x"></i>
                                <p>2 allée des foulons, 67380 Lingolsheim</p>
                            </section>
                            <section id="entreprise-logo" class="item">
                                <i class="fa-solid fa-building-user fa-2x"></i>
                                <p>CESI Strasbourg</p>
                            </section>
                            <section id="promo" class="item">
                                <i class="fa-solid fa-user-check fa-2x"></i>
                                <p>CPI A2 Info</p>
                            </section>
                            <section id="duree" class="item">
                                <i class="fa-regular fa-clock fa-2x"></i>
                                <p>12 Semaines</p>
                            </section>
                            <section id="date" class="item">
                                <i class="fa-regular fa-calendar-days fa-2x"></i>
                                <p>08/04 - 19/07</p>
                            </section>
                            <section id="remuneration" class="item">
                                <i class="fa-solid fa-coins fa-2x"></i>
                                <p>4,35€ / heure</p>
                            </section>
                            <section id="places" class="item">
                                <i class="fa-solid fa-users fa-2x"></i>
                                <p>3 places</p>
                            </section>
                        </section>
                    </section>

                    <section id="boutons">
                        <button type="button">Actualiser</button>
                        <button type="button">Postuler</button>
                    </section>
                </section>
            </fieldset>
        </section>

        <section id="rechercher-plus">
            <button type="button">Rechercher plus d'offres</button>
        </section>
    </main>