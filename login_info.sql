drop database if exists login_info;
create database if not exists login_info;
use login_info;

drop table if exists LoginTable;
create table if not exists LoginTable(
email varchar(100) not null,
username varchar(100) not null default "",
password varchar(50) not null default "",
primary key (`email`, `password`)
);