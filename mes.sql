-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-18 13:38:57
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mes`
--

-- --------------------------------------------------------

--
-- 表的结构 `assmes`
--

DROP TABLE IF EXISTS `assmes`;
CREATE TABLE IF NOT EXISTS `assmes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `class` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `assmes`
--

INSERT INTO `assmes` (`id`, `name`, `price`, `time`, `class`) VALUES
(137, 'PHP范例', '55', 2012, ''),
(138, 'PHP自学手册', '60', 2003, ''),
(136, 'C语言程序设计', '50', 2011, '软件工程'),
(135, '123', '200', 12, ''),
(134, 'MYSQL', '52', 2010, ''),
(133, 'MYSQL', '52', 2010, ''),
(114, 'root', '12', 23, '11'),
(69, 'root', '200', 12, '34'),
(70, 'root', '200', 12, '34'),
(72, 'root', '200', 12, '34'),
(73, 'root', '200', 12, '34'),
(74, 'root', '200', 12, '34'),
(75, 'root', '200', 12, '34');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `name` char(255) NOT NULL,
  `pwd` char(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`name`, `pwd`) VALUES
('小小小', '456jk'),
('小雨', '123er'),
('高秀媛', '123456'),
('root', '123'),
('sa', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
