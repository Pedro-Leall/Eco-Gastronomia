<?php
include('conexao.php');
$res = "";
if(!empty($_POST)){
    $receita = $_POST['pesquisa'];
    $busca = mysqli_query($con, "SELECT * from receitas where nome_receita like '$receita%'");
    $contagem = mysqli_num_rows($busca);
	if($contagem<1){
	echo "<script>alert('Receita não encontrada')</script>";
	echo "<script>window.location.href=('Ecogastro.html')</script>";
	}
    while($resultado = mysqli_fetch_row($busca) ){
        $res= $res."<section class=\"section_comidas\" style=\"margin-bottom: 100px;\" style=\"height:100%; width: 100%;\">
        <div id=\"div_imagens_produtos\" >
                <div class=\"div_produtos\">
                    <div class=\"div_imagem\" onclick=\"window.location='Ecogastro_prato.php?id=".$resultado[0]."'\">
                        <img src=\"".$resultado[3]."\"  style=\"height:100%; width: 100%;\">
                    </div>
                    <div class=\"div_descricao_imagens\">
                        <h1>".$resultado[1]."</h1>
                        <p>".$resultado[2]."</p>
                    </div>
                </div>
            </div>
        </section>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGastronomia - Resultados </title>
    <link rel="icon" href="Imagens/eg-logo.png" type="image/x-icon" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="Css/Ecogastro_modelo_vendas_style.css">
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
            <li><a href="SubReceitas/Ecogastro_doces.php" class="subtopicos">Doces</a></li>
            <li><a href="SubReceitas/Ecogastro_saudaveis.php" class="subtopicos">Saudáveis</a></li>
            <li><a href="SubReceitas/Ecogastro_carne.php" class="subtopicos">Carnes</a></li>
            <li><a href="SubReceitas/Ecogastro_massas.php" class="subtopicos">Massas</a></li>
            <li><a href="SubReceitas/Ecogastro_lanches.php" class="subtopicos">Lanches</a></li>
            <li><a href="SubReceitas/Ecogastro_sopas.php" class="subtopicos">Sopas</a></li>
            <li><a href="SubReceitas/Ecogastro_diversos.php" class="subtopicos">Diversos</a></li>
        </ul>
    </div>
    <main>
        <!--Comida 1-->
        <section class="section_texto" style="margin-top: 150px;">
            <!--Texto de divisão e linha-->
            <h1>Resultados</h1>
        </section>
        <?php 
        echo $res;
        ?>
    </main>
    <!--Section para uma área feita para anúncios de terceiros-->
    <section class="area_anuncio">
        <a href="https://www.hellmanns.com.br/produtos/ketchup.html"><img src="Imagens/anuncio_hellmanns.png"></a>
    </section>
    <footer>
        <!--Div onde está as informações gerais-->
        <div id="div_footer_esq">
            <ul>
                <li>Receitas</li>
                <li>Sobre Nós</li>
                <li>Loja</li>
                <li>Perfil</li>
                <li>Ingredientes</li>
                <li>Utensílios</li>
                <li>Livros</li>
                <li>Acessórios</li>
                <li>Diversos</li>
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
