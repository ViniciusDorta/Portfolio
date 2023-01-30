<?php
    session_start();

    // Tratando data e hora para salvar no banco.
    date_default_timezone_set('America/Sao_Paulo');

    // Caso a classe seja Email chama o autoload.
    $autoload = function ($class) {
        if ($class == 'Email') {
            include('../vendor/autoload.php');
        }
        include('../class/' . $class . '.php');
    };
    spl_autoload_register($autoload);

    // Rotas definidas para incluir classes.
    define('INCLUDE_PATH', 'http://primeiroprojetobackend.test/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

    // Função para estilizar o menu que foi selecionado.
    function selecionadoMenu($param)
    {
        $url = explode('/', @$_GET['url'])[0];
        if ($url == $param) {
            echo 'class=menu-active';
        }
    }

    function verificaPermissaoMenu($permissao)
    {
        if($_SESSION['cargo'] == $permissao){
            return;
        } else {
            echo 'style="display: none;"';
        }
    }

    function verificaPermissaoPagina($permissao)
    {
        if($_SESSION['cargo'] == $permissao){
            return;
        } else {
            include('pages/permissao-negada.php');
            die();
        }
    }

