<?php
//procedimento padrão de conexão MySQL PHP
$con = mysqli_connect("localhost:3306","root","","ecogastronomia");
if(!$con){
    die("Erro de conexão: ".mysqli_connect_error());
}
//mysqli_connect(endereco_servidor,usuario_servidor,senha_servidor,banco_de_dados)
?>