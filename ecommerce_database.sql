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
--Chèn dữ liệu mẫu cho bảng Customer
insert into Customer (cid,name,address) values
(1, 'Customer1', 'Address 1'),
(2, 'Customer2', 'Address 2'),
(3, 'Customer3', 'Address 3');

--Chèn dữ liệu cho bảng Product
insert into Product (pid,name,price,description)values
(1, 'Product A', 50.00, 'Description A'),
(2, 'Product B', 30.00, 'Description B'),
(3, 'Product C', 20.00, 'Description C');
--Chèn dữ liệu cho Orders
insert into Orders (oid,cid,date,quantity)values
(101, 1,'2024-01-09', 2),
(102, 2,'2024-01-09', 1),
(103, 3,'2024-01-09', 3);
--Chèn dữ liệu cho Order_Detail
insert into Order_Detail(oid,pid,price,discount,date)values
(101, 1, 50.00, 5.00, '2024-01-09' ),
(101, 2, 30.00, 0.00, '2024-01-09' ),
(102, 3, 20.00, 2.00, '2024-01-10' ),
(103, 1, 50.00, 7.00, '2024-01-11' ),
(103, 2, 30.00, 0.50, '2024-01-11' ),
(103, 3, 20.00, 0.00, '2024-01-11' );