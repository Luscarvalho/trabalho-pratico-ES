<?php
    class Treinador {
        private $treinadorId;
        private $treinadorNome;
        private $senha;
        private $foto;
        private $vitorias;
        private $derrotas;
        private $nivel;

        public function __construct($id, $nome, $senha, $foto, $vitorias, $derrotas) {
            $this->treinadorId = $id;
            $this->treinadorNome = $nome;
            $this->senha = $senha;
            $this->foto = $foto;
            $this->vitorias = $vitorias;
            $this->derrotas = $derrotas;
            
            $nivel = intdiv(($vitorias - $derrotas), 3);
            if($nivel < 0)
                $nivel = 0;
            $this->nivel = $nivel;
        }        
    
    //GETS---------------------------------------------------------------------
        public function getTreinadorId() {
            return $this->treinadorId;
        }

        public function getTreinadorNome() {
            return $this->treinadorNome;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function getVitorias() {
            return $this->vitorias;
        }

        public function getDerrotas() {
            return $this->derrotas;
        }

        public function getNivel() {
            return $this->nivel;
        }

    //SETS---------------------------------------------------------------------
        public function setTreinadorNome($nome) {
            $this->treinadorNome = $nome;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }

        public function setVitorias($vitorias) {
            $this->vitorias = $vitorias;
            $this->setNivel();
        }

        public function setDerrotas($derrotas) {
            $this->derrotas = $derrotas;
            $this->setNivel();
        }
        
        private function setNivel() {
            $nivel = intdiv(($this->vitorias - $this->derrotas), 3);
            if($nivel < 0)
                $nivel = 0;
            $this->nivel = $nivel;
        }
    }
?>