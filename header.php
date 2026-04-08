<?php
require_once 'auth.php';
exigir_login();
$pagina_ativa = isset($pagina_ativa) ? $pagina_ativa : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body class="pagina-interna">
    <div class="container-principal">
        <div class="topo-sistema">
            <div class="logo-area">
                <div class="logo-circulo"></div>
                <span>Cadastro de Funcionários</span>
            </div>

            <div class="menu-topo">
                <a href="cadastro.php" class="<?php echo ($pagina_ativa == 'inicio') ? 'ativo' : ''; ?>">Início</a>
                <a href="listagem.php" class="<?php echo ($pagina_ativa == 'listagem') ? 'ativo' : ''; ?>">Listagem</a>
            </div>

            <div class="usuario-topo">
                Olá, <?php echo htmlspecialchars(nome_usuario_logado()); ?>
                <span class="seta">▼</span>
                <a href="logout.php" class="sair-link">Sair</a>
            </div>
        </div>
