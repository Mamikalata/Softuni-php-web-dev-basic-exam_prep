
CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `username` (`username`)
)
	ENGINE=InnoDB
;

CREATE TABLE `categories` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE=InnoDB
;

CREATE TABLE `tasks` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	`description` TEXT NOT NULL,
	`location` VARCHAR(100) NOT NULL,
	`author_id` INT(11) NOT NULL,
	`category_id` INT(11) NOT NULL,
	`started_on` DATETIME NULL DEFAULT NULL,
	`due_date` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_tasks_users` (`author_id`),
	INDEX `FK_tasks_categories` (`category_id`),
	CONSTRAINT `FK_tasks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
	CONSTRAINT `FK_tasks_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
)
	COLLATE='utf8_general_ci'
	ENGINE=InnoDB
;