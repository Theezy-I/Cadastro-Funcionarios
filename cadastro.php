<?php
require_once 'conexao.php';
$pagina_ativa = 'inicio';
require_once 'header.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$funcionario = array(
    'id' => '',
    'nome' => '',
    'cargo' => '',
    'email' => '',
    'telefone' => '',
    'situacao' => 'Ativo'
);
$titulo = 'Novo Funcionário';

if ($id > 0) {
    $sql = "SELECT * FROM funcionarios WHERE id = {$id} LIMIT 1";
    $resultado = pg_query($conexao, $sql);

    if ($resultado && pg_num_rows($resultado) == 1) {
        $funcionario = pg_fetch_assoc($resultado);
        $titulo = 'Editar Funcionário';
    }
}

$mensagem = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<div class="cabecalho-pagina">
    <h2>Cadastro de Funcionários</h2>
</div>

<div class="conteudo-box">
    <div class="box-formulario">
        <div class="box-titulo">
            <span class="icone-box">👔</span>
            <h3>Cadastro de Funcionários</h3>
        </div>

        <?php if ($mensagem != '') { ?>
            <div class="mensagem sucesso"><?php echo htmlspecialchars($mensagem); ?></div>
        <?php } ?>

        <form action="salvar.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($funcionario['id']); ?>">

            <div class="grid-formulario">
                <div class="grupo-campo">
                    <label>ID</label>
                    <input type="text" value="<?php echo ($funcionario['id'] != '') ? htmlspecialchars($funcionario['id']) : 'Automático'; ?>" disabled>
                </div>

                <div class="grupo-campo">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($funcionario['nome']); ?>" placeholder="Nome" required>
                </div>

                <div class="grupo-campo">
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($funcionario['email']); ?>" placeholder="E-mail" required>
                </div>

                <div class="grupo-campo">
                    <label>Cargo</label>
                    <select name="cargo" required>
                        <option value="">Selecione</option>
                        <option value="Administrador" <?php echo ($funcionario['cargo'] == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                        <option value="Gerente" <?php echo ($funcionario['cargo'] == 'Gerente') ? 'selected' : ''; ?>>Gerente</option>
                        <option value="Assistente" <?php echo ($funcionario['cargo'] == 'Assistente') ? 'selected' : ''; ?>>Assistente</option>
                    </select>
                </div>

                <div class="grupo-campo">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?php echo htmlspecialchars($funcionario['telefone']); ?>" placeholder="Telefone" required>
                </div>

                <div class="grupo-campo">
                    <label>Situação</label>
                    <div class="radio-area">
                        <label class="radio-item">
                            <input type="radio" name="situacao" value="Ativo" <?php echo ($funcionario['situacao'] == 'Ativo') ? 'checked' : ''; ?>> Ativo
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="situacao" value="Inativo" <?php echo ($funcionario['situacao'] == 'Inativo') ? 'checked' : ''; ?>> Inativo
                        </label>
                    </div>
                </div>
            </div>

            <div class="acoes-formulario">
                <button type="submit" class="botao botao-primario">Salvar</button>
                <button type="reset" class="botao">Limpar</button>
                <a href="listagem.php" class="botao botao-link">Voltar</a>
                <a href="listagem.php" class="botao botao-link">Fechar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>
