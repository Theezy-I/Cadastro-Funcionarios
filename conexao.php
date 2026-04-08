<?php
$host = 'localhost';
$port = '5432';
$dbname = 'cadastro_funcionarios';
$user = 'postgres';
$password = 'postgres';

$conexao = pg_connect("host={$host} port={$port} dbname={$dbname} user={$user} password={$password}");

if (!$conexao) {
    die('Erro ao conectar ao banco de dados PostgreSQL. Verifique o arquivo conexao.php.');
}
?>
