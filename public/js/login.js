document.getElementById("ojo").addEventListener("click", () => {
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
setTimeout(function () {
    if (alerta) {
        alerta.style.display = "none";
    }
}, 8000);
