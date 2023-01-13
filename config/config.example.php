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

    // salva sua conexão com o banco de dados nas contantes
    define('HOST', 'hostDB');
    define('NAME', 'nameDB');
    define('USER', 'userDB');
    define('PASSWORD', 'passwordDB');
?>

