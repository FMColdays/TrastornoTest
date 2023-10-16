let valorOpcion;
$("#buscador").select2();
$(document).ready(function () {

    $(".input-agregar").on("input", function () {
        $(this).siblings(".error-registro").hide();
    });

    valorOpcion = $("#buscador").val();
    opciones = document.querySelectorAll(".opcionesI");

    opciones.forEach((opcion) => {
        if (opcion.dataset.instituto !== valorOpcion) {
            opcion.style.display = "none";
        } else {
            opcion.style.display = "block";
        }
    });

    $("#buscador").on("change", function () {
        valorOpcion = $(this).val();
       
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
