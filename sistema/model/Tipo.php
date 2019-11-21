<?php

class Tipo {
    private $id;
    private $tipoNome;
    private	$forca;
    private	$fraqueza;
    private $imagem; //Apenas o caminho

    public function getId() {
        return $this->id;
    }

    public function getTipoNome() {
        return $this->tipoNome;
    }

    public function getForca() {
        return $this->forca;
    }

    public function getFraqueza() {
        return $this->fraqueza;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTipoNome($nome) {
        $this->tipoNome = $nome;
    }

    public function setForca($forca) {
        $this->forca = $forca;
    }

    public function setFraqueza($fraqueza) {
        $this->fraqueza = $fraqueza;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}

?>