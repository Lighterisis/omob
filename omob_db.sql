-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `na` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'ชื่อหนังสือ (ภาษาหลักของหนังสือ)',
  `na_2` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'ชื่อหนังสือ (ภาษารองของหนังสือ)',
  `page` smallint(6) NOT NULL COMMENT 'จำนวนหน้าของหนังสือ',
  `price` smallint(6) NOT NULL COMMENT 'ราคาของหน้งสือ',
  `img` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'paht ที่เก็บรูปภาพหน้าปกของหนังสือ',
  `rcmb` int(11) NOT NULL COMMENT 'ผู้แนะนำหนังสือเล่มนี้ (Recommended By)',
  `cst` enum('In the library','Borrowed','Personal book') COLLATE utf8_bin NOT NULL COMMENT 'สถานะการยืมของหนังสือ',
  `st` enum('Active','Inactive') COLLATE utf8_bin NOT NULL COMMENT 'สถานะของข้อมูลหนังสือ',
  `introduction` text COLLATE utf8_bin NOT NULL COMMENT 'บทนำหรือข้อความแนะนำหนังสือ',
  PRIMARY KEY (`id`),
  KEY `rcmb` (`rcmb`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`rcmb`) REFERENCES `us` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='ตารางเก็บข้อมูลหนังสือ';


DROP TABLE IF EXISTS `bookc`;
CREATE TABLE `bookc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL COMMENT 'book.id ของหนังสือที่ได้รับการแสดงความคิดเห็น',
  `us_id` int(11) NOT NULL COMMENT 'us.id ของผู้ที่ทำการแสดงความคิดเห็น',
  `cm` text COLLATE utf8_bin NOT NULL COMMENT 'ข้อมูลความคิดเห็น',
  `cmd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันและเวลาที่ทำการแสดงความคิดเห็น',
  `edd` datetime DEFAULT NULL COMMENT 'วันและเวลาที่ทำการแก้ไขความคิดเห็น',
  `st` enum('Active','Deleted') COLLATE utf8_bin DEFAULT NULL COMMENT 'สถานะจองความคิดเห็น',
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `us_id` (`us_id`),
  CONSTRAINT `bookc_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `bookc_ibfk_2` FOREIGN KEY (`us_id`) REFERENCES `us` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='ตารางเก็บข้อมูลการแสดงความเห็นต่อหนังสือ';


DROP TABLE IF EXISTS `bookh`;
CREATE TABLE `bookh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL COMMENT 'book.id',
  `act` enum('Bring In','Borrowed','Return') COLLATE utf8_bin NOT NULL COMMENT 'สถานะของการทำรายการ',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันและเวลาที่ทำรายการ',
  `us_id` int(11) NOT NULL COMMENT 'us.id ของผู้ทำรายการ (ไม่ใช่ผู้คีย์ข้อมูล)',
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `us_id` (`us_id`),
  CONSTRAINT `bookh_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `bookh_ibfk_2` FOREIGN KEY (`us_id`) REFERENCES `us` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='ประวัติการนำเข้า ยืม และคืนหนังสือ';


DROP TABLE IF EXISTS `ss`;
CREATE TABLE `ss` (
  `id` varchar(128) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='ตารางเก็บข้อมูล [Session]';


DROP TABLE IF EXISTS `us`;
CREATE TABLE `us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'ชื่อของผู้ใช้งานระบบ',
  `surname` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'นามสกุลของผู้ใช้งานระบบ',
  `usn` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'ยูซเซอร์เนมของผู้ใช้งานระบบ',
  `pass` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'รหัสผ่านสำหรับเข้าใช้งานระบบ',
  `sccode` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'โค้ดที่จะส่งไปพร้อมกับ Email ยืนยันการสมัครสมาชิก หรือ ลืมรหัส',
  `st` enum('Active','Inactive') COLLATE utf8_bin NOT NULL COMMENT 'สถานะของข้อมูลผู้ใช้งานระบบ',
  `email` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'อีเมลของ user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usn` (`usn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='ตารางเก็บข้อมูลผู้ใช้งานระบบ';


-- 2017-03-07 10:15:27
