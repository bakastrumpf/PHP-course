create table Termin(
IdTer integer primary key,
DateFrom date not null,
DateTo date not null,
IdSki integer not null,
Cena integer not null,
foreign key(IdSki) references skijaliste(IdSki)
on update cascade
on delete cascade
)