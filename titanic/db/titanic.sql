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
    
    
