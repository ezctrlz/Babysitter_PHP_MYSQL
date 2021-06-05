
CREATE TABLE `user` (
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(20) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `role` ENUM('ADMIN','BABY_SITTER','CUSTOMER') NOT NULL,
    `photo_url` TEXT NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE (`username`)
);

CREATE TABLE `baby_sitter` (
    `baby_sitter_id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `service_desc` TEXT NOT NULL DEFAULT '',
    `hourly_value` FLOAT NOT NULL DEFAULT 0,
    `score` FLOAT NOT NULL DEFAULT 10,
    `finished_works` INT NOT NULL DEFAULT 0,
    `availability` ENUM('AVAILABLE','NOT_AVAILABLE','WORKING') NOT NULL DEFAULT 'NOT_AVAILABLE',
    PRIMARY KEY (`baby_sitter_id`),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
);

CREATE TABLE `schedule` (
    `baby_sitter_id` INT NOT NULL,
    `day` ENUM('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY') NOT NULL,
    `time_ranges` TEXT NOT NULL DEFAULT '[]' COMMENT 'Arreglo de horas disponibles en formato json',
    PRIMARY KEY (`baby_sitter_id`, `day`),
    FOREIGN KEY (`baby_sitter_id`) REFERENCES `baby_sitter`(`baby_sitter_id`)
);

CREATE TABLE `contract` (
    `contract_id` INT NOT NULL AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `baby_sitter_id` INT NOT NULL,
    `hours` INT NOT NULL,
    `value` FLOAT NOT NULL,
    `status` ENUM('CREATED', 'PENDING_PAYMENT', 'PAID_OUT', 'STARTED', 'ENDED') NOT NULL DEFAULT 'CREATED',
    `score` INT NULL,
    `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `finished_on` DATETIME NULL,
    PRIMARY KEY (`contract_id`),
    FOREIGN KEY (`customer_id`) REFERENCES `user`(`user_id`),
    FOREIGN KEY (`baby_sitter_id`) REFERENCES `baby_sitter`(`baby_sitter_id`)
);

CREATE TABLE `payment` (
    `payment_id` INT NOT NULL AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `contract_id` INT NOT NULL,
    `value` FLOAT NOT NULL,
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`payment_id`),
    FOREIGN KEY (`customer_id`) REFERENCES `user`(`user_id`),
    FOREIGN KEY (`contract_id`) REFERENCES `contract`(`contract_id`)
);
