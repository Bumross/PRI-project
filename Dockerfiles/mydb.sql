SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

-- table for users
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1,	'alex',	'alex'),
(2,	'kata',	'heslo');


-- table for pages
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `name` varchar(100) NOT NULL,
  `views` int unsigned NOT NULL,
  PRIMARY KEY (`name`)
);