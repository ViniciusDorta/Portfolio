<?php

    class Painel
    {

        public static function logado() 
        {
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout() 
        {
            setcookie('lembrar', true, time()-1,'/');
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

        public static function alert($type, $message)
        {
            if ($type == 'sucesso') {
                echo '<div class="box-alert sucesso"><i class="fa-solid fa-check"></i> ' . $message . '</div>';
            } else if ($type == 'erro') {
                echo '<div class="box-alert erro"><i class="fa-solid fa-xmark"></i> ' . $message . '</div>';
            }
        }

        public static function imgValid($image)
        {
            if (($image['type'] == 'image/jpeg') || ($image['type'] == 'image/jpg') || ($image['type'] == 'image/png')) {
                $tamanho = intval($image['size']/1024);
                if ($tamanho < 300) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function uploadFile($file)
        {
            $formatoArquivo = explode('.', $file['name']);
            $imgNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) -1];
            if (move_uploaded_file($file['tmp_name'], '../painel/uploads/' . $imgNome)) {
                return $imgNome;
            } else {
                return false;
            }
        }

        public static function deleteFile($file)
        {
            @unlink('uploads/' . $file);
        }

        public static function insert($projeto) {
            $certo = true;
            $nome_tabela = $projeto['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach ($projeto as $key => $value) {
                $nome = $key;
                $valor = $value;
                if ($nome == 'acao' || $nome == 'nome_tabela') {
                    continue;
                }
                if ($value == '') {
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }
            $query.=")";
            if ($certo == true) {
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }

            return $certo;
        }

        public static function selectAll($tabela)
        {
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function deletar($tabela, $id=false) 
        {
            if ($id == false) {
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            } else {
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = `$id`");
            }
            $sql->execute();
        }

        public static function redirect($url)
        {
            echo '<script>location.href="'.$url.'"</script>';
            die();
        }

        public static function select($table, $query, $arr) 
        {
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($arr);
            return $sql->fetch();
        }

        public static function update($projeto) {
            $certo = true;
            $first = false;
            $nome_tabela = $projeto['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";

            foreach ($projeto as $key => $value) {
                $nome = $key;
                $valor = $value;

                if ($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id') {
                    continue;
                }

                if ($value == '') {
                    $certo = false;
                    break;
                }

                $query.="$nome=?";

                if ($first == false) {
                    $first = true;
                    $query.="$nome=?";
                } else {
                    $query.="$nome=?";
                }
            
                $parametros[] = $value;
            }

            if ($certo == true) {
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query.' WHERE id=?');
                $sql->execute($parametros);
            }

            return $certo;
        }
    }