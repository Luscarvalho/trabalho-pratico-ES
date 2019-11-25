<?php

class Tipo {
    private $pokemonId;
    private $pokemonNome;
    private	$tipoId;
    private $imagem; //Apenas o caminho

    public function getPokemonId() {
        return $this->pokemonId;
    }

    public function getPokemonNome() {
        return $this->pokemonNome;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setPokemonId($pokemonId) {
        $this->pokemonId = $pokemonId;
    }

    public function setPokemonNome($nome) {
        $this->pokemonNome = $nome;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}

?>