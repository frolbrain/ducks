CREATE DATABASE `duck_store` CHARACTER SET UTF8;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL;
  PRIMARY KEY (`id`);
) ENGINE=INNODB DEFAULT CHARSET UTF8;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10 , 2 ) NOT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=INNODB DEFAULT CHARSET UTF8;
