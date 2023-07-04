const contenedor = document.querySelectorAll(".enlace");
const buscarInput = document.getElementById("buscar");

buscarInput.addEventListener("input", buscar);

function buscar(e) {
    const busqueda = e.target.value.toLowerCase();

    contenedor.forEach((enlace) => {
        const numeroControl = enlace.querySelector(".numeroControl").textContent.toLowerCase();
        const correo = enlace.querySelector(".correo").textContent.toLowerCase();
        const instituto = enlace.querySelector(".instituto").textContent.toLowerCase();
        const carrera = enlace.querySelector(".carrera").textContent.toLowerCase();
        const semestre = enlace.querySelector(".semestre").textContent.toLowerCase();

        if (
            numeroControl.includes(busqueda) ||
            correo.includes(busqueda) ||
            instituto.includes(busqueda) ||
            carrera.includes(busqueda) ||
            semestre.includes(busqueda)
        ) {
            enlace.style.display = "block";
        } else {
            enlace.style.display = "none";
        }
    });
}
