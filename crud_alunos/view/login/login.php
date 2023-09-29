<?php
    
    if (isset($_POST['submetido'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


        //echo $usuario . " - " . $senha;
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title> CRUD ALUNOS</title>


</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-12 mt-5">
                <h3>login</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-16 alert alert-info">
                <form action="" method="POST">

                    <div class="from-group">
                        <label for="txtUsu">Usuário</label>
                        <input id="txtUsu" type="text" name="usuario" id="form-control" class="form-control">
                    </div>
                    
                    <div class="from-group">
                        <label for="txtSenha">Senha</label>
                        <input id="txtSenha" type="password" name="senha" id="form-control" class="form-control">
                    </div>

                    <br>

                    <input type="hidden" name="submetido" value="1">

                    <button class="btn btn-success">Entrar</button>

                </form>
            </div>
        </div>



    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>