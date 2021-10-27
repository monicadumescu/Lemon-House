drop database if exists products;
create database if not exists products;
use products;

drop table if exists ProductsTable;
create table if not exists ProductsTable(
id int not null AUTO_INCREMENT,
name varchar(100) not null,
price float not null,
si_ze char not null,
in_stock int,
description varchar(500) not null,
files blob,
primary key (`id`)
);