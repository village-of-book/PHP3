-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 12 月 26 日 02:13
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `memo`
--

INSERT INTO `memo` (`id`, `title`, `text_failure`, `text_success`, `created_at`, `updated_at`) VALUES
(1, '練習1', 'abcd', 'acbd', '2024-12-19 04:28:13', '2024-12-19 04:28:13'),
(2, '練習2', 'あういえお', 'あいうえお', '2024-12-19 04:30:24', '2024-12-19 04:30:24'),
(3, '練習3', '12356', '12345', '2024-12-19 04:31:01', '2024-12-19 04:31:01'),
(4, '練習4', 'しっぺい', 'しっぱい', '2024-12-19 04:31:34', '2024-12-19 04:31:34'),
(5, '練習5', 'failer', 'failure', '2024-12-19 04:32:13', '2024-12-19 04:32:13'),
(6, 'test', 'aaaaa', 'bbbbb', '2024-12-19 05:36:52', '2024-12-19 05:36:52'),
(18, 'テスト', '罰', '丸', '2024-12-19 06:26:08', '2024-12-19 06:26:08'),
(20, 'テスト', '１２３', '４５６', '2024-12-21 13:24:13', '2024-12-21 13:24:13'),
(21, '１２３', '４５６', '７８９', '2024-12-21 14:19:25', '2024-12-21 14:19:25'),
(22, 'ABC', 'ららら', 'ぁぁa', '2024-12-21 17:19:29', '2024-12-26 09:51:42');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
