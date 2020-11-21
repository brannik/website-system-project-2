-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.4.14-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win64
-- HeidiSQL Версия:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дъмп структура за таблица systemdb.accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `device_id` int(200) NOT NULL,
  `rank` int(3) NOT NULL DEFAULT 1,
  `warehouse` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица systemdb.accounts: ~2 rows (приблизително)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `username`, `device_id`, `rank`, `warehouse`) VALUES
	(1, 'brannik', 1010101101, 3, 1),
	(2, 'test', 11123123, 1, 1);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Дъмп структура за таблица systemdb.announce
DROP TABLE IF EXISTS `announce`;
CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица systemdb.announce: ~5 rows (приблизително)
DELETE FROM `announce`;
/*!40000 ALTER TABLE `announce` DISABLE KEYS */;
INSERT INTO `announce` (`id`, `text`, `time`) VALUES
	(4, 'test announce 3', '2020-11-19 01:20:54'),
	(5, 'test announce 2', '2020-11-19 01:21:10'),
	(6, 'test announce 1', '2020-11-19 01:21:17'),
	(7, 'test announce 4', '2020-11-19 01:21:25'),
	(8, 'final test announce 5 must be at top', '2020-11-19 01:27:23');
/*!40000 ALTER TABLE `announce` ENABLE KEYS */;

-- Дъмп структура за таблица systemdb.calendar
DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 - second shift 1 - sunday 2 - rest day',
  `date_owner_id` int(11) NOT NULL DEFAULT 0,
  `warehouse` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица systemdb.calendar: ~6 rows (приблизително)
DELETE FROM `calendar`;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` (`id`, `date_type`, `date_owner_id`, `warehouse`, `date`) VALUES
	(1, 0, 1, 1, '2020-11-19 23:29:13'),
	(2, 1, 2, 1, '2020-11-22 00:22:09'),
	(3, 2, 1, 1, '2020-11-20 00:29:08'),
	(4, 0, 1, 1, '2020-11-20 00:45:04'),
	(5, 1, 1, 1, '2020-11-22 00:29:31'),
	(6, 2, 2, 1, '2020-11-20 01:50:54');
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;

-- Дъмп структура за таблица systemdb.extra
DROP TABLE IF EXISTS `extra`;
CREATE TABLE IF NOT EXISTS `extra` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `acc_id` bigint(255) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type_extra` int(11) NOT NULL DEFAULT 0 COMMENT '0 - day 1-hours',
  `extra` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица systemdb.extra: ~2 rows (приблизително)
DELETE FROM `extra`;
/*!40000 ALTER TABLE `extra` DISABLE KEYS */;
INSERT INTO `extra` (`id`, `acc_id`, `date`, `type_extra`, `extra`) VALUES
	(1, 1, '2020-11-17 00:00:00', 1, 6),
	(2, 1, '2020-11-17 00:00:00', 0, 1);
/*!40000 ALTER TABLE `extra` ENABLE KEYS */;

-- Дъмп структура за таблица systemdb.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Text` varchar(100) CHARACTER SET latin1 NOT NULL,
  `page` varchar(300) CHARACTER SET latin1 NOT NULL,
  `target` varchar(100) CHARACTER SET latin1 NOT NULL,
  `access` int(3) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=cp1251 COLLATE=cp1251_bulgarian_ci;

-- Дъмп данни за таблица systemdb.menu: ~5 rows (приблизително)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `Text`, `page`, `target`, `access`, `position`) VALUES
	(1, 'HOME', 'main.php', 'mainFr', 0, 1),
	(2, 'CALENDAR', 'calendar.php', 'mainFr', 1, 2),
	(3, 'EXTRA', 'extra.html', 'mainFr', 1, 4),
	(5, 'ADMIN', 'admin.html', 'mainFr', 3, 6),
	(6, 'USERS', 'users.html', 'mainFr', 1, 5);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Дъмп структура за таблица systemdb.notifications
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever` int(11) NOT NULL DEFAULT 0,
  `sender` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0 request shift 1 resuest sunday 2 message (3 - system message)',
  `requested_date_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'for type 0 - request shift\r\n	0 - pending\r\n	1- accepted\r\n	2 -declined\r\nfor type 1 - request sunday\r\n	0 -pending\r\n	1- accepted\r\n	2- declined\r\nfor type 2 - message\r\n	0 - not read\r\n	1- read',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Дъмп данни за таблица systemdb.notifications: ~4 rows (приблизително)
DELETE FROM `notifications`;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `reciever`, `sender`, `type`, `requested_date_id`, `text`, `state`, `time`, `comment`) VALUES
	(1, 1, 2, 0, 3, '', 0, '2020-11-19 02:45:02', 'acc 2 request to acc 1 to exchange shift at date id 3 - pending'),
	(2, 1, 2, 1, 2, '', 0, '2020-11-19 02:44:42', 'acc 2 request to acc 1 ro exchange sunday at date id 2 - pending'),
	(3, 1, 2, 2, 0, 'this is test message from acc 2 to acc 1', 0, '2020-11-19 02:45:45', 'test mesage from acc 2 to acc 1'),
	(4, 0, 0, 3, 0, 'this is system message to all users and has top prioritet', 0, '2020-11-19 02:55:14', NULL);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
