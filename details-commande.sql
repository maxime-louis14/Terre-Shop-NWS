CREATE TABLE details_commande (
    id_details_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_commande INT(3) NULL DEFAULT NULL,
    id_produit INT(3) NULL DEFAULT NULL,
    quantite INT(3) NOT NULL,
    prix INT(3) NOT NULL
) ENGINE = InnoDB;