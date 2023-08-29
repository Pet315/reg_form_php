CREATE DATABASE IF NOT exists reg_form;
use reg_form;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `birthdate` varchar(20) NOT NULL,
    `report_subject` varchar(255) NOT NULL,
	`country` varchar(255) NULL,
	`phone` varchar(40) NULL,
	`email` varchar(255) NOT NULL,
    `company` varchar(255) NULL,
    `position` varchar(255) NULL,
    `about_me` varchar(255) NULL,
    `photo` varchar(255) NULL,
    PRIMARY KEY (`id`)
);