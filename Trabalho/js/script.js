$(function(){ 
    $('#loginForm').validate({
       
        rules:{
            emailLogin: {
                required: true,
                email: true,
            },

            senhaLogin:{
                required: true,
                minlength: 6,      
                maxlength: 10,    
            },
        },
        
        messages:{
            emailLogin: {
                required: "Campo obrigatório!",
                email: "Email escrito de forma inválida!"
            },

            senhaLogin: {
                required: " Campo obrigatório!",
                minlength:  jQuery.validator.format("Preencha com no mínimo {0} letras!"),
                maxlength: jQuery.validator.format("Preencha com no míximo {0} caracteres!")
            },
        }
    })

    $('#registrarForm').validate({

        
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
        
        messages:{
            nameReg: {
                required: " Campo obrigatório!",
                minlength:  jQuery.validator.format("Preencha com no mínimo {0} letras!")
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
                minlength:  jQuery.validator.format("Preencha com no mínimo {0} letras!"),
                maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
            },

            senhaRegConfirm: {
                required: " Campo obrigatório!",
                minlength:  jQuery.validator.format("Preencha com no mínimo {0} letras!"),
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
});