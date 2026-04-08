<?php
require_once 'conexao.php';
$pagina_ativa = 'listagem';
require_once 'header.php';

$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$pagina = ($pagina < 1) ? 1 : $pagina;
$itens_por_pagina = 5;
$offset = ($pagina - 1) * $itens_por_pagina;

$filtro = '';
if ($busca != '') {
    $busca_sql = pg_escape_string($conexao, $busca);
    $filtro = " WHERE nome ILIKE '%{$busca_sql}%' OR cargo ILIKE '%{$busca_sql}%' OR email ILIKE '%{$busca_sql}%' ";
}

$sql_total = "SELECT COUNT(*) AS total FROM funcionarios {$filtro}";
$resultado_total = pg_query($conexao, $sql_total);
$total_registros = 0;
if ($resultado_total) {
    $dados_total = pg_fetch_assoc($resultado_total);
    $total_registros = (int) $dados_total['total'];
}
$total_paginas = ($total_registros > 0) ? ceil($total_registros / $itens_por_pagina) : 1;

$sql = "SELECT * FROM funcionarios {$filtro} ORDER BY id ASC LIMIT {$itens_por_pagina} OFFSET {$offset}";
$resultado = pg_query($conexao, $sql);
$mensagem = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<div class="cabecalho-pagina">
    <h2>Listagem de Funcionários</h2>
</div>

<div class="conteudo-box">
    <div class="barra-listagem">
        <form action="listagem.php" method="get" class="form-busca">
            <input type="text" name="busca" value="<?php echo htmlspecialchars($busca); ?>" placeholder="Buscar funcionário...">
            <button type="submit" class="botao botao-primario">Pesquisar</button>
            <a href="cadastro.php" class="botao botao-primario">Novo Funcionário</a>
        </form>
    </div>

    <?php if ($mensagem != '') { ?>
        <div class="mensagem sucesso"><?php echo htmlspecialchars($mensagem); ?></div>
    <?php } ?>

    <table class="tabela-listagem">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>E-mail</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado && pg_num_rows($resultado) > 0) { ?>
                <?php while ($linha = pg_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($linha['id']); ?></td>
                        <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                        <td><?php echo htmlspecialchars($linha['cargo']); ?></td>
                        <td><?php echo htmlspecialchars($linha['email']); ?></td>
                        <td>
                            <span class="badge <?php echo ($linha['situacao'] == 'Ativo') ? 'ativo' : 'inativo'; ?>">
                                <?php echo htmlspecialchars($linha['situacao']); ?>
                            </span>
                        </td>
                        <td class="acoes-tabela">
                            <a href="cadastro.php?id=<?php echo $linha['id']; ?>" title="Editar">✏️</a>
                            <a href="visualizar.php?id=<?php echo $linha['id']; ?>" title="Visualizar">📁</a>
                            <a href="excluir.php?id=<?php echo $linha['id']; ?>" title="Excluir" onclick="return confirm('Deseja excluir este funcionário?');">🗑️</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6" class="sem-registros">Nenhum funcionário encontrado.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="paginacao">
        <?php if ($pagina > 1) { ?>
            <a href="listagem.php?busca=<?php echo urlencode($busca); ?>&pagina=<?php echo ($pagina - 1); ?>">&laquo; Anterior</a>
        <?php } ?>

        <?php
        $i = 1;
        while ($i <= $total_paginas) {
        ?>
            <a href="listagem.php?busca=<?php echo urlencode($busca); ?>&pagina=<?php echo $i; ?>" class="<?php echo ($i == $pagina) ? 'ativo' : ''; ?>"><?php echo $i; ?></a>
        <?php
            $i++;
        }
        ?>

        <?php if ($pagina < $total_paginas) { ?>
            <a href="listagem.php?busca=<?php echo urlencode($busca); ?>&pagina=<?php echo ($pagina + 1); ?>">Próximo &raquo;</a>
        <?php } ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>
