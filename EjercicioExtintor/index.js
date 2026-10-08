const imagenFuego = document.querySelector("#imagenFuego");
const sonidoFuego = document.querySelector("#sonidoFuego");

imagenFuego.addEventListener("mouseenter", () => {
    sonidoFuego.play();
});

imagenFuego.addEventListener("mouseleave", () => {
    sonidoFuego.pause();
    sonidoFuego.currentTime = 0;
});