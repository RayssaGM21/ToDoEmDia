<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Adicionar-Usuarios</title>
    <style>
        .card {
            border-radius: 10px;
        }

        .card-header {
            border-bottom: none;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
        }

        body {
            background-image: url('./img/fundo_cadastro.jpg');
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .logo-min {
            width: 45px;
            height: 45px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <img src="./img/logo_min.png" alt="" class="logo-min">
                        <h2>Cadastro</h2>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txt-nome">Nome</label>
                                <input type="text" name="txt-nome" id="txt-nome" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="txt-email">Email</label>
                                <input type="text" name="txt-email" id="txt-email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="txt-telefone">Telefone</label>
                                <input type="text" name="txt-telefone" id="txt-telefone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="txt-cpf">CPF</label>
                                <input type="text" name="txt-cpf" id="txt-cpf" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="txt-senha">Senha</label>
                                <input type="password" name="txt-senha" id="txt-senha" class="form-control">
                            </div>

                            <div class="mb-3" style="display:flex; gap:8px; justify-content: end;">
                                <button type="button" class="btn btn-outline-info float-end"><a href="login.php">Fazer Login</a></button>
                                <button type="submit" name="create-usuario" class="btn btn-primary float-end">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>