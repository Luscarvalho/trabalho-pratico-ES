<?php

include_once 'Tipo.php';
include_once 'Conexao.php';

class TipoDao {
    
    public function create(Tipo $tipo) {

        $sql = 'INSERT INTO tipo (tipoNome, forca, fraqueza, imagem) VALUES (?, ?, ?, ?)';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $tipo->getTipoNome());
        $stmt->bindParam(2, $tipo->getForca());
        $stmt->bindParam(3, $tipo->getFraqueza());
        $stmt->bindParam(4, $tipo->getImagem());

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../gerenciarTipos.php');
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } 
    }

    public function readAll() {
        $sql = 'SELECT * FROM tipo ORDER BY tipoNome';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return[];
        endif;
    }

    public function readName(String $tipoNome) {
        $sql = "SELECT * FROM tipo WHERE tipoNome = '$tipoNome'";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            return true;
        else:
            return false;
        endif;
    }

    public function update(Tipo $tipo) {

    }

    public function delete($id) {

    }



}

?>