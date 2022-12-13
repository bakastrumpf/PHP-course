/* 57. Napisati upit koji ispisuje svako mesto tako što se ispisuje poštanski broj, srednja crta i naziv mesta. */

select concat(PostBr, '-', naziv) as MESTO
from Mesto;

/* 58. Napisati upit koji ispisuje sve stavke, pri čemu redni broj treba da se prikazuje sa tačkom. */
select IdSta, concat(RedBroj, '.') as "Redni broj", Datum, Vreme, Iznos, IdFil, IdRac
from Stavka;

/* 59. Prikazati sve uplate koje su veće od najveće uplate za komitenta čiji identifikator ima vrednost 1. */

select * from Uplata u, Stavka s where u.IdSta = s.IdSta;

select * from Stavka where IdSta in (select IdSta from Uplata) 
and Iznos > (
		select max(Iznos)
		from Stavka
		where IdSta in (select IdSta from Uplata)
		and IdRac in (select IdRac from Racun where IdKom = 1)
);

-- select IdSta from Uplata;

/* 60. Prikazati IdKom i Naziv onih komitenata koji imaju isti broj otvorenih računa kao komitent sa brojem 2. */

select *
from Komitent k
where (
	-- naci broj racuna za trenutnog komitenta
		select count(*)
		from Racun r
        where r.IdKom = k.IdKom
  ) = (
    -- broj racuna komitenta sa ID = 2
			select count(*)
			from Racun
			where IdKom = 2
    )
;

select count(*)
from Racun
where IdKom = 2
;

/* 61. Za svakog komitenta prikazati broj njegovih aktivnih računa, blokiranih računa i ugašenih računa. */

select IdKom, Naziv, (
	select count(*)
    from Racun r
    where k.IdKom = r.IdKom and Status = 'A'
) AS "aktivni računi", 
(
	select count(*)
    from Racun r
    where k.IdKom = r.IdKom and Status = 'B'
) AS "blokirani računi", 
(
	select count(*)
    from Racun r
    where k.IdKom = r.IdKom and Status = 'U'
) AS "ugašeni računi"
from Komitent k
;

/* 62. Prikazati one komitente čije su sve uplate na račune bile iznad 20000. 
Prikazati i komitente koji nisu imali uplate na račune. */

-- iznos svake uplate > 20000
-- ne postoji uplata gde je iznos <= 20000

select *
from Komitent k 
where not exists(
	-- svi iznosi uplata za datog komitenta koji su <= 20000
			select *
			from Uplata u, Stavka s, Racun r
			where u.IdSta = s.IdSta 
			and s.IdRac = r.IdRac
			and s.Iznos <= 20000
			and r.IdKom = k.IdKom
);

-- svi iznosi uplata za komitenta id = 2 koji su <= 20000

select *
from Uplata u, Stavka s, Racun r
where u.IdSta = s.IdSta 
and s.IdRac = r.IdRac
and s.Iznos <= 20000
and r.IdKom = 5
;

/* dodatni zadatak:  */
select *
from Komitent k 
where exists (
select *
from Racun r
where r.IdKom = k.IdKom
and r.Status = 'A'
);

select *
from Komitent k 
where not exists (
select *
from Racun r
where r.IdKom = k.IdKom
and r.Status = 'A'
);

select k.IdKom, k.Naziv, 
	not exists (
		select *
		from Racun r
		where r.IdKom = k.IdKom
		and r.Status = 'A'
    ) as PostojiAktivanRacun
from Komitent k;

-- drugi način da se reši zadatak 62: IS NULL
select *
from Komitent k
where (
	-- minimalna uplata za komitenta
    select min(Iznos)
    from Uplata u, Stavka s, Racun r
    where u.IdSta = s.IdSta
    and s.IdRac = r.IdRac
    and r.IdKom = k.IdKom
) > 20000
or (
	select min(Iznos)
    from Uplata u, Stavka s, Racun r
    where u.IdSta = s.IdSta
    and s.IdRac = r.IdRac
    and r.IdKom = k.IdKom
) IS NULL;

/*
select min(Iznos) < 100
from Stavka
where IdSta > 10;
*/

-- treći način da se reši zadatak 62: ALL / ANY

select *
from Komitent k
where 20000 < all (
	-- selektovati iznose svih uplata za komitenta
    select Iznos
    from Uplata u, Stavka s, Racun r
    where u.IdSta = s.IdSta
    and s.IdRac = r.IdRac
    and r.IdKom = k.IdKom
)
;

select *
from Komitent k
-- where 20000 < all (
where 600 < any (
	-- selektovati iznose svih uplata za komitenta
    select Iznos
    from Uplata u, Stavka s, Racun r
    where u.IdSta = s.IdSta
    and s.IdRac = r.IdRac
    and r.IdKom = k.IdKom
)
;

/* 63. Vratiti sve račune koji su blokirani ili ugašeni. */

select *
from Racun
where Status = 'B' OR Status = 'U'
;

/* 64. Obrisati komitente koji nemaju nijedan račun u banci. */

delete from Komitent
where not exists (
    select *
    from Racun r
    where IdKom = r.IdKom
    );
