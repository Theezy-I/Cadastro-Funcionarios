# 📋 Sistema de Cadastro de Funcionários

Mini sistema web desenvolvido em **PHP5** com banco de dados **PostgreSQL**, conforme requisitos da atividade.

---

## 🚀 Funcionalidades

- Autenticação de usuário (login)
- Cadastro de funcionários
- Edição de dados
- Exclusão de registros
- Listagem com busca
- Recuperação de senha
- Interface baseada nas telas fornecidas

---

## 🛠️ Tecnologias utilizadas

- PHP 5
- PostgreSQL
- HTML5
- CSS3
- XAMPP (servidor local)

---

## 📂 Estrutura do projeto

```
mini_sistema_funcionarios/
│
├── index.php
├── login.php
├── logout.php
├── cadastro.php
├── salvar.php
├── listagem.php
├── excluir.php
├── visualizar.php
├── esqueci_senha.php
├── conexao.php
├── header.php
├── footer.php
├── database.sql
└── style.css
```

---

## ⚙️ Como executar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
```

### 2. Mover para o servidor local

Coloque a pasta em:

```
C:\xampp\htdocs
```

### 3. Criar banco de dados

No pgAdmin:

- Criar banco:
```
funcionarios
```

- Executar o arquivo:
```
database.sql
```

### 4. Configurar conexão

No arquivo `conexao.php`:

```php
$host = 'localhost';
$port = '5432';
$dbname = 'funcionarios';
$user = 'postgres';
$password = 'SUA_SENHA';
```

### 5. Iniciar servidor

No XAMPP:
- Start Apache

### 6. Acessar o sistema

```
http://localhost/mini_sistema_funcionarios
```

---

## 🔐 Acesso padrão

```
Usuário: admin
Senha: 123456
```

---

## ⚠️ Observações

- Senhas armazenadas com MD5 (uso acadêmico)
- Não utiliza frameworks (conforme exigência)
- Projeto para execução em ambiente local

---

## 📌 Autor

Projeto desenvolvido para fins acadêmicos.
