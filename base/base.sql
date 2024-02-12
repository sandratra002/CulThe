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

--views--
CREATE OR REPLACE VIEW v_culthe_info_user AS
    SELECT c_u.id AS id, c_u.username AS username, c_t.id AS id_type, c_t.libelle AS libelle
    FROM culthe_user 
    AS c_u
    JOIN culthe_type_user
    AS c_t
    ON c_u.id = c_t.id;