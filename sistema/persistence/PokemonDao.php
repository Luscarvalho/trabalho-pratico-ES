<?php
include_once '../model/Pokemon.php';
include_once 'Conexao.php';

class PokemonDao {
    
    public function create(Pokemon $pokemon) {
        $sql = 'INSERT INTO pokemon (nomePokemon, imagem, tipoId) VALUES (?, ?, ?)';
        
        $nome = $pokemon->getPokemonNome();
        $imagem = $pokemon->getImagem();
        $tipo = $pokemon->getTipoId();
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $imagem);
        $stmt->bindParam(3, $tipo);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/gerenciarPokemon.php');
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } 
    }

    public function readAll() {
        $sql = 'SELECT * FROM pokemon ORDER BY nomePokemon';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return[];
        endif;
    }

    public function readId($pokemonId) {
        $sql = 'SELECT * FROM pokemon WHERE pokemonId=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $pokemonId);
        
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado[0];
        else:
            return[];
        endif;
    }

    public function readName($pokemonNome) {
        $sql = 'SELECT * FROM pokemon WHERE nomePokemon=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $pokemonNome);
        
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado[0];
        else:
            return[];
        endif;
    }

    public function delete(int $id) {
        $sql = 'DELETE FROM pokemon WHERE pokemonId=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: ../view/gerenciarPokemon.php');
            } else {
                echo "Erro ao tentar remover";
            }
        } 
    }

    public function readAllByTipo(int $id) {
        $sql = 'SELECT * FROM pokemon WHERE tipoId=?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return[];
        endif;
    }
}

?>