<?php

class Batalha {
    private $batalhaId;
    private $treinador1;
    private	$treinador2;
    private $vencedor;

    public function getBatalhaId() {
        return $this->batalhaId;
    }

    public function getTreinador1() {
        return $this->treinador1;
    }

    public function getTreinador2() {
        return $this->treinador2;
    }

    public function getVencedor() {
        return $this->vencedor;
    }

    public function setBatalhaId(int $id) {
        $this->batalhaId = $id;
    }

    public function setTreinador1($id) {
        $this->treinador1 = $id;
    }

    public function setTreinador2($id) {
        $this->treinador2 = $id;
    }

    public function setVencedor($id) {
        $this->vencedor = $id;
    }
}

?>