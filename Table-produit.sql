
SELECT * FROM produit INNER JOIN reservation ON produit.id_produit = reservation.produit;


CREATE TABLE produit (
    id_produit INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    categorie VARCHAR(20) NOT NULL ,
    titre VARCHAR(100) NOT NULL ,
    description TEXT NOT NULL ,
    couleur VARCHAR(20) NOT NULL ,
    taille VARCHAR(5) NOT NULL ,
    public ENUM('m', 'f', 'mixte') NOT NULL ,
    photo VARCHAR(250) NOT NULL ,
    prix INT(3) NOT NULL ,
) ENGINE = InnoDB;