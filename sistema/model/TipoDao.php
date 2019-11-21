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
                echo "Dados cadastrados com sucesso!";
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    }

    public function readAll() {
        $sql = 'SELECT * FROM tipo';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    }

    public function readName($tipoNome) {

    }

    public function update(Tipo $tipo) {

    }

    public function delete($id) {

    }



}

?>