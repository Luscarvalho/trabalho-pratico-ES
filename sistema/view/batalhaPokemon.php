<?php
include_once '../controller/controladorTreinador.php';

$treinador = ControladorTreinador::getListaPokemon($_SESSION['treinadorLogado']);
$oponente = ControladorTreinador::getListaPokemon($_GET['oponente']);
$_SESSION['oponente'] = $_GET['oponente'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escolher Pokémon</title>
    <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body>
    <!-- Menu -->
        <nav class="z-depth-1">
            <div class="container" style="padding: 0 20px 0 20px;">
                <a href="inicio.html" class="brand-logo">Simulador de Batalhas Pokémon</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="batalhaOponente.php">Voltar</a></li>
                    <li><a href="../controller/fazerLogout.php" class="btn white black-text">Sair<i class="material-icons right">close</i></a></li>
                </ul>
            </div>
        </nav>

    <!-- Navegacao -->
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="col s12 z-depth-0"></div>
                    <a href="treinadorInicio.php" class="breadcrumb grey-text">Início</a>
                    <a href="batalhaOponente.php" class="breadcrumb grey-text">Escolher Oponente</a>
                    <a href="" class="breadcrumb grey-text">Escolher Pokémon</a>
                </div>
            </div>
        </nav>

        <form method="POST" action="../controller/controladorBatalha.php?btn=batalhar">
            <div class="row" style="padding: 50px">
                <!-- Voce --> 
                <div class="container col s6">
                    <div class="card" style="padding: 20px">
                        <blockquote>
                            <h4>Você</h4>
                        </blockquote>

                        <?php foreach($treinador as $pokemon): ?>
                            <div class="row valign-wrapper">
                                <div class="col s6 center">
                                    <img src="<?php echo $pokemon['imagem']; ?>" class="responsive-img" style="max-width: 150px;">
                                </div>
                                <div class="col s6 left">
                                    <label>
                                        <input name="cVoce" class="with-gap" type="radio" value="<?php echo $pokemon['pokemonId']; ?>">
                                        <span><?php echo $pokemon['nomePokemon']; ?></span>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>                                                         
                    </div>
                </div>

            <!-- Oponente -->
                <div class="container col s6">
                    <div class="card" style="padding: 20px">
                        <blockquote>
                            <h4>Oponente</h4>
                        </blockquote>

                        <?php foreach($oponente as $pokemon): ?>
                            <div class="row valign-wrapper">
                                <div class="col s6 center">
                                    <img src="<?php echo $pokemon['imagem']; ?>" class="responsive-img" style="max-width: 150px;">
                                </div>
                                <div class="col s6 left">
                                    <label>
                                        <input name="cOponente" class="with-gap" type="radio" value="<?php echo $pokemon['pokemonId']; ?>">
                                        <span><?php echo $pokemon['nomePokemon']; ?></span>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>  

                    </div>                                                                    

                </div>
            </div>
            <div class="s12 center" style="margin-top: -50px;">
                <button type="submit" class="btn-large wave-effect red">Iniciar Batalha</button>
                <a href="inicio.html" class="btn-large btn-flat white">CANCELAR</a>
            </div>
            <br>
        </form>

    <!--Materialize JS-->
        <script type="text/javascript" src="../js/materialize.js">
        </script>

        <script>
            M.AutoInit();
        </script>
    </body>
<html>