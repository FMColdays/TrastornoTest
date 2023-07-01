const ojo = document.getElementById("ojo");
document.getElementById("togglePassword").addEventListener("click", () => {
    let password = document.getElementById("contraseña");
    if (password.type === "password") {
        ojo.classList.remove("fa-eye");
        ojo.classList.add("fa-eye-slash");
        password.type = "text";
    } else {
        ojo.classList.remove("fa-eye-slash");
        ojo.classList.add("fa-eye");
        password.type = "password";
    }
});

const alerta = document.querySelector(".error-login");
const contenedor = document.querySelector(".contenedor-login");
if (alerta) contenedor.style.marginTop = "1rem";

setTimeout(function () {
    if (alerta) {
        alerta.style.display = "none";
        contenedor.style.marginTop = "5rem";
    }
}, 8000);
