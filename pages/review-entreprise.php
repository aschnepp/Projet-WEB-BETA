<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Notation Entreprise</title>
    <meta name="description" content="Cette page vous permet de noter et commenter une entreprise dans laquelle vous avez effectué un stage." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/review-entreprise.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/review-entreprise.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
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
            <section id="menu-burger-main">
            </section>
        </div>
        <form id="myForm" method="post">
            <fieldset>
                <legend>Entreprise</legend>
                <div id="entreprise-review">
                    <div id="logo-container"></div>
                    <div class="contentEntreprise">
                        <section class="headerEntreprise">
                            <h2>CESI</h2>
                            <section id="gradeWrapper">
                                <div class="rate2">

                                </div>
                            </section>
                        </section>
                        <div class="bodyEntreprise">
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png" alt="domain" />
                                <a href="https://www.cesi.fr/" target="_blank" id="website">www.cesi.fr</a>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png" alt="map-marker" />
                                <p>2 allée des foulons, 67380 Lingolsheim</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/client-company.png" alt="client-company" />
                                <p>Education / Formation</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png" alt="groups" />
                                <p>30 personnes</p>
                            </section>
                        </div>
                    </div>
                    <div class="description">
                        <fieldset>
                            <legend>Description</legend>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus,
                                neque tempora! Cum
                                quae
                                pariatur veniam enim vel amet eligendi fuga dolor suscipit ea? Fugiat unde ex expedita
                                alias
                                minus
                                voluptatibus.
                            </p>
                        </fieldset>
                    </div>
                </div>

                <label for="star5" class="labels">Note</label>
                <div id="rate-wrapper">
                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" required />
                        <label for="star5" title="Awesome"></label>
                        <input type="radio" id="star4.5" name="rating" value="4.5" />
                        <label for="star4.5" class="half"></label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4"></label>
                        <input type="radio" id="star3.5" name="rating" value="3.5" />
                        <label for="star3.5" class="half"></label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3"></label>
                        <input type="radio" id="star2.5" name="rating" value="2.5" />
                        <label for="star2.5" class="half"></label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2"></label>
                        <input type="radio" id="star1.5" name="rating" value="1.5" />
                        <label for="star1.5" class="half"></label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1"></label>
                        <input type="radio" id="star0.5" name="rating" value="0.5" />
                        <label for="star0.5" class="half"></label>
                    </div>
                </div>
                <label for="motiv" class="labels">Commentaire</label>
                <textarea id="motiv" name="motiv" required placeholder="Commentaire"></textarea>
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