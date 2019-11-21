<?php

class Conexao {

    private static $instence;

    //Verifica se já existe uma instancia da conexao
    public static function getConn() {
        if(!isset(self::$instence)):
            $username = "root";
            $password = "";
            try {
                self::$instence = new PDO('mysql:host=localhost;dbname=simulador', $username, $password);
                self::$instence->exec("set names utf8");
            } catch(PDOException $e) {
                echo 'ERRO: '.$e->getMessage();
            }
        endif;

        return self::$instence;
    }
}

?>