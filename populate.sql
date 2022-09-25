drop database if exists LJPS;
create database LJPS;
use LJPS;

create table role(
    role_id integer auto_increment primary key,
    role_name varchar(20) not null
);

create table staff(
    staff_id integer auto_increment primary key,
    staff_name varchar(50) not null,
    dept varchar(50) not null,
    email varchar(50) not null,
    role int,
    constraint role_fk foreign key(role) references role(role_id)
);

create table course(
    course_id varchar(20) primary key,
    course_name varchar(50) not null,
    course_desc varchar(255)
);

create table registration(
    reg_id integer auto_increment primary key,
    course_id varchar(20),
    staff_id int,
    reg_status varchar(20) not null,
    completion_status varchar(20) not null,
    constraint registration_fk1 foreign key(course_id) references course(course_id),
    constraint registration_fk2 foreign key(staff_id) references staff(staff_id)
);

insert into role (role_id, role_name) values
    (1, "Staff");

insert into staff (staff_id, staff_name, dept, email, role) values 
    (100, "John", "Operation", "abc@hotmail.com", 1);

insert into course (course_id, course_name, course_desc) values
    ("M1000", "Microsoft Expert", "lorem ipsum");