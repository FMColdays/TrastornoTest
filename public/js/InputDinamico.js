const agregarInput = document.getElementById("agregar-input");
const contenedorDinamico = document.getElementById("contenedor-dinamico");

agregarInput.addEventListener("click", () => {
    let div = document.createElement("div");
    div.classList.add("contenedor-agregar");
    div.innerHTML = `<i class="fa-solid fa-circle-minus fa-lg minus-dinamico" onclick="eliminar(this)"></i>
    <div class="caja-input">
        <label for="">Pregunta</label>
        <input class="input-agregar" type="text">`;
    contenedorDinamico.appendChild(div);
});

const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedorDinamico.removeChild(divPadre);
};
