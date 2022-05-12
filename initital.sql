CREATE TABLE `User` (
                        `id` INT(8) unsigned NOT NULL AUTO_INCREMENT,
                        `name` TEXT(100) CHARACTER SET utf8 COLLATE utf8_general_ci,
                        `group` INT(3),
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB;