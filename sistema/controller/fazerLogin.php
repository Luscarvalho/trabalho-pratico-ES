<?php
include_once '../controller/controladorTreinador.php';
include_once '../model/Treinador.php';

$usuario = $_POST['cUsuario'];
$senha = $_POST['cSenha'];

if($usuario == "EnfJoy" && $senha == "235689"):
    header('Location: ../view/enfermeiraJoy.html');
else:
    $treinador = new Treinador();
    $treinador = ControladorTreinador::getTreinadorByName($usuario);
    var_dump($treinador);
    if($treinador['senha'] == $senha):
        $_SESSION['treinadorLogado'] = $treinador['treinadorId'];
        header('Location: ../view/treinadorInicio.php');
    else:
        $_SESSION['naoAutenticado'] = true;
        header('Location: ../view/index.php');
    endif;
endif;

?>