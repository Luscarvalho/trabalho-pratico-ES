<?php
session_start();

include('estruturas/conexao.php');

//Evitar o usuário de acessar login.php direto
if(empty($_POST['cUsuario']) || empty($_POST['cSenha'])) { 
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['cUsuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['cSenha']);

$query = "SELECT * FROM treinador WHERE treinadorNome = '{$usuario}' and senha = '{$senha}'";

$resultado = mysqli_query($conexao, $query);

$linhas = mysqli_num_rows($resultado);

if($linhas == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: treinadorInicio.html');
    exit();
} else {
    $_SESSION['naoAutenticado'] = true;
    header('Location: index.php');
    exit();
}
?>
