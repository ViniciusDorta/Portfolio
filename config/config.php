<?php

$autoload = function ($class) {
    if ($class == 'Email') {
        include('../vendor/autoload.php');
    }
    include('../class/' . $class . '.php');
};
spl_autoload_register($autoload);

define('INCLUDE_PATH', 'http://primeiroprojetobackend.test/');
