<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Connexion</title>
    <meta name="description" content="Cette page vous permet de vous connecter au site." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/cookies.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
</head>

<body>
    <header>
        <section id="header-gauche">
            <a href="../index.html" id="image-accueil"><img src="../assets/images/Logo.webp" alt="logo" id="logo" /></a>
            <p id="header-p">Stage Catalyst</p>
        </section>


        <section id="header-milieu">
        </section>

        <section id="header-droite">
            <!-- Menu Burger -->
            <div id="menu-burger-header">
                <div class="barre-haut"></div>
                <div class="barre-milieu"></div>
                <div class="barre-bas"></div>
            </div>

            <a class="liens-header boutons-header" rel="preconnect" href="login.html" title="Connexion">Connexion</a>
        </section>
    </header>
    <main>

        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>

        <form id="myForm" method="post" onsubmit="submitForm(event)">
            <fieldset>
                <label for="email">Identifiant</label>
                <input type="text" id="email" name="email" required autocomplete="on">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" minlength="8" required autocomplete="off">
                <div id="remember">
                    <input type="checkbox" id="souvenir" name="souvenir" />
                    <label for="souvenir">Se souvenir de moi</label>
                </div>
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