if (document.addEventListener) {
  document.addEventListener("click", (event) => {
    const hamburguer = document.getElementById("hamburguer");
    const navUL = document.getElementById("nav-ul");

    let targetElement = event.target || EventTarget;

    if (targetElement === hamburguer) {
      navUL.classList.toggle("show");
    } else if (targetElement !== navUL && navUL.classList.contains("show")) {
      navUL.classList.toggle("show");
    }
  });
}
