<header>
    <section id="header-gauche">
        <a href="index.html" id="image-accueil"><img src="/assets/images/Logo.webp" alt="logo" id="logo" /></a>
        <p id="header-p">Stage Catalyst</p>
    </section>

    <section id="header-milieu">
        {if isset($connected) && $connected}
            <input type="text" name="recherche" id="recherche" placeholder="Rechercher">
            <i class="fa fa-search" id="loupe" aria-hidden="true"></i>
        {else}
        {/if}
    </section>

    <section id="header-droite">
        <!-- Menu Burger -->
        <div id="menu-burger-header">
            <div class="barre-haut"></div>
            <div class="barre-milieu"></div>
            <div class="barre-bas"></div>
        </div>

        <!-- Contenu du header-droite -->
        {if isset($connected) && $connected}
            <a class="fa fa-heart liens-header" id="wishlist" aria-hidden="true" rel="preconnect" href="test.html"></a>
            {if isset($type) && $type == "tuteur" || $type == "admin"}
                <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect" href="test.html"></a>
                <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
            {/if}
            <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="test.html"></a>
        {else}
            <a class="liens-header boutons-header" rel="preconnect" href="pages/login.html" title="Connexion">Connexion</a>
        {/if}

    </section>
</header>