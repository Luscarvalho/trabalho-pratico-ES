<?php 
session_start();
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
                
                <div class="input-field col s12">
                    <h3 class="light">CADASTRAR</h3>

                    <?php if(isset($_SESSION['nomeExistente'])){ ?>
                        <blockquote>
                            <p>Esse nome já está cadastrado, tente novamente!</p>
                        </blockquote>
                    <?php } 
                        if(isset($_SESSION['senhasDiferentes'])){ ?>
                        <blockquote>
                            <p>As senhas não são iguais</p>
                        </blockquote>
                    <?php } session_destroy();?>
                </div>

                <form method="POST" action="../controller/controladorTreinador.php?btn=cadastrarTreinador" enctype="multipart/form-data" autocomplete="off">   
                <!-- NOME -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nome" type="text" name="cNome" required>
                        <label for="nome">Nome</label>
                    </div>
                    
                <!-- SENHA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="senha" type="password" name="cSenha" required>
                        <label for="senha">Senha</label>
                    </div>

                <!-- CONFIRMAR SENHA -->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">check_circle</i>
                        <input id="confirmar" type="password" name="cConfirmar" required>
                        <label for="confirmar">Confirmar Senha</label>
                    </div>

                <!-- FOTO -->
                    <div class="file-field input-field col s12">
                        <div class="btn teal lighten-5 black-text">
                            <span>Foto de Perfil</span>
                            <input type="file" accept=".jpeg, .jpg, .png" name="cFoto" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                <!-- BOTÕES -->
                    <div class="file-field input-field col s12">
                        <button type="submit" class="btn red waves-effect white-text"> Continuar </button>
                        <a href="index.php" class="btn-flat black-text waves-effect"> Cancelar </a>
                    </div>
                </form>
                
                <br>
            </div>
        </div>

    <!--Materialize JS-->
        <script type="text/javascript" src="../js/materialize.js"></script>
    </body>
</html>