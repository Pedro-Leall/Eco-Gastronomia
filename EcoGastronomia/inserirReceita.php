<?php
include('conexao.php');
if(!empty($_POST)){
$nomeP =  $_POST['nome_receita'];
$catP= $_POST['categoria_receita'];
$desP = $_POST['descricao_receita'];
$preP = $_POST['modo_preparo'];
$ingP = $_POST['ingredientes'];
$quantP = $_POST['quantidade_pessoas'];
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


mysqli_query($con,"INSERT INTO receitas(nome_receita,categoria_receita,descricao_receita,img_receita,modo_preparo,ingredientes,quantidade_pessoas)VALUES ('$nomeP','$catP','$desP','$img','$preP','$ingP','$quantP')");
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
                <input type="text" name="nome_receita" class="form-input" placeholder="nome da receita" >
            </div>
            <!--categoria do produto Input-->
            <div class="form-group">
            Categoria do Produto
                <select name="categoria_receita" style="width:100%; margin-bottom:10px; height: 30px" >
                    <option>carne</option>
                    <option>diversos</option>
                    <option>doces</option>
                    <option>lanches</option>
                    <option>massas</option>
                    <option>saudáveis</option>
                    <option>sopas</option>
                </select>
            </div>
             <!--descriçao do produto Input-->
             <div class="form-group">
                <input type="text" name="descricao_receita" class="form-input" placeholder="descrição da receita">
            </div>
            <!--modo de preparo do produto Input-->
            <div class="form-group">
                <input type="text" name="modo_preparo" class="form-input" placeholder="modo de preparo (separe eles com ;)">
            </div>
            <!--ingredientes do produto Input-->
            <div class="form-group">
                <input type="text" name="ingredientes" class="form-input" placeholder="ingredientes (separe eles com ;)">
            </div>
            <!--quantidade de pessoas que serve Input-->
            <div class="form-group">
                <input type="text" name="quantidade_pessoas" class="form-input" placeholder="quantidade de pessoas que serve">
            </div>
             <!--imagem do produto Input-->
             <div class="form-group">
                <input type="file" accept="image/*" name="img" class="form-input" placeholder="imagem da receita" >
            </div>
            <!--cadastra Button-->
            <div class="form-group">
                <button class="botao" type="submit">cadastre</button>
    
            </div>
        </form>
    </div><!--/.wrap-->
</body>
</html>