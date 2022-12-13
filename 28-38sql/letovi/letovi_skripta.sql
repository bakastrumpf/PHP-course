CREATE TABLE Let(
 IdLet INTEGER PRIMARY KEY,
 MestoOd VARCHAR(20) NOT NULL,
 MestoDo VARCHAR(20) NOT NULL,
 Poletanje VARCHAR(8),
 StatusL CHAR(1) NOT NULL CHECK(StatusL IN ('T', 'K', 'Z', 'O')),
 PotrGoriva INTEGER NOT NULL DEFAULT 0 CHECK(PotrGoriva >= 0)
);

CREATE TABLE Let2(
 IdLet INTEGER PRIMARY KEY,
 MestoOd VARCHAR(20) NOT NULL,
 MestoDo VARCHAR(20) NOT NULL,
 Poletanje VARCHAR(8),
 StatusL CHAR(1) NOT NULL CHECK(StatusL IN ('T', 'K', 'Z', 'O')),
 PotrGoriva INTEGER NOT NULL DEFAULT 0,
 CHECK(PotrGoriva > 0)
);

CREATE TABLE Karta(
	IdKar INTEGER PRIMARY KEY AUTO_INCREMENT,
    IdLet INTEGER NOT NULL,
    Cena INTEGER NOT NULL CHECK(Cena > 0),
    StatusK CHAR(1) NOT NULL CHECK(StatusK = 'D' OR StatusK = 'N'),
    FOREIGN KEY (IdLet) REFERENCES Let(IdLet)
);


INSERT INTO Let(IdLet, MestoOd, MestoDo, Poletanje, StatusL)
VALUES
(1, 'Beograd', 'Rim', 20190125, 'T'),
(2, 'Rim', 'Beograd', 20190127, 'K'),
(3, 'Beograd', 'Berlin', 20180305, 'O'),
(4, 'Beograd', 'NYC', NULL, 'K');

INSERT INTO Karta (IdLet, Cena, StatusK)
VALUES 
(1, 200, 'D'),
(1, 300, 'N'),
(1, 100, 'D'),
(2, 400, 'D');

insert into Let values(5, 'Rim', 'Istanbul', 20190128, 'K', 0);
insert into Let values(6, 'Istanbul', 'NYC', 20180201, 'Z', 5000);

insert into Karta(IdLet, Cena, StatusK) values(2, 500, 'D');
insert into Karta(IdLet, Cena, StatusK) values(3, 700, 'D');


/* 2. zadatak */
DELETE FROM Let
WHERE MestoOd = 'Rim';

/*
в) Дефинисана је максимална цена 450 за карту. Написати SQL упит који регулише цену карата
које нису купљњне тако да цене веће од максималне поставља на максималну.
*/

UPDATE Karta
SET Cena = 450
WHERE Cena > 450 AND StatusK = 'N';

/*
г) Одлучено је да се у продају пусте још две карте за лет 3. Прва карта има IdKar 7, а друга 8.
Цена прве је 450, друге 400. Написати један SQL исказ који ће креирати обе карте.
*/

INSERT INTO Karta (IdKar, IdLet, Cena, StatusK)
VALUES 
(7, 3, 400, 'N'),
(8, 3, 450, 'N');

/*
д) Написати SQL упит за приказ летова којима је позната информација о полетању (није NULL
вредност). Приказ резултата треба да буде у формату: IdLet, Mesto poletanja, Mesto sletanja
(називи колона треба да имају више речи).
*/

SELECT IdLet, MestoOd AS "Mesto poletanja", MestoDo AS "Mesto sletanja"
FROM Let 
WHERE Poletanje IS NOT NULL;

/*
ђ) Написати SQL упит за приказ укупне и просечне количине потрошеног горива на завршеним летовима из места Istanbul. 
Приказ треба да буде у формату Ukupno, Prosek и сортиран опадајуће по Ukupno и опадајуће по Prosek.
*/

SELECT SUM(PotrGoriva) AS Ukupno, AVG(PotrGoriva) AS Prosek
FROM Let
WHERE MestoOd = 'Istanbul' AND StatusL = 'Z'
ORDER BY Ukupno DESC, Prosek DESC;

/*
e) Потребно је написати SQL упит који за сваки лет који није отказан исписује суму зарађеног
новца од продаје карата. Приказ резултата треба да буде у формату: IdLet, MestoOd, MestoDo, Zaradjeno.
*/

SELECT l.IdLet, MestoOd, MestoDo, SUM(k.Cena) AS ZARADA
FROM Let l, Karta k
WHERE l.IdLet = k.IdLet AND l.StatusL != 'O' AND k.StatusK = 'D'
GROUP BY l.IdLet, l.MestoOd, l.MestoDo;

/*
ж) Потребно је написати SQL скрипту која прави поглед (VIEW) KupljeneKarteZaJanuar који као
приказ даје оне карте које су купљене за летове чије је полетање у јануару 2019. Искористити
поглед KupljeneKarteZaJanuar за приказ просечне цене скупих карата у јануару 2019. Карта је
скупа ако јој је цена већа од 500. Приказ резултата треба да буде у формату: Prosek.
*/

CREATE VIEW KupljeneKarteJan
AS
SELECT k.*
FROM Karta k, Let l
WHERE k.IdLet = l.IdLet AND k.StatusK = 'D'
AND Poletanje >= 20190101 AND Poletanje < 20190201;

SELECT AVG(Cena) AS PROSEK
FROM KupljeneKarteJan
WHERE Cena > 500;

/*
з) Потребно је написати SQL упит који за сваки град посебно, 
који је од карата на долазним неотказаним летовима у првом кварталу 2018. године 
зарадио више од 50000 од продаје карата
и продао више од 100 карата, 
исписује назив тог града, минималну и максималну цену продате карте 
у формату MestoDo, MinCena, MaxCena.
*/

SELECT l.MestoDo AS Grad, MIN(Cena) AS Min_cena, MAX(k.Cena) AS Max_cena 
FROM Let l, Karta k
WHERE l.IdLet = k.IdLet AND l.StatusL != 'O'
AND Poletanje >= 20180101 AND Poletanje < 20180401
GROUP BY l.MestoDo
HAVING SUM(Cena)>50000 AND COUNT(*)>100;
