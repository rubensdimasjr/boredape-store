/* let box = document.querySelector('.box');
let icon = document.querySelector('.icon-ethereum');
let iconEthereum = icon.firstElementChild;

    box.addEventListener('mouseenter', () =>{
      icon.removeChild(icon.children[0]);
      icon.innerHTML = "Compre Agora!";
      icon.style.color = "blue";
    });

    box.addEventListener('mouseleave', () => {
      icon.innerHTML = '';
      icon.appendChild(iconEthereum);
    }); */
$.when($.ready).then(function () {
  $(".box").on("mouseenter", (e) => {
    var boxAtual = e.currentTarget;

    $(boxAtual).find(".icon-ethereum").css("display", "none");

    $(boxAtual)
      .find("div.iconWrapper")
      .prepend(
        $(
          "<a href='./pages/product-details.html' class='buy'>Compre Agora!</a>"
        )
      );
  });

  $(".box").on("mouseleave", (e) => {
    var boxAtual = e.currentTarget;

    $(boxAtual).find("a.buy").remove();
    $(boxAtual).find(".icon-ethereum").css("display", "block");
  });

  /*   $(".box").on("mouseleave", (e) => {
    var boxAtual1 = e.currentTarget;
    var iconWrapper1 = boxAtual1.childNodes[5];

    iconWrapper1.removeChild(iconWrapper1.children[0]);
    iconWrapper1.prepend(iconClone);
  }); */
});
