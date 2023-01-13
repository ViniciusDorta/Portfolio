<?php
    session_start();

    $autoload = function ($class) {
        if ($class == 'Email') {
            include('../vendor/autoload.php');
        }
        include('../class/' . $class . '.php');
    };
    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://primeiroprojetobackend.test/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

    define('HOST', 'localhost');
    define('NOME', 'vineserver');
    define('USER', 'root');
    define('PASSWORD', 'NDorta300499');
?>

