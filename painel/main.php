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
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <title>Painel Portfolio</title>

</head>
<body>

<div class="menu">
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
</div>

<header>
    <div class="center">
        <div class="btn-menu">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="logout">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
</header>

<div class="clear"></div>
    

    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
</body>
</html>