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
                <a <?php selecionadoMenu('home'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>home"><?php echo $cargo = Cargo::pegaCargo($_SESSION['cargo']); ?></a>
            </div>
        </div>

        <div class="items-menu">
            <h2>Cadastro</h2>
            <a <?php selecionadoMenu('cadastrar-projetos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-projetos">Cadastrar Projetos</a>
            <a <?php selecionadoMenu('cadastrar-servicos'); ?> href="">Cadastrar Serviços</a>
            <a <?php selecionadoMenu('cadastrar-slides'); ?> href="">Cadastrar Slides</a>
        
            <h2>Gestão</h2>
            <a <?php selecionadoMenu('listar-depoimentos'); ?> href="">Listar Depoimentos</a>
            <a <?php selecionadoMenu('listar-servicos'); ?> href="">Listar Serviços</a>
            <a <?php selecionadoMenu('listar-slides'); ?> href="">Listar Slides</a>
        
            <h2>Administração do Painel</h2>
            <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
            <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>

            <h2>Configuração Geral</h2>
            <a <?php selecionadoMenu('config-editar'); ?> href="">Editar</a>
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
    <script src="./js/jquery.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
</body>
</html>