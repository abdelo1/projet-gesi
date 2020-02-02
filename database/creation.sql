-- CREATE DATABASE equipe;

-- USE equipe;

-- CREATE TABLE titulaire(
--     id SMALLINT PRIMARY KEY AUTO_INCREMENT,
--     nom VARCHAR (20) NOT NULL ,
--     ddn VARCHAR (20) NOT NULL,
--     ldn VARCHAR (40) NOT NULL,
--     club VARCHAR (50) NOT NULL,
--     photo VARCHAR (300) NOT NULL,
--     poste VARCHAR (40)  NOT NULL
-- );
-- CREATE TABLE programme
-- (
--     id SMALLINT PRIMARY KEY AUTO_INCREMENT,
--     ddm VARCHAR (20) NOT NULL ,
--     hdm VARCHAR (20) NOT NULL,
--     categorie VARCHAR (20) NOT NULL,
--     equipe1 VARCHAR (20) NOT NULL,
--     equipe2 VARCHAR (20) NOT NULL,
--     scoreequipe1 VARCHAR (5) NOT NULL,
--     scoreequipe2 VARCHAR (5) NOT NULL,
--     photoequipe1 VARCHAR (50) NOT NULL,
--     photoequipe2 VARCHAR (50) NOT NULL
-- );


CREATE TABLE article
(
   id SMALLINT PRIMARY KEY AUTO_INCREMENT,
   titre VARCHAR(100) NOT NULL,
   contenu TEXT NOT NULL,
   ddp VARCHAR(100) NOT NULL,
    photo VARCHAR (50) NOT NULL  
);



