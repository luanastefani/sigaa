CREATE DATABASE sigaa;
USE sigaa;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('aluno', 'professor', 'responsavel', 'coordenador') NOT NULL
);

-- Exemplo de coordenador cadastrado (senha: 1234)
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Maria Coordenadora', 'coordenador@email.com', 
        '$2y$10$VJiPdpw9FtmLjAFztAh0/Oqte7qOcW3ZhftVrKeU3Zqqn.D4w3eK2', 
        'coordenador');