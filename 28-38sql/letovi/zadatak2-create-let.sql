create table Let(
IdLet integer primary key,
MestoOd varchar(45) not null,
MestoDo varchar(45) not null,
Poletanje date,
Status char(1),
PotrGoriva integer default 0)