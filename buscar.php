<?php include 'includes/header.php'; ?>

<main class="contenido">
    <section class="seccion">
        <h2>Resultados de búsqueda</h2>

        <?php
        $paginas = [
            [
                "titulo" => "Inicio",
                "descripcion" => "Página principal de TecnoDesk.",
                "url" => "index.php",
                "palabras" => "inicio tecnodesk soporte tecnico pagina principal"
            ],
            [
                "titulo" => "Servicios",
                "descripcion" => "Servicios de soporte técnico, instalación de software y mantenimiento.",
                "url" => "servicios.php",
                "palabras" => "servicios soporte tecnico software mantenimiento"
            ],
            [
                "titulo" => "Ayuda",
                "descripcion" => "Centro de ayuda con preguntas frecuentes.",
                "url" => "ayuda.php",
                "palabras" => "ayuda preguntas frecuentes registro login contraseña"
            ],
            [
                "titulo" => "Contáctanos",
                "descripcion" => "Formulario para contactar al equipo de TecnoDesk.",
                "url" => "contacto.php",
                "palabras" => "contacto contáctanos mensaje soporte"
            ],
            [
                "titulo" => "Buzón",
                "descripcion" => "Espacio para enviar comentarios o reportes.",
                "url" => "buzon.php",
                "palabras" => "buzon comentarios reportes mensajes"
            ],
            [
                "titulo" => "Chat",
                "descripcion" => "Chat de atención al usuario.",
                "url" => "soporte.php",
                "palabras" => "chat atencion usuario soporte"
            ],
            [
                "titulo" => "Mapa del sitio",
                "descripcion" => "Estructura general de las páginas del sitio web.",
                "url" => "mapa-sitio.php",
                "palabras" => "mapa sitio secciones principales secundarias"
            ],
            [
                "titulo" => "Registro",
                "descripcion" => "Formulario para crear una cuenta de usuario.",
                "url" => "registro.php",
                "palabras" => "registro usuario cuenta formulario"
            ],
            [
                "titulo" => "Inicio de sesión",
                "descripcion" => "Acceso de usuarios registrados.",
                "url" => "login.php",
                "palabras" => "login inicio sesion usuario contraseña"
            ],
            [
                "titulo" => "Recuperación de contraseña",
                "descripcion" => "Formulario para recuperar contraseña.",
                "url" => "recuperar.php",
                "palabras" => "recuperar contraseña correo"
            ]
        ];

        $busqueda = "";

        if (isset($_GET["q"])) {
            $busqueda = strtolower(trim($_GET["q"]));
        }

        if ($busqueda == "") {
            echo "<p>No escribiste ningún término de búsqueda.</p>";
        } else {
            echo "<p>Resultados para: <strong>" . htmlspecialchars($busqueda) . "</strong></p>";

            $resultados = 0;

            foreach ($paginas as $pagina) {
                $contenido = strtolower($pagina["titulo"] . " " . $pagina["descripcion"] . " " . $pagina["palabras"]);

                if (strpos($contenido, $busqueda) !== false) {
                    echo "<div class='resultado'>";
                    echo "<h3>" . $pagina["titulo"] . "</h3>";
                    echo "<p>" . $pagina["descripcion"] . "</p>";
                    echo "<a class='btn' href='" . $pagina["url"] . "'>Abrir página</a>";
                    echo "</div>";

                    $resultados++;
                }
            }

            if ($resultados == 0) {
                echo "<p>No se encontraron resultados relacionados con tu búsqueda.</p>";
            }
        }
        ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>