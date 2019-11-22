<?php

$usuario = $_POST['cUsuario'];
$senha = $_POST['cSenha'];

if($usuario == "EnfJoy" && $senha == "235689"):
    header('Location: ../enfermeiraJoy.html');
elseif ($usuario == "Marvin" && $senha == "424242"):
    header('Location: ../treinadorInicio.html');
endif;

?>