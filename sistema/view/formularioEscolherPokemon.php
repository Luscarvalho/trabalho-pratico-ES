<?php
include_once '../controller/controladorPokemon.php'
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastar</title>
    <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body style="background-image: url(../imagens/fundo-login.jpg); background-size: cover;">
        
        <div class="valign-wrapper row" style="position: relative; min-height: 100vh;">
            <div class="card z-depth-3 container col s4 pull-s4">
                
            <blockquote>
                <h4>Escolher Pokémon</h4>
            </blockquote>

            <form method="POST" action="../controller/controladorTreinador.php?btn=addPokemon" autocomplete="off">

            <!-- CRIACAO DA LISTA -->
                <datalist id="pokemon">
                    <?php foreach(ControladorPokemon::listarPokemon() as $pokemon): ?>
                        <option value="<?php echo $pokemon['nomePokemon']?>"></option>
                    <?php endforeach; ?>
                </datalist>

            <!-- POKEMON 1 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_one</i>
                        <input id="pokemon1" type="text" list="pokemon" name="cPokemon1" required>
                    <label for="pokemon1">Pokémon 1</label>
                </div>

            <!-- POKEMON 2 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_two</i>
                        <input id="pokemon2" type="text" list="pokemon" name="cPokemon2" required>
                    <label for="pokemon2">Pokémon 2</label>
                </div>

            <!-- POKEMON 3 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_3</i>
                        <input id="pokemon3" type="text" list="pokemon" name="cPokemon3" required>
                    <label for="pokemon3">Pokémon 3</label>
                </div>
            
            <!-- POKEMON 4 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_4</i>
                        <input id="pokemon4" type="text" list="pokemon" name="cPokemon4" required>
                    <label for="pokemon4">Pokémon 4</label>
                </div>
                
            <!-- POKEMON 5 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_5</i>
                        <input id="pokemon5" type="text" list="pokemon" name="cPokemon5" required>
                    <label for="pokemon5">Pokémon 5</label>
                </div>
               
            <!-- POKEMON 6 -->
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_6</i>
                        <input id="pokemon6" type="text" list="pokemon" name="cPokemon6" required>
                    <label for="pokemon6">Pokémon 6</label>
                </div>
                
            <!-- BOTOES -->    
                <button type="submit" class="btn red">CONFIRMAR</button>
                <a href="index.php" class="btn-flat white">Cancelar</a>
            </form><br>   
        </div>

    <!--Materialize JS-->
        <script type="text/javascript" src="../js/materialize.js"></script>
    </body>
</html>