<?php include 'includes/header.php'; ?>

<main class="contenido">
    <section class="formulario">
        <h2>Contáctanos</h2>
        <p>Si tienes dudas o problemas, completa el formulario y el equipo de TecnoDesk revisará tu mensaje.</p>

        <form action="buzon.php" method="POST" onsubmit="return validarContacto();">
            <input type="text" name="nombre" id="nombreContacto" placeholder="Nombre completo" required>

            <input type="email" name="correo" id="correoContacto" placeholder="Correo electrónico" required>

            <input type="text" name="asunto" id="asuntoContacto" placeholder="Asunto" required>

            <textarea name="mensaje" id="mensajeContacto" placeholder="Escribe tu mensaje..." required></textarea>

            <label>Verificación humana: ¿Cuánto es 3 + 4?</label>
            <input type="text" name="captcha" id="captchaContacto" placeholder="Respuesta" required>

            <button type="submit">Enviar mensaje</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>