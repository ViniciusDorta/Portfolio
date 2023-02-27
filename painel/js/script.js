var htmlEditar = '';
var htmlExcluir = '';

$(document).ready(function () {
    htmlEditar += `
        <i class="fa-solid fa-pen-to-square"></i>`;
    document.getElementById('btn-editar').innerHTML = htmlEditar;
    htmlExcluir += `
        <i class="fa-solid fa-rectangle-xmark"></i></div>`;
    document.getElementById('btn-excluir').innerHTML = htmlExcluir;
});

$(function () {
    var open = true;
    var windowSize = $(window)[0].innerWidth;

    if (windowSize <= 820) {
        $('.menu').css('width', '0').css('padding', '0');
        open = false;

        $('.btn-menu').click(function () {
            if (open) {
                $('.menu').animate({
                    'width': '0',
                    'padding': '0'
                });
                $('.content').css('width', '100%');
                $('.content, header').animate({
                    'left': '0',
                    'width': '100%',
                }, function () {
                    open = false;
                });
            } else {
                $('.menu').css('display', 'block');
                $('.content, header').animate({
                    'left': '50%',
                    'width': '50%',
                });
                $('.content').css('width', '50%');
                $('.menu').animate({
                    'width': '50%',
                    'padding': '0'
                }, function () {
                    open = true;
                });
            }
        });
    } else {
        $('.btn-menu').click(function () {
            if (open) {
                $('.menu').animate({
                    'width': '0',
                    'padding': '0'
                });
                $('.content').css('width', '100%');
                $('.content, header').animate({
                    'left': '0',
                    'width': '100%',
                }, function () {
                    open = false;
                });
            } else {
                $('.menu').css('display', 'block');
                $('.content, header').animate({
                    'left': '20%',
                    'width': '80%',
                });
                $('.content').css('width', '80%');
                $('.menu').animate({
                    'width': '20%',
                    'padding': '0'
                }, function () {
                    open = true;
                });
            }
        });
    }

    $('[actionBtn=delete').click(function () {
        var result = confirm("Deseja excluir esse Projeto?");
        if (result === true) {
            return true;
        } else {
            return false;
        }
    })
});