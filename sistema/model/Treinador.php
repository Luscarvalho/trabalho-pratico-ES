<?php

class Treinador {
    private $treinadorId;
    private $treinadorNome;
    private $senha;
    private $foto;
    private $vitorias;
    private $derrotas;
    private $nivel;

    public function getTreinadorId(){
        return $this->treinadorId;
    }

    public function getTreinadorNome(){
        return $this->treinadorNome;
    } 

    public function getSenha(){
        return $this->senha;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function getVitorias(){
        return $this->vitorias;
    }

    public function getDerrotas(){
        return $this->derrotas;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function setTreinadorId ($id){
        $this->treinadorId = $id;
    }

    public function setTreinadorNome ($nome){
        $this->treinadorNome = $nome;
    }

    public function setSenha ($senha){
        $this->senha = $senha;
    }

    public function setFoto ($foto){
        $this->foto = $foto;
    }

    public function setVitorias ($vitorias){
        $this->vitorias = $vitorias;
    }

    public function setDerrotas ($derrotas){
        $this->derrotas = $derrotas;
    }

    public function setNivel ($nivel){
        $this->nivel = $nivel;
    }
}

?>