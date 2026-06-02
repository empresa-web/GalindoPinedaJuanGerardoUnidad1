<?php
session_start();

require_once 'config/database.php';
require_once 'clases/Usuario.php';
require_once 'clases/Validador.php';

$db = new Database();
$conn = $db->conectar();
$usuario = new Usuario($conn);

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = Validador::limpiar($_POST["nombre"]);
    $correo = Validador::limpiar($_POST["correo"]);
    $password = $_POST["password"];
    $captcha = $_POST["captcha"];

    if (!Validador::obligatorio($nombre) || !Validador::obligatorio($correo) || !Validador::obligatorio($password)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!Validador::correo($correo)) {
        $mensaje = "El correo electrónico no es válido.";
    } elseif (!Validador::password($password)) {
        $mensaje = "La contraseña debe tener mínimo 8 caracteres.";
    } elseif (!Validador::captcha($captcha)) {
        $mensaje = "Verificación humana incorrecta.";
    } else {
        $mensaje = $usuario->registrar($nombre, $correo, $password);
    }
}

include 'includes/header.php';
?>

<main class="contenido">
    <section class="formulario">
        <h2>Registro de usuario</h2>

        <?php if ($mensaje != ""): ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form method="POST" onsubmit="return validarRegistro();">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required>

            <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>

            <input type="password" name="password" id="password" placeholder="Contraseña" required minlength="8">

            <label>Verificación humana: ¿Cuánto es 3 + 4?</label>
            <input type="text" name="captcha" id="captcha" placeholder="Respuesta" required>

            <button type="submit">Registrarse</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>