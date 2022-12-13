create table Karta(
IdKar integer primary key,
IdLet integer not null,
Cena integer not null,
Status char(1),
foreign key(IdLet) references Let(idLet)
on update cascade
on delete cascade
)