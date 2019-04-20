-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-04-20 06:00:04
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `amz`
--

-- --------------------------------------------------------

--
-- 表的结构 `catagory`
--

CREATE TABLE `catagory` (
  `cname` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_update_username` varchar(255) DEFAULT NULL,
  `last_update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `catagory`
--

INSERT INTO `catagory` (`cname`, `description`, `last_update_username`, `last_update_date`) VALUES
('Action', 'none', 'admin', '0000-00-00 00:00:00'),
('Action RPG', 'none', 'admin', '0000-00-00 00:00:00'),
('Base Building', 'none', 'admin', '0000-00-00 00:00:00'),
('Board Game', 'none', 'admin', '0000-00-00 00:00:00'),
('Card Game', 'none', 'admin', '0000-00-00 00:00:00'),
('City Builder', 'none', 'admin', '0000-00-00 00:00:00'),
('Difficult', 'none', 'admin', '0000-00-00 00:00:00'),
('Early Access', 'none', 'admin', '0000-00-00 00:00:00'),
('FPS', 'none', 'admin', '0000-00-00 00:00:00'),
('Funny', 'none', 'admin', '0000-00-00 00:00:00'),
('Great Soundtrack', 'none', 'admin', '0000-00-00 00:00:00'),
('Horror', 'none', 'admin', '0000-00-00 00:00:00'),
('Indie', 'none', 'admin', '0000-00-00 00:00:00'),
('Massively Multiplayer', 'none', 'admin', '0000-00-00 00:00:00'),
('Metroidvania', 'none', 'admin', '0000-00-00 00:00:00'),
('Multiplayer', 'none', 'admin', '0000-00-00 00:00:00'),
('Mystery', 'none', 'admin', '0000-00-00 00:00:00'),
('Open World', 'none', 'admin', '0000-00-00 00:00:00'),
('Puzzle', 'none', 'admin', '0000-00-00 00:00:00'),
('Racing', 'none', 'admin', '0000-00-00 00:00:00'),
('RPG', 'none', 'admin', '0000-00-00 00:00:00'),
('Sandbox', 'none', 'admin', '0000-00-00 00:00:00'),
('Simulation', 'none', 'admin', '0000-00-00 00:00:00'),
('Space', 'none', 'admin', '0000-00-00 00:00:00'),
('Sports', 'none', 'admin', '0000-00-00 00:00:00'),
('Strategy', 'none', 'admin', '0000-00-00 00:00:00'),
('Survival', 'none', 'admin', '0000-00-00 00:00:00'),
('Utilities', 'none', 'admin', '0000-00-00 00:00:00'),
('Violent', 'none', 'admin', '0000-00-00 00:00:00'),
('Zombies', 'none', 'admin', '0000-00-00 00:00:00');

--
-- 转储表的索引
--

--
-- 表的索引 `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
