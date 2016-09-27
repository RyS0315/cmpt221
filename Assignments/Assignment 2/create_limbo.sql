#This file creates the Limbo Database
#Authors: Robert Lynch, Riley Stadel, Mark Miller

drop database if exists limbo_db ;
create database limbo_db ;
use limbo_db ; 

Create table if not exists stuff(
id INT NOT NULL,
description TEXT NOT NULL
);


Alter Table stuff
Add primary key (id),
Add column code int unique NOT NULL
;


Alter Table stuff
Add column email Varchar(60) NOT NULL,
Add column password Char(40) NOT NULL,
Add column date DATETIME NOT NUll
;
Explain stuff;