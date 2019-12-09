<?php
include_once 'Conexao.php';
include_once '../model/Batalha.php';

class BatalhaDao {
    public function create(Batalha $batalha) {
        $sql = 'INSERT INTO batalha (treinador1, treinador2, vencedor) VALUES (?, ?, ?)';
        
        $treinador1 = $batalha->getTreinador1();
        $treinador2 = $batalha->getTreinador2();
        $vencedor = $batalha->getVencedor();
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $treinador1);
        $stmt->bindParam(2, $treinador2);
        $stmt->bindParam(3, $vencedor);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/batalhaResultado.php');
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } 
    }

    public function readAll() {
        $sql = 'SELECT * FROM batalha';
        
        $stmt = Conexao::getConn()->prepare($sql);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } else {
                return [];
            }
        } 
    }

    public function getById($id) {
        $sql = 'SELECT * FROM batalha WHERE batalhaId=?';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado[0];
            } else {
                echo "Erro ao listar batalhas";
            }
        } 
    }

    public function delete($id) {
        $sql = 'DELETE FROM batalha WHERE batalhaId=?';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/gerenciarBatalhas.php');
            } else {
                echo "Erro ao tentar remover";
            }
        }
    }
}

?>