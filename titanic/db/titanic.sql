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

INSERT INTO `client`(`id_client`, `nom_complet`, `username`, `cin`, `age`, `email`, `telephone`, `password`, `genre`, `role`) VALUES (null, null, 'admin3',null,null,null,null,'admin',null,'admin')
