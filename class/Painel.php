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

        public static function insert($param) {
            $certo = true;
            $nome_tabela = $param['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach ($param as $key => $value) {
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

        public static function update($arr) {
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach ($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if ($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id') {
                    continue;
                }
                if ($value == '') {
                    $certo = false;
                    break;
                }
                if ($first == false) {
                    $first = true;
                    $query.="$nome=?";
                } else {
                    $query.=",$nome=?";
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

        public static function generateSlug($str){
            $str = mb_strtolower($str);
            $str = preg_replace('/(â|á|ã)/', 'a', $str);
            $str = preg_replace('/(ê|é)/', 'e', $str);
            $str = preg_replace('/(í|Í)/', 'i', $str);
            $str = preg_replace('/(ú)/', 'u', $str);
            $str = preg_replace('/(ó|ô|õ|Ô)/', 'o', $str);
            $str = preg_replace('/(_|\/|!|\?|#)/', '', $str);
            $str = preg_replace('/( )/', '-', $str);
            $str = preg_replace('/ç/', 'c', $str);
            $str = preg_replace('/(-[-]{1,})/', '-', $str);
            $str = preg_replace('/(,)/', '-', $str);
            $str = strtolower($str);
            return $str;
        }

        public static function verificaSlug($nome, $id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id <> ?");
            $sql->execute($nome, $id);
            return $sql->fetch();
        }
    }