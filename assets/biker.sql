#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `biker` CHARACTER SET 'utf8';
USE `biker`;

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id                int (11) Auto_increment  NOT NULL ,
        mail              Varchar (100) NOT NULL ,
        login          Varchar (50) NOT NULL ,
        password          Char (60) NOT NULL ,
        idMotorcycleClub Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
        id           int (11) Auto_increment  NOT NULL ,
        startDate    Date NOT NULL ,
        endDate      Date NOT NULL ,
        description  Text NOT NULL ,
        location     Varchar (120) NOT NULL ,
        contribution Int NOT NULL ,
        idUsers     Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: motorcycleClub
#------------------------------------------------------------

CREATE TABLE motorcycleClub(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL ,
	location Varchar (255) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: registration
#------------------------------------------------------------

CREATE TABLE registration(
        id        int (11) Auto_increment  NOT NULL ,
	entrants  Int ,
        idUsers  Int NOT NULL ,
        idEvents Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;

ALTER TABLE users ADD CONSTRAINT FK_usersIdMotorcycleClub FOREIGN KEY (idMotorcycleClub) REFERENCES motorcycleClub(id);
ALTER TABLE events ADD CONSTRAINT FK_eventsIdUsers FOREIGN KEY (idUsers) REFERENCES users(id);
ALTER TABLE registration ADD CONSTRAINT FK_registrationIdUsers FOREIGN KEY (idUsers) REFERENCES users(id);
ALTER TABLE registration ADD CONSTRAINT FK_registrationIdEvents FOREIGN KEY (idEvents) REFERENCES events(id);

