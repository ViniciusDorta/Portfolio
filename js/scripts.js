$(document).load("includes/ajax-usuario-online.php").load("includes/ajax-contador-visitas.php");

$(document).ready(function () {
    var htmlProjeto = '';
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'includes/ajax-listar-projetos.php',
        async: false,
        success: function (response) {
            $.each(response, function (e, data) {
                htmlProjeto += `<p class="nome-projeto">${data.nome}</p>
                <p class="descricao-projeto">${data.descricao} <a style="text-decoration: none; color: #fff; font-weight: 700;" href="${data.link}">Acesse aqui.</a></p>`
            });
            document.getElementById('projeto_single').innerHTML = htmlProjeto;
        }
    })
})

$(function () {
    //Aqui vai todo o código de javascript
    $('nav.mobile').click(function () {
        //O que vai acontecer quando clicarmos na nav.mobile
        var listaMenu = $('nav.mobile ul');

        //Abrir ou fechar o menu, efeito slide com verificação para troca de icon
        if (listaMenu.is(':hidden') == true) {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-bars');
            icone.addClass('fa-xmark');
            listaMenu.slideToggle();
        } else {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-xmark');
            icone.addClass('fa-bars');
            listaMenu.slideToggle();
        }

    });

    if ($('target').length > 0) {

        // O elemento existe, portanto precisamos dar o scroll em algum elemento
        var elemento = '#' + $('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html, body').animate({ scrollTop: divScroll }, 3000);
    }

    loadDinamic();

    function loadDinamic() {
        $('[realtime]').click(function () {
            var page = $(this).attr('realtime');
            $('.container-principal').load('../pages/' + page + '.php');

            $('.container-principal').fadeIn(1000);
            window.history.pushState('', '', page);

            return false;
        });
    }
});