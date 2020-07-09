-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-07-09 14:41:21
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_08`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `07_08_okiyutaka`
--

CREATE TABLE `07_08_okiyutaka` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `07_08_okiyutaka`
--

INSERT INTO `07_08_okiyutaka` (`id`, `username`, `email`, `password`) VALUES
(1, 'aaa', 'aaa@gmail.com', 'aaa'),
(2, 'bbb', 'bbb@gmail.com', 'bbb');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(2, '02をかく', '2020-06-20', '2020-06-20 15:29:18', '2020-06-20 15:29:18'),
(3, '03をかく', '2020-06-20', '2020-06-20 15:30:27', '2020-06-20 15:30:27'),
(4, '', '0000-00-00', '2020-06-20 15:31:42', '2020-07-04 16:43:27'),
(6, '05をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(7, '06をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(8, '07をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(9, '08をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(10, '09をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(11, '10をかく', '2020-06-20', '2020-06-20 15:32:18', '2020-06-20 15:32:18'),
(12, 'aaa', '2020-06-20', '2020-06-20 16:13:13', '2020-06-20 16:13:13'),
(13, 'aaa', '2020-06-20', '2020-06-20 20:16:58', '2020-06-20 20:16:58'),
(14, 'aaaxxx', '2020-06-27', '2020-06-27 14:53:01', '2020-06-27 16:29:21'),
(16, 'testuser', '0000-00-00', '2020-07-04 15:36:47', '2020-07-04 15:36:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'ccc', 'ccc', NULL, 1, '2020-06-30 23:30:08', '2020-07-09 20:32:02'),
(4, 'testuser', '123456', 1, 1, '2020-07-04 15:38:48', '2020-07-09 20:31:59'),
(5, 'aaa', 'aaa', NULL, NULL, '2020-07-09 20:29:09', '2020-07-09 20:31:55'),
(6, 'bbb', 'bbb', NULL, NULL, '2020-07-09 20:31:34', '2020-07-09 20:31:34'),
(7, 'vvv', 'vvv', NULL, 1, '2020-07-09 20:48:19', '2020-07-09 20:54:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `07_08_okiyutaka`
--
ALTER TABLE `07_08_okiyutaka`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `07_08_okiyutaka`
--
ALTER TABLE `07_08_okiyutaka`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルのAUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
