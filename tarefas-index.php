<?php
session_start();
require_once('conexao.php');

$sqlTarefa = "SELECT tarefa.*, status_tarefa.nome AS status_nome 
              FROM tarefa 
              JOIN status_tarefa ON tarefa.fk_id_status = status_tarefa.id";
$tarefas = mysqli_query($conn, $sqlTarefa);
$sqlTa = "SELECT id, nome FROM status_tarefa ORDER BY id asc";
$statusTarefa = mysqli_query($conn, $sqlTa);
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
    <title>Dashboard Tarefas</title>
    <style>
        .conteudo {
            padding: 16px;
        }

        .pendente {
            background-color: #fa6464 !important;
            color: white !important;
        }

        .concluído {
            background-color: #89f0a4 !important;
            color: white !important;
        }

        .emexecução {
            background-color: #89c5f0 !important;
            color: white !important;
        }

        .custom {
            background-color: #f9a825;
            border-color: #f9a825;
        }

        .icon-size {
            width: 25px;
            height: 25px;
            font-size: 25px;
            line-height: 25px;
            color: black;
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tarefas Registradas
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-info float-end">Adicionar usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('message.php') ?>

                        <table class="table table-bordered rounded">
                            <thead>
                                <tr class="table-secondary">
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Data Limite</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tarefas as $tarefa): ?>
                                    <tr>
                                        <td><?php echo $tarefa['id'] ?></td>
                                        <td><?php echo $tarefa['nome'] ?></td>
                                        <td><?php echo $tarefa['descricao'] ?></td>
                                        <td class="<?php echo strtolower(str_replace(' ', '', $tarefa['status_nome'])) ?>"><?php echo $tarefa['status_nome'] ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($tarefa['data_limite'])) ?></td>
                                        <td>
                                            <a href="tarefa-edit.php?id=<?= $tarefa['id'] ?>" class="btn btn-secondary btn-sm custom"><i class="bi bi-pencil-fill"></i></a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_tarefa" value="<?= $tarefa['id'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar tarefa</h5>
                </div>
                <div class="modal-body">
                    <form action="acoes.php" method="POST">
                        <div class="mb-3">
                            <label for="txt-nome-tarefa">Nome da tarefa</label>
                            <input type="text" name="txt-nome-tarefa" id="txt-nome-tarefa" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="txt-descricao">Descrição</label>
                            <input type="text" name="txt-descricao" id="txt-descricao" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="txt-status">Status</label>
                            <select name="txt-status" id="txt-status" class="form-select">
                                <?php foreach ($statusTarefa as $sT): ?>
                                    <option value="<?php echo $sT['id']; ?>">
                                        <?php echo $sT['nome']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="txt-data_limite">Data Limite</label>
                            <input type="date" name="txt-data_limite" id="txt-data_limite" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="create-tarefa" class="btn btn-info">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>