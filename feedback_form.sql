-- Adminer 4.8.1 MySQL 10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `questions` (`id`, `question`, `created_at`) VALUES
(1,	'How would you rate the friendliness of our customer service team?',	'2023-05-27 03:47:59'),
(2,	'How would you rate the responsiveness of our customer service team?',	'2023-05-27 03:48:09'),
(3,	'How would you rate the knowledge and expertise of our customer service team?',	'2023-05-27 03:48:17'),
(4,	'How would you rate the timeliness of our customer service team in resolving your issues?',	'2023-05-27 03:48:30'),
(5,	'How would you rate the overall effectiveness of our customer service team in addressing your needs?',	'2023-05-27 03:48:39');

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `results` (`id`, `name`, `email`, `answer`, `question_id`, `created_at`) VALUES
(1,	'John',	'john@gmail.com',	'Satisfied',	1,	'2023-05-27 04:26:41'),
(2,	'John',	'john@gmail.com',	'Very Satisfied',	2,	'2023-05-27 04:26:41'),
(3,	'John',	'john@gmail.com',	'Satisfied',	3,	'2023-05-27 04:26:41'),
(4,	'John',	'john@gmail.com',	'Neutral',	4,	'2023-05-27 04:26:41'),
(5,	'John',	'john@gmail.com',	'Satisfied',	5,	'2023-05-27 04:26:41');

-- 2023-05-27 04:35:50
