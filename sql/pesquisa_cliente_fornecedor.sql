-- Banco: bd_backend
-- Execute no phpMyAdmin (USBWebserver) ou no MySQL

CREATE DATABASE IF NOT EXISTS bd_backend
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bd_backend;

CREATE TABLE IF NOT EXISTS cliente (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  nome  VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS fornecedor (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  razao_social VARCHAR(150) NOT NULL,
  email        VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cliente (nome, email) VALUES
  ('João Silva',   'joao@email.com'),
  ('Ana Costa',    'ana@email.com'),
  ('Carlos Lima',  'carlos@email.com'),
  ('João Santos',  'joao.santos@email.com'),
  ('Paula Souza',  'paula@email.com'),
  ('Pedro Alves',  'pedro@email.com'),
  ('Maria e João', 'maria@email.com');

INSERT INTO fornecedor (razao_social, email) VALUES
  ('Alfa Distribuidora Ltda', 'contato@alfa.com'),
  ('Tech Solutions Ltda',     'contato@tech.com'),
  ('Beta Materiais ME',       'vendas@beta.com'),
  ('Gama Logística SA',       'gama@logistica.com'),
  ('Tech Informática',        'contato@techinfo.com');

-- Consultas usadas na pesquisa (exemplos)
-- SELECT id, nome, email FROM cliente WHERE nome LIKE '%João%' ORDER BY nome;
-- SELECT id, razao_social, email FROM fornecedor WHERE razao_social LIKE '%Tech%' ORDER BY razao_social;
