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
-- テーブルの構造 `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text_failure` mediumtext NOT NULL,
  `text_success` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `key_word01` varchar(128) DEFAULT NULL,
  `key_word02` varchar(128) DEFAULT NULL,
  `key_word03` varchar(128) DEFAULT NULL,
  `key_word04` varchar(128) DEFAULT NULL,
  `key_word05` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `memo`
--

INSERT INTO `memo` (`id`, `title`, `text_failure`, `text_success`, `created_at`, `updated_at`, `key_word01`, `key_word02`, `key_word03`, `key_word04`, `key_word05`) VALUES
(1, '練習1', 'abcd', 'acbd', '2024-12-19 04:28:13', '2024-12-19 04:28:13', NULL, NULL, NULL, NULL, NULL),
(2, '練習2', 'あういえお', 'あいうえお', '2024-12-19 04:30:24', '2024-12-19 04:30:24', NULL, NULL, NULL, NULL, NULL),
(3, '練習3', '12356', '12345', '2024-12-19 04:31:01', '2024-12-19 04:31:01', NULL, NULL, NULL, NULL, NULL),
(4, '練習4', 'しっぺい', 'しっぱい', '2024-12-19 04:31:34', '2024-12-19 04:31:34', NULL, NULL, NULL, NULL, NULL),
(5, '練習5', 'failer', 'failure', '2024-12-19 04:32:13', '2024-12-19 04:32:13', NULL, NULL, NULL, NULL, NULL),
(6, 'test', 'aaaaa', 'bbbbb', '2024-12-19 05:36:52', '2024-12-19 05:36:52', NULL, NULL, NULL, NULL, NULL),
(18, 'テスト', '罰', '丸', '2024-12-19 06:26:08', '2024-12-19 06:26:08', NULL, NULL, NULL, NULL, NULL),
(20, 'テスト', '１２３', '４５６', '2024-12-21 13:24:13', '2024-12-21 13:24:13', NULL, NULL, NULL, NULL, NULL),
(21, '１２３', '４５６', '７８９', '2024-12-21 14:19:25', '2024-12-21 14:19:25', NULL, NULL, NULL, NULL, NULL),
(22, 'ABC', 'ららら', 'ぁぁa', '2024-12-21 17:19:29', '2024-12-26 09:51:42', NULL, NULL, NULL, NULL, NULL),
(24, 'キーワード', 'テスト', '入力', '2025-01-01 14:22:54', '2025-01-01 14:22:54', NULL, NULL, NULL, NULL, NULL),
(26, 'a', 'b', 'c', '2025-01-01 14:40:28', '2025-01-01 14:40:28', NULL, NULL, NULL, NULL, NULL),
(27, 's', 'd', 'g', '2025-01-01 14:48:43', '2025-01-01 14:48:43', NULL, NULL, NULL, NULL, NULL),
(28, 'test', 'test', 'test', '2025-01-01 15:01:42', '2025-01-01 15:01:42', 'on', NULL, NULL, NULL, NULL),
(29, 'a', 's', 'w', '2025-01-01 15:05:08', '2025-01-01 15:05:08', 'on', NULL, NULL, NULL, NULL),
(41, 'a', 's', 'g', '2025-01-09 21:10:12', '2025-01-09 21:10:24', NULL, NULL, NULL, 'on', 'on'),
(42, 'a', '1', 'g', '2025-01-23 07:28:37', '2025-01-23 07:28:37', 'on', NULL, NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
