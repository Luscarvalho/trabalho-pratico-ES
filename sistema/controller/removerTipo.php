<?php
include_once '../model/TipoDao.php';

$id = $_GET['id'];

$tipoDao = new TipoDao();
$tipoDao->delete($id);

?>