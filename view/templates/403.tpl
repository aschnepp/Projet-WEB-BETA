{extends file="./project.tpl"}
{block name=title}
    Erreur 403
{/block}
{block name=head append}
    <meta name="description" content="Une page d'erreur 403 : accès interdit">
    <link rel="preload" href="/assets/styles/403.css" as="style">
    <link rel="stylesheet" href="/assets/styles/403.css">
{/block}

{block name=main}
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
    <section>
        <h1>ERREUR 403</h1>
        <h2>Accès interdit</h2>
        <h3>VOUS N’ÊTES PAS AUTORISÉ A ALLER PLUS LOIN</h3>
        <a href="javascript:window.history.back();" id="back-btn">Revenir à la page précédente</a>
    </section>
{/block}