#This file creates the Limbo Database
#Authors: Robert Lynch, Riley Stadel, Mark Miller

create database if not exist limbo_db;
use limbo_db ; 

#This creates the users table
create table if not exist users(
  user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(60) NOT NULL,
  pass CHAR(40) NOT NULL,
  reg_date DATETIME NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE (email)
);

# inserts data into the users table 
insert into users (user_id, pass)
values ("admin", "gaze11e");
explain users;

# This creates the stuff table
Create table if not exists stuff(
  id INT AUTO_INCREMENT primary key,
  location id INT NOT NULL,
  description TEXT NOT NULL,
  create_date DATETIME NOT NULL,
  update_date DATETIME NOT NULL,
  room TEXT,
  owner TEXT,
  finder TEXT,
  status SET ("found", "lost", "claimed") NOT NULL
);

create table if not exists locations(
  id INT AUTO_INCREMENT primary key,
  create_date DATETIME NOT NULL,
  update_date DATETIME NOT NULL,
  name TEXT NOT NULL
  );
  
  
;
Explain stuff;
