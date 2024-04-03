{extends file="./project.tpl"}
{block name=title}
    Accueil
{/block}
{block name=head append}
    <meta name="description" content="Page d'accueil de Stage Catalyst.">
    <link rel="preload" href="/assets/styles/index.css" as="style">
    <link rel="stylesheet" href="/assets/styles/index.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/">
{/block}

{block name=main}
    {if isset($connected) && $connected}

        <h2>Bienvenue sur votre espace membre !</h2>
        <h3>Voici une offre qui pourrait vous interésser.</h3>

        <section id="fieldset-main">
            <fieldset>
                <legend>Offre</legend>
                <section id="section-main">
                    <section id="offre">
                        <section class="headerOffre">
                            <h3>{$offre->title}</h3>
                            <section class="stats">
                                <section id="likes" class="item">
                                    <i class="fa-regular fa-heart fa-2x"></i>
                                    <p>{$offre->total_wishlist}</p>
                                </section>
                                <section id="demandes" class="item">
                                    <i class="fa-regular fa-envelope fa-2x"></i>
                                    <p>{$offre->total_postulation}</p>
                                </section>
                            </section>
                        </section>
                        <section class="infos">
                            <section id="competences" class="item">
                                <i class="fa-solid fa-certificate fa-2x"></i>
                                <p>{implode(", ",$skillsList)}</p>
                            </section>
                            <section id="localisation" class="item">
                                <i class="fa-solid fa-map-location-dot fa-2x"></i>
                                <p>{$offre->address}</p>
                            </section>
                            <section id="entreprise-logo" class="item">
                                <i class="fa-solid fa-building-user fa-2x"></i>
                                <p>{$offre->firmName}</p>
                            </section>
                            <section id="promo" class="item">
                                <i class="fa-solid fa-user-check fa-2x"></i>
                                <p>{implode(", ",$promotions)}</p>
                            </section>
                            <section id="duree" class="item">
                                <i class="fa-regular fa-clock fa-2x"></i>
                                <p>{$offre->duration} Semaines</p>
                            </section>
                            <section id="date" class="item">
                                <i class="fa-regular fa-calendar-days fa-2x"></i>
                                <p>{$offre->start_date} - {$offre->end_date}</p>
                            </section>
                            <section id="remuneration" class="item">
                                <i class="fa-solid fa-coins fa-2x"></i>
                                <p>{$offre->remuneration}€ / heure</p>
                            </section>
                            <section id="places" class="item">
                                <i class="fa-solid fa-users fa-2x"></i>
                                <p>{$offre->available_places} places</p>
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
{else}
<section id="texte">
    <h3>Vous cherchez un stage mais vous n'avez pas de pistes, ou alors vous ne savez pas s'y prendre ?</h3>
    <h3>Stage Catalyst résout tous vos problèmes en s'associant avec des entreprises prêtes à accueillir des stagiaires.</h3>
            <h3>N'attendez donc pas plus longtemps et allez postuler !</h3>
</section>

<div id="flex-main">
    <section class="blocs">
        <img src="/assets/images/Image_recherche_stage.webp" alt="Recherche de stage" id="image1">
        <h2>Plateforme de Recherche de Stage</h2>
        <p>
            Plus de 85% des étudiants de France ont trouvé leur stage via le site Stage Catalyst.
        </p>
    </section>

    <section class="blocs">
        <img src="/assets/images/Monde.webp" alt="Image du monde" id="image2">
        <h2>Opportunités Internationales</h2>
        <p>
            90% des entreprises sur la platerforme sont des entreprises internationales prêtes à former des stagiaires.
        </p>
    </section>

    <section class="blocs">
        <img src="/assets/images/Entretien_image.webp" alt="Image entretien" id="image3">
        <h2>Transition vers l'Emploi</h2>
                <p>Plus de 75% des stages de fin d'études effectués qui ont été trouvés via Stage Catalyst ont résulté en emploi.</p>
            </section>
        </div>
    {/if}
{/block}