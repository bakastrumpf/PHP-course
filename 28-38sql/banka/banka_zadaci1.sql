/*
SELECT
FROM
WHERE
ORDER BY
*/

/* 1.zadatak: ispisuje sve podatke iz tabele Komitent  */
select *
FROM Komitent;

/* 2.zadatak: sve podatke iz tabele Racun  */
SELECT *
FROM Racun;

/* 3.zadatak: ispisuje nazive svih komitenata  */
SELECT Naziv
FROM Komitent;

/* 4.zadatak: ispisuje naziv i adresu svakog komitenta  */
SELECT Naziv, Adresa
FROM Komitent;

/* 5.zadatak: ispisuje sve podatke iz tabele Komitent sortirane po nazivu u rastućem poretku  */
SELECT *
FROM Komitent
ORDER BY Naziv ASC;

/* 6.zadatak: ispisuje sve podatke iz tabele Komitent sortirano po nazivu u opadajućem poretku  */
SELECT *
FROM Komitent
ORDER BY Naziv DESC;

/* 7.zadatak: ispisuje sve podatke iz tabele Komitent sortirane po nazivu u rastućem poretku, a zatim po adresi isto u rastućem poretku  */
SELECT *
FROM Komitent
ORDER BY Naziv ASC, Adresa ASC;

/* 8.zadatak: ispisuje naziv i adresu svakog komitenta sortirano po nazivu u rastućem poretku, a zatim po adresi u opadajućem poretku  */
SELECT *
FROM Komitent
ORDER BY Naziv ASC, Adresa DESC;

/* 9.zadatak: ispisuje sve podatke iz tabele Racun, za račune koji na stanju imaju tačno -55000 dinara*/
SELECT *
FROM Racun
WHERE Stanje = -55000;

/* 10.zadatak: ispisuje sve podatke iz tabele Racun, za račune kod kojih je stanje pozitivno */
SELECT *
FROM Racun
WHERE Stanje > 0;


/* 11.zadatak: ispisuje sve podatke iz tabele Racun samo za blokirane račune*/
SELECT *
FROM Racun
WHERE Status = 'B';

/* 12.zadatak: ispisuje sve podatke iz tabele Racun, za blokirane račune koji imaju stanje manje od -50000 dinara*/
SELECT *
FROM Racun
WHERE Status = 'B' AND Stanje < -50000;

/* 13.zadatak: ispisuje sve podatke iz tabele Racun, za blokirane račune ili račune koji imaju stanje manje od -50000 dinara */
SELECT *
FROM Racun
WHERE Status = 'B' OR Stanje < -50000;

/* 14.zadatak: ispisuje stanje računa, za blokirane račune koji imaju stanje manje od -50000 dinara */
SELECT Stanje
FROM Racun
WHERE Status = 'B' AND Stanje < -50000;

/* 15.zadatak: ispisuje sve podatke iz tabele Racun, za račune koji imaju stanje izmedju -12000 i 10000 dinara*/

/* 1. nacin */
SELECT *
FROM Racun
WHERE Stanje >= -12000 AND Stanje <= 10000;

/* 2. nacin */
SELECT *
FROM Racun
WHERE Stanje BETWEEN -12000 AND 10000;

/* 16.zadatak: ispisuje stanje računa, kamatnu stopu i vrednost kamate za sve račune koji su u minusu. 
Kamatna stopa ima vrednost od 3%. */
SELECT Stanje, 3, Stanje*0.03
FROM Racun
WHERE Stanje < 0;

/* 17.zadatak: za svaki račun ispisuje sve podatke 
i dodatno informaciju o tome da li će biti izvan dozvoljenog minusa 
kada mu se obračuna kamata za račune koji su trenutno u minusu */
SELECT *, Stanje * 1.03<DozvMinus
FROM Racun
WHERE Stanje<0;

/* 18.zadatak: ispisuje stanje računa, kamatnu stopu i vrednost kamate za sve račune koji su u minusu. 
Kamatna stopa ima vrednost od 3%. 
Potrebno je da kolone imaju sledeće nazive:
Stanje, Kamatna stopa i Kamata */
SELECT Stanje, 3 AS "Kamatna stopa", Stanje * -0.03 AS Kamata
FROM Racun
WHERE Stanje < 0;

/* 19.zadatak: */

/* 20.zadatak: */
