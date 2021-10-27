drop database if exists comments;
create database if not exists comments;
use comments;

drop table if exists CommentsTable;
create table if not exists CommentsTable(
id int not null AUTO_INCREMENT,
email varchar(100) not null,
comments varchar(200) not null default "",
primary key (`id`)
);