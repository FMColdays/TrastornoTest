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


    <label for="">Pregunta</label>
    <input class="input-agregar" name="valores[]" type="hidden" value="${preguntaContador}">
    <input class="input-agregar" name="preguntaN[]" type="text">
   
     <div class="contenedor-pregunta-valor">
            <div class="contenedor-respuesta">
                <label class="respuesta-test-label" for="">Respuesta</label>
                <input class="input-agregar" name="respuestaN${preguntaContador}[]" type="text">
            </div>
            <div class="contenedor-valor">
                <label class="respuesta-test-label" for="">Valor</label>
                <input class="input-agregar" name="valorRN${preguntaContador}[]" type="number" min="1">
            </div>
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
        <div class="contenedor-pregunta-valor">
            <div class="contenedor-respuesta">
                <label class="respuesta-test-label" for="">Respuesta</label>
                <input class="input-agregar" name="respuestaN${preguntaId}[]" type="text">
            </div>
            <div class="contenedor-valor">
                <label class="respuesta-test-label" for="">Valor</label>
                <input class="input-agregar" name="valorRN${preguntaId}[]" type="number" min="1">
            </div>
        </div>`;

    e.parentNode.insertBefore(div, e);
};

function validarCampos() {
    let inputs = document.querySelectorAll("input");
    let selects = document.querySelectorAll("select");
    let error = false;

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "" && inputs[i].type != "hidden") {
            inputs[i].classList.add("error");
            error = true;
        } else {
            inputs[i].classList.remove("error");
        }
    }

    for (let i = 0; i < selects.length; i++) {
        if (selects[i].value == "") {
            selects[i].classList.add("error");
            error = true;
        } else {
            selects[i].classList.remove("error");
        }
    }

    return !error;
}

const formulario = document.querySelector('form'); 

formulario.addEventListener('submit', (e) => {
    if (!validarCampos()) {
        e.preventDefault(); 
    }
});

