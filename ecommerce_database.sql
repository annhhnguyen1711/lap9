create database ecommercedb
use ecommercedb

create table Customer(
cid int primary key,
name varchar(50),
address varchar(100)
);
create table Product(
	pid int primary key,
	name varchar(50),
	price decimal(10,2),
	description text
);
create table Orders(
	oid int primary key, 
	cid int,
	date DATE,
	quantity int,
	foreign KEY(cid) references Customer(cid)
);
create table Order_Detail (
	oid int,
	pid int,
	price decimal (10,2),
	discount decimal(5,2),
	date DATE,
	primary key (oid,pid),
	foreign key (oid) references Orders(oid),
	foreign key (pid) references Product(pid)
);
--Chèn dữ liệu mẫu cho bảng custom