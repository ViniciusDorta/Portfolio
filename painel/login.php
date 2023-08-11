<?php
    include('../config/config.php');

    if (isset($_COOKIE['lembrar'])) {
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ? ");
        $sql->execute(array($user,$password));
        if ($sql->rowCount() == 1) {
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['img'] = $info['img'];
            header('Location: '.INCLUDE_PATH_PAINEL.'home');
            die();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Desenvolvimento Web, Backend, Frontend, DankiCode">
    <meta name="description" content="Website desenvolvido com base nas aulas do CEO DankiCode Guilherme, curso Desenvolvimento Web Completo. ">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <title>Backend Portfolio</title>
</head>
<body style="background-image: url('./image/fundo.jpg');">
    
    <div class="box-login">
        <h2>Login de acesso ao Painel</h2>
        <form method="POST">
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="E-mail..." required />
            <label>Senha:</label>
            <input type="password" name="password" placeholder="Senha..." required />
            <div class="form-group-login left">
                <input type="checkbox" name="lembrar">
                <label for="">Lembrar-me</label>
            </div>
            <div class="clear"></div>
            <div class="btn-login">
                <a href="<?php echo INCLUDE_PATH; ?>">Voltar</a>
                <input type="submit" name="acao" value="Entrar">
            </div>
        </form>
    </div><!--box-login-->

    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php
    if (isset($_POST['acao'])) {
        $user = $_POST['email'];
        $password = $_POST['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ? ");
        $sql->execute(array($user,$password));
        if ($sql->rowCount() == 1) {
            $info = $sql->fetch();

            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['img'] = $info['img'];
            if (isset($_POST['lembrar'])) {
                setcookie('lembrar', true, time()+(60*60*60),'/');
                setcookie('user', $user, time()+(60*60*60),'/');
                setcookie('password', $password, time()+(60*60*60),'/');
            }
            header('Location: '.INCLUDE_PATH_PAINEL.'home');
            die();
        } else {
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Usuário ou senha incorretos!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        }
    }
        