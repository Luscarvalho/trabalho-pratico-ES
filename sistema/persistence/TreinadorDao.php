<?php
include_once '../model/Treinador.php';
include_once 'Conexao.php';

class TreinadorDao {
    public function create(Treinador $treinador) {
        $sql = 'INSERT INTO treinador (treinadorNome, senha, foto, vitorias, derrotas, nivel) 
                VALUES (?, ?, ?, ?, ?, ?)';
        $cadastrado = false;

        $nome = $treinador->getTreinadorNome();
        $senha = $treinador->getSenha();
        $foto = $treinador->getFoto();
        $vitorias = $treinador->getVitorias();
        $derrotas = $treinador->getDerrotas();
        $nivel = $treinador->getNivel();

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $senha);
        $stmt->bindParam(3, $foto);
        $stmt->bindParam(4, $vitorias);
        $stmt->bindParam(5, $derrotas);
        $stmt->bindParam(6, $nivel);
        
        if ($stmt->execute()):
            if ($stmt->rowCount() > 0):
                $cadastrado = true;
            else:
                echo "Mais de uma linha afetada";
            endif;
        else:
            echo "Erro ao cadastar";
        endif;

        if ($cadastrado):
            $_SESSION['usuarioLogado'] = $this->getIdByName($treinador->getTreinadorNome());
            header('Location: ../view/treinadorInicio.php');
        endif;
    }

    public function nomeExiste(String $treinadorNome) {
        $sql = "SELECT * FROM treinador WHERE treinadorNome = '$treinadorNome'";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            return true;
        else:
            return false;
        endif;
    }

    public function readAll() {
        $sql = "SELECT * FROM treinador";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return[];
        endif;
    }

    public function getIdByName(String $treinadorNome) {
        $sql = "SELECT treinadorId FROM treinador WHERE treinadorNome = '$treinadorNome'";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado[0];
    }
}

?>