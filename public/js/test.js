const alerta = document.querySelector(".error-login");
alerta.style.display = "none";

document
    .getElementById("test-form")
    .addEventListener("submit", function (event) {
        const preguntas = document.getElementsByClassName("test-validar");

        for (let i = 0; i < preguntas.length; i++) {
            let opciones = preguntas[i].querySelectorAll('input[type="radio"]');
            let respuestaSeleccionada = false;
            for (let j = 0; j < opciones.length; j++) {
                if (opciones[j].checked) {
                    respuestaSeleccionada = true;
                    break;
                }
            }
            if (!respuestaSeleccionada) {
                alerta.style.display = "block";
                setTimeout(function () {
                    if (alerta) {
                        alerta.style.display = "none";
                    }
                }, 8000);
                window.scrollTo(0, 0);
                event.preventDefault();
                return;
            }
        }
    });
