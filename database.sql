CREATE DATABASE cadastro_funcionarios;

-- Conecte na base criada antes de executar o restante:
-- \c cadastro_funcionarios;

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    email VARCHAR(120) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    situacao VARCHAR(10) NOT NULL DEFAULT 'Ativo',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, usuario, senha)
VALUES ('Admin', 'admin', md5('123456'));

INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) VALUES
('João Silva', 'Administrador', 'joao@empresa.com', '(61) 99999-1111', 'Ativo'),
('Ana Mendes', 'Gerente', 'ana@empresa.com', '(61) 99999-2222', 'Ativo'),
('Pedro Souza', 'Assistente', 'pedro@empresa.com', '(61) 99999-3333', 'Ativo'),
('Carla Oliveira', 'Administrador', 'carla@empresa.com', '(61) 99999-4444', 'Ativo'),
('Lucas Martins', 'Assistente', 'lucas@empresa.com', '(61) 99999-5555', 'Inativo'),
('Mariana Costa', 'Gerente', 'mariana@empresa.com', '(61) 99999-6666', 'Ativo');
