<?php
    error_reporting(0); 
    $id = $_GET['id_produto'] ?? null;
    $res = "";
    $res2 = "";
    include('conexao.php');
    $busca = mysqli_query($con,"SELECT * FROM produto WHERE id_produto = '$id'");
    while($resultado = mysqli_fetch_row($busca) ){
        $res= $res."<section class=\"nome_prato\">
        <h1>".$resultado[1]."</h1>
        </section>
        <section style=\"width: 100%; display: flex; justify-content: center;\">
            <section class=\"div_imagem_descricao\">
                <div id=\"imagem_prato\" style=\"display: flex; align-items: center;\"><img src=\"".$resultado[4]."\" alt=\"Food Images\">
                </div>
                <div id=\"descricao_prato\" style=\"display:flex;flex-wrap:wrap;\">
                    <h3 style=\"font-weight:normal;\">".$resultado[3]."</h3>
                    <h3 style=\"font-weight:normal;\">R$:".$resultado[5]."</h3>
                </div>
            </section>
        </section>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGastronomia - Prato</title>
    <link rel="icon" href="Imagens/eg-logo.png" type="image/x-icon" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="Css/Ecogastro_prato_style.css">
</head>

<body>
    <!--Cabeçalho-->
    <header>
        <!--Div para logo-->
        <div id="div_logo">
            <!--Logo-->
            <a href="Ecogastro.html"><img src="Imagens/ecogastro.png"></a>
        </div>
        <nav>
            <ul id="ul_nav">
                <a href="Ecogastro_receitas.html">
                    <li>Receitas</li>
                </a>
                <a href="Ecogastro_sobre_nos.html">
                    <li>Sobre Nós</li>
                </a>
                <a href="Ecogastro_loja.html">
                    <li>Loja</li>
                </a>
                <a href="Ecogastro_perfil.php">
                    <li>Perfil</li>
                </a>
                <!--Div para o icon e a input-->
                <div id="div_pesquisa">
                    <form method="post" action="Ecogastro_resultado.php" id="form_pesquisa">
                        <!--Input para pesquisar-->
                        <input id="input_pesquisa" name="pesquisa">
                    </form>
                    <!--Coloca o ícone de pesquisa-->
                    <span class="material-symbols-outlined" id="icon_pesquisa" onclick="pesquisar()">search</span>
                   
                    <script>
                        function pesquisar() {
                            form = document.getElementById("form_pesquisa");
                            form.submit();
                        }
                    </script>
                </div>
            </ul>
        </nav>
    </header>
    <div class="div_nav2">
        <ul>
            <li><a href="SubLoja/Ecogastro_ingredientes.php" class="subtopicos">Ingredientes</a></li>
            <li><a href="Subloja/Ecogastro_utensilios.php" class="subtopicos">Utensílios</a></li>
            <li><a href="SubLoja/Ecogastro_livros.php" class="subtopicos">Livros</a></li>
            <li><a href="SubLoja/Ecogastro_acessorios.php" class="subtopicos">Acessórios</a></li>
            <li><a href="SubLoja/Ecogastro_diversos_loja.php" class="subtopicos">Diversos</a></li>
        </ul>
    </div>
    <main>
        <?php 
        echo $res;
        ?>
        <div class="form-group" style="margin-top: 50px;">
            <button class="botao" type="submit" style="font-size: 1.2em; width: 100%" onclick="window.location='Ecogastro_pagamento.html'">Comprar</button>
        </div>
    </main>
    <footer>
        <!--Div onde está as informações gerais-->
        <div id="div_footer_esq">
            <ul>
                <li>Receitas</li>
                <li>Sobre Nós</li>
                <li>Loja</li>
                <li>Perfil</li>
            </ul>
        </div>
        <!--Div onde está a logo-->
        <div id="div_footer_meio">
            <img src="Imagens/eg-logo.png">
        </div>
        <!--Div onde está as redes sociais-->
        <div id="div_footer_dir">
            <img src="Imagens/instagram.png">
            <img src="Imagens/twitter.png">
            <img src="Imagens/facebook.png">
        </div>
    </footer>
    <div id="direitos_autorais">
        <h3>© 2023 Todos os direitos reservados à Yan Ambrósio, Pedro Henrique, Luiz Gustavo.</h3>
    </div>
</body>

</html>