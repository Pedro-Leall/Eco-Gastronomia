<?php
session_start();
include('conexao.php');
if(!empty($_POST)){
	$email = $_POST['login'];
	$senha = $_POST['senha'];
	$senhaCripto = base64_encode($senha);
	$busca = mysqli_query($con,"SELECT * FROM cadastra_usuario WHERE email = '$email' AND senha = '$senhaCripto'");
	$contagem = mysqli_num_rows($busca);
	if($contagem<1){
	$_SESSION['logado'] = 0;
	echo "<script>alert('Confira se as informações estão corretas')</script>";
	echo "<script>window.location.href=('Ecogastro_login.html')</script>";
	}else{
	$_SESSION['logado'] = 1;
	$resultado = mysqli_fetch_array($busca);
	$_SESSION['id'] = $resultado[0];
	echo "<script>window.location.href=('Ecogastro_perfil.php')</script>";
	}
	}
?>