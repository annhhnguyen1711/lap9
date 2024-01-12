create database fptaptechdb
use fptaptechdb

create table students(
id int primary key,
name varchar(200),
address varchar(200)
)
select*from students 

--Tao bang account
create table account(
id int primary key,
username varchar(30),
password varchar(30)
)
insert into account values (1,'admin','admin123')
select*from account where username ='admin' and password ='admin123'


create table subjects (
id int auto_increment primary key,
name varchar(255) not null
)



create table marks(
id int auto_increment primary key,
student_id int,
constraint student_id foreign key (student_id) references students(id) on delete cascade on update cascade,
subject_id int,
constraint subject_id foreign key (subject_id) references subjects(id) on delete cascade on update cascade,
mark float
)

--Du lieu mau
insert into students (id,name,address) values
(1,'John Doe','123 Main Street'),
(2,'Johnny Deep','113 Main Street'),
(3,'Jim','Green Dolphin'),
(4,'Joe da bozo',' Val Street'),
(5,'Liem','13 Hon Street');
 
--Du lieu bang subjects
insert into subjects (name) values
('Mathematics'),
('Physics'),
('Chemistry'),
('Biology'),
('History');
--Du lieu bang mark
insert into marks (student_id,subject_id,mark) values
(1,1,9.5),
(2,2,8.0),
(3,1,7.5),
(4,3,9.0),
(5,2,5.5);