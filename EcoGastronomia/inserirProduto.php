<?php
include('conexao.php');
if(!empty($_POST)){
$nomeP =  $_POST['nomeP'];
$catP= $_POST['catP'];
$desP = $_POST['desP'];
$valorP =  $_POST['valorP'];

//$senhacripto = base64_encode($senha);

    echo "entrei post";
    if (isset($_FILES["img"]) && !empty($_FILES["img"])) {
        echo "entrei files";
        $img =  "./imagens/".$_FILES["img"]["name"];

        move_uploaded_file($_FILES["img"]["tmp_name"], $img);

        echo "update realizado com sucesso";
        
    }
    else {
        echo "esta fazio!";
    }


mysqli_query($con,"INSERT INTO produto(nome_produto,categoria_produto,descricao_produto,img_produto,valor_produto)VALUES ('$nomeP','$catP','$desP','$img','$valorP')");
}
  

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EcoGastronomia - Cadastro</title>
        
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
   
    </style>
</head>
<body>
    <div class="wrap">
        <form class="caixa_login" action="#" method="POST"  enctype="multipart/form-data">
            <div class="texto1">
                <h3> Cadastre-se aqui</h3>
            </div>
            <!--nome do produto Input-->
            <div class="form-group">
                <input type="text" name="nomeP" class="form-input" placeholder="nome do produto" >
            </div>
            <!--categoria do produto Input-->
            <div class="form-group">
                Categoria do Produto
                <select name="catP" style="width:100%; margin-bottom:10px; height: 30px" >
                    <option>acessorios</option>
                    <option>diversos</option>
                    <option>ingredientes</option>
                    <option>livros</option>
                    <option>utensílios</option>
                </select>
            </div>
             <!--descriçao do produto Input-->
             <div class="form-group">
                <input type="text" name="desP" class="form-input" placeholder="descrição do produto">
            </div>
             <!--imagem do produto Input-->
             <div class="form-group">
                <input type="file" accept="image/*" name="img" class="form-input" placeholder="imagem do produto" >
            </div>
             <!--valor do produto Input-->
             <div class="form-group">
                <input type="text" name="valorP" class="form-input" placeholder="valor do produto" >
            </div>
            <!--cadastra Button-->
            <div class="form-group">
                <button class="botao" type="submit">cadastre</button>
    
            </div>
        </form>
    </div><!--/.wrap-->
</body>
</html>