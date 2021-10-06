CREATE TABLE commande (
    id_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_membre INT(3) NULL DEFAULT NULL,
    montant INT(3) NOT NULL,
    date_enregistrement DATETIME NOT NULL,
    etat ENUM('en cours de traitement', 'envoyé', 'livré') NOT NULL
) ENGINE = InnoDB;