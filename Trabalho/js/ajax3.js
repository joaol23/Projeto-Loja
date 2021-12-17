$('.btn_carr').on('click', function (e) {
    $.ajax({
        method: "POST",
        url: "finalizarCompra.php",
        dataType: 'json',
    }).done(function (msg) { //tudo que vem do backend vem pra essa variavel
        if (msg.preco_total) {
            Swal.fire({
                title: 'Você tem certeza que deseja realizar essa compra de R$ ' + msg.preco_total + ' ?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Não comprar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Comprar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Compra realizada com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $.ajax({
                            method: "POST",
                            url: "removerCarrinho.php",
                        }).done(function () {
                            $(location).attr('href', '?page=carrinho');
                        })
                    })
                }
            })

        }
    });

})