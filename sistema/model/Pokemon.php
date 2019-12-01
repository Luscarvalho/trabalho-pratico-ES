<?php

class Pokemon {
    private $id;
    private $pokemonNome;
    private	$tipoId;
    private $imagem; //Apenas o caminho

    public function getId() {
        return $this->id;
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

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setPokemonNome($nome) {
        $this->pokemonNome = $nome;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setTipoId($tipoId) {
        $this->tipoId = $tipoId;
    }
}

?>