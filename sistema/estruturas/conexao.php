<?php
$server = "localhost";
$user = "root";
$senha = "";
$bdNome = "simulador";

$conexao = mysqli_connect($server, $user, $senha, $bdNome);
mysqli_set_charset($conexao, "utf8");

if(mysqli_connect_error()):
    echo "Erro: ".mysqli_connect_error();
endif
?>