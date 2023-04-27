
CREATE TABLE `admins`
(
  id      int       NOT NULL AUTO_INCREMENT,
  name    char(50)  NOT NULL ,
  email   char(75)  NOT NULL ,
  password char(75) NOT NULL ,
  status  char(50)  NULL ,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

