<?php
include_once '../model/TipoDao.php';

$tipo;
if(isset($_GET['id'])):
    $id = $_GET['id'];
    $tipoDao = new TipoDao();
    $tipo = $tipoDao->readId($id)[0];
endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar Tipo</title>
        <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body style="background-image: url(imagens/fundo-login.jpg); background-size: cover;">

        <div class="valign-wrapper row" style="position: relative; min-height: 100vh;">
            <div class="card z-depth-3 container col s4 pull-s4">

                <h3 class="light">Novo Tipo</h3>

            <!-- FORMULÁRIO -->
                <form method="POST" action="../controller/controladorTipo.php?id=<?php echo $tipo['tipoId']; ?>&btn=editarTipo" autocomplete="off">

                <!-- TIPO -->
                    <input type="hidden" name="cTipo" placeholder="Tipo" value="<?php echo $tipo['tipoNome']; ?>" required>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">bubble_chart</i>
                        <input type="text" placeholder="Tipo" value="<?php echo $tipo['tipoNome']; ?>" disabled>
                    </div>
                    
                <!-- FORÇA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">thumb_up</i>
                        <input type="text" name="cForca" placeholder="Força" value="<?php echo $tipo['forca']; ?>" required>
                    </div>

                <!-- CONFIRMAR SENHA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">thumb_down</i>
                        <input type="text" name="cFraqueza" placeholder="Fraqueza" value="<?php echo $tipo['fraqueza']; ?>" required>
                    </div>

                <!-- IMAGEM -->
                    <div class="container col s12">
                        <div class="btn teal lighten-5 black-text col s12">
                            <input type="file" accept=".jpeg, .jpg, .png" name="cImagem" value="<?php echo $tipo['imagem']; ?>" disabled>
                        </div>
                    </div>

                <!-- BOTÕES -->
                    <div class="file-field input-field col s12">
                        <button type="submit" class="btn" name="btnTipo"> Editar </button>
                        <a href="gerenciarTipos.php" class="btn-flat black-text waves-effect"> Cancelar </a>
                    </div>
                </form>

                <br>
            </div>
        </div>
        <!--Materialize JS-->
        <script type="text/javascript" src="js/materialize.js"></script>
    </body>
</html>