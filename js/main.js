// funciones para redirigir a otra vista

function inic() {
    window.location.href = "../php/iniciar.php";
}

function regi() {
    window.location.href = "../php/registro.php";
}

function princ() {
    window.location.href = "../html/index.html";
}

// funcion para verificar contraseña

document.addEventListener("DOMContentLoaded", function () {
    const contraseñaInput = document.getElementById("contraseña");
    const confirmarContraseñaInput = document.getElementById(
        "confirmarContraseña"
    );
    const formulario = document.forms["form"];

    function validarContraseña() {
        if (contraseñaInput.value !== confirmarContraseñaInput.value) {
            confirmarContraseñaInput.setCustomValidity(
                "Las contraseñas no coinciden"
            );
        } else {
            confirmarContraseñaInput.setCustomValidity("");
        }
    }

    contraseñaInput.addEventListener("change", validarContraseña);
    confirmarContraseñaInput.addEventListener("keyup", validarContraseña);

    function validarFormulario(event) {
        if (contraseñaInput.value !== confirmarContraseñaInput.value) {
            alert("Las contraseñas no coinciden.");
            event.preventDefault(); // Evitar el envío del formulario si las contraseñas no coinciden
        }
    }

    formulario.addEventListener("submit", validarFormulario);
});

// funcion para cambiar imagen una vez subida la del usuario
document.addEventListener('DOMContentLoaded', function() {
    var inputFile = document.querySelector('#archivo');
    var customFileUpload = document.querySelector('#custom-file-upload');

    inputFile.addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                customFileUpload.style.backgroundImage = "url('" + e.target.result + "')";
            };
            reader.readAsDataURL(file);
        }
    });
})

// funcion deshabilitar el boton mientras que el capcha no este activado
function onCaptchaLoad() {
    // Habilitar el botón de envío una vez que el captcha esté listo
    document.querySelector('.btn').removeAttribute('disabled');
}