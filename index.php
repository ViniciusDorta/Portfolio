<?php
include('./config/config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Desenvolvimento Web, Backend, Frontend, DankiCode">
    <meta name="description" content="Website desenvolvido com base nas aulas do CEO DankiCode Guilherme, curso Desenvolvimento Web Completo. ">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>Portfolio</title>
</head>

<body>

    <?php
    // Verifica se a url existe, se não redireciona para o home.
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    switch ($url) {
        case 'especialidades':
            echo '<target target="especialidades" />';
            break;
        case 'extras':
            echo '<target target="extras" />';
            break;
    }

    ?>

    <div class="sucesso">
        <p>Mensagem enviada com sucesso!</p>
    </div>
    <div class="overlay-loading">
        <img src="/image/loader.gif">
    </div><!--overlay-loading-->

    <header>
        <div class="center">
            <div class="logo left"><a href="/">Dev
                    < Vinicius />
                </a>
            </div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Especialidades</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>extras">Extras</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <!--desktop-->
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>extras">Extras</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <!--mobile-->
            <div class="clear"></div>
        </div>
        <!--center-->
    </header>

    <div class="container-principal">
        <?php
        // Caso url exista carrega a pagina, se não redirecionar para pagina 404.
        if (file_exists('pages/' . $url . '.php')) {
            include('pages/' . $url . '.php');
        } else {
            if ($url != 'especialidades' && $url != 'extras' && $url != 'login') {
                //Podemos fazer o que quiser, pois a página não existe.
                include('pages/404.php');
            } else {
                include('pages/home.php');
            }
        }
        ?>
    </div>
    <!--container-principal-->

    <footer>
        <div class="center">
            <div class="container-footer">
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>login.php"><p>© Todos os direitos reservados</p></a>
            </div>
        </div>
        <!--center-->
    </footer>

    <script src="js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/ccff9e51ab.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/animacao.js"></script>
    <script src="js/envio-email.js"></script>
    <script src="js/slider.js"></script>

</body>

</html>