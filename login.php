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
    $correo = Validador::limpiar($_POST["correo"]);
    $password = $_POST["password"];

    if (!Validador::obligatorio($correo) || !Validador::obligatorio($password)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!Validador::correo($correo)) {
        $mensaje = "El correo electrónico no es válido.";
    } elseif ($usuario->login($correo, $password)) {
        header("Location: panel.php");
        exit;
    } else {
        $mensaje = "Correo o contraseña incorrectos.";
    }
}

include 'includes/header.php';
?>

<main class="contenido">
    <section class="seccion">
        <h2>Inicio de sesión</h2>
        <p>
            Accede con tu correo y contraseña para entrar al panel de usuario de TecnoDesk.
        </p>
    </section>

    <section class="formulario">
        <h2>Acceso de usuario</h2>

        <?php if ($mensaje != ""): ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required>

            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit"><i class="bi bi-box-arrow-in-right"></i> Ingresar</button>
        </form>

        <p><a href="recuperar.php">¿Olvidaste tu contraseña?</a></p>
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </section>

    <section class="tarjetas">
        <article class="tarjeta">
            <h3>Acceso protegido</h3>
            <p>
                El sistema verifica la contraseña cifrada antes de permitir el acceso al panel.
            </p>
        </article>

        <article class="tarjeta">
            <h3>Sesión de usuario</h3>
            <p>
                Al iniciar sesión correctamente, se crea una sesión para mantener el acceso activo.
            </p>
        </article>
    </section>
</main>

<?php include 'includes/footer.php'; ?>