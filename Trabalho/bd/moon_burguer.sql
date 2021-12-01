CREATE DATABASE moon_burguer;
USE moon_burguer;

CREATE TABLE clientes(
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
telefone CHAR(14) NOT NULL,
cep CHAR(9) NOT NULL,
endereco VARCHAR(150) NOT NULL,
senha VARCHAR(80),
PRIMARY KEY (id)
)ENGINE=INNODB;

CREATE TABLE funcionarios(
id CHAR(14) NOT NULL,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
telefone CHAR(14) NOT NULL,
endereco VARCHAR(150) NOT NULL,
senha VARCHAR(80),
PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE lanches(
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
nome VARCHAR(100) NOT NULL,
descricao VARCHAR(450) NOT NULL,
preco DOUBLE(9,2) UNSIGNED NOT NULL,
tipo CHAR(6),
img VARCHAR(200),
funcionario_id CHAR(14) NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(funcionario_id) REFERENCES funcionarios(id)
)ENGINE=INNODB;

CREATE TABLE vendas(
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
data DATE NOT NULL,
valor_total DOUBLE(9,2) NOT NULL,
forma_pagamento VARCHAR(20) NOT NULL,
clientes_id  INT UNSIGNED NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY (clientes_id) REFERENCES clientes(id)
)ENGINE=INNODB;

CREATE TABLE itens_venda(
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
quantidade INT UNSIGNED NOT NULL,
valor_per_unidade DOUBLE(9,2),
vendas_id INT UNSIGNED NOT NULL,
lanches_id INT UNSIGNED NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY (vendas_id) REFERENCES vendas(id),
FOREIGN KEY (lanches_id) REFERENCES lanches(id)
)ENGINE=INNODB;

select * from clientes;		
SELECT count(0) FROM clientes where email = 'joao@joao.com' and senha = '123456';

insert into clientes values (null,'joao lucas', 'joao@joao.com','11991929394','321321','ola de avedo','123456');
select count(0) from clientes where email = 'joao@joao.com' and senha = '12345';
