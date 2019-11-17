<?php
session_start();
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

    <body style="background-image: url(../imagens/fundo-login.jpg); background-size: cover;">

        <div class="valign-wrapper row" style="position: relative; min-height: 100vh;">
            <div class="card z-depth-3 container col s4 pull-s4">

                <h3 class="light">Novo Tipo</h3>

            <!-- FORMULÁRIO -->
                <form method="POST" action="cadastrarTipo.php" enctype="multipart/form-data" autocomplete="off">

                <!-- AVISO DE TIPO EXISTENTE -->
                   <?php
                    if(isset($_SESSION['naoAutenticado'])):
                    ?>
                    <blockquote>
                        <p>Usuário ou senha inválidos</p>
                    </blockquote>
                    <?php
                    endif;
                    unset($_SESSION['naoAutenticado']);
                    ?>

                <!-- TIPO -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">bubble_chart</i>
                        <input type="text" name="cTipo" placeholder="Tipo" required>
                    </div>
                    
                <!-- FORCA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">thumb_up</i>
                        <input type="text" name="cForca" placeholder="Força" required>
                    </div>

                <!-- CONFIRMAR SENHA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">thumb_down</i>
                        <input type="text" name="cFraqueza" placeholder="Fraqueza" required>
                    </div>

                <!-- IMAGEM -->
                    <div class="container col s12">
                        <div class="btn teal lighten-5 black-text col s12">
                            <input type="file" accept=".jpeg, .jpg, .png" name="cImagem" required>
                        </div>
                    </div>

                <!-- BOTÕES -->
                    <div class="file-field input-field col s12">
                        <button type="submit" class="btn" name="btnTipo"> Adicionar </button>
                        <a href="index.html" class="btn-flat black-text waves-effect"> Cancelar </a>
                    </div>
                </form>

                <br>
            </div>
        </div>
        <!--Materialize JS-->
        <script type="text/javascript" src="js/materialize.js"></script>
    </body>
</html>