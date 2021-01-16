
-- Criação da tabela

CREATE DATABASE IF NOT EXISTS crud_contatos;

USE crud_contatos;

CREATE TABLE contatos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) NOT NULL
);



-- Exemplos de dados para serem inseridos na tabela

INSERT INTO contatos (nome, email, telefone) VALUES
('Makley', 'makley@gmail.com', '00000001'),
('Dionatan', 'dionatan@gmail.com', '00000010'),
('Carlos', 'carlos@gmail.com', '00000011'),
('Ana', 'ana@gmail.com', '00000100'),
('Cleber', 'cleber@gmail.com', '00000101'),
('Rodrigo', 'rodrigo@gmail.com', '00000110'),
('Fernanda', 'fernanda@gmail.com', '00000111'),
('Paula', 'paula@gmail.com', '00001000'),
('Erica', 'erica@gmail.com', '00001001'),
('Erick', 'erick@gmail.com', '00001010'),
('Mateus', 'mateus@gmail.com', '00001011'),
('Sandra', 'sandra@gmail.com', '00001100'),
('Marcelo', 'marcelo@gmail.com', '00001101'),
('João', 'joão@gmail.com', '00001110'),
('Osvaldo', 'osvaldo@gmail.com', '00001111'),
('Diego', 'Diego@gmail.com', '00010000'),
('Lorenzo', 'lorenzo@gmail.com', '00010001'),
('Adriana', 'adriana@gmail.com', '00010010'),
('Samuel', 'samuel@gmail.com', '00010011'),
('Alexandra', 'alexandra@gmail.com', '00010100'),
('Vini', 'vini@gmail.com', '00010101'),
('Amanda', 'amanda@gmail.com', '00010110'),
('Emanuel', 'emanuel@gmail.com', '00010111');
