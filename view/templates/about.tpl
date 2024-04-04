{extends file="./project.tpl"}
{block name=title}
    Contact
{/block}
{block name=head append}
    <meta name="description" content="Page à propos du site Stage Catalyst">
    <link rel="preload" href="/assets/styles/avout.css" as="style">
    <link rel="stylesheet" href="/assets/styles/about.css" />
{/block}

{block name=main}
    <section class="about">
        <h1>A propos</h1>
        <h2>Qui sommes nous ?</h2>
        <p>StageCatalyst est un site web crée par une équipe de développeurs indépendants. Etant confrontés aux
            difficultées liées à la recherche de stages, nous avons crée ce site dans l'objectif de faciliter la
        tâche aux étudiants de l'année suivante.</p>
        <p>Au cours de plusieurs semaines, nous nous sommes formés au développement web et à l'hébergement afin de
        fournir une solution ergonomique et facilement utilisable par tous.</p>
    <h2>Notre équipe</h2>
    <p>Notre équipe est composée de 3 développeurs, tous passionnés par l'informatique. Nous avons tous
            travaillé sur ce projet avec le même objectif : faciliter la recherche de stage pour les étudiants.</p>

        <h2>Nos engagements</h2>
        <p>Nous nous engageons à fournir un service de qualité, gratuit et sans publicité. Nous nous engageons
            également à ne pas revendre les données personnelles des utilisateurs.</p>
        <p>Notre site est hébergé sur un serveur sécurisé et nous faisons régulièrement des mises à jour pour
            garantir la sécurité des données.</p>
    </section>
{/block}