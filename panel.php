<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
include 'includes/header.php';
?>

<main class="contenido">
    <section class="seccion">
        <h2>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?></h2>
        <p>Has iniciado sesión correctamente en TecnoDesk.</p>
        <a href="logout.php" class="btn">Cerrar sesión</a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>