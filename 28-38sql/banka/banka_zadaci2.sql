
/* 18. zadatak: ispisuje stanje računa, kamatnu stopu i vrednost kamate za sve račune koji su u minusu. 
Kamatna stopa ima vrednost od 3%. Potrebno je da kolone imaju sledeće nazive:
Stanje, Kamatna stopa i Kamata */

use Banka;

select *
from Racun
where Stanje < 0
;

select Stanje as Stanje, '3%' as Kamatna_stopa, Stanje * -0.03 as Kamata
from Racun
where Stanje < 0
;

select Stanje as Stanje, '3%' as Kamatna_stopa, Stanje * -3 / 100 as Kamata
from Racun
where Stanje < 0
;

/* 19. zadatak: za račune koji nisu u nedozvoljenom minusu 
ispisuje koliko mogu još maksimalno para da podignu */

select *
from Racun
where Stanje > -DozvMinus;
;

select DozvMinus, Stanje, -DozvMinus as "Min_stanje", Stanje > -DozvMinus
from Racun
-- where Stanje > -DozvMinus;
;

select IdRac, Stanje + DozvMinus as Dostupno
from Racun
where Stanje >= -DozvMinus
;

/* 20. zadatak: ispisuje sve različite nazive komitenata (nazivi bez ponavljanja) */

select distinct Naziv
from Komitent
;

/* 21. zadatak: ispisuje račune koji su ugašeni (ugašeni računi imaju Stanje NULL) */

select *, Stanje IS NOT NULL
from Racun;

select *
from Racun
where Status = 'U';

select *
from Racun
where Stanje is null;

/* 22. zadatak: ispisuje račune koji nisu ugašeni (ugašeni računi imaju Stanje NULL) */

select *
from Racun
where Stanje is not null;

/* 23. zadatak: ispisuje sumu stanja na svim računima */

select sum(Stanje) as SUMA
from Racun;

/* 24. zadatak: ispisuje minimalno stanja na računima koji su u plusu */
select min(Stanje) as MINIMUM
from Racun
where Stanje > 0;

select avg(Stanje) as Prosek
from Racun
where Stanje > 0;

/* 25. zadatak: ispisuje prosečno stanje na računima */

select avg(Stanje), sum(Stanje) / count(Stanje), sum(Stanje) / count(*)
from Racun
;

/* 26. zadatak: za svaki račun ispisuje naziv komitenta čiji je račun i stanje na računu*/

select k.IdKom, k.Naziv, r.Stanje
from Racun r,  Komitent k
where r.IdKom = k.IdKom
;

/* 27. zadatak: za svaku stavku računa ispisuje u kojoj filijali je bila uplata/isplata, njen iznos i id racuna */

select f.Naziv, s.Iznos, s.IdRac, s.IdSta
from Stavka s, Filijala f
where s.IdFil = f.IdFil;

/* dodatni zadatak: izlistati naziv, adresu, pošt broj i mesto u kome se filijala nalazi*/

select f.Naziv, f.Adresa, m.PostBr, m.Naziv
from Filijala f, Mesto m
where f.IdMes = m.IdMes;

/* 28. zadatak:  za svaku stavku računa ispisuje u kojoj Filijali je bila uplata/isplata, 
njen iznos i id racuna, kao i naziv filijale u kojoj je otvoren račun*/

select s.IdSta, s.Iznos, s.IdRac, f.Naziv as Filijala_stavke, fr.Naziv as Filijala_racuna
from Filijala f, Stavka s, Racun r, Filijala fr
where s.IdFil = f.IdFil 
and r.IdRac = s.IdRac
and r.IdFil = fr.IdFil
;

/* 29. zadatak: za svaku platu ispisuje u kojoj Filijali je bila uplata*/

select u.IdSta, iznos, f.Naziv as Filijala
from Uplata u, Stavka s, Filijala f
where u.Osnov = "Plata" 
and u.IdSta = s.IdSta
and s.IdFil = f.IdFil
;

/* 30. zadatak: za svaki id komitenta ispisuje ukupno stanje na njihovim računima*/

select idkom, sum(stanje) as "suma"
from Racun
group by idkom;

/* 31. zadatak: za račun ispisuje koliko je bilo uplata na račun 
i koliko je iznosila njihova suma */

select s.IdRac, count(*) as BROJ_UPLATA, sum(s.Iznos) as SUMA_UPLATA
from Stavka s, Uplata u
where u.IdSta = s.IdSta
group by s.IdRac;

select *
from Stavka s, Uplata u;