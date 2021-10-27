drop database if exists cupon;
create database if not exists cupon;
use cupon;

drop table if exists CuponTable;
create table if not exists CuponTable(
id int not null AUTO_INCREMENT,
code varchar(10) not null,
val int not null,
primary key (`id`)
);