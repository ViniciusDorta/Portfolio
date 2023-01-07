$(function () {

    $('body').on('submit', 'form', function () {

        var form = $(this);
        $.ajax({
            beforeSend: function () {
                $('.overlay-loading').fadeIn();
            },
            url: 'includes/ajax-envio-email.php',
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function (data) {
            if (data.sucesso) {
                $('.overlay-loading').fadeOut();
                $('.sucesso').fadeIn();
                setTimeout(() => {
                    $('.sucesso').fadeOut();
                }, 3000);
                setInterval(() => {
                    location.reload();
                }, 3000);
            } else {
                $('.overlay-loading').fadeOut();
                console.log("Ocorreu um erro ao enviar o e-mail.");
            }
        });

        return false;
    });
});