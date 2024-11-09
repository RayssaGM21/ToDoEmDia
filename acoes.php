<?php
session_start();
require_once('conexao.php');
if(isset($_POST['create-usuario'])){
    $nome = trim($_POST['txt-nome']);
    $email= trim($_POST['txt-email']);
    $telefone = trim($_POST['txt-telefone']);
    $cpf = trim($_POST['txt-cpf']);

    if (isset($_POST['txt-senha'])){
        $senha = mysqli_real_escape_string($conn, password_hash(trim($_POST['txt-senha']), PASSWORD_DEFAULT));
    }
    else{
        $senha = '';
    }

    $sql = "INSERT INTO usuario (nome, email, telefone, cpf, senha) VALUES ('$nome', '$email', '$telefone', '$cpf', '$senha')";
    
    mysqli_query($conn, $sql);
    header('Location: index.php');
    exit();
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT id, senha FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: tarefas-index.php');
        exit();
    } else {
        header('Location: login.php');
        $_SESSION['message'] = "Informações de login incorretas!";
        $_SESSION['type'] ='error';
    }
}

if (isset($_POST['create-tarefa'])){
    $nomeTarefa = trim($_POST['txt-nome-tarefa']);
    $descricao = trim($_POST['txt-descricao']);
    $status = trim($_POST['txt-status']);
    $dataLimite = trim($_POST['txt-data_limite']);
    if (isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
        $sql = "INSERT INTO tarefa (nome, descricao, fk_id_status, fk_id_usuario, data_limite) VALUES ('$nomeTarefa', '$descricao', '$status', '$userId', '$dataLimite')";
        mysqli_query($conn, $sql);
        header('Location: tarefas-index.php');
        exit();
        if (mysqli_affected_rows($conn) > 0){
            $_SESSION['message'] = "Tarefa com ID {$tarefaId} atualizado com sucesso!";
            $_SESSION['type'] ='success';
        }
        else{
            $_SESSION['message'] = "Ops! Não foi possível atualizar a tarefa";
            $_SESSION['type'] ='error';
        }
    }
}

if (isset($_POST['edit_tarefa'])){
    $tarefaId = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $nomeTarefa = mysqli_real_escape_string($conn, $_POST['txt-nome-tarefa']);
    $descricao = trim($_POST['txt-descricao']);
    $status = trim($_POST['txt-status']);
    $dataLimite = trim($_POST['txt-data_limite']);

    if (isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
        $sql = "UPDATE tarefa SET nome = '$nomeTarefa', descricao = '$descricao', fk_id_status = '$status', fk_id_usuario = '$userId', data_limite = '$dataLimite' WHERE id = '$tarefaId'";
        mysqli_query($conn, $sql);
        echo $sql;
        if (mysqli_affected_rows($conn) > 0){
            $_SESSION['message'] = "Tarefa com ID {$tarefaId} atualizado com sucesso!";
            $_SESSION['type'] ='success';
        }
        else{
            $_SESSION['message'] = "Ops! Não foi possível atualizar a tarefa";
            $_SESSION['type'] ='error';
        }
        header('Location: tarefas-index.php');
        exit();
}
}

if (isset($_POST['delete_tarefa'])){
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefa WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);
    
    if (mysqli_affected_rows($conn) > 0){
        $_SESSION['message'] = "Tarefa com ID {$tarefaId} excluído com sucesso!";
        $_SESSION['type'] ='success';
    }
    else{
        $_SESSION['message'] = "Ops! Não foi possível excluir a tarefa";
        $_SESSION['type'] ='error';
    }
    header('Location: tarefas-index.php');
    exit();
}

?>