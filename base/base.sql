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

CREATE TABLE culthe_variete_the(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL,
    rendement DECIMAL(10,2) NOT NULL,
    CHECK(occupation > 0 AND rendement > 0)
)Engine=InnoDb;

INSERT INTO culthe_variete_the VALUES
    (NULL,'Thé vert Sencha', 5.25, 8.75),
    (NULL,'Thé noir Assam', 6.50, 7.90),
    (NULL,'Thé oolong Tie Guan Yin', 4.75, 9.20),
    (NULL,'Thé blanc Bai Hao Yin Zhen', 3.80, 10.50),
    (NULL,'Thé pu-erh Sheng', 4.20, 10.00),
    (NULL,'Thé vert Matcha', 6.80, 8.50),
    (NULL,'Thé noir Darjeeling', 5.60, 9.80),
    (NULL,'Thé oolong Da Hong Pao', 4.90, 9.40),
    (NULL,'Thé blanc Shou Mei', 3.50, 10.80),
    (NULL,'Thé pu-erh Shou', 4.40, 10.20);

CREATE TABLE culthe_parcelle(
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL, 
    surface DECIMAL(12,2) NOT NULL,
    id_variete_the INT NOT NULL,
    UNIQUE(numero,id_variete_the),
    CHECK(numero > 0),
    FOREIGN KEY(id_variete_the) REFERENCES culthe_variete_the(id)
)Engine=InnoDb;

INSERT INTO culthe_parcelle VALUES
    (NULL,1, 25.5, 1),
    (NULL,2, 30.8, 3),
    (NULL,3, 20.2, 5),
    (NULL,4, 18.7, 7),
    (NULL,5, 22.0, 9),
    (NULL,6, 28.3, 2),
    (NULL,7, 15.6, 4),
    (NULL,8, 35.1, 6),
    (NULL,9, 23.9, 8),
    (NULL,10, 21.4, 10);

CREATE TABLE culthe_genre(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    libelle VARCHAR(10) NOT NULL
)Engine=InnoDb;

INSERT INTO culthe_genre VALUE 
    (null,'Homme'),
    (null,'Femme'),
    (null,'N/A')
;

CREATE TABLE culthe_cueilleur(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nom VARCHAR(50) NOT NULL, 
    id_genre INT NOT NULL, 
    date_naissance DATE NOT NULL, 
    UNIQUE(nom,date_naissance),
    FOREIGN KEY(id_genre) REFERENCES culthe_genre(id)
)Engine=InnoDb;

INSERT INTO culthe_cueilleur VALUES
    (NULL,'Marie Dupont', 2, '1990-05-15'),
    (NULL,'Jean Leclerc', 1, '1985-08-23'),
    (NULL,'Sophie Martin', 2, '1992-02-10'),
    (NULL,'Pierre Lambert', 1, '1988-11-03'),
    (NULL,'Isabelle Girard', 2, '1995-07-18'),
    (NULL,'Luc Moreau', 1, '1983-04-26'),
    (NULL,'Claire Lefevre', 2, '1998-09-12'),
    (NULL,'David Tremblay', 1, '1980-12-30'),
    (NULL,'Aurélie Roy', 2, '1993-06-08'),
    (NULL,'Alexandre Gagnon', 1, '1987-01-17');


CREATE TABLE culthe_categorie_depense(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    libelle VARCHAR(50) NOT NULL
)Engine=InnoDb;

INSERT INTO culthe_categorie_depense VALUE
    (NULL,'Transport'),
    (NULL,'Carburant'),
    (NULL,'Logistique'),
    (NULL,'Engrais'),
    (NULL,'Pourboire')
;

CREATE TABLE culthe_depense(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_categorie_depense INT NOT NULL, 
    montant DECIMAL(18,2)L NOT NULL, 
    date_depense DATETIME NOT NULL,
    FOREIGN KEY(id_categorie_depense) REFERENCES culthe_categorie_depense(id)
)Engine=InnoDb;

CREATE TABLE culthe_cueuillette(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cueilleur INT NOT NULL, 
    id_parcelle INT NOT NULL, 
    date_cueillette DATETIME NOT NULL, 
    poids_cueilli DECIMAL NOT NULL, 
    FOREIGN KEY(id_cueilleur) REFERENCES culthe_cueilleur(id),
    FOREIGN KEY(id_parcelle) REFERENCES culthe_parcelle(id)
)Engine=InnoDb;



--views--
CREATE OR REPLACE VIEW v_culthe_info_user AS
    SELECT c_u.id AS id, c_u.username AS username, c_t.id AS id_type, c_t.libelle AS libelle
    FROM culthe_user 
    AS c_u
    JOIN culthe_type_user
    AS c_t
    ON c_u.id = c_t.id
;
