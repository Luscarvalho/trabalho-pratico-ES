<?php 
session_start();
include_once '../persistence/TipoDao.php';
include_once '../persistence/PokemonDao.php';
include_once '../model/Tipo.php';

class ControladorTipo {
    public function criarTipo() {
        $tipoDao = new TipoDao();
        $tipoNome = $_POST['cTipo'];
        
        if($tipoDao->readName($tipoNome)): //O tipo já está cadastrado
            $_SESSION['tipoJaExiste'] = true;
            header('Location: ../view/formularioNovoTipo.php');
            
        else:
            $forca = $_POST['cForca'];
            $fraqueza = $_POST['cFraqueza'];
        
            //Salvar imagem
            $imagem = '../imagens/tipos/'.$_FILES['cImagem']['name'];
            $arquivo_tmp = $_FILES['cImagem']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $imagem );
        
            //Criar tipo
            $tipo = new Tipo;
            $tipo->setTipoNome($tipoNome);
            $tipo->setForca($forca);
            $tipo->setFraqueza($fraqueza);
            $tipo->setImagem($imagem);
        endif;
        
        //Salvar no BD
        $tipoDao->create($tipo);
    }

    public function editarTipo() {
        $id = $_GET['id'];
        $tipoNome = $_POST['cTipo'];
        $forca = $_POST['cForca'];
        $fraqueza = $_POST['cFraqueza'];
        
        $tipo = new Tipo();
        $tipo->setId($id);
        $tipo->setTipoNome($tipoNome);
        $tipo->setForca($forca);
        $tipo->setFraqueza($fraqueza);
        
        $tipoDao = new TipoDao();
        $tipoDao->update($tipo);
    }

    public function listarTipo() {
        $tipoDao = new TipoDao();
        return $tipoDao->readAll();
    }

    public function removerTipo() {
        $id = $_GET['id'];

        foreach (PokemonDao::readAllByTipo($id) as $pokemon):
            PokemonDao::delete($pokemon['pokemonId']);
        endforeach;

        $tipoDao = new TipoDao();
        $tipoDao->delete($id);
    }

    public function getById($id) {
        $tipoDao = new TipoDao();
        $tipo = new Tipo();
        $tipo = $tipoDao->readId($id)[0];
        return $tipo;
    }
}


//Seleciona qual função irá ser usada
if(isset($_GET['btn'])) {
    switch ($_GET['btn']) {
        case "cadastrarTipo":
            $ControladorTipo = new ControladorTipo();
            $ControladorTipo->criarTipo($_POST);
        break;
            
        case "removerTipo":
            $ControladorTipo = new ControladorTipo();
            $ControladorTipo->removerTipo($_POST);
        break;

        case "editarTipo";
            $ControladorTipo = new ControladorTipo();
            $ControladorTipo->editarTipo($_POST);
        break;
    }
}

?>