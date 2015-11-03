<ENTRY timestamp='21:28:51'>CREATE TABLE `img` (&#x0A;    `id` int(100) NOT NULL AUTO_INCREMENT,&#x0A;    `file_name` varchar(32) NOT NULL,&#x0A;    `url` varchar(32) NOT NULL,&#x0A;    PRIMARY KEY (`id`)&#x0A;)  ENGINE=INNODB DEFAULT CHARSET=utf8</ENTRY>
<ENTRY timestamp='21:32:47'>CREATE TABLE `categories` (&#x0A;    `id` int(100) NOT NULL AUTO_INCREMENT,&#x0A;    `title` varchar(255) NOT NULL,&#x0A;    `description` text NOT NULL,&#x0A;&#x09;`img_url` varchar(64) NOT NULL,&#x0A;    PRIMARY KEY (`id`)&#x0A;)  ENGINE=INNODB DEFAULT CHARSET=utf8</ENTRY>
<ENTRY timestamp='~'>CREATE TABLE `categories` (&#x0A;  `id` int(100) NOT NULL AUTO_INCREMENT,&#x0A;  `title` varchar(255) NOT NULL,&#x0A;  `description` text NOT NULL,&#x0A;  `img_url` varchar(64) NOT NULL,&#x0A;  PRIMARY KEY (`id`)&#x0A;) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8</ENTRY>
<ENTRY timestamp='22:14:27'>ALTER TABLE `duck_store`.`categories` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`, `img_url`)</ENTRY>
<ENTRY timestamp='22:16:19'>ALTER TABLE `duck_store`.`img` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`, `url`)</ENTRY>
<ENTRY timestamp='22:17:04'>ALTER TABLE `duck_store`.`products` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`, `category_id`)</ENTRY>
<ENTRY timestamp='22:31:59'>ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `id` `id` INT(100) NOT NULL</ENTRY>
<ENTRY timestamp='22:46:34'>ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `category_id` `category_id` INT(100) NOT NULL DEFAULT &apos;0&apos; ,&#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
<ENTRY timestamp='22:48:55'>ALTER TABLE products&#x0A;ADD FOREIGN KEY (category_id)&#x0A;REFERENCES categories(id)</ENTRY>
<ENTRY timestamp='22:54:02'>ALTER TABLE `duck_store`.`products` &#x0A;DROP FOREIGN KEY `products_ibfk_1`</ENTRY>
<ENTRY timestamp='~'>ALTER TABLE `duck_store`.`products` &#x0A;ADD CONSTRAINT `products_ibfk_1`&#x0A;  FOREIGN KEY (`category_id`)&#x0A;  REFERENCES `duck_store`.`categories` (`id`)&#x0A;  ON DELETE RESTRICT&#x0A;  ON UPDATE CASCADE</ENTRY>
<ENTRY timestamp='22:56:27'>ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_url)&#x0A;REFERENCES img(url)</ENTRY>
<ENTRY timestamp='22:57:32'>ALTER TABLE `duck_store`.`categories` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
<ENTRY timestamp='22:57:43'>ALTER TABLE `duck_store`.`img` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
<ENTRY timestamp='22:57:55'>ALTER TABLE `duck_store`.`img` &#x0A;CHANGE COLUMN `url` `url` VARCHAR(64) NOT NULL</ENTRY>
<ENTRY timestamp='22:58:01'>ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_url)&#x0A;REFERENCES img(url)</ENTRY>
<ENTRY timestamp='23:02:04'>ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
<ENTRY timestamp='23:02:16'>ALTER TABLE `duck_store`.`categories` &#x0A;CHANGE COLUMN `img_url` `img_id` INT(100) NOT NULL</ENTRY>
<ENTRY timestamp='23:02:56'>ALTER TABLE `duck_store`.`categories` &#x0A;CHANGE COLUMN `img_url` `img_id` INT(100) NOT NULL</ENTRY>
<ENTRY timestamp='23:03:06'>ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
<ENTRY timestamp='23:07:22'>ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `price` `price` DECIMAL(10,2) NOT NULL AFTER `description`,&#x0A;ADD COLUMN `img_id` INT(100) NOT NULL AFTER `category_id`</ENTRY>
<ENTRY timestamp='23:08:33'>ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
<ENTRY timestamp='23:09:19'>ALTER TABLE `duck_store`.`categories` &#x0A;DROP FOREIGN KEY `categories_ibfk_1`</ENTRY>
<ENTRY timestamp='23:09:28'>ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
<ENTRY timestamp='23:10:01'>ALTER TABLE `duck_store`.`categories` &#x0A;DROP COLUMN `img_id`,&#x0A;DROP INDEX `img_id`</ENTRY>
<ENTRY timestamp='23:12:21'>ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
<ENTRY timestamp='23:12:46'>ALTER TABLE `duck_store`.`products` &#x0A;DROP FOREIGN KEY `products_ibfk_2`</ENTRY>
<ENTRY timestamp='~'>ALTER TABLE `duck_store`.`products` &#x0A;ADD CONSTRAINT `products_ibfk_2`&#x0A;  FOREIGN KEY (`img_id`)&#x0A;  REFERENCES `duck_store`.`img` (`id`)&#x0A;  ON UPDATE CASCADE</ENTRY>
