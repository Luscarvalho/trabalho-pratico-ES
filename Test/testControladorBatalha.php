<?php
include_once '../Sistema/controller/controladorBatalha.php';

class TestControladorBatalha extends PHPUnit\Framework\TestCase{
    public function testGetTreinadorById() {
        $controladorBatalha = new controladorBatalha();
        $this->assertEquals(1.5, $controladorBatalha->calcularVantagem(47, 44));
    }
}

?>