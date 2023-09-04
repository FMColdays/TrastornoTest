const agregarInputPregunta = document.getElementById("agregar-input-pregunta");
const contenedorDinamico = document.getElementById("contenedor-dinamico");

const eliminarRespuesta = (e) => {
    e.parentNode.remove();
};

let contador = 0;
const eliminar = (e) => {
    contador--;
    const divPadre = e.parentNode;
    contenedorDinamico.removeChild(divPadre);
};

let preguntaContador = 0; // Contador para preguntas
const contadoresRespuestas = {}; // Objeto para contadores de respuestas

agregarInputPregunta.addEventListener("click", () => {
    preguntaContador++;
    contadoresRespuestas[preguntaContador] = 0; // Inicializar el contador de respuestas para esta pregunta

    let div = document.createElement("div");
    div.classList.add("contenedor-agregar");
    div.innerHTML = `
    <i class="fa-solid fa-trash fa-lg minus-dinamico" onclick="eliminar(this)"></i>

    <div>
        <label for="">Pregunta</label>
        <input class="input-agregar" name="valores[]" type="hidden" value="${preguntaContador}">
        <input class="input-agregar" name="preguntaN[]" type="text">
    </div>
    <div>
        <label for="">Respuesta</label>
        <input class="input-agregar" name="respuestaN${preguntaContador}[]" type="text">
    </div>

    <div class="contenedor-plus preguntas" onclick="agregarRespuesta(this)" data-valor="${preguntaContador}">
        <i class="fa-solid fa-circle-plus fa-2xl"></i>
    </div>`;

    contenedorDinamico.appendChild(div);
});

const agregarRespuesta = (e) => {
    const preguntaId = e.dataset.valor;
    contadoresRespuestas[preguntaId]++;

    let div = document.createElement("div");
    div.classList.add("contenedor-respuesta");
    div.innerHTML = `  
        <i class="fa-solid fa-circle-minus fa-lg minus-dinamico" onclick="eliminarRespuesta(this)"></i> 
        <label for="">Respuesta</label>
        <input class="input-agregar" name="respuestaN${preguntaId}[]" type="text">`;

    e.parentNode.insertBefore(div, e);
};
