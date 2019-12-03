<?php

class Treinador_pokemonDao {
    public function create($idTreinador, $pokemon) {
        $sql = 'INSERT INTO treinador_pokemon (treinadorId, pokemon1, pokemon2, pokemon3, pokemon4, pokemon5, pokemon6) 
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        $cadastrado = false;

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(1, $idTreinador);
        $stmt->bindParam(2, $pokemon[0]);
        $stmt->bindParam(3, $pokemon[1]);
        $stmt->bindParam(4, $pokemon[2]);
        $stmt->bindParam(5, $pokemon[3]);
        $stmt->bindParam(6, $pokemon[4]);
        $stmt->bindParam(7, $pokemon[5]);

        if ($stmt->execute()):
            if ($stmt->rowCount() > 0):
                $cadastrado = true;
            else:
                echo "Mais de uma linha afetada";
            endif;
        else:
            echo "Erro ao criar relação";
        endif;
    }
}

?>