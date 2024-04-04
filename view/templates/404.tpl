{extends file="./project.tpl"}
{block name=title}
    Erreur 404
{/block}
{block name=head append}
    <meta name="description" content="Une page d'erreur 404 : page introuvable">
    <link rel="preload" href="/assets/styles/404.css" as="style">
    <link rel="stylesheet" href="/assets/styles/404.css">
{/block}

{block name=main}
    <section>
        <h1>ERREUR 404</h1>
        <h2>Page introuvable</h2>
        <h3>La page que vous avez demandé est introuvable</h3>
        <a href="javascript:window.history.back();" id="back-btn">Revenir à la page précédente</a>
    </section>
{/block}