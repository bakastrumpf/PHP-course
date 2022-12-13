
/* 65. Prikazati sve adrese komitenata i adrese filijala banke. */

insert into Komitent
values (6, 'Milan', 'Trg Kralja Milana 7');

select Adresa
from Komitent
UNION
select Adresa
from Filijala;

/* 66. Prikazati sve adrese komitenata i adrese filijala banke. 
U slučaju da postoji više istih adresa prikazati ih sve (sa ponavljanjem). */

select Adresa
from Komitent
UNION ALL
select Adresa
from Filijala;

select Adresa, 'komitent' AS vlasnik
from Komitent
UNION ALL
select Adresa, 'filijala' AS Vlasnik
from Filijala;

/* 67. Prikazati sve adrese komitenata i adrese filijala banke. U slučaju da postoji više istih adresa prikazati ih jednom. */

select Adresa
from Komitent
UNION
select Adresa
from Filijala;

select distinct(Adresa)
from(
	select Adresa
	from Komitent
	UNION ALL
	select Adresa
	from Filijala
    ) as podupit;

/* 68. Prikazati sve filijale gde je otvoren račun i pritom je bila barem jedna uplata ili isplata. - INTERSECT */

select *
from Filijala
where IdFil in (
	select IdFIl 
    from Racun)
and IdFIl in (
	select IdFil
    from Stavka);

/* 69. Prikazati sve filijale gde su samo otvarani računi i pritom nije bila ni jedna uplata ili isplata. - EXCEPT */

select *
from Filijala
where IdFil in (
	select IdFIl 
    from Racun)
and IdFIl not in (
	select IdFil
    from Stavka);

/*
70. Uz račun je definisan stepen rizika na sledeći način:
- ako je stanje na računu pozitivno, stepen rizika je ‘nizak'
- ako je stanje na računu negativno i ako je (apsolutno) stanje manje od 90% dozvoljenog
minusa, stepen rizika je 'srednji'
- ako je stanje na računu negativno i ako je (apsolutno) stanje veće od 90% dozvoljenog
minusa, stepen rizika je 'visok'
Prikazati sve račune koji nisu ugašeni uz prikaz njegovog stepena rizika.
*/

SELECT *, 'nizak' AS StepenRizika
FROM Racun
WHERE Stanje>=0
UNION
SELECT *, 'srednji' AS StepenRizika
FROM Racun
WHERE Stanje<0 AND DozvMinus*0.9 >= -Stanje
UNION
SELECT *, 'visok' AS StepenRizika
FROM Racun
WHERE Stanje<0 AND DozvMinus*0.9 < -Stanje;

SELECT *, CASE
WHEN Stanje>=0 THEN 'nizak'
WHEN DozvMinus*0.9 >= -Stanje THEN 'srednji'
ELSE 'visok'
END AS StepenRizika
FROM Racun
WHERE Status != 'U';

/*
71. Potrebno je proveriti da li se atribut BrojStavki iz tabele Racun odgovara broju stavki iz tabele Stavka. 
Rezultat upita treba da sadrži za svaki Racun izveštaj računa. 
Izveštaj može da ima tri vrednosti:
‘Greška: višak stavki’: Ako se u tabeli Stavka nalazi više stavki nego što je navedeno u atributu BrojStavki iz tabele Racun
‘Greška: manjak stavki’: Ako se u tabeli Stavka nalazi manje stavki nego što je navedeno u atributu BrojStavki iz tabele Racun
‘OK’ : Ako se u tabeli Stavka nalazi isti broj stavki kao što je navedeno u atributu BrojStavki iz tabele Racun
*/

SELECT Racun.*,Br, CASE
	WHEN Br>Racun.BrojStavki THEN 'Greška: višak stavki'
	WHEN Br<Racun.BrojStavki THEN 'Greška: manjak stavki'
	ELSE 'OK' END AS Izvestaj
FROM (
	SELECT IdRac, COUNT(*) AS Br
 	FROM Stavka
	GROUP BY IdRac) S, Racun
WHERE Racun.IdRac=S.IdRac;
    
/* 72. zadatak: za svaki račun napisati pun naziv statusa računa (‘A’ - aktivan, ‘B’- blokiran, ‘U’ – ugašen). */

SELECT IdRac, CASE Status
		WHEN 'A' THEN 'Aktivan'
		WHEN 'B' THEN 'Blokiran'
		WHEN 'U' THEN 'Ugasen'
		ELSE 'Greska' 
        END AS Status
FROM Racun;

/* 73. Prikazati sve uplate i filijale u kome je obavljena uplata. */

SELECT *
FROM Stavka JOIN Uplata ON (Stavka.IdSta = Uplata.IdSta)
JOIN Filijala ON( Filijala.IdFil=Stavka.IdFil);

SELECT *
FROM Stavka JOIN Uplata USING (IdSta) JOIN Filijala USING (IdFil);

SELECT *
FROM Stavka NATURAL JOIN Uplata NATURAL JOIN Filijala;

/* 74. Prikazati sve stavke računa uz informacije i o trenutnom stanju na tom računu. */

SELECT *
FROM Racun R JOIN Stavka S ON (R.IdRac = S.IdRac);

SELECT *
FROM Racun R JOIN Stavka S USING (IdRac);