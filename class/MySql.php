<?php

    require __DIR__ . '/../vendor/autoload.php';
    Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

    class MySql 
    {
        private static $PDO;

        public static function conectar() 
        {
            if (self::$PDO == null) 
            {
                try 
                {
                    self::$PDO = new PDO('mysql:host='.getenv('HOST_DB').';dbname='.getenv('NOME_DB'), getenv('USER_DB'), getenv('PASSWORD_DB'),array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) 
                {
                    echo '<div class="erro-box">Erro ao conectar ao banco de dados!</div>';
                }
            }

            return self::$PDO;
        }

    }