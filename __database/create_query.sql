
create database if not exists corso_formarete; 
/* show databases; */
use corso_formarete;  
create table if not exists User (
    userId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(255) NOT NULL,
    lastName varchar(255)  NOT NULL,
    email varchar(255) NOT NULL,
    birthday DATE 
);

show tables;

describe User;

use corso_formarete;    
insert into User (firstName,lastName,email,birthday)
values ('Mario',  'Rossi', 'mrossi@email.it','1980-09-08');

select * from User;

