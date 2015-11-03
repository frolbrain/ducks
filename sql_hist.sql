ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `id` `id` INT(100) NOT NULL</ENTRY>
ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `category_id` `category_id` INT(100) NOT NULL DEFAULT &apos;0&apos; ,&#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
ALTER TABLE products&#x0A;ADD FOREIGN KEY (category_id)&#x0A;REFERENCES categories(id)</ENTRY>
ALTER TABLE `duck_store`.`products` &#x0A;ADD CONSTRAINT `products_ibfk_1`&#x0A;  FOREIGN KEY (`category_id`)&#x0A;  REFERENCES `duck_store`.`categories` (`id`)&#x0A;  ON DELETE RESTRICT&#x0A;  ON UPDATE CASCADE</ENTRY>
ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_url)&#x0A;REFERENCES img(url)</ENTRY>
ALTER TABLE `duck_store`.`categories` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
ALTER TABLE `duck_store`.`img` &#x0A;DROP PRIMARY KEY,&#x0A;ADD PRIMARY KEY (`id`)</ENTRY>
ALTER TABLE `duck_store`.`img` &#x0A;CHANGE COLUMN `url` `url` VARCHAR(64) NOT NULL</ENTRY>
ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_url)&#x0A;REFERENCES img(url)</ENTRY>
ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
ALTER TABLE categories&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
ALTER TABLE `duck_store`.`products` &#x0A;CHANGE COLUMN `price` `price` DECIMAL(10,2) NOT NULL AFTER `description`,&#x0A;ADD COLUMN `img_id` INT(100) NOT NULL AFTER `category_id`</ENTRY>
ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
ALTER TABLE `duck_store`.`categories` &#x0A;DROP FOREIGN KEY `categories_ibfk_1`</ENTRY>
ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
ALTER TABLE `duck_store`.`categories` &#x0A;DROP COLUMN `img_id`,&#x0A;DROP INDEX `img_id`</ENTRY>
ALTER TABLE products&#x0A;ADD FOREIGN KEY (img_id)&#x0A;REFERENCES img(id)</ENTRY>
ALTER TABLE `duck_store`.`products` &#x0A;ADD CONSTRAINT `products_ibfk_2`&#x0A;  FOREIGN KEY (`img_id`)&#x0A;  REFERENCES `duck_store`.`img` (`id`)&#x0A;  ON UPDATE CASCADE</ENTRY>
