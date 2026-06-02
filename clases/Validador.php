<?php

class Validador {

    public static function obligatorio($valor) {
        return trim($valor) !== "";
    }

    public static function correo($correo) {
        return filter_var($correo, FILTER_VALIDATE_EMAIL);
    }

    public static function password($password) {
        return strlen($password) >= 8;
    }

    public static function captcha($respuesta) {
        return trim($respuesta) === "7";
    }

    public static function limpiar($valor) {
        return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
    }
}