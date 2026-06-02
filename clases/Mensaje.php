<?php

class Mensaje {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function guardar($nombre, $correo, $asunto, $mensaje) {
        $sql = "INSERT INTO mensajes (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$nombre, $correo, $asunto, $mensaje])) {
            return "Mensaje enviado correctamente al buzón.";
        }

        return "No se pudo enviar el mensaje.";
    }
}