# Presidents of the United States
# Authors <Riley Stadel, Mark Miller, Robert Lynch>

drop database if exists site_db;
Create database site_db;
use site_db;

drop table if exists presidents;

Create table if not exists presidents
(
	id INT primary key,
	fName TEXT NOT NULL,
	lName TEXT NOT NULL,
	PresNumber INT NOT NULL,
	dob DATETIME NOT NULL
);
insert into presidents (id, fName, lName, PresNumber, dob)
values (01, "George", "Washington", 1, '1732-02-22 00:00:00'),
	(02, "Andrew", "Jackson", 7, '1767-03-15 00:00:00'),
	(03, "William", "Harrison", 9, '1773-02-09 00:00:00'),
	(04, "John", "Kennedy", 35, '1917-05-29 00:00:00'),
	(05, "Ronald", "Reagan", 40, '1911-02-06 00:00:00');
select * from presidents;

select * from presidents order by PresNumber;

select * from presidents order by lName;

select * from presidents order by dob desc;
#Explain presidents;