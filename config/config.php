<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    $autoload = function ($class) {
        if ($class == 'Email') {
            include('../vendor/autoload.php');
        }
        include('../class/' . $class . '.php');
    };
    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://primeiroprojetobackend.test/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

