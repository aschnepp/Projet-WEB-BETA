function VerifLargeur() {
  if (window.innerWidth > 900) {
    var hamburgerheader = document.querySelector(
      "header #menu-burger-header.active"
    );
    if (hamburgerheader) {
      var body = document.querySelector("body");
      body.classList.remove("lock-scroll");

      hamburgerheader.classList.remove("active");

      var hamburgermenuflou = document.querySelector(
        "main #menu-burger-flou.flou-actif"
      );
      var hamburgermenumain = document.querySelector(
        "main #menu-burger-main.affiche"
      );

      hamburgermenumain.classList.remove("affiche");
      setTimeout(function () {
        hamburgermenuflou.style.animation = "disparition-flou 0.5s forwards";
        setTimeout(function () {
          hamburgermenuflou.classList.remove("flou-actif");
        }, 500);
      }, 500);
    }
  }
}

function ActivationMenuBurger() {
  var hamburgerheader = document.querySelector("header #menu-burger-header");
  hamburgerheader.classList.toggle("active");
  hamburgerheader.classList.add("disabled");

  var body = document.querySelector("body");

  var hamburgermenuflou = document.querySelector("main #menu-burger-flou");
  var hamburgermenumain = document.querySelector("main #menu-burger-main");

  if (hamburgermenumain.classList.contains("affiche")) {
    hamburgermenumain.classList.remove("affiche");
    setTimeout(function () {
      hamburgermenuflou.style.animation = "disparition-flou 0.5s forwards";
      setTimeout(function () {
        hamburgermenuflou.classList.remove("flou-actif");
        hamburgerheader.classList.remove("disabled");
      }, 500);
    }, 500);
    body.classList.remove("lock-scroll");
  } else {
    hamburgerheader.classList.add("disabled");
    hamburgermenuflou.style.animation = "apparition-flou 0.5s forwards";
    hamburgermenuflou.classList.add("flou-actif");
    setTimeout(function () {
      hamburgermenumain.classList.add("affiche");
    }, 500);

    setTimeout(function () {
      hamburgerheader.classList.remove("disabled");
    }, 1000);
    body.classList.add("lock-scroll");
  }
}

/* function Connecte(status) {
  if (status) {
    return `
    <input type="text" name="recherche" id="recherche" placeholder="Rechercher">
    <i class="fa fa-search" id="loupe" aria-hidden="true"></i>
    `;
  }
  return ``;
} */ //TODO : REMOVE THIS FUNCTION

function Status(status) {
  if (status) {
    if (status.userType == "Admin") {
      return `
      <a class="fa fa-heart liens-header" id="wishlist" aria-hidden="true" rel="preconnect" href="test.html"></a>
      <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect"
          href="test.html"></a>
      <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
      <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="entreprise.html"></a>
      `;
    } else if (status.userType == "Tuteur") {
      return `

      `;
    } else {
      return `
      `;
    }
  } else {
    return `
    <a class="liens-header boutons-header" rel="preconnect" href="../pages/login.html" title="Connexion">Connexion</a>
    `;

    //TODO Changer le path si la page actuelle = index.html
  }
}

window.onload = function () {
  //TODO REMPLISSAGE DU HEADER AU CHARGEMENT DE LA PAGE EN FCT DES COOKIES


  // if (connecte == false) {
  //   document.querySelector("#recherche").style.display = "none";
  //   document.querySelector("#loupe").style.display = "none";
  // }




  // document.querySelector("#header-droite").insertAdjacentHTML('beforeend',
  //   `
  // <section id="menu-burger-header">
  //   <section class="barre-haut"></section>
  //   <section class="barre-milieu"></section>
  //   <section class="barre-bas"></section>
  // </section>
  // ` +
  //   status);


  // document.querySelector("main").insertAdjacentHTML("afterbegin",
  //   `<section id="menu-burger-flou">
  //     <section id="menu-burger-main">`
  // + items_menu_burger +
  //   `</section>
  // </section>`)

  var hamburgerheader = document.querySelector("header #menu-burger-header");
  hamburgerheader.addEventListener("click", ActivationMenuBurger);
  VerifLargeur();
};

window.onresize = function () {
  VerifLargeur();
};
