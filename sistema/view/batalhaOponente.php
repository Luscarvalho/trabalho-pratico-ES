<?php
include_once '../controller/controladorTreinador.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escolher Oponente</title>
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

    <!-- Navegacao -->
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="col s12 z-depth-0"></div>
                    <a href="treinadorInicio.php" class="breadcrumb grey-text">Início</a>
                    <a href="" class="breadcrumb grey-text">Escolher Oponente</a>
                </div>
            </div>
        </nav>

        <div class="container">
        
        <!-- Tabela -->
            <table class="highlight centered">
                <blockquote>
                    <h2>Escolher Oponente</h2>
                </blockquote>

                <thead>
                    <tr>   
                        <th>Oponente</th>
                        <th>Nome</th>
                        <th>Nível</th>
                        <th>Escolher</th>
                    </tr>
                </thead>
        
                <?php 
                foreach(ControladorTreinador::listarTreinadores() as $treinador):
                    if($treinador['treinadorId'] != $_SESSION['treinadorLogado']):
                ?>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo $treinador['foto']; ?>" class="circle" style="max-width: 50px;"></td>
                            <td><?php echo $treinador['treinadorNome']; ?></td>
                            <td><?php echo $treinador['nivel']; ?></td>
                            <td><a href="batalhaPokemon.php?oponente=<?php echo $treinador['treinadorId']; ?>" class="btn-floating teal"><i class="material-icons right">done</i></a></td>
                        </tr>
                    </tbody>
                <?php 
                    endif;
                endforeach;
                ?>
            </table>
        </div>

    <!--Materialize JS-->
        <script type="text/javascript" src="js/materialize.js">
        </script>

        <script>
            M.AutoInit();
        </script>
    </body>
<html>