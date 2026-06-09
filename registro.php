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
    $captcha = trim($_POST["captcha"]);

    if (
        !Validador::obligatorio($nombre) ||
        !Validador::obligatorio($correo) ||
        !Validador::obligatorio($password) ||
        !Validador::obligatorio($captcha)
    ) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!Validador::correo($correo)) {
        $mensaje = "El correo electrónico no es válido.";
    } elseif (!Validador::password($password)) {
        $mensaje = "La contraseña debe tener mínimo 8 caracteres.";
    } elseif (!isset($_SESSION['captcha_registro'])) {
        $mensaje = "No se pudo validar la verificación humana. Intenta nuevamente.";
    } elseif ((int)$captcha !== (int)$_SESSION['captcha_registro']) {
        $mensaje = "Verificación humana incorrecta.";
    } else {
        $mensaje = $usuario->registrar($nombre, $correo, $password);
        unset($_SESSION['captcha_registro']);
    }
}

$numero1 = rand(1, 10);
$numero2 = rand(1, 10);
$_SESSION['captcha_registro'] = $numero1 + $numero2;

include 'includes/header.php';
?>

<main class="contenido">
    <section class="seccion">
        <h2><i class="bi bi-person-plus"></i> Crear cuenta</h2>
        <p>
            Regístrate para acceder al panel de TecnoDesk. Tus datos serán validados antes de
            crear la cuenta.
        </p>
    </section>

    <section class="formulario">
        <h2>Registro de usuario</h2>

        <?php if ($mensaje != ""): ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form method="POST" onsubmit="return validarRegistro();">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required>

            <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>

            <input type="password" name="password" id="password" placeholder="Contraseña" required minlength="8">

            <label>
                Verificación humana: ¿Cuánto es <?php echo $numero1; ?> + <?php echo $numero2; ?>?
            </label>
            <input type="number" name="captcha" id="captcha" placeholder="Respuesta" required>

            <button type="submit">Crear cuenta</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </section>

    <section class="tarjetas">
        <article class="tarjeta">
            <h3>Contraseña segura</h3>
            <p>
                El sistema guarda la contraseña cifrada mediante funciones de seguridad de PHP.
            </p>
        </article>

        <article class="tarjeta">
            <h3>Validación doble</h3>
            <p>
                Los datos se revisan en el navegador y también en el servidor antes de almacenarse.
            </p>
        </article>
    </section>
</main>

<?php include 'includes/footer.php'; ?>