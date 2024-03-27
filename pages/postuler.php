<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Postuler</title>
    <meta name="description" content="Cette page vous permet de postuler a une offre." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/postuler.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="test.html"></a>
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
        <form id="myForm" method="post" onsubmit="return validateForm()">
            <fieldset>
                <legend>Offre</legend>
                <section id="offre">
                    <section class="headerOffre">
                        <h3>Stage Recherche Réseau</h3>
                        <section class="stats">
                            <section id="likes" class="item">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/hearts.png" alt="wishlists" />
                                <p>3</p>
                            </section>
                            <section id="demandes" class="item">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/secured-letter--v1.png" alt="demandes" />
                                <p>1</p>
                            </section>
                        </section>
                    </section>
                    <section class="infos">
                        <section id="competences" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/learning.png" alt="learning" />
                            <p>IP, NAT, CCNAv7</p>
                        </section>
                        <section id="localisation" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/map-marker.png" alt="map-marker" />
                            <p>2 allée des foulons, 67380 Lingolsheim</p>
                        </section>
                        <section id="entreprise-logo" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/client-company.png" alt="client-company" />
                            <p>CESI Strasbourg</p>
                        </section>
                        <section id="promo" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/reviewer-male.png" alt="reviewer-male" />
                            <p>CPI A2 Info</p>
                        </section>
                        <section id="duree" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/time--v1.png" alt="time--v1" />
                            <p>12 Semaines</p>
                        </section>
                        <section id="date" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/google-calendar.png" alt="google-calendar" />
                            <p>08/04 - 19/07</p>
                        </section>
                        <section id="remuneration" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/money--v1.png" alt="money--v1" />
                            <p>4,35€ / heure</p>
                        </section>
                        <section id="places" class="item">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/conference-call--v1.png" alt="conference-call--v1" />
                            <p>3 places</p>
                        </section>
                        <section id="description">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam. Quas,
                                quaerat. Quisquam
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam repellendus cum ea
                                pariatur et modi,
                                laborum quae consequatur doloribus accusantium eligendi aperiam, illo iure autem nobis
                                velit eos
                                facilis. Sapiente!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam sunt magni, saepe,
                                tempore qui odio
                                necessitatibus laboriosam repellat, nobis voluptatem blanditiis rerum placeat libero
                                aliquid sit
                                explicabo maiores molestiae?
                            </p>
                        </section>
                    </section>
                </section>

                <label for="motiv">Lettre de motivation</label>
                <textarea id="motiv" name="motiv" required placeholder="Lettre de motivation"></textarea>

                <label for="cv">CV</label>
                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx,.odt" required />
                <div id="loginbtns">
                    <input type="submit" value="Envoyer" />
                    <input type="reset" value="Réinitialiser" />
                    <input type="button" onclick="javascript:window.history.back();" value="Annuler" />
                </div>
            </fieldset>
        </form>
    </main>
    <footer>
        <section id="liens-footer">
            <a href="../pages/cgu.html" class="a-footer">CGU</a>
            <a href="../pages/about.html" class="a-footer">A Propos</a>
            <a href="../pages/contact.html" class="a-footer">Contact</a>
        </section>
        <p>Stage Catalyst © 2024</p>
    </footer>
</body>

</html>