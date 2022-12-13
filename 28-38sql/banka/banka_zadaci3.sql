use Banka;

/* 33. Napisati SQL upit koji za svakog komitenta koji ima bar jedan aktivan račun ispisuje broj
aktivnih računa koje on ima. */

SELECT R.IdKom, K.Naziv, count(*) AS 'Broj aktivnih racuna'
FROM Racun R, Komitent K
WHERE R.Status = 'A' AND R.IdKom = K.IdKom
GROUP BY IdKom
;

/* 34. zadatak: Napisati SQL upit koji ispisuje broj računa na kojima je stanje pozitivno, samo za korisnike koji
imaju bar jedan pozitivan račun. */

SELECT R.IdKom, K.Naziv, count(*) AS 'Broj racuna'
FROM Racun R, Komitent K
WHERE R.Stanje >= 0 AND R.IdKom = K.IdKom
GROUP BY R.IdKom
; 

/* 35. Napisati SQL upit koji za komitente koji imaju ukupno pozitivno stanje na računima ispisuje
naziv komitenta i sumu na tim računima. */

SELECT R.IdKom, K.Naziv, Sum(R.Stanje) AS SUMA
FROM Racun R, Komitent K
WHERE R.IdKom = K.IdKom
GROUP BY R.IdKom, K.Naziv
HAVING Sum(R.Stanje > 0)
;

/* dodatni zad: ispisuje sve komitente koji imaju dva ili više računa */

SELECT K.Naziv, count(*)
FROM Racun R, Komitent K
WHERE R.IdKom = K.IdKom
GROUP BY R.IdKom, K.Naziv
HAVING Count(*) >= 2;

/* 36. Napisati SQL upit koji ispisuje sve komitente koji imaju tačno dva računa. */

SELECT K.Naziv, count(*)
FROM Racun R, Komitent K
WHERE R.IdKom = K.IdKom
GROUP BY R.IdKom, K.Naziv
HAVING Count(*) = 2
;

/* 37. Napisati SQL upit koji ispisuje sve komitente koji imaju tačno dva aktivna računa. */
SELECT R.IdKom, K.Naziv
FROM Racun R, Komitent K
WHERE R.IdKom = K.IdKom AND R.Status = 'A'
GROUP BY R.IdKom, K.Naziv
HAVING Count(*) = 2
;

/* 38. Napisati SQL upit koji ispisuje sve račune koji su imali transakcije u dve ili više različitih filijala. */
SELECT IdRac
FROM Stavka
GROUP BY IdRac
HAVING COUNT(DISTINCT(IdFil)) >= 2
;

/* 39. Napisati SQL upit koji ispisuje sve račune koji su imali transakcije u dva ili više različitih mesta. */

SELECT s.IdRac
FROM Stavka s, Filijala f
WHERE s.IdFil = f.IdFIl
GROUP BY s.IdRac
HAVING COUNT(DISTINCT f.IdMes) >= 2
;

/* 40. Napisati SQL skriptu za kreiranje tabele Komitent. 
IdKom je celobrojna veličina koja identifikuje komitenta, 
Naziv predstavlja niz od najviše 50 karaktera i obavezan je, 
Adresa predstavlja niz od najviše 50 karaktera. */

/*

CREATE TABLE Komitent(
	IdKom INTEGER PRIMARY KEY,
    Naziv VARCHAR(50) NOT NULL,
    Adresa VARCHAR(50)
);

DROP TABLE Komitent;

CREATE TABLE Komitent(
	IdKom INTEGER PRIMARY KEY,
    Naziv VARCHAR(50) NOT NULL,
    Adresa VARCHAR(50)
);

*/

/* 41. Napisati SQL skriptu za kreiranje tabele Mesto. 
IdMes je celobrojna veličina koja identifikuje mesto, 
PostBr predstavlja niz od 6 karaktera koji je jedinstven i obavezan, 
Naziv predstavlja niz od najviše 50 karaktera i obavezan je. */

/*
CREATE TABLE Mesto(
	IdMes INTEGER PRIMARY KEY,
    PostBr VARCHAR(6) NOT NULL UNIQUE,
    Naziv VARCHAR(50) NOT NULL
);
*/

/* 42. Napisati SQL skriptu za kreiranje pogleda BlokiraniKomitent koji kao prikaz daje sve
Komitente koji imaju bar jedan blokiran račun. Prikaz rezultata treba da bude u formatu: IdKom,
Naziv, BrojBlokiranihRacuna. */

CREATE VIEW BlokiraniKomitent(IdKom, Naziv, BrojBlokiranihRacuna)
AS 
SELECT R.IdKom, K.Naziv, COUNT(*)
FROM Racun R, Komitent K
WHERE R.Status = 'B' AND R.IdKom = K.IdKom
GROUP BY R.IdKom, K.Naziv
;

SELECT *
FROM BlokiraniKomitent
;

/* 43. Napisati SQL skriptu za kreiranje pogleda FilijaleUMestu koji kao prikaz daje 
sve Gradove u kojima ima Filijala i njihov broj. 
Prikaz rezultata treba da bude u formatu: IdMes, Naziv, BrojFilijala. 
Iskoristiti pogled za prikaz samo mesta koje imaju bar 2 filijale. */

CREATE VIEW FilijalePoMestu(IdMes, Naziv, BrojFilijala)
AS
SELECT F.IdMes, M.Naziv, COUNT(*) AS Broj
FROM Filijala F, Mesto M
WHERE F.IdMes = M.IdMes
GROUP BY F.IdMes
;

SELECT IdMes, Naziv
FROM FilijalePoMestu
WHERE BrojFilijala >=2
;

/* 44. Napisati SQL skriptu za dodavanje novog Komitenta sa idKom 10, koji se zove Nikola i živi u
Bulevaru Kralja Milana 17. */

INSERT INTO Komitent (IdKom, Naziv, Adresa) VALUES (10, 'Nikola', 'Bulevar Kralja Milana 17');

/* 45. Nikoli su potrebna dva računa. Napisati SQL skriptu za kreiranje dva računa. 
Prvi je potrebno da ima id 8, 
dozvoljeni minus od 100000 dinara, 
da na stanju ima 0 dinara 
i da bude aktivan. 
Drugi je potrebno da ima id 9, 
da nema dozvoljeni minus, 
da na stanju ima 0 dinara 
i da bude aktivan. 
Oba su otvorena u Filijali sa idFil 2. */

INSERT INTO Racun (IdRac, Status, BrojStavki, DozvMinus, Stanje, IdFil, IdKom)
VALUES 
	(8, 'A', 0, 0, 0, 2, 10), 
    (9, 'A', 0, 0, 10000, 2, 10)
    ;

/* 46. Nikola se preselio. Napisati SQL skriptu za Komitenta sa idKom 10 menja adresu stanovanja.
Nova adresa je Pozeska 23. */

UPDATE Komitent
SET Adresa = 'Pozeska 23'
WHERE IdKom = 10
;

/* 47. Nikola je rešio da ugasi sve svoje račune. Napisati SQL skriptu za izmenu svih računa gde je
IdKom jednako 10. Prilikom gašenja računa potrebno je dozvoljeni minus i stanje staviti na NULL i
Status staviti na ugašen. */

UPDATE Racun
SET Stanje = NULL, Status = 'U', DozvMinus = NULL
WHERE IdKom = 10
;

/* 48. Napisati SQL skriptu za brisanje svih računa komitenta sa IdKom 10, a zatim i samog
komitenta. */

DELETE FROM Racun
WHERE IdKom = 10
;

DELETE FROM Komitent
WHERE IdKom = 10;

/* 49. Prikazati sve filijale čija adresa ne sadrži reč „trg“ (vršiti case insensitive pretragu). */

SELECT *
FROM Filijala f
WHERE f.Adresa NOT LIKE '%trg%'
;

/* 50. Prikazati koliko ima komitenata čije se ime sastoji od najmanje tri karaktera, a prvi karakter
imena je slovo „m“. */

SELECT *
FROM Komitent k
WHERE k.Naziv LIKE 'm__%'
;

SELECT count(*)
FROM Komitent k
WHERE k.Naziv LIKE 'm__%'
;

/* 51. Prikazati one filijale koje u svom nazivu ili u svojoj adresi imaju karakter “_”. */

SELECT *
FROM Filijala f
WHERE f.Naziv LIKE '%\_%'
;

SELECT *
FROM Filijala f
WHERE f.Naziv LIKE '%!_%' ESCAPE '!'
;

SELECT *
FROM Filijala f
WHERE f.Naziv LIKE '%#_%' ESCAPE '#'
;

/* 52. Napisati upit koji vraća prvih 5 stavki koje su se desile nakon 10:00 sati. */

SELECT *
FROM Stavka
WHERE Vreme > '10:00'
LIMIT 5
;

/* 53. Napisati upit koji vraća drugu i treću stavku po visini iznosa. */

SELECT *
FROM Stavka
ORDER BY Iznos DESC
LIMIT 2 OFFSET 1
;

/* 54. Napisati upit koji vraća prvu četvrtinu svih stavki. */

/*
SELECT *
FROM Stavka
LIMIT (SELECT COUNT(*) FROM Stavka / 4)
;
*/

/* 55. Napisati upit koji vraća treću četvrtinu svih stavki. */
/* 56. Napisati upit koji vraća sve redove stavke nakon trećeg reda. */
