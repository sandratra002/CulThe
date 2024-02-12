CREATE DATABASE culthe;
USE culthe;

CREATE TABLE culthe_type_user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(50) NOT NULL, 
    UNIQUE(libelle)
)Engine=InnoDb;

INSERT INTO culthe_type_user VALUE 
    (NULL,'admin'),
    (NULL,'client');

CREATE TABLE culthe_user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    mdp VARCHAR(256) NOT NULL, 
    id_type INT NOT NULL, 
    UNIQUE(username,mdp),
    FOREIGN KEY(id_type) REFERENCES culthe_type_user(id)
)Engine=InnoDb;

INSERT INTO culthe_user VALUE 
    (NULL,'admin',sha1('admin'),1);