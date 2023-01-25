<?php
    if(isset($_GET['logout']))
    {
        Painel::logout();
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

    <title>Painel Portfolio</title>

</head>
<body>

<div class="menu">
    <div class="menu-wraper">
        <div class="box-usuario">
            <?php if ($_SESSION['img'] == '') : ?>
                <div class="avatar-usuario">
                    <i class="fa-solid fa-user"></i>
                </div>
            <?php else : ?>
                <div class="image-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
                </div>
            <?php endif ; ?>
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo $cargo = Cargo::pegaCargo($_SESSION['cargo']); ?></p>
            </div>
        </div>

        <div class="items-menu">
            <select name="menu-cad" id="menu_cad">
                <option selected disabled hidden>Cadastro</option>
                <div class="options-custom"><option value=""><a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimentos">Cadastrar Depoimento</a></option></div>
                <option value=""><div class="options-custom"><a href="">Cadastrar Serviço</a></div></option>
                <option value=""><div class="options-custom"><a href="">Cadastrar Slides</a></div></option>
            </select>
            <hr>
            <select name="menu-listar" id="menu_listar">
                <option selected disabled hidden>Gestão</option>
                <option value=""><a href="">Listar Depoimentos</a></option>
                <option value=""><a href="">Listar Serviços</a></option>
                <option value=""><a href="">Listar Slides</a></option>
            </select>
            <hr>
            <select name="menu-admin" id="menu_admin">
                <option selected disabled hidden>Administração do Painel</option>
                <option value=""><a href="">Edição Usuário</a></option>
                <option value=""><a href="">Adicionar Usuário</a></option>
            </select>
            <hr>
            <select name="menu-config" id="menu_config">
                <option selected disabled hidden>Configuração Geral</option>
                <option value=""><a href="">Editar</a></option>
            </select>
        </div>
    </div>
</div>

<header>
    <div class="center">
        <div class="btn-menu">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="logout">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        <div class="clear"></div>
    </div>
</header>

<div class="content">
    
    <?php Painel::loadPage(); ?>

</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
</body>
</html>