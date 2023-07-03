let valorOpcion;
$("#buscador").select2();
$(document).ready(function () {
    $(".input-registro").on("input", function () {
        $(this).siblings(".error-registro").hide();
    });
    
    valorOpcion = $("#buscador").val();
    opciones = document.querySelectorAll(".opcionesI");
    opciones.forEach((opcion) => {
        if (opcion.id !== valorOpcion) {
            opcion.style.display = "none";
        } else {
            opcion.style.display = "block";
        }
    });

    $("#buscador").on("change", function () {
        valorOpcion = $(this).val();
        opciones = document.querySelectorAll(".opcionesI");
        opciones.forEach((opcion) => {
            if (opcion.id !== valorOpcion) {
                opcion.style.display = "none";
            } else {
                opcion.style.display = "block";
                opcion.selected = true;
            }
        });
    });
});

const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll(".pregunta .input-registro");

const expresiones = {
    numeroControl: /^\d{8}$/,
    correo: /^[A-Za-z0-9._%+-]+@tuxtla\.tecnm\.mx$/,
    password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/,
    edad: /^\d+$/,
};

const campos = {
    numeroControl: false,
    correo: false,
    contraseña: false,
    contraseña2: false,
    edad: false,
};

const validarCampo = (expresion, input, campo) => {
    const elemento = document.getElementById(campo);
    elemento.classList.toggle(
        "input-registro-incorrecto",
        !expresion.test(input)
    );
    elemento.classList.toggle("input-registro-correcto", expresion.test(input));
    campos[campo] = expresion.test(input);
};

const validarContraseña = () => {
    const contraseña = document.getElementById("contraseña").value;
    const contraseña2 = document.getElementById("contraseña2").value;
    const contraseñaRequisitos = [
        { expresion: /[A-Z]/, campo: "mayusculas" },
        { expresion: /[0-9]/, campo: "numero" },
        { expresion: /^[a-zA-Z0-9\s]*$/, campo: "caracteresEs" },
    ];

    campos.contraseña = contraseñaRequisitos.every((req) =>
        req.expresion.test(contraseña)
    );
    campos.contraseña2 = contraseña === contraseña2;

    if (contraseña2 !== "") {
        if (campos.contraseña2) {
            document.querySelector(".errorE").classList.add("coincidencia");
            document
                .getElementById("contraseña2")
                .classList.remove("input-registro-incorrecto");
            document
                .getElementById("contraseña2")
                .classList.add("input-registro-correct");
        } else {
            document.querySelector(".errorE").classList.remove("coincidencia");
            document
                .getElementById("contraseña2")
                .classList.remove("input-registro-correct");
            document
                .getElementById("contraseña2")
                .classList.add("input-registro-incorrecto");
        }
    }

    const ulRequisitos = document.querySelector(".requisitosPassword");

    let i = 0;
    const listaItems = ulRequisitos.querySelectorAll("li");
    listaItems.forEach((li) => {
        i++;
        if (i === 1 && contraseña.length > 7) {
            li.classList.add("requisito-correcto");
            minCaracteres = true;
        }
        if (i === 1 && contraseña.length < 8) {
            li.classList.remove("requisito-correcto");
            minCaracteres = false;
        }
        if (i === 2 && /[A-Z]/.test(contraseña)) {
            li.classList.add("requisito-correcto");
            mayusculas = true;
        } else if (i === 2 && !/[A-Z]/.test(contraseña)) {
            li.classList.remove("requisito-correcto");
            mayusculas = false;
        }
        if (i === 3 && /[0-9]/.test(contraseña)) {
            li.classList.add("requisito-correcto");
            numero = true;
        } else if (i === 3 && !/[0-9]/.test(contraseña)) {
            li.classList.remove("requisito-correcto");
            numero = false;
        }
        if (i === 4 && /^[a-zA-Z0-9\s]*$/.test(contraseña)) {
            li.classList.add("requisito-correcto");
            caracteresEs = true;
        } else if (i === 4 && !/^[a-zA-Z0-9\s]*$/.test(contraseña)) {
            li.classList.remove("requisito-correcto");
            caracteresEs = false;
        }
    });

    if (minCaracteres && mayusculas && numero && caracteresEs) {
        campos.contraseña = true;
    } else {
        campos.contraseña = false;
    }
};

const validarFormulario = (e) => {
    const campo = e.target.name;
    const valor = e.target.value;

    switch (campo) {
        case "numeroControl":
        case "correo":
        case "edad":
            validarCampo(expresiones[campo], valor, campo);
            break;
        case "contraseña":
        case "contraseña2":
            validarCampo(expresiones.password, valor, campo);
            validarContraseña();
            break;
    }
};

inputs.forEach((input) => {
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
});
