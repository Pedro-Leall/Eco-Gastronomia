<?php
    error_reporting(0); 
    $id = $_GET['id'] ?? null;
    $res1 = "";
    $res2 = "";
    include('conexao.php');
    $busca = mysqli_query($con,"SELECT * FROM receitas WHERE id_receitas = '$id'");
    $resultado = mysqli_fetch_row($busca);
    //Ingredientes
    $ingredientes = explode(";", $resultado[6]);
    foreach ($ingredientes as $ingrediente) {
        $res = $res . "<li><span>" . $ingrediente . "</span></li>";
    }
    //Modo preparo
    $modo_preparo= explode(";", $resultado[5]);
    foreach ($modo_preparo as $modo_preparo2) {
        $res2 = $res2 . "<li><span>" . $modo_preparo2 . "</span></li>";
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
        <section class="nome_prato">
            <h1><?php echo $resultado[1];?></h1>
        </section>
        <section class="div_imagem_descricao">
            <div id="imagem_prato">
                <img src="<?php echo $resultado[3];?>" alt="Food Images">
            </div>
            <div id="descricao_prato">
                <h3 style="font-weight:normal;"><?php echo $resultado[2];?></h3>
            </div>
        </section>
        <section class="section_informacoes_quantidade">
            <div class="div_quantidade">
                <h1>Quantidade</h1>
                <br>
                <ul>
                    <li><span>Serve <?php echo $resultado[7];?> pessoas</span></li>
                </ul>
            </div>
        </section>
        <section class="section_informacoes_ingredientes">
            <div class="div_ingredientes">
                <h1>Ingredientes</h1>
                <br>
                <ul>
                <?php 
                echo $res;
                ?>
                </ul>
            </div>
        </section>
        <section class="section_informacoes_preparo">
            <div class="div_preparo">
                <h1>Modo de preparo</h1>
                <br>
                <ul>
                <?php 
                echo $res2;
                ?>
                </ul>
            </div>
        </section>

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