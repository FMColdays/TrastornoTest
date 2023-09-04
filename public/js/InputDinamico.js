const agregarInputPregunta = document.getElementById("agregar-input-pregunta");
const contenedorDinamico = document.getElementById("contenedor-dinamico");
let contador = 1;

agregarInputPregunta.addEventListener("click", () => {
    contador++;
    let div = document.createElement("div");
    div.classList.add("contenedor-agregar");
    div.innerHTML = `
    <i class="fa-solid fa-trash fa-lg minus-dinamico"  onclick="eliminar(this)"></i>


    <div>
        <label for="">Pregunta</label>
        <input class="input-agregar" name="pregunta[]" type="text">
    </div>
    <div>
        <label for="">Respuesta</label>
        <input class="input-agregar" name="respuesta${contador}[]" type="text">
    </div>

    <div class="contenedor-plus preguntas" onclick="agregarRespuesta(this)" data-valor="${contador}">
        <i class="fa-solid fa-circle-plus fa-2xl"></i>
    </div>`;

    contenedorDinamico.appendChild(div);
});

const agregarRespuesta = (e) => {
    let div = document.createElement("div");
    div.classList.add("contenedor-respuesta");
    div.innerHTML = `  
        <i class="fa-solid fa-circle-minus fa-lg minus-dinamico" onclick="eliminarRespuesta(this)"></i> 
        <label for="">Respuesta</label>
        <input class="input-agregar" name="respuesta${e.dataset.valor}[]" type="text">`;

    e.parentNode.insertBefore(div, e);
};

const eliminar = (e) => {
    contador--;
    const divPadre = e.parentNode;
    contenedorDinamico.removeChild(divPadre);
};

const eliminarRespuesta = (e) => {
    e.parentNode.remove();
};
