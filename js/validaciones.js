function validarRegistro() {
    let nombre = document.getElementById("nombre").value.trim();
    let correo = document.getElementById("correo").value.trim();
    let password = document.getElementById("password").value;
    let captcha = document.getElementById("captcha").value.trim();

    if (nombre === "" || correo === "" || password === "" || captcha === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    if (password.length < 8) {
        alert("La contraseña debe tener mínimo 8 caracteres.");
        return false;
    }

    if (isNaN(captcha)) {
        alert("La verificación humana debe ser un número.");
        return false;
    }

    return true;
}

function validarContacto() {
    let nombre = document.getElementById("nombreContacto").value.trim();
    let correo = document.getElementById("correoContacto").value.trim();
    let asunto = document.getElementById("asuntoContacto").value.trim();
    let mensaje = document.getElementById("mensajeContacto").value.trim();
    let captcha = document.getElementById("captchaContacto").value.trim();

    if (nombre === "" || correo === "" || asunto === "" || mensaje === "" || captcha === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    if (isNaN(captcha)) {
        alert("La verificación humana debe ser un número.");
        return false;
    }

    return true;
}

function enviarMensajeChat() {
    let input = document.getElementById("mensajeChat");
    let contenedor = document.getElementById("chatContenedor");
    let texto = input.value.trim();

    if (texto === "") {
        alert("Escribe un mensaje antes de enviar.");
        return false;
    }

    let mensajeUsuario = document.createElement("div");
    mensajeUsuario.className = "mensaje-chat usuario";
    mensajeUsuario.innerHTML = "<strong>Tú:</strong><p>" + texto + "</p>";
    contenedor.appendChild(mensajeUsuario);

    let respuesta = document.createElement("div");
    respuesta.className = "mensaje-chat soporte";

    let textoRespuesta = "Gracias por tu mensaje. Un asesor revisará tu solicitud.";
    let textoMinuscula = texto.toLowerCase();

    if (textoMinuscula.includes("registro")) {
        textoRespuesta = "Para registrarte, entra a la sección Registrarse y completa el formulario.";
    } else if (textoMinuscula.includes("contraseña")) {
        textoRespuesta = "Puedes recuperar tu contraseña desde la sección Recuperación de contraseña.";
    } else if (textoMinuscula.includes("servicio")) {
        textoRespuesta = "Puedes consultar nuestros servicios en la sección Servicios.";
    } else if (textoMinuscula.includes("contacto")) {
        textoRespuesta = "Puedes comunicarte con nosotros desde la sección Contáctanos.";
    } else if (textoMinuscula.includes("buzón") || textoMinuscula.includes("buzon")) {
        textoRespuesta = "Puedes enviar comentarios o reportes desde la sección Buzón.";
    } else if (textoMinuscula.includes("ayuda")) {
        textoRespuesta = "Puedes revisar preguntas frecuentes desde la sección Ayuda.";
    }

    respuesta.innerHTML = "<strong>Soporte TecnoDesk:</strong><p>" + textoRespuesta + "</p>";
    contenedor.appendChild(respuesta);

    input.value = "";
    contenedor.scrollTop = contenedor.scrollHeight;

    return false;
}