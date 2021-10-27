drop database if exists basket;
create database if not exists basket;
use basket;

drop table if exists BasketTable;
create table if not exists BasketTable(
id int not null AUTO_INCREMENT,
email varchar(100) not null,
products int not null,
price float not null,
primary key (`id`)
);