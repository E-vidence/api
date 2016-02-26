CREATE DATABASE evidence
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'C'
       LC_CTYPE = 'C'
       CONNECTION LIMIT = -1;

CREATE TABLE pg_user_privilege (
	id serial primary key not null ,
	privilage_name varchar(45)
);

CREATE TABLE pg_users (
	id serial primary key not null,
	first_name varchar(45) not null,
	last_name varchar(45) not null,
	username varchar(45) not null,
	password varchar(45) not null,
	id_user_privilage integer REFERENCES pg_user_privilege (id)
	
);


CREATE TABLE pg_emails (
	id serial primary key not null,
	email varchar(45) not null,
	id_user integer REFERENCES pg_users (id)
);

insert into pg_user_privilege (privilage_name) values ('Administrator');
insert into pg_users (first_name, last_name, username, password, id_user_privilage) 
	values  ('FUser1', 'Luser1', 'user1', 'pass1', 1),
		('FUser2', 'Luser2', 'user2', 'pass2', 1),
		('FUser3', 'Luser3', 'user3', 'pass3', 1),
		('FUser4', 'Luser4', 'user4', 'pass4', 1);

