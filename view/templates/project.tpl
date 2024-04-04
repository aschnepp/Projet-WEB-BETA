{extends file="./layout.tpl"}
{block name=head}
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Stage Catalyst</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script rel="preload" src="/assets/scripts/menuburger.js"></script>

    <!-- Style -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Montserrat" as="style">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
{/block}
{block name=body}
    {include file="./header.tpl"}
    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>
        {block name=main}

        {/block}
    </main>
    {include file="./footer.tpl"}
{/block}