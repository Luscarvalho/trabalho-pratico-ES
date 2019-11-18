<?php
session_start();
require_once '../estruturas/conexao.php';

if(isset($_POST['btnTipo'])):
    $tipo = mysqli_escape_string($conexao, $_POST['cTipo']);
    $forca = mysqli_escape_string($conexao, $_POST['cForca']);
    $fraqueza = mysqli_escape_string($conexao, $_POST['cFraqueza']);

    $sql = "SELECT * FROM tipo WHERE tipoNome = '$tipo'";
    $resultado = mysqli_query($conexao, $sql);
    $linhas = mysqli_num_rows($resultado);

    if ($linhas == 0): //Verifica se o tipo já existe

        //salvar imagem
        $destino = '../imagens/tipos/' . $_FILES['cImagem']['name'];
        $arquivo_tmp = $_FILES['cImagem']['tmp_name'];
        move_uploaded_file($arquivo_tmp, $destino );

        //inserir na tabela
        $sql = "INSERT INTO tipo (tipoNome, forca, fraqueza, imagem)
                VALUES ('$tipo', '$forca', '$fraqueza', '$destino')";

        if(mysqli_query($conexao, $sql)) {
            header('Location: ../gerenciar/gerenciarTipos.php?sucesso');
        } else {
            header('Location: ../gerenciar/gerenciarTipos.php?erro');
        }
    else:
        $_SESSION['tipoJaExiste'] = true; //Mostrar a mensagem
        header('Location: formularioTipo.php');
    endif;
else:
    header('Location: ../gerenciar/gerenciarTipos.php');
endif;