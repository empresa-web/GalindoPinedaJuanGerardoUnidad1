<?php
class Database {
    private $host = "sql302.infinityfree.com"; // ej: sqlXXX.infinityfree.com
    private $db   = "if0_42081898_tecnodesk";     // ej: if0_XXXX_tecnodesk
    private $user = "if0_42081898";         // ej: if0_XXXX
    private $pass = "9bLtecKw0YE";      // la que configures
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