var setinha = $('.setinha-home');
var slideMenuLogin = $('.slideMenuLogin')

$('.LoginMenu').hover(function () {
    setinha.toggleClass('opacity1');
    slideMenuLogin.toggleClass('opacity1');
}, function () {
    setinha.removeClass('opacity1');
    slideMenuLogin.toggleClass('opacity1');
})

setinha.hover(function () {
    setinha.toggleClass('opacity1');
    slideMenuLogin.toggleClass('opacity1');
}, function () {
    setinha.removeClass('opacity1');
    slideMenuLogin.toggleClass('opacity1');
})

$(".btnLeave").click(function (event) {

    Swal.fire({
        title: 'Você tem certeza que deseja sair?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Não sair',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, sair!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Deslogado com sucesso!!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                $.ajax({
                    method: "POST",
                    url: "deslogar.php",
                }).done(function () {
                    $(location).attr('href', '?page=home');
                })
            })
        }
    })
});