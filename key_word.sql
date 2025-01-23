-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 1 月 23 日 10:50
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `step_to_your_success`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `key_word`
--

CREATE TABLE `key_word` (
  `id` int(11) NOT NULL,
  `key_word01` varchar(128) DEFAULT NULL,
  `key_word02` varchar(128) DEFAULT NULL,
  `key_word03` varchar(128) DEFAULT NULL,
  `key_word04` varchar(128) DEFAULT NULL,
  `key_word05` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `key_word`
--

INSERT INTO `key_word` (`id`, `key_word01`, `key_word02`, `key_word03`, `key_word04`, `key_word05`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'SQL', 'Java', 'CSS', 'HTML', '2025-01-01 15:20:32', '2025-01-04 14:12:55');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `key_word`
--
ALTER TABLE `key_word`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `key_word`
--
ALTER TABLE `key_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
