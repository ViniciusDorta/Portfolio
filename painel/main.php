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
            <h2>Cadastro</h2>
            <a href="">Cadastrar Depoimento</a>
            <a href="">Cadastrar Serviço</a>
            <a href="">Cadastrar Slides</a>
            <h2>Gestão</h2>
            <a href="">Listar Depoimentos</a>
            <a href="">Listar Serviços</a>
            <a href="">Listar Slides</a>
            <h2>Administração do Painel</h2>
            <a href="">Edição Usuário</a>
            <a href="">Adicionar Usuário</a>
            <h2>Configuração Geral</h2>
            <a href="">Editar</a>
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
    <div class="box-content left w100">
        <h2><i class="fa-solid fa-house-chimney"></i> Painel de Controle - VineServer</h2>

        <div class="box-metricas">
            <div class="box-metricas-single">
                <div class="box-metricas-wraper">
                    <h2>Usuários Online</h2>
                    <p><i class="fa-solid fa-user"></i> ?</p>
                </div>
            </div>
            <div class="box-metricas-single">
                <div class="box-metricas-wraper">
                    <h2>Total de Visitas</h2>
                    <p><i class="fa-solid fa-users"></i> ?</p>
                </div>
            </div>
            <div class="box-metricas-single">
                <div class="box-metricas-wraper">
                    <h2>Visitas Hoje</h2>
                    <p><i class="fa-solid fa-users-line"></i> ?</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <!-- <div class="box-content left w50"> 
    </div>

    <div class="box-content right w50">
    </div> -->

    <div class="clear"></div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
</body>
</html>