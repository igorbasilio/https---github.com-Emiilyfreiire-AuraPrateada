<?php

abstract class Conexao
{
    public static function getInstance()
    {
        $dsn = 'mysql:host=localhost;dbname=auraPrateada';
        $user = 'root'; // ajuste aqui se necessário
        $pass = '';     // ajuste aqui se necessário
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return null; // Adicione esta linha para evitar o erro no prepare()
        }
    }
}
