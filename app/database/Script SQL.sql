CREATE TABLE cliente(
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  dataN varchar(100),
  telefone varchar(15) NOT NULL,
  email varchar(100) NOT NULL UNIQUE,
  CONSTRAINT pk_Cliente PRIMARY KEY(id)
);

INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Cassia Nardoni', '10/10/2000', '(043)99999-9999', 'cassiauenpsi@hotmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Joao Scaleao', '12/12/1990', '(014)99633-0828', 'j.scaleao@hotmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Angela Pao', '11/11/1980', '(014)99808-3335', 'a@gmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Aryane Macarrao', '06/06/1970', '(043)99999-9999', 'b@gmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Amanda Feijao', '01/01/1991', '(043)99999-9999', 'c@gmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Karina Bife', '03/03/1985', '(043)99999-9999', 'd@gmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Camila Tomate', '02/02/1982', '(043)99999-9999', 'e@gmail.com');
INSERT INTO cliente (`nome`, `dataN`, `telefone`, `email`) VALUES ('Adenilson Banana', '09/09/1997', '(014)99722-0828', 'f@gmail.com');
