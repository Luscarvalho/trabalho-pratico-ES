<?php 

require_once '../Sistema/controller/controladorTreinador.php';

class TestControladorTreinador extends PHPUnit\Framework\TestCase {
    public function testGetTreinadorByName() {
        $controladorTreinador = new controladorTreinador();
        $this->assertEquals(15, $controladorTreinador->getTreinadorByName('Marvin')['treinadorId']);
    }

    public function testGetTreinadorById() {
        $controladorTreinador = new controladorTreinador();
        $this->assertEquals('Enzo', $controladorTreinador->getTreinadorById(16)['treinadorNome']);
    }
}
?>