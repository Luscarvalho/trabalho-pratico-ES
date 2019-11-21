<?php
include_once '../estruturas/conexao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tipos</title>
    <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    
        <style>
        h4 {
            margin-top: -10px;
        }
        </style>
    </head>

    <body>
    <!-- Menu -->
        <nav class="z-depth-1">
            <div class="container" style="padding: 0 20px 0 20px;">
                <a href="enfermeiraJoy.html" class="brand-logo">Simulador de Batalhas Pokémon</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="enfermeiraJoy.html">Voltar</a></li>
                    <li><a href="index.html" class="btn white black-text">Sair<i class="material-icons right">close</i></a></li>
                </ul>
            </div>
        </nav>

    <!-- Navegacao -->
        <nav class="transparent z-depth-0">
            <div class="container row">
                <div class="col s12 z-depth-0"></div>
                    <a href="enfermeiraJoy.html" class="breadcrumb grey-text">Início</a>
                    <a href="enfermeiraJoy.html" class="breadcrumb grey-text">Tipos</a>
                </div>
            </div>
        </nav>

        <div class="container">
            <blockquote>
                <h2>Tipos</h2>
            </blockquote>
            
            <a href="../cadastrar/formularioTipo.php" class="btn" style="margin-bottom: 30px ;"><i class="material-icons right">add</i>Novo Tipo</a>
            <br>
        
        <!-- Cards -->
            <div class="row">

                <?php
                $sql = "SELECT * FROM tipo;";
                $resultado = mysqli_query($conexao, $sql);
                while($dados = mysqli_fetch_array($resultado)): 
                ?>

                <div class="col s3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?php echo $dados['imagem']; ?>">
                        </div>
                        <div class="card-content center">
                            <h4><?php echo $dados['tipoNome']; ?></h4>
                            <p class="green white-text"><?php echo $dados['forca']; ?></p>
                            <p class="red white-text"><?php echo $dados['fraqueza']; ?></p>
                        </div>
                        <div class="card-action center">
                            <a href="" class="btn-floating teal"><i class="material-icons right">edit</i></a>
                            <a href="#remover" class="btn-floating red modal-trigger"><i class="material-icons right">delete</i></a>
                        
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>   

        <!-- Caixa de dialogo -->
            <div id="remover" class="modal">
                <div class="modal-content">
                    <blockquote>
                        <h4>Remover</h4>
                    </blockquote>
                    <h5>Tem certeza que deseja remover esse tipo?</h5>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect btn red">Remover</a>
                    <a href="#!" class="modal-action modal-close waves-effect btn-flat">Cancelar</a>
                </div>
            </div>
    <!--Materialize JS-->
    <script type="text/javascript" src="js/materialize.js">
    </script>

    <script>
        M.AutoInit();
    </script>
    </body>
<html>