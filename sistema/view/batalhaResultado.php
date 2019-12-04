<?php
include_once '../controller/controladorTreinador.php';

$vencedor = controladorTreinador::getTreinadorById($_SESSION['ganhadorId']);
$treinador = controladorTreinador::getTreinadorById($_SESSION['treinadorLogado']);
$oponente = controladorTreinador::getTreinadorById($_SESSION['oponente']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado</title>
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
                    <li><a href="treinadorInicio.php">Voltar</a></li>
                    <li><a href="../controller/fazerLogout.php" class="btn white black-text">Sair<i class="material-icons right">close</i></a></li>
                </ul>
            </div>
        </nav>

    <!-- Resultado -->
        <div class="container">
            <blockquote>
                <h2 class="light">O VENCEDOR É...</h2>
            </blockquote>
            <br>
        <!-- Vencedor -->
            <div class="card-panel row">
                <div class="container center">
                    <img src="<?php echo $vencedor['foto']; ?>" style="max-width: 50%" class="circle responsive-img">
                    <h2><?php echo $vencedor['treinadorNome']; ?></h2>
                    <br>
                    <hr>
                </div>
        
        <!-- Dados -->
                <blockquote style="margin-top: 50px;">
                    <h4>Novos Dados:</h4>
                </blockquote>
                <div class="container col s6 center">
                    <h5 class="grey-text"><?php echo $treinador['treinadorNome']; ?></h5>
                    <br>
                    <p>Nível: <b><?php echo $treinador['nivel']; ?></b></p>
                    <p>Vitórias: <b><?php echo $treinador['vitorias']; ?></b></p>
                    <p>Derrotas: <b><?php echo $treinador['derrotas']; ?></b></p>
                </div>
                
                <div class="container col s6 center">
                    <h5 class="grey-text"><?php echo $oponente['treinadorNome']; ?></h5>
                    <br>
                    <p>Nível: <b><?php echo $oponente['nivel']; ?></b></p>
                    <p>Vitórias: <b><?php echo $oponente['vitorias']; ?></b></p>
                    <p>Derrotas: <b><?php echo $oponente['derrotas']; ?></b></p>
                </div>
            </div>
        </div>

    </body>
</html>