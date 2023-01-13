<?php

    class MySql 
    {
        private static $PDO;

        public static function conectar() 
        {
            if (self::$PDO == null) 
            {
                try 
                {
                    self::$PDO = new PDO('mysql:host='.HOST.';dbname='.NOME, USER, PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) 
                {
                    echo '<h1>Erro ao conectar ao banco de dados!</h1>';
                }
            }

            return self::$PDO;
        }

    }