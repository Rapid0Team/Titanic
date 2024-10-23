CREATE database titanic;
use titanic;

CREATE TABLE client (
    id_client INT AUTO_INCREMENT PRIMARY KEY,  
    nom_complet VARCHAR(255) NOT NULL,         
    username VARCHAR(50) NOT NULL UNIQUE,     
    cin VARCHAR(20) NOT NULL UNIQUE,           
    age INT NOT NULL,                          
    email VARCHAR(255) NOT NULL UNIQUE,        
    telephone VARCHAR(10) NOT NULL UNIQUE,                 
    password VARCHAR(100) NOT NULL,            
    genre ENUM('Homme', 'Femme') NOT NULL  
);
