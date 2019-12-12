<?php
include_once '../model/Batalha.php';
include_once '../persistence/BatalhaDao.php';
include_once '../controller/controladorTreinador.php';
include_once '../persistence/TipoDao.php';
include_once '../persistence/PokemonDao.php';
include_once '../persistence/TreinadorDao.php';

class ControladorBatalha {
    public function batalhar() {
        $t1 = TreinadorDao::readById($_SESSION['treinadorLogado']);
        $t2 = TreinadorDao::readById($_SESSION['oponente']);

        $pokemon1 = $_POST['cVoce'];
        $pokemon2 = $_POST['cOponente'];

        $tipo1 = PokemonDao::readId($pokemon1)['tipoId'];
        $tipo2 = PokemonDao::readId($pokemon2)['tipoId'];

        $vantagemP1 = $this->calcularVantagem($tipo1, $tipo2);
        $vantagemP2 = $this->calcularVantagem($tipo2, $tipo1);

        $desvantagemP1 = $this->calcularDesvantagem($tipo1, $tipo2);
        $desvantagemP2 = $this->calcularDesvantagem($tipo2, $tipo1);
        
        $vantagemT1 = 1 + ($t1['nivel'] / 10);
        $vantagemT2 = 1 + ($t2['nivel'] / 10);

        $ataqueP1 = $vantagemP1 * $desvantagemP1 * $vantagemT1;
        $ataqueP2 = $vantagemP2 * $desvantagemP2 * $vantagemT2;

        if($ataqueP1 <= $ataqueP2): //Empate ou t2 ganhou
            $_SESSION['ganhador'] = "Oponente";
            $_SESSION['ganhadorId'] = $_SESSION['oponente'];
        else:
            $_SESSION['ganhador'] = "Treinador";
            $_SESSION['ganhadorId'] = $_SESSION['treinadorLogado'];
        endif;
        
        $this->atualizarTreinadores();
        $this->cadastrarBatalha();
    }

    public function calcularVantagem($p1, $p2) {
        $tipoP1 = TipoDao::readId($p1);
        $tipoP2 = TipoDao::readId($p2);

        if($tipoP1['forca'] == $tipoP2['tipoNome']):
            return 1.5;
        else:
            return 1;
        endif;
    }

    public function calcularDesvantagem($tipo1, $tipo2) {
        $tipoP1 = TipoDao::readId($tipo1);
        $tipoP2 = TipoDao::readId($tipo2);

        if($tipoP1['fraqueza'] == $tipoP2['tipoNome']):
            return 0.5;
        else:
            return 1;
        endif;
    }

    public function atualizarTreinadores() {
        $contolador = new controladorTreinador();
        if($_SESSION['ganhador'] == "Oponente"):
            $contolador->atualizarDados($_SESSION['treinadorLogado'], "derrota");
            $contolador->atualizarDados($_SESSION['oponente'], "vitoria");

        elseif($_SESSION['ganhador'] == "Treinador"):
            $contolador->atualizarDados($_SESSION['treinadorLogado'], "vitoria");
            $contolador->atualizarDados($_SESSION['oponente'], "derrota");
        endif;
    }

    public function cadastrarBatalha() {
        $batalha = new Batalha();
        $batalhaDao = new BatalhaDao();

        $batalha->setTreinador1($_SESSION['treinadorLogado']);
        $batalha->setTreinador2($_SESSION['oponente']);

        if($_SESSION['ganhador'] == "Oponente"):
            $batalha->setVencedor($_SESSION['oponente']);

        elseif($_SESSION['ganhador'] == "Treinador"):
            $batalha->setVencedor($_SESSION['treinadorLogado']);
        endif;

        $batalhaDao->create($batalha);
    }

    public function listarBatalhas() {
        $batalhaDao = new BatalhaDao();
        return $batalhaDao->readAll();
    }

    public function remover() {
        $batalha = $this->getBatalha($_GET['id']);
        $batalhaDao = new BatalhaDao();

        $treinadorControle = new controladorTreinador();
        $treinador = $treinadorControle->getTreinadorById($batalha['treinador1']);
        $oponente = $treinadorControle->getTreinadorById($batalha['treinador2']);
        $vencedor = $treinadorControle->getTreinadorById($batalha['vencedor']);

        if($treinador['treinadorId'] == $vencedor['treinadorId']):
            $treinadorControle->reduzirVitorias($treinador['treinadorId']);
            $treinadorControle->reduzirDerrotas($oponente['treinadorId']);
        else:
            $treinadorControle->reduzirVitorias($oponente['treinadorId']);
            $treinadorControle->reduzirDerrotas($treinador['treinadorId']);
        endif;

        return $batalhaDao->delete($_GET['id']);
    }

    public function getBatalha($id) {
        $batalhaDao = new BatalhaDao();
        return $batalhaDao->getById($id);
    }

    public function alterarVencedor() {
        $batalha = $this->getBatalha($_GET['id']);
        
        $treinadorId = $batalha['treinador1'];
        $oponenteId = $batalha['treinador2'];
        $vencedorId = $batalha['vencedor'];

        if($vencedorId == $treinadorId) {
            $_SESSION['ganhador'] = "Oponente";
            $_SESSION['ganhadorId'] = $oponenteId;
        } else { 
            $_SESSION['ganhador'] = "Treinador";
            $_SESSION['ganhadorId'] = $treinadorId;   
        }
 
        BatalhaDao::update($_SESSION['ganhadorId'], $_GET['id']);
    }
}

if(isset($_GET['btn'])):
    switch ($_GET['btn']) {
        case "batalhar":
            $ControladorBatalha = new ControladorBatalha();
            $ControladorBatalha->batalhar($_POST);
        break;
        case "removerBatalha":
            $ControladorBatalha = new ControladorBatalha();
            $ControladorBatalha->remover($_POST);
        break;
        case "atualizarBatalha":
            $ControladorBatalha = new ControladorBatalha();
            $ControladorBatalha->alterarVencedor($_POST);
    }
endif;
?>