$(document).ready(function(){
        
    //envio do formulario
    $("#botaoLogin").click(function(event){
        event.preventDefault();

        if($('#loginForm').valid()){
            $.ajax({
                method: "POST",
                url: "checar.php",
                data: $("#loginForm").serialize(),
                dataType: 'json',
            }).done(function(msg){ //tudo que vem do backend vem pra essa variavel
                console.log(msg);
                if(msg.login){
                Swal.fire({
                    icon: 'success',
                    title: 'Você está logado!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    $(location).attr('href', 'home.php?cliente='+ msg.login);
                  })
                }else if(msg.erro){
                    Swal.fire({
                        icon: 'error',
                        title: 'Login ou senha errados!!',
                        showConfirmButton: false,
                        timer: 1500
                    })                    
                }
            })
            .fail(function(jqXHR,textStatus,msg){
                alert(msg);
            });
        }
    });

    //envio do formulario
    $("#btn-cadastrar").click(function(event){
        event.preventDefault();

        if($('#registrarForm').valid()){
            $.ajax({
                method: "POST",
                url: "inserir.php",
                data: $("#registrarForm").serialize(),
                dataType: 'json',
            }).done(function(msg){ //tudo que vem do backend vem pra essa variavel
                if(msg.senha){
                Swal.fire({
                    icon: 'error',
                    title: 'Senha e confirmação de senha diferentes!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                }else if(msg.email){
                    Swal.fire({
                        icon: 'error',
                        title: 'Email já existe!!',
                        showConfirmButton: false,
                        timer: 1500
                    })                    
                }else if(msg.cadastrado){
                    Swal.fire({
                        icon: 'success',
                        title: 'Cliente cadastrado!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $(location).attr('href', 'forms.php');
                      })     

                }
            })
            .fail(function(jqXHR,textStatus,msg){
                alert(msg);
            });
        }
    });
});