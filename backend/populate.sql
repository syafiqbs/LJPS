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
    role int,    constraint staff_fk foreign key(role) references role(role_id)
);

create table course(
    course_id varchar(20) primary key,
    course_name varchar(50) not null,
    course_desc varchar(255),
    course_status varchar(15),
    course_type varchar(10),
    course_category varchar(50)
);

create table registration(
    reg_id integer auto_increment primary key,
    course_id varchar(20),
    staff_id int,
    reg_status varchar(20) not null,
    completion_status varchar(20),
    constraint registration_fk1 foreign key(course_id) references course(course_id),
    constraint registration_fk2 foreign key(staff_id) references staff(staff_id)
);

create table skill(
    skill_id integer auto_increment primary key,
    skill_name varchar(20) not null
);

create table job(
    job_id integer primary key,
    job_name varchar(20) not null,
    job_description varchar(255)
);

create table job_skill(
    job_id integer,
    job_name varchar(20) not null,
    skill_id integer,
    primary key (job_id, skill_id),
    constraint job_skill_fk1 foreign key(skill_id) references skill(skill_id),
    constraint job_skill_fk2 foreign key(job_id) references job(job_id)
);

create table course_skill(
    course_id varchar(20),
    skill_id integer,
    primary key (course_id, skill_id),
    constraint course_skill_fk1 foreign key(course_id) references course(course_id),
    constraint course_skill_fk2 foreign key(skill_id) references skill(skill_id)
);


create table learningjourney(
    learningjourney_id integer auto_increment primary key,
    learningjourney_name varchar(20) not null,
    learningjourney_description varchar(255),
    staff_id integer,
    course_id varchar(20),
    constraint learningjourney_fk1 foreign key(staff_id) references staff(staff_id),
    constraint learningjourney_fk2 foreign key(course_id) references course(course_id)
);

INSERT INTO `course` VALUES ('COR001','Systems Thinking and Design','This foundation module aims to introduce students to the fundamental concepts and underlying principles of systems thinking,','Active','Internal','Core'),('COR002','Lean Six Sigma Green Belt Certification','Apply Lean Six Sigma methodology and statistical tools such as Minitab to be used in process analytics','Active','Internal','Core'),('COR004','Service Excellence','The programme provides the learner with the key foundations of what builds customer confidence in the service industr','Pending','Internal','Core'),('COR006','Manage Change','Identify risks associated with change and develop risk mitigation plans.','Retired','External','Core'),('FIN001','Data Collection and Analysis','Data is meaningless unless insights and analysis can be drawn to provide useful information for business decision-making. It is imperative that data quality, integrity and security ','Active','External','Finance'),('FIN002','Risk and Compliance Reporting','Regulatory reporting is a requirement for businesses from highly regulated sectors to demonstrate compliance with the necessary regulatory provisions.','Active','External','Finance'),('FIN003','Business Continuity Planning','Business continuity planning is essential in any business to minimise loss when faced with potential threats and disruptions.','Retired','External','Finance'),('HRD001','Leading and Shaping a Culture in Learning','This training programme, delivered by the National Centre of Excellence (Workplace Learning), aims to equip participants with the skills and knowledge of the National workplace learning certification framework,','Active','External','HR'),('MGT001','People Management','enable learners to manage team performance and development through effective communication, conflict resolution and negotiation skills.','Active','Internal','Management'),('MGT002','Workplace Conflict Management for Professionals','This course will address the gaps to build consensus and utilise knowledge of conflict management techniques to diffuse tensions and achieve resolutions effectively in the best interests of the organisation.','Active','External','Management'),('MGT003','Enhance Team Performance Through Coaching','The course aims to upskill real estate team leaders in the area of service coaching for performance.','Pending','Internal','Management');

insert into role values 
    (1, "Admin"),
    (2, "User"),
    (3, "Manager"),
    (4,"Trainer");

INSERT INTO `staff` VALUES (130001,'John','Chariman','jack.sim@allinone.com.sg',1),(130002,'Jack','CEO','jack.sim@allinone.com.sg',1),(140001,'Derek','Sales','Derek.Tan@allinone.com.sg',3),(140002,'Susan','Sales','Susan.Goh@allinone.com.sg',2),(140003,'Janice','Sales','Janice.Chan@allinone.com.sg',2),(140004,'Mary','Sales','Mary.Teo@allinone.com.sg',2),(140008,'Jaclyn','Sales','Jaclyn.Lee@allinone.com.sg',2),(140015,'Oliva','Sales','Oliva.Lim@allinone.com.sg',2),(140025,'Emma','Sales','Emma.Heng@allinone.com.sg',2),(140036,'Charlotte','Sales','Charlotte.Wong@allinone.com.sg',2),(140078,'Amelia','Sales','Amelia.Ong@allinone.com.sg',2),(140102,'Eva','Sales','Eva.Yong@allinone.com.sg',2),(140103,'Sophia','Sales','Sophia.Toh@allinone.com.sg',2),(140108,'Liam','Sales','Liam.The@allinone.com.sg',2),(140115,'Noah','Sales','Noah.Ng@allinone.com.sg',2),(140525,'Oliver','Sales','Oliver.Tan@allinone.com.sg',2),(140736,'William','Sales','William.Fu@allinone.com.sg',2),(140878,'James','Sales','James.Tong@allinone.com.sg',2),(150008,'Eric','Ops','Eric.Loh@allinone.com.sg',3),(150065,'Noah','Ops','Noah.Goh@allinone.com.sg',4),(150075,'Liam','Ops','Liam.Tan@allinone.com.sg',4),(150076,'Oliver','Ops','Oliver.Chan@allinone.com.sg',4),(150085,'Michael','Ops','Michael.Ng@allinone.com.sg',4),(150095,'Alexander','Ops','Alexander.The@allinone.com.sg',4),(150096,'Ethan','Ops','Ethan.Tan@allinone.com.sg',4),(150115,'Jaclyn','Ops','Jaclyn.Lee@allinone.com.sg',4),(150118,'William','Ops','William.Teo@allinone.com.sg',4),(150125,'Mary','Ops','Mary.Teo@allinone.com.sg',4),(150126,'Oliva','Ops','Oliva.Lim@allinone.com.sg',2),(150138,'Daniel','Ops','Daniel.Fu@allinone.com.sg',4),(150142,'James','Ops','James.Lee@allinone.com.sg',4),(150143,'John','Ops','John.Lim@allinone.com.sg',4),(150148,'Jack','Ops','Jack.Heng@allinone.com.sg',4),(150155,'Derek','Ops','Derek.Wong@allinone.com.sg',4),(150162,'Jacob','Ops','Jacob.Tong@allinone.com.sg',4),(150163,'Logan','Ops','Logan.Loh@allinone.com.sg',4),(150165,'Oliver','Ops','Oliver.Tan@allinone.com.sg',2),(150166,'William','Ops','William.Fu@allinone.com.sg',2),(150168,'Jackson','Ops','Jackson.Tan@allinone.com.sg',4),(150175,'Aiden','Ops','Aiden.Tan@allinone.com.sg',4),(150192,'Emma','Ops','Emma.Heng@allinone.com.sg',2),(150193,'Charlotte','Ops','Charlotte.Wong@allinone.com.sg',2),(150198,'Amelia','Ops','Amelia.Ong@allinone.com.sg',2),(150205,'Eva','Ops','Eva.Yong@allinone.com.sg',2),(150208,'James','Ops','James.Tong@allinone.com.sg',2),(150215,'Michael','Ops','Michael.Lee@allinone.com.sg',2),(150216,'Ethan','Ops','Ethan.Lim@allinone.com.sg',2),(150232,'John','Ops','John.Loh@allinone.com.sg',2),(150233,'Jack','Ops','Jack.Tan@allinone.com.sg',2),(150238,'Derek','Ops','Derek.Tan@allinone.com.sg',2),(150245,'Benjamin','Ops','Benjamin.Tan@allinone.com.sg',2),(150258,'Daniel','Ops','Daniel.Heng@allinone.com.sg',2),(150265,'Jaclyn','Ops','Jaclyn.Tong@allinone.com.sg',2),(150275,'Mary','Ops','Mary.Fu@allinone.com.sg',2),(150276,'Oliva','Ops','Oliva.Loh@allinone.com.sg',2),(150282,'Jacob','Ops','Jacob.Wong@allinone.com.sg',2),(150283,'Logan','Ops','Logan.Ong@allinone.com.sg',2),(150288,'Jackson','Ops','Jackson.Yong@allinone.com.sg',2),(150295,'Aiden','Ops','Aiden.Toh@allinone.com.sg',2),(150318,'Emma','Ops','Emma.Tan@allinone.com.sg',2),(150342,'Charlotte','Ops','Charlotte.Tan@allinone.com.sg',2),(150343,'Amelia','Ops','Amelia.Tan@allinone.com.sg',2),(150345,'William','Ops','William.Heng@allinone.com.sg',2),(150348,'Eva','Ops','Eva.Goh@allinone.com.sg',2),(150355,'Sophia','Ops','Sophia.Chan@allinone.com.sg',2),(150356,'James','Ops','James.Wong@allinone.com.sg',2),(150398,'John','Ops','John.Ong@allinone.com.sg',2),(150422,'Jack','Ops','Jack.Yong@allinone.com.sg',2),(150423,'Derek','Ops','Derek.Toh@allinone.com.sg',2),(150428,'Benjamin','Ops','Benjamin.The@allinone.com.sg',2),(150435,'Lucas','Ops','Lucas.Ng@allinone.com.sg',2),(150445,'Ethan','Ops','Ethan.Loh@allinone.com.sg',2),(150446,'Daniel','Ops','Daniel.Tan@allinone.com.sg',2),(150488,'Jacob','Ops','Jacob.Tan@allinone.com.sg',2),(150512,'Logan','Ops','Logan.Tan@allinone.com.sg',2),(150513,'Jackson','Ops','Jackson.Goh@allinone.com.sg',2),(150518,'Aiden','Ops','Aiden.Chan@allinone.com.sg',2),(150525,'Samuel','Ops','Samuel.Teo@allinone.com.sg',2),(150555,'Jaclyn','Ops','Jaclyn.Wong@allinone.com.sg',2),(150565,'Benjamin','Ops','Benjamin.Ong@allinone.com.sg',4),(150566,'Oliva','Ops','Oliva.Ong@allinone.com.sg',2),(150585,'Samuel','Ops','Samuel.Tan@allinone.com.sg',4),(150608,'Emma','Ops','Emma.Yong@allinone.com.sg',2),(150615,'Sophia','Ops','Sophia.Toh@allinone.com.sg',2),(150632,'Charlotte','Ops','Charlotte.Toh@allinone.com.sg',2),(150633,'Amelia','Ops','Amelia.The@allinone.com.sg',2),(150638,'Eva','Ops','Eva.Ng@allinone.com.sg',2),(150645,'Sophia','Ops','Sophia.Tan@allinone.com.sg',2),(150655,'Lucas','Ops','Lucas.Goh@allinone.com.sg',2),(150695,'William','Ops','William.Tan@allinone.com.sg',2),(150705,'Samuel','Ops','Samuel.The@allinone.com.sg',2),(150765,'Liam','Ops','Liam.Teo@allinone.com.sg',2),(150776,'Lucas','Ops','Lucas.Yong@allinone.com.sg',4),(150796,'Susan','Ops','Susan.Goh@allinone.com.sg',4),(150826,'Liam','Ops','Liam.The@allinone.com.sg',2),(150845,'Henry','Ops','Henry.Tan@allinone.com.sg',2),(150866,'Henry','Ops','Henry.Chan@allinone.com.sg',2),(150916,'Susan','Ops','Susan.Ng@allinone.com.sg',2),(150918,'Henry','Ops','Henry.Toh@allinone.com.sg',4),(150935,'Susan','Ops','Susan.Lee@allinone.com.sg',2),(150938,'Janice','Ops','Janice.Chan@allinone.com.sg',4),(150968,'Noah','Ops','Noah.Ng@allinone.com.sg',2),(150976,'Noah','Ops','Noah.Lee@allinone.com.sg',2),(151008,'Alexander','Ops','Alexander.Teo@allinone.com.sg',2),(151055,'Liam','Ops','Liam.Fu@allinone.com.sg',2),(151056,'Alexander','Ops','Alexander.Fu@allinone.com.sg',2),(151058,'Janice','Ops','Janice.Tan@allinone.com.sg',2),(151118,'Oliver','Ops','Oliver.Lim@allinone.com.sg',2),(151146,'Janice','Ops','Janice.Lim@allinone.com.sg',2),(151198,'Michael','Ops','Michael.Tong@allinone.com.sg',2),(151266,'Noah','Ops','Noah.Tong@allinone.com.sg',2),(151288,'Mary','Ops','Mary.Heng@allinone.com.sg',2),(151408,'Oliver','Ops','Oliver.Loh@allinone.com.sg',2),(160008,'Sally','HR','Sally.Loh@allinone.com.sg',1),(160065,'John','HR','John.Tan@allinone.com.sg',1),(160075,'James','HR','James.Tan@allinone.com.sg',1),(160076,'Jack','HR','Jack.Goh@allinone.com.sg',1),(160118,'Derek','HR','Derek.Chan@allinone.com.sg',1),(160135,'Jaclyn','HR','Jaclyn.Ong@allinone.com.sg',2),(160142,'Benjamin','HR','Benjamin.Teo@allinone.com.sg',1),(160143,'Lucas','HR','Lucas.Lee@allinone.com.sg',1),(160145,'Mary','HR','Mary.Wong@allinone.com.sg',2),(160146,'Oliva','HR','Oliva.Yong@allinone.com.sg',2),(160148,'Henry','HR','Henry.Lim@allinone.com.sg',1),(160155,'Alexander','HR','Alexander.Heng@allinone.com.sg',1),(160188,'Emma','HR','Emma.Toh@allinone.com.sg',2),(160212,'Charlotte','HR','Charlotte.The@allinone.com.sg',2),(160213,'Amelia','HR','Amelia.Ng@allinone.com.sg',2),(160218,'Eva','HR','Eva.Tan@allinone.com.sg',2),(160225,'Sophia','HR','Sophia.Fu@allinone.com.sg',2),(160258,'Michael','HR','Michael.Tong@allinone.com.sg',2),(160282,'Ethan','HR','Ethan.Loh@allinone.com.sg',2),(170166,'David','Finance','David.Yap@allinone.com.sg',3),(170208,'Daniel','Finance','Daniel.Tan@allinone.com.sg',2),(170215,'Mary','Finance','Mary.Wong@allinone.com.sg',2),(170216,'Jaclyn','Finance','Jaclyn.Ong@allinone.com.sg',2),(170232,'Jacob','Finance','Jacob.Tan@allinone.com.sg',2),(170233,'Logan','Finance','Logan.Goh@allinone.com.sg',2),(170238,'Jackson','Finance','Jackson.Chan@allinone.com.sg',2),(170245,'Aiden','Finance','Aiden.Teo@allinone.com.sg',2),(170655,'Samuel','Finance','Samuel.Lee@allinone.com.sg',2),(170866,'Susan','Finance','Susan.Lim@allinone.com.sg',2),(171008,'Janice','Finance','Janice.Heng@allinone.com.sg',2);

INSERT INTO `registration` VALUES (1,'COR002',130001,'Registered','Completed'),(2,'COR002',130002,'Registered','Completed'),(3,'COR002',140001,'Registered','Completed'),(4,'COR002',140002,'Registered','Completed'),(5,'COR002',140003,'Rejected',''),(6,'COR002',140008,'Registered','OnGoing'),(7,'COR002',140025,'Registered','OnGoing'),(8,'COR002',140036,'Waitlist',''),(9,'COR002',140078,'Waitlist',''),(10,'COR002',140102,'Registered',''),(11,'COR002',140103,'Registered',''),(12,'COR002',140108,'Registered',''),(13,'COR002',140115,'Registered','Completed'),(14,'COR002',140525,'Rejected',''),(15,'COR002',140878,'Registered','Completed'),(16,'COR002',150075,'Registered','Completed'),(17,'COR002',150065,'Waitlist',''),(18,'COR002',150076,'Waitlist',''),(19,'COR002',150118,'Registered','Completed'),(20,'COR002',150142,'Registered','OnGoing'),(21,'COR002',150143,'Registered','OnGoing'),(22,'COR002',150148,'Registered',''),(23,'COR002',150155,'Rejected',''),(24,'COR002',150776,'Registered',''),(25,'COR002',150095,'Registered',''),(26,'COR002',150085,'Waitlist',''),(27,'COR002',150096,'Waitlist',''),(28,'COR002',150138,'Registered','Completed'),(29,'COR002',150162,'Registered','Completed'),(30,'COR002',150163,'Registered','Completed'),(31,'COR002',150168,'Registered','Completed'),(32,'COR002',150175,'Rejected',''),(33,'COR002',150796,'Registered','OnGoing'),(34,'COR002',150125,'Registered','OnGoing'),(35,'COR002',150115,'Waitlist',''),(36,'COR002',150126,'Waitlist',''),(37,'COR002',150192,'Registered',''),(38,'COR002',150193,'Registered',''),(39,'COR002',150198,'Registered',''),(40,'COR002',150205,'Registered','Completed'),(41,'COR002',150615,'Rejected',''),(42,'COR002',150968,'Registered','Completed'),(43,'COR002',150166,'Registered','Completed'),(44,'COR002',150208,'Waitlist',''),(45,'COR002',150232,'Waitlist',''),(46,'COR002',150233,'Registered','Completed'),(47,'COR002',150238,'Registered','OnGoing'),(48,'COR002',150245,'Registered','OnGoing'),(49,'COR002',150655,'Registered',''),(50,'COR002',150866,'Rejected',''),(51,'COR002',150215,'Registered',''),(52,'COR002',150258,'Registered',''),(53,'COR002',150282,'Waitlist',''),(54,'COR002',150283,'Waitlist',''),(55,'COR002',150288,'Registered','Completed'),(56,'COR002',150295,'Registered','Completed'),(57,'COR002',150705,'Registered','Completed'),(58,'COR002',150916,'Registered','Completed'),(59,'COR002',151058,'Rejected',''),(60,'COR002',150265,'Registered','OnGoing'),(61,'COR002',150318,'Registered','OnGoing'),(62,'COR002',150342,'Waitlist',''),(63,'COR002',150343,'Waitlist',''),(64,'COR002',150348,'Registered',''),(65,'COR002',150355,'Registered',''),(66,'COR002',150765,'Registered',''),(67,'COR002',150976,'Registered','Completed'),(68,'COR002',151118,'Rejected',''),(69,'COR002',150356,'Registered','Completed'),(70,'COR002',150422,'Registered','Completed'),(71,'COR002',150423,'Waitlist',''),(72,'COR002',150428,'Waitlist',''),(73,'COR002',150435,'Registered','Completed'),(74,'COR002',150845,'Registered','OnGoing'),(75,'COR002',151056,'Registered','OnGoing'),(76,'COR002',151198,'Registered',''),(77,'COR002',150445,'Rejected',''),(78,'COR002',150488,'Registered',''),(79,'COR002',150513,'Registered','Completed'),(80,'COR002',150518,'Waitlist',''),(81,'COR002',150525,'Waitlist',''),(82,'COR002',150935,'Registered','Completed'),(83,'COR002',151146,'Registered','Completed'),(84,'COR002',151288,'Registered','Completed'),(85,'COR002',150555,'Registered','OnGoing'),(86,'COR002',150566,'Rejected',''),(87,'COR002',150632,'Registered','OnGoing'),(88,'COR002',150638,'Registered',''),(89,'COR002',150645,'Waitlist',''),(90,'COR002',151055,'Waitlist',''),(91,'COR002',151266,'Registered',''),(92,'COR002',151408,'Registered',''),(93,'COR002',150695,'Registered','Completed'),(94,'COR002',160008,'Registered','Completed'),(95,'COR002',160075,'Rejected',''),(96,'COR002',160076,'Registered','Completed'),(97,'COR002',160142,'Registered','Completed'),(98,'COR002',160143,'Waitlist',''),(99,'COR002',160148,'Waitlist',''),(100,'COR002',160155,'Registered','OnGoing'),(101,'COR002',160145,'Registered','OnGoing'),(102,'COR002',160135,'Registered',''),(103,'COR002',160146,'Registered',''),(104,'COR002',160188,'Rejected',''),(105,'COR002',160213,'Registered',''),(106,'COR002',160225,'Registered','Completed'),(107,'COR002',160258,'Waitlist',''),(108,'COR002',160282,'Waitlist',''),(109,'COR002',151008,'Registered',''),(110,'COR002',150216,'Waitlist',''),(176,'HRD001',160008,'Registered','Completed'),(177,'MGT001',160075,'Registered','Completed'),(178,'MGT002',160065,'Registered','Completed'),(180,'MGT001',160148,'Registered',''),(181,'MGT002',160155,'Waitlist',''),(184,'HRD001',160188,'Registered','Completed'),(185,'MGT001',160212,'Registered','OnGoing'),(186,'MGT002',160213,'Rejected',''),(188,'MGT001',160282,'Waitlist',''),(189,'FIN001',150166,'Waitlist',''),(190,'FIN002',150208,'Registered','Completed'),(191,'FIN001',150232,'Registered','Completed'),(192,'FIN002',150233,'Registered','Completed'),(193,'FIN001',150238,'Registered','OnGoing'),(194,'FIN002',150245,'Rejected',''),(195,'FIN001',150655,'Waitlist',''),(196,'FIN002',150866,'Registered','Completed'),(197,'FIN001',151008,'Registered','Completed'),(198,'FIN002',150215,'Registered','Completed'),(199,'FIN001',150216,'Registered','OnGoing'),(200,'MGT001',140001,'Registered','Completed'),(201,'MGT001',150008,'Registered','Completed'),(202,'MGT001',150166,'Registered','Completed'),(203,'COR002',140004,'Registered','Completed'),(204,'COR002',140015,'Waitlist',''),(205,'COR002',140736,'Waitlist',''),(206,'COR002',150008,'Registered','Completed'),(207,'COR002',150565,'Registered',''),(208,'COR002',150918,'Registered',''),(209,'COR002',150585,'Registered','OnGoing'),(210,'COR002',150938,'Rejected',''),(211,'COR002',150826,'Rejected',''),(212,'COR002',150165,'Registered','OnGoing'),(213,'COR002',150275,'Waitlist',''),(214,'COR002',150276,'Registered','Completed'),(215,'COR002',150345,'Registered',''),(216,'COR002',150398,'Registered','Completed'),(217,'COR002',150446,'Registered',''),(218,'COR002',150512,'Registered',''),(219,'COR002',150608,'Registered','OnGoing'),(220,'COR002',150633,'Waitlist',''),(221,'COR002',160065,'Waitlist',''),(245,'COR001',130001,'Registered','Completed'),(246,'COR006',140001,'Waitlist',''),(247,'FIN001',140002,'Waitlist',''),(248,'FIN002',140003,'Registered','Completed'),(249,'FIN003',140004,'Registered','OnGoing'),(250,'HRD001',140008,'Registered','OnGoing'),(251,'MGT001',140015,'Registered',''),(252,'MGT002',140025,'Rejected',''),(268,'COR001',150148,'Registered','Completed'),(269,'COR006',150565,'Registered','Completed'),(270,'FIN001',150776,'Registered','Completed'),(271,'FIN002',150918,'Waitlist',''),(272,'FIN003',150095,'Waitlist',''),(273,'HRD001',150085,'Registered','OnGoing'),(274,'MGT001',150096,'Registered','OnGoing'),(275,'MGT002',150138,'Registered',''),(292,'COR001',150968,'Registered','Completed'),(293,'COR006',150166,'Registered','OnGoing'),(294,'FIN001',150208,'Rejected',''),(295,'FIN002',150232,'Registered','OnGoing'),(296,'FIN003',150233,'Registered',''),(297,'HRD001',150238,'Waitlist',''),(298,'MGT001',150245,'Waitlist',''),(299,'MGT002',150655,'Registered','Completed'),(316,'COR001',150342,'Registered','Completed'),(317,'COR006',150348,'Registered','Completed'),(318,'FIN001',150355,'Rejected',''),(319,'FIN002',150765,'Registered',''),(320,'FIN003',150976,'Waitlist',''),(321,'HRD001',151118,'Registered','Completed'),(322,'MGT001',150345,'Registered','Completed'),(323,'MGT002',150356,'Registered','OnGoing'),(340,'COR001',151146,'Registered','OnGoing'),(341,'COR006',150555,'Registered','OnGoing'),(342,'FIN001',150566,'Registered',''),(343,'FIN002',150608,'Waitlist',''),(344,'FIN003',150632,'Waitlist',''),(345,'HRD001',150633,'Registered',''),(346,'MGT001',150638,'Registered',''),(347,'MGT002',150645,'Registered','Completed'),(364,'COR001',160188,'Registered','Completed'),(365,'COR002',160212,'Registered','Completed'),(366,'COR006',160213,'Registered','OnGoing'),(367,'FIN001',160218,'Rejected',''),(368,'FIN002',160225,'Registered','OnGoing'),(369,'FIN003',160258,'Registered',''),(370,'HRD001',160282,'Waitlist',''),(371,'MGT002',150208,'Registered','Completed');

insert into skill values 
    (60000, "Coding and Scripting"),
    (60001, "Cloud skills"),
    (70000, "HTML"),
    (70001, "CSS"),
    (71000, "Javascript"),
    (71001, "Python"),
    (80000, "AWS"),
    (50000, "Security Protocols"),
    (40000, "Role-based control");
    
insert into job values
    (300, "Dev Ops Engineer", "lorem"),
    (301, "Frontend developer", "lorem"),
    (302, "Cloud Specialist", "lorem"),
    (303, "Security Engineer", "lorem");

insert into job_skill values
    (300, "Dev Ops Engineer", 60000),
    (300, "Dev Ops Engineer", 60001),
    (301, "Frontend developer", 70000),
    (301, "Frontend developer", 70001),
    (302, "Cloud Specialist", 80000),
    (302, "Cloud Specialist", 60001),
    (303, "Security Engineer", 50000),
    (303, "Security Engineer", 80000),
    (303, "Security Engineer", 40000);

insert into course_skill values
    ("COR002", 60000),
    ("COR002", 60001);

insert into learningjourney values
    (420, "Road to 420", "lorem ipsum", 130001, "COR001");
