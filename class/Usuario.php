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
            
        }

    }