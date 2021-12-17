
$('#atualizaForm').validate({
    rules: {
        nameReg: {
            required: true,
            minlength: 3,
        },

        emailReg: {
            required: true,
            email: true,
        },

        stateReg: {
            required: true,
        },

        senhaReg: {
            required: true,
            minlength: 6,
            maxlength: 10,
        },

        senhaRegConfirm: {
            required: true,
            minlength: 6,
            maxlength: 10,
        },

        enderecoReg: {
            required: true,
        },

        telefoneReg: {
            required: true,
            maxlength: 14,
        },

        cepReg: {
            required: true,
            maxlength: 10,
        },

    },

    messages: {
        nameReg: {
            required: " Campo obrigatório!",
            minlength: jQuery.validator.format("Preencha com no mínimo {0} letras!")
        },

        emailReg: {
            required: " Campo obrigatório!",
            email: "Email escrito de forma inválida!"
        },

        stateReg: {
            required: " Campo obrigatório!",
        },

        senhaReg: {
            required: " Campo obrigatório!",
            minlength: jQuery.validator.format("Preencha com no mínimo {0} letras!"),
            maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
        },

        senhaRegConfirm: {
            required: " Campo obrigatório!",
            minlength: jQuery.validator.format("Preencha com no mínimo {0} letras!"),
            maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
        },

        enderecoReg: {
            required: " Campo obrigatório!",
        },

        telefoneReg: {
            required: " Campo obrigatório!",
            maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
        },

        cepReg: {
            required: " Campo obrigaório!",
            maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
        }

    }

});

$('#btn-atualizar').on('click', function () {

    if ($('#atualizaForm').valid()) {
        $.ajax({
            method: "POST",
            url: "atualizar.php",
            data: $("#atualizaForm").serialize(),
            dataType: 'json',
        }).done(function (msg) { //tudo que vem do backend vem pra essa variavel
            if (msg.senha) {
                Swal.fire({
                    icon: 'error',
                    title: 'Senha e confirmação de senha diferentes!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else if (msg.email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Email já existe!!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else if (msg.senhaWrong) {
                Swal.fire({
                    icon: 'error',
                    title: 'Senha errada!!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else if (msg.atualizado) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cliente Atualizado!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    $(location).attr('href', '?page=formusu');
                })

            }
        })
            .fail(function (jqXHR, textStatus, msg) {
                alert(msg);
            });
    }
})