<?php
session_start();
include_once '../persistence/PokemonDao.php';
include_once '../model/Pokemon.php';
include_once '../persistence/TipoDao.php';

class ControladorPokemon {
    public function criarPokemon() {
        $pokemonDao = new PokemonDao();
        $pokemonNome = $_POST['cPokemonNome'];
        
        if($pokemonDao->readName($pokemonNome)): //O pokemon já está cadastrado
            $_SESSION['pokemonJaCadastrado'] = true;
            header('Location: ../view/formularioNovoPokemon.php');
            
        else:
            $tipo = TipoDao::readIdByName($_POST['cTipoPokemon']);
            
            //Salvar imagem
            $imagem = '../imagens/pokemon/'.$_FILES['cImagem']['name'];
            $arquivo_tmp = $_FILES['cImagem']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $imagem );
        
            //Criar pokemon
            $pokemon = new Pokemon;
            $pokemon->setPokemonNome($pokemonNome);
            $pokemon->setImagem($imagem);
            $pokemon->setTipoId($tipo);

            //Salvar no BD
            $pokemonDao->create($pokemon);
        endif;
    }

    public function listarPokemon() {
        $pokemonDao = new PokemonDao();
        return $pokemonDao->readAll();
    }

    public function removerPokemon() {
        $id = $_GET['id'];

        $pokemonDao = new PokemonDao();
        $pokemonDao->delete($id);
    }

    public function getTipoById($id) {
        $tipoDao = new TipoDao();
        return $tipoDao->readId($id);
    }

    public function getById($id) {
        $pokemonDao = new PokemonDao;
        return $pokemonDao->readId($id);
    }
}


//Seleciona qual função irá ser usada
if(isset($_GET['btn'])) {
    switch ($_GET['btn']) {
        case "cadastrarPokemon":
            $controladorPokemon = new ControladorPokemon;
            $controladorPokemon->criarPokemon($_POST);
        break;

        case "removerPokemon":
            $controladorPokemon = new ControladorPokemon();
            $controladorPokemon->removerPokemon($_POST);
        break;
    
    }
}

?>