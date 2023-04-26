
CREATE TABLE `contactsTable`
(
  id      int       NOT NULL AUTO_INCREMENT,
  name    char(50)  NOT NULL ,
  address char(100)  NOT NULL ,
  city    char(50)  NOT NULL ,
  state   char(50)  NOT NULL ,
  phone   char(15)  NOT NULL ,
  email   char(75)  NOT NULL ,
  dob     char(15)  NOT NULL ,
  contacts char(50) NULL ,
  age     char(50)  NOT NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

/*
LOCK TABLES `contactsTable` WRITE;
//!40000 ALTER TABLE `names` DISABLE KEYS ;
INSERT INTO `contactsTable` VALUES (1,'Frodo','1234 Bag End','Hobbiton','ca','999.999.9999','onering@lotr.net','09/22/1949','newsletter','fifty_up');
//!40000 ALTER TABLE `names` ENABLE KEYS;
UNLOCK TABLES;
*/
