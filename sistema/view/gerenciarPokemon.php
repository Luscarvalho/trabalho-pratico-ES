<?php
include_once '../controller/controladorPokemon.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pokémon</title>
    <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body>
    <!-- Menu -->
        <nav class="z-depth-1">
            <div class="container" style="padding: 0 20px 0 20px;">
                <a href="enfermeiraJoy.html" class="brand-logo">Simulador de Batalhas Pokémon</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="enfermeiraJoy.html">Voltar</a></li>
                    <li><a href="index.php" class="btn white black-text">Sair<i class="material-icons right">close</i></a></li>
                </ul>
            </div>
        </nav>

    <!-- Navegacao -->
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="col s12 z-depth-0"></div>
                    <a href="enfermeiraJoy.html" class="breadcrumb grey-text">Início</a>
                    <a href="" class="breadcrumb grey-text">Pokémon</a>
                </div>
            </div>
        </nav>

        <div class="container">
        
        <!-- Tabela -->
            <table class="highlight centered">
                <blockquote>
                    <h2>Pokémon</h2>
                </blockquote>

                <a href="formularioNovoPokemon.php" class="btn"><i class="material-icons right">add</i>Novo Pokémon</a>

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tipo</th>
                        <th>Remover</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php
                    foreach(ControladorPokemon::listarPokemon() as $pokemon): 
                    ?>
                    <tr>
                        <td><?php echo $pokemon['nomePokemon']; ?></td>
                        <td><?php echo ControladorPokemon::getTipoById($pokemon['tipoId'])['tipoNome']; ?></td>
                        <td><a href="#remover<?php echo $pokemon['pokemonId'];?>" class="btn-floating red modal-trigger"><i class="material-icons right">delete</i></a></td>

                    <!-- Caixa de dialogo -->
                        <div id="remover<?php echo $pokemon['pokemonId'];?>" class="modal">
                            <div class="modal-content">
                                <blockquote>
                                    <h4>Remover</h4>
                                </blockquote>
                                <h5>Tem certeza que deseja remover esse Pokémon?</h5>
                            </div>
                            <div class="modal-footer">
                                <a href="../controller/controladorPokemon.php?id=<?php echo $pokemon['pokemonId'];?>&btn=removerPokemon" class="modal-action modal-close waves-effect btn red">Remover</a>
                                <a href="" class="modal-action modal-close waves-effect btn-flat">Cancelar</a>
                            </div>
                        </div>
                    </tr>
                </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    <!--Materialize JS-->
        <script type="text/javascript" src="../js/materialize.js">
        </script>

        <script>
            M.AutoInit();
        </script>
    </body>
<html>