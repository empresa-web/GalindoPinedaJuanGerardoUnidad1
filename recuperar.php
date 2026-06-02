<?php
session_start();

require_once 'config/database.php';
require_once 'clases/Validador.php';

$db = new Database();
$conn = $db->conectar();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = Validador::limpiar($_POST["correo"]);
    $captcha = $_POST["captcha"];

    if (!Validador::obligatorio($correo)) {
        $mensaje = "El correo es obligatorio.";
    } elseif (!Validador::correo($correo)) {
        $mensaje = "El correo electrónico no es válido.";
    } elseif (!Validador::captcha($captcha)) {
        $mensaje = "Verificación humana incorrecta.";
    } else {
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$correo]);

        if ($stmt->rowCount() == 1) {
            $mensaje = "Se ha simulado el envío de un enlace de recuperación al correo: " . $correo;
        } else {
            $mensaje = "No se encontró ningún usuario con ese correo.";
        }
    }
}

include 'includes/header.php';
?>

<main class="contenido">
    <section class="formulario">
        <h2>Recuperación de contraseña</h2>

        <?php if ($mensaje != ""): ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="correo" placeholder="Ingresa tu correo electrónico" required>

            <label>Verificación humana: ¿Cuánto es 3 + 4?</label>
            <input type="text" name="captcha" placeholder="Respuesta" required>

            <button type="submit">Recuperar contraseña</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>