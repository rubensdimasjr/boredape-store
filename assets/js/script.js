let box = document.querySelector('.box');
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
    });