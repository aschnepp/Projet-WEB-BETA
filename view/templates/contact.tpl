{extends file="./project.tpl"}
{block name=title}
  Contact
{/block}
{block name=head append}
  <meta name="description" content="Page contact du site Stage Catalyst">
  <link rel="preload" href="/assets/styles/contact.css" as="style">
  <link rel="stylesheet" href="/assets/styles/contact.css" />
{/block}

{block name=main}
  <section class="contact">
    <h1>Contact</h1>
    <h2>Une question, un problème ?</h2>
    <p>
      Si vous avez une quelconque question à propos de notre site ou de
      notre service n'hésitez pas à nous contacter via une des méthodes si dessous
      :
    </p>
    <section id="contact-methods">
      <section>
        <img src="/assets/fontawesome/svgs/solid/phone.svg" alt="">
        <p>+33 3 48 27 19 83</p>
      </section>
      <section>
        <img src="/assets/fontawesome/svgs/solid/envelope-open-text.svg" alt="">
        <p>
          <a href="mailto:support@stage-catalyst.com">support@stage-catalyst.com</a>
        </p>
      </section>
      <section>
        <img src="/assets/fontawesome/svgs/brands/x-twitter.svg" alt="">
        <p>@StageCatalystSupport</p>
      </section>
      <section>
        <img src="/assets/fontawesome/svgs/solid/location-dot.svg" alt="">
        <p>2 Allée des Foulons, 67380 Lingolsheim, France</p>
      </section>
    </section>
  </section>
{/block}