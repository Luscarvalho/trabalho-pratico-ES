<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar Pokémon</title>
        <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body style="background-image: url(imagens/fundo-login.jpg); background-size: cover;">

        <div class="valign-wrapper row" style="position: relative; min-height: 100vh;">
            <div class="card z-depth-3 container col s4 pull-s4">

                <h3 class="light">Novo Pokémon</h3>

            <!-- FORMULÁRIO -->
                <form method="POST" action="" enctype="multipart/form-data" autocomplete="off">

                <!-- AVISO DE POKÉMON EXISTENTE -->
                    <?php
                    if(isset($_SESSION[''])):
                    ?>
                    <blockquote>
                        <p>Esse pokémon já está caadastrado, tente novamente!</p>
                    </blockquote>
                    <?php
                    endif;
                    unset($_SESSION['']);
                    ?>

                <!-- AVISO DE TIPO INEXISTENTE -->
                    <?php
                    if(isset($_SESSION[''])):
                    ?>
                    <blockquote>
                        <p>Esse tipo não existe, tente novamente!</p>
                    </blockquote>
                    <?php
                    endif;
                    unset($_SESSION['']);
                    ?>

                <!-- NOME -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">pets</i>
                        <input type="text" name="" placeholder="Nome do Pokémon" required>
                    </div>
                    
                <!-- TIPO -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">bubble_chart</i>
                        <input type="text" name="" placeholder="Tipo do Pokémon" required>
                    </div>

                <!-- IMAGEM -->
                    <div class="container col s12">
                        <div class="btn teal lighten-5 black-text col s12">
                            <input type="file" accept=".jpeg, .jpg, .png" name="" required>
                        </div>
                    </div>

                <!-- BOTÕES -->
                    <div class="file-field input-field col s12">
                        <button type="submit" class="btn" name=""> Adicionar </button>
                        <a href="gerenciarPokemon.php" class="btn-flat black-text waves-effect"> Cancelar </a>
                    </div>
                </form>

                <br>
            </div>
        </div>
        <!--Materialize JS-->
        <script type="text/javascript" src="js/materialize.js"></script>
    </body>
</html>