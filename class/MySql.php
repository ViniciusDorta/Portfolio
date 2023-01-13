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
                    echo '<div class="erro-box">Erro ao conectar ao banco de dados!</div>';
                }
            }

            return self::$PDO;
        }

    }