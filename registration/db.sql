CREATE TABLE IF NOT EXISTS `Student` (
  `sid` Bigint PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  'phone' integer(10) NOT NULL,
  `gender` varchar(2) NOT NULL,
  'category' varchar(3) NOT NULL,
  'photo'    varchar(100) NOT NULL
 )


