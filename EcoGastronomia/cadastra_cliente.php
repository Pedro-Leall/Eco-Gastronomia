<?php
include('conexao.php');
if(!empty($_POST)){
$nome =  $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$data_nas =  $_POST['data_nas'];
$senhacripto = base64_encode($senha);
mysqli_query($con,"INSERT INTO cadastra_usuario(nome,email,senha,data_nascimento)VALUES ('$nome','$email','$senhacripto','$data_nas')");
echo "<script>window.location.href=('Ecogastro_login.html')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EcoGastronomia - Cadastro</title>
        <link rel="icon" href="Imagens/eg-logo.png" type="image/x-icon" />
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        height: 100%;
    }
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1rem;
        line-height: 1.6;
        height: 100%;
        background-color: rgb(237, 234, 231);
    }
    .wrap {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(237, 234, 231);
    }
    /* caixa de login*/
    .caixa_login{
        width: 350px;
        margin: 0 auto;
        border: 1px solid #ddd;;
        padding: 2rem;
        background: #faf7f7a6;;
    }
      /* inputs do form*/
    .form-input{
        background: #fafafa;
        border: 1px solid #eeeeee;
        padding: 12px;
        width: 100%;
        color: gray;
    }
     
    .form-group{
        margin-bottom: 1rem;
        
    }
    /*formata o botão */
    .botao{
        background: #8CA19A;;
        border: 1px solid #ddd;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        text-transform: uppercase;
        
    }
     /*muda a cor quando passar o mouse em cima do botão */
    .botao:hover{
        background:#2c6955;;
    }
    .texto1{
        text-align: center;
        margin-bottom : 2rem;
    }
    .texto2{
     margin-left: 5px;

    }  
    #icon_olho {
    position: absolute;
    right: 39.5%;
    top: 49.5%;
    cursor: pointer;
    } 
    </style>
</head>
<body>
    <div class="wrap">
        <form class="caixa_login" action="#" method="POST">
            <div class="texto1">
                <h3> Cadastre-se aqui</h3>
            </div>
            <!--nome Input-->
            <div class="form-group">
                <input type="text" name="nome" class="form-input" placeholder="digite seu nome" maxlength="45" required>
            </div>
            <!--email Input-->
            <div class="form-group">
                <input type="text" name="email" class="form-input" placeholder="digite seu email" id="email" onkeyup="validar_senha()" maxlength="45" required>
            </div>
             <!--senha Input-->
             <div class="form-group">
                <input type="password" name="senha" class="form-input" placeholder="digite sua senha" id="senha" onkeyup="validar_senha()" maxlength="12" required>
      
            </div>
             <!-- confirma senha Input-->
             <div class="form-group">
                <input type="password" name="confirma_senha" class="form-input" placeholder="confirme sua senha" id="confirm_senha" onkeyup="validar_senha()" maxlength="12" required>
            </div>
            <div class="texto2">
                Data de nascimento:
                </div>
                  <!--data nascimento Input-->
            <div class="form-group">
                <input type="date" name="data_nas" class="form-input" required>
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="botao" type="button" id="botao">Cadastrar</button>
            </div>
            <script>

                function validar_senha(){
                var botao = document.getElementById('botao');
                var email = document.getElementById('email').value;
                var senha = document.getElementById('senha').value;
                var confirm_senha = document.getElementById('confirm_senha').value;
                var input_senha = document.getElementById('confirm_senha');
                var input_email = document.getElementById('email');
                const mail = /\S+@\S+\.\S+/;
                //verifica se as senhas batem
                if(senha == confirm_senha){
                    var senha_valida = true;
                    input_senha.style.borderColor = "#ddd";
                }
                else{
                    var senha_valida = false;
                    input_senha.style.borderColor = "#ff0000";
                }
                //verifica se o email é válido
                if(mail.test(email)){
                    var email_valido = true;
                    input_email.style.borderColor = "#ddd";
                }
                else{
                    var email_valido = false;
                    input_email.style.borderColor = "#ff0000";
                }
                if(senha_valida && email_valido){
                    botao.type = "submit";
                }else{
                    botao.type = "button";
                }
                }
            </script>
        </form>
    </div><!--/.wrap-->
</body>
</html>