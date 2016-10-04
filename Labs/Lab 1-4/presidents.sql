# Presidents of the United States
# Authors <Riley Stadel, Mark Miller, Robert Lynch>

drop database if exists site_db;
Create database site_db;
use site_db;

drop table if exists presidents;

Create table if not exists presidents
(
	id INT primary key AUTO_INCREMENT,
	fName TEXT NOT NULL,
	lName TEXT NOT NULL,
	num INT NOT NULL,
	dob DATETIME NOT NULL
);
insert into presidents ( fName, lName, num, dob)
values ( "George", "Washington", 1, '1732-02-22 00:00:00'),
	( "Andrew", "Jackson", 7, '1767-03-15 00:00:00'),
	( "William", "Harrison", 9, '1773-02-09 00:00:00'),
	( "John", "Kennedy", 35, '1917-05-29 00:00:00'),
	( "Ronald", "Reagan", 40, '1911-02-06 00:00:00');
select * from presidents;

select * from presidents order by num;

select * from presidents order by lName;

select * from presidents order by dob desc;
#Explain presidents;