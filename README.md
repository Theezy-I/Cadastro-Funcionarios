# Mini Sistema Web - Cadastro de Funcionários

Projeto em **PHP5 + PostgreSQL**, sem frameworks, com:

- autenticação simples;
- cadastro de funcionários;
- edição, visualização e exclusão;
- listagem com busca e paginação.

## Estrutura

- `index.php` -> tela de login
- `login.php` -> valida autenticação
- `logout.php` -> encerra sessão
- `cadastro.php` -> formulário de cadastro/edição
- `salvar.php` -> grava no banco
- `listagem.php` -> busca e lista funcionários
- `visualizar.php` -> exibe detalhes
- `excluir.php` -> exclui registro
- `conexao.php` -> conexão com PostgreSQL
- `database.sql` -> script do banco
- `assets/css/estilo.css` -> estilos

## Configuração

1. Crie o banco no PostgreSQL.
2. Execute o arquivo `database.sql`.
3. Ajuste usuário, senha, host e nome do banco em `conexao.php`.
4. Coloque a pasta do projeto dentro do servidor local (ex.: `htdocs` do XAMPP).
5. Acesse `http://localhost/mini_sistema_funcionarios/`.

## Login padrão

- **Usuário:** `admin`
- **Senha:** `123456`

## Git e GitHub

```bash
git init
git add .
git commit -m "Projeto cadastro de funcionários em PHP5 e PostgreSQL"
git branch -M main
git remote add origin SEU_LINK_DO_REPOSITORIO
git push -u origin main
```

## Observação

A autenticação usa `md5` apenas por exigência de simplicidade e compatibilidade com PHP5. Em projeto real, isso já nasce errado.
