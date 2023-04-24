DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins`
(
  id      int       NOT NULL AUTO_INCREMENT,
  name    char(50)  NOT NULL ,
  email   char(75)  NULL ,
  password char(50) NULL ,
  status  char(50)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `names` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Frodo','onering@lotr.net','Pasword1!','admin'), (2,'Sam','bravegardener@lotr.net','Pasword1!','admin'), (3,'Nathan','veryreal@email.com','Pasword1!','admin');
/*!40000 ALTER TABLE `names` ENABLE KEYS */;
UNLOCK TABLES;
