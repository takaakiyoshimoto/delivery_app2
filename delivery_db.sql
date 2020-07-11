-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 
-- サーバのバージョン： 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `menu_table`
--

CREATE TABLE `menu_table` (
  `menu_id` int(11) NOT NULL,
  `recivedata_id` int(11) NOT NULL,
  `menu_title` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `menu_table`
--

INSERT INTO `menu_table` (`menu_id`, `recivedata_id`, `menu_title`) VALUES
(1, 1, 'カレー'),
(2, 3, 'うどん'),
(3, 3, '天丼'),
(4, 3, 'ウナギ'),
(5, 0, 'そば'),
(6, 3, 'そば'),
(7, 4, 'うどん'),
(8, 5, 'うどん'),
(9, 6, 'そば'),
(10, 7, '天丼'),
(11, 8, 'ウナギ'),
(12, 9, 'ハンバーガー'),
(13, 10, 'うどん'),
(14, 10, '天丼'),
(15, 11, 'うどん'),
(16, 11, '天丼'),
(17, 5, 'カレー'),
(18, 10, 'カレー'),
(19, 14, 'うどん'),
(20, 14, 'カレー');

-- --------------------------------------------------------

--
-- テーブルの構造 `nutrition_table`
--

CREATE TABLE `nutrition_table` (
  `nutrition_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `kcal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `nutrition_table`
--

INSERT INTO `nutrition_table` (`nutrition_id`, `menu_id`, `kcal`) VALUES
(1, 1, 600),
(2, 7, 367),
(3, 17, 550),
(4, 19, 300);

-- --------------------------------------------------------

--
-- テーブルの構造 `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `order_table`
--

INSERT INTO `order_table` (`order_id`, `user_id`, `menu_id`, `status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `recivedata_table`
--

CREATE TABLE `recivedata_table` (
  `recivedata_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `recivedata_table`
--

INSERT INTO `recivedata_table` (`recivedata_id`, `data`, `shop_id`, `status`) VALUES
(1, '2020-07-09', 1, 2),
(2, '2020-07-09', 1, 2),
(3, '2020-07-01', 1, 2),
(4, '2020-07-09', 1, 2),
(5, '2020-07-08', 1, 1),
(6, '2020-07-07', 1, 1),
(7, '2020-07-06', 1, 1),
(8, '2020-07-05', 1, 1),
(9, '2020-07-04', 1, 1),
(10, '2020-07-11', 1, 1),
(11, '2020-07-12', 1, 1),
(12, '2020-07-06', 1, 1),
(13, '2020-07-07', 1, 1),
(14, '2020-07-12', 1, 1),
(15, '2020-07-13', 1, 1),
(16, '2020-07-14', 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `shop_table`
--

CREATE TABLE `shop_table` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `lid` varchar(64) COLLATE utf8_bin NOT NULL,
  `lpw` varchar(64) COLLATE utf8_bin NOT NULL,
  `shop_address` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `shop_table`
--

INSERT INTO `shop_table` (`shop_id`, `shop_name`, `lid`, `lpw`, `shop_address`) VALUES
(1, 'あぐり食堂', '1001', '$2y$10$zJE4ofEYSd7dYPqDtV6D0uF2lvZjxsSkzt/LhkM1ZC7JycQicvDru', '八潮市大瀬1丁目1-3');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `lid` varchar(64) COLLATE utf8_bin NOT NULL,
  `lpw` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_address` varchar(64) COLLATE utf8_bin NOT NULL,
  `kanri_flg` int(11) NOT NULL,
  `life_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `lid`, `lpw`, `user_address`, `kanri_flg`, `life_flg`) VALUES
(1, 'ヨシモト', '0001', '$2y$10$tc6MuSYbMgV7xe/FYhFppuSoHgMsEvFDTLwfVqEOPfNnJqOk5z9Ky', '埼玉県八潮市', 0, 0),
(2, 'admin', '0002', '$2y$10$tc6MuSYbMgV7xe/FYhFppuSoHgMsEvFDTLwfVqEOPfNnJqOk5z9Ky', '埼玉県八潮市', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `nutrition_table`
--
ALTER TABLE `nutrition_table`
  ADD PRIMARY KEY (`nutrition_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `recivedata_table`
--
ALTER TABLE `recivedata_table`
  ADD PRIMARY KEY (`recivedata_id`);

--
-- Indexes for table `shop_table`
--
ALTER TABLE `shop_table`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `nutrition_table`
--
ALTER TABLE `nutrition_table`
  MODIFY `nutrition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recivedata_table`
--
ALTER TABLE `recivedata_table`
  MODIFY `recivedata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `shop_table`
--
ALTER TABLE `shop_table`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
