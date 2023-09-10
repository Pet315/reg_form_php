CREATE DATABASE IF NOT exists reg_form;
use reg_form;
-- DELETE FROM users;
-- SELECT COUNT(*) FROM users;
DROP TABLE users;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(30) NOT NULL,
    `last_name` varchar(30) NOT NULL,
    `birthdate` varchar(20) NOT NULL,
    `report_subject` varchar(50) NOT NULL,
	`country` varchar(70) NOT NULL,
	`phone` varchar(40) NOT NULL,
	`email` varchar(70) NOT NULL,
    `company` varchar(100) NULL,
    `position` varchar(70) NULL,
    `about_me` varchar(255) NULL,
    `photo` varchar(255) NULL,
    PRIMARY KEY (`id`)
);