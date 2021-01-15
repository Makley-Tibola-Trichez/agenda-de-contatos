<?php

class Database {


    // informações sobre o DB
    private static $dbNome = 'crud_contatos';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';

    private static $cont = null;

    public function __construct() {
        die('a função Init não é permitido!');
    }

    public static function conectar() {
        if (self::$cont == null) {
            try {
                self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar() {
        self::$cont = null;
    }
}

?>