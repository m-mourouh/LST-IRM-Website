-- creér la base de données 
CREATE DATABASE irm ;
-- creér la table user
CREATE TABLE user ( 
     id int NOT NULL AUTO_INCREMENT ,
    prenom varchar(255) NOT NULL ,
    nom varchar(255) NOT NULL ,
    email varchar(255) NOT NULL ,
    dateNaissance date NOT NULL ,
    sexe varchar(20) NOT NULL ,
    pass varchar(255) NOT NULL ,
    v_key varchar(255) NOT NULL ,
    verified tinyint(1) DEFAULT 0 ,
    image varchar(255),
    uploaded tinyint(1) DEFAULT 0 ,
     PRIMARY KEY(id)
     ) ;
-- creér la table student
CREATE TABLE student ( 
     cne varchar(50) NOT NULL ,
     userID int , 
     PRIMARY KEY(cne), 
     FOREIGN KEY(userID) REFERENCES user(id) 
     ) ;


-- irm
-- irmUser
--@Node.js2010@