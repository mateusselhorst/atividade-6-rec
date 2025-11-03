CREATE DATABASE empresa_db;
USE empresa_db;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE tarefas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
    status ENUM('A fazer', 'Fazendo', 'Pronto') NOT NULL,
    fk_usuario INT NOT NULL,
    FOREIGN KEY (fk_usuario) REFERENCES usuarios(id)
);