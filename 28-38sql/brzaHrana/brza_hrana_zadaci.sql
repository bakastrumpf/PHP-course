-- svi aktivni cenovnici od 2020. sort: datum ASC, IdPro desc

select DatumOd, IdLok, IdPro, Vrednost
from Cenovnik
where DatumDo is null
and DatumOd div 10000 = 2020
order by DatumOd ASC, IdPro DESC
;

-- svi cenovnici koji su važili za doček 2021. i više ne važe
select *
from Cenovnik 
-- DatumDo is not null 
where DatumOd div 10000 <= 2020
and DatumDo div 10000 >= 2021
order by DatumOd, IdPro DESC
;

-- obrisati svu prodaju iz dec 2020, zatim ispisati svu preostalu prodaju
-- sort IdPro asc
-- IdPro, Kolicina, Datum, IdCen

select * 
from Prodaja
;

start transaction
;

delete from Prodaja
where Kolicina > 1;

rollback;

start transaction
;

delete from Prodaja
where Datum >= 20201201 
and Datum <= 20201231;

rollback;

commit;

-- obrisati svu prodaju nakon 1.1.2021. uključujući i taj datum, a zatim ispisuje svu ostalu prodaju
-- IdPro DESC
-- IdPro, Kolicina, Datum, IdCen

delete
from Prodaja
where Datum >= 20210101;

select *
from Cenovnik;

insert into Cenovnik(IdCen, DatumOd, DatumDo, IdLok, IdPro, Vrednost)
values
(2000, 20210112, NULL, 8, 5, 120)
;


-- sledeći zadatak: 
insert into Cenovnik(IdCen, DatumOd, DatumDo, IdLok, IdPro, Vrednost)
values
(1500, 20210102, NULL, 5, 8, 130)
;

-- ažurirati vrednost svih prodaja tako što količinu uvećavamo za 1 na svakih 10 kupljenih proizvoda
-- zatim ispisati sve prodaje

select IdPro, Kolicina, Kolicina div 10 AS gratis
from Prodaja
; 

update Prodaja
set Kolicina = Kolicina + Kolicina div 10
-- where Kolicina >= 10
;

-- Kolicina >= 10
-- Kolicina div 10 >= 1

-- zadatak: ažurira se prodaja tako što se količina smanjuje za 1 ako je kupljeno više od 10 proizvoda

select IdPro, Kolicina
from Prodaja;

update Prodaja
set Kolicina = Kolicina - 1
where Kolicina > 10;

-- svi lokali koji prodaju proizvod Id=1 i njegovu aktuelnu cenu
-- IdLok ASC
-- IdLok, Ocena, Cena

select *
from Cenovnik c join LokalBH l on l.IdLok = c.IdLok
;

select *
from Cenovnik c, LokalBH l
where l.IdLok = c.IdLok
;

select *
from Cenovnik c join LokalBH l using(IdLok)
;

select IdLok, Ocena, Vrednost as Cena
from Cenovnik c join LokalBH l using(IdLok)
where IdPro = 1
and DatumDo is null
order by IdLok;

-- za lok Id 2 pronalazi sve proizvode koji se trenutno prodaju + njegovu aktuelnu cenu
-- IdPro ASC
-- IdPro, Tip, Naziv, Cena

select IdPro, Tip, Naziv, Vrednost as Cena
from Cenovnik c join Proizvod l using(IdPro)
where IdLok = 2
and DatumDo is null
order by IdPro
;

-- za proizvode koji su trenutno u prodaji nalazi koji je proizvod najjeftiniji i koja mu je cena u tom lokalu
-- IdPro asc
-- IdPro, Naziv, IdLok, Vrednost

select IdPro, Naziv, IdLok, Vrednost AS CENA
from Proizvod join Cenovnik c1 using (IdPro)
where DatumDo is null
and Vrednost = (
	select Min(Vrednost)
	from Cenovnik c2
	where DatumDo is null
	and c1.IdPro = c2.IdPro)
order by IdPro asc;

-- ukupan profit u svim lokalima zajedno

select sum(Vrednost * Kolicina) as IZNOS
from Cenovnik join Prodaja using (IdCen);

-- za svaki cenovnik ispisuje koliko je proizvoda prodato po tom cenovniku
-- IdCen ASC
-- IdCen, Vrednost, BrojProdatihProizvoda

select IdCen, coalesce(sum(Kolicina), 0) as BrojProdatihProizvoda
from Cenovnik left join Prodaja using(IdCen)
group by IdCen
;

-- za svaki proizvod ispisati u koliko se lokala nalazio u prodaji u bar jednom trenutku
-- IdPro asc
-- IdPro, Tip, Naziv, BrojLokala

select IdPro, Tip, Naziv, count(distinct IdLok) as "Broj lokala"
from Proizvod left join Cenovnik using (IdPro)
group by IdPro
;

-- samo lokali koji su prodali dva ili više različitih proizvoda
-- IdLok asc
-- IdLok, X, Y, Ocena

select IdLok, X, Y, Ocena, count(distinct c.IdPro) as BR
from LokalBH join Cenovnik c using(IdLok) join Prodaja using (IdCen)
group by IdLok
having count(distinct c.IdPro) >= 2
;

-- -- samo lokali koji su prodali 30 ili više različitih proizvoda
-- IdLok asc
-- IdLok, X, Y, Ocena

select IdLok, X, Y, Ocena, sum(Kolicina) as "Ukupno prodato"
from LokalBH join Cenovnik c using(IdLok) join Prodaja using (IdCen)
group by IdLok
having sum(Kolicina) >= 30
;