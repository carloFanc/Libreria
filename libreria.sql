DROP DATABASE LIBRERIA;
CREATE DATABASE LIBRERIA;
USE LIBRERIA;

/*Definizione delle tabelle SQL*/

CREATE TABLE IF NOT EXISTS Utente(

	Email VARCHAR(20) NOT NULL PRIMARY KEY,
	Nome VARCHAR(20) NOT NULL,
	Cognome VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	Tipologia ENUM('Semplice','Amministratore') DEFAULT 'Semplice',
	Luogo_Nascita VARCHAR(20),
	Telefono VARCHAR(20)
	) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Autore(

	ID VARCHAR(6) NOT NULL PRIMARY KEY,
	Nome VARCHAR(20) NOT NULL,
	Cognome VARCHAR(20) NOT NULL,
	Eta INT NOT NULL,
	Nickname VARCHAR(20)
	) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Libro(
 
	IdAutore VARCHAR(6) NOT NULL,
	Titolo VARCHAR(50) NOT NULL,
	Anno INT NOT NULL,
	Pagine INT,
	Editore VARCHAR(100),
	Collana VARCHAR(100),
	ISBN VARCHAR(13) NOT NULL  PRIMARY KEY,
	Prezzo FLOAT NOT NULL,
	Sconto INT,
	Foto VARCHAR(50),
	FOREIGN KEY (IdAutore) REFERENCES Autore(ID) 
	ON DELETE CASCADE
	ON UPDATE CASCADE
	) ENGINE=INNODB;
	
DELIMITER ^
CREATE PROCEDURE ListaAutoriConLibri(IN TitoloInserito VARCHAR(50),IN AnnoInserito INT, IN EditoreInserito VARCHAR(100), IN CollanaInserito VARCHAR(100) )
BEGIN
 
SET AUTOCOMMIT = 0;
START TRANSACTION; 
  SELECT * FROM Autore WHERE ID IN ( SELECT IdAutore FROM Libro WHERE (INSTR(Titolo,IFNULL(TitoloInserito,"")) > 0) AND (IF( AnnoInserito = 0,TRUE,Anno=AnnoInserito)) AND (INSTR(Editore, IFNULL(EditoreInserito,"")) > 0)  AND (INSTR(Collana,IFNULL( CollanaInserito,"")) > 0 ) );
COMMIT;
END;
^
DELIMITER ;	
	
/* --------------Inserimento dati nelle tabelle-----------------*/

INSERT INTO Utente(Email,Nome,Cognome,Password,Tipologia,Luogo_Nascita,Telefono) VALUES ('utente@gmail.com','Mario','Rossi','utente','Semplice','Roma',123456789);
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('184925','Giacomo','Guilizzoni',37,'Peldi');
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('731964','Jurie','Kracvociow',45,'Jurie');
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('984863','Samuele','Guidoli',28,'Samu28');
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('273254','Arina','Querzi',28,'Jake');
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('946724','PierFrancesco','Busi',42,'PierFra');
INSERT INTO Autore(ID,Nome,Cognome,Eta,Nickname) VALUES ('576524','Loretta','Dormei',58,'Loretta34');

INSERT INTO Libro(IdAutore,Titolo,Anno,Pagine,Editore,Collana,ISBN,Prezzo,Sconto,Foto) VALUES ('984863','Miss Galassia','2015',240,'Feltrinelli','Universale Ec.','12',14.50,10,'miss_galassia.jpg');
INSERT INTO Libro(IdAutore,Titolo,Anno,Pagine,Editore,Collana,ISBN,Prezzo,Sconto,Foto) VALUES ('984863','L uomo che incontro il piccolo drago','2014',370,'Feltrinelli','Universale Ec.','13',12.50,5,'piccolodrago.jpg');
INSERT INTO Libro(IdAutore,Titolo,Anno,Pagine,Editore,Collana,ISBN,Prezzo,Sconto,Foto) VALUES ('984863','Fen il fenomeno','2013',350,'Feltrinelli','Universale Ec.','14',19.90,15,'fenilfenomeno.jpg');
INSERT INTO Libro(IdAutore,Titolo,Anno,Pagine,Editore,Collana,ISBN,Prezzo,Sconto,Foto) VALUES ('184925','Le Beatrici','2012',194,'Feltrinelli','Universale Ec.','15',11.90,40,'lebeatrici.jpg');
INSERT INTO Libro(IdAutore,Titolo,Anno,Pagine,Editore,Collana,ISBN,Prezzo,Sconto,Foto) VALUES ('273254','Bar Sport 2000','2013',652,'Feltrinelli','Universale Ec.','16',19.90,15,'barsport2000.jpg');
