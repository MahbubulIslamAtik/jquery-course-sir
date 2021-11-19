create database ajaxcrud;
use ajaxcrud;
drop table if exists ajaxuser;
create table ajaxuser(
  id int(10) not null primary key auto_increment,
  username varchar(50) default null,
  role_id int(10) default null,
  password varchar(50) default null,
  email varchar(50) default null,
  full_name varchar(50) default null,
  created_at timestamp not null default current_timestamp() on update current_timestamp 
);


drop table if exists ajaxrole;
create table ajaxrole(
  id int(10) primary key auto_increment,
  name varchar(50) not null
);
insert into ajaxrole(name)values('Admin');
insert into ajaxrole(name)values('Account');
insert into ajaxrole(name)values('Persece');

drop table if exists divition;
create table divition(
  id int(10) primary key auto_increment,
  name varchar(50) not null
);

insert into divition(name)values('Rajshahi');
insert into divition(name)values('Rangpur');
insert into divition(name)values('Dhaka');

drop table if exists district;
create table district(
  id int(10) primary key auto_increment,
  name varchar(50) not null
);

insert into district(name)values('Nator');
insert into district(name)values('Sirajganj');
insert into district(name)values('Pabna');

drop table if exists thana;
create table thana(
  id int(10) primary key auto_increment,
  name varchar(50) not null
);

insert into thana(name)values('Gurudashpur');
insert into thana(name)values('Shahzadpur');
insert into thana(name)values('Badda');