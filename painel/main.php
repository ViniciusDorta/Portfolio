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
            <a <?php selecionadoMenu('home'); ?> style="text-align: center;" href="<?php echo INCLUDE_PATH_PAINEL ?>home" ><i class="fa-solid fa-house"></i> Painel de controle</a>
            <h2><i class="fa-solid fa-folder-plus"></i> Cadastros</h2>
            <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar slides</a>
            <a <?php selecionadoMenu('cadastrar-projetos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-projetos">Cadastrar projetos</a>
            <a <?php selecionadoMenu('cadastrar-extras'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-extras">Cadastrar extras</a>
            <a <?php selecionadoMenu('cadastrar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar categorias</a>
            <a <?php selecionadoMenu('cadastrar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticias">Cadastrar notícias</a>
        
            <h2><i class="fa-solid fa-user-gear"></i> Gestão</h2>
            <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar slides</a>
            <a <?php selecionadoMenu('listar-projetos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-projetos">Listar projetos</a>
            <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-extras">Listar extras</a>
            <a <?php selecionadoMenu('listar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias">Listar categorias</a>
            <!-- <a <?php selecionadoMenu('listar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-noticias">Listar notícias</a> -->

            <h2><i class="fa-solid fa-gears"></i> Configuração geral</h2>
            <a <?php selecionadoMenu('cadastrar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-usuario">Cadastrar usuário</a>
            <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario" >Editar conta</a>
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