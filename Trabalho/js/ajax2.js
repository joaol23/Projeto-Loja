
$(".button_menu").click(function (event) {
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "inserirLanche.php",
        data: $("#menuForm").serialize(),
        dataType: 'json',
    }).done(function (msg) { //tudo que vem do backend vem pra essa variavel
        if (msg.error) {
            Swal.fire({
                icon: 'error',
                title: msg.error,
                showConfirmButton: false,
                timer: 1500
            })
        } else if (msg.loginError) {
            Swal.fire({
                icon: 'error',
                title: msg.loginError,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                $(location).attr('href', '?page=forms');
            })
        } else if (msg.successo) {
            Swal.fire({
                icon: 'success',
                title: msg.successo,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                $(location).attr('href', '?page=carrinho');
            })
        }
    });
});