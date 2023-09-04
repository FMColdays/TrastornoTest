const carreras = document.querySelectorAll(".modalidades");
const contenedor = document.getElementById("agregar-carrera");
const contenedor2 = document.getElementById("carreras-existentes");

function eliminar(elemento) {
    let div = document.createElement("div");
    div.classList.add("contenedor-modalidades");
    div.innerHTML = `
    <label class="modalidades" 
        data-id="${elemento.dataset.carreraid}" data-carrera="${elemento.dataset.carreran}" 
        data-modalidad="${elemento.dataset.carreram}" onclick="agregar(this)">
        ${elemento.dataset.carreran} → ${elemento.dataset.carreram}
     </label>`;

    contenedor2.appendChild(div);
    elemento.parentNode.remove();
}

function agregar(elemento) {
    let carreraId = elemento.dataset.id;
    let carreraNombre = elemento.dataset.carrera;
    let carreraModalidades = elemento.dataset.modalidad;

    let div = document.createElement("div");

    div.innerHTML = `
            <div class="carrera-agregada" onclick = "eliminar(this)" 
            data-carreraId = "${carreraId}" data-carreraN = "${carreraNombre}" data-carreraM = "${carreraModalidades}">
                <input type="hidden" name="ids[]" value="${carreraId}">
                <input type="hidden" name="carreras[]" value="${carreraNombre}">
                <input type="hidden" name="modalidades[]" value="${carreraModalidades}">
                <span>${carreraNombre} → ${carreraModalidades}</span>
            </div>`;

    contenedor.appendChild(div);
    elemento.parentNode.remove();
}
