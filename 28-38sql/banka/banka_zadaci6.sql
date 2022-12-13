/* 73. Prikazati sve uplate i filijale u kome je obavljena uplata. */
select *
from Stavka s, Uplata u
where s.IdSta = u.IdSta
;

select *
from Stavka join Uplata on (Stavka.IdSta = Uplata.IdSta)
join Filijala on (Filijala.IdFil = Stavka.IdFil)
;

select *
from Stavka join Uplata using (IdSta)
join Filijala using (IdFil)
;

select *
from Stavka natural join Uplata
natural join Filijala
;

/* 74. Prikazati sve stavke računa uz informacije i o trenutnom stanju na tom računu. */

select *
from Stavka s, Racun r
where s.IdRac = r.IdRac
;

select *
from Stavka join Racun on (Stavka.IdRac = Racun.IdRac)
;

select *
from Stavka join Racun using (IdRac)
;

/* 75. Prikazati svaku stavku, a ako je stavka uplata prikazati i osnov. */

select *
from Stavka left outer join Uplata on (Stavka.IdSta = Uplata.IdSta)
;

select *
from Stavka left outer join Uplata using (IdSta)
;

select *
from Stavka natural left outer join Uplata
;


/*
select *
from tabela1 natural left outer join tabela2
union
select *
from tabela1 natural right outer join tabela2
*/

/* 76. Prikazati za svaku filijalu koliko je računa otvoreno u njoj. */

select Filijala.IdFil, count(IdRac) as BrojRacuna
from Filijala left outer join Racun using(IdFil)
group by Filijala.IdFil 
;

select Filijala.IdFil, count(IdRac) as BrojRacuna
from Filijala, Racun
where Filijala.IdRac = Racun.IdRac
group by Filijala.IdFil 
union
select IdFil, '0'
from Filijala
where IdFil not in (select IdFIl from Racun)
;

/* 77. Za svaku filijalu prikazati koliko trenutno aktivnih računa je otvoreno u njoj. */

select Filijala.IdFil, count(IdRac) as BrojAktivnihRacuna
from Filijala left join (select * from Racun where Racun.Status = 'A') as Tabela using (IdFil)
group by Filijala.IdFil
;

/* neispravno:
select Filijala.IdFil, count(IdRac) as BrojAktivnihRacuna
from Filijala left join Racun using (IdFil)
where Racun.Status = 'A'
group by Filijala.IdFil
;
*/

/* 78. Prikazati za svaku filijalu kolika je suma na računima otvorenim u njoj. */

;

/*
79. Napisati SQL skriptu za kreiranje tabele Stavka.
IdSta je celobrojna veličina koja identifikuje stavku i dodeljuje se automatski. 
RedniBroj i Iznos su celobrojne veličine i obavezni su. 
Datum je tipa Date. 
Vreme je tipa Time. 
IdFil i IdRac su strani ključevi i obavezni su. 
Prilikom izmene ili brisanja računa, potrebno je izmeniti ili obrisati i sve njegove stavke, 
dok izmena ili brisanje filijale u kojima postoje transakcije nije dozvoljena.
*/

CREATE TABLE Stavka2 (
IdSta INTEGER PRIMARY KEY AUTO_INCREMENT,
RedBroj INTEGER NOT NULL,
Datum Date,
Vreme Time,
Iznos INTEGER NOT NULL,
IdFil INTEGER NOT NULL,
IdRac INTEGER NOT NULL,
FOREIGN KEY (IdFil) REFERENCES Filijala (IdFil) ON UPDATE RESTRICT ON DELETE RESTRICT,
FOREIGN KEY (IdRac) REFERENCES Racun (IdRac) ON UPDATE CASCADE ON DELETE CASCADE
);

/*
80. Napisati SQL skriptu za kreiranje tabele Racun. 
IdRac je celobrojna veličina koja identifikuje stavku i dodeljuje se automatski. 
Stanje i DozvMinus i BrojStavki su celobrojne veličine i obavezni su i podrazumevano dobijaju vrednost 0. 
BrojStavki je nenegativna celobrojna veličina i obavezna je. 
Status je karakter koji može imati samo vrednosti 'A', 'B' i 'U' i prilikom kreiranja Racuna podrazumevano dobija vrednost 'A'. 
IdFil i IdKom su strani ključevi i obavezni su.
*/
CREATE TABLE IF NOT EXISTS Racun2 (
	IdRac INTEGER PRIMARY KEY AUTO_INCREMENT,
    Stanje INTEGER NOT NULL DEFAULT 0,
    DozvMinus INTEGER NOT NULL DEFAULT 0,
    BrojStavki INTEGER NOT NULL DEFAULT 0,
	Status CHAR DEFAULT 'A',
	IdFil INTEGER NOT NULL,
	IdKom INTEGER NOT NULL,
	FOREIGN KEY (IdFil) REFERENCES Filijala (IdFil),
	FOREIGN KEY (IdKom) REFERENCES Komitent (IdKom),
	CHECK(Status IN('A', 'B', 'U')),
	CHECK(BrojStavki >= 0)
);

-- drop table Racun2;

insert into Racun2
values (1, 0, 0, 0, 'A', 1, 1);

/*
81. Napisati SQL skriptu za kreiranje tabele Ima_sediste ukoliko tabela već ne postoji.
IdFil i IdKom su strani ključevi, obavezni su i zajedno čine primarni ključ.
*/

create table if not exists IMA_SEDISTE2(
	IdFil INTEGER NOT NULL,
	IdKom INTEGER NOT NULL,
    PRIMARY KEY (IdFil, IdKom),
    FOREIGN KEY (IdFil) REFERENCES Filijala (IdFil),
	FOREIGN KEY (IdKom) REFERENCES Komitent (IdKom)
)
;

/* 82. Napisati SQL skriptu za uklanjanje tabele Racun. */

drop table if exists Racun2
;

/* 83. Napisati SQL skriptu za uklanjanje pogleda PozitivniRacuni. */

DROP VIEW IF EXISTS PozitivniRacuni;

/* 84. Prebrojati sve neaktivne račune. */

select count(*)
from Racun
where Status != 'A'
;

select count(*)
from Racun
where Status <> 'A'
;

SELECT COUNT(NULLIF(Status, 'A'))
FROM Racun
;


/*
select abs(Stanje), Stanje
from Racun
;
*/

/* 
85. Napisati SQL upit koji vraća u dva reda minimalno i maksimalno stanje onih računa koji su otvoreni u Beogradu. 
Prvi red treba da sadrži minimalno, a drugi red maksimalno stanje. 
U slučaju da nije otvoren ni jedan račun u Beogradu, vratiti 0 u oba reda.
*/

WITH BgStanjeRacuna(Stanje) AS 
(
		select Racun.Stanje 
        from Racun natural join Filijala join Mesto using (IdMes)
        where Mesto.Naziv = 'Beograd'
)
select coalesce(max(Stanje), 0) as Stanje
from BgStanjeRacuna
union all
select coalesce(min(Stanje), 0) as Stanje
from BgStanjeRacuna
;

/* 
86. Za svaku uplatu prikazati njen doprinos. 
Doprinos se računa kao količnik iznosa te uplate i sume svih uplata na taj račun.
*/

with SumaUplata(IdRac, UkupanIznos) as
(
	select IdRac, sum(Iznos)
    from Stavka join Uplata using (IdSta)
    group by IdRac
)
select IdSta, IdRac, Iznos, UkupanIznos, Iznos /UkupanIznos AS Doprinos
from Uplata natural join Stavka join SumaUplata using (IdRac)
;