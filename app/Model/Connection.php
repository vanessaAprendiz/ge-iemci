<?php
//PÁGINA PARA CONEXÃO COM BANCO DE DADOS

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (self::$conn == null) {
            self::$conn = new PDO('mysql: host=localhost; dbname=ge-iemci;', 'root', '');
        }
        return self::$conn;
    }
}
