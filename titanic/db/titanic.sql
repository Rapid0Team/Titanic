CREATE database titanic;
use titanic;

CREATE TABLE client (
    id_client INT AUTO_INCREMENT PRIMARY KEY,  
    nom_complet VARCHAR(255) ,         
    username VARCHAR(50) NOT NULL UNIQUE,     
    cin VARCHAR(20)  UNIQUE,           
    age INT,                          
    email VARCHAR(255)  UNIQUE,        
    telephone VARCHAR(10)  UNIQUE,                 
    password VARCHAR(100) NOT NULL,            
    genre ENUM('Homme', 'Femme') ,
    role VARCHAR(50) NOT NULL
);

INSERT INTO `client`(`id_client`, `nom_complet`, `username`, `cin`, `age`, `email`, `telephone`, `password`, `genre`, `role`) VALUES (null, null, 'admin1',null,null,null,null,'admin',null,'admin');

INSERT INTO `client`(`id_client`, `nom_complet`, `username`, `cin`, `age`, `email`, `telephone`, `password`, `genre`, `role`) VALUES (null, null, 'admin2',null,null,null,null,'admin',null,'admin');

INSERT INTO `client`(`id_client`, `nom_complet`, `username`, `cin`, `age`, `email`, `telephone`, `password`, `genre`, `role`) VALUES (null, null, 'admin3',null,null,null,null,'admin',null,'admin');

CREATE TABLE cars(
    id_cars int AUTO_INCREMENT PRIMARY KEY,
    marque varchar(50),
    model varchar(50),
    annee int(3),
    vin varchar(50) UNIQUE,
    prix int(3),
    type_moteur varchar(50),
    transmission varchar(50),
    couleur varchar(50),
    kilometre int(3),
    nom_proprietaire varchar(50),
    numero_plaque varchar(50),
    etat_region varchar(50),
    statut_actuel varchar(50),
    Commentaires_Notes varchar(50),
    photo varchar(50));
    

    INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, 'FIAT', 'AZERT', '1999', 'gergn', '20000', 'SPORT', 'LICENCE', 'red', '45', 'AZER', 'A22B33', 'RABAT', 'MANUEL', 'TRES BONNE VOITURE', '../photosCars/CAR1.jpg');

    INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, 'FIAT', 'AZEeRT', '1999', 'Agergergn', '20000', 'SPORT', 'LICENCE', 'red', '45', 'AZER', 'A22B33', 'RABAT', 'MANUEL', 'TRES BONNE VOITURE', '../photosCars/CAR2.jpg');


    INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, 'FIAT', 'AZEtRT', '1999', 'gehfgfTRin', '20000', 'SPORT', 'LICENCE', 'red', '45', 'AZER', 'A22B33', 'RABAT', 'MANUEL', 'TRES BONNE VOITURE', '../photosCars/CAR3.jpg');

    INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, 'FIAT', 'AZEyRT', '1999', 'ykYin', '20000', 'SPORT', 'LICENCE', 'red', '45', 'AZER', 'A22B33', 'RABAT', 'MANUEL', 'TRES BONNE VOITURE', '../photosCars/CAR4.jpg');


    INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, 'FIAT', 'AZEdRT', '1999', 'ukdRin', '20000', 'SPORT', 'LICENCE', 'red', '45', 'AZER', 'A22B33', 'RABAT', 'MANUEL', 'TRES BONNE VOITURE', '../photosCars/CAR5.jpg');
                  
    
