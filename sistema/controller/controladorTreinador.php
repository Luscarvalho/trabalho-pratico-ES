<?php 
session_start();
include_once '../persistence/TreinadorDao.php';
include_once '../model/Treinador.php';

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
        case "cadastrarTreinador":
            $ControladorTreinador = new ControladorTreinador();
            $ControladorTreinador->criarTreinador($_POST);
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