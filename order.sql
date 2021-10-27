drop database if exists orders;
create database if not exists orders;
use orders;

drop table if exists OrdersTable;
create table if not exists OrdersTable(
id int not null AUTO_INCREMENT,
email varchar(100) not null,
products varchar(200) not null,
price float not null,
address varchar(200) not null,
phone_number varchar(11) not null,
city varchar(20) not null,
country varchar(20) not null,
zip varchar(10) not null,
pay_method char not null,
primary key (`id`)
);