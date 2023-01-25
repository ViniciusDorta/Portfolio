<?php

    class Painel
    {

        public static function logado() 
        {
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() 
        {
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL.'login.php');
        }

        public static function loadPage()
        {
            if (isset($_GET['url'])) {
                $url = explode('/', $_GET['url']);
                if (file_exists('pages/'.$url[0].'.php')) {
                    include('pages/'.$url[0].'.php');
                } else {
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            } else {
                include('pages/home.php');
            }
        }

        public static function listUserOnline()
        {
            self::cleanUserOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function cleanUserOnline()
        {
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 10 MINUTE");
        }

        public static function totalAccess()
        {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function accessToDay()
        {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE `dia` = ?");
            $sql->execute(array(date('Y-m-d')));
            return $sql->fetchAll();
        }

    }