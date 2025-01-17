<?php
include_once '../model/Tipo.php';
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
                header('Location: ../view/gerenciarTipos.php');
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

    public function readId(int $tipoId) {
        $sql = "SELECT * FROM tipo WHERE tipoId = '$tipoId'";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado[0];
        else:
            return [];
        endif;
    }

    public function update(Tipo $tipo) {
        $sql = 'UPDATE tipo SET forca=?, fraqueza=? WHERE tipoId=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $tipo->getForca());
        $stmt->bindValue(2, $tipo->getFraqueza());
        $stmt->bindValue(3, $tipo->getId());

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/gerenciarTipos.php');
            } else {
                echo "Erro ao tentar efetivar a atualização";
            }
        } 
    }

    public function delete(int $id) {
        $sql = 'DELETE FROM tipo WHERE tipoId=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
    
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/gerenciarTipos.php');
            } else {
                echo "Erro ao tentar remover";
            }
        } 
    }

    public function readIdByName(String $tipoNome) {
        $sql = "SELECT * FROM tipo WHERE tipoNome = '$tipoNome'";
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado[0]['tipoId'];
        endif;
    }

    public function readByName(String $nome) {
        $sql = "SELECT * FROM tipo WHERE tipoNome = '$nome'";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }
}

?>