drop database if exists LJPS;
create database LJPS;
use LJPS;

create table user(
    user_id integer auto_increment primary key,
    user_name varchar(20) not null,
    control integer not null
);

create table staff(
    staff_id integer auto_increment primary key,
    staff_name varchar(50) not null,
    dept varchar(50) not null,
    email varchar(50) not null,
    user int,
    constraint user_fk foreign key(user) references user(user_id)
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

create table skill(
    skill_id integer auto_increment primary key,
    skill_name varchar(20) not null
);

create table role(
    role_id integer auto_increment primary key,
    role_name varchar(20) not null,
    role_description varchar (255) not null
);

create table role_skill(
    role_id integer,
    skill_id integer,
    constraint role_skill_fk1 foreign key(role_id) references role(role_id),
    constraint role_skill_fk2 foreign key (skill_id) references skill(skill_id)
);

create table course_skill(
    course_id varchar(20),
    skill_id integer,
    constraint course_skill_fk1 foreign key(course_id) references course(course_id),
    constraint course_skill_fk2 foreign key(skill_id) references skill(skill_id)
);


create table learningjourney(
    learningjourney_id integer auto_increment primary key,
    learningjourney_name varchar(20) not null,
    learningjourney_description varchar(255),
    course_id varchar(20), 
    status boolean,
    constraint learningjourney_fk1 foreign key(course_id) references course(course_id)
);

insert into user (user_id, user_name, control) values
    (1, "HR", 3);

insert into staff (staff_id, staff_name, dept, email, user) values 
    (100, "John", "Operation", "abc@hotmail.com", 1);

insert into course (course_id, course_name, course_desc) values
    ("M1000", "Microsoft Expert", "lorem ipsum");

insert into skill (skill_id, skill_name) values
    (900, "Powerpoint pro"),(901, "Excel pro");

insert into role (role_id, role_name, role_description) values  
    (5000, "Operation Manager", "lorem ipsum");

insert into role_skill (role_id, skill_id) values
    (5000, 900), (5000, 901);

insert into course_skill (course_id, skill_id) values
    ("M1000", 900), ("M1000", 901);

insert into learningjourney (learningjourney_id, learningjourney_name, learningjourney_description, course_id, status) values
    (400, "Road to CEO", "lorem ipsum", "M1000", false);