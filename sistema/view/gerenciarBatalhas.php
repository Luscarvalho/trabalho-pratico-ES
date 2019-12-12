<?php
include_once '../controller/controladorBatalha.php';
include_once '../controller/controladorTreinador.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Batalhas</title>
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
                    <a href="" class="breadcrumb grey-text">Batalhas</a>
                </div>
            </div>
        </nav>

        <div class="container">
        
        <!-- Tabela -->
            <table class="highlight centered">
                <blockquote>
                    <h2>Batalhas</h2>
                </blockquote>

                <thead>
                    <tr>
                        <th>Treinador</th>
                        <th>Oponente</th>
                        <th>Vencedor</th>
                        <th>Alterar<br>Vencedor</th>
                        <th>Remover</th>
                    </tr>
                </thead>
        
                <?php 
                foreach(ControladorBatalha::listarBatalhas() as $batalha):
                    $treinador = controladorTreinador::getTreinadorById($batalha['treinador1']);
                    $oponente = controladorTreinador::getTreinadorById($batalha['treinador2']);
                    $vencedor = controladorTreinador::getTreinadorById($batalha['vencedor']);
                    ?>
                <tbody>
                    <tr>
                        <td>
                            <img src="<?php echo $treinador['foto']; ?>" class="circle" style="max-width: 50px;">
                            <br><?php echo $treinador['treinadorNome']; ?>
                        </td>
                        <td>
                            <img src="<?php echo $oponente['foto']; ?>" class="circle" style="max-width: 50px;">
                            <br><?php echo $oponente['treinadorNome']; ?></td>
                        <td>
                            <img src="<?php echo $vencedor['foto']; ?>" class="circle" style="max-width: 50px;">
                        </td>
                        <td>
                            <a href="#atualizar<?php echo $batalha['batalhaId'];?>" class="btn-floating red modal-trigger"><i class="material-icons right teal">autorenew</i></a>
                        </td>
                        <td>
                            <a href="#remover<?php echo $batalha['batalhaId'];?>" class="btn-floating red modal-trigger"><i class="material-icons right">delete</i></a>
                        </td>

                    <!-- Caixa de dialogo remover-->
                    <div id="remover<?php echo $batalha['batalhaId'];?>" class="modal">
                            <div class="modal-content">
                                <blockquote>
                                    <h4>Remover</h4>
                                </blockquote>
                                <h5>Tem certeza que deseja remover essa batalha?</h5>
                            </div>
                            <div class="modal-footer">
                                <a href="../controller/controladorBatalha.php?id=<?php echo $batalha['batalhaId'];?>&btn=removerBatalha" class="modal-action modal-close waves-effect btn red">Remover</a>
                                <a href="" class="modal-action modal-close waves-effect btn-flat">Cancelar</a>
                            </div>
                        </div>

                    <!-- Caixa de dialogo atualizar-->
                        <div id="atualizar<?php echo $batalha['batalhaId'];?>" class="modal">
                            <div class="modal-content">
                                <blockquote>
                                    <h4>Alterar vencedor</h4>
                                </blockquote>
                                <h5>Tem certeza que deseja alterar o vencedor?</h5>
                            </div>
                            <div class="modal-footer">
                                <a href="../controller/controladorBatalha.php?id=<?php echo $batalha['batalhaId'];?>&btn=atualizarBatalha" class="modal-action modal-close waves-effect btn red">Alterar</a>
                                <a href="" class="modal-action modal-close waves-effect btn-flat">Cancelar</a>
                            </div>
                        </div>
                    </tr>
                </tbody>
                <?php endforeach; ?>
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