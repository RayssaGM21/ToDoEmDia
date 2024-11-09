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
    <title>To Do Em Dia</title>
    <style>
        .icon-size {
            width: 25px;
            height: 25px;
            font-size: 25px;
            line-height: 25px;
            color: black;
        }
        .cont-info {
            width: 300px;
            height: auto;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 16px;
            padding: 20px;
        }

        .cont-info p {
            margin-bottom: 15px;
        }

        .cont-info a {
            margin-top: 10px;
            display: inline-block;
        }

        .color1 {
            background-color: #96dafa;
        }

        .color2 {
            background-color: #e2bcf7;
        }

        .color3 {
            background-color: #bcf7da;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="mx-auto">
                <a class="navbar-brand" href="index.php">
                    <img src="./img/logo.png" alt="Logo To Do em Dia" class="img-fluid" width="200px">
                </a>
            </div>
            <a href="usuario-create.php" class="d-flex align-items-center">
                <i class="bi bi-person-circle icon-size"></i>
            </a>
        </div>
    </nav>
    <img src="./img//banner.png" alt="Banner Promocional" class="w-100">
    <div class="d-flex justify-content-center m-4">
        <div class="cont-info color1 m-4">
            <p>Gerencie suas tarefas como nunca antes!</p>
        </div>
        <div class="cont-info color2 m-4">
            <p>Não perca tempo casdastre-se já!</p>
            <a href="usuario-create.php" class="btn btn-secondary">Cadastre-se</a>
        </div>
        <div class="cont-info color3 m-4">
            <p>Já possui cadastro? Faça seu login!</p>
            <a href="login.php" class="btn btn-secondary">Login</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>