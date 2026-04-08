# 🌍 Sistema de Cadastro de Funcionários

Mini sistema web desenvolvido para gerenciar o cadastro e a listagem de funcionários de uma empresa. O projeto conta com autenticação simples e foi construído sem o uso de frameworks, focando nos fundamentos do desenvolvimento web e arquitetura de pastas organizada.

## 🚀 Funcionalidades

- **Autenticação:** Login de usuário com validação no banco de dados.
- **Cadastro de Funcionários:** Formulário completo para inserção de novos colaboradores (Nome, Cargo, E-mail, Telefone e Situação).
- **Listagem e Busca:** Tabela dinâmica listando todos os funcionários cadastrados, com barra de pesquisa integrada para filtrar por nome.
- **Design Fiel:** Interface construída com CSS puro para replicar fielmente o design de referência.

## 🛠️ Tecnologias Utilizadas

- **Front-end:** HTML5, CSS3 (Puro) e FontAwesome (para ícones).
- **Back-end:** PHP 5 (Estruturado).
- **Banco de Dados:** PostgreSQL (comunicação via PDO).

## 📁 Estrutura do Projeto

O projeto foi organizado separando as responsabilidades para facilitar a manutenção:

```text
sistema-funcionarios/
├── auth/
│   └── login.php         # Tela e lógica de autenticação
├── css/
│   └── style.css         # Estilos globais e das telas
├── db/
│   └── conexao.php       # Configuração do PDO com o PostgreSQL
├── funcionarios/
│   ├── cadastro.php      # Tela e lógica de inserção
│   └── listagem.php      # Tela e lógica de exibição/busca
├── index.php             # Ponto de entrada (redireciona para o login)
└── README.md
