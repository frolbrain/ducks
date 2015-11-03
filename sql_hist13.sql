CREATE DATABASE `duck_store` CHARACTER SET UTF8;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL;
  PRIMARY KEY (`id`);
) ENGINE=INNODB DEFAULT CHARSET UTF8;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET UTF8;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duck_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET UTF8;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10 , 2 ) NOT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=INNODB DEFAULT CHARSET UTF8;

CREATE TABLE `products` (&#x0A;    `id` int(11) NOT NULL AUTO_INCREMENT,&#x0A;    `title` varchar(255) NOT NULL,&#x0A;    `description` text NOT NULL,&#x0A;    `category_id` int(11) DEFAULT NULL,&#x0A;    `price` decimal(10 , 2 ) NOT NULL,&#x0A;    PRIMARY KEY (`id`)&#x0A;)  ENGINE=INNODB DEFAULT CHARSET=utf8</ENTRY>
CREATE TABLE `categories` (&#x0A;    `id` int(11) NOT NULL AUTO_INCREMENT,&#x0A;    `title` varchar(255) NOT NULL,&#x0A;    `description` text NOT NULL,&#x0A;    PRIMARY KEY (`id`)&#x0A;)  ENGINE=INNODB DEFAULT CHARSET=utf8</ENTRY>
CREATE TABLE `photos` (&#x0A;    `id` int(11) NOT NULL AUTO_INCREMENT,&#x0A;    `duck_id` int(11) NOT NULL,&#x0A;    `photo` varchar(255) NOT NULL,&#x0A;    PRIMARY KEY (`id`)&#x0A;)  ENGINE=INNODB DEFAULT CHARSET=utf8</ENTRY>
