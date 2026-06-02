<?php include 'includes/header.php'; ?>

<main class="contenido">
    <section class="seccion">
        <h2>Chat de soporte</h2>
        <p>
            Este espacio simula una conversación inicial con el área de soporte. Puedes escribir
            dudas relacionadas con registro, contraseña, servicios o contacto.
        </p>

        <div class="chat-contenedor" id="chatContenedor">
            <div class="mensaje-chat soporte">
                <strong>Soporte TecnoDesk:</strong>
                <p>Hola, bienvenido a TecnoDesk. ¿En qué podemos ayudarte?</p>
            </div>
        </div>

        <form class="chat-formulario" onsubmit="return enviarMensajeChat();">
            <input type="text" id="mensajeChat" placeholder="Escribe tu mensaje..." required>
            <button type="submit"><i class="bi bi-send"></i> Enviar</button>
        </form>
    </section>

    <section class="tarjetas">
        <article class="tarjeta">
            <h3>Temas sugeridos</h3>
            <p>
                Puedes preguntar sobre registro, recuperación de contraseña, servicios disponibles
                o formas de contacto.
            </p>
        </article>

        <article class="tarjeta">
            <h3>Respuesta inmediata</h3>
            <p>
                El chat muestra respuestas automáticas básicas para orientar al usuario dentro
                del sitio.
            </p>
        </article>
    </section>
</main>

<?php include 'includes/footer.php'; ?>