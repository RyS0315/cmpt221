#This file creates the Limbo Database
#Authors: Robert Lynch, Riley Stadel, Mark Miller
#Version 3

drop database limbo_db;
create database if not exists limbo_db;
use limbo_db ; 

#This creates the users table
drop table if exists users;
create table if not exists users(
  user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(60) NOT NULL,
  pass CHAR(40) NOT NULL,
  reg_date DATETIME NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE ( email )
);

# inserts data into the users table 
insert into users()
values ("","testfirst","testuser","testemail", "gaze11e",now()),
       ("","Database","Admin-User","admin", "pass",now());
select * from users;



# This creates the stuff table
#drob table stuff;
Create table if not exists stuff(
  id INT AUTO_INCREMENT primary key,
  location_id INT references locations(id),
  description TEXT NOT NULL,
  create_date DATETIME ,
  update_date DATETIME,
  room TEXT,
  owner TEXT,
  finder TEXT,
  status SET ("found", "lost", "claimed") NOT NULL
);

Insert into stuff()
values("","1","TestItem", now(), now(), "TestRoom", "testOwner", "testFinder", "lost");
select * from stuff;

#This creates the locations table
drop table if exists locations;
create table if not exists locations(
  id INT AUTO_INCREMENT primary key,
  create_date DATETIME NOT NULL,
  update_date DATETIME NOT NULL,
  name TEXT NOT NULL
  );

#This inserts buildings into the locations table
insert into locations(create_date, update_date, name)
values ("now()", "now()", "Byrne House"),
("now()", "now()", "Cannavino Library"),
("now()", "now()", "Champagnat Hall"),
("now()", "now()", "Chapel"),
("now()", "now()", "Cornell Boathouse"),
("now()", "now()", "Donnelly Hall"),
("now()", "now()", "Dyson Center"),
("now()", "now()", "Fern Tor"),
("now()", "now()", "Fontaine Hall"),
("now()", "now()", "Foy Townhouses"),
("now()", "now()", "Fulton Street Townhouse"),
("now()", "now()", "Greystone Hall"),
("now()", "now()", "Hancock Center"),
("now()", "now()", "Kieran Gatehouse"),
("now()", "now()", "Kirk House"),
("now()", "now()", "Leo Hall"),
("now()", "now()", "Long View Park"),
("now()", "now()", "Lowell Thomas Comm Center"),
("now()", "now()", "Lower Townhouses"),
("now()", "now()", "Upper Townhouses"),
("now()", "now()", "Marian Hall"),
("now()", "now()", "Marist Boathouse"),
("now()", "now()", "James J. McCann Center"),
("now()", "now()", "Mid-Rise Hall"),
("now()", "now()", "North Campus Housing Complex"),
("now()", "now()", "St. Ann's Hermitage"),
("now()", "now()", "St. Peter's"),
("now()", "now()", "Science and Allied Health Building"),
("now()", "now()", "Sheahan Hall"),
("now()", "now()", "Steel Plant Studios"),
("now()", "now()", "Student Center"),
("now()", "now()", "West Cedar Townhouses");

select * from users;