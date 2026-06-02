<?php
class Usuario {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    // Registrar usuario
    public function registrar($nombre, $correo, $password) {
        // Verifica si el correo ya existe
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$correo]);
        if ($stmt->rowCount() > 0) {
            return "El correo ya está registrado.";
        }

        // Cifra la contraseña
        $passwordSeguro = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$nombre, $correo, $passwordSeguro])) {
            return "Usuario registrado correctamente.";
        }
        return "Error al registrar usuario.";
    }

    // Login de usuario
    public function login($correo, $password) {
        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$correo]);
        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $usuario['password'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                return true;
            }
        }
        return false;
    }
}