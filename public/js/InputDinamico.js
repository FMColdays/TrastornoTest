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
        <label class="pregunta-test-label" for="">Pregunta</label>
        <input class="input-agregar" name="valores[]" type="hidden" value="${contador}">
        <input class="input-agregar" name="pregunta[]" type="text">
    </div>
    <div>
        
    <div class="contenedor-pregunta-valor">
            <div class="contenedor-respuesta">
                <label class="respuesta-test-label" for="">Respuesta</label>
                <input class="input-agregar" name="respuesta${contador}[]" type="text">
            </div>
            <div class="contenedor-valor">
                <label class="respuesta-test-label" for="">Valor</label>
                <input class="input-agregar" name="valorR${contador}[]" type="number" min="1">
            </div>
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
        <div class="contenedor-pregunta-valor">
            <div class="contenedor-respuesta">
                <label class="respuesta-test-label" for="">Respuesta</label>
                <input class="input-agregar" name="respuesta${e.dataset.valor}[]" type="text">
            </div>
            <div class="contenedor-valor">
                <label class="respuesta-test-label" for="">Valor</label>
                <input class="input-agregar" name="valorR${e.dataset.valor}[]" type="number" min="1">
            </div>
        </div>`;

    e.parentNode.insertBefore(div, e);
};

const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedorDinamico.removeChild(divPadre);
};

const eliminarRespuesta = (e) => {
    e.parentNode.remove();
};

function validarCampos() {
    let inputs = document.querySelectorAll('input');
    let selects = document.querySelectorAll('select');
    let error = false;

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '' && inputs[i].type != 'hidden') {
            inputs[i].classList.add('error');
            error = true;
        } else {
            inputs[i].classList.remove('error');
        }
    }

    for (let i = 0; i < selects.length; i++) {
        if (selects[i].value == '') {
            selects[i].classList.add('error');
            error = true;
        } else {
            selects[i].classList.remove('error');
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


