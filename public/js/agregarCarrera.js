const carreras = document.querySelectorAll(".contenedor-modalidades-aceptar");
const contenedor = document.getElementById("agregar-carrera");

carreras.forEach((carrera) => {
    carrera.addEventListener("click", (e) => {
        let carreraId = e.target.dataset.id;
        let valorSeleccionado = [];

        const checkboxs = document.querySelectorAll(
            `input[name="modalidad${carreraId}"]`
        );

        checkboxs.forEach((checkbox) => {
            if (checkbox.checked) {
                valorSeleccionado.push(checkbox.value);
            }
        });
        console.log(valorSeleccionado);
        if (valorSeleccionado.length === 0) return ;

        let div = document.createElement("div");
        div.classList.add("carrera-agregada");



        valorSeleccionado.forEach((valor) => {
            let input = document.createElement("input");
            input.name = `modalidad${carreraId}[]`;
            input.type = "hidden";
            input.value = valor;

            div.appendChild(input);
        })

        // Agregando carreras al formulario
        let input = document.createElement("input");
        input.name = `carrera[]`;
        input.type = "hidden";
        input.value =  carreraId;


        // Crear un span no editable para mostrar el valor
        let span = document.createElement("span");
        span.textContent = e.target.dataset.nombre;

        div.appendChild(input);
        div.appendChild(span);
        contenedor.appendChild(div);
        e.target.parentNode.remove();
    });
});
