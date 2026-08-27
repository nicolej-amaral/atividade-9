CREATE DATABASE atividade09;

USE atividade09;

CREATE TABLE clientes (
 id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    numero VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE  animais(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    descricao TEXT,
    clientes_id INT NOT NULL,

    FOREIGN KEY (clientes_id)
    REFERENCES clientes(id)
);

