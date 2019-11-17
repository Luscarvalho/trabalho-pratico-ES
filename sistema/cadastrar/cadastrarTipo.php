<?php
require_once '../estruturas/conexao.php';

if(isset($_POST['btnTipo'])):
    $tipo = mysqli_escape_string($conexao, $_POST['cTipo']);
    $forca = mysqli_escape_string($conexao, $_POST['cForca']);
    $fraqueza = mysqli_escape_string($conexao, $_POST['cFraqueza']);    
    
    //salvar imagem
    $destino = '../imagens/tipos/' . $_FILES['cImagem']['name'];
    $arquivo_tmp = $_FILES['cImagem']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $destino );

    //inserir na tabela
    $sql = "INSERT INTO tipo (tipoNome, forca, fraqueza, imagem)
            VALUES ('$tipo', '$forca', '$fraqueza', '$destino')";

    if(mysqli_query($conexao, $sql)) {
        header('Location: ../gerenciar/gerenciarTipos.html?sucesso');
    } else {
        header('Location: ../gerenciar/gerenciarTipos.html?erro');
    }
endif;