CREATE database titanic;
use titanic;

CREATE TABLE client (
    id_client INT AUTO_INCREMENT PRIMARY KEY,  
    nom_complet VARCHAR(255) ,         
    username VARCHAR(50) NOT NULL UNIQUE,     
    cin VARCHAR(20)  UNIQUE,           
    age INT NOT NULL,                          
    email VARCHAR(255)  UNIQUE,        
    telephone VARCHAR(10)  UNIQUE,                 
    password VARCHAR(100) NOT NULL,            
    genre ENUM('Homme', 'Femme') ,
    role VARCHAR(50) NOT NULL
);
