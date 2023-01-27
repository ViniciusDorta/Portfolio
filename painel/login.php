<?php
    include('../config/config.php');
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
<body>
    
    <div class="box-login">
        <h2>Login de acesso ao Painel</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail..." required />
            <input type="password" name="password" placeholder="Senha..." required />
            <div class="btn-login">
                <input type="submit" name="acao" value="Entrar">
                <a href="<?php echo INCLUDE_PATH; ?>">Home</a>
            </div>
        </form>
    </div><!--box-login-->

    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>

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
            header('Location: '.INCLUDE_PATH_PAINEL.'index.php');
            die();
        } else {
            echo '<div class="erro-box"><i class="fa-solid fa-xmark"></i></i>Usuário ou senha incorretos<i class="fa-solid fa-exclamation"></i></div>';
        }
    }
        