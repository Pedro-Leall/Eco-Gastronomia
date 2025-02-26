<?php
session_start();
include('conexao.php');
$busca_gen=mysqli_query($con,"SELECT genero FROM cadastra_usuario");
$busca_pais=mysqli_query($con,"SELECT pais FROM endereco");
$busca_tel=mysqli_query($con,"SELECT telefone FROM cadastra_usuario");
$busca_apel=mysqli_query($con,"SELECT genero FROM cadastra_usuario");

if(!empty($_POST)){
    $genero= $_POST['valor_genero'];
    $pais= $_POST['valor_pais'];
    $telefone= $_POST['valor_telefone'];
    $apelido= $_POST['valor_apelido'];
    $nome= $_POST['valor_nome'];
    $email= $_POST['valor_email'];
    $senha= $_POST['valor_senha'];
    $senha = base64_encode($senha);
    $id= $_SESSION['id'];
    //preg_replace("/[/]/", '', $nascimento);
    $nascimento= $_POST['valor_nascimento'];

    //Vê se precisa fazer insert ou update
    if($busca_gen==""){
        mysqli_query($con, "INSERT INTO cadastra_usuario(genero) VALUES ('$genero')");
    }else{
        mysqli_query($con, "UPDATE cadastra_usuario SET genero = '$genero' WHERE id_usuario = '$id'");
    }

    if($busca_pais==""){
        mysqli_query($con, "INSERT INTO cadastra_usuario(pais) VALUES ('$pais')");
    }else{
        mysqli_query($con, "UPDATE cadastra_usuario SET pais = '$pais'  WHERE id_usuario = '$id'");
    }

    if($busca_tel==""){
        mysqli_query($con, "INSERT INTO cadastra_usuario(telefone) VALUES ('$telefone')");
    }else{
        mysqli_query($con, "UPDATE cadastra_usuario SET telefone = '$telefone'  WHERE id_usuario = '$id'");
    }

    if($busca_apel==""){
        mysqli_query($con, "INSERT INTO cadastra_usuario(apelido) VALUES ('$apelido')");
    }else{
        mysqli_query($con, "UPDATE cadastra_usuario SET apelido = '$apelido'  WHERE id_usuario = '$id'");
    }

    //Faz os updates
    mysqli_query($con, "UPDATE cadastra_usuario SET nome = '$nome', email = '$email', senha = '$senha',data_nascimento = '$nascimento' WHERE id_usuario = '$id'");

    echo "<script>alert('Seus dados foram alterados com sucesso')</script>";
    echo "<script>window.location.href=('Ecogastro_perfil.php')</script>";
}
?>