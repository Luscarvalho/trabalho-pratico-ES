<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <!--Icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Materialize CSS-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection">
    </head>

    <body style="background-image: url(../imagens/fundo-login.jpg); background-size: cover;">
        
        <div class="valign-wrapper row" style="position: relative; min-height: 100vh;">
            <div class="card z-depth-3 container col s4 pull-s4" style="padding: 0px 20px 0px 20px; border-radius:0px;">
                
                <h3 class="center-align"><i class="large material-icons">face</i><br>LOGIN</h3>
                <br>

            <!-- Aviso -->
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

            <!-- Formulario -->
                <form method="POST" action="../controller/fazerLogin.php" autocomplete="off">
                    <input type="text" placeholder="Usuário" name="cUsuario" required> <br>
                    <input type="password" placeholder="Senha" name="cSenha" required> <br><br>
                    <button type="submit" class="btn waves-effect"> Entrar </button>
                    <a href="formularioNovoTreinador.php" class="waves-effect waves-gray btn-flat">Cadastrar</a>
                </form>
                
                <br>
            </div>
        </div>

        <!--Materialize JS-->
        <script type="text/javascript" src="js/materialize.js"></script>
    </body>
</html>