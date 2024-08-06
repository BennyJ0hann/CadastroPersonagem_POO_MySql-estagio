<?php

class Conexao {
    public static $instance;

    private function __construct() {
        // Construtor privado para impedir instância direta.
    }

    public static function getConexao() {
            self::$instance = new PDO(
                'mysql:host=localhost;dbname=db_SystemCharacters', 
                'root', 
                'fV?L_`Uq!722£hp*MQ<~~~cP', 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            return self::$instance;

        }

    
    }
