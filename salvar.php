<?php
require_once 'conexao.php';
require_once 'auth.php';
exigir_login();

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$cargo = isset($_POST['cargo']) ? trim($_POST['cargo']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
$situacao = isset($_POST['situacao']) ? trim($_POST['situacao']) : 'Ativo';

if ($nome == '' || $cargo == '' || $email == '' || $telefone == '') {
    header('Location: cadastro.php?msg=' . urlencode('Preencha todos os campos obrigatórios.'));
    exit;
}

$nome = pg_escape_string($conexao, $nome);
$cargo = pg_escape_string($conexao, $cargo);
$email = pg_escape_string($conexao, $email);
$telefone = pg_escape_string($conexao, $telefone);
$situacao = pg_escape_string($conexao, $situacao);

if ($id > 0) {
    $sql = "UPDATE funcionarios SET nome = '{$nome}', cargo = '{$cargo}', email = '{$email}', telefone = '{$telefone}', situacao = '{$situacao}' WHERE id = {$id}";
    pg_query($conexao, $sql);
    header('Location: cadastro.php?id=' . $id . '&msg=' . urlencode('Funcionário atualizado com sucesso.'));
    exit;
}

$sql = "INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) VALUES ('{$nome}', '{$cargo}', '{$email}', '{$telefone}', '{$situacao}')";
pg_query($conexao, $sql);
header('Location: cadastro.php?msg=' . urlencode('Funcionário cadastrado com sucesso.'));
exit;
?>
