<?php

    class Usuario
    {

        public function updateUser($nome, $password, $img)
        {
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.users` SET `nome` = ?, `password` = ?, `img` = ? WHERE `user` = ?");
            if ($sql->execute(array($nome, $password, $img, $_SESSION['user']))) {
                return true;
            } else {
                return false;
            }
        }

        public static function existsUser($email)
        {
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.users` WHERE `user` = ?");
            $sql->execute(array($email));
            if ($sql->rowCount() != 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function insertUser($email, $password, $img, $nome, $cargo)
        {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.users` VALUES (null, ?, ?, ?, ?, ?)");
            $sql->execute(array($email, $password, $img, $nome, $cargo));
        }

    }