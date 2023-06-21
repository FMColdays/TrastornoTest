const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll(".pregunta .input-registro");

const expresiones = {
    password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/,
    correo: /^[A-Za-z0-9._%+-]+@tuxtla\.tecnm\.mx$/,
    edad: /^\d+$/,
};

const campos = {
    correo: false,
    contraseña1: false,
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
    const contraseña1 = document.getElementById("contraseña1").value;
    const contraseña2 = document.getElementById("contraseña2").value;
    const contraseñaRequisitos = [
        { expresion: /[A-Z]/, campo: "mayusculas" },
        { expresion: /[0-9]/, campo: "numero" },
        { expresion: /^[a-zA-Z0-9\s]*$/, campo: "caracteresEs" },
    ];

    campos.contraseña1 = contraseñaRequisitos.every((req) =>
        req.expresion.test(contraseña1)
    );
    campos.contraseña2 = contraseña1 === contraseña2;

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
        if (i === 1 && contraseña1.length > 7) {
            li.classList.add("requisito-correcto");
            minCaracteres = true;
        }
        if (i === 1 && contraseña1.length < 8) {
            li.classList.remove("requisito-correcto");
            minCaracteres = false;
        }
        if (i === 2 && /[A-Z]/.test(contraseña1)) {
            li.classList.add("requisito-correcto");
            mayusculas = true;
        } else if (i === 2 && !/[A-Z]/.test(contraseña1)) {
            li.classList.remove("requisito-correcto");
            mayusculas = false;
        }
        if (i === 3 && /[0-9]/.test(contraseña1)) {
            li.classList.add("requisito-correcto");
            numero = true;
        } else if (i === 3 && !/[0-9]/.test(contraseña1)) {
            li.classList.remove("requisito-correcto");
            numero = false;
        }
        if (i === 4 && /^[a-zA-Z0-9\s]*$/.test(contraseña1)) {
            li.classList.add("requisito-correcto");
            caracteresEs = true;
        } else if (i === 4 && !/^[a-zA-Z0-9\s]*$/.test(contraseña1)) {
            li.classList.remove("requisito-correcto");
            caracteresEs = false;
        }
    });

    if (minCaracteres && mayusculas && numero && caracteresEs) {
        campos.contraseña1 = true;
    } else {
        campos.contraseña1 = false;
    }
};

const validarFormulario = (e) => {
    const campo = e.target.name;
    const valor = e.target.value;

    switch (campo) {
        case "correo":
        case "edad":
            validarCampo(expresiones[campo], valor, campo);
            break;
        case "contraseña1":
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

formulario.addEventListener("submit", (e) => {
    if (Object.values(campos).some((campo) => !campo)) {
        e.preventDefault();
    }
});
