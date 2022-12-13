
DROP DATABASE IF EXISTS Banka;
CREATE DATABASE Banka;

USE Banka;

CREATE TABLE IF NOT EXISTS Mesto (
	IdMes	INTEGER,
	PostBr	CHAR(6) UNIQUE,
	Naziv	VARCHAR(50),
	PRIMARY KEY(IdMes)
);

CREATE TABLE IF NOT EXISTS Filijala (
	IdFil	INTEGER,
	Naziv	VARCHAR(50),
	Adresa	VARCHAR(50),
	IdMes	INTEGER,
	FOREIGN KEY(IdMes) REFERENCES Mesto(IdMes),
	PRIMARY KEY(IdFil)
);

CREATE TABLE IF NOT EXISTS Komitent (
	IdKom	INTEGER,
	Naziv	VARCHAR(50),
	Adresa	VARCHAR(50),
	PRIMARY KEY(IdKom)
);

CREATE TABLE IF NOT EXISTS Racun (
	IdRac	INTEGER,
	Status	CHAR,
	BrojStavki	INTEGER,
	DozvMinus	INTEGER,
	Stanje	INTEGER,
	IdFil	INTEGER,
	IdKom	INTEGER,
	PRIMARY KEY(IdRac),
	FOREIGN KEY(IdFil) REFERENCES Filijala(IdFil),
	FOREIGN KEY(IdKom) REFERENCES Komitent(IdKom)
);

CREATE TABLE IF NOT EXISTS Stavka (
	IdSta	INTEGER,
	RedBroj	INTEGER,
	Datum	Date,
	Vreme	Time,
	Iznos	INTEGER,
	IdFil	INTEGER,
	IdRac	INTEGER,
	FOREIGN KEY(IdFil) REFERENCES Filijala(IdFil),
	FOREIGN KEY(IdRac) REFERENCES Racun(IdRac),
	PRIMARY KEY(IdSta)
);

CREATE TABLE IF NOT EXISTS Uplata (
	IdSta	INTEGER,
	Osnov	VARCHAR(6),
	FOREIGN KEY(IdSta) REFERENCES Stavka(IdSta),
	PRIMARY KEY(IdSta)
);

CREATE TABLE IF NOT EXISTS Isplata (
	IdSta	INTEGER,
	Provizija	DOUBLE,
	PRIMARY KEY(IdSta),
	FOREIGN KEY(IdSta) REFERENCES Stavka(IdSta)
);

CREATE TABLE IF NOT EXISTS ImaSediste (
	IdKom	INTEGER,
	IdMes	INTEGER,
	PRIMARY KEY(IdKom),
	FOREIGN KEY(IdKom) REFERENCES Komitent(IdKom),
	FOREIGN KEY(IdMes) REFERENCES Mesto(IdMes)
);

INSERT INTO Mesto (IdMes,PostBr,Naziv) VALUES (1,'11000','Beograd');
INSERT INTO Mesto (IdMes,PostBr,Naziv) VALUES (2,'18101','Nis');
INSERT INTO Mesto (IdMes,PostBr,Naziv) VALUES (3,'21101','Novi Sad');

INSERT INTO Filijala (IdFil,Naziv,Adresa,IdMes) VALUES (1,'Vozdovac','Vojvode Stepe 37',1);
INSERT INTO Filijala (IdFil,Naziv,Adresa,IdMes) VALUES (2,'TC_Stadion','Zaplenjska trg 32',1);
INSERT INTO Filijala (IdFil,Naziv,Adresa,IdMes) VALUES (3,'Trg slobode','Trg slobode 7',3);
INSERT INTO Filijala (IdFil,Naziv,Adresa,IdMes) VALUES (4,'Nis centar','Trg kralja Milana',2);

INSERT INTO Komitent (IdKom,Naziv,Adresa) VALUES (1,'Marko','Kneza Milosa 20');
INSERT INTO Komitent (IdKom,Naziv,Adresa) VALUES (2,'Nikola','Beogradska 23');
INSERT INTO Komitent (IdKom,Naziv,Adresa) VALUES (3,'Ana','Limska 5');
INSERT INTO Komitent (IdKom,Naziv,Adresa) VALUES (4,'Milica','Vojvode Stepe 23');
INSERT INTO Komitent (IdKom,Naziv,Adresa) VALUES (5,'Milica','Timocka 5');

INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (1,'A',3,20000,1000,1,1);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (2,'A',2,0,78000,1,2);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (3,'A',1,100000,-55000,3,2);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (4,'B',1,50000,-55000,2,3);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (5,'B',1,10000,-12000,2,4);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (6,'A',0,0,0,1,5);
INSERT INTO Racun (IdRac,Status,BrojStavki,DozvMinus,Stanje,IdFil,IdKom) VALUES (7,'U',2,NULL,NULL,3,5);

INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (1,1,'2018-11-01','16:00',1000,1,1);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (2,2,'2018-11-02','16:00',500,1,1);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (3,3,'2018-11-02','15:00',500,1,1);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (4,1,'2018-11-02','15:00',50000,1,2);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (5,2,'2018-11-04','15:00',28000,2,2);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (6,1,'2018-11-12','15:00',55000,3,3);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (7,1,'2018-11-12','15:00',55000,3,4);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (8,1,'2018-11-14','10:00',12000,2,5);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (9,1,'2018-11-14','10:00',12340,2,7);
INSERT INTO Stavka (IdSta,RedBroj,Datum,Vreme,Iznos,IdFil,IdRac) VALUES (10,2,'2018-10-10','10:00',12340,1,7);

INSERT INTO Uplata (IdSta,Osnov) VALUES (1,'Plata');
INSERT INTO Uplata (IdSta,Osnov) VALUES (3,'Plata');
INSERT INTO Uplata (IdSta,Osnov) VALUES (4,'Plata');
INSERT INTO Uplata (IdSta,Osnov) VALUES (5,'Uplata');
INSERT INTO Uplata (IdSta,Osnov) VALUES (9,'Uplata');

INSERT INTO Isplata (IdSta,Provizija) VALUES (2,0.0);
INSERT INTO Isplata (IdSta,Provizija) VALUES (6,0.0);
INSERT INTO Isplata (IdSta,Provizija) VALUES (7,1.0);
INSERT INTO Isplata (IdSta,Provizija) VALUES (8,0.0);
INSERT INTO Isplata (IdSta,Provizija) VALUES (10,0.0);

INSERT INTO ImaSediste (IdKom,IdMes) VALUES (1,1);
INSERT INTO ImaSediste (IdKom,IdMes) VALUES (2,1);
INSERT INTO ImaSediste (IdKom,IdMes) VALUES (3,1);
INSERT INTO ImaSediste (IdKom,IdMes) VALUES (4,1);
INSERT INTO ImaSediste (IdKom,IdMes) VALUES (5,2);
