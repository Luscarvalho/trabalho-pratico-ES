<?php

include_once '../model/Tipo.php';
include_once '../model/TipoDao.php';

session_start();

$tipoDao = new TipoDao();
$tipoNome = $_POST['cTipo'];

if($tipoDao->readName($tipoNome)): //O tipo já está cadastrado
    $_SESSION['tipoJaExiste'] = true;
    header('Location: ../formularioTipo.php');
    
else:
    $forca = $_POST['cForca'];
    $fraqueza = $_POST['cFraqueza'];

    //Salvar imagem
    $imagem = 'imagens/tipos/'.$_FILES['cImagem']['name'];
    $arquivo_tmp = $_FILES['cImagem']['tmp_name'];
    move_uploaded_file($arquivo_tmp, '../'.$imagem );

    //Criar tipo
    $tipo = new Tipo;
    $tipo->setTipoNome($tipoNome);
    $tipo->setForca($forca);
    $tipo->setFraqueza($fraqueza);
    $tipo->setImagem($imagem);
endif;

//Salvar no BD
$tipoDao->create($tipo);
?>