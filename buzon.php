<?php
session_start();

require_once 'config/database.php';
require_once 'clases/Mensaje.php';
require_once 'clases/Validador.php';

$db = new Database();
$conn = $db->conectar();
$objMensaje = new Mensaje($conn);

$nombre = "";
$correo = "";
$asunto = "";
$mensaje = "";
$captcha = "";
$respuesta = "";
$datosValidos = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = Validador::limpiar($_POST["nombre"]);
    $correo = Validador::limpiar($_POST["correo"]);
    $asunto = Validador::limpiar($_POST["asunto"]);
    $mensaje = Validador::limpiar($_POST["mensaje"]);
    $captcha = $_POST["captcha"];

    if (
        !Validador::obligatorio($nombre) ||
        !Validador::obligatorio($correo) ||
        !Validador::obligatorio($asunto) ||
        !Validador::obligatorio($mensaje)
    ) {
        $respuesta = "Todos los campos son obligatorios.";
    } elseif (!Validador::correo($correo)) {
        $respuesta = "El correo electrónico no es válido.";
    } elseif (!Validador::captcha($captcha)) {
        $respuesta = "Verificación humana incorrecta.";
    } else {
        $respuesta = $objMensaje->guardar($nombre, $correo, $asunto, $mensaje);
        $datosValidos = true;
    }
}

include 'includes/header.php';
?>

<main class="contenido">
    <section class="seccion">
        <h2>Buzón de mensajes</h2>

        <?php if ($respuesta != ""): ?>
            <p class="mensaje"><?php echo $respuesta; ?></p>
        <?php else: ?>
            <p>En esta sección se reciben los mensajes enviados desde el formulario de contacto.</p>
            <a href="contacto.php" class="btn">Enviar mensaje</a>
        <?php endif; ?>

        <?php if ($datosValidos): ?>
            <div class="resultado">
                <h3>Resumen del mensaje enviado</h3>
                <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                <p><strong>Correo:</strong> <?php echo $correo; ?></p>
                <p><strong>Asunto:</strong> <?php echo $asunto; ?></p>
                <p><strong>Mensaje:</strong> <?php echo $mensaje; ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>