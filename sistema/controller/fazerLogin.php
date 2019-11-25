<?php

$usuario = $_POST['cUsuario'];
$senha = $_POST['cSenha'];

if($usuario == "EnfJoy" && $senha == "235689"):
    header('Location: ../view/enfermeiraJoy.html');
elseif ($usuario == "Marvin" && $senha == "424242"):
    header('Location: ../view/treinadorInicio.html');
endif;

?>