<?php 
session_start();
include_once '../model/Treinador.php';
include_once '../persistence/TreinadorDao.php';
include_once '../persistence/Treinador_pokemonDao.php';
include_once '../persistence/PokemonDao.php';

class controladorTreinador {
    public function criarTreinador() {
        $treinadorDao = new TreinadorDao();
        $treinador = new Treinador;

        $treinadorNome = $_POST['cNome'];
        $senha = $_POST['cSenha'];
        
        if($treinadorDao->nomeExiste($treinadorNome)): //O treinador já está cadastrado
            $_SESSION['nomeExistente'] = true;
            header('Location: ../view/formularioNovoTreinador.php');
        
        elseif($_POST['cSenha'] != $_POST['cConfirmar']): //Senhas diferentes
            $_SESSION['senhasDiferentes'] = true;
            header('Location: ../view/formularioNovoTreinador.php');

        else:
            //Salvar foto
            $foto = '../imagens/perfil/'.$_FILES['cFoto']['name'];
            $arquivo_tmp = $_FILES['cFoto']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $foto );
        
            //Criar treinador
            $treinador->setTreinadorNome($treinadorNome);
            $treinador->setSenha($senha);
            $treinador->setFoto($foto);
            $treinador->setVitorias(0);
            $treinador->setDerrotas(0);
            $treinador->setNivel(0);
        endif;
        
        //Salvar no BD
        $treinadorDao->create($treinador);
    }

    public function listarTreinador() {
        $tipoDao = new TipoDao();
        return $tipoDao->readAll();
    }

    public function getTreinadorById($id) {
        $treinadorDao = new TreinadorDao();
        return $treinadorDao->readById($id);
    }

    public function getTreinadorByName($nome) {
        $treinadorDao = new TreinadorDao();
        return $treinadorDao->getByName($nome);
    }

    public function addPokemon() {
        $relacao = new Treinador_pokemonDao();
        $treinador = $_SESSION['treinadorLogado'];

        $p1 = $_POST['cPokemon1'];
        $p2 = $_POST['cPokemon2'];
        $p3 = $_POST['cPokemon3'];
        $p4 = $_POST['cPokemon4'];
        $p5 = $_POST['cPokemon5'];
        $p6 = $_POST['cPokemon6'];
        
        $listaNomePokemon = array($p1, $p2, $p3, $p4, $p5, $p6);
        $listaIdPokemon = array();

        $pokemonDao = new PokemonDao();
        foreach($listaNomePokemon as $nomePokemon):
            array_push($listaIdPokemon, $pokemonDao->readName($nomePokemon)['pokemonId']);
        endforeach;
        
        $relacao->create($treinador, $listaIdPokemon);
    }
}


//Seleciona qual metodo irá ser usado
if(isset($_GET['btn'])):
    switch ($_GET['btn']) {
        case "cadastrarTreinador":
            $ControladorTreinador = new ControladorTreinador();
            $ControladorTreinador->criarTreinador($_POST);
        break;

        case "addPokemon":
            $ControladorTreinador = new controladorTreinador();
            $ControladorTreinador->addPokemon($_POST);
        break;
    }
endif;

?>