-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 7 朁E15 日 13:27
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gsf_d03_db04`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE IF NOT EXISTS `php02_table` (
`id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf16_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf16_unicode_ci,
  `image` varchar(128) COLLATE utf16_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL,
  `kanri` int(64) NOT NULL,
  `life` int(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `image`, `indate`, `kanri`, `life`) VALUES
(69, 'ljlu', '2019-07-30', '            bug', NULL, '2019-07-13 23:29:42', 0, 0),
(70, 'ｚｓｒｓｊｆ', '2019-07-03', '            dfgjl', NULL, '2019-07-13 23:29:49', 0, 0),
(71, 'ljlu', '2019-07-08', '            frf', NULL, '2019-07-13 23:31:41', 0, 0),
(72, 'app', '2019-07-20', 'd', NULL, '2019-07-15 20:24:20', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
