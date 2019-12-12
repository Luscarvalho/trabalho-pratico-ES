<?php
include_once '../controller/controladorTreinador.php';
include_once '../model/Treinador.php';

$id = $_SESSION['treinadorLogado'];
if (isset($_SESSION['treinadorLogado'])):
    $treinador = new Treinador();
    $treinador = ControladorTreinador::getTreinadorById($id);
else:
    header('Location: index.php' );
endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Início</title>
    <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">   
    </head>

    <body>
    <!-- Menu -->
        <nav class="z-depth-1">
            <div class="container" style="padding: 0 20px 0 20px;">
                <a href="" class="brand-logo">Simulador de Batalhas Pokémon</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../controller/fazerLogout.php" class="btn white black-text">Sair<i class="material-icons right">close</i></a></li>
                </ul>
            </div>
        </nav>

    <!-- Navegacao -->
        <nav class="transparent z-depth-0">
            <div class="nav-wrapper container">
                <a class="breadcrumb grey-text"></a>
                <a href="" class="breadcrumb grey-text">Início</a>
            </div>
        </nav>
    
    <!-- Pagina -->
        <div class="container row">   
        <!-- Treinador -->
            <div class="card row transparent z-depth-0">
                <div class="row transparent valign-wrapper">

                <!-- Imagem -->
                    <div class="col s2">
                        <img src="<?php echo $treinador['foto']; ?>" class="circle" style="max-width: 100%;">
                    </div>

                <!-- Nome -->
                    <div class="col s7">
                        <blockquote>
                            <h5 class="grey-text">BEM VINDO DE VOLTA,</h5>
                            <h4 class="bold"><?php echo $treinador['treinadorNome']; ?></h4>
                        </blockquote>
                    </div>

                <!-- Botoes -->
                    <div class="col3 center">
                        <a href="batalhaOponente.php" class="btn-small pulse z-depth-1 orange" style="min-width: 100%;">
                            <b>Batalhar</b>
                        </a> <br>

                        <a href="construcao.html" class="btn-small z-depth-2" style="margin: 5px 0px 5px 0px;" style="min-width: 100%;">
                            <b>Suas batalhas</b>
                        </a> <br>

                        <a href="construcao.html" class="btn-small z-depth-2" style="min-width: 100%;">
                            <b>Editar perfil</b>
                        </a>
                    </div>
                    
                </div>
            </div>
                
        <!-- Dados do treinador -->
            <div class="card center">
                <div class="col s4 grey lighten-3">
                    <div class="card z-depth-0 transparent">
                        <h5>Nível: <b><?php echo $treinador['nivel']; ?></b></h5>
                    </div>
                </div>
                <div class="col s4 grey lighten-3">
                    <div class="card z-depth-0 transparent">
                        <h5>Vitórias: <b><?php echo $treinador['vitorias']; ?></b></h5>
                    </div>
                </div>  
                <div class="col s4 grey lighten-3">
                    <div class="card z-depth-0 transparent">
                        <h5>Derrotas: <b><?php echo $treinador['derrotas']; ?></b></h5>
                    </div>
                </div>
            </div>

        <!-- Pokemon -->
            <?php foreach(ControladorTreinador::getListaPokemon($id) as $pokemon): ?>
                <div class="col s4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?php echo $pokemon['imagem']; ?>">
                        </div>
                        <div class="card-content center">
                            <h5 class="light"><?php echo $pokemon['nomePokemon']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>  
    </body>
</html>