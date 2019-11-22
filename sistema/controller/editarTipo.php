<?php
include_once '../model/TipoDao.php';
include_once '../model/Tipo.php';

$id = $_GET['id'];
$tipoNome = $_POST['cTipo'];
$forca = $_POST['cForca'];
$fraqueza = $_POST['cFraqueza'];

$tipo = new Tipo();
$tipo->setId($id);
$tipo->setTipoNome($tipoNome);
$tipo->setForca($forca);
$tipo->setFraqueza($fraqueza);

var_dump($tipo);

$tipoDao = new TipoDao();
$tipoDao->update($tipo);

?>