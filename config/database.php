<?php
class Database {
    private $host = "NOMBRE_SERVIDOR"; // ej: sqlXXX.infinityfree.com
    private $db   = "NOMBRE_BASE";     // ej: if0_XXXX_tecnodesk
    private $user = "USUARIO";         // ej: if0_XXXX
    private $pass = "CONTRASEÑA";      // la que configures
    private $conn;

    public function conectar() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}