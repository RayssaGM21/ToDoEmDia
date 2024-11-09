<?php
session_start();
require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .ct {
            display: flex;
            height: 100vh;
        }

        #banner {
            width: 50vw;
            height: 100vh;
            object-fit: cover;
        }

        .form-container {
            width: 50vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-content {
            width: 70%;
            max-width: 400px;
            padding: 20px;
        }

        .form-container h4{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ct">
        <div>
            <img src="./img/banner_login.png" alt="Banner de Login" id="banner">
        </div>
        <div class="form-container">
            <div class="form-content">
                <h4 class="mb-3">Bem-vindo ao</h4>
                <div class="d-flex justify-content-center">
                    <img src="./img/logo.png" alt="Logo" class="img-fluid mb-4" width="150px">
                </div>
                <?php include('message.php')?>
                <form action="acoes.php" method="POST">
                    <div class="mb-3">
                        <label for="txt-email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Email" id="txt-email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="txt-senha" class="form-label">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="txt-senha" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-info w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>