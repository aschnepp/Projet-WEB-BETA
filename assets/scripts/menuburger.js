function VerifLargeur() {
    if (window.innerWidth > 900) {
        var hamburgerheader = document.querySelector("header #menu-burger-header.active");
        if (hamburgerheader) {

            var body = document.querySelector("body");
            body.classList.toggle("lock-scroll");

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
        hamburgerheader.classList.add("disabled")
        hamburgermenuflou.style.animation = "apparition-flou 0.5s forwards";
        hamburgermenuflou.classList.add("flou-actif");
        setTimeout(function () {
            hamburgermenumain.classList.add("affiche");
        }, 500);

        setTimeout(function () {
            hamburgerheader.classList.remove("disabled")
        }, 1000);
        body.classList.add("lock-scroll");
    }
}

window.onload = function () {
  var hamburgerheader = document.querySelector("header #menu-burger-header");
  hamburgerheader.addEventListener("click", ActivationMenuBurger);
  VerifLargeur();
};

window.onresize = function () {
  VerifLargeur();
};