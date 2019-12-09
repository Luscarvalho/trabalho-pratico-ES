<?php 

require_once '../controller/controladorTreinador.php';

class TestControladorTreinador extends PHPUnit\Framework\TestCase {
    public function testGetTreinadorByName() {
        $controladorTreinador = new controladorTreinador();
        $this->assertEquals(15, $controladorTreinador->getTreinadorByName('Marvin')['treinadorId']);
    }

    public function testGetTreinadorById() { //Erro, 'Enzo'
        $controladorTreinador = new controladorTreinador();
        $this->assertEquals('Valentina', $controladorTreinador->getTreinadorById(16)['treinadorNome']);
    }
}
?>