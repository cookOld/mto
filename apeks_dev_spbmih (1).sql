-- Adminer 4.8.2 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `mto_competenciess`;
CREATE TABLE `mto_competenciess` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` int NOT NULL,
  `competencie` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `competencie` (`competencie`),
  CONSTRAINT `mto_competenciess_ibfk_1` FOREIGN KEY (`competencie`) REFERENCES `plan_competencies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `mto_competenciess` (`id`, `class`, `competencie`) VALUES
(12,	2,	3),
(28,	2,	5),
(29,	2,	4),
(30,	2,	7),
(31,	1,	1),
(32,	1,	1),
(33,	3,	1),
(34,	1,	4),
(35,	2,	18),
(36,	2,	6),
(37,	2,	7);

DROP TABLE IF EXISTS `mto_equips`;
CREATE TABLE `mto_equips` (
  `persontime` datetime NOT NULL,
  `person` text NOT NULL,
  `status` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `count` int NOT NULL,
  `mol` text NOT NULL,
  `classroom_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `mto_equips` (`persontime`, `person`, `status`, `id`, `name`, `count`, `mol`, `classroom_id`) VALUES
('0000-00-00 00:00:00',	'',	0,	6,	'Варшавская стенка 5,0 * 2,5м',	2,	'Бурцева О.Н.',	0),
('0000-00-00 00:00:00',	'',	0,	7,	'555',	5,	'555',	4),
('0000-00-00 00:00:00',	'',	0,	8,	'1',	11,	'1',	11),
('0000-00-00 00:00:00',	'',	0,	19,	'1',	1,	'12121',	5),
('0000-00-00 00:00:00',	'',	0,	22,	'1',	1,	'12121',	1),
('0000-00-00 00:00:00',	'',	0,	23,	'Арсений Теренько',	0,	'Арсений Теренько',	1),
('2024-02-05 14:58:05',	'teacher',	0,	27,	'комп',	1,	'Никулин',	2),
('2024-01-19 18:55:12',	'teacher',	0,	28,	'mihail_dorziev',	11,	'Иванов',	2);

-- 2024-02-06 21:15:17
