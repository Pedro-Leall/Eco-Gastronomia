<?php
session_start();
if($_SESSION['logado']==null||$_SESSION['logado']==0||!isset($_SESSION['logado'])||!isset($_SESSION['id'])){
    echo "<script>window.location.href=('Ecogastro_login.html')</script>";
}
include('conexao.php');
error_reporting(0);
    $idUser = $_SESSION['id'];
    $busca = mysqli_query($con,"SELECT * FROM cadastra_usuario where id_usuario = '$idUser'");
    $resultado = mysqli_fetch_row($busca);
    if($resultado[6]==null){
        $resultado[6] = "";
    }
    if($resultado[7]==null){
        $resultado[7] = "";
    }
    if($resultado[8]==null){
        $resultado[8] = "";
    }
    if($resultado[9]==null){
        $resultado[9] = "";
    }
    $resultado[3] = base64_decode($resultado[3]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGastronomia - Perfil</title>
    <link rel="icon" href="Imagens/eg-logo.png" type="image/x-icon" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="Css/Ecogastro_perfil_style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                    <form method="post" action="#">
                        <!--Input para pesquisar-->
                        <input id="input_pesquisa">
                    </form>
                    <!--Coloca o ícone de pesquisa-->
                    <span class="material-symbols-outlined" id="icon_pesquisa">search</span>
                   
                    <span class="material-symbols-outlined" id="icon_logout" onclick="logout()">
                        logout
                    </span>
                    <p style="color: white; font-family: 'Times New Roman', Times, serif; font-weight: bold;font-size: 1.4em;cursor: pointer;" onclick="logout()">Sair</p>
                </div>
                <script>
                    function logout(){
                        window.location.href="deslogar.php";
                        alert('Deslogado com sucesso');
                    }
                </script>
            </ul>
        </nav>
    </header>
    <main>
    <form method="post" action="update_foto.php" id="form_imagem">
            <section class="foto_perfil">
                <div class="imagem_perfil_passar">

                    <img src="Imagens/foto_perfil.png" alt="Avatar" class="image">
                </div>
            </section>
            </form>
            <form method="post" action="update_usuario.php" id="form_enviar">

            <section class="nome_perfil" style="display: flex;justify-content: center;">
                <input type="text" value="<?php echo $resultado[9];?>" disabled
                    style="color: black; font-size: 1.4em; width: 150px; text-align: center;" id="input_apelido">

            </section>

            <section class="section_informacoes">
                <div class="informacoes_esq">
                    <h1>Informações Básicas</h1>
                    <table id="informacoes_basicas">
                        <tr>
                            <td><b>Nome Completo</b></td>
                            <td><input type="text" value="<?php echo $resultado[1];?>" disabled
                                    style="color: black; font-size: 0.95em; width: 100%;" class="inputs_basicas" name="valor_nome"></td>
                        </tr>
                        <tr>
                            <td><b>Endereço de Email</b></td>
                            <td><input type="text" value="<?php echo $resultado[2];?>" disabled
                                    style="color: black; font-size: 0.95em; width: 100%;" class="inputs_basicas" name="valor_email"></td>
                        </tr>
                        <tr>
                            <td><b>Data de Nascimento</b></td>
                            <td><input type="date" value="<?php echo $resultado[5];?>" disabled
                                    style="color: black; font-size: 0.95em; width: 100%;font-family: Arial, Helvetica, sans-serif;" class="inputs_basicas" name="valor_nascimento"></td>
                        </tr>
                        <tr>
                            <td><b>Senha</b></td>
                            <td><input type="password" value="<?php echo $resultado[3];?>" disabled
                                    style="color: black; font-size: 0.95em;width: 100%;" class="inputs_basicas" name="valor_senha"></td>
                        </tr>
                    </table>
                </div>
                <div class="linha"></div>

                <div class="informacoes_dir">
                    <h1>Informações Adicionais</h1>
                    <table id="informacoes_basicas">
                        <tr>
                            <td><b>Gênero</b></td>
                            <td>
                                <div id="div_select">
                                    <select disabled style="font-size: 0.95em;width: 100%;" class="inputs_adicionais"
                                        id="select" name="valor_genero">
                                        <option><?php echo $resultado[6];?></option>
                                        <option>Masculino</option>
                                        <option>Feminino</option>
                                        <option>Outro</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>País</b></td>
                            <td>
                                <div id="div_select">
                                    <select disabled style="font-size: 0.95em;width: 100%;" class="inputs_adicionais"
                                        id="select2" name="valor_pais">
                                        <option><?php echo $resultado[8];?></option>
                                        <option>Argentina</option>
                                        <option>Bolívia</option>
                                        <option>Brasil</option>
                                        <option>Chile</option>
                                        <option>Colômbia</option>
                                        <option>Equador</option>
                                        <option>Guiana</option>
                                        <option>Paraguai</option>
                                        <option>Peru</option>
                                        <option>Suriname</option>
                                        <option>Uruguai</option>
                                        <option>Venezuela</option>
                                    </select>
                                </div>
                        </tr>
                        <tr>
                            <td><b>Número de Telefone</b></td>
                            <td><input type="tel" value="<?php echo $resultado[7];?>" disabled
                                    style="color: black; font-size: 0.95em; width: 100%;" class="inputs_adicionais"
                                    name="valor_telefone">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Apelido</b></td>
                            <td><input type="text" value="<?php echo $resultado[9];?>" disabled
                                    style="color: black; font-size: 0.95em;width: 100%;" class="inputs_adicionais"
                                    name="valor_apelido"></td>
                        </tr>
                    </table>
                </div>
            </section>
            <section class="section_alterar" style="margin-top:10px;">

                <div class="alterar_adicionais" >
                    <button type="button" id="alterar_adicionais" onclick="editar_adicionais()"
                        onmousedown="salvar()">ALTERAR
                        INFORMAÇÕES</button>
                </div>
            </section>
        </form>
        <section class="section_alterar" style="padding-top: 50PX;" disabled>
            <div class="salvar">
                <button type="submit" id="salvar" onclick="gravaDados()">SALVAR ALTERAÇÕES</button>
            </div>
        </section>

        <script>
            function gravaDados() {
                btn_salvar = document.getElementById("salvar");
                form = document.getElementById("form_enviar");
                form.submit();
            }
            function salvar() {
                btn_salvar = document.getElementById("salvar");
                btn_salvar.removeAttribute("disabled");
                btn_salvar.style.visibility = "visible";
            }
            function editar_adicionais() {
                inputs2 = document.getElementsByClassName("inputs_basicas");
                inputs2[0].removeAttribute('disabled');
                inputs2[1].removeAttribute('disabled');
                inputs2[2].removeAttribute('disabled');
                inputs2[3].removeAttribute('disabled');
                inputs2[3].type="text";

                inputs = document.getElementsByClassName("inputs_adicionais");
                inputs[0].removeAttribute('disabled');
                inputs[1].removeAttribute('disabled');
                inputs[2].removeAttribute('disabled');
                inputs[3].removeAttribute('disabled');
                select = document.getElementById("select");
                select.style.webkitAppearance = "auto";
                select.style.MozAppearance = "auto";

                select2 = document.getElementById("select2");
                select2.style.webkitAppearance = "auto";
                select2.style.MozAppearance = "auto";
            }
        </script>

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