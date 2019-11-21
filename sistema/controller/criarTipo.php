<?php

include_once '../model/Tipo.php';
include_once '../model/TipoDao.php';

session_start();

$tipoNome = $_POST['cTipo'];
$forca = $_POST['cForca'];
$fraqueza = $_POST['cFraqueza'];

//Salvar imagem
$imagem = 'tipos/'.$_FILES['cImagem']['name'];
$arquivo_tmp = $_FILES['cImagem']['tmp_name'];
move_uploaded_file($arquivo_tmp,'../imagens/'. $imagem );

//Criar tipo
$tipo = new Tipo;
$tipo->setTipoNome($tipoNome);
$tipo->setForca($forca);
$tipo->setFraqueza($fraqueza);
$tipo->setImagem($imagem);

//Salvar no BD
$tipoDao = new TipoDao();
$tipoDao->create($tipo);

?>