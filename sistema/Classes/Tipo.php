<?php
    class Tipo {
        private $tipo;
        private $forca;
        private $fraqueza;

        public function __construct($tipo, $forca, $fraqueza) {
            $this->tipo = $tipo;
            $this->forca = $forca;
            $this->fraqueza = $fraqueza;
        }

        public function calcularVantagem($tipoContra) {
            if ($this->forca == $tipoContra->tipo) {       //O tipo é forte, retorna 5% de vantagem
                return 1.05;
            } elseif ($this->fraco == $tipoContra->tipo) { //O tipo é fraco, retorna 5% de desvantagem
                return -0.95;
            } else {                                       //O tipo não tem relação, mantem
                return 1;
            }
        }
    }
?>