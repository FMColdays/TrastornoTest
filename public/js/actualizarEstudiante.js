let valorOpcion;
$("#buscador").select2();
$(document).ready(function () {
    valorOpcion = $("#buscador").val();
    console.log(valorOpcion);
    opciones = document.querySelectorAll(".opcionesI");

    opciones.forEach((opcion) => {
        console.log(opcion.dataset.instituto);
        if (opcion.dataset.instituto !== valorOpcion) {
            opcion.style.display = "none";
        } else {
            opcion.style.display = "block";
        }
    });

    $("#buscador").on("change", function () {
        valorOpcion = $(this).val();
        console.log(valorOpcion);
        opciones = document.querySelectorAll(".opcionesI");

        opciones.forEach((opcion) => {
            console.log(opcion.value);
            if (opcion.dataset.instituto !== valorOpcion) {
                opcion.style.display = "none";
            } else {
                opcion.style.display = "block";
                opcion.selected = true;
            }
        });
    });
});
