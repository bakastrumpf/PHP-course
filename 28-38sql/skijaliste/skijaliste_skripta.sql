create schema SKI_ARANZMANI;

create table SKIJALISTE (
	IdSki INTEGER PRIMARY KEY, 
	NazSki VARCHAR(45) NOT NULL,
    BrStaza INTEGER,
    Osnezenje CHAR(5)
    );
    
create table TERMIN (
	IdTer INTEGER PRIMARY KEY, 
	OdDat INTEGER NOT NULL,
    DoDat INTEGER NOT NULL,
    IdSki INTEGER NOT NULL,
    CenaT INTEGER
    );
    
INSERT INTO SKIJALISTE (IdSki, NazSki, BrStaza, Osnezenje)
VALUES 
(1, 'Kopaonik', 25, 'D'),
(2, 'Zlatibor', 4, 'N');

INSERT INTO SKIJALISTE 
VALUES
(3, 'Les 2 Alpes', 96, 'D'),
(4, 'Paradiski', 253, 'D'),
(5, 'Chatel', 49, NULL),
(6, 'Bansko', 18, 'D');

insert into TERMIN values(1, 20181229, 20190105, 1, 350);
insert into TERMIN values(2, 20190105, 20190112, 1, 230);
insert into TERMIN values(3, 20190126, 20190202, 6, 165);
insert into TERMIN values(4, 20190125, 20190203, 3, 396);
insert into TERMIN values(5, 20190201, 20190210, 3, 410);
insert into TERMIN values(6, 20190308, 20190317, 3, 379);

DELETE FROM TERMIN
WHERE CenaT > 400;

UPDATE SKIJALISTE 
SET Osnezenje = 'D'
WHERE IdSki = 2;

/*
г) Одлучено је да се уведе нови термин за Сретење на Копаоник. 
Датум поласка је предвиђен за 13. фебруар 2019., датум повратка за 17. фебруар 2019., 
idTer једнако 7 i Cenom од 170.
Написати SQL упит који додаје наведени термин у одговарајућу табелу. 
*/

INSERT INTO TERMIN (IdTer, OdDat, DoDat, IdSki, CenaT)
VALUES (7, 20190213, 20190217, 1, 170);

/*
д) Написати SQL упит за приказ скијалишта којима није позната информација о освежењу (NULL
вредност). Приказ резултата треба да буде у формату: IdSki, Naziv Skijalista (називи колона треба
да имају више речи).
*/

SELECT IdSki, NazSki AS "NAZIV SKIJALISTA"
FROM SKIJALISTE 
WHERE Osnezenje IS NULL;

/*
ђ) Написати SQL упит за приказ просечног броја стаза на свим скијалиштима која поседују
вештачко освежење и имају више од 10 стаза. Приказ резултата треба да буде у формату: Prosek.
*/

SELECT AVG(BrStaza) AS PROSEK
FROM SKIJALISTE
WHERE Osnezenje = 'D' AND BrStaza > 10;

/*
e) Потребно је написати SQL упит која дохвата све термине који се односе на скијалишта са више
од 15 стаза. Резултат треба сортирати прво растуће по датуму поласка, а после опадајући по
броју стаза. Приказ резултата треба да буде у формату: Naziv, BrStaza, Od, Do, Cena
*/

SELECT s.NazSki, s.BrStaza, t.OdDat, t.DoDat, t.CenaT
FROM SKIJALISTE s, TERMIN t
WHERE s.IdSki = t.IdSki
HAVING BrStaza > 15
ORDER BY OdDat ASC, BrStaza DESC;

/*
ж) Потребно је написати SQL скрипту која прави поглед (VIEW) TerminUMartu који као приказ
даје оне термине који су у потпуности у марту 2019. Искористи поглед TerminUMartu за
приказ свих јефтиних термина у марту. Термин је јефтин ако је његова цена нижа од 200.
Приказ резултата треба да буде у формату: IdTer, Od, Do, Cena
*/

CREATE VIEW TerminiMart AS
SELECT *
FROM TERMIN
WHERE OdDat >= 20190301 AND DoDat < 20190401;

SELECT IdTer, OdDat, DoDat, CenaT
FROM TerminiMart
WHERE CenaT < 200;

/*
з) Потребно је написати SQL упит која дохвата све датуме када је било 2 или више поласка.
Приказ резултата треба да буде у формату: Datum
*/

SELECT OdDat AS DATUM
FROM TERMIN
GROUP BY OdDat
HAVING count(*) >=2;

