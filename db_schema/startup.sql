CREATE DATABASE evidence
  WITH OWNER = postgres
       ENCODING = 'UTF8';

\c evidence

CREATE TABLE privileges (
	id serial primary key not null ,
	name varchar(45)
);

CREATE TABLE users (
	id serial primary key not null,
	first_name varchar(45) not null,
	last_name varchar(45) not null,
	username varchar(45) not null,
	password varchar(45) not null,
	privilege_id integer REFERENCES privilege (id)
	
);

insert into privileges (name) values ('Administrator');
insert into users (first_name, last_name, username, password, privilege_id) 
	values  ('FUser1', 'Luser1', 'user1', 'pass1', 1),
		('FUser2', 'Luser2', 'user2', 'pass2', 1),
		('FUser3', 'Luser3', 'user3', 'pass3', 1),
		('FUser4', 'Luser4', 'user4', 'pass4', 1);

