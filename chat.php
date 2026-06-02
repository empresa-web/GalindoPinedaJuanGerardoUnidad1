<?php include 'includes/header.php'; ?>

<main class="contenido">
    <section class="seccion">
        <h2>Chat de soporte</h2>
        <p>
            Este chat permite simular una conversación entre el usuario y el equipo de soporte de TecnoDesk.
        </p>

        <div class="chat-contenedor" id="chatContenedor">
            <div class="mensaje-chat soporte">
                <strong>Soporte TecnoDesk:</strong>
                <p>Hola, bienvenido a TecnoDesk. ¿En qué podemos ayudarte?</p>
            </div>
        </div>

        <form class="chat-formulario" onsubmit="return enviarMensajeChat();">
            <input type="text" id="mensajeChat" placeholder="Escribe tu mensaje..." required>
            <button type="submit">Enviar</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>