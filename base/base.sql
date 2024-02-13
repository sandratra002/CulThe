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
    (NULL,'admin',sha1('admin'),1),
    (NULL,'client',sha1('client'),2)
;

CREATE TABLE culthe_variete_the(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL,
    rendement DECIMAL(10,2) NOT NULL,
    CHECK(occupation > 0 AND rendement > 0)
)Engine=InnoDb;

INSERT INTO culthe_variete_the VALUES
    (NULL,'Thé vert Sencha', 5.25, 8.75),
    (NULL,'Thé noir Assam', 5.25, 7.90),
    (NULL,'Thé oolong Tie Guan Yin', 5.25, 9.20),
    (NULL,'Thé blanc Bai Hao Yin Zhen', 5.25, 10.50),
    (NULL,'Thé pu-erh Sheng', 5.25, 10.00),
    (NULL,'Thé vert Matcha', 5.25, 8.50),
    (NULL,'Thé noir Darjeeling', 5.25, 9.80),
    (NULL,'Thé oolong Da Hong Pao', 5.25, 9.40),
    (NULL,'Thé blanc Shou Mei', 5.25, 10.80),
    (NULL,'Thé pu-erh Shou', 5.25, 10.20);

CREATE TABLE culthe_parcelle(
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL, 
    surface DECIMAL(12,2) NOT NULL,
    nombre_pieds INT NOT NULL,
    id_variete_the INT NOT NULL,
    UNIQUE(numero,id_variete_the),
    CHECK(numero > 0 AND nombre_pieds >= 0),
    FOREIGN KEY(id_variete_the) REFERENCES culthe_variete_the(id)
)Engine=InnoDb;

INSERT INTO culthe_parcelle VALUES
    (NULL,1, 2,3809, 1),
    (NULL,2, 3,5714, 3),
    (NULL,3, 2,3809, 5),
    (NULL,4, 1,1904, 7),
    (NULL,5, 2,3809, 9),
    (NULL,6, 2,3809, 2),
    (NULL,7, 5,9523, 4),
    (NULL,8, 5,9523, 6),
    (NULL,9, 3,5714, 8),
    (NULL,10, 2,3809, 10);

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
    montant DECIMAL(18,2) NOT NULL, 
    date_depense DATE NOT NULL,
    FOREIGN KEY(id_categorie_depense) REFERENCES culthe_categorie_depense(id)
)Engine=InnoDb;

CREATE TABLE culthe_cueillette(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cueilleur INT NOT NULL, 
    id_parcelle INT NOT NULL, 
    date_cueillette DATE NOT NULL, 
    poids_cueilli DECIMAL NOT NULL, 
    FOREIGN KEY(id_cueilleur) REFERENCES culthe_cueilleur(id),
    FOREIGN KEY(id_parcelle) REFERENCES culthe_parcelle(id)
)Engine=InnoDb;

INSERT INTO culthe_cueillette VALUES 
    (NULL,1,1,'2023-2-1',245);

CREATE TABLE culthe_salaire(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_cueilleur INT NOT NULL, 
    montant DECIMAL(18,2) NOT NULL
)Engine=InnoDb;


INSERT INTO culthe_salaire VALUES
    (NULL,1,100000);

ALTER TABLE culthe_cueilleur ADD  poids_minimal DECIMAL(10,2) NOT NULL; 
ALTER TABLE culthe_cueilleur ADD  bonus DECIMAL(10,2) NOT NULL; 
ALTER TABLE culthe_cueilleur ADD  malus DECIMAL(10,2) NOT NULL; 
ALTER TABLE culthe_cueilleur ADD CONSTRAINT CHECK(poids_minimal >=0 AND bonus > 0 AND malus > 0);

ALTER TABLE culthe_variete_the ADD prix_vente DECIMAL(18,2) NOT NULL DEFAULT 0;
ALTER TABLE culthe_variete_the ADD CONSTRAINT CHECK(prix_vente >= 0);


CREATE OR REPLACE VIEW v_culthe_info_user AS
    SELECT c_u.id AS id, c_u.username AS username, c_t.id AS id_type, c_t.libelle AS libelle
    FROM culthe_user 
    AS c_u
    JOIN culthe_type_user
    AS c_t
    ON c_u.id_type = c_t.id
;

    CREATE OR REPLACE VIEW v_culthe_info_cueilleur AS 
        SELECT cc.* ,cg.libelle
        FROM culthe_cueilleur 
        AS cc 
        JOIN culthe_genre
        AS cg 
        ON cc.id_genre=cg.id;

CREATE OR REPLACE VIEW v_culthe_info_parcelle AS 
    SELECT cp.id AS id_parcelle, cp.numero AS numero_parcelle, cp.surface AS surface_parcelle,cp.nombre_pieds AS nombre_pieds, cvt.id AS id_variete_the, cvt.nom AS nom_variete_the, cvt.occupation AS occupation_the, cvt.rendement AS rendement_par_mois
    FROM culthe_parcelle 
    AS cp 
    JOIN culthe_variete_the 
    AS cvt 
    ON cp.id_variete_the=cvt.id;

CREATE OR REPLACE VIEW v_culthe_info_salaire AS 
    SELECT cs.id AS id_salaire,cc.nom AS nom_cueilleur,cs.id_cueilleur AS id_cueilleur,cc.date_naissance AS date_naissance,cg.libelle AS genre, cs.montant AS montant 
    FROM culthe_salaire 
    AS cs 
    JOIN culthe_cueilleur 
    AS cc 
    ON cs.id_cueilleur=cc.id
    JOIN culthe_genre 
    AS cg 
    ON cc.id_genre=cg.id;

CREATE OR REPLACE VIEW v_culthe_info_depense AS 
    SELECT cd.*,ccd.libelle AS categorie_depense 
    FROM culthe_depense 
    AS cd 
    JOIN culthe_categorie_depense 
    AS ccd 
    ON cd.id_categorie_depense=ccd.id;

CREATE OR REPLACE VIEW v_culthe_info_depense AS 
    SELECT cd.*,ccd.libelle AS categorie_depense 
    FROM culthe_depense 
    AS cd 
    JOIN culthe_categorie_depense 
    AS ccd 
    ON cd.id_categorie_depense=ccd.id;

CREATE OR REPLACE VIEW v_culthe_somme_poids_cueilli_par_mois AS 
    SELECT culthe_cueillette.id_parcelle AS id_parcelle_cueillette,YEAR(date_cueillette) AS year,MONTH(date_cueillette) AS month,sum(poids_cueilli) 
    AS somme 
    FROM culthe_cueillette 
    GROUP BY culthe_cueillette.id_parcelle,YEAR(date_cueillette),MONTH(date_cueillette);

CREATE OR REPLACE VIEW v_culthe_parcelle_restant AS 
    SELECT vip.id_parcelle AS id_parcelle, vip.numero_parcelle AS numero_parcelle, vcs.year AS year,vcs.month AS month,sum(vcs.somme) AS somme,vip.nombre_pieds-somme AS restant
    FROM v_culthe_info_parcelle
    AS vip
    JOIN v_culthe_somme_poids_cueilli_par_mois 
    AS vcs 
    ON vip.id_parcelle = vcs.id_parcelle_cueillette
    GROUP BY vip.id_parcelle,vcs.year,vcs.month;

CREATE OR REPLACE VIEW v_culthe_info_cueillette AS 
    SELECT culthe_cueillette.id_parcelle,sum(culthe_cueillette.poids_cueilli) AS somme,culthe_cueillette.date_cueillette
    FROM culthe_cueillette
    GROUP BY culthe_cueillette.id_parcelle,culthe_cueillette.date_cueillette
;

CREATE OR REPLACE VIEW v_culthe_info_cueillette_prix AS 
    SELECT culthe_cueillette.id_parcelle as id_parcelle,culthe_cueillette.date_cueillette as date_cueillette,v_culthe_info_salaire.montant AS montant
    FROM culthe_cueillette,v_culthe_info_salaire
;

CREATE OR REPLACE VIEW v_culthe_paiement_cueilleur AS 
    SELECT cc.id,cic.date_cueillette,cc.nom,cc.bonus,cc.malus,cc.poids_minimal,sum(cic.poids_cueilli) as poids_cueilli,sum(cs.montant) as montant
    FROM culthe_cueilleur
    AS cc 
    JOIN v_culthe_info_salaire
    AS cis
    ON cc.id=cis.id_cueilleur
    JOIN culthe_cueillette 
    AS cic 
    ON cis.id_cueilleur=cic.id_cueilleur
    JOIN culthe_salaire
    AS cs 
    ON cic.id_cueilleur=cs.id_cueilleur
    GROUP BY cc.id,cic.date_cueillette
    ;
