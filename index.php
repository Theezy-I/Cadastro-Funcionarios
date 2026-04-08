<?php
require_once 'auth.php';
if (usuario_logado()) {
    header('Location: listagem.php');
    exit;
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Cadastro de Funcionários</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body class="pagina-login">
    <div class="card-login">
        <div class="titulo-login-area">
            <div class="icone-usuario-login"></div>
            <h1>Cadastro de Funcionários</h1>
        </div>

        <?php if ($erro != '') { ?>
            <div class="mensagem erro"><?php echo htmlspecialchars($erro); ?></div>
        <?php } ?>

        <form action="login.php" method="post">
            <div class="campo-login">
                <span class="icone-campo">👤</span>
                <input type="text" name="usuario" placeholder="Usuário" required>
            </div>

            <div class="campo-login">
                <span class="icone-campo">🔒</span>
                <input type="password" name="senha" placeholder="Senha" required>
            </div>

            <button type="submit" class="botao botao-primario botao-login">Entrar</button>
        </form>

        <div class="linha-login"></div>
        <a href="#" class="esqueci-senha">Esqueci minha senha</a>
    </div>
</body>
</html>
